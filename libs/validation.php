<?php

class validation {

    function _length($input, $minlength, $maxlength) {
        $min = (empty($minlength) || is_null($minlength) || !is_numeric($minlength)) ? -1 : $minlength ;
        $max = (empty($maxlength) || is_null($maxlength) || !is_numeric($maxlength)) ? 999999999999 : $maxlength ;
        if (strlen(trim($input)) < $min) {
            return 'Minimum length is ' . $min . ' character';
        } else if (strlen(trim($input)) > $max) {
            return 'Maximum length is ' . $max . ' character';
        }
        return null;
    }


    function _date($value, $date_comparation = null, $casedate = null, $format_date = 'd-m-Y') {

       
        $array_format_date = explode('-', $format_date);
        $array_value = explode('-', $value);
        $tarray = count($array_value);
        if ($tarray != 3) {
            return 'format error salah 99 karena totalnya :::' . $tarray;
        }

        $year = '';
        $month = '';
        $day = '';
        foreach ($array_format_date as $key => $valuearr) {
            if ($valuearr == "d") {
                $day = $array_value[$key];
            }
            if ($valuearr == "m") {
                $month = $array_value[$key];
            }
            if ($valuearr == "Y") {
                $year = strlen($array_value[$key]) == 4 ? $array_value[$key] : '';
            }
        }
        if ($day != "" && $month != "" && $year != "") {
            if (!checkdate($month, $day, $year)) {
                return 'Format date ' . $format_date . ' karena ' . $value;
            } else {
                $dateintvalue = date("Ymd", mktime(0, 0, 0, $month, $day, $year));
            }
        } else {
            return 'Format date ' . $format_date . ' karena ' . $value;
        }

        if (!empty($date_comparation)) {

            $array_value = explode('-', $date_comparation);
            $tarray = count($array_value);
            if ($tarray != 3) {
                return 'field comparation wrong 88 format' . $tarray;
            }

            $year = '';
            $month = '';
            $day = '';
            foreach ($array_format_date as $key => $valuearr) {
                if ($valuearr == "d") {
                    $day = $array_value[$key];
                }
                if ($valuearr == "m") {
                    $month = $array_value[$key];
                }
                if ($valuearr == "Y") {
                    $year = strlen($array_value[$key]) == 4 ? $array_value[$key] : '';
                }
            }
            if ($day != "" && $month != "" && $year != "") {

                if (!checkdate($month, $day, $year)) {
                    return 'Format date 8888 ' . $format_date . ' karena ' . $value;
                } else {
                    $dateintcomparation = date("Ymd", mktime(0, 0, 0, $month, $day, $year));
                }
            } else {
                return 'Format date 888888 ' . $format_date . ' karena ' . $value;
            }

            if (!empty($date_comparation) && !empty($casedate)) {

                switch ($casedate) {
                    case '0':
                        if ($dateintvalue == $dateintcomparation) {
                            return 'Tanggal harus sama dengan ' . $value;
                        }
                        break;
                    case '1':
                        if ($dateintvalue < $dateintcomparation) {
                            return 'Tanggal harus lebih besar dari ' . $value;
                        }
                        break;
                    case '2':
                        if ($dateintvalue <= $dateintcomparation) {
                            return 'Tanggal harus lebih besar sama dengan dari ' . $value;
                        }
                        break;
                    case '3':
                        if ($dateintvalue > $dateintcomparation) {
                            return 'Tanggal harus lebih kecil dari ' . $value;
                        }
                        break;
                    case '4':
                        if ($dateintvalue >= $dateintcomparation) {
                            return 'Tanggal harus lebih kecil sama dengan dari ' . $value;
                        }
                        break;
                }
            }
        }
    }

}
