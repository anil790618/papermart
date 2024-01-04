<?php
namespace App\Controllers;
use App\Models\Main_model;
use CodeIgniter\Controller;

class LabController extends BaseController
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


    public function labservice()
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
         }
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


            $data['title'] ="Lab service";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getLabservice()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
      
        $data['query'] = $this->main_model->getQueryAllData("select * from lab_services where deleted = 0 order by added_date desc");

        $data['title'] ="Lab service";
        return view('lab/lab-service',$data);
    }
    

    

    public function submitLabService()
    {
        if ($this->request->isAJAX()) 
        {
           $rules = [
             
                "title" => ["label" => "Title","rules" => "required"],
                "description" => ["label" => "Description ","rules" => "required"],
               

                ];
           if ($this->validate($rules)) 
           {
                $title                         = $this->request->getpost("title");
                $description                   = $this->request->getpost("description");
                
                
                $data['title']                      = $title; 
                $data['description']                = $description; 
                $data['added_by']                   = $this->memberID; 
                $data['added_date']                 = $this->currentDate; 
                $query = $this->main_model->insert_table("lab_services",$data);
                if ($query) 
                {


                   
                    $returnData['success']          = 'true';
                    $returnData['message']          = 'Rates Updated successfully';
                    $returnData['lid']              = $query; 
                    $returnData['title']            = $title; 
                    $returnData['description']      = $description; 
                    echo json_encode($returnData);
                }
               
            }
            else
            {
               $returnData['error']                          = true ;
               $returnData['title']                           = $this->validation->getError('title');
               $returnData['description']                    = $this->validation->getError('description');
               // $returnData['description']                    = $this->validation->getError('description');
                echo json_encode($returnData);
            }
        }
    }

    
    public function getLabserviceData()
    {
        
        $id = $this->request->getpost('id');

       
        $ratedata = $this->main_model->getQueryRowData("select * from lab_services where id='$id' order by added_date desc");
        if ($ratedata) {
            $returnData['success']      =   'true';
            $returnData['id']           =   $id;   
            $returnData['title']         =   $ratedata['title'];     
            $returnData['description']  =   $ratedata['description'];    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }

     public function updateLabservice()
    {
        if ($this->request->isAJAX()) 
        {
            $rules = [
             
                "u_title" => ["label" => "Title","rules" => "required"],
                "u_description" => ["label" => "Description ","rules" => "required"],
               

                ];
           if ($this->validate($rules)) 
           {
                $id                                 = $this->request->getpost("lid");
                $title                      = $this->request->getpost("u_title");
                $description                        = $this->request->getpost("u_description");
                
                
                
                $data['title']                      = $title; 
                $data['description']                = $description; 
                $query = $this->main_model->update_table("lab_services",$data, "id=$id");
                if ($query) 
                {


                    
                    $returnData['success']          = 'true';
                    $returnData['message']          = 'Lab Service Updated successfully';
                    $returnData['lid']              =$id  ; 
                    $returnData['title']            = $title; 
                    $returnData['description']      = $description; 
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

    public function deleteLabservice()
    {
        
        $id = $this->request->getpost('id');

        $data['deleted'] = 1;
        $data['deleted_by'] = $this->memberID;

        $check = $this->main_model->update_table("lab_services", $data, "id = '$id'");
        if ($check) {
            $returnData['success']   =   'true';
            $returnData['message']   =   'Lab service Deleted Successfully';
            $returnData['data']      =   '';    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }

    
    public function bookLabService()
    {
        if ($this->request->isAJAX()) 
        {
           $rules = [
             
                "booking_date" => ["label" => "Booking Date","rules" => "required"],

                ];
           if ($this->validate($rules)) 
           {
                $booking_date                         = $this->request->getpost("booking_date");
                $blid                   = $this->request->getpost("blid");
                
                $data['booked_by']                      = $this->memberID;
                $data['book_date']                      = $booking_date; 
                $data['labservice_id']                  = $blid; 
                $data['added_by']                       = $this->memberID; 
                $data['added_date']                     = $this->currentDate; 
                $query = $this->main_model->insert_table("lab_booking",$data);
                if ($query) 
                {


                   
                    $returnData['success']          = 'true';
                    $returnData['message']          = 'Lab Booking Placed successfully ';
                  
                    echo json_encode($returnData);
                }
               
            }
            else
            {
               $returnData['error']                          = true ;
               $returnData['booking_date']                           = $this->validation->getError('booking_date');
                echo json_encode($returnData);
            }
        }
    }


    public function myLabBooking()
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
         }
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


            $data['title'] ="Lab Booking";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getMyLabBooking()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
      
        $data['query'] = $this->main_model->getQueryAllData("select lab_booking.* , (select title from lab_services where lab_services.id = lab_booking.labservice_id) as labtitle  from lab_booking where deleted = 0 and added_by=$this->memberID order by added_date desc");

        $data['title'] ="Lab Booking";
        return view('lab/my-booking',$data);
    }

    public function cancelLabservice()
    {
        
        $id = $this->request->getpost('id');

        $data['status'] = 4;
        $data['deleted'] = 1;
        $data['deleted_by'] = $this->memberID;

        $check = $this->main_model->update_table("lab_booking", $data, "id = '$id'");
        if ($check) {
            $returnData['success']   =   'true';
            $returnData['message']   =   'Lab service Booking Deleted Successfully';
            $returnData['data']      =   '';    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }

    public function allBooking()
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
         }
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


            $data['title'] ="Lab Booking";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getAllBooking()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
      
        $data['query'] = $this->main_model->getQueryAllData("select lab_booking.* , (select title from lab_services where lab_services.id = lab_booking.labservice_id) as labtitle  from lab_booking where deleted = 0 order by added_date desc");

        $data['title'] ="Lab Booking";
        return view('lab/my-booking',$data);
    }


    public function confirmLabservice()
    {
        
        $id = $this->request->getpost('id');

        $data['status'] = 2;

        $check = $this->main_model->update_table("lab_booking", $data, "id = '$id'");
        if ($check) {
            $returnData['success']   =   'true';
            $returnData['message']   =   'Lab  Booking Confirmed Successfully';
            $returnData['data']      =   '';    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }


}
