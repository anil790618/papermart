<?php
namespace App\Controllers;
use App\Models\Main_model;
use CodeIgniter\Controller;

class SaudaController extends BaseController
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


    

    public function sauda()
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

    public function getsauda()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
      
            $data['query'] = $this->main_model->getQueryAllData("select * from vendors where deleted = 0 and added_by = $this->memberID order by added_date desc");

            $data['title'] ="sauda";
           return view('sauda/sauda',$data);
       
    }

  

    

    
}
