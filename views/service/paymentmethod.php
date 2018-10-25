<style>
    .list-ph {
  list-style: disc !important;
  padding: 0;
  margin: 0;
  
}

list-ph li {
  padding-left: 1em; 
  text-indent: -.7em;
}

 list-ph li::before {
  content: "• ";
  background:indigo !important;
  color: green; /* or whatever color you prefer */
}
    
</style>
<div class="row">
<div class="container" style="border:0px solid red;">
     <h4> CARA PEMBAYARAN</h4>
              <ul style="list-style-type:disc">
                <li><a href="<?php echo URL?>service/paymentmethod/kartu_kredit">• Kartu Kredit</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/bcaklikpay">• BCA Klikpay</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/klikbca">• Klik BCA</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/epay_bri">• e-Pay BRI</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/cimb_clicks">• CIMB Clicks</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/danamon_online_banking">• Danamon Online Banking</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/mandiri_clickpay">• Mandiri Clickpay</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/transfer_bca">• ATM / Bank Transfer BCA</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/transfer_permata">• ATM / Bank Transfer Permata</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/transfer_mandiri">• ATM / Bank Transfer Mandiri</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/transfer_bni">• ATM / Bank Transfer BNI</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/transfer_bank_lainnya">• ATM / Bank Transfer Bank Lainnya</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/indomaret">• Indomaret</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/telkomsel_cash">• Telkomsel Cash</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/line_epay">• LINE Pay e-cash | Mandiri e-cash</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/indosat_dompetku">• Indosat Dompetku</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/xl_tunai">• XL Tunai</a></li>
                <li><a href="<?php echo URL?>service/paymentmethod/gopay">• GO-PAY</a></li>
              </ul>
              <p>&nbsp;</p>
</div>
</div>
