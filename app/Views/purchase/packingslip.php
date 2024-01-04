
<?php
use App\Models\Main_model;
$this->main_model= new Main_model();

?>              
<style>
    .tdh{
        height:40px !important;
    }
</style>     
                        
<div class="container-fluid">
 
 <div class="card-header p-0">
     <h4 class="card-title m-2"> Packing Slip  </h4>
     <div class="pull-right float-end ">
         <ul class="nav nav_filter ">
             <li class="nav-item text-end">
                <button class="btn" style="background-color:green;"  onclick="printDiv('printableArea')" value="print a div!">
                 <i class="fa fa-print"></i>
               </button>
             </li>
              <li class="nav-item text-end">
                <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-purchase" >Back</a>
               
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
       <td colspan='6' class='py-3'  style="border: 2px solid black; text-align: center;font-size:18px">Packing Slip
     </tr>
     <tr>
       <td  class='py-4' colspan='6' style="border: 2px solid black; text-align: center;font-size:14px">
        <b style="font-size:40px"> ZETO</b> <br>Packing Slip 
      </td> 
 
     </tr>
     <tr>
         <td  colspan='2'  style=" border: 2px solid black; padding:10px; ">
                 <h6 style="font-size:18px" > Order No.  <b > :  <?=$packingslip[0]['order_id']?></b></h6>
                 <h6 style="font-size:18px" > Invoice No.  <b > :  <?=$packingslip[0]['invoice_no']?></b></h6>
                 <h6 style="font-size:18px" > Date          <b> :   <?=$packingslip[0]['date']?></b></h6> 
              
         </td>
         <td  colspan='4'  style=" border: 2px solid black; padding:10px; ">
         <h6 style="font-size:18px" >Buyer Name    <b>  : <?=$packingslip[0]['buyer_name']?></b></h6>
         <h6 style="font-size:18px" >Address     <b>  : <?=$packingslip[0]['address']?></b></h6>
           
        </td>
     </tr>
     
      <!-- <?=print_r($packingslip[0])?> -->
 
     <tr>
       <th style="font-size:18px;  border: 2px solid black; width: 100px; padding-top:10px; padding-bottom: 10px; text-align:center">S.NO. </th>
       <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center;"   width="35%">Description  </th>
       <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center">Distinictive No. </th>
       <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center">Net Weight </th>
       <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center">Gross Weight </th>
       <th style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center">Total Units </th> 
     </tr>
     <?php
     $i=1;
     $unit=0;
foreach ($packingslip as $key => $value) {
    $nw =$unit+$value['net_weight'];
    $gw =$unit+$value['gross_weight'];
    $unit =$unit+$value['total_unit'];
   ?>
    <tr style=''>
        <td class='tdh' style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center"><?=$i??''?></td>
        <td class='tdh' style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center" width="35%"><?=$value['description']??''?></td>
        <td class='tdh' style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center"><?=$value['distinictive_no']??''?></td>
        <td class='tdh' style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center"><?=$value['net_weight']??''?></td>
        <td class='tdh' style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center"><?=$value['gross_weight']??''?></td>
        <td class='tdh' style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; text-align:center"><?=$value['total_unit']??''?></td>
     </tr>
   <?php
   $i++;
}

        ?>
     
     <tr>
        <td style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; font-weight:700; color:black; text-align:center"></td>
        <td style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; font-weight:700; color:black; text-align:center" width="35%">Total</td>
        <td style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; font-weight:700; color:black; text-align:center"></td>
        <td style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; font-weight:700; color:black; text-align:center"><?=$nw?></td>
        <td style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; font-weight:700; color:black; text-align:center"><?=$gw?></td>
        <td style="font-size:18px; border: 2px solid black; padding-top:10px; padding-bottom: 10px; font-weight:700; color:black; text-align:center"><?=$unit?></td>
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
 
 
 
 
 
 