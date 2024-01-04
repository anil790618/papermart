<?php
namespace App\Controllers;
use App\Models\Main_model;
use CodeIgniter\Controller;

class CustomerController extends BaseController
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


    

    public function customer()
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

                $data['title'] ="Customer";
               return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getCustomer()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;

      
            $data['query'] = $this->main_model->getQueryAllData("select * from users where deleted = 0 and user_type>0 order by added_date desc");

            $data['title'] ="Customer";
           return view('customer/customer',$data);
       
    }



    public function updateCustomer($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['appproved'] = $this->accountStatus;
        $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
         $data['notification'] = $this->main_model->getQueryAllData("select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc");
         $query = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc");
         $nid=$query[0]['id']??'';
         $data['ur_id'] = $this->memberID;
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
        
                $data['title'] ="Customer";
               return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getUpdateCustomer($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data1['checked'] = 1;
        $query = $this->main_model->update_table("users",$data1,"id='$id'");
        $data['customer'] = $this->main_model->getRowData("users"  , "*" ," deleted = 0 and id='$id' order by added_date desc");

        $data['title'] ="Customer";
       return view('customer/edit-customer',$data);
       
    }

    public function submitupdateCustomer()
    {
        $returnData['success'] = false;

            if (isset($_POST['customer_id'])) 
            {
                    
                    $rules = [
                    "user_name" => ["label" => "Customer Name","rules" => "required|min_length[3]|max_length[25]"],
                   ];
                if ($this->validate($rules)) 
                {
                   
                    $customer_id        = $this->request->getpost("customer_id");
                    $user_name          = $this->request->getpost("user_name");
                    $email              = $this->request->getpost("email");
                    $phone_number       = $this->request->getpost("phone_number");
                    $alternate_number   = $this->request->getpost("alternate_number");
                    $company_name       = $this->request->getpost("company_name");
                    $address            = $this->request->getpost("address");
                    $state              = $this->request->getpost("state");
                    $city               = $this->request->getpost("city");
                    $pincode            = $this->request->getpost("pincode");
                    $gst_no             = $this->request->getpost("gst_no");
                    $pan_no             = $this->request->getpost("pan_no");
                    $user_type          = $this->request->getpost("user_type");
                    $designation        = $this->request->getpost("designation");
                    $is_active          = $this->request->getpost("is_active");
                    $approved           = $this->request->getpost("approved");
                    $password1          = $this->request->getpost("password");
                    if($password1){ 
                        $password           = password_hash($this->request->getpost("password"), PASSWORD_BCRYPT);
                        $data['password']                     =$password;
                    }

                    $data['user_name']                      = $user_name; 
                    $data['email']                          = $email;
                    $data['phone_number']                   = $phone_number;
                    $data['alternate_number']               = $alternate_number;
                    $data['user_type']                      = $user_type;
                    $data['designation']                    = $designation;
                    $data['address']                        = $address;
                    $data['company_name']                   = $company_name;
                    $data['state']                          = $state;
                    $data['city']                           = $city;
                    $data['pin_code']                       = $pincode;
                    $data['gst_number']                     = $gst_no;
                    $data['pan_number']                     = $pan_no;
                    $data['is_active']                      = $is_active;
                    $data['approved']                       = $approved ;


                    $query = $this->main_model->update_table("users",$data,"id='$customer_id'");
                    if ($query) 
                    {    
                        $this->accountStatus = $approved;
                        $returnData['success'] = true;
                        $returnData['message'] = 'Customer Details Updated successfully';
                        
                    }
                    else
                    {
                        $returnData['successa'] = "query not working";
                    }
                }
                else
                {
                    // $error =array(
                    //     'customer_name'  => $this->validation->getError('customer_name'),
                    //     'payment'        => $this->validation->getError('payment'),
                    //     'renewal_in'     => $this->validation->getError('renewal_in'),
                    //     'renewal_amount' => $this->validation->getError('renewal_amount'),
                    //     'amount'         => $this->validation->getError('amount'),
                    //     'comment'        => $this->validation->getError('comment'));
                    // echo json_encode($error);
                }
            }
            echo json_encode($returnData);
    }

    public function deleteCustomer()
    {
         $id = $this->request->getpost('id');

        $data['deleted'] = 1;
        $data['deleted_by'] = $this->memberID;

        $check = $this->main_model->update_table("users", $data, "id = '$id'");
        if ($check) {
            $returnData['success']   =   'true';
            $returnData['message']   =   'Customer Deleted Successfully';
            $returnData['data']      =   '';    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
    }

    public function customerStatusupdate()
    {
        $id = $this->request->getpost('id');
        $fstatus = $this->request->getpost('fstatus');

        $data['is_active'] = $fstatus;
        $data['update_by'] = $this->memberID;
        $data['update_date'] =$this->currentDate; 

        $check = $this->main_model->update_table("users", $data, "id = '$id'");
        if ($check) {
            $returnData['success']   =   'true';
            $returnData['message']   =   'Customer Status Updated Successfully';
            $returnData['data']      =   '';    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =  $fstatus;
            echo json_encode($returnData);
        }
    }

    
}
