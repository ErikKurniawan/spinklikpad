<?php

class datatable {
    static function data_output($columns, $data) {
        $out = array();
        for ($i = 0, $ien = count($data); $i < $ien; $i++) {
            $row = array();
            for ($j = 0, $jen = count($columns); $j < $jen; $j++) {
                $column = $columns[$j];
                if (isset($column['formatter'])) {
                    array_push($row, $column['formatter']($data[$i]));
                } else {
                    array_push($row, $data[$i][$columns[$j]['db']]);
                }
            }
            $out[] = $row;
        }
        return $out;
    }

    static function db($conn) {
        if (is_array($conn)) {
            return self::sql_connect($conn);
        }
        return $conn;
    }

    static function limit($request, $columns) {
        $limit = '';
        if (isset($request['start']) && $request['length'] != -1) {
            $limit = "LIMIT " . intval($request['start']) . ", " . intval($request['length']);
        }
        return $limit;
    }

    static function order($request, $columns) {
        $order = '';
        if (isset($request['order']) && count($request['order'])) {
            $orderBy = array();
            $dbColumns = self::pluck($columns, 'db');
            for ($i = 0, $ien = count($request['order']); $i < $ien; $i++) {
                // Convert the column index into the column data property
                $columnIdx = intval($request['order'][$i]['column']);
                $requestColumn = $request['columns'][$columnIdx];
                $ordercolumn = $dbColumns[$requestColumn['data']];
                if ($requestColumn['orderable'] == 'true') {
                    $dir = $request['order'][$i]['dir'] === 'asc' ?
                            'ASC' :
                            'DESC';
                    $orderBy[] = '`' . $ordercolumn . '` ' . $dir;
                }
            }
            $order = 'ORDER BY ' . implode(', ', $orderBy);
            //$order = implode(', ', $orderBy);
        }
        return $order;
    }

    static function filter($request, $columns, &$bindings, $wherecondition = null) {


        $everytime = self::whereeverytime($wherecondition, $bindings);
        $globalSearch = self::whereglobal($request, $columns, $bindings);
        $columnSearch = self::whereindividual($request, $columns, $bindings);

        return self::returnwhere($everytime, $globalSearch, $columnSearch);
    }

    static function whereeverytime($wherecondition, &$bindings) {
        $everytime = array();
        if (is_array($wherecondition)) {
            foreach ($wherecondition as $key => $value) {

                $binding = self::bind($bindings, '%' . $value . '%', PDO::PARAM_STR);
                $everytime[] = "`" . $key . "` LIKE " . $binding;
            }
        }
        return $everytime;
    }

    static function whereglobal($request, $columns, &$bindings) {
        $globalSearch = array();
        $dtColumns = self::pluck($columns, 'dt');
        if (isset($request['search']) && $request['search']['value'] != '') {
            $str = $request['search']['value'];
            for ($i = 0, $ien = count($request['columns']); $i < $ien; $i++) {
                $requestColumn = $request['columns'][$i];
                $columnIdx = array_search($requestColumn['data'], $dtColumns);
                $column = $columns[$columnIdx];
                if ($requestColumn['searchable'] == 'true') {
                    $binding = self::bind($bindings, '%' . $str . '%', PDO::PARAM_STR);
                    $globalSearch[] = "`" . $column['db'] . "` LIKE " . $binding;
                }
            }
        }
        return $globalSearch;
    }

    static function whereindividual($request, $columns, &$bindings) {
        $columnSearch = array();
        if (isset($request['columns'])) {
            for ($i = 0, $ien = count($request['columns']); $i < $ien; $i++) {
                $requestColumn = $request['columns'][$i];
                $column = $columns[$i];
                $str = $requestColumn['search']['value'];
                if ($requestColumn['searchable'] == 'true' &&
                        $str != '') {
                    $binding = self::bind($bindings, '%' . $str . '%', PDO::PARAM_STR);
                    $columnSearch[] = "`" . $column['db'] . "` LIKE " . $binding;
                }
            }
        }
        return $columnSearch;
    }

    static function returnwhere($everytime, $globalSearch, $columnSearch) {
        $where = '';
        if (count($everytime)) {
            $where = $where == "" ? implode('AND ', $everytime) : 'AND ' . implode('AND ', $everytime);
        }
        if (count($globalSearch)) {
            $where = $where == "" ? '(' . implode(' OR ', $globalSearch) . ')' : $where . ' AND (' . implode(' OR ', $globalSearch) . ')';
        }
        if (count($columnSearch)) {
            $where = $where == "" ?
                    implode(' AND ', $columnSearch) :
                    $where . ' AND ' . implode(' AND ', $columnSearch);
        }
        if ($where !== '') {
            $where = 'WHERE ' . $where;
        }
        return $where;
    }

    static function getdata($request, $table, $primaryKey, $columns, $whereResult = null) {
        $conn = array(
            'user' => DB_USER,
            'pass' => DB_PASS,
            'db' => DB_NAME,
            'host' => DB_HOST . ':' . DB_PORT
        );

        $bindings = array();
        $db = self::db($conn);
        $whereAllSql = '';
        // Build the SQL query string from the request
        $limit = self::limit($request, $columns);
        $order = self::order($request, $columns);
        $where = self::filter($request, $columns, $bindings, $whereResult);

        $data = self::sql_exec($db, $bindings, "SELECT `" . implode("`, `", self::pluck($columns, 'db')) . "`
			 FROM `$table`
			 $where
			 $order
			 $limit"
        );

        // Data set length after filtering
        $resFilterLength = self::sql_exec($db, $bindings, "SELECT COUNT(`{$primaryKey}`)
			 FROM   `$table`
			 $where"
        );
        $recordsFiltered = $resFilterLength[0][0];
        // Total data set length
        $resTotalLength = self::sql_exec($db, $bindings, "SELECT COUNT(`{$primaryKey}`)
			 FROM   `$table` " .
                        $whereAllSql
        );
        $recordsTotal = $resTotalLength[0][0];

        return array(
            "draw" => isset($request['draw']) ?
            intval($request['draw']) :
            0,
            "recordsTotal" => intval($recordsTotal),
            "recordsFiltered" => intval($recordsFiltered),
            "data" => self::data_output($columns, $data)
        );
    }

    static function sql_connect($sql_details) {
        try {
            $db = @new PDO(
                    "mysql:host={$sql_details['host']};dbname={$sql_details['db']}", $sql_details['user'], $sql_details['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        } catch (PDOException $e) {
            self::fatal(
                    "An error occurred while connecting to the database. " .
                    "The error reported by the server was: " . $e->getMessage()
            );
        }
        return $db;
    }

    static function sql_exec($db, $bindings, $sql = null) {
        if ($sql === null) {
            $sql = $bindings;
        }
        $stmt = $db->prepare($sql);
        if (is_array($bindings)) {
            for ($i = 0, $ien = count($bindings); $i < $ien; $i++) {
                $binding = $bindings[$i];
                $stmt->bindValue($binding['key'], $binding['val'], $binding['type']);
            }
        }
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            self::fatal("An SQL error occurred: " . $e->getMessage());
        }
        return $stmt->fetchAll(PDO::FETCH_BOTH);
    }

    static function fatal($msg) {
        echo json_encode(array(
            "error" => $msg
        ));
        exit(0);
    }

    static function bind(&$a, $val, $type) {
        $key = ':binding_' . count($a);
        //print_r($a);
        $a[] = array(
            'key' => $key,
            'val' => $val,
            'type' => $type
        );
        return $key;
    }

    static function pluck($a, $prop) {
        $out = array();
        for ($i = 0, $len = count($a); $i < $len; $i++) {
            if (isset($a[$i][$prop])) {
                $out[] = $a[$i][$prop];
            }
        }
        return $out;
    }

}
