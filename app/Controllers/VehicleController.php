<?php
namespace App\Controllers;
use App\Models\Main_model;
use CodeIgniter\Controller;

class VehicleController extends BaseController
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


    

    public function vehicle()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
        
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


            $data['title'] ="Vehicle";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getVehicle()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
      
            $data['query'] = $this->main_model->getQueryAllData("select * from vehicles where deleted = 0  and added_by = $this->memberID   order by added_date desc");

            $data['title'] ="Vehicle";
           return view('vehicle/vehicle',$data);
       
    }

    public function addVehicle()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
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


            $data['title'] ="Vehicle";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getAddVehicle()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['title'] ="Vehicle";
       return view('vehicle/add-vehicle',$data);
       
    }

    public function submitVehicle()
    {
        if ($this->request->isAJAX()) 
        {
           $rules = [
                "vehicle_no" => ["label" => "Vehicle Number","rules" => "required|regex_match[/[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/]|is_unique[vehicles.vehicle_no]"],
                "vehicle_company_name" => ["label" => "Vehicle Comapany Name","rules" => "required"],
                "transporter_name" => ["label" => "Transporter Name","rules" => "required"],
                "vehicle_type" => ["label" => "Vehicle Type","rules" => "required"],
                "description" => ["label" => "Description","rules" => "required"],
                "width_vehicle" => ["label" => "Width of Vehicle ","rules" => "required|numeric"],
                "depth_vehicle" => ["label" => "Depth of vehicle","rules" => "required|numeric"],
                "capicity" => ["label" => "Capicity","rules" => "required|numeric"],
                "time_permited" => ["label" => "Time permited ","rules" => "required"],
                "areas_permited" => ["label" => "Areas permited","rules" => "required"]

                ];
           if ($this->validate($rules)) 
           {
                $vehicle_no                         = $this->request->getpost("vehicle_no");
                $vehicle_company_name               = $this->request->getpost("vehicle_company_name");
                $transporter_name                   = $this->request->getpost("transporter_name");
                $vehicle_type                       = $this->request->getpost("vehicle_type");
                $description                        = $this->request->getpost("description");
                $width_vehicle                      = $this->request->getpost("width_vehicle");
                $depth_vehicle                      = $this->request->getpost("depth_vehicle");
                $capicity                           = $this->request->getpost("capicity");
                $time_permited                      = $this->request->getpost("time_permited");
                $areas_permited                     = $this->request->getpost("areas_permited");
                $transport_type                     = $this->request->getpost("transport_type");
               

                
                
                $data['vehicle_no']                         = $vehicle_no; 
                $data['vehicle_company_name']               = $vehicle_company_name; 
                $data['transporter_name']                   = $transporter_name; 
                $data['vehicle_type']                       = $vehicle_type; 
                $data['description']                        = $description; 
                $data['width_vehicle']                      = $width_vehicle; 
                $data['depth_vehicle']                      = $depth_vehicle; 
                $data['capicity']                           = $capicity; 
                $data['time_permited']                      = $time_permited; 
                $data['areas_permited']                     = $areas_permited; 
                $data['transport_type']                     = $transport_type; 
                $data['added_by']                           = $this->memberID; 
                $data['added_date']                         = $this->currentDate; 
                $query = $this->main_model->insert_table("vehicles",$data);
                if ($query) 
                {
                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Vehicle added successfully';
                    echo json_encode($returnData);
                }
               
            }
            else
            {
               $returnData['error']                         = true ;
               $returnData['vehicle_no']                    = $this->validation->getError('vehicle_no');
               $returnData['vehicle_company_name']          = $this->validation->getError('vehicle_company_name');
               $returnData['transporter_name']              = $this->validation->getError('transporter_name');
               $returnData['vehicle_type']                  = $this->validation->getError('vehicle_type');
               $returnData['description']                   = $this->validation->getError('description');
               $returnData['width_vehicle']                 = $this->validation->getError('width_vehicle');
               $returnData['depth_vehicle']                 = $this->validation->getError('depth_vehicle');
               $returnData['capicity']                      = $this->validation->getError('capicity');
               $returnData['time_permited']                 = $this->validation->getError('time_permited');
               $returnData['areas_permited']                = $this->validation->getError('areas_permited');
             
                   
                echo json_encode($returnData);
            }
        }
    }

    public function orderBooklist()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
        $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['notification'] = $this->main_model->getQueryAllData("select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
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


            $data['title'] ="Booking List";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getOrderBooklist()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['userid'] = $this->memberID;
        $data['query'] = $this->main_model->getQueryAllData("select tr.*, o.order_number, (select vehicle_no from vehicles where id=o.vehicle_id) as vno , o.driver_name, o.qty ,o.delivery_date, l.quantity_type, l.product_location as location_from , (select city from users where id = l.accepted_by) as loction_to FROM `transport_request` as tr join orders as o on tr.order_id= o.id join listed_products as l on l.id= o.list_id WHERE tr.deleted=0 and tr.status <= 1;");

        $data['title'] ="Booking List";
        
        return view('vehicle/booklist',$data);
       
    }

    public function updateTransportrequest()
    {
        if ($this->request->isAJAX()) 
        {
            $rules = [
                "vehicle_id" => ["label" => " Valid Vehicle Number","rules" => "required"],
                "vehicledetail" => ["label" => "Vehicle Number","rules" => "required|min_length[5]|max_length[250]"],];
           if ($this->validate($rules)) 
           {   
                $vehicledetail                  = $this->request->getpost("vehicledetail");
                $vehicle_id                     = $this->request->getpost("vehicle_id");
                $trid                           = $this->request->getPost("trid");
                $oid                            = $this->request->getPost("oid");
                $driver_name                    = $this->request->getPost("driver_name");
                $driver_phone_number            = $this->request->getPost("driver_phone_number");

                $data['vehiclestatus']                  = 3; 
                $data['vehicle_id']                     = $vehicle_id; 
                $data['driver_name']                    = $driver_name; 
                $data['driver_phone_number']            = $driver_phone_number; 
                $query = $this->main_model->update_table("orders",$data , "id = '$oid'");
                $data2['vehicle_id']                     = $vehicle_id; 
                $data2['driver_name']                    = $driver_name;
                $data2['driver_phone_number']             = $driver_phone_number; 
                $data2['status']                         = 2;
                 $query2 = $this->main_model->update_table("transport_request",$data2 , "id = '$trid'");


                $ordertracking['order_id']                       = $oid; 
                $ordertracking['description']                    = 'Transporter Alocated The Vehicle'; 
                $ordertracking['added_by']                       = $this->memberID; 
                $ordertracking['added_date']                     = $this->currentDate; 
                $this->main_model->insert_table("ordertracking",$ordertracking);

                // **********************************************
                $salerid =  $this->main_model->getRowData('orders', "sale_id", "id = '$oid'");
                $userid=$salerid['sale_id'];
                $user_type=  $this->main_model->getRowData("users", "user_type", "id = '$userid'");
                $data_notification['url']="sale";
                $data_notification['added_by'] = $this->memberID  ;
                $data_notification['title']="Transporter Alocated The Vehicle";
                $data_notification['description']="transporter alocate the vehicle";
                $data_notification['added_date'] = $this->currentDate;
                $data_notification['notification_for']=$user_type['user_type'];
                $data_notification['notification_for_id']=$salerid['sale_id'];
                $notification = $this->main_model->insert_table('notification', $data_notification );
                $notification;

                // **********************************************

                if ($query) 
                {
                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Vehicle Aloted successfully';
                    $returnData['vno']    = $vehicledetail;
                    $returnData['driver_name']    = $driver_name;
                    $returnData['driver_phone_number']    = $driver_phone_number;
                }
                else{
                      $returnData['success'] = 'false';
                   $returnData['vno']    = $vehicledetail;
                    $returnData['driver_name']    = $driver_name;
                    $returnData['vehicle_id']     = $vehicle_id;
                    
                }
            }
            else
            {
                $returnData['error']            = true ;
                $returnData['vehicle_id']        = $this->validation->getError('vehicle_id');
                $returnData['vehicledetail']         = $this->validation->getError('vehicledetail');
                   
                
            }
        }
        echo json_encode($returnData);
    }

    public function alotedbooklist()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
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


            $data['title'] ="Booking List";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getalotedbooklist()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
      
        $data['query'] = $this->main_model->getQueryAllData("select tr.*, o.order_number, (select vehicle_no from vehicles where id=o.vehicle_id) as  vno , o.driver_name, o.qty ,o.delivery_date, l.quantity_type, l.product_location as location_from , (select city from users where id = l.accepted_by) as loction_to FROM `transport_request` as tr join orders as o on tr.order_id= o.id join listed_products as l on l.id= o.list_id  WHERE tr.deleted=0 and tr.status >= 2;");

        $data['title'] ="Vehicle Booked List";
        
        return view('vehicle/booklist',$data);
       
    }
  
    public function sendtopickup()
    {
        
        $id = $this->request->getpost('id');

        $data['status'] = '3';
        

        $check = $this->main_model->update_table('transport_request', $data ,"id='$id'");
        if ($check) {
            $transportrequest = $this->main_model->getRowData('transport_request', "*", "id = '$id'");

            $oid= $transportrequest['order_id'];
            $data1['vehiclestatus'] = '4';

            $this->main_model->update_table('orders', $data1 ,"id='$oid'");

            // **********************************************
            $salerid =  $this->main_model->getRowData('orders', "sale_id", "id = '$oid'");
            $userid=$salerid['sale_id'];
            $user_type=  $this->main_model->getRowData("users", "user_type", "id = '$userid'");
            $data_notification['url']="sale";
            $data_notification['added_by'] = $this->memberID  ;
            $data_notification['title']="Transporter Send Vehicle To Pickup Order";
            $data_notification['description']="Transporter Send Vheicle To Pickup Order";
            $data_notification['added_date'] = $this->currentDate;
            $data_notification['notification_for']=$user_type['user_type'];
            $data_notification['notification_for_id']=$salerid['sale_id'];
            $notification = $this->main_model->insert_table('notification', $data_notification );
            $notification;

            // **********************************************

            $ordertracking['order_id']                       = $id; 
            $ordertracking['description']                    = 'Transporter Send Vheicle To Pickup Order.'; 
            $ordertracking['added_by']                       = $this->memberID; 
            $ordertracking['added_date']                     = $this->currentDate; 
            $this->main_model->insert_table("ordertracking",$ordertracking);
            $returnData['success']   =   'true';
            $returnData['message']   =   'Vehicle dispatched Successfully';
            $returnData['data']      =   '';    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }
    
    public function sendVehicleRequest()
    {
        
        $id = $this->request->getpost('id');
        // echo "order id "+$id;
        $ordertracking['order_id']                       = $id; 
        $ordertracking['description']                    = 'Request for  Vehicle Sent.'; 
        $ordertracking['added_by']                       = $this->memberID; 
        $ordertracking['added_date']                     = $this->currentDate; 
        $this->main_model->insert_table("ordertracking",$ordertracking);
       
        $data1['vehiclestatus'] = 1;
       
        $check = $this->main_model->update_table("orders", $data1, "id = '$id'");
        if ($check) {
            $returnData['success']   =   'true';
            $returnData['message']   =   'Vehicle Request Send Successfully';
            $returnData['data']      =   '';    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }

    public function editVehicle($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
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


            $data['title'] ="Vehicle";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getEditVehicle($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['vehicle'] = $this->main_model->getRowData("vehicles"  , "*" ," deleted = 0 and id='$id'");
        $data['title'] ="Vehicle";
       return view('vehicle/edit-vehicle',$data);
       
    }


     public function updateVehicle()
    {
        if ($this->request->isAJAX()) 
        {
           $rules = [
                "vehicle_no" => ["label" => "Vehicle Number","rules" => "required|regex_match[/[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/]"],
                "vehicle_company_name" => ["label" => "Vehicle Comapany Name","rules" => "required"],
                "transporter_name" => ["label" => "Transporter Name","rules" => "required"],
                "vehicle_type" => ["label" => "Vehicle Type","rules" => "required"],
                "description" => ["label" => "Description","rules" => "required"],
                "width_vehicle" => ["label" => "Width of Vehicle ","rules" => "required|numeric"],
                "depth_vehicle" => ["label" => "Depth of vehicle","rules" => "required|numeric"],
                "capicity" => ["label" => "Capicity","rules" => "required|numeric"],
                "time_permited" => ["label" => "Time permited ","rules" => "required"],
                "areas_permited" => ["label" => "Areas permited","rules" => "required"]

                ];
           if ($this->validate($rules)) 
           {
                $vehicle_id                         = $this->request->getpost("vehicle_id");
                $vehicle_no                         = $this->request->getpost("vehicle_no");
                $vehicle_company_name               = $this->request->getpost("vehicle_company_name");
                $transporter_name                   = $this->request->getpost("transporter_name");
                $vehicle_type                       = $this->request->getpost("vehicle_type");
                $description                        = $this->request->getpost("description");
                $width_vehicle                      = $this->request->getpost("width_vehicle");
                $depth_vehicle                      = $this->request->getpost("depth_vehicle");
                $capicity                           = $this->request->getpost("capicity");
                $time_permited                      = $this->request->getpost("time_permited");
                $areas_permited                     = $this->request->getpost("areas_permited");
                $vehicle_status                     = $this->request->getpost("vehicle_status");

                
                
                $data['vehicle_no']                         = $vehicle_no; 
                $data['vehicle_company_name']               = $vehicle_company_name; 
                $data['transporter_name']                   = $transporter_name; 
                $data['vehicle_type']                       = $vehicle_type; 
                $data['description']                        = $description; 
                $data['width_vehicle']                      = $width_vehicle; 
                $data['depth_vehicle']                      = $depth_vehicle; 
                $data['capicity']                           = $capicity; 
                $data['time_permited']                      = $time_permited; 
                $data['areas_permited']                     = $areas_permited; 
                $data['vehicle_status']                     = $vehicle_status; 
                $query = $this->main_model->update_table("vehicles",$data, "id = $vehicle_id");
                if ($query) 
                {
                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Vehicle Updated successfully';
                    echo json_encode($returnData);
                }
               
            }
            else
            {
               $returnData['error']                         = true ;
               $returnData['vehicle_no']                    = $this->validation->getError('vehicle_no');
               $returnData['vehicle_company_name']          = $this->validation->getError('vehicle_company_name');
               $returnData['transporter_name']              = $this->validation->getError('transporter_name');
               $returnData['vehicle_type']                  = $this->validation->getError('vehicle_type');
               $returnData['description']                   = $this->validation->getError('description');
               $returnData['width_vehicle']                 = $this->validation->getError('width_vehicle');
               $returnData['depth_vehicle']                 = $this->validation->getError('depth_vehicle');
               $returnData['capicity']                      = $this->validation->getError('capicity');
               $returnData['time_permited']                 = $this->validation->getError('time_permited');
               $returnData['areas_permited']                = $this->validation->getError('areas_permited');
             
                   
                echo json_encode($returnData);
            }
        }
    }
    public function generateVehicleRequest()
    {
        if ($this->request->isAJAX()) 
        {
           $rules = [
                "orderid" => ["label" => "Order","rules" => "required"],
               
                ];
           if ($this->validate($rules)) 
           {
                $orderid                                = $this->request->getpost("orderid");
                $transport_type                         = $this->request->getpost("transport_type");
                $transport_cost                         = $this->request->getpost("transport_cost");
                $transport_date                         = $this->request->getpost("transport_date");
                $vs                         = $this->request->getpost("vs");
                if( $transport_type == 1){
                    $vehicle_id                         = $this->request->getpost("vehicle_id");
                    $vehicledetail                      = $this->request->getpost("vehicledetail");
                    $driver_name                        = $this->request->getpost("driver_name");
                    $driver_phone_number                = $this->request->getpost("driver_phone_number"); 

                   
                    if ($vs==1) {
                        $data['vehiclestatus']              = 1 ;
                    }else{
                        $data['vehiclestatus']              = 4 ;
                    }

                    $data['vehicle_id']                = $vehicle_id;
                    $data['driver_name']               = $driver_name;
                    $data['driver_phone_number']       = $driver_phone_number;

                    $ordertracking['order_id']                       = $orderid; 
                    $ordertracking['description']                    = 'Vehicle Alotted Successfully'; 
                    $ordertracking['added_by']                       = $this->memberID; 
                    $ordertracking['added_date']                     = $this->currentDate; 
                    $this->main_model->insert_table("ordertracking",$ordertracking);
                }
                else{

                    $ordertracking['order_id']                       = $orderid; 
                    $ordertracking['description']                    = 'Vehicle Request Send to transporter'; 
                    $ordertracking['added_by']                       = $this->memberID; 
                    $ordertracking['added_date']                     = $this->currentDate; 
                    $this->main_model->insert_table("ordertracking",$ordertracking);


                    $data['vehiclestatus']                           = 2;
                    $transportdata['order_id']                       = $orderid; 
                    $transportdata['status']                         = '0' ;
                    $transportdata['transport_cost']                 = $transport_cost;
                    $transportdata['transport_date']                 = $transport_date;
                    $transportdata['added_by']                       = $this->memberID;  
                    $transportdata['added_date']                     = $this->currentDate; 
                    $this->main_model->insert_table("transport_request",$transportdata);
                }
                
                $data['transport_type']                 = $transport_type;
                $data['transport_cost']                 = $transport_cost;
                // *******************************************************************
               
                $data_notification['url']="orderbooklist";
                $data_notification['added_by'] = $this->memberID  ;
                $data_notification['title']="Transport request send by seller";
                $data_notification['description']="transport request send by seller";
                $data_notification['added_date'] = $this->currentDate;
                $data_notification['notification_for']=5;
                $data_notification['notification_for_id']=6;
                $notification = $this->main_model->insert_table('notification', $data_notification );
                $notification;
                // *******************************************************************
                
                $query = $this->main_model->update_table("orders",$data, "id = $orderid");
                if ($query) 
                {
                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Vehicle Request Generated successfully';
                    // $returnData['vno'] = $vehicledetail;
                    // $returnData['driver'] = $driver_name .','.$driver_phone_number;
                    // $returnData['oid'] = $orderid;
                    echo json_encode($returnData);
                }
               
            }
            else
            {
               $returnData['error']                         = true ;
               
                echo json_encode($returnData);
            }
        }
    }


    public function getTransportRateList()
    {
        $return['success'] = false;
        $oid         = $this->request->getpost('oid');
        $trid         = $this->request->getpost('trid');
        $trdata = $this->main_model->getRowData("transport_request", "*", "id = '$trid'");
        $orderdata = $this->main_model->getRowData("orders", "*", "id = '$oid'");
        $return['orderdata']     =   $orderdata;
        $transportrequestratedata = $this->main_model->getQueryAllData(" select transport_request_rates.*, (select user_name from users where transport_request_rates.added_by = users.id) as tname from transport_request_rates where order_id = '$oid' and trid = '$trid'");
        
        if(!empty($transportrequestratedata))
        {   
            $return['success'] = true;
            $return['list']    = $transportrequestratedata;
           
        }   
          
           
         
        echo json_encode($return, true);
        
    }


    public function getTrrate()
    {
        $return['success'] = false;
        $oid         = $this->request->getpost('oid');
        $trid         = $this->request->getpost('trid');
        $trdata = $this->main_model->getRowData("transport_request", "*", "id = '$trid'");
        $orderdata = $this->main_model->getRowData("orders", "*", "id = '$oid'");
        $return['orderdata']     =   $orderdata;
        $return['trdata']     =   $trdata;

        // $transportrequestratedata = $this->main_model->getQueryAllData(" select transport_request_rates.*, (select user_name from users where transport_request_rates.added_by = users.id) as tname from transport_request_rates where order_id = '$oid' and trid = '$trid' and added_by = $this->memberID");
        $transportrequestratedata = $this->main_model->getRowData("transport_request_rates", "transport_request_rates.*, (select user_name from users where transport_request_rates.added_by = users.id) as tname", "order_id = '$oid' and trid = '$trid' and added_by = $this->memberID");
        if(!empty($transportrequestratedata))
        {   
            $return['success'] = true;
            $return['list']    = $transportrequestratedata;
           
        }   
          
           
         
        echo json_encode($return, true);
        
    }



    public function sendTransportRequestRate()
    {
        if ($this->request->isAJAX()) 
        {
            $rules = [
                "o_id" => ["label" => " Valid Order Id","rules" => "required"],
                "tr_id" => ["label" => "Transport Request","rules" => "required"],
                "transportation_cost" => ["label" => "Transport Cost","rules" => "required"]];
           if ($this->validate($rules)) 
           {   
                $transportation_cost            = $this->request->getpost("transportation_cost");
                $perkg_cost            = $this->request->getpost("perkg_cost");
                $trid                           = $this->request->getPost("tr_id");
                $oid                            = $this->request->getPost("o_id");

               
                $data['rate_offered']                      = $transportation_cost; 
                $data['rate_offered_perkg']                      = $perkg_cost; 
                $data['trid']                              = $trid;
                $data['order_id']                          = $oid; 
                $data['status']                            = 0;
                $data['added_by']                          = $this->memberID; 
                $data['added_date']                        = $this->currentDate; 
                 $query = $this->main_model->insert_table("transport_request_rates",$data );

                // *************************************************************************************
                $salerid =  $this->main_model->getRowData('orders', "sale_id", "id = '$oid'");
                $userid=$salerid['sale_id'];
                $user_type=  $this->main_model->getRowData("users", "user_type", "id = '$userid'");
                $data_notification['url']="sale";
                $data_notification['added_by'] = $this->memberID  ;
                $data_notification['title']="Transport Price Send by Transporter";
                $data_notification['description']="transport price  send by transporter";
                $data_notification['added_date'] = $this->currentDate;
                $data_notification['notification_for_id']=$salerid['sale_id'];
                $data_notification['notification_for']=$user_type['user_type'];
                $notification = $this->main_model->insert_table('notification', $data_notification );
                $notification;
                // *************************************************************************************


                if ($query) 
                {
                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Transport Request Rate Sent successfully';
                    
                }
                else{
                      $returnData['success'] = 'false';
                 
                    
                }
            }
            else
            {
                $returnData['error']            = true ;
                $returnData['o_id']        = $this->validation->getError('o_id');
                $returnData['tr_id']         = $this->validation->getError('tr_id');
                   
                
            }
        }
        echo json_encode($returnData);
    }


    public function confirmTrRate()
    {
        
        $id = $this->request->getpost('id');
       
        $trrate = $this->main_model->getRowData("transport_request_rates"  , "*" ," id='$id'");

        $data['transporter_id'] = $trrate['added_by'];  
        $data['transport_cost'] = $trrate['rate_offered'];
        $data['status'] = 1;

        $data1['status'] = 1;
       $trid= $trrate['trid'];

        $check = $this->main_model->update_table("transport_request", $data, "id = '$trid'");
         $check1 = $this->main_model->update_table("transport_request_rates", $data1, "id = '$id'");


        //  *************************************
        $salerid =  $this->main_model->getRowData('transport_request', "transporter_id", "id = '$id'");
        $data_notification['url']="orderbooklist";
        $data_notification['added_by'] = $this->memberID  ;
        $data_notification['title']="Transport Price Confirm  by Seller";
        $data_notification['description']="transport price confirm  by seller";
        $data_notification['added_date'] = $this->currentDate;
        $data_notification['notification_for']=$salerid['transporter_id']??'';
        $notification = $this->main_model->insert_table('notification', $data_notification );
        $notification;
        //  *************************************   

        if ($check) {
            $returnData['success']   =   'true';
            $returnData['message']   =   'Rate accepted Succcessfully ';
            $returnData['data']      =   '';    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }


    public function rejectTrRate()
    {
        
        $id = $this->request->getpost('id');
       
        $trrate = $this->main_model->getRowData("transport_request_rates"  , "*" ," id='$id'");


        $data1['status'] = 2;

         $check1 = $this->main_model->update_table("transport_request_rates", $data1, "id = '$id'");
        if ($check1) {
            $returnData['success']   =   'true';
            $returnData['message']   =   'Rate Rejected Succcessfully ';
            $returnData['data']      =   '';    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }

    public function updateVehicleDelivery()
    {
        
        $oid = $this->request->getpost('id');
        $vid = $this->request->getpost('id');
       
        $data1['vehiclestatus'] = 6;

        $data['status'] = 1;
        $check = $this->main_model->update_table("vehicles", $data, "id = '$vid'");
         $check1 = $this->main_model->update_table("orders", $data1, "id = '$oid'");

        $ordertracking['order_id']                       = $oid; 
        $ordertracking['description']                    = 'Order Recieved Successfully by guard.'; 
        $ordertracking['added_by']                       = $this->memberID; 
        $ordertracking['added_date']                     = $this->currentDate; 
        $this->main_model->insert_table("ordertracking",$ordertracking);

        if ($check1) {
            $returnData['success']   =   'true';
            $returnData['message']   =   'Order recieved Successfully  ';
            $returnData['data']      =   '';    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }

        public function getOrdertracking()
    {
        $return['success'] = false;
        if($this->request->isAJAX())
        {
           
            $id=$this->request->getpost("id");
            if(!empty($id))
            {
               
                $data['ordertracking'] = $this->main_model->getQueryAllData("select * from ordertracking where order_id = $id order by added_date asc");
                if(!empty($data['ordertracking']))
                {   
                    $return['success'] = true;
                    $return['list']    = $data['ordertracking'];
                }
            }
            echo json_encode($return, true);
        }
    } 

    public function check_size_location(){
        $oid=$this->request->getVar("oid");
        $lid=$this->request->getVar("lid");
        // echo $oid." ".$lid;
        $is_size= $this->main_model->getNumRow("ordered_product_specification", "*", "list_id = '$lid'");
        $salerid =  $this->main_model->getRowData('orders', "purchase_id", "id = '$oid'");
        $data_notification['url']="send-listresponse/$lid";
        $data_notification['added_by'] = $this->memberID  ;
        $data_notification['title']="Upload size ";
        $data_notification['description']="Upload size ";
        $data_notification['added_date'] = $this->currentDate;
        $data_notification['notification_for']=$salerid['purchase_id'];
        $notification = $this->main_model->insert_table('notification', $data_notification );
        $notification;
     if($is_size) {
        $response=array('status'=>'true','msg'=>'size present');
     } else{
        $response=array('status'=>'false','msg'=>'size not present');
     }
     return json_encode($response);
    }

}
