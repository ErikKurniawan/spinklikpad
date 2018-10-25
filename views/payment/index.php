
<style>
    .payment-title
    {
        font-size:18px;
        color:#6a6c6c;
        line-height: 40px;
    }
    .payment-title span
    {
        color:#733f98;
        font-weight: bold;
    }

    .payment-order
    {
        font-size:13px;
        color:#6a6c6c;
        line-height: 30px;
    }
    .payment-order span
    {
        color:#733f98;
        font-weight: bold;
    }
    .payment-info
    {

        line-height: 30px;
        font-size:13px;
        color:#6a6c6c;
    }
    .payment-info span
    {
        font-weight: bold;
        color:#1b1e21;
    }
    .payment-info-detail span
    {

        line-height: 30px;
        font-size:16px;
        color:#6a6c6c;

    }


    .payment-virtual
    {
        margin-bottom:20px;
        font-size:13px;
        color:#6a6c6c;
        line-height: 30px;
    }

    .payment-virtual div
    {
        font-size:18px;
        color:#d91b5b;

    }

    .payment-info-detail ol
    {
        margin-top: 10px;

        padding: 0px 15px 0px 15px;
    }

    .payment-info-detail ol li
    {
        line-height: 25px;
        font-size:13px;
        color:#6a6c6c;
    }

    .payment-info-detail ol li span
    {
        font-size:13px;
        font-weight: bold;
    }
    
    .virtual-number
    {
        display: inline-block;
        color:#d91b5b;
    }
</style>
</style>
<div style="min-height: 530px;">
    <div class="container-fluid content section">
        <div class="row">
            <div class="col-12 payment-title">
                Terima kasih, <span><?=$name_login_customer?></span>    
            </div>
        </div>
        <div class="row">
            <div class="col-12 payment-order">
                Nomor Transaksi <span>18378201018</span>    
            </div>
        </div>
        <div class="row">
            <div class="col-12 payment-info">
                Transaksi akan diproses jika anda melakukan pembayaran sebeum tanggal <span><?= date("Y M d")."  00:00:00"?></span>    
            </div>
        </div>
        <div class="row">
            <div class="col-12 payment-virtual">
                No Virtual Account
                <div>69696008176877500</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 payment-info-detail">
                <span>Petunjuk Pembayaran</span>
                <ol class="e">
                    <li>Login Pada aplikasi M-BCA dan masukkan PIN</li>
                    <li>Pilih "<span>Transfer</span>", pilih "<span>Virtual Transfer</span>"</li>
                    <li>Klik "Input No Virtual Account", Lalu  masukkan no BCA Virtual Account <div class="virtual-number">69696008176877500</div></li>
                    <li>Klik "OK" & "Send"</li>
                    <li>Periska Data Transaksi Lalu Klik "OK"</li>
                    <li>Masukkan Nominal Transfer, Isi Kolom Berita Dengan No Transaksi <span>18378201018</span> Kemudian Masukkan Pin BCA</li>
                    <li>Periksa Kembali Pesanan Anda Lalu Tekan OK</li>
                </ol>
            </div>
        </div>
    </div>
</div>