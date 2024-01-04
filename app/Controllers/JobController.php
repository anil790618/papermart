<?php
namespace App\Controllers;
use App\Models\Main_model;
use CodeIgniter\Controller;

class JobController extends BaseController
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


    

    public function job()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
        $data['appproved'] = $this->accountStatus;
        $data['memberDetail'] = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
        $data['productcategory'] = $this->main_model->getQueryAllData("select * from produc                                  t_category where deleted = 0 and parentid = 0 order by product_category asc");

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


            $data['title'] ="Job";
            return view('include/header',$data)
            .view('include/navbar')
            .view('include/sidebar')
            .view('include/footer',$data);
       
    }

    public function getJob()
    {
        $data['user_type'] = $this->userType;
        $data['dashboard_type'] = $this->dashboardStatus;
      
            $data['query'] = $this->main_model->getQueryAllData("select * from jobsposted where deleted = 0 and added_by = $this->memberID order by added_date desc");

            $data['title'] ="Job";
           return view('job/job',$data);
       
    }




    public function submitJob()
    {
        if ($this->request->isAJAX()) 
        {
           $rules = [
             
                "post" => ["label" => "Job Post","rules" => "required"],
                "description" => ["label" => "Job Description ","rules" => "required"]

                ];
           if ($this->validate($rules)) 
           {
                $post                               = $this->request->getpost("post");
                $description                        = $this->request->getpost("description");
                
                
                
                $data['post']                       = $post; 
                $data['description']                = $description; 
                $data['added_by']                   = $this->memberID; 
                $data['added_date']                 = $this->currentDate; 
                $query = $this->main_model->insert_table("jobsposted",$data);
                if ($query) 
                {
                    $returnData['success']       = 'true';
                    $returnData['message']       = 'Job Posted successfully';
                    $returnData['jpid']          = $query; 
                    $returnData['post']          = $post; 
                    $returnData['description']   = $description; 
                    echo json_encode($returnData);
                }
               
            }
            else
            {
               $returnData['error']                          = true ;
               $returnData['post']                           = $this->validation->getError('post');
               $returnData['description']                    = $this->validation->getError('description');
                echo json_encode($returnData);
            }
        }
    }

    
    public function getJobData()
    {
        
        $id = $this->request->getpost('id');

       
        $jobdata = $this->main_model->getRowData("jobsposted"  , "*" ," deleted = 0 and id='$id' order by added_date desc");
        if ($jobdata) {
            $returnData['success']   =   'true';
            $returnData['post']      =   $jobdata['post'];    
            $returnData['description']      =   $jobdata['description'];    
            echo json_encode($returnData);
        } else {
            $returnData['success']   =   'false';
            $returnData['message']   =    'Somthing went wrong!';
            $returnData['data']      =   '';
            echo json_encode($returnData);
        }
        
    }

     public function updateJob()
    {
        if ($this->request->isAJAX()) 
        {
           $rules = [
             
                "u_post" => ["label" => "Job Post","rules" => "required"],
                "u_description" => ["label" => "Job Description ","rules" => "required"]

                ];
           if ($this->validate($rules)) 
           {
                $post                               = $this->request->getpost("u_post");
                $description                        = $this->request->getpost("u_description");
                $id                               = $this->request->getpost("jpid");
                
                
                $data['post']                       = $post; 
                $data['description']                = $description; 

                $query = $this->main_model->update_table("jobsposted",$data ,"id='$id'");
                if ($query) 
                {
                    $returnData['success']       = 'true';
                    $returnData['message']       = 'Job Updated successfully';
                    $returnData['jpid']          = $id; 
                    $returnData['post']          = $post; 
                    $returnData['description']   = $description; 
                    echo json_encode($returnData);
                }
               
            }
            else
            {
               $returnData['error']                          = true ;
               $returnData['post']                           = $this->validation->getError('u_post');
               $returnData['description']                    = $this->validation->getError('u_description');
                echo json_encode($returnData);
            }
        }
    }

    public function deleteJob()
    {
        
        $id = $this->request->getpost('id');

        $data['deleted'] = 1;
        $data['deleted_by'] = $this->memberID;

        $check = $this->main_model->update_table("jobsposted", $data, "id = '$id'");
        if ($check) {
            $returnData['success']   =   'true';
            $returnData['message']   =   'Job posted Deleted Successfully';
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
