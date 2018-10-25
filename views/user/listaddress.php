<?php
$listaddress = $this->listaddress;



foreach ($listaddress as $k => $v) {
    $checked = $v['_primary']==1 ? 'checked' :'';
    ?>
    <div style="display: table;width: 100%;border:0px solid red;">
        <div style="display: table-cell;width:200px;border:0px solid red;">
            
            <input <?=$checked?> class="checkbox" id="seq_<?= $v['_seq'] ?>" data="<?= $v['_seq'] ?>"  type="radio">

            <label class="" for="#seq_<?= $v['_seq'] ?>"><?= $v['_name'] ?></label>
        </div>
        <div style="display: table-cell;width:300px;border:0px solid red;">
            <i class="fas fa-map-marker-alt"></i> <?= $v['_address'] ?></div>
        <div style="display: table-cell;width:250px;border:0px solid red;">
            <?= $v['_province'] ?> 
            <br/> <?= $v['_subprovince'] ?> 
            <br/> <?= $v['_district'] ?>
            <br/> <?= $v['_subdistrict'] ?>
            <br/> <?= $v['_zipcode'] ?>
        </div>

        <div style="display: table-cell">
            <a href="#" data="<?= $v['_seq'] ?>" class="btn-sm btn-addr-edit" style role="button">Ubah</a> 
            <br>
            <br>
            <a href="#" data="<?= $v['_seq'] ?>" class="btn-sm btn-addr-del" role="button">Hapus</a> 

        </div>
    </div>
    <?php
}
?>