<?php
namespace App\Controllers;
use App\Models\Main_model;
use CodeIgniter\Controller;

class ComplainController extends BaseController
{
 

   public function complainResponse() {
        $returnData["success"] = "false";
        $id = $this->request->getpost('id');
        $com_rej = $this->request->getpost('com_rej'); 
        $data['complain_status']=2;
        $data['complain_reject_reason']=$com_rej;
        $check1 = $this->main_model->update_table(
            "ordered_product_specification",
            $data,
            "id = $id "
        );
        if ($check1) {
            $returnData["success"] = "true";
            $returnData["message"] = "Reason Added successfully ! ";
            echo json_encode($returnData);
        }
   }
   public function complainResolve() {
        $returnData["success"] = "false";
        $id = $this->request->getpost('id'); 
        $data['complain_status']=1; 
        $check1 = $this->main_model->update_table(
            "ordered_product_specification",
            $data,
            "id = $id "
        );
        if ($check1) {
            $returnData["success"] = "true";
            $returnData["message"] = "Reason Added successfully ! ";
            echo json_encode($returnData);
        }
   }


}
