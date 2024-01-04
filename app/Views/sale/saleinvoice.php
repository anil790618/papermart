<?php
use App\Models\Main_model;
$this->main_model= new Main_model();

?>
                    
                        
<div class="container-fluid">
 
<div class="card-header p-0">
    <h4 class="card-title m-2"> Sale Invoice </h4>
    <div class="pull-right float-end ">
        <ul class="nav nav_filter ">
            <li class="nav-item text-end">
               <button class="btn" style="background-color:green;"  onclick="printDiv('printableArea')" value="print a div!">
                <i class="fa fa-print"></i>
              </button>
            </li>
             <li class="nav-item text-end">
               <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-sale" >Back</a>
              
            </li>
        </ul>
    </div>
</div>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.btn {
  
  border: none;
  color: white;
  padding: 3px 20px;
  font-size: 18px;
  cursor: pointer;
  margin-bottom: 20px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
</style> 
<?php $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
 $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];     ?> 

<div style="margin:5px">
 

 
  
  

</div>

<style>

</style>

  <div id="printableArea" >
  <table class="table-bordered" style="border: 2px solid black; margin:10px; width:95%">
    <tr>
      <td colspan="11" style="border: 2px solid black; text-align: center;font-size:18px">TAX INVOICE</td>
    </tr>
    <tr>
      <td colspan="11" style="border: 2px solid black; text-align: center;font-size:14px"><b style="font-size:20px"> <?=$memberDetail['company_name']?></b> <br>Invoice Location : <?=$memberDetail['address']?>, <?=$memberDetail['phone_number']?>  </td> 

    </tr>
    <tr>
        <!-- <td colspan="11" style=" border: 2px solid black; padding-left:10px; ">
                <h6 style="font-size:18px" > Invoice No.  <b > : <?= $rate['invoiceno']?></b></h6>
                <h6 style="font-size:18px" > Date <b> :  <?= $rate['added_date']?></b></h6>
                <h6 style="font-size:18px" > Order No <b> :  <?= $rate['order_number']?></b></h6>
        </td> -->
         <td colspan="5" style=" border: 2px solid black; padding:10px; ">
                <h6 style="font-size:18px" > Invoice No.  <b > : <?= $rate['invoiceno']?></b></h6>
                <h6 style="font-size:18px" > Dated          <b> :  <?= $rate['added_date']?></b></h6> 
                <h6 style="font-size:18px" > Order No      <b> :  <?= $rate['order_number']?></b></h6>
                <!-- <h6 style="font-size:18px" > GG/RR No.     <b> :   </b></h6> -->
        </td>
        <td colspan="6" style=" border: 2px solid black; padding:10px; ">
        <h6 style="font-size:18px" >Sale Indent    <b>  : SP-KO-005425</b></h6>
        <h6 style="font-size:18px" >Sales Through    <b>  : ABC ZYC</b></h6>
    </tr>
    <tr>
         <td colspan="11" style=" border: 2px solid black; padding-left:10px; ">
                <h6 style="font-size:18px" > IRN No <b > : <?=$gst=$rate['gst']??0?></b></h6>
                <h6 style="font-size:18px" > ACK No <b> : <?=$gst=$rate['sgst']??0?></b></h6>
                <!-- <h6 style="font-size:18px" > ACK Date <b> : </b></h6> -->
        </td>
    </tr>
     <tr >
      <td colspan="3"  style=" border: 2px solid black; padding-left:10px; ">
          <b> Sender (Bill From):- </b>
            <h5 style="font-size:18px"> <?=$memberDetail['company_name']?></h5>
            <h6 style="font-size:18px"><?=$memberDetail['user_name']?> </h6>
            <h6 style="font-size:18px"><?=$memberDetail['address']?></h6>
            <h6 style="font-size:18px"><?=$memberDetail['phone_number']?></h6>
           <h6 style="font-size:18px"> <?=$memberDetail['email']?></h6>
           <h6 style="font-size:18px">Party PAN : AABBC2343k</h6>
            <h6 style="font-size:18px"> GST NO : AABBC2343k</h6>
            <h6 style="font-size:18px">GSTIN/UIN : 07DFGGAA555456</h6>
      </td>

       <td colspan="4"  style=" border: 2px solid black; padding-left:10px; ">
            <b> Recipient (Bill To):- </b>
            <h5 style="font-size:18px"> <?=$zeto['company_name']?></h5>
            <h6 style="font-size:18px"><?=$zeto['user_name']?> </h6>
            <h6 style="font-size:18px"><?=$zeto['address']?></h6>
            <h6 style="font-size:18px"><?=$zeto['phone_number']?></h6>
           <h6 style="font-size:18px"> <?=$zeto['email']?></h6>
           <h6 style="font-size:18px">Party PAN : AABBC2343k</h6>
            <h6 style="font-size:18px"> GST NO : AABBC2343k</h6>
            <h6 style="font-size:18px">GSTIN/UIN : 07DFGGAA555456</h6> 
      </td>
      <td colspan="4" style="border: 2px solid black; padding-left:10px; "> 
            <h6 style="font-size:18px" >Transport    <b>  : TRUCK</b></h6>
               <h6 style="font-size:18px" >Vehicle No    <b>  : <?=$rate['vehicle_no']??''?></b></h6>
               <h6 style="font-size:18px" >Driver Name    <b> : <?=$rate['driver_name']??''?></b></h6>
               <h6 style="font-size:18px" >Driver No      <b> : <?=$rate['driver_phone_number']??''?></b></h6>
                <!-- <h6 style="font-size:18px" > GR  No & Date <b>:</b>  </h6> -->
                <h6 style="font-size:18px" > E-WayBill & Date  <b>:</b> </h6>
      </td>
    </tr>
  
    
   
     <tr >
     
       
    </tr>
    <tr></tr>

    <tr>
      <th style="font-size:18px;  border: 2px solid black; width: 50px; padding-top:10px; padding-bottom: 10px; text-align:center">S.NO. </th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center;">Description of Goods </th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center">HSN Code </th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center">GSM </th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center">Size </th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center">Qty </th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center">Unit </th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center">Price</th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center">Disc</th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center">Disc. Amt</th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center">Amount(Rs)</th>
    </tr>

    <?php
        if ($ratespecification) {
            $i = 1;
            
            foreach ($ratespecification as $value) {
        ?>
         <th style="font-size:18px;  border: 2px solid black; width: 50px; padding-top:10px; padding-bottom: 10px; text-align:center"><?=$i;?></th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center;"> 
    <?php
    $cid=$rate['category'];
    $c_id=$this->main_model->getRowData("product_category", "*", "id = $cid");
    echo $c_id['product_category'];
    
    
    ?>
    </th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center"> </th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center"><?=$value['gsm']?> </th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center"><?=$value['size']?> </th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center"><?=$value['qty']?> </th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center"><?=$value['quantity_uom']?> </th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center"><?=$value['rate']?></th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center"><?=$value['discount']?></th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center"><?=$value['discount']?></th>
      <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center"><?=$value['total_price']?></th>
    </tr>

        <?php } 
        }?>
        <!--  -->
            <tr  style="border: 2px solid black;">
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  " colspan="4"> </td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  " colspan="3">Add : Freight & Forwarding Charge</td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  " colspan="3"></td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  text-align: right; "><?=$fr=$rate['freight_rate']??0?> </td>
            </tr> 
            <tr  style="border: 2px solid black;">
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  " colspan="4"> </td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  " colspan="3">Add : Insurance</td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  " colspan="3"></td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  text-align: right; "><?=$ins=$rate['insurance_no']??0?> </td>
            </tr> 
            <tr  style="border: 2px solid black;">
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  " colspan="4"> </td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  " colspan="3">Add : CGST</td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  " colspan="3">@ 6.00 %</td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  text-align: right; "> <?php
              $p = $value['total_price'];
              $rg = ($p*6)/100;
              echo $rg;
              ?></td>
            </tr> 
            <tr  style="border: 2px solid black;">
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  " colspan="4"> </td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  " colspan="3">Add : SGST</td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  " colspan="3">@ 6.00 %</td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-left:5px; padding-bottom: 5px; padding-right:15px;  text-align: right; "> <?php
              $p = $value['total_price'];
              $rs = ($p*6)/100;
              echo $rs;
              ?></td>
            </tr> 
            <!-- <tr  style="border: 2px solid black;">
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-bottom: 5px; padding-right:15px;  " colspan="4"> </td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-bottom: 5px; padding-right:15px;  " colspan="3">less : Round off(-)</td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-bottom: 5px; padding-right:15px;  " colspan="3"></td>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-bottom: 5px; padding-right:15px;  text-align: right; ">0.29</td>
            </tr>  -->
         
           <tr>
            
            <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-bottom: 5px;  " colspan="10"> </td>
            <?php
            $tc= $rate['total_price']??0;
        $totalprice = $tc+$rg+$rs+$ins+$fr;
            ?>
            <td style="border: 2px solid black; font-size:18px;  padding-top:5px;padding-right:15px; padding-bottom: 5px;  text-align: right; ">Rs. <?= $totalprice;?></td>
          </tr>

           <tr >
            <td colspan='7' style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-bottom: 5px; "><b>Amount in words:</b> <?php $f = new NumberFormatter("en_IN", NumberFormatter::SPELLOUT);
              echo $f->format(str_replace(",","",$totalprice));?> Only.
              <br></td>

          </td>
            
          </tr>
        
      

           
            
             <tr>
              <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-bottom: 5px; vertical-align:top;"  colspan="11"> Declaration : 
                </td>
            </tr>

             <tr>
              <td colspan= "7" style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-bottom: 5px; vertical-align:top;"  colspan="3"> We accept only cheque/draft/ NEFT & RTGS.
                Our Bank Details
                </td>
                
                <td style="border: 2px solid black; font-size:18px;  padding-top:5px; padding-bottom: 5px; vertical-align:top; text-align:right"  colspan="4"> for <?=$memberDetail['company_name']?>
                <br><div class="row" style="padding-left: 30px;">
                 </div><br>
     Authorised signatory
                </td>
            </tr>

         
  </table>
</div>

<script>function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}</script>

 <script>
    function demoFromHTML() {
      //debugger;
       html2canvas($("#printableArea")[0]).then(function (canvas) {
    var img = canvas.toDataURL("image/png");
    var doc = new jsPDF();
    doc.addImage(img, 'JPEG',10,10,190,280);
    doc.save('test.pdf'); 

});
    }
</script>


</div>
<div id="editor"></div>

<script>function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}</script>

 <script>
    function demoFromHTML() {
      //debugger;
       html2canvas($("#printableArea")[0]).then(function (canvas) {
    var img = canvas.toDataURL("image/png");
    var doc = new jsPDF();
    doc.addImage(img, 'JPEG',10,10,200,297);
    doc.save('test.pdf'); 

});
    }


     
</script>

<script type="text/javascript">

        function moveToScreenTwo() {
        ok.moveToNextScreen();
        }
        </script>


<!-- <script>
    function demoFromHTML() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        source = $('#printableArea')[0];  
        specialElementHandlers = {
            '#bypassme': function (element, renderer) {
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };
         pdf.setFontSize(18);
        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                 pdf.save('Test.pdf');
            }, margins
        );
    }
</script> -->





