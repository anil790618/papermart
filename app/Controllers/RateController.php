<?php
namespace App\Controllers;
use App\Models\Main_model;
use CodeIgniter\Controller;

class RateController extends BaseController
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


    

    public function rates()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
         $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
         $data['notification'] = $this->main_model->getQueryAllData("select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc");
         $query = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc");
         $nid=$query[0]['id']??'';
         if($nid){
             $data['ordertracking'] = $this->main_model->getQueryAllData("select * from ordertracking where order_id = '$nid' order by added_date asc");

         }else{
            $data['ordertracking']="";
         } $data['ur_id'] = $this->memberID;
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


            $data['title'] ="Rates";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }
    
    public function getRates()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
         $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
        $data['query'] = $this->main_model->getQueryAllData("select rates.*, (select product_category from product_category where product_category.id = rates.category) as cname from rates where deleted = 0 and added_by = $this->memberID  and rate_type = $this->dashboardStatus order by added_date desc");

        $data['title'] ="Rates";
        return view('rate/rate',$data);
    }

    public function postrate()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
        
            $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
         $data['notification'] = $this->main_model->getQueryAllData("select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc");
         $query = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc");
         $nid=$query[0]['id']??'';
         if($nid){
             $data['ordertracking'] = $this->main_model->getQueryAllData("select * from ordertracking where order_id = '$nid' order by added_date asc");

         }else{
            $data['ordertracking']="";
         }  $data['ur_id'] = $this->memberID;
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


            $data['title'] ="List";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getPostrate()
    {
        
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;   
        $data['listcount'] = $this->main_model->getNumRow("listed_products", 'id', "deleted = 0 ");
        $data['product_type'] = $this->main_model->getQueryAllData("select * from product_type where deleted = 0  order by added_date desc");
        $data['product_quality'] = $this->main_model->getQueryAllData("select * from product_quality where deleted = 0  order by added_date desc");
        $data['product_category'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0   and parentid = 0 order by added_date desc");
        $data['product'] = $this->main_model->getQueryRowData("select product.*, product_category.product_specification from product left join product_category on product.product_category = product_category.id where product.id = '0' ");

            $dtype = $this->dashboardStatus;
              $utype = $this->userType;
            if($dtype==1 ){ 
               
                $cid = "and sale_user like '%$utype%'";
            }
            else if($dtype==2 ){ 
               
                $cid = "and buy_user like '%$utype%'";
            }
            

            $data['catdata'] = '';
            $data['category'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0  and parentid = 0  $cid  order by product_category asc");
           
           $data['subcatid'] = '';
        

      

        $data['title'] ="Post Rates";
         return view('rate/post-rate',$data);
       
    }

    public function submitRate()
    {   $returnData['error']                          = 'ajaxerror' ;
        if ($this->request->isAJAX()) 
        {
           $rules = [
             
                // "product_id" => ["label" => "Valid Product","rules" => "required"],
                "rates_offered" => ["label" => "rates_offered ","rules" => "required"],
                // "description" => ["label" => "Description ","rules" => "required"]

                ];
                $returnData['error']                          = 'validation error' ;
           if ($this->validate($rules)) 
           {   
                $dtype = $this->dashboardStatus;
                
                $category                         = $this->request->getpost("category");
                $post_type                          = $this->request->getpost("post_type");
                // $rate_type                          = $this->request->getpost("rate_type");
                $rates_offered                      = $this->request->getpost("rates_offered");
                $description                        = $this->request->getpost("description");
                $pname                              = $this->request->getpost("txtCompany");
                $qty                                = $this->request->getpost("qty");
                $validity                           = $this->request->getpost("validity");
                $specification                      = $this->request->getpost("specification");
                $deckle                             = $this->request->getpost("deckle") ?? '0';
                $rowcount                           = $this->request->getpost("rowcount") ;
                $min_qty                            = $this->request->getpost("min_qty") ;
                $minqty_uom                         = $this->request->getpost("minqty_uom") ;
                $string = $specification ;
                $string = preg_replace('/\.$/', '', $string); 
                $array = explode(',', $string); 
                foreach($array as $value) 
                {
                   
                    if($value == 'size'){
                        $size_length                    = $this->request->getpost('size_length') ;
                        $size_width                    = $this->request->getpost('size_width') ;
                    }
                    else if($value == 'rate'){
                        $normalrate                    = $this->request->getpost('normalrate') ;
                        $saudarate                    = $this->request->getpost('saudarate') ;
                    }
                    else{
                        $$value                    = $this->request->getpost($value) ;
                    }
                }
                
                $data['category']                   = $category; 
                $data['type']                       = $post_type; 
                $data['rate_type']                  = $dtype; 
                $data['rates_offered']              = $rates_offered; 
                $data['description']                = $description; 
                $data['validity']                   = $validity; 
                $data['added_by']                   = $this->memberID; 
                $data['added_date']                 = $this->currentDate; 
                
                $query = $this->main_model->insert_table("rates",$data);
                if ($query) 
                {
                    
                    for($i=0; $i<count($rowcount); $i++){

                        $data2['rate_id']               = $query ;
                        $data2['min_qty']               = $min_qty[$i].' '.$minqty_uom[$i];
                        foreach($array as $value) 
                        {
                           $sl=''; $sw='';
                            if($value == 'size'){
                                $data2['size_length']            = $size_length[$i] ?? '' ;
                                $data2['size_width']             = $size_width[$i] ?? ''  ;
                                $sl            = $size_length[$i] ?? '' ;
                                $sw            = $size_width[$i] ?? ''  ;
                                $data2[$value]                   = $sl.' X '.$sw ;
                            }
                            else if($value == 'rate'){
                                $data2['normalrate']            = $normalrate[$i] ?? '' ;
                                $data2['saudarate']             = $saudarate[$i] ?? ''  ;
                            }
                            else{
                               
                                $data2[$value]                  = $$value[$i] ?? '';
                            }
                        }
                        $data2['added_by']             = $this->memberID ;
                        $data2['added_date']           = $this->currentDate;
                        $returnData['s3']                          = $data2 ;
                        $check2 = $this->main_model->insert_table('rate_specification', $data2);
                    }
                    if($post_type == '1'){ $type='Normal';} else if($post_type == '2'){ $type='Sauda';} else if($post_type == '3'){ $type='Prime';} 
                    $returnData['success']          = 'true';
                    $returnData['message']          = 'Rates Updated successfully';
                     $returnData['data']              = $data2; 
                    $returnData['rid']              = $query; 
                    $returnData['pname']            = $pname; 
                    $returnData['rates_offered']    = $rates_offered; 
                    $returnData['post_type']        = $type;    
                    $returnData['description']      = $description; 
                    $returnData['qty']              = $qty; 
                    $returnData['validity']         = $validity; 
                   
                }
               
            }
            else
            {
               $returnData['error']                          = true ;
               $returnData['product_id']                     = $this->validation->getError('product_id');
               $returnData['rates_offered']                  = $this->validation->getError('rates_offered');
               // $returnData['description']                 = $this->validation->getError('description');
               
            }
        }
         echo json_encode($returnData);
    }

    
    public function getRateData()
    {
        
        $id = $this->request->getpost('id');

       
        $ratedata = $this->main_model->getQueryRowData("select rates.*, (select product_name from product where product.id = rates.product_id) as pname from rates where id='$id' order by added_date desc");
        if ($ratedata) {
            $returnData['success']      =   'true';
            $returnData['id']           =   $id;   
            $returnData['type']         =   $ratedata['type'];    
            $returnData['pname']        =   $ratedata['pname'];    
            $returnData['product_id']   =   $ratedata['product_id']; 
            $returnData['rates_offered']=   $ratedata['rates_offered'];    
            $returnData['description']  =   $ratedata['description'];    
            $returnData['qty']          =   $ratedata['qty'];    
            $returnData['validity']     =   $ratedata['validity'];    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }

     public function updateRate()
    {
        if ($this->request->isAJAX()) 
        {
            $rules = [
             
                "u_product_id" => ["label" => "Valid Product","rules" => "required"],
                "u_rates_offered" => ["label" => "rates_offered ","rules" => "required"],
                // "description" => ["label" => "Description ","rules" => "required"]

                ];
           if ($this->validate($rules)) 
           {
                $id                                 = $this->request->getpost("rid");
                $product_id                         = $this->request->getpost("u_product_id");
                $post_type                          = $this->request->getpost("u_post_type");
                $rates_offered                      = $this->request->getpost("u_rates_offered");
                $description                        = $this->request->getpost("u_description");
                $pname                              = $this->request->getpost("u_pname");
                $qty                                = $this->request->getpost("u_qty");
                $validity                           = $this->request->getpost("u_validity");
                
                $data['product_id']                 = $product_id; 
                $data['type']                       = $post_type; 
                $data['rates_offered']              = $rates_offered; 
                $data['description']                = $description; 
                $data['qty']                        = $qty; 
                $data['validity']                   = $validity; 
                $query = $this->main_model->update_table("rates",$data, "id=$id");
                if ($query) 
                {


                    if($post_type == '1'){ $type='Normal';} else if($post_type == '2'){ $type='Sauda';} else if($post_type == '3'){ $type='Prime';}
                    $returnData['success']          = 'true';
                    $returnData['message']          = 'Rates Updated successfully';
                    $returnData['rid']              =$id  ; 
                    $returnData['pname']            = $pname; 
                    $returnData['rates_offered']    = $rates_offered; 
                    $returnData['post_type']        = $type; 
                    $returnData['description']      = $description; 
                    $returnData['qty']              = $qty; 
                    $returnData['validity']         = $validity; 
                    echo json_encode($returnData);
                }
               
            }
            else
            {
               $returnData['error']                          = true ;
               $returnData['product_id']                           = $this->validation->getError('u_product_id');
               $returnData['description']                    = $this->validation->getError('u_description');
                echo json_encode($returnData);
            }
        }
    }

    public function deleteRate()
    {
        
        $id = $this->request->getpost('id');

        $data['deleted'] = 1;
        $data['deleted_by'] = $this->memberID;

        $check = $this->main_model->update_table("rates", $data, "id = '$id'");
        if ($check) {
            $returnData['success']   =   'true';
            $returnData['message']   =   ' Posted Rates Deleted Successfully';
            $returnData['data']      =   '';    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }

    public function postedRates()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
        $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
         $data['notification'] = $this->main_model->getQueryAllData("select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc");
         $query = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc");
         $nid=$query[0]['id']??'';
         if($nid){
             $data['ordertracking'] = $this->main_model->getQueryAllData("select * from ordertracking where order_id = '$nid' order by added_date asc");

         }else{
            $data['ordertracking']="";
         } $data['ur_id'] = $this->memberID;
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


            $data['title'] ="Rates";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getPostedRates()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
       $dtype = $this->dashboardStatus;
          $utype = $this->userType;
          $cid = "";
        if($dtype==1 ){ 
           
            $cid = "and sale_user like '%$utype%'";
        }
        else if($dtype==2 ){ 
           
            $cid = "and buy_user like '%$utype%'";
        }

            
        $data['query'] = $this->main_model->getQueryAllData("select rates.*,  product_category as cname, users.company_name, users.user_name, users.phone_number from rates join users on users.id = rates.added_by join product_category on product_category.id = rates.category where rates.deleted = 0  $cid and rates.added_by != $this->memberID and rate_type != $dtype order by rates.added_date desc");

        $data['title'] ="Rates";
        return view('rate/posted-rate-list',$data);
    }


    public function viewPostrate($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
        
        
        $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
         $data['notification'] = $this->main_model->getQueryAllData("select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc");
         $query = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc");
         $nid=$query[0]['id']??'';
         if($nid){
             $data['ordertracking'] = $this->main_model->getQueryAllData("select * from ordertracking where order_id = '$nid' order by added_date asc");

         }else{
            $data['ordertracking']="";
         } $data['ur_id'] = $this->memberID;
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

                $data['title'] ="Product ";
               return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getViewPostrate($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data1['updates'] = 0;
        $this->main_model->update_table('listed_products', $data1 ,"id='$id'");



        $data['rate'] = $this->main_model->getQueryRowData("select rates.*  ,product_category.product_category as catname, product_category.product_specification as specification,  users.user_name as name, users.phone_number as pno from rates join users on rates.added_by = users.id join product_category on rates.category = product_category.id   where rates.deleted = 0 and rates.id = '$id' and rates.added_by = '$this->memberID'   order by rates.added_date desc");
         $data['ratespecification'] = $this->main_model->getQueryAllData("select * from rate_specification  where rate_id = '$id' ");

        $data['interested_request'] = $this->main_model->getQueryAllData("select rateresponse.* , users.user_name,users.phone_number, users.user_type, users.email, users.company_name, users.address, users.state, users.city, users.state, users.pin_code   from rateresponse join users on rateresponse.interested_id = users.id  where rateresponse.deleted = 0 and rateresponse.list_id = '$id' ");
        // $deckle = $data['listedproduct']['deckle'];
        // if($deckle == 1){
        //     $data['decklesize'] = $this->main_model->getQueryAllData("select * from ordered_product_specification  where list_id = '$id' ");
        //  }
       
            $data['title'] ="Product ";
           return view('rate/view-postrate',$data);
       
    }

     public function confirmPurchaseRate($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
        
        
        $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
         $data['notification'] = $this->main_model->getQueryAllData("select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc");
         $query = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc");
         $nid=$query[0]['id']??'';
         if($nid){
             $data['ordertracking'] = $this->main_model->getQueryAllData("select * from ordertracking where order_id = '$nid' order by added_date asc");

         }else{
            $data['ordertracking']="";
         } $data['ur_id'] = $this->memberID;
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

    public function getConfirmPurchaseRate($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");

        
        

        $data['rate'] = $this->main_model->getQueryRowData("select rates.* ,product_category.product_category as catname, product_category.product_specification as specification, users.user_name as name, users.phone_number as pno from rates join users on rates.added_by = users.id join product_category on rates.category = product_category.id where rates.deleted = 0 and rates.id  = '$id' ");

        $data['ratespecification'] = $this->main_model->getQueryAllData("select *  from rate_specification  where deleted = 0   and rate_id = '$id' ");

          $data['ordercount'] = $this->main_model->getNumRow("orders", 'id', " added_by = '$this->memberID'");
          $orderplaced = $this->main_model->getNumRow("orders", 'id', " rate_id = '$id'");
          if($orderplaced == 0 ){
        $data['title'] =" Listed Purchase";
       return view('rate/confirm-ratepurchase',$data);}
       else {
         $data['redirect'] = 'nav-purchase';
         return view('default',$data);
       }
       
    }


    public function confirmSaleRate($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
        
        
        $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
         $data['notification'] = $this->main_model->getQueryAllData("select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc");
         $query = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc");
         $nid=$query[0]['id']??'';
         if($nid){
             $data['ordertracking'] = $this->main_model->getQueryAllData("select * from ordertracking where order_id = '$nid' order by added_date asc");

         }else{
            $data['ordertracking']="";
         }  $data['ur_id'] = $this->memberID;
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

    public function getConfirmSaleRate($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        
        

       $data['rate'] = $this->main_model->getQueryRowData("select rates.* ,product_category.product_category as catname, product_category.product_specification as specification, users.user_name as name, users.phone_number as pno from rates join users on rates.added_by = users.id join product_category on rates.category = product_category.id where rates.deleted = 0 and rates.id  = '$id'");

        $data['ratespecification'] = $this->main_model->getQueryAllData("select *  from rate_specification  where deleted = 0   and rate_id = '$id' ");

          $data['ordercount'] = $this->main_model->getNumRow("orders", 'id', " added_by = '$this->memberID'");
          $orderplaced = $this->main_model->getNumRow("orders", 'id', " rate_id = '$id'");
          if($orderplaced == 0 ){
        $data['title'] =" Listed Purchase";
       return view('rate/confirm-ratesale',$data);}


       


       else {
         $data['redirect'] = 'nav-purchase';
         return view('default',$data);
       }
       
    }


    
}
