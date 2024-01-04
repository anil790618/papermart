<?php
namespace App\Controllers;
use App\Models\Main_model;
use CodeIgniter\Controller;

class ProductController extends BaseController
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


    public function product($mproduct)
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
                $data['title'] ="Products";
               return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getProduct($mproduct)
    {   $data['appproved'] = $this->accountStatus;
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $usertype = $this->userType;
        $q1 = '';
        $q2 = '';
        $q3 = '';
        $cid = $this->request->getpost('cid');
        
        
       
        if($usertype == 1){
            $q1 = 'and product.id != 2';
        }
        if($cid != ''){
            $q2 = 'and product.product_category = '.$cid;
        }
        if($mproduct == 1){
            $q3 = 'and   product.added_by = '.$this->memberID;
        }
        else{   
            $q3 = 'and  product.added_by = 1';
        }
        $data['user_id'] = $this->memberID;

            $data['query'] = $this->main_model->getQueryAllData("select product.*, product_type.product_type as typename , product_category.product_category as catname  from product join product_type on product.product_type = product_type.id join product_category on product.product_category = product_category.id where product.deleted = 0  $q1 $q2 $q3 order by product.product_name asc");

            $data['title'] ="Products";
          
        if($mproduct == 1){
             return view('product/myproducts',$data);
        }
        else{
             return view('product/products',$data);
        }
    }


     public function productcat($id)
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
         }$data['ur_id'] = $this->memberID;
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
                $data['title'] ="Products";
               return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getProductcat($id)
    {   $data['appproved'] = $this->accountStatus;
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $usertype = $this->userType;
        $q1 = '';
        $q2 = '';
       
        $cid = $this->request->getpost('cid');
        $product_category = $this->main_model->getRowData("product_category", "*", "id = '$id'");
        $data['user_id'] = $this->memberID;
        $subcat = $this->main_model->getRowData("product_category", "id", "parentid = '$id'");
        if(is_null($subcat)){
            
            if($id != ''){
                $q2 = 'and ( product.product_category = '.$id.' or product.sub_category = '.$id.')';
            }

            $data['query'] = $this->main_model->getQueryAllData("select product.*, product_type.product_type as typename , product_category.product_category as catname  , sc.product_category as subcatname  from product 
                left join product_type on product.product_type = product_type.id 
                left join product_category on product.product_category = product_category.id 
                left join product_category sc on product.sub_category = sc.id 
                where product.deleted = 0 and product.added_by = 1 $q2  order by product.product_name asc");
        }
        else{

            $data['subcat'] = $this->main_model->getQueryAllData("select *  from product_category where deleted = 0 and parentid = $id");
        }

        $data['product_category'] =$product_category;
        $data['catstatus']  = $subcat;
        $data['title']      = "Products";
      
    
         return view('product/products',$data);
        
    }

    public function getFilterproductcat()
    {   
        $id = $this->request->getpost('id');
        $search = $this->request->getpost('search');
        $sql = '';
        $sql2 = '';
        if( $search != ''){
            $sql = "and product_category.product_category like '%$search%'";
        }
        $data['appproved'] = $this->accountStatus;
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $usertype = $this->userType;
        $q1 = '';
        $q2 = '';
       
        $cid = $this->request->getpost('cid');
        $product_category = $this->main_model->getRowData("product_category", "*", "id = '$id'");
        $data['user_id'] = $this->memberID;
        $subcat = $this->main_model->getRowData("product_category", "id", "parentid = '$id'");
        if(is_null($subcat)){
            
            if($id != ''){
                $q2 = 'and ( product.product_category = '.$id.' or product.sub_category = '.$id.')';
            }
            if( $search != ''){
                $sql2 = "and ( product_category.product_category like '%$search%' 
                or product.product_name like '%$search%' )";
            }

            $data['query'] = $this->main_model->getQueryAllData("select product.*, product_type.product_type as typename , product_category.product_category as catname  , sc.product_category as subcatname  from product 
                left join product_type on product.product_type = product_type.id 
                left join product_category on product.product_category = product_category.id 
                left join product_category sc on product.sub_category = sc.id 
                where product.deleted = 0 and product.added_by = 1 $q2 $sql2 order by product.product_name asc");
        }
        else{

            $data['subcat'] = $this->main_model->getQueryAllData("select *  from product_category where deleted = 0 and parentid = $id $sql");
        }

        $data['product_category'] =$product_category;
        $data['catstatus']  = $subcat;
        $data['title']      = "Products";
      
    
         return view('product/filterproducts',$data);
        
    }

    public function categoryProduct()
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
         }$data['ur_id'] = $this->memberID;
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

                $data['title'] ="Product Category";
               return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getcategoryProduct()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
      
            $data['query'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0  order by added_date desc");

            $data['title'] ="Product Category";
           return view('product/categoryProduct',$data);
       
    }

    public function addCategory()
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

                $data['title'] ="Product Category";
               return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getAddCategory()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
      
        
        $data['title'] ="Product Category";
        return view('product/add-productcategory',$data);
       
    }

    public function productStock()
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

                $data['title'] ="Product Stock";
               return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getProductStock()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        
        $qry = "select  product_id,product_name, uom FROM product_stock as ps  join product on product.id = ps.product_id  where product.deleted = 0 GROUP by product_id;";
        $data['query'] = $this->main_model->getQueryAllData($qry);
        if($data['query'])
        {
            foreach ($data['query'] as $key => $value) 
            { 
               
                $stquery = "select  
((select coalesce(sum(stock), 0) from product_stock where credit_debit = '0' and product_id = ".$value['product_id'].")-(select coalesce(sum(stock), 0) from product_stock where credit_debit = '1' and product_id = ".$value['product_id'].")) as stock
 FROM product_stock as ps where product_id = 1 limit 1;";
                $a = $this->main_model->getQueryRowData($stquery);
                $data['query'][$key]['stock'] = $a['stock'];
            }
        }

            $data['title'] ="Product Stock";
           return view('product/stock',$data);
       
    }


//     select p.id, p.product_name , p.uom,
// ((select sum(ps1.stock) from product_stock ps1 where ps1.credit_debit = '0' and ps.product_id = p.id)-(select sum(ps2.stock) from product_stock ps2 where ps2.credit_debit = '1' and ps.product_id = p.id)) as stock 
// FROM product p
// left join product_stock ps on ps.product_id = p.id  
// where p.deleted = 0 and ps.added_by = 2 GROUP by ps.product_id;


    public function addProduct()
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

    public function getAddProduct()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['product_type'] = $this->main_model->getQueryAllData("select * from product_type where deleted = 0  order by product_type asc");
        $data['product_quality'] = $this->main_model->getQueryAllData("select * from product_quality where deleted = 0  order by product_quality asc");
        $data['category'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0  order by product_category asc");
        $data['subcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid != 0  order by product_category asc");

            $data['title'] ="Product Stock";
           return view('product/add-product',$data);
       
    }

    public function submitProduct()
    {
        if ($this->request->isAJAX()) 
        {
            $cus_id = $this->memberID; 
           $rules = [
                "product_name" => ["label" => "Product Name","rules" => "required|min_length[3]|max_length[100]|is_unique[product.product_name,cus_id,{cus_id}]"],
               
                "product_category" => ["label" => "Product Category","rules" => "required"]
                ];
           if ($this->validate($rules)) 
           {
                $product_name                   = $this->request->getpost("product_name");
                // $description                    = $this->request->getpost("description");
                $product_type                   = $this->request->getpost("product_type");
                $product_category               = $this->request->getpost("product_category");
                $subcategory                    = $this->request->getpost("subcategory");
                $string1                        = $this->request->getpost("specification");
                $string = preg_replace('/\.$/', '', $string1); 
                $array = explode(',', $string); 
                foreach($array as $value) 
                {
                    $$value                    = $this->request->getpost($value) ;
                }
                $productimage                   = $this->request->getFile("productimage");
              

                if (!empty($productimage) && $productimage->getsize() >0 ) {
                   $randomname = $productimage->getRandomName();
                   $productimage->move('./document/product/', $randomname);
                   $data['product_image']                         = $randomname; 
                }

                 $millspecification                   = $this->request->getFile("millspecification");
              

                if (!empty($millspecification) && $millspecification->getsize() >0 ) {
                   $randomname = $millspecification->getRandomName();
                   $millspecification->move('./document/product/specification', $randomname);
                   $data['millspecification']                         = $randomname; 
                }


                $data['cus_id']                         = $cus_id; 
                $data['product_name']                   = $product_name; 
                // $data['description']                    = $description; 
                $data['product_type']                   = $product_type; 
                $data['product_category']               = $product_category;
                $data['sub_category']            = $subcategory;
                $data['specarray']                      = $string1;
                foreach($array as $value) 
                {
                    $data[$value]                  = $$value ?? '' ;
                }
                $data['added_by']                       = $this->memberID; 
                $data['added_date']                     = $this->currentDate; 

               
                $query = $this->main_model->insert_table("product",$data);
                if ($query) 
                {
                    

                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Product added successfully';
                   
                    echo json_encode($returnData);
                }
                else{
                     $returnData['success'] = 'false';
                    $returnData['message'] = 'Invalid Query';
                 
                    echo json_encode($returnData);
                }
            }
            else
            {
               $returnData['error']                 = true ;
                $returnData['product_name']         = $this->validation->getError('product_name');
                $returnData['hsncode']              = $this->validation->getError('hsncode');
                $returnData['product_type']         = $this->validation->getError('product_type');
                $returnData['product_category']     = $this->validation->getError('product_category');
                $returnData['size']                 = $this->validation->getError('size');
                $returnData['uom']                  = $this->validation->getError('uom');
                $returnData['purchase_price']       = $this->validation->getError('purchase_price');
                $returnData['sale_price']           = $this->validation->getError('sale_price');
                $returnData['minimum_stock']        = $this->validation->getError('minimum_stock');
                $returnData['maximum_stock']        = $this->validation->getError('maximum_stock');
                   
                echo json_encode($returnData);
            }
        }
    }


    public function productType()
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

                $data['title'] ="Product Type";
               return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getProductType()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
      
            $data['query'] = $this->main_model->getQueryAllData("select * from product_type where deleted = 0  order by added_date desc");

            $data['title'] ="Product Type";
           return view('product/product-type',$data);
       
    }

    public function submitProductType()
    {
        if ($this->request->isAJAX()) 
        {
           $rules = [
                "product_type" => ["label" => "Product Type","rules" => "required|min_length[3]|max_length[50]|is_unique[product_type.product_type]"],
                 // "product_description" => ["label" => "Product Description","rules" => "required|min_length[5]|max_length[250]"],
             ];
           if ($this->validate($rules)) 
           {
                $product_type                   = $this->request->getpost("product_type");
                $product_description            = $this->request->getpost("product_description");

                $data['product_type']                   = $product_type; 
                $data['product_description']            = $product_description; 
                $data['added_by']                       = $this->memberID; 
                $data['added_date']                     = $this->currentDate; 
                $query = $this->main_model->insert_table("product_type",$data);
                if ($query) 
                {
                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Product Type added successfully';
                    $returnData['desc']    = $product_description;
                    $returnData['type']    = $product_type;
                    echo json_encode($returnData);
                }
            }
            else
            {
               $returnData['error']            = true ;
                $returnData['product_type']        = $this->validation->getError('product_type');
                $returnData['product_description']         = $this->validation->getError('product_description');
                   
                echo json_encode($returnData);
            }
        }
    }

    public function productCategory()
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

                $data['title'] ="Product Category";
               return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getProductCategory()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
      
            $data['query'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid=0 order by product_category asc ,  added_date desc");

            $data['title'] ="Product Category";
           return view('product/product-category',$data);
       
    }

    public function submitProductCategory()
    {
        if ($this->request->isAJAX()) 
        {
            $rules = [
                "product_category" => ["label" => "Product Category","rules" => "required|min_length[3]|max_length[100]|is_unique[product_category.product_category]"],
                // "product_description" => ["label" => "Product Description","rules" => "required|min_length[5]|max_length[250]"],
            ];
           if ($this->validate($rules)) 
           {
                $product_category                   = $this->request->getpost("product_category");
                $product_description            = $this->request->getpost("product_description");
                $default_category            = $this->request->getpost("default_category") ?? '0';
                $product_specification                       = $this->request->getpost("product_specification") ?? '';
                $prefilled                       = $this->request->getpost("prefilled") ?? '';
                $required                       = $this->request->getpost("required") ?? '';
                $sale_user                      = $this->request->getpost("sale_user") ?? '';
                $buy_user                       = $this->request->getpost("buy_user") ?? '';
                if(!empty($buy_user)){ $buser = implode(',', $buy_user); } else { $buser = '';}
                if(!empty($sale_user)){ $suser = implode(',', $sale_user); } else { $suser = '';}

                //$subactname                   = $this->request->getpost("subactname");

                if(!empty($product_specification)){ $pspecification = implode(',', $product_specification); } else { $pspecification = '';}
                if(!empty($prefilled)){ $pfilled = implode(',', $prefilled); } else { $pfilled = '';}
                if(!empty($required)){ $prequired = implode(',', $required); } else { $prequired = '';}


                $data['product_category']               = $product_category; 
                $data['product_description']            = $product_description; 
                $data['product_specification']          = $pspecification; 
                $data['required']                       = $prequired; 
                $data['pre_filled']                     = $pfilled; 
                $data['default']                        = $default_category; 
                $data['sale_user']                      = $suser; 
                $data['buy_user']                       = $buser; 
                $data['added_by']                       = $this->memberID; 
                $data['added_date']                     = $this->currentDate; 
                $query = $this->main_model->insert_table("product_category",$data);
                if ($query) 
                {   
                    // for($i=0; $i<count($subactname); $i++){

                    // $data1['parentid']                      = $query ;
                    // $data1['product_category']              = $subactname[$i] ;
                    // $data1['added_by']                       = $this->memberID; 
                    // $data1['added_date']                     = $this->currentDate;   
                    // $this->main_model->insert_table("product_category",$data1);

                    // }

                    if($default_category == 1){ $default =  'Default Category' ; } else{ $default = '-'; }
                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Product Category added successfully';
                    $returnData['desc']    = $default;
                    $returnData['type']    = $product_category;
                    $returnData['cid']    = $query;
                    echo json_encode($returnData);
                }
            }
            else
            {
                $returnData['error']            = true ;
                $returnData['product_category']        = $this->validation->getError('product_category');
                //$returnData['product_description']         = $this->validation->getError('product_description');
                   
                echo json_encode($returnData);
            }
        }
    }

    public function getPcat()
    {
        
        $id = $this->request->getpost('id');

        $data['deleted'] = 1;
        $data['deleted_by'] = $this->memberID;

        $pcat = $this->main_model->getRowData("product_category"  , "*" ," deleted = 0 and id='$id' order by added_date desc");
        if ($pcat) {
            if($pcat['parentid'] != 0 ){
                $pid = $pcat['parentid'];
                $parentcat = $this->main_model->getRowData("product_category"  , "*" ," deleted = 0 and id='$pid' order by added_date desc");
                $returnData['parent_specification']      =   $parentcat['product_specification'];  
            }
            $returnData['success']   =   'true';
            $returnData['name']      =   $pcat['product_category'];    
             $returnData['parentid']      =   $pcat['parentid'];    
            $returnData['description']      =   $pcat['product_description'];    
            $returnData['default']      =   $pcat['default'];    
            $returnData['product_specification']      =   $pcat['product_specification'];  
            $returnData['sale_user']      =   $pcat['sale_user'];    
            $returnData['buy_user']      =   $pcat['buy_user'];    
            $returnData['required']      =   $pcat['required'];    
            $returnData['pre_filled']      =   $pcat['pre_filled'];    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }

    public function productQuality()
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

                $data['title'] ="Product Quality";
               return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getProductQuality()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
      
            $data['query'] = $this->main_model->getQueryAllData("select * from product_quality where deleted = 0  order by product_quality asc,  added_date desc");
             $data['productcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid = 0 order by product_category asc");
             $data['subcategory'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0 and parentid != 0  order by product_category asc");
            $data['title'] ="Product Quality";
           return view('product/product-quality',$data);
       
    }

    public function submitProductQuality()
    {
        if ($this->request->isAJAX()) 
        {
            $rules = [
                "product_quality" => ["label" => "Product Quality","rules" => "required|min_length[1]|max_length[50]|is_unique[product_quality.product_quality]"],
                // "product_description" => ["label" => "Product Description","rules" => "required|min_length[5]|max_length[250]"],
            ];
           if ($this->validate($rules)) 
           {
                $product_quality                   = $this->request->getpost("product_quality");
                $product_description            = $this->request->getpost("product_description");
                $product_category            = $this->request->getpost("product_category");
                $sub_category            = $this->request->getpost("subcategory");

                $data['product_quality']                = $product_quality; 
                $data['product_description']            = $product_description; 
                $data['product_category']               = $product_category; 
                $data['sub_category']            = $sub_category; 
                $data['added_by']                       = $this->memberID; 
                $data['added_date']                     = $this->currentDate; 
                $query = $this->main_model->insert_table("product_quality",$data);
                if ($query) 
                {
                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Product Quality added successfully';
                    $returnData['desc']    = $product_description;
                    $returnData['type']    = $product_quality;
                    $returnData['id']      = $query;
                    echo json_encode($returnData);
                }
            }
            else
            {
                $returnData['error']            = true ;
                $returnData['product_quality']        = $this->validation->getError('product_quality');
                $returnData['product_description']         = $this->validation->getError('product_description');
                   
                echo json_encode($returnData);
            }
        }
    }

    public function editProduct($id)
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

    public function getEditProduct($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['product'] = $this->main_model->getRowData("product"  , "*" ," deleted = 0 and id='$id' order by added_date desc");
        $data['product_type'] = $this->main_model->getQueryAllData("select * from product_type where deleted = 0  order by added_date desc");
        $data['product_quality'] = $this->main_model->getQueryAllData("select * from product_quality where deleted = 0  order by added_date desc");
        $data['product_category'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0  order by added_date desc");

            $data['title'] ="Product ";
           return view('product/edit-product',$data);
       
    }



    public function updateProduct()
    {
        if ($this->request->isAJAX()) 
        {
            $cus_id = $this->memberID; 
           $rules = [
                "product_name" => ["label" => "Product Name","rules" => "required|min_length[3]|max_length[100]"],
                "hsncode" => ["label" => "HsnCode","rules" => "required"],
                "product_type" => ["label" => "Product Type","rules" => "required"],
                "product_category" => ["label" => "Product Category","rules" => "required"],
                "size" => ["label" => "Size","rules" => "required"],
                "uom" => ["label" => "UOM","rules" => "required"],
                "purchase_price" => ["label" => "Purchase price","rules" => "required"],
                "sale_price" => ["label" => "Sale Price","rules" => "required"],
                "minimum_stock" => ["label" => "Minimum Stock","rules" => "required"],
                "maximum_stock" => ["label" => "Maximum Stock","rules" => "required"]
                ];
           if ($this->validate($rules)) 
           {
                $product_id                     = $this->request->getpost("product_id");
                $product_name                   = $this->request->getpost("product_name");
                $description                    = $this->request->getpost("description");
                $hsncode                        = $this->request->getpost("hsncode");
                $product_type                   = $this->request->getpost("product_type");
                $product_category               = $this->request->getpost("product_category");
                $size                           = $this->request->getpost("size");
                $uom                            = $this->request->getpost("uom");
                $productimage                   = $this->request->getFile("productimage");
                $purchase_price                 = $this->request->getpost("purchase_price");
                $sale_price                     = $this->request->getpost("sale_price");
                $minimum_stock                  = $this->request->getpost("minimum_stock");
                $maximum_stock                  = $this->request->getpost("maximum_stock");
                $sale_user                      = $this->request->getpost("sale_user") ?? '';
                $buy_user                       = $this->request->getpost("buy_user") ?? '';
                $buser = implode(',', $buy_user);
                $suser = implode(',', $sale_user);

                if (!empty($productimage) && $productimage->getsize() >0 ) {
                   $randomname = $productimage->getRandomName();
                   $productimage->move('./document/product/', $randomname);
                   $data['product_image']                         = $randomname; 
                }

                $data['cus_id']                         = $cus_id; 
                $data['product_name']                   = $product_name; 
                $data['description']                    = $description; 
                $data['hsncode']                        = $hsncode; 
                $data['product_type']                   = $product_type; 
                $data['product_category']               = $product_category; 
                $data['size']                           = $size; 
                $data['uom']                            = $uom; 
                $data['purchase_price']                 = $purchase_price; 
                $data['sale_price']                     = $sale_price; 
                $data['minimum_stock']                  = $minimum_stock; 
                $data['maximum_stock']                  = $maximum_stock; 
                $data['sale_user']                      = $suser; 
                $data['buy_user']                       = $buser; 
                $query = $this->main_model->update_table("product",$data,"id='$product_id'"); 
                if ($query) 
                {
                    // $data1['product_id']                     = $product_id; 
                    // $data1['stock']                          = $minimum_stock; 
                    // $data1['added_by']                       = $this->memberID; 
                    // $data1['added_date']                     = $this->currentDate; 
                    // $this->main_model->insert_table("product_stock",$data1);

                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Product Updated successfully';
                   
                    echo json_encode($returnData);
                }
            }
            else
            {
               $returnData['error']                 = true ;
                $returnData['product_name']         = $this->validation->getError('product_name');
                $returnData['hsncode']              = $this->validation->getError('hsncode');
                $returnData['product_type']         = $this->validation->getError('product_type');
                $returnData['product_category']     = $this->validation->getError('product_category');
                $returnData['size']                 = $this->validation->getError('size');
                $returnData['uom']                  = $this->validation->getError('uom');
                $returnData['purchase_price']       = $this->validation->getError('purchase_price');
                $returnData['sale_price']           = $this->validation->getError('sale_price');
                $returnData['minimum_stock']        = $this->validation->getError('minimum_stock');
                $returnData['maximum_stock']        = $this->validation->getError('maximum_stock');
                   
                echo json_encode($returnData);
            }
        }
    }



    public function deleteProduct()
    {
        
        $id = $this->request->getpost('id');

        $data['deleted'] = 1;
        $data['deleted_by'] = $this->memberID;

        $check = $this->main_model->update_table("product", $data, "id = '$id'");
        if ($check) {
            $returnData['success']   =   'true';
            $returnData['message']   =   'Product Deleted Successfully';
            $returnData['data']      =   '';    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }

    public function deleteProductCategory()
    {
        
        $id = $this->request->getpost('id');

        $data['deleted'] = 1;
        $data['deleted_by'] = $this->memberID;

        $check = $this->main_model->update_table("product_category", $data, "id = '$id'");
        if ($check) {
            $returnData['success']   =   'true';
            $returnData['message']   =   'Product Category Deleted Successfully';
            $returnData['data']      =   '';    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }


    public function viewProduct($id)
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

                $data['title'] ="Product ";
               return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getViewProduct($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['product'] = $this->main_model->getRowData("product"  , "*" ," deleted = 0 and id='$id' order by added_date desc");
        $data['product_type'] = $this->main_model->getQueryAllData("select * from product_type where deleted = 0  order by added_date desc");
        $data['product_quality'] = $this->main_model->getQueryAllData("select * from product_quality where deleted = 0  order by added_date desc");
        $data['product_category'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0  order by added_date desc");

            $data['title'] ="Product ";
           return view('product/view-product',$data);
       
    }

    public function updateProductCategory()
    {
        if ($this->request->isAJAX()) 
        {
            $rules = [
                "u_product_category" => ["label" => "Product Category","rules" => "required|min_length[3]|max_length[50]"],
                // "u_product_description" => ["label" => "Product Description","rules" => "required|min_length[5]|max_length[250]"],
            ];
           if ($this->validate($rules)) 
           {    $pcatid                   = $this->request->getpost("pcatid");
                $product_category                   = $this->request->getpost("u_product_category");
                $product_description            = $this->request->getpost("product_description");
                $default_category            = $this->request->getpost("u_default_category") ?? '0';
                $product_specification                       = $this->request->getpost("product_specification") ?? '';
                $required                       = $this->request->getpost("required") ?? '';
                $prefilled                       = $this->request->getpost("prefilled") ?? '';
                $sale_user                      = $this->request->getpost("sale_user") ?? '';
                $buy_user                       = $this->request->getpost("buy_user") ?? '';
                if(!empty($buy_user)){ $buser = implode(',', $buy_user); } else { $buser = '';}
                if(!empty($sale_user)){ $suser = implode(',', $sale_user); } else { $suser = '';}

                //$subactname                   = $this->request->getpost("subactname");

                if(!empty($product_specification)){ $pspecification = implode(',', $product_specification); } else { $pspecification = '';}
                if(!empty($required)){ $prequired = implode(',', $required); } else { $prequired = '';}
                 if(!empty($prefilled)){ $pfilled = implode(',', $prefilled); } else { $pfilled = '';}


                $data['product_category']               = $product_category; 
                $data['product_description']            = $product_description; 
                $data['product_specification']          = $pspecification; 
                $data['required']                       = $prequired;  
                $data['pre_filled']                       = $pfilled; 
                $data['default']                        = $default_category; 
                $data['sale_user']                      = $suser; 
                $data['buy_user']                       = $buser; 
                $query = $this->main_model->update_table("product_category",$data , "id = '$pcatid'");
                if ($query) 
                {
                    $data2['sale_user']                      = $suser; 
                    $data2['buy_user']                       = $buser; 
                    $query = $this->main_model->update_table("product_category",$data2 , "parentid = '$pcatid'");

                    if($default_category == 1){ $default =  'Default Category' ; } else{ $default = '-'; }
                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Product Category Updated successfully';
                    $returnData['desc']    = $default;
                    $returnData['type']    = $product_category;
                    $returnData['cid']     = $pcatid;
                    
                }
                else{
                    $returnData['desc']    = $product_description;
                    $returnData['type']    = $product_category;
                    $returnData['cid']     = $pcatid;
                    
                }
            }
            else
            {
                $returnData['error']            = true ;
                $returnData['u_product_category']        = $this->validation->getError('u_product_category');
                $returnData['u_product_description']         = $this->validation->getError('u_product_description');
                   
                
            }
        }
        echo json_encode($returnData);
    }

    public function getPquality()
    {
        
        $id = $this->request->getpost('id');

        $data['deleted'] = 1;
        $data['deleted_by'] = $this->memberID;

        $pcat = $this->main_model->getRowData("product_quality"  , "*" ," deleted = 0 and id='$id' order by added_date desc");
        if ($pcat) {
            $returnData['success']          =   'true';
            $returnData['category']         =   $pcat['product_category'];   
            $returnData['name']             =   $pcat['product_quality'];    
            $returnData['description']      =   $pcat['product_description'];    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }
    

    public function updateProductQuality()
    {
        if ($this->request->isAJAX()) 
        {
            $rules = [
                "u_product_quality" => ["label" => "Product quality","rules" => "required|min_length[3]|max_length[50]"]
            ];
           if ($this->validate($rules)) 
           {    $pqualityid                         = $this->request->getpost("pqualityid");
                $product_quality                    = $this->request->getPost("u_product_quality");
                $product_category                   = $this->request->getpost("u_product_category") ;
                $product_description              = $this->request->getpost("u_product_description") ;
                if(!empty($product_specification)){ $pspecification = implode(',', $product_specification); } else { $pspecification = '';}

                $data['product_quality']                    = $product_quality; 
                $data['product_description']              = $product_description; 
                $data['product_category']                   = $product_category; 
                $query = $this->main_model->update_table("product_quality",$data , "id = '$pqualityid'");
                if ($query) 
                {
                    
                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Product Quality Updated successfully';
                    $returnData['type']    = $product_quality;
                    $returnData['cid']     = $pqualityid;
                    $returnData['desc']     = $product_description;
                    
                }
                else{
                    $returnData['desc']    = $product_description;
                    $returnData['type']    = $product_category;
                    $returnData['cid']     = $pqualityid;
                    
                }
            }
            else
            {
                $returnData['error']            = true ;
                $returnData['u_product_category']        = $this->validation->getError('u_product_category');
                $returnData['u_product_description']         = $this->validation->getError('u_product_description');
                   
                
            }
        }
        echo json_encode($returnData);
    }

    public function getSubcat()
    {
        $return['success'] = false;
        if($this->request->isAJAX())
        {
            
            $id=$this->request->getpost("id");
            if(!empty($id))
            {
               
                $data['subcatdata'] = $this->main_model->getQueryAllData("select * from product_category where deleted = '0'  and parentid= $id order by product_category asc");
                if(!empty($data['subcatdata']))
                {   
                    $return['success'] = true;
                    $return['user_type'] = $this->userType;
                    $return['list']    = $data['subcatdata'];
                }
            }
            echo json_encode($return, true);
        }
    } 




    // public function addsubCategory()
    // {   $returnData['success'] = 'false';
    //     if ($this->request->isAJAX()) 
    //     {   
    //         $parent_id                           = $this->request->getpost("parent_id");
    //         $subactname                   = $this->request->getPost("subactname");
           
    //        for($i=0; $i<count($subactname); $i++){

    //             $data1['parentid']                      = $parent_id ;
    //             $data1['product_category']              = $subactname[$i] ;
    //             $data1['added_by']                       = $this->memberID; 
    //             $data1['added_date']                     = $this->currentDate;   
    //              $query = $this->main_model->insert_table("product_category",$data1);

    //         }
    //         if ($query) 
    //         {
               
    //             $returnData['success'] = 'true';
    //             $returnData['message'] = 'Product Category Added successfully';
                
                
    //         }
    //         else{
    //               $returnData['success'] = 'false';
                
    //         }
            
    //     }
    //     echo json_encode($returnData);
    // }


    public function addsubCategory()
    {   $returnData['success'] = 'false';
        if ($this->request->isAJAX()) 
        {   
                $product_category                   = $this->request->getpost("product_category");
                $product_description            = $this->request->getpost("product_description");
                $parent_id                           = $this->request->getpost("parent_id");
                $buy_user                           = $this->request->getpost("buy_user");
                $sale_user                           = $this->request->getpost("sale_user");
                $product_specification                       = $this->request->getpost("product_specification") ?? '';
                $required                       = $this->request->getpost("required") ?? '';
                $prefilled                       = $this->request->getpost("prefilled") ?? '';

                if(!empty($product_specification)){ $pspecification = implode(',', $product_specification); } else { $pspecification = '';}
                if(!empty($required)){ $prequired = implode(',', $required); } else { $prequired = '';}
                 if(!empty($prefilled)){ $pprefilled = implode(',', $prefilled); } else { $pprefilled = '';}


                $data['product_category']               = $product_category; 
                $data['product_description']            = $product_description; 
                $data['parentid']                       = $parent_id ;
                $data['buy_user']                       = $buy_user ;
                $data['sale_user']                      = $sale_user ;
                $data['product_specification']          = $pspecification; 
                $data['required']                       = $prequired; 
                $data['pre_filled']                       = $pprefilled; 
                $data['added_by']                       = $this->memberID; 
                $data['added_date']                     = $this->currentDate; 
                $query = $this->main_model->insert_table("product_category",$data);
                if ($query) 
                {   
                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Product Category added successfully';
                   
                }
                else{
                    $returnData['error'] = 'true';
                }
            
        }
        echo json_encode($returnData);
    }

    public function updatesubCategory()
    {   $returnData['success'] = 'false';
        if ($this->request->isAJAX()) 
        {   
                $product_category               = $this->request->getpost("product_category");
                $product_description            = $this->request->getpost("product_description");
                $parent_id                      = $this->request->getpost("subcatparent_id");
                $product_specification          = $this->request->getpost("product_specification") ?? '';
                $required                       = $this->request->getpost("required") ?? '';
                $prefilled                      = $this->request->getpost("prefilled") ?? '';
                $id                      = $this->request->getpost("id") ;

                if(!empty($product_specification)){ $pspecification = implode(',', $product_specification); } else { $pspecification = '';}
                if(!empty($required)){ $prequired = implode(',', $required); } else { $prequired = '';}
                 if(!empty($prefilled)){ $pprefilled = implode(',', $prefilled); } else { $pprefilled = '';}


                $data['product_category']               = $product_category; 
                $data['product_description']            = $product_description; 
                $data['parentid']                       = $parent_id ;
                $data['product_specification']          = $pspecification; 
                $data['required']                       = $prequired; 
                $data['pre_filled']                     = $pprefilled; 
                
                $query = $this->main_model->update_table("product_category",$data,"id='$id'"); 
                if ($query) 
                {   
                    $returnData['success'] = 'true';
                    $returnData['message'] = 'Product Sub Category updated successfully';
                   
                }
                else{
                    $returnData['error'] = 'true';
                }
            
        }
        echo json_encode($returnData);
    }
    public function getqualityspec()
    {
        $return['success'] = false;
        if($this->request->isAJAX())
        {
            
            $id=$this->request->getpost("id");
            if(!empty($id))
            {
               
                $data['quality'] = $this->main_model->getQueryAllData("select * from product_quality where deleted = '0'  and sub_category= $id order by product_quality asc");
                
                $cat = $this->main_model->getRowData("product_category", "*", "id = '$id'");
                $brand = $this->main_model->getAllRowsData("product", "*", "sub_category = '$id'");
              //   $data['brand'] = $this->main_model->getQueryAllData("select * from product_quality where deleted = '0'  and product_category= $id order by product_quality asc");
   
                    $return['success']      = true;
                    $return['quality']      = $data['quality'];
                    $return['specification']= $cat['product_specification'];
                    $return['filled']       = $cat['pre_filled'];
                    $return['brand']        =  $brand ;
                    $return['quality']      =   $data['quality'] ;
              
            }
            echo json_encode($return, true);
        }
    } 

    public function getpdata()
    {
        $return['success'] = false;
        if($this->request->isAJAX())
        {
            
            $id=$this->request->getpost("pid");
                $cat = $this->main_model->getRowData("product", "*", "id = '$id'");
   
           
            echo json_encode($cat, true);
        }
    } 

    public function getSearchByCategory()
    {
        $return['success'] = false;
        if($this->request->isAJAX())
        {
            $id = $this->request->getpost("id");
            
            $data['quality'] = $this->main_model->getQueryAllData("select * from product_quality where deleted = '0' and product_category = $id order by product_quality asc");
            $data['sub_category'] = $this->main_model->getQueryAllData("select * from product_category where deleted = '0' and parentid = $id order by product_category asc");
            $data['brand'] = $this->main_model->getQueryAllData("select * from product where deleted = 0   and product_category = $id order by added_date asc");

            $data['Specification']= $this->main_model->getRowData("product_category","product_specification","deleted = 0 and id = $id");

            $return['success']          = true;
            $return['specification']    = $data['Specification']['product_specification'];
            $return['quality']          = $data['quality'];
            $return['sub_category']     = $data['sub_category'];
            $return['brand']            = $data['brand'];
        }

       echo json_encode($return, true);
    } 

    public function getMillspecification($id)
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['product'] = $this->main_model->getRowData("product"  , "*" ," deleted = 0 and id='$id' order by added_date desc");
        $data['product_type'] = $this->main_model->getQueryAllData("select * from product_type where deleted = 0  order by added_date desc");
        $data['product_quality'] = $this->main_model->getQueryAllData("select * from product_quality where deleted = 0  order by added_date desc");
        $data['product_category'] = $this->main_model->getQueryAllData("select * from product_category where deleted = 0  order by added_date desc");

            $millspecification =$data['product']['millspecification'];
           return $millspecification;
       
    }
    
}
