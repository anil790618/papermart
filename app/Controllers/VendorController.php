<?php
namespace App\Controllers;
use App\Models\Main_model;
use CodeIgniter\Controller;

class VendorController extends BaseController
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


    

    public function vendor()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
        $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
         $data['notification'] = $this->main_model->getQueryAllData("select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc");
         $query = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc");
         $nid=$query[0]['id']??'';
         if($nid){
             $data['ordertracking'] = $this->main_model->getQueryAllData("select * from ordertracking where order_id = '$nid' order by added_date asc");

         }else{
            $data['ordertracking']="";
         }   $data['ur_id'] = $this->memberID;
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


            $data['title'] ="Vendor";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getVendor()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
      
            $data['query'] = $this->main_model->getQueryAllData("select * from vendors where deleted = 0 and added_by = $this->memberID order by added_date desc");

            $data['title'] ="Vendor";
           return view('vendor/vendor',$data);
       
    }

    public function addVendor()
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

            $data['title'] ="Vendor";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getAddVendor()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['title'] ="Vendor";
       return view('vendor/add-vendor',$data);
       
    }

    public function submitVendor()
    {
        if ($this->request->isAJAX()) 
        {
           $rules = [
                "vendor_name" => ["label" => "Vendor Name","rules" => "required|is_unique[vendors.vendor_name]|min_length[3]|max_length[15]"],
                "email" => ["label" => "Email","rules" => "required|valid_email|is_unique[vendors.email]"],
                "phone_number" => ["label" => "Phone Number","rules" => "required|is_unique[vendors.phone_number]|regex_match[/^[0-9]{10}$/]"],
                "vendor_type" => ["label" => "Vendor Type","rules" => "required"],
                "company_name" => ["label" => "Company Name","rules" => "required|min_length[3]|max_length[55]"],
                "address" => ["label" => "Address ","rules" => "required"],
                "state" => ["label" => "State","rules" => "required"],
                "city" => ["label" => "City","rules" => "required"],
                "pin_code" => ["label" => "Pin Code ","rules" => "required"]

                ];
           if ($this->validate($rules)) 
           {
                $vendor_name                        = $this->request->getpost("vendor_name");
                $email                              = $this->request->getpost("email");
                $phone_number                       = $this->request->getpost("phone_number");
                $vendor_type                        = $this->request->getpost("vendor_type");
                $company_name                       = $this->request->getpost("company_name");
                $address                            = $this->request->getpost("address");
                $state                              = $this->request->getpost("state");
                $city                               = $this->request->getpost("city");
                $pin_code                           = $this->request->getpost("pin_code");
                

                
                
                $data['vendor_name']                = $vendor_name; 
                $data['email']                      = $email; 
                $data['phone_number']               = $phone_number; 
                $data['vendor_type']                = $vendor_type; 
                $data['company_name']               = $company_name; 
                $data['address']                    = $address; 
                $data['state']                      = $state; 
                $data['city']                       = $city; 
                $data['pin_code']                   = $pin_code; 
                $data['is_active']                  = '1'; 
                $data['added_by']                   = $this->memberID; 
                $data['added_date']                 = $this->currentDate; 
                $query = $this->main_model->insert_table("vendors",$data);
                if ($query) 
                {
                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Vendor added successfully';
                    echo json_encode($returnData);
                }
               
            }
            else
            {
               $returnData['error']                          = true ;
               $returnData['vendor_name']                    = $this->validation->getError('vendor_name');
               $returnData['email']                          = $this->validation->getError('email');
               $returnData['phone_number']                  = $this->validation->getError('phone_number');
               $returnData['vendor_type']                   = $this->validation->getError('vendor_type');
               $returnData['company_name']                  = $this->validation->getError('company_name');
               $returnData['address']                       = $this->validation->getError('address');
               $returnData['state']                  = $this->validation->getError('state');
               $returnData['city']                      = $this->validation->getError('city');
               $returnData['pin_code']                 = $this->validation->getError('pin_code');
             
                   
                echo json_encode($returnData);
            }
        }
    }

    

    
}
