

<style>
    .btn-profile-change
    {
        background: #d91b5b;
        font-size:10px;
        color: #fff !important;

    }
    .btn-profile-change i
    {
        background: #d91b5b;
        color: #fff;

    }
    .profile-name
    {
        padding:10px 0px;
        font-weight: bold;
        font-size:16px;
        color: #733f98 ;
    }


    .profile-data
    {
        padding:5px 0px;
        border-bottom:1px solid #e2e7e9;
        font-size: 14px;
    }
    .profile-data i
    {
        color :#95999A;
    }

    .profile-data span
    {
        padding-left:10px;
        color:#6a6c6c;
    }

    .profile-data:last-child
    {
        border-bottom:none;
    }

    .profile-title
    {
        color:#733f98;
        font-size:14px;
        border-bottom: 1px solid #e2e7e9;
        padding: 5px 0px;
    }

    .profile-fav-supplier img
    {
        border:1px solid #95999A;
        width: 70px;
        height: 70px;
    }

    .profile-container-supplier-icon
    {
        display: inline-block;
    }

    .profile-container-supplier-icon div
    {
        font-size: 12px;
        color:#d91b5b;
        text-align: center;
        white-space: nowrap; 
        width: 70px; 
        overflow: hidden;
        text-overflow: ellipsis; 
    }

    input[type="file"] {
        display: none;
    }
    .custom-file-upload {
        border: 1px solid #ccc;
        width: 100%;
        line-height: 30px;
        height: 30px;
        text-align: center;
        cursor: pointer;
    }
    img
    {
        width: 100%;
    }

    .profile-address
    {
        font-size: 14px;
    }


    .sps {
        padding: 1em .5em;
        position: fixed;
        top: 0;
        left: 0;
        transition: all 0.25s ease;
        width: 100%;
    }

    .sps--abv {
        background-color: transparent;
        color: #000;
    }

    .sps--blw {

        color: #fff;
    }
</style>

<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
// Shorthand for $( document ).ready()
    $(function () {
        $("#file-upload").change(function () {
            readURL(this);
        });
    });

</script>




<div class="container-fluid section content">


    <div class="row">
        <div class="col-2" >


            <div class="sps sps--abv position-sticky" style=" border: 0px solid black;padding: 5px 0px;">
                <div style="background: red;height: 400px;">etalase</div>
            </div>
        </div>

        <div class="col-10">

            <div style="border:1px solid #e2e7e9;padding:10px;">

                <ul style="border-bottom:1px solid #e2e7e9;" class="nav nav-pills mb-3 i-tab" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Biodata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Daftar Alamat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Ganti Sandi</a>
                    </li>
                </ul>

                <div class="row">
                    <div class="col-4" style="">

                        <div style="border:1zpx solid #d2d2d2;padding:10px;background: #f7f7f7;">
                            <img class="img-fluid" id="blah" src="#" alt="your image" />
                            <label for="file-upload" class="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> Upload File
                            </label>
                            <input id="file-upload" type="file"/>
                        </div>





                    </div>
                    <div class="col-8">
                        <form id="frmprofileedit">
                            <div class="form-group row">
                                <div class="col-4"><label for="user">Sandi Saat ini</label></div>
                                <div class="col-8"><input type="text" autocomplete="off" id="user" name="user" class="form-control"  placeholder="Sandi Saat ini"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-4"><label for="user">Sandi Baru</label></div>
                                <div class="col-8"><input type="text" id="dob" name="dob" class="form-control" aria-describedby="emailHelp" placeholder="Sandi Baru"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-4"><label for="user">Konfirmasi Sandi Baru</label></div>
                                <div class="col-8"><input type="text" id="dob" name="dob" class="form-control" aria-describedby="emailHelp" placeholder="Konfirmasi Sandi Baru"></div>
                            </div>


                            <button type="submit" class="float-right btn btn-primary">Perbarui Data</button>
                        </form>

                    </div>
                </div>
            </div>

            <hr/>
            <div style="border:1px solid #e2e7e9;padding:10px 0px;">

                <ul style="border-bottom:1px solid #e2e7e9; padding-left: 15px;" class="nav nav-pills mb-3 i-tab" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Biodata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Daftar Alamat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Ganti Sandi</a>
                    </li>
                </ul>

                <div class="row">
                    <div class="col " >
                        <div style="padding:0px 15px;" class="profile-address">
                            <div style="border-bottom:1px solid #d2d2d2;padding:10px 0px;margin-bottom:10px;">
                                <div style="display: table-cell;width:150px;border:0px solid red;">Penerima</div>
                                <div style="display: table-cell;width:400px;border:0px solid red;">Alamat</div>
                                <div style="display: table-cell;width:150px;border:0px solid red;">Daerah Pengirim</div>
                                <div style="display: table-cell;width:80px;border:0px solid red;">pin point</div>
                                <div style="display: table-cell;border:0px solid red;"></div>
                            </div>
                            <div style="display: table;width: 100%;border:0px solid red;">
                                <div style="display: table-cell;width:20px;border:0px solid red;"><input type="radio"></div>
                                <div style="display: table-cell;width:130px;border:0px solid red;">Erik</div>
                                <div style="display: table-cell;width:400px;border:0px solid red;">blablabalalba</div>
                                <div style="display: table-cell;width:150px;border:0px solid red;">Jakarta barat <br/> Kebon Jeruk <br/> Duri kepa</div>
                                <div style="display: table-cell;width:80px;border:0px solid red;"><i class="fas fa-map-marker-alt"></i></div>
                                <div style="display: table-cell"><a class="btn-sm btn btn-primary">Ubah</a> <a class="btn-sm btn btn-primary">Hapus</a></div>
                            </div>
                            <div style="display: table;width: 100%;border:0px solid red;">
                                <div style="display: table-cell;width:20px;border:0px solid red;"><input type="radio"></div>
                                <div style="display: table-cell;width:130px;border:0px solid red;">Erik</div>
                                <div style="display: table-cell;width:400px;border:0px solid red;">blablabalalba</div>
                                <div style="display: table-cell;width:150px;border:0px solid red;">Jakarta barat <br/> Kebon Jeruk <br/> Duri kepa</div>
                                <div style="display: table-cell;width:80px;border:0px solid red;"><i class="fas fa-map-marker-alt"></i></div>
                                <div style="display: table-cell"><a class="btn-sm btn btn-primary">Ubah</a> <a class="btn-sm btn btn-primary">Hapus</a></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <hr/>

            <div style="border:1px solid #e2e7e9;padding:10px;">

                <ul style="border-bottom:1px solid #e2e7e9;" class="nav nav-pills mb-3 i-tab" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Biodata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Daftar Alamat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Ganti Sandi</a>
                    </li>
                </ul>

                <div class="row">
                    <div class="col-4" style="">

                        <div style="border:1zpx solid #d2d2d2;padding:10px;background: #f7f7f7;">
                            <img class="img-fluid" id="blah" src="#" alt="your image" />
                            <label for="file-upload" class="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> Upload File
                            </label>
                            <input id="file-upload" type="file"/>
                        </div>





                    </div>
                    <div class="col-8">
                        <form id="frmprofileedit">
                            <div class="form-group row">
                                <div class="col-4"><label for="user">Nama</label></div>
                                <div class="col-8"><input type="text" autocomplete="off" id="user" name="user" class="form-control" aria-describedby="emailHelp" placeholder="email@sample.com"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-4"><label for="user">Tanggal Lahir</label></div>
                                <div class="col-8"><input type="text" id="dob" name="dob" class="form-control" aria-describedby="emailHelp" placeholder="yyyy/mm/dd"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-4"><label for="user">Jenis Kelamin</label></div>
                                <div class="col-8"><input type="radio" name="male" id="male" value="1">  <label for="male">Laki - Laki</label> <input type="radio" name="male" id="male" value="1">  <label for="male">Wanita</label> </div>
                            </div>


                            <button type="submit" class="float-right btn btn-primary">Perbarui Data</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>





