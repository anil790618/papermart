<?php
namespace App\Controllers;
use App\Models\Main_model;
use CodeIgniter\Controller;

class SaleController extends BaseController
{
 

    public function index()
    {
        if ($this->session->get('user')) 
        {
            return redirect()->to('dashboard');
        }
        else 
        {
            return redirect()->to('login');
        }
    }


    

    public function sale()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
         $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
        
         $data['notification'] = $this->main_model->getQueryAllData("select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc");
        //  $query = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc");
        //  $nid=$query[0]['id']??'';
        //  if($nid){
        //      $data['ordertracking'] = $this->main_model->getQueryAllData("select * from ordertracking where order_id = '$nid' order by added_date asc");

        //  }else{
        //     $data['ordertracking']="";
        //  } 
         $data['ur_id'] = $this->memberID;
         $data['style'] = array(

            'public/public/css/style.css',
            'public/public/vendor/toastr/css/toastr.min.css',
            'public/public/vendor/sweetalert2/dist/sweetalert2.min.css',
             'public/public/vendor/pickadate/themes/default.css',
            'public/public/vendor/pickadate/themes/default.date.css');
        $data['javascript'] = array(
            'public/public/vendor/global/global.min.js',
            'public/public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'public/public/js/custom.min.js',
            'public/public/js/deznav-init.js',
            'public/public/vendor/toastr/js/toastr.min.js',
            'public/public/js/plugins-init/toastr-init.js',
            'public/public/vendor/sweetalert2/dist/sweetalert2.min.js',
            'public/public/js/bootstrap.bundle.min.js',
            'public/public/vendor/moment/moment.min.js',
            'public/public/vendor/pickadate/picker.js',
            'public/public/vendor/pickadate/picker.date.js',
            'public/public/js/plugins-init/pickadate-init.js',
            'public/public/js/dashboard/dashboard.js',
            'public/public/js/ajax.js',
            'public/public/js/customer.js',
            'public/public/js/vehicle.js',
            'public/public/js/purchase.js',
            'public/public/js/product.js',
            'public/public/js/profile.js',
            'public/public/js/list.js',
            'public/public/js/vendor.js',
            'public/public/js/url.js',
            'public/public/js/browser-navigation.js');


            $data['title'] ="Sale";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getSale()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
      
            // $data['query'] = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno,(select payment_terms from listed_products where listed_products.list_id = orders.list_id) as p_terms, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc");
            if($this->memberID==1){
                $data['query'] = $this->main_model->getQueryAllData("select listed_products.payment_terms,orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno,(select id from transport_request where transport_request.order_id = orders.id )as trid  from sales join orders on sales.order_id = orders.id  RIGHT join listed_products on  listed_products.id=orders.list_id  where sales.deleted = 0  order by sales.added_date desc;");
    
                $data['query1'] = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno , (select id from transport_request where transport_request.order_id = orders.id )as trid from purchases join orders on purchases.order_id = orders.id  where purchases.deleted = 0  order by purchases.added_date desc");
               }else{
            $data['query'] = $this->main_model->getQueryAllData("select orders.id as order_id,listed_products.payment_terms,orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno,(select wastpaper_quality.sub_category from wastpaper_quality where wastpaper_quality.listed_product_id = listed_products.id)as subcategory,(select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  RIGHT join listed_products on  listed_products.id=orders.list_id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc;");

            $data['query1'] = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno , (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid from purchases join orders on purchases.order_id = orders.id  where purchases.deleted = 0 and purchases.added_by = $this->memberID order by purchases.added_date desc");
               }
            // print_r($data['query'][0]);
            $data['title'] ="Sale";
           return view('sale/sale',$data);
       
    }

    public function addSale()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
         $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
        
         $data['notification'] = $this->main_model->getQueryAllData("select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc");
        //  $query = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc");
        //  $nid=$query[0]['id']??'';
        //  if($nid){
        //      $data['ordertracking'] = $this->main_model->getQueryAllData("select * from ordertracking where order_id = '$nid' order by added_date asc");

        //  }else{
        //     $data['ordertracking']="";
        //  }
          $data['ur_id'] = $this->memberID;
         $data['style'] = array(

            'public/public/css/style.css',
            'public/public/vendor/toastr/css/toastr.min.css',
            'public/public/vendor/sweetalert2/dist/sweetalert2.min.css',
             'public/public/vendor/pickadate/themes/default.css',
            'public/public/vendor/pickadate/themes/default.date.css');
        $data['javascript'] = array(
            'public/public/vendor/global/global.min.js',
            'public/public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'public/public/js/custom.min.js',
            'public/public/js/deznav-init.js',
            'public/public/vendor/toastr/js/toastr.min.js',
            'public/public/js/plugins-init/toastr-init.js',
            'public/public/vendor/sweetalert2/dist/sweetalert2.min.js',
            'public/public/js/bootstrap.bundle.min.js',
            'public/public/vendor/moment/moment.min.js',
            'public/public/vendor/pickadate/picker.js',
            'public/public/vendor/pickadate/picker.date.js',
            'public/public/js/plugins-init/pickadate-init.js',
            'public/public/js/dashboard/dashboard.js',
            'public/public/js/ajax.js',
            'public/public/js/customer.js',
            'public/public/js/vehicle.js',
            'public/public/js/purchase.js',
            'public/public/js/product.js',
            'public/public/js/profile.js',
            'public/public/js/list.js',
            'public/public/js/vendor.js',
            'public/public/js/url.js',
            'public/public/js/browser-navigation.js');


            $data['title'] ="Add Sale";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getAddSale()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['ordercount'] = $this->main_model->getNumRow("orders", 'id', " is_deleted=0");
        $data['title'] ="Add Sale";
       return view('sale/add-sale',$data);
       
    }

    public function submitSale()
    {
        if ($this->request->isAJAX()) 
        {
           $rules = [ "order_date" => ["label" => "Sale Date ","rules" => "required"]  ];
           if ($this->validate($rules)) 
           {
            $order_number                  = $this->request->getpost("order_number");
            $order_date                    = $this->request->getpost("order_date");
            $order_to_id                   = $this->request->getpost("order_to_id");
            $order_to_name                 = $this->request->getpost("order_to_name");
            $order_to_mobile               = $this->request->getpost("order_to_mobile");
            $payment_status                = $this->request->getpost("payment_status");
            $order_remark                  = $this->request->getpost("description");
            $order_type                    = $this->request->getpost("order_type");
            $vehicledetail                 = $this->request->getpost("vehicledetail");
            $ddays                         = $this->request->getpost("ddays");
            $pterms                        = $this->request->getpost("pterms");
            $dtype                        = $this->request->getpost("delivery_type");

            $specificationid              = $this->request->getpost("specificationid");
            $product_id                   = $this->request->getpost("product_id");
            $qty                          = $this->request->getpost("qty");
            $rate                         = $this->request->getpost("rate");
            $price                        = $this->request->getpost("price");
            $insurance_cost               = $this->request->getpost("insurance_cost");
            $tax                          = $this->request->getpost("tax");
            $discount                     = $this->request->getpost("discount");
            $total_price                  = $this->request->getpost("total_price");
            $deckle                       = $this->request->getpost("deckle") ?? 0;
            if($order_type =='2')
            {

                $response_id                   = $this->request->getpost("response_id");
                $accepted_id                   = $this->request->getpost("accepted_id");
               $list_id                        = $this->request->getpost("list_id") ?? '';
                $rate_id                       = $this->request->getpost("rate_id") ?? '';
                $data['list_id']               = $list_id ;
                $data['rate_id']               = $rate_id ;
                $data['purchase_id']           = $accepted_id ;
                $data['ddays']                  = $ddays ;  
                $data['pterms']                 = $pterms ;
                $data['dtype']                  = $dtype ;  
                $data['delivery_date']          = date('Y-m-d', strtotime("+".$ddays. " days"));
            }

            $data['order_number']           = $order_number ;
            $data['order_date']             = $order_date ;
            $data['order_to_id']            = $order_to_id ;
            $data['order_to_name']          = $order_to_name ;
            $data['order_to_mobile']        = $order_to_mobile ;
            $data['payment_status']         = $payment_status ; 
            $data['order_type']             = $order_type ; 
            $data['vehiclestatus']          = 0;
            $data['order_remark']           = $order_remark ;  
            $data['order_status']           = 1 ;
            $data['sale_id']                = $this->memberID ;
            $data['added_by']               = $this->memberID ;
            $data['added_date']             = $this->currentDate;
            
            $check = $this->main_model->insert_table('orders', $data);

            if($check){

                $saledata['order_id']                       = $check; 
                $saledata['added_by']                       = $this->memberID; 
                $saledata['added_date']                     = $this->currentDate; 
                $this->main_model->insert_table("sales",$saledata);

                $ordertracking['order_id']                       = $check; 
                $ordertracking['description']                    = 'Order Placed Successfully'; 
                $ordertracking['added_by']                       = $this->memberID; 
                $ordertracking['added_date']                     = $this->currentDate; 
                $this->main_model->insert_table("ordertracking",$ordertracking);

               
                if($order_type =='2'){
                       
                        if($deckle == 1){
                            $ops['order_id'] = $check;
                            $responsesuccess = $this->main_model->update_table('ordered_product_specification', $ops ,"list_id='$list_id'");
                        }

                    //    $addby= $this->main_model->getRowData("listed_products", "*", "id = '$list_id'");


                        $purchasedata['order_id']                       = $check; 
                        $purchasedata['added_by']                       = $accepted_id; 
                        $purchasedata['added_date']                     = $this->currentDate; 
                        $this->main_model->insert_table("purchases",$purchasedata);

                        $returnData['pstat'] = 'true';

                        $response['status'] = '1';
                        $cresponse['status'] = '2';
                        $responsesuccess = $this->main_model->update_table('response', $response ,"id='$response_id'");
                       

                        if ($responsesuccess) 
                        {
                            $returnData['responsestat'] = 'true';
                            $list_data['order_id'] = $check;
                            $list_data['list_status'] = '1';
                            $list_data['accepted_by'] = $accepted_id;
                            $list_data['accepted_date'] = $this->currentDate;
                            $this->main_model->update_table('listed_products', $list_data ,"id='$list_id'");
                             $returnData['liststat'] = $list_id;

                        }
                         $cancelresponse = $this->main_model->update_table('response', $cresponse ,"id!='$response_id' and list_id = $list_id");
                    }

                $ptotal = 0;
                $pqty = 0;

                for($i=0; $i<count($specificationid); $i++){

                    $data1['orders_id']         = $check ;
                    $data1['order_number']      = $order_number ;
                    $data1['specificationid']      = $specificationid[$i];      
                    $data1['qty']                  = $qty[$i] ;
                    $data1['rate']                 = $rate[$i] ;  
                    $data1['price']                = $price[$i] ;
                    $data1['tax']                  = $tax[$i] ;
                    $data1['discount']             = $discount[$i] ;  
                    $data1['total_price']          = $total_price[$i] ;
                    $data1['insurance_cost']       = $insurance_cost[$i] ;
                    $data1['added_by']             = $this->memberID ;
                    $data1['added_date']           = $this->currentDate;

                    $check1 = $this->main_model->insert_table('order_product', $data1);
                   
                    
                    $ptotal = $ptotal + (float)$total_price[$i];
                    $pqty = $pqty + (float)$qty[$i];
                   
                    }
                    if($payment_status== 1){
                        $data3['transaction_number']   = $sale_number ;
                        $data3['order_id']             = $check ;
                        $data3['pay_recieve']          = 'Debited' ;
                        $data3['trans_type']           = '2' ;
                        $data3['amount']               = $ptotal ;
                        $data3['qty']                  = $pqty;
                        $data3['added_by']             = $this->memberID ;
                        $data3['added_date']           = $this->currentDate;
                        $check3 = $this->main_model->insert_table('daybook', $data3);
                    }
                   

                    $data4['total_price']          = $ptotal ;
                    $data4['qty']                  = $pqty;

                     $check4 = $this->main_model->update_table('orders', $data4, "id = '$check'");
                     
                

                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Sale Order Added Successfully';
                    $returnData['data'] = $order_type;
                    echo json_encode($returnData);
              
            }
            else 
            {
                $returnData['success'] = 'false';
                $returnData['message'] = 'Something went wrong!';
                $returnData['data']    = '';
                echo json_encode($returnData);
            } 
            $check_size = $this->main_model->getRowData("ordered_product_specification", "send_size", "list_id = '$list_id'");
            if($check_size){
                 if(empty($check_size)|| $check_size==''){
                    // ********************************************************/
                    $salerid =  $this->main_model->getRowData('orders', "purchase_id", "list_id = '$list_id'");
                    $userid=$salerid['purchase_id'];
                    $user_type=  $this->main_model->getRowData("users", "user_type", "id = '$userid'");
                    $data_notification['url']="send-listresponse/$list_id";
                    $data_notification['added_by'] = $this->memberID  ;
                    $data_notification['title']="Upload Product Size";
                    $data_notification['description']="Upload Product size within 1 Hours";
                    $data_notification['added_date'] = $this->currentDate;
                    $data_notification['notification_for_id']=$salerid['purchase_id'];
                    $data_notification['notification_for']=$user_type['user_type'];
                    $notification = $this->main_model->insert_table('notification', $data_notification );
                    $notification;
                    // ********************************************************
                 }
            }
               
            }
            else
            {
               $returnData['error']                         = true ;
               $returnData['sale_date']                    = $this->validation->getError('sale_date');
                   
                echo json_encode($returnData);
            }
        }
    }

    public function getClient()
    {
        $return['success'] = false;
        if($this->request->isAJAX())
        {
            $search = '';
            $word=$this->request->getpost("search");
            if(!empty($word))
            {
                $search_param = "%{$word}%";
                $data['client'] = $this->main_model->getQueryAllData("select * from vendors where deleted = '0'  and ( vendor_name like '$search_param' or phone_number like '$search_param' ) and is_active = 1 and added_by = $this->memberID order by vendor_name asc");
                if(!empty($data['client']))
                {   
                    $return['success'] = true;
                    $return['list']    = $data['client'];
                }
            }
            echo json_encode($return, true);
        }
    } 

    public function getSearchProducts()
    {
        $return['success'] = false;
        if($this->request->isAJAX())
        {
            $search = '';
            $word=$this->request->getpost("search");
            if(!empty($word))
            {   
                $q1 = '';

                $usertype = $this->userType;
                if($usertype == 1){
                    $q1 = 'and product.id != 2';

                }
                $search_param = "%{$word}%";
                $data['product'] = $this->main_model->getQueryAllData("select * from product where deleted = '0'  and ( product.added_by = '$this->memberID' or product.added_by = '1') $q1 and ( product_name like '$search_param' )  order by product_name asc");
                if(!empty($data['product']))
                {   
                    $return['success'] = true;
                    $return['list']    = $data['product'];
                }
            }
            echo json_encode($return, true);
        }
    } 


    // public function submitOrderspecification()
    // {
    //     if ($this->request->isAJAX()) 
    //     {
    //        $rules = [
    //             "orderid" => ["label" => "order id ","rules" => "required"]

    //             ];
    //        if ($this->validate($rules)) 
    //        {
            
    //         $orderid                    = $this->request->getpost("orderid");
    //         $size                       = $this->request->getpost("size");
    //         $quantity                   = $this->request->getpost("quantity");
           

    //         $data['vehiclestatus']             = 2;
            
    //         $check = $this->main_model->update_table('orders', $data, "id = '$orderid'");
            
    //         if($check){

    //             for($i=0; $i<count($size); $i++){

    //                 $data1['order_id']         = $orderid ;
    //                 $data1['size']              = $size[$i] ;
    //                 $data1['quantity']           = $quantity[$i] ;  
    //                 $data1['added_by']             = $this->memberID ;
    //                 $data1['added_date']           = $this->currentDate;

    //                 $check1 = $this->main_model->insert_table('ordered_product_specification', $data1);
    //             }
    //              $returnData['success'] = 'true';
    //             $returnData['message'] = 'Order Dispatched Successfully Successfully';
               
    //             echo json_encode($returnData);
    //         }
    //         else
    //         {
    //             $returnData['success'] = 'false';
    //             $returnData['message'] = 'Something went wrong!';
    //             $returnData['data']    = $orderid;
    //             echo json_encode($returnData);
    //         } 
               
    //         }
    //         else
    //         {
    //            $returnData['error']                         = true ;
    //            $returnData['sale_date']                    = $this->validation->getError('sale_date');
                   
    //             echo json_encode($returnData);
    //         }
    //     }
    // }


    public function getPaymentdata()
    {
        
        $orderid         = $this->request->getpost('id');
       
        $orderdata = $this->main_model->getRowData("orders", "*", "id = '$orderid'");
        $amountrecieve = $this->main_model->getQueryRowData("select sum(amount) as recieveamount from daybook where order_id = $orderid  and recieve_id = $this->memberID");
            
            $returnData['success']       =   'true';
            $returnData['orderdata']     =   $orderdata;
            $returnData['amountrecieve']     =   $amountrecieve;
            echo json_encode($returnData);
        
        
    }

    public function confirmSale()
    {
        
        $id = $this->request->getpost('id');

        $data['order_status'] = 1;
//         echo $id;
//         echo "<br>";
// print_r($data);
        $check = $this->main_model->update_table("orders", $data, "id = '$id'");
        if ($check) {
            $returnData['success']   =   'true';
            $returnData['message']   =   'Sale Confirmed Successfully  ';
            $returnData['data']      =   '';    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }

        public function saleinvoice($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
        
        
        $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
         $data['notification'] = $this->main_model->getQueryAllData("select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc");
        //  $query = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc");
        //  $nid=$query[0]['id']??'';
        //  if($nid){
        //      $data['ordertracking'] = $this->main_model->getQueryAllData("select * from ordertracking where order_id = '$nid' order by added_date asc");

        //  }else{
        //     $data['ordertracking']="";
        //  } 
         $data['ur_id'] = $this->memberID;
         $data['style'] = array(

            'public/public/css/style.css',
            'public/public/vendor/toastr/css/toastr.min.css',
            'public/public/vendor/sweetalert2/dist/sweetalert2.min.css',
             'public/public/vendor/pickadate/themes/default.css',
            'public/public/vendor/pickadate/themes/default.date.css');
        $data['javascript'] = array(
            'public/public/vendor/global/global.min.js',
            'public/public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'public/public/js/custom.min.js',
            'public/public/js/deznav-init.js',
            'public/public/vendor/toastr/js/toastr.min.js',
            'public/public/js/plugins-init/toastr-init.js',
            'public/public/vendor/sweetalert2/dist/sweetalert2.min.js',
            'public/public/js/bootstrap.bundle.min.js',
            'public/public/vendor/moment/moment.min.js',
            'public/public/vendor/pickadate/picker.js',
            'public/public/vendor/pickadate/picker.date.js',
            'public/public/js/plugins-init/pickadate-init.js',
            'public/public/js/dashboard/dashboard.js',
            'public/public/js/ajax.js',
            'public/public/js/customer.js',
            'public/public/js/vehicle.js',
            'public/public/js/purchase.js',
            'public/public/js/product.js',
            'public/public/js/profile.js',
            'public/public/js/list.js',
            'public/public/js/vendor.js',
            'public/public/js/url.js',
            'public/public/js/browser-navigation.js');

                $data['title'] ="Listed Purchase ";
               return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getSaleInvoice($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['zeto'] = $this->main_model->getRowData("users", "*", "id = '1'");
        
       $data['rate'] = $this->main_model->getQueryRowData("select orders.*,sales.saleinvoice, product_category.product_category as catname ,product_category.product_specification as specification,listed_products.category from orders join listed_products on listed_products.id = orders.list_id join product_category on listed_products.category = product_category.id join sales on sales.order_id= orders.id  where orders.id  ='$id'");
    //    print_r($data['rate']);
        // $vehicalid=$data['rate'][0]['vehicle_id'];
        $data['ratespecification'] = $this->main_model->getQueryAllData("select order_product.*,  ls.sub_category, ls.mill_name, ls.size, ls.size_uom, ls.gsm, ls.quantity_uom, ls.quantity_type, ls.quality, ls.bf, ls.type, ls.quantity from order_product join list_specification ls on ls.id = order_product.specificationid  where orders_id = '$id' ");  
  
        $data['title'] =" Sale Invoice";
       return view('sale/saleinvoice',$data);
    }


    
}
