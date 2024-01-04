<?php
namespace App\Controllers;
use App\Models\Main_model;
use CodeIgniter\Controller;

class UserController extends BaseController
{
 

    public function index()
    {
        if ($this->session->get('user')) 
        {
            return redirect()->to('dashboard');
        }
        else
        {
            return redirect()->to('reglogin');
            // return redirect()->to('login');
        }
    }


    public function login()
    {
        if ($this->request->getMethod() == "post") 
        {
            $rules = [
                "email" => [
                    "label" => "Email", 
                    "rules" => "required|CustomRules[users.email]"
                    ],
                "password"    => ["label" => "Password", "rules"  => "required"]
            ];
            if($this->validate($rules))
            {
                $email    =  $this->request->getpost("email");
                $password =  $this->request->getpost("password");
                $user = $this->main_model->getRowData('users','user_key,password,user_type',"email='$email' and deleted = '0'  ");
                if (password_verify($password,$user['password'])) 
                {
                    $this->session->set('user_key',$user['user_key']);
                    set_cookie('user_key',$user['user_key'], 3600);

                   // $this->response->setCookie('user_key',$user['user_key'], 3600);
                    $this->session->set('user_type',$user['user_type']);
                    set_cookie('user_type',$user['user_type']);

                    return redirect()->to('dashboard');
                }
                else
                {
                   $this->session->setTempdata('error','Your password is not match',3);
                }
            }
            else
            {
                $array['email']  = $this->validation->getError('email');
                $array['password']      = $this->validation->getError('password');
            }
        }

       
        
          $array['javascript'] =array(
            'public/public/vendor/global/global.min.js',
            'public/public/js/register.js',
         'public/public/js/login.js');

        $array['style'] = array(
            'public/public/css/registerstyle.css',
            'public/public/css/style.css',
            'public/public/vendor/jquery-steps/css/jquery.steps.css',
            'public/public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css'
        );
        return view('login',$array);
    }


    
    public function plogin()
    {
        
        $pno = $this->request->getpost('pno');

       
        $user = $this->main_model->getRowData("users"  , "*" ," deleted = 0 and phone_number='$pno' ");
        if ($user) {


            $this->session->set('user_key',$user['user_key']);
            set_cookie('user_key',$user['user_key'], 3600);

           // $this->response->setCookie('user_key',$user['user_key'], 3600);
            $this->session->set('user_type',$user['user_type']);
            set_cookie('user_type',$user['user_type']);

            $returnData['success']   =   'true';
            
            echo json_encode($returnData);
        } else {

                

                $data['user_type']                      = 10;
                $data['user_key']                       = bin2hex(random_bytes(16));
                $data['phone_number']                   = $pno;
                $data['is_active']                      = 0;
                $data['added_date']                     = date('Y-m-d H:i:s');

                $result = $this->main_model->insert_table('users',$data);

            $this->session->set('user_key',$data['user_key']);
            set_cookie('user_key',$data['user_key'], 3600);

           // $this->response->setCookie('user_key',$data['user_key'], 3600);
            $this->session->set('user_type',$data['user_type']);
            set_cookie('user_type',$data['user_type']);

            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   $pno;
            echo json_encode($returnData);
        }
        
    }



    public function reglogin()
    {
        if ($this->request->getMethod() == "post") 
        {
            $rules = [
                "email" => [
                    "label" => "Email", 
                    "rules" => "required|CustomRules[users.email]"
                    ],
                "password"    => ["label" => "Password", "rules"  => "required"]
            ];
            if($this->validate($rules))
            {
                $email    =  $this->request->getpost("email");
                $password =  $this->request->getpost("password");
                $user = $this->main_model->getRowData('users','user_key,password,user_type',"email='$email' and deleted = '0'  ");
                if (password_verify($password,$user['password'])) 
                {
                    $this->session->set('user_key',$user['user_key']);
                    set_cookie('user_key',$user['user_key'], 3600);

                   // $this->response->setCookie('user_key',$user['user_key'], 3600);
                    $this->session->set('user_type',$user['user_type']);
                    set_cookie('user_type',$user['user_type']);

                    return redirect()->to('dashboard');
                }
                else
                {
                   $this->session->setTempdata('error','Your password is not match',3);
                }
            }
            else
            {
                $array['email']  = $this->validation->getError('email');
                $array['password']      = $this->validation->getError('password');
            }
        }

       
        $array['javascript'] =array(
            'public/public/vendor/global/global.min.js',
            'public/public/js/login.js');

        $array['style'] = 'public/public/css/style.css';
        // return view('reglogin',$array);
        return view('login',$array);
    }

    public function logout()
    {
        $this->session->destroy();
        delete_cookie('user_key');
        set_cookie('approval','no');
        return redirect()->to('reglogin');
    }

    public function register()
    {
        $data['javascript'] =array(
            'public/public/vendor/global/global.min.js',
            'public/public/js/register.js');

        $data['style'] = array(
            'public/public/css/registerstyle.css',
            'public/public/css/style.css',
            'public/public/vendor/jquery-steps/css/jquery.steps.css',
            'public/public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css'
        );
        $data['userDataSubmitOne']   = $this->session->get("userDataSubmitOne");
        $data['userDataSubmitTwo']   = $this->session->get("userDataSubmitTwo");
        $data['userDataSubmitThree'] = $this->session->get("userDataSubmitThree");
        return view('register',$data);
    }


    public function registerSubmitOne()
    {
        if ($this->request->isAJAX()) 
        {
            $rules = [
            "user_name"     => ["label" => "User Name","rules"     => "required|alpha|min_length[3]|max_length[15]"],
            "email"         => ["label" => "Email","rules"         => "required|valid_email|is_unique[users.email]"],
            "company_name"  => ["label" => "Company  Name","rules" => "required"],
            "phone_number"  => ["label" => "Phone No","rules"      => "required|is_unique[users.phone_number]|regex_match[/^[0-9]{10}$/]"]];


            if ($this->validate($rules)) 
            {
                $userData['user_name']                      = $this->request->getpost("user_name");
                $userData['email']                          = $this->request->getpost("email");
                $userData['phone_number']                   = $this->request->getpost("phone_number");
                $userData['company_name']                   = $this->request->getpost("company_name");
                $userData['alternate_phone_number']         = $this->request->getpost("alternate_phone_number");

                $this->session->set('userDataSubmitOne',$userData);

                $returnData['msg'] = "success"; 
                echo json_encode($returnData);
            }
            else
            {
                $returnData['error']                            = true ;
                $returnData['user_name']                        = $this->validation->getError('user_name');
                $returnData['email']                            = $this->validation->getError('email');
                $returnData['phone_number']                     = $this->validation->getError('phone_number');
                $returnData['company_name']                     = $this->validation->getError('company_name');
                $returnData['alternate_phone_number']           = $this->validation->getError('alternate_phone_number');
                echo json_encode($returnData);

            }
            
        }
    }

    public function registerSubmitTwo()
    {
        if ($this->request->isAJAX()) 
        {
            $rules = [
            "address"          => ["label" => "Address ","rules"   => "required"],
            "state"            => ["label" => "State ","rules"     => "required"],
            "city"             => ["label" => "City ","rules"      => "required"],
            "pin_code"         => ["label" => "Pin Code ","rules"  => "required|numeric"],
            "pan_no"           => ["label" => "PAN No ","rules"    => "required|regex_match[/[A-Z]{5}[0-9]{4}[A-Z]{1}$/]"],
            "gst_no"           => ["label" => "GST No ","rules"    => "required|regex_match[/[0-9]{2}[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9a-zA-Z]{1}[0-9a-zA-Z]{1}[0-9a-zA-Z]{1}$/]"]];
            if ($this->validate($rules)) 
            {
                $userData['address']      = $this->request->getpost('address');
                $userData['state']        = $this->request->getpost('state');
                $userData['city']         = $this->request->getpost('city');
                $userData['pin_code']     = $this->request->getpost('pin_code');
                $userData['pan_no']       = $this->request->getpost('pan_no');
                $userData['gst_no']       = $this->request->getpost('gst_no');

                $this->session->set('userDataSubmitTwo',$userData);

                $returnData['msg'] = "success"; 
                echo json_encode($returnData);
            }
            else
            {
                $returnData['error']              = true ;
                $returnData['address']            = $this->validation->getError('address');
                $returnData['state']              = $this->validation->getError('state');
                $returnData['city']               = $this->validation->getError('city');
                $returnData['pin_code']           = $this->validation->getError('pin_code');
                $returnData['pan_no']             = $this->validation->getError('pan_no');
                $returnData['gst_no']             = $this->validation->getError('gst_no');
                echo json_encode($returnData);
            }
            
        }
    }

    public function registerSubmitThree()
    {
        date_default_timezone_set("asia/kolkata");
        if ($this->request->isAJAX()) 
        {
            $rules = [
            "user_type"    => ["label" => "User type","rules"         => "required"],
            "password"     => ["label" => "Password","rules"          => "required|min_length[5]|max_length[15]"],
            "cr_password"  => ["label" => "Confrim Password","rules"  => "required|matches[password]"]];
            if ($this->validate($rules) === true) 
            {
                $user_type       = $this->request->getpost("user_type");
                $designation       = $this->request->getpost("designation");
                $password        = password_hash($this->request->getpost("password"), PASSWORD_BCRYPT);

                $userData['user_type']     = $user_type;
                $userData['designation']   = $designation;
                $userData['password']      = $password;
                $this->session->set("userDataSubmitThree",$userData);

                $userDataSubmitOne = $this->session->get("userDataSubmitOne");
                $userDataSubmitTwo = $this->session->get("userDataSubmitTwo");

                $data['user_key']                       = bin2hex(random_bytes(16));
                $data['user_name']                      = $userDataSubmitOne['user_name']; 
                $data['email']                          = $userDataSubmitOne['email'];
                $data['phone_number']                   = $userDataSubmitOne['phone_number'];
                $data['alternate_number']               = $userDataSubmitOne['alternate_phone_number'];
                $data['password']                       = $password;
                $data['user_type']                      = $user_type;
                $data['designation']                    = $designation;
                $data['address']                        = $userDataSubmitTwo['address'];
                $data['company_name']                   = $userDataSubmitOne['company_name'];
                $data['state']                          = $userDataSubmitTwo['state'];
                $data['city']                           = $userDataSubmitTwo['city'];
                $data['pin_code']                       = $userDataSubmitTwo['pin_code'];
                $data['gst_number']                     = $userDataSubmitTwo['gst_no'];
                $data['pan_number']                     = $userDataSubmitTwo['pan_no'];
                $data['is_active']                      = '0';
                $data['added_date']                     = date('Y-m-d H:i:s');

                $result = $this->main_model->insert_table('users',$data);

                if($result){
                    $returnData['msg'] = "success"; 
                    $returnData['data'] = "Account Registered Successfully"; 
                    echo json_encode($returnData);
                }
                else{
                    $returnData['msg'] = "error"; 
                    echo json_encode($returnData);
                }
               
            }
            else
            {
                $returnData['error']            = true ;
                $returnData['user_type']        = $this->validation->getError('user_type');
                $returnData['password']         = $this->validation->getError('password');
                $returnData['cr_password']      = $this->validation->getError('cr_password');
                echo json_encode($returnData);
            }
        }
    }

    

    

    public function dashboard()
    {
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;
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

        $data['title'] = "Dashboard";
       
        return view('include/header',$data)
        .view('include/navbar')
        .view('include/sidebar')
        .view('include/footer',$data);
    }

    public function userSidebar()
    {
        $status = $this->request->getpost('status');

        $data1['dashboard_type'] = $status;

        $check = $this->main_model->update_table("users", $data1, "id = $this->memberID");

        $this->dashboardStatus = $status;
        
        $resdata['appproved'] = $this->accountStatus;
        $resdata['dashboard_type'] = $this->dashboardStatus;

        $resdata['user_type'] = $this->userType;
       
        return view('include/responsivesidebar',$resdata);
        
    }

    public function getDashboard()
    {
        // $status = $this->request->getpost('status');

        // $data1['dashboard_type'] = $status;

        // $check = $this->main_model->update_table("users", $data1, "id = $this->memberID");

        // $this->dashboardStatus = $status;

        $cdate = date('d-m-Y') . ' 00:00:00';
        $ndate = date('d-m-Y' , strtotime("-7 days")) . ' 00:00:00';

        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['sale_listing'] = $this->main_model->getQueryRowData("select sum(total_price) as tamount FROM `orders` where sale_id = '$this->memberID' and added_by = '$this->memberID' ");

        $data['sale_requirement'] = $this->main_model->getQueryRowData("select sum(total_price) as tamount FROM `orders` where sale_id = '$this->memberID' and added_by != '$this->memberID' ");

        $data['sale_qty'] = $this->main_model->getQueryRowData("select sum(qty) as tqty FROM `orders` where sale_id = '$this->memberID' ");

        $data['sale_weekly'] = $this->main_model->getQueryRowData("select sum(total_price) as tamount FROM `orders` where sale_id = '$this->memberID' and added_date < '$cdate' and added_date > '$ndate' ");

        $data['ncustomer'] = $this->main_model->getQueryRowData("select count(id) as new_cus FROM `users` where approved = '0'  ");

        $data['tcustomer'] = $this->main_model->getQueryRowData("select count(id) as tcus FROM `users` where deleted = '0'  ");    

         $data['salequery'] = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc limit 2");

         $data['graphdata']= $this->main_model->getQueryAllData("select pc.product_category , count(lp.id) as listing FROM product_category as pc left join product on product.product_category = pc.id left join listed_products as lp on lp.product_id = product.id where pc.deleted = 0 and pc.parentid = 0 group by pc.id;");

        $data['user_type'] = $this->userType;

        $data['userdata'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        
        $data['title'] = "Dashboard";
       
        return view('dashboard',$data);
        
    }

   
    public function workprofile()
    {
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;
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

        $data['title'] = "Dashboard";
       
        return view('include/header',$data)
        .view('include/navbar')
        .view('include/sidebar')
        .view('include/footer',$data);
    }


    public function getWorkprofile()
    {
       
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;

        $data['userdata'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        
        $data['title'] = "Dashboard";
       
        return view('profile/workprofile',$data);
        
    }

    public function profile()
    {
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;
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

        $data['title'] = "Dashboard";
       
        return view('include/header',$data)
        .view('include/navbar')
        .view('include/sidebar')
        .view('include/footer',$data);
    }


    public function getprofile()
    {
       
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;

        $data['userdata'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        
        $data['title'] = "Dashboard";
       
        return view('profile/profile',$data);
        
    }

    public function rating()
    {
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;
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

        $data['title'] ="Rating";
       
        return view('include/header',$data)
        .view('include/navbar')
        .view('include/sidebar')
        .view('include/footer',$data);
    }


    public function getRating()
    {
       
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;

        $data['query'] = $this->main_model->getRowData("rating", "*", "rating_to = '$this->memberID'");
        
        $data['title'] ="Rating";
       
        return view('profile/rating',$data);
        
    }

    public function contact()
    {
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;
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

        $data['title'] ="Contact";
       
        return view('include/header',$data)
        .view('include/navbar')
        .view('include/sidebar')
        .view('include/footer',$data);
    }


    public function getContact()
    {
       
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;

        $data['userData'] = $this->main_model->getRowData("users", "*", "id = 1");
        
        $data['title'] ="Contact";
       
        return view('profile/contact-us',$data);
        
    }

    public function about()
    {
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;
         $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
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

        $data['title'] ="About";
       
        return view('include/header',$data)
        .view('include/navbar')
        .view('include/sidebar')
        .view('include/footer',$data);
    }


    public function getAbout()
    {
       
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;

        $data['userData'] = $this->main_model->getRowData("users", "*", "id = 1");
        
        $data['title'] ="About";
       
        return view('profile/about-us',$data);
        
    }


    public function editprofile()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['appproved'] = $this->accountStatus;
         $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
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
        
                $data['title'] ="Profile";
               return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function geteditProfile()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;

      
            $data['customer'] = $this->main_model->getRowData("users"  , "*" ," deleted = 0 and id='$this->memberID' order by added_date desc");

            $data['title'] ="Profile";
           return view('profile/edit-profile',$data);
       
    }

    public function resetPassword()
    {
        $returnData['success'] = false;

                
                $rules = [
                    "oldpassword"     => ["label" => "Old Password","rules"          => "required|min_length[5]|max_length[15]"],
                    "newpassword"     => ["label" => "New Password","rules"          => "required|min_length[5]|max_length[15]"],
                    "cr_password"  => ["label" => "Confrim Password","rules"  => "required|matches[newpassword]"]];
                if ($this->validate($rules)) 
                {
                $oldpassword =  $this->request->getpost("oldpassword");
                $user = $this->main_model->getRowData('users','user_key,password,user_type',"id='$this->memberID' and deleted = '0'  ");
                if (password_verify($oldpassword,$user['password'])) 
                {
                    $password        = password_hash($this->request->getpost("newpassword"), PASSWORD_BCRYPT);
                    
                    $data['password']                      = $password; 
                    

                    $query = $this->main_model->update_table("users",$data,"id='$this->memberID'");
                    if ($query) 
                    {    
                        $returnData['success'] = true;
                        $returnData['message'] = 'Password Updated successfully';
                       
                        
                    }
                }
                
                   
                    else
                    {
                        $returnData =array(
                        'error'      => true,
                        'oldpassword'  => 'Old Password is Incorrect',
                        'newpassword'  => $this->validation->getError('newpassword'),
                        'cr_password'  => $this->validation->getError('cr_password'));
                    }
                }
                else
                {
                     $returnData =array(
                'error'      => true,
                'oldpassword'  => $this->validation->getError('oldpassword'),
                'newpassword'  => $this->validation->getError('newpassword'),
                'cr_password'  => $this->validation->getError('cr_password'));
                   
                }
            
            echo json_encode($returnData);
    }


    public function staff()
    {
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;
         $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
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

        $data['title'] = "Dashboard";
       
        return view('include/header',$data)
        .view('include/navbar')
        .view('include/sidebar')
        .view('include/footer',$data);
    }


    public function getStaff()
    {
       
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;

        $data['userdata'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
         $data['staff'] = $this->main_model->getQueryAllData("select * from users where deleted = 0 and oid = $this->memberID  order by added_date desc");
        $data['title'] = "Dashboard";
       
        return view('profile/staff',$data);
        
    }

    public function addStaff()
    {
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;
         $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
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

        $data['title'] = "Dashboard";
       
        return view('include/header',$data)
        .view('include/navbar')
        .view('include/sidebar')
        .view('include/footer',$data);
    }


    public function getAddStaff()
    {
       
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;

        $data['userdata'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        
        $data['title'] = "Dashboard";
       
        return view('profile/add-staff',$data);
        
    }

    public function submitStaff()
    {
        date_default_timezone_set("asia/kolkata");
        if ($this->request->isAJAX()) 
        {
            $rules = [
            "user_type"    => ["label" => "User type","rules"         => "required"],
            "password"     => ["label" => "Password","rules"          => "required|min_length[5]|max_length[15]"],
            "cpassword"  => ["label" => "Confrim Password","rules"  => "required|matches[password]"],
            "email"         => ["label" => "Email","rules"         => "required|valid_email|is_unique[users.email]"],
            "phone_number"  => ["label" => "Phone No","rules"      => "required|is_unique[users.phone_number]|regex_match[/^[0-9]{10}$/]"]];
            if ($this->validate($rules) === true) 
            {
              
                    $user_name          = $this->request->getpost("user_name");
                    $email              = $this->request->getpost("email");
                    $phone_number       = $this->request->getpost("phone_number");
                    $alternate_number   = $this->request->getpost("alternate_number");
                    $address            = $this->request->getpost("address");
                    $state              = $this->request->getpost("state");
                    $city               = $this->request->getpost("city");
                    $pincode            = $this->request->getpost("pincode");
                    $user_type          = $this->request->getpost("user_type");
                    $is_active          = $this->request->getpost("is_active");
                    $password           = password_hash($this->request->getpost("password"), PASSWORD_BCRYPT);


                $data['user_key']                       = bin2hex(random_bytes(16));
                $data['user_name']                      = $user_name; 
                $data['email']                          = $email;
                $data['phone_number']                   = $phone_number;
                $data['alternate_number']               = $alternate_number;
                $data['password']                       = $password;
                $data['user_type']                      = $user_type;
                $data['address']                        = $address;
                $data['state']                          = $state;
                $data['city']                           = $city;
                $data['pin_code']                       = $pincode;
                $data['is_active']                      = '1';
                $data['approved']                      = '1';
                $data['added_date']                     = date('Y-m-d H:i:s');
                $data['added_by']                       = $this->memberID;
                $data['oid']                            = $this->memberID;


                $result = $this->main_model->insert_table('users',$data);

                if($result){
                    $returnData['success'] = "true"; 
                    $returnData['data'] = "Account Registered Successfully"; 
                    echo json_encode($returnData);
                }
                else{
                    $returnData['msg'] = "error"; 
                    echo json_encode($returnData);
                }
               
            }
            else
            {
                $returnData['error']            = true ;
                $returnData['user_type']        = $this->validation->getError('user_type');
                $returnData['password']         = $this->validation->getError('password');
                $returnData['cpassword']      = $this->validation->getError('cpassword');
                echo json_encode($returnData);
            }
        }
    }

    public function getuserworkprofile()
    {
       
        $data['appproved'] = $this->accountStatus;
        $data['dashboard_type'] = $this->dashboardStatus;

        $data['user_type'] = $this->userType;

        $id = $this->request->getpost('id');
        $data['title'] = "Dashboard";
        if ($id == 1){  return view('profile/bailerprofile',$data); }
        else if ($id == 2){  return view('profile/corrugatorprofile',$data); }
        else if ($id == 3){  return view('profile/papermillprofile',$data); }
        else if ($id == 4){  return view('profile/traderprofile',$data); }
    }
    
}
