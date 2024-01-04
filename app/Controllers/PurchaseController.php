<?php
namespace App\Controllers;
use App\Models\Main_model;
use CodeIgniter\Controller;
use PhpSpreadsheet\IOFactory; 

class PurchaseController extends BaseController
{
    public function index()
    {
        if ($this->session->get("user")) {
            return redirect()->to("dashboard");
        } else {
            return redirect()->to("login");
        }
    }

    public function purchase()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["appproved"] = $this->accountStatus;
        $data["memberDetail"] = $this->main_model->getRowData(
            "users",
            "*",
            "id = '$this->memberID'"
        );
        $data["productcategory"] = $this->main_model->getQueryAllData(
            "select * from product_category where deleted = 0 and parentid = 0 order by product_category asc"
        );
        $data["notification"] = $this->main_model->getQueryAllData(
            "select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc"
        );
        $query = $this->main_model->getQueryAllData(
            "select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc"
        );
        $nid = $query[0]["id"] ?? "";
        if ($nid) {
            $data["ordertracking"] = $this->main_model->getQueryAllData(
                "select * from ordertracking where order_id = '$nid' order by added_date asc"
            );
        } else {
            $data["ordertracking"] = "";
        }
        $data["ur_id"] = $this->memberID;
        $data["style"] = [
            "public/public/css/style.css",
            "public/public/vendor/toastr/css/toastr.min.css",
            "public/public/vendor/sweetalert2/dist/sweetalert2.min.css",
            "public/public/vendor/pickadate/themes/default.css",
            "public/public/vendor/pickadate/themes/default.date.css",
        ];
        $data["javascript"] = [
            "public/public/vendor/global/global.min.js",
            "public/public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js",
            "public/public/js/custom.min.js",
            "public/public/js/deznav-init.js",
            "public/public/vendor/toastr/js/toastr.min.js",
            "public/public/js/plugins-init/toastr-init.js",
            "public/public/vendor/sweetalert2/dist/sweetalert2.min.js",
            "public/public/js/bootstrap.bundle.min.js",
            "public/public/vendor/moment/moment.min.js",
            "public/public/vendor/pickadate/picker.js",
            "public/public/vendor/pickadate/picker.date.js",
            "public/public/js/plugins-init/pickadate-init.js",
            "public/public/js/dashboard/dashboard.js",
            "public/public/js/ajax.js",
            "public/public/js/customer.js",
            "public/public/js/vehicle.js",
            "public/public/js/purchase.js",
            "public/public/js/product.js",
            "public/public/js/profile.js",
            "public/public/js/list.js",
            "public/public/js/vendor.js",
            "public/public/js/url.js",
            "public/public/js/browser-navigation.js",
        ];

        $data["title"] = "Purchase";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getPurchase()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["orderspecificationdata"] = $this->main_model->getQueryAllData(
            " select size from ordered_product_specification where deleted = 0"
        );
        $data["userid"] = $this->memberID;
        if($this->memberID==1){
            $data["query"] = $this->main_model->getQueryAllData("select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno , (select id from transport_request where transport_request.order_id = orders.id )as trid from purchases join orders on purchases.order_id = orders.id  where purchases.deleted = 0  order by purchases.added_date desc" );
        }else{
            $data["query"] = $this->main_model->getQueryAllData(
                "select listed_products.added_by,orders.*,(select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno , (select id from transport_request where transport_request.order_id = orders.id )as trid  from orders inner join listed_products on listed_products.id=orders.list_id  inner join purchases on purchases.order_id = orders.id  where purchases.deleted = 0 and listed_products.added_by = $this->memberID or  listed_products.accepted_by = $this->memberID order by purchases.added_date desc"
            );
            $listid = $data["query"][0]['list_id'];
            $data["listspecification"] = $this->main_model->getQueryAllData("select response_specification.*,list_specification.* , (select product_name from product where product.id = list_specification.brand_name) as bname, (select product_category from product_category where product_category.id = list_specification.sub_category) as cname
            , (select `required` from product_category where product_category.id = list_specification.sub_category) as fl_required  from list_specification left join response_specification on response_specification.specification_id = list_specification.id and ( response_specification.added_by = '$this->memberID' or  response_specification.added_by is null)  where list_id = '$listid'");
            // $data["query"] = $this->main_model->getQueryAllData(
            //     "select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno , (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid from purchases join orders on purchases.order_id = orders.id  where purchases.deleted = 0 and purchases.added_by = $this->memberID order by purchases.added_date desc"
            // ); 
            // $listid = $data["query"];
            // foreach ($listid as $key => $value) {
            //     $listid= $value['list_id'];
                
            //     $data["productspecification"][$key] = $this->main_model->getQueryAllData(
            //         "select * from ordered_product_specification where list_id=$listid"
            //     );
            // }
        }
       

        $data["title"] = "Purchase";
        return view("purchase/purchase", $data);
    }

    public function addPurchase()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["appproved"] = $this->accountStatus;
        $data["memberDetail"] = $this->main_model->getRowData(
            "users",
            "*",
            "id = '$this->memberID'"
        );
        $data["productcategory"] = $this->main_model->getQueryAllData(
            "select * from product_category where deleted = 0 and parentid = 0 order by product_category asc"
        );
        $data["notification"] = $this->main_model->getQueryAllData(
            "select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc"
        );

        $query = $this->main_model->getQueryAllData(
            "select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc"
        );
        $nid = $query[0]["id"] ?? "";
        if ($nid) {
            $data["ordertracking"] = $this->main_model->getQueryAllData(
                "select * from ordertracking where order_id = '$nid' order by added_date asc"
            );
        } else {
            $data["ordertracking"] = "";
        }
        $data["ur_id"] = $this->memberID;
        $data["style"] = [
            "public/public/css/style.css",
            "public/public/vendor/toastr/css/toastr.min.css",
            "public/public/vendor/sweetalert2/dist/sweetalert2.min.css",
            "public/public/vendor/pickadate/themes/default.css",
            "public/public/vendor/pickadate/themes/default.date.css",
        ];
        $data["javascript"] = [
            "public/public/vendor/global/global.min.js",
            "public/public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js",
            "public/public/js/custom.min.js",
            "public/public/js/deznav-init.js",
            "public/public/vendor/toastr/js/toastr.min.js",
            "public/public/js/plugins-init/toastr-init.js",
            "public/public/vendor/sweetalert2/dist/sweetalert2.min.js",
            "public/public/js/bootstrap.bundle.min.js",
            "public/public/vendor/moment/moment.min.js",
            "public/public/vendor/pickadate/picker.js",
            "public/public/vendor/pickadate/picker.date.js",
            "public/public/js/plugins-init/pickadate-init.js",
            "public/public/js/dashboard/dashboard.js",
            "public/public/js/ajax.js",
            "public/public/js/customer.js",
            "public/public/js/vehicle.js",
            "public/public/js/purchase.js",
            "public/public/js/product.js",
            "public/public/js/profile.js",
            "public/public/js/list.js",
            "public/public/js/vendor.js",
            "public/public/js/url.js",
            "public/public/js/browser-navigation.js",
        ];

        $data["title"] = "Purchase";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getAddPurchase()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["ordercount"] = $this->main_model->getNumRow(
            "orders",
            "id",
            " is_deleted=0"
        );
        $data["title"] = "Purchase";
        return view("purchase/add-purchase", $data);
    }

    public function submitPurchase()
    {
        if ($this->request->isAJAX()) {
            $rules = [
                "order_date" => [
                    "label" => "order Date ",
                    "rules" => "required",
                ],
            ];
            if ($this->validate($rules)) {
                $order_number = $this->request->getpost("order_number");
                $order_date = $this->request->getpost("order_date");
                $order_to_id = $this->request->getpost("order_to_id");
                $order_to_name = $this->request->getpost("order_to_name");
                $order_to_mobile = $this->request->getpost("order_to_mobile");
                $payment_status = $this->request->getpost("payment_status");
                $order_remark = $this->request->getpost("description");
                $order_type = $this->request->getpost("order_type");
                $vehicledetail = $this->request->getpost("vehicledetail");
                $ddays = $this->request->getpost("ddays");
                $pterms = $this->request->getpost("pterms");
                $dtype = $this->request->getpost("delivery_type");

                $specificationid = $this->request->getpost("specificationid");
                $qty = $this->request->getpost("qty");
                $rate = $this->request->getpost("rate");
                $price = $this->request->getpost("price");
                $tax = $this->request->getpost("tax");
                $discount = $this->request->getpost("discount");
                $insurance_cost = $this->request->getpost("insurance_cost");
                $total_price = $this->request->getpost("total_price");

                if ($order_type == "2") {
                    $response_id = $this->request->getpost("response_id");
                    $accepted_id = $this->request->getpost("accepted_id");
                    $list_id = $this->request->getpost("list_id") ?? "";
                    $rate_id = $this->request->getpost("rate_id") ?? "";
                    $data["list_id"] = $list_id;
                    $data["rate_id"] = $rate_id;
                    $data["sale_id"] = $accepted_id;
                    $data["ddays"] = $ddays;
                    $data["pterms"] = $pterms;
                    $data["dtype"] = $dtype;
                    $data["delivery_date"] = date(
                        "Y-m-d",
                        strtotime("+" . $ddays . " days")
                    );
                }

                $data["order_number"] = $order_number;
                $data["order_date"] = $order_date;
                $data["order_to_id"] = $order_to_id;
                $data["order_to_name"] = $order_to_name;
                $data["order_to_mobile"] = $order_to_mobile;
                $data["payment_status"] = $payment_status;
                $data["vehiclestatus"] = 0;
                $data["order_type"] = $order_type;

                $data["order_remark"] = $order_remark;
                $data["purchase_id"] = $this->memberID;
                $data["added_by"] = $this->memberID;
                $data["added_date"] = $this->currentDate;

                $check = $this->main_model->insert_table("orders", $data);

                if ($check) {
                    $purchasedata["order_id"] = $check;
                    $purchasedata["added_by"] = $this->memberID;
                    $purchasedata["added_date"] = $this->currentDate;
                    $this->main_model->insert_table("purchases", $purchasedata);

                    $ordertracking["order_id"] = $check;
                    $ordertracking["description"] = "Order Placed Successfully";
                    $ordertracking["added_by"] = $this->memberID;
                    $ordertracking["added_date"] = $this->currentDate;
                    $this->main_model->insert_table(
                        "ordertracking",
                        $ordertracking
                    );
                    if ($order_type == "2") {
                        $list_id = $this->request->getpost("list_id");
                        $response_id = $this->request->getpost("response_id");
                        $accepted_id = $this->request->getpost("accepted_id");

                        $saledata["order_id"] = $check;
                        $saledata["added_by"] = $accepted_id;
                        $saledata["added_date"] = $this->currentDate;
                        $this->main_model->insert_table("sales", $saledata);

                        $response["status"] = "1";
                        $cresponse["status"] = "2";
                        $responsesuccess = $this->main_model->update_table(
                            "response",
                            $response,
                            "id='$response_id'"
                        );
                        $cancelresponse = $this->main_model->update_table(
                            "response",
                            $cresponse,
                            "id!='$response_id' and list_id = $list_id"
                        );

                        $list_data["order_id"] = $check;
                        $list_data["list_status"] = "1";
                        $list_data["accepted_by"] = $accepted_id;
                        $list_data["accepted_date"] = $this->currentDate;
                        $this->main_model->update_table(
                            "listed_products",
                            $list_data,
                            "id='$list_id'"
                        );
                    }

                    $ptotal = 0;
                    $pqty = 0;

                    for ($i = 0; $i < count($specificationid); $i++) {
                        $data1["orders_id"] = $check;
                        $data1["order_number"] = $order_number;
                        $data1["specificationid"] = $specificationid[$i];
                        $data1["qty"] = $qty[$i];
                        $data1["rate"] = $rate[$i];
                        $data1["price"] = $price[$i];
                        $data1["tax"] = $tax[$i];
                        $data1["discount"] = $discount[$i];
                        $data1["insurance_cost"] = $insurance_cost[$i];
                        $data1["total_price"] = $total_price[$i];
                        $data1["added_by"] = $this->memberID;
                        $data1["added_date"] = $this->currentDate;

                        $check1 = $this->main_model->insert_table(
                            "order_product",
                            $data1
                        );

                        $ptotal = $ptotal + (float) $total_price[$i];
                        $pqty = $pqty + (float) $qty[$i];
                    }
                    if ($payment_status == 1) {
                        $data3["transaction_number"] = $order_number;
                        $data3["order_id"] = $check;
                        $data3["pay_recieve"] = "Debited";
                        $data3["trans_type"] = "2";
                        $data3["amount"] = $ptotal;
                        $data3["qty"] = $pqty;
                        $data3["added_by"] = $this->memberID;
                        $data3["added_date"] = $this->currentDate;
                        $check3 = $this->main_model->insert_table(
                            "daybook",
                            $data3
                        );
                    }

                    $data4["total_price"] = $ptotal;
                    $data4["qty"] = $pqty;

                    $check4 = $this->main_model->update_table(
                        "orders",
                        $data4,
                        "id = '$check'"
                    );

                    $returnData["success"] = "true";
                    $returnData["message"] =
                        "Purchase Order Added Successfully";
                    $returnData["data"] = $order_type;
                    echo json_encode($returnData);
                } else {
                    $returnData["success"] = "false";
                    $returnData["message"] = "Something went wrong!";
                    $returnData["data"] = "";
                    echo json_encode($returnData);
                }
            } else {
                $returnData["error"] = true;
                $returnData["order_date"] = $this->validation->getError(
                    "order_date"
                );

                echo json_encode($returnData);
            }
        }
    }

    public function getClient()
    {
        $return["success"] = false;
        if ($this->request->isAJAX()) {
            $search = "";
            $word = $this->request->getpost("search");
            if (!empty($word)) {
                $search_param = "%{$word}%";
                $data["client"] = $this->main_model->getQueryAllData(
                    "select * from vendors where deleted = '0'  and ( vendor_name like '$search_param' or phone_number like '$search_param' ) and is_active = 1 and added_by = $this->memberID order by vendor_name asc"
                );
                if (!empty($data["client"])) {
                    $return["success"] = true;
                    $return["list"] = $data["client"];
                }
            }
            echo json_encode($return, true);
        }
    }

    public function getVehicle()
    {
        $return["success"] = false;
        if ($this->request->isAJAX()) {
            $search = "";
            $word = $this->request->getpost("search");
            if (!empty($word)) {
                $search_param = "%{$word}%";
                $data["vehicle"] = $this->main_model->getQueryAllData(
                    "select * from vehicles where deleted = '0'  and ( vehicle_no like '$search_param' ) and added_by = $this->memberID order by vehicle_no asc"
                );
                if (!empty($data["vehicle"])) {
                    $return["success"] = true;
                    $return["list"] = $data["vehicle"];
                }
            }
            echo json_encode($return, true);
        }
    }

    public function getSearchProducts()
    {
        $return["success"] = false;

        if ($this->request->isAJAX()) {
            $search = "";
            $word = $this->request->getpost("search");
            $category = $this->request->getpost("category");
            if (!empty($word)) {
                $search_param = "%{$word}%";
                $data["product"] = $this->main_model->getQueryAllData(
                    "select * from product where deleted = '0' and product_category = $category  and ( product.added_by = '$this->memberID' or product.added_by = '1')  and ( product_name like '$search_param' )  order by product_name asc"
                );

                $data["quality"] = $this->main_model->getQueryAllData(
                    "select * from product_quality where deleted = '0' and product_category = $category order by product_quality asc"
                );
                $data["sub_category"] = $this->main_model->getQueryAllData(
                    "select * from product_category where deleted = '0' and parentid = $category order by product_category asc"
                );

                $data["Specification"] = $this->main_model->getRowData(
                    "product_category",
                    "product_specification",
                    "deleted = 0 and id = $category"
                );
                if (!empty($data["product"])) {
                    $return["success"] = true;
                    $return["list"] = $data["product"];

                    $return["specification"] =
                        $data["Specification"]["product_specification"];
                }
                $return["quality"] = $data["quality"];
                $return["sub_category"] = $data["sub_category"];
            }
            echo json_encode($return, true);
        }
    }

    public function getPaydata()
    {
        $orderid = $this->request->getpost("id");

        $orderdata = $this->main_model->getRowData(
            "orders",
            "*",
            "id = '$orderid'"
        );
        $amountrecieve = $this->main_model->getQueryRowData(
            "select sum(amount) as payamount from daybook where order_id = '$orderid' and pay_id = '$this->memberID'  "
        );

        $returnData["success"] = "true";
        $returnData["orderdata"] = $orderdata;
        $returnData["amountrecieve"] = $amountrecieve;
        echo json_encode($returnData);
    }

    public function submitPayment()
    {
        if ($this->request->isAJAX()) {
            $rules = [
                "amount" => ["label" => "Amount ", "rules" => "required"],
            ];
            if ($this->validate($rules)) {
                $qty = $this->request->getpost("qty");
                $amount = $this->request->getpost("amount");
                $orderid = $this->request->getpost("orderid");
                $pay_id = $this->main_model->getRowData(
                    "purchases",
                    "added_by",
                    "order_id = '$orderid'"
                );
                $recieve_id = $this->main_model->getRowData(
                    "sales",
                    "added_by",
                    "order_id = '$orderid'"
                );

                $data["order_id"] = $orderid;
                $data["amount"] = $amount;
                $data["qty"] = $qty;
                $data["pay_id"] = $pay_id;
                $data["recieve_id"] = $recieve_id;
                $data["added_by"] = $this->memberID;
                $data["added_date"] = $this->currentDate;

                $check = $this->main_model->insert_table("daybook", $data);

                if ($check) {
                    $returnData["success"] = "true";
                    $returnData["message"] = "Payment Updated Successfully";
                    echo json_encode($returnData);
                } else {
                    $returnData["success"] = "false";
                    $returnData["message"] = "Something went wrong!";
                    $returnData["data"] = "";
                    echo json_encode($returnData);
                }
            } else {
                $returnData["error"] = true;
                $returnData["amount"] = $this->validation->getError("amount");

                echo json_encode($returnData);
            }
        }
    }

    public function transactionhistory()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["appproved"] = $this->accountStatus;
        $data["memberDetail"] = $this->main_model->getRowData(
            "users",
            "*",
            "id = '$this->memberID'"
        );
        $data["productcategory"] = $this->main_model->getQueryAllData(
            "select * from product_category where deleted = 0 and parentid = 0 order by product_category asc"
        );
        $data["notification"] = $this->main_model->getQueryAllData(
            "select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc"
        );
        $query = $this->main_model->getQueryAllData(
            "select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc"
        );
        $nid = $query[0]["id"] ?? "";
        if ($nid) {
            $data["ordertracking"] = $this->main_model->getQueryAllData(
                "select * from ordertracking where order_id = '$nid' order by added_date asc"
            );
        } else {
            $data["ordertracking"] = "";
        }
        $data["ur_id"] = $this->memberID;
        $data["style"] = [
            "public/public/css/style.css",
            "public/public/vendor/toastr/css/toastr.min.css",
            "public/public/vendor/sweetalert2/dist/sweetalert2.min.css",
            "public/public/vendor/pickadate/themes/default.css",
            "public/public/vendor/pickadate/themes/default.date.css",
        ];
        $data["javascript"] = [
            "public/public/vendor/global/global.min.js",
            "public/public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js",
            "public/public/js/custom.min.js",
            "public/public/js/deznav-init.js",
            "public/public/vendor/toastr/js/toastr.min.js",
            "public/public/js/plugins-init/toastr-init.js",
            "public/public/vendor/sweetalert2/dist/sweetalert2.min.js",
            "public/public/js/bootstrap.bundle.min.js",
            "public/public/vendor/moment/moment.min.js",
            "public/public/vendor/pickadate/picker.js",
            "public/public/vendor/pickadate/picker.date.js",
            "public/public/js/plugins-init/pickadate-init.js",
            "public/public/js/dashboard/dashboard.js",
            "public/public/js/ajax.js",
            "public/public/js/customer.js",
            "public/public/js/vehicle.js",
            "public/public/js/purchase.js",
            "public/public/js/product.js",
            "public/public/js/profile.js",
            "public/public/js/list.js",
            "public/public/js/vendor.js",
            "public/public/js/url.js",
            "public/public/js/browser-navigation.js",
        ];

        $data["title"] = "Transaction";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getTransactionhistory()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $q1 = "";
        if ($this->dashboardStatus == 0) {
            $q1 =
                "and ( pay_id = " .
                $this->memberID .
                "or recieve_id = " .
                $this->memberID .
                ")";
        } elseif ($this->dashboardStatus == 1) {
            $q1 = "and  recieve_id = " . $this->memberID;
        } elseif ($this->dashboardStatus == 2) {
            $q1 = "and pay_id = " . $this->memberID;
        }
        $data["query"] = $this->main_model->getQueryAllData(
            "select daybook.*, (select user_name from users where users.id = daybook.pay_id) as payname , (select user_name from users where users.id = daybook.recieve_id) as recievename from daybook where is_deleted  = 0 $q1 order by added_date desc"
        );
        $data["title"] = "Transaction";
        return view("transaction", $data);
    }

    public function submitOrderspecification()
    {
        if ($this->request->isAJAX()) {
            // $rules = [
            //      "orderid" => ["label" => "order id ","rules" => "required"]

            //      ];
            // if ($this->validate($rules))
            // {
            $list_id = $this->request->getpost("listproduct_id");

            $orderid = $this->request->getpost("orderid");
            $size = $this->request->getpost("size");
            $size_uom = $this->request->getpost("size_uom");
            $product = $this->request->getpost("product");
            $quantity = $this->request->getpost("quantity");
            $quantity_uom = $this->request->getpost("quantity_uom");
            $ordertracking["order_id"] = $orderid??'';
            $ordertracking["description"] = "Product Specification Sent";
            $ordertracking["added_by"] = $this->memberID;
            $ordertracking["added_date"] = $this->currentDate;
            $this->main_model->insert_table("ordertracking", $ordertracking);
            for ($i = 0; $i < count($size); $i++) {
                $data1["order_id"] = $orderid??'' ;
                $data1["list_id"] = $list_id;
                $data1["size"] = $size[$i];
                // $data1["size_uom"] = $size_uom[$i];
                $data1["product"] = $product[$i]??'';
                $data1["quantity"] = $quantity[$i];
                // $data1["quantity_uom"] = $quantity_uom[$i];
                $data1["added_by"] = $this->memberID;
                $data1["added_date"] = $this->currentDate;
                $returnData["data"] = $data1;
                $check1 = $this->main_model->insert_table(  "ordered_product_specification", $data1  );
            }
            $returnData["success"] = "true";
            $returnData["message"] = "Order Specification Sent Successfully ";
            $returnData["data"] = $data1;
            echo json_encode($returnData);

            // }
            // else
            // {
            //    $returnData['error']                         = true ;

            //     echo json_encode($returnData);
            // }
        }
    }

    public function getOrderspecification()
    {
        $return["success"] = false;
        $orderid = $this->request->getpost("id");

        $orderdata = $this->main_model->getRowData(
            "orders",
            "*",
            "id = '$orderid'"
        );
        $list_id = $orderdata["list_id"];
        $category = $this->main_model->getRowData(
            "listed_products",
            "category",
            "id = $list_id"
        );
 
        // $orderspecificationdata = $this->main_model->getQueryAllData(" select * from ordered_product_specification where order_id = '$orderid'");

        $orderspecificationdata = $this->main_model->getQueryAllData(
            " select * from ordered_product_specification where list_id = '$list_id'"
        );
       
        $allquality = $this->main_model->getQueryAllData(
            " select quality,quantity FROM list_specification join orders on orders.list_id = list_specification.list_id where orders.id  =  $orderid"
        );
       
        $return["orderdata"] = $orderdata;
        $return["category"] = $category["category"];
        $return["allcategory"] = $allquality;
        if (!empty($orderspecificationdata)) {
            $return["success"] = true;
            $return["list"] = $orderspecificationdata;
        }

        echo json_encode($return, true);
    }

    public function sendOrderspecification()
    {
        if ($this->request->isAJAX()) 
        {
            $rules = [
                "orderid" => ["label" => "order id ", "rules" => "required"],
            ];
            if ($this->validate($rules))
            {
                $data["vehiclestatus"] = 5;
                $discount = $this->request->getpost("discount");
                $invoiceno = $this->request->getpost("invoiceno");
                $invoicedate = $this->request->getpost("invoicedate");
                $ewaybillno = $this->request->getpost("ewaybillno");
                $dispatchimage = $this->request->getFile("dispatchimage");

                if (!empty($dispatchimage) && $dispatchimage->getsize() > 0) {
                    $randomname = $dispatchimage->getRandomName();
                    $dispatchimage->move("./document/product/", $randomname);
                    $data["dispatchimage"] = $randomname;
                }

                if (!empty($_FILES['packingslipimage']['name'])) {
                    $file_ext = strtolower(pathinfo($_FILES["packingslipimage"]["name"], PATHINFO_EXTENSION)); 
                    if($file_ext == "xlsx" || $file_ext == "xls"){
                        $tmpfname = $_FILES['packingslipimage']['tmp_name'];  
                        require_once(APPPATH .'/ThirdParty/SimpleXLSX/SimpleXLSX.php'); 
                        if ($xlsx = \SimpleXLSX::parse($tmpfname)) 
                        { 
                            $i = 0; $import_id = 0;  
                           
                            foreach ($xlsx->rows() as $value) 
                            {  
                                if($i == 0)
                                {
    
                                }
                                else
                                {
                                    $data_package['order_id']           = $this->request->getpost("orderid");
                                    $data_package['company_name']      = escapeString($value[1] ?? '');
                                    $data_package['order_no']          = escapeString($value[2] ?? '');
                                    $data_package['date']              = escapeString($value[3] ?? '');
                                    $data_package['invoice_no']        = escapeString($value[4] ?? '');
                                    $data_package['buyer_name']        = escapeString($value[5] ?? '');
                                    $data_package['address']           = escapeString($value[6] ?? '');
                                    $data_package['description']       = escapeString($value[7] ?? '');
                                    $data_package['distinictive_no']   = escapeString($value[8] ?? '');
                                    $data_package['net_weight']        = escapeString($value[9] ?? '');
                                    $data_package['gross_weight']      = escapeString($value[10] ?? '');
                                    $data_package['total_unit']        = escapeString($value[11] ?? '');
                                    $insertID = $this->main_model->insert_table("packing_slip", $data_package);
                                     $insertID; 
                                }
                                $i++;
                            } 
                            
                        }
                       
                    }
                    $packingslipimage = $this->request->getFile("packingslipimage");
                    if (!empty($packingslipimage) && $packingslipimage->getsize() > 0 ) 
                    {
                        $randomname = $packingslipimage->getRandomName();
                        $packingslipimage->move("./document/product/", $randomname);
                        $data["packingslipimage"] = $randomname;  
                    }
                }
                $invoiceimage = $this->request->getFile("invoiceimage");
                if (!empty($invoiceimage) && $invoiceimage->getsize() > 0) {
                    $randomname = $invoiceimage->getRandomName();
                    $invoiceimage->move("./document/product/", $randomname);
                    $data["invoiceimage"] = $randomname;
                }
                $einvoiceimage = $this->request->getFile("einvoiceimage");
                if (!empty($einvoiceimage) && $einvoiceimage->getsize() > 0) {
                    $randomname = $einvoiceimage->getRandomName();
                    $einvoiceimage->move("./document/product/", $randomname);
                    $data["einvoiceimage"] = $randomname;
                }
                $ebayimage = $this->request->getFile("ebayimage");
                if (!empty($ebayimage) && $ebayimage->getsize() > 0) {
                    $randomname = $ebayimage->getRandomName();
                    $ebayimage->move("./document/product/", $randomname);
                    $data["ebayimage"] = $randomname;
                }
                $girimage = $this->request->getFile("girimage");
                if (!empty($girimage) && $girimage->getsize() > 0) {
                    $randomname = $girimage->getRandomName();
                    $girimage->move("./document/product/", $randomname);
                    $data["girimage"] = $randomname;
                }
                $data["discount"] = $discount;
                $data["invoiceno"] = $invoiceno;
                $data["invoicedate"] = $invoicedate;
                $data["ewaybillno"] = $ewaybillno;
                $data["freight_rate"] = $this->request->getpost("freight_rate");
                $data["gst"] = $this->request->getpost("gst");
                $data["cgst"] = $this->request->getpost("cgst");
                $data["insurance_no"] = $this->request->getpost("insurance_no");
                $data["totalquatity"] = $this->request->getpost("totalquatity");
                $orderid = $this->request->getpost("orderid");
                $size = $this->request->getpost("s_size");
                $quantity = $this->request->getpost("s_quantity");
                $trrateid = $this->request->getpost("trrateid");

                $ordertracking["order_id"] = $orderid;
                $ordertracking["description"] = "Order Dispatched successfully";
                $ordertracking["added_by"] = $this->memberID;
                $ordertracking["added_date"] = $this->currentDate;
                $this->main_model->insert_table(
                    "ordertracking",
                    $ordertracking
                );

                $check = $this->main_model->update_table(
                    "orders",
                    $data,
                    "id = $orderid"
                );

                // **********************************************
                $salerid = $this->main_model->getRowData(  "orders", "purchase_id", "id = '$orderid'" );
                $userid=$salerid['purchase_id'];
                $user_type=  $this->main_model->getRowData("users", "user_type", "id = '$userid'");
                $data_notification["url"] = "purchase";
                $data_notification["added_by"] = $this->memberID;
                $data_notification["title"] = "Order Dispatched successfully";
                $data_notification["description"] =  "Order Dispatched successfully";
                $data_notification["added_date"] = $this->currentDate;
                $data_notification["notification_for"] =  $user_type["user_type"];
                $data_notification["notification_for_id"] =  $salerid["purchase_id"];
                $notification = $this->main_model->insert_table( "notification",  $data_notification );
                $notification;

                // **********************************************

                for ($i = 0; $i < count($trrateid); $i++) {
                    $data1["send_size"] = $size[$i];
                    $data1["send_quantity"] = $quantity[$i];

                    $check1 = $this->main_model->update_table(
                        "ordered_product_specification",
                        $data1,
                        "id = $trrateid[$i] "
                    );
                }
                $returnData["success"] = "true";
                $returnData["message"] = "Order Dispatched successfully ";

                echo json_encode($returnData);
            }
             else {
                $returnData["error"] = true;

                echo json_encode($returnData);
            }
           
        }
    }

    public function guard()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["appproved"] = $this->accountStatus;
        $data["memberDetail"] = $this->main_model->getRowData(
            "users",
            "*",
            "id = '$this->memberID'"
        );
        $data["productcategory"] = $this->main_model->getQueryAllData(
            "select * from product_category where deleted = 0 and parentid = 0 order by product_category asc"
        );
        $data["notification"] = $this->main_model->getQueryAllData(
            "select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc"
        );
        $query = $this->main_model->getQueryAllData(
            "select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc"
        );
        $nid = $query[0]["id"] ?? "";
        if ($nid) {
            $data["ordertracking"] = $this->main_model->getQueryAllData(
                "select * from ordertracking where order_id = '$nid' order by added_date asc"
            );
        } else {
            $data["ordertracking"] = "";
        }
        $data["ur_id"] = $this->memberID;
        $data["style"] = [
            "public/public/css/style.css",
            "public/public/vendor/toastr/css/toastr.min.css",
            "public/public/vendor/sweetalert2/dist/sweetalert2.min.css",
            "public/public/vendor/pickadate/themes/default.css",
            "public/public/vendor/pickadate/themes/default.date.css",
        ];
        $data["javascript"] = [
            "public/public/vendor/global/global.min.js",
            "public/public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js",
            "public/public/js/custom.min.js",
            "public/public/js/deznav-init.js",
            "public/public/vendor/toastr/js/toastr.min.js",
            "public/public/js/plugins-init/toastr-init.js",
            "public/public/vendor/sweetalert2/dist/sweetalert2.min.js",
            "public/public/js/bootstrap.bundle.min.js",
            "public/public/vendor/moment/moment.min.js",
            "public/public/vendor/pickadate/picker.js",
            "public/public/vendor/pickadate/picker.date.js",
            "public/public/js/plugins-init/pickadate-init.js",
            "public/public/js/dashboard/dashboard.js",
            "public/public/js/ajax.js",
            "public/public/js/customer.js",
            "public/public/js/vehicle.js",
            "public/public/js/purchase.js",
            "public/public/js/product.js",
            "public/public/js/profile.js",
            "public/public/js/list.js",
            "public/public/js/vendor.js",
            "public/public/js/url.js",
            "public/public/js/browser-navigation.js",
        ];

        $data["title"] = "Purchase";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getGuard()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["userid"] = $this->memberID;
        $udetail = $this->main_model->getRowData(
            "users",
            "*",
            "id = '$this->memberID'"
        );
        $oid = $udetail["oid"];


        if($data["dashboard_type"]==2){
            $data["query"] = $this->main_model->getQueryAllData(
                "select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno , (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid from purchases join orders on purchases.order_id = orders.id  where purchases.deleted = 0 and orders.vehiclestatus = 5  order by purchases.added_date desc"
            );
        }else{

            $data["query"] = $this->main_model->getQueryAllData(
                "select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno , (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid from purchases join orders on purchases.order_id = orders.id  where purchases.deleted = 0 and orders.vehiclestatus = 5 and ( purchases.added_by = $this->memberID or purchases.added_by = '$oid' ) order by purchases.added_date desc"
            );
        }

        $data["title"] = "Purchase";
        return view("purchase/guard", $data);
    }

    public function qc()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["appproved"] = $this->accountStatus;
        $data["memberDetail"] = $this->main_model->getRowData(
            "users",
            "*",
            "id = '$this->memberID'"
        );
        $data["productcategory"] = $this->main_model->getQueryAllData(
            "select * from product_category where deleted = 0 and parentid = 0 order by product_category asc"
        );
        $data["notification"] = $this->main_model->getQueryAllData(
            "select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc"
        );
        $query = $this->main_model->getQueryAllData(
            "select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc"
        );
        $nid = $query[0]["id"] ?? "";
        if ($nid) {
            $data["ordertracking"] = $this->main_model->getQueryAllData(
                "select * from ordertracking where order_id = '$nid' order by added_date asc"
            );
        } else {
            $data["ordertracking"] = "";
        }
        $data["ur_id"] = $this->memberID;
        $data["style"] = [
            "public/public/css/style.css",
            "public/public/vendor/toastr/css/toastr.min.css",
            "public/public/vendor/sweetalert2/dist/sweetalert2.min.css",
            "public/public/vendor/pickadate/themes/default.css",
            "public/public/vendor/pickadate/themes/default.date.css",
        ];
        $data["javascript"] = [
            "public/public/vendor/global/global.min.js",
            "public/public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js",
            "public/public/js/custom.min.js",
            "public/public/js/deznav-init.js",
            "public/public/vendor/toastr/js/toastr.min.js",
            "public/public/js/plugins-init/toastr-init.js",
            "public/public/vendor/sweetalert2/dist/sweetalert2.min.js",
            "public/public/js/bootstrap.bundle.min.js",
            "public/public/vendor/moment/moment.min.js",
            "public/public/vendor/pickadate/picker.js",
            "public/public/vendor/pickadate/picker.date.js",
            "public/public/js/plugins-init/pickadate-init.js",
            "public/public/js/dashboard/dashboard.js",
            "public/public/js/ajax.js",
            "public/public/js/customer.js",
            "public/public/js/vehicle.js",
            "public/public/js/purchase.js",
            "public/public/js/product.js",
            "public/public/js/profile.js",
            "public/public/js/list.js",
            "public/public/js/vendor.js",
            "public/public/js/url.js",
            "public/public/js/browser-navigation.js",
        ];

        $data["title"] = "Purchase";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getqc()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["userid"] = $this->memberID;
        $udetail = $this->main_model->getRowData(
            "users",
            "*",
            "id = '$this->memberID'"
        );
        $oid = $udetail["oid"];
        $data["query"] = $this->main_model->getQueryAllData(
            "select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno , (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid from purchases join orders on purchases.order_id = orders.id  where purchases.deleted = 0 and orders.vehiclestatus = 6 and ( purchases.added_by = $this->memberID or purchases.added_by = '$oid' ) order by purchases.added_date desc"
        );
        $data["query"] = $this->main_model->getQueryAllData(
            "select orders.*,(select product_status from ordered_product_specification where ordered_product_specification.order_id = orders.id) as product_status,(select complain_reject_reason from ordered_product_specification where ordered_product_specification.order_id = orders.id) as complain_reject_reason,(select complain_status from ordered_product_specification where ordered_product_specification.order_id = orders.id) as complain_status, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno , (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid from purchases join orders on purchases.order_id = orders.id  where purchases.deleted = 0 and orders.vehiclestatus = 6 and ( purchases.added_by = $this->memberID or purchases.added_by = '$oid' ) order by purchases.added_date desc"
        );
        // echo "select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno , (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid from purchases join orders on purchases.order_id = orders.id  where purchases.deleted = 0 and orders.vehiclestatus = 6 and ( purchases.added_by = $this->memberID or purchases.added_by = '$oid' ) order by purchases.added_date desc";

        $data["title"] = "Purchase";
        return view("purchase/qc", $data);
    }

    public function receiveOrderspecification()
    {
        if ($this->request->isAJAX()) {
            $rules = [
                "orderid" => ["label" => "order id ", "rules" => "required"],
            ];
            if ($this->validate($rules)) { 
                $finalFileName='';
                $targetDir = "public/complaint_images/"; 
                $allowTypes = array('jpg','png','jpeg','gif'); 
                 
                $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
                $fileNames = array_filter($_FILES['complaint_image']['name']); 
                if(!empty($fileNames)){ 
                   
                    foreach($_FILES['complaint_image']['name'] as $key=>$val){  
                        $fileName = basename($_FILES['complaint_image']['name'][$key]);  
                        $targetFilePath = $targetDir . $fileName;  
                        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                        if(in_array($fileType, $allowTypes)){  
                            if(move_uploaded_file($_FILES["complaint_image"]["tmp_name"][$key], $targetFilePath)){  
                                $finalFileName .= $fileName.",";
                            }else{ 
                                $errorUpload .= $_FILES['complaint_image']['name'][$key].' | '; 
                            } 
                        }else{ 
                            $errorUploadType .= $_FILES['complaint_image']['name'][$key].' | '; 
                        } 
                    }  
                }
                // print_r($finalFileName); 
                $orderid = $this->request->getpost("orderid");
                $size = $this->request->getpost("r_size");
                $quantity = $this->request->getpost("r_quantity");
                $trrateid = $this->request->getpost("trrateid");
                $description = $this->request->getpost("description");
                $product_status = $this->request->getpost("product_status");
                $complain_issue = $this->request->getpost("complain_issue");
                $discount = $this->request->getpost("discount");
                $data["vehiclestatus"] = 6; 
                $data["discount"] = $discount;
                $check = $this->main_model->update_table(
                    "orders",
                    $data,
                    "id = $orderid"
                );
                $ordertracking["order_id"] = $orderid;
                $ordertracking["description"] =
                    "Product Recieved Quality Updated. ";
                $ordertracking["added_by"] = $this->memberID;
                $ordertracking["added_date"] = $this->currentDate;
                $this->main_model->insert_table(
                    "ordertracking",
                    $ordertracking
                );
                for ($i = 0; $i < count($trrateid); $i++) {
                    $data1["recieve_size"] = $size[$i];
                    $data1["recieve_quantity"] = $quantity[$i];
                    $data1["product_status"] = $product_status;
                    $data1["complain_issue"] = $complain_issue;
                    $data1["complain_image"] = $finalFileName;
                    $data1["description"] = $description;
                    $data1["order_id"] = $orderid;
                    $check1 = $this->main_model->update_table(
                        "ordered_product_specification",
                        $data1,
                        "id = $trrateid[$i] "
                    );
                }
                $returnData["success"] = "true";
                $returnData["message"] = "Order Quality Updated Successfully ";

                echo json_encode($returnData);
            } else {
                $returnData["error"] = true;

                echo json_encode($returnData);
            }
        }
    }

    public function purchaseinvoice($id)
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["appproved"] = $this->accountStatus;

        $data["memberDetail"] = $this->main_model->getRowData(
            "users",
            "*",
            "id = '$this->memberID'"
        );
        $data["productcategory"] = $this->main_model->getQueryAllData(
            "select * from product_category where deleted = 0 and parentid = 0 order by product_category asc"
        );
        $data["notification"] = $this->main_model->getQueryAllData(
            "select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc"
        );
        $query = $this->main_model->getQueryAllData(
            "select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc"
        );
        $nid = $query[0]["id"] ?? "";
        if ($nid) {
            $data["ordertracking"] = $this->main_model->getQueryAllData(
                "select * from ordertracking where order_id = '$nid' order by added_date asc"
            );
        } else {
            $data["ordertracking"] = "";
        }
        $data["ur_id"] = $this->memberID;
        $data["style"] = [
            "public/public/css/style.css",
            "public/public/vendor/toastr/css/toastr.min.css",
            "public/public/vendor/sweetalert2/dist/sweetalert2.min.css",
            "public/public/vendor/pickadate/themes/default.css",
            "public/public/vendor/pickadate/themes/default.date.css",
        ];
        $data["javascript"] = [
            "public/public/vendor/global/global.min.js",
            "public/public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js",
            "public/public/js/custom.min.js",
            "public/public/js/deznav-init.js",
            "public/public/vendor/toastr/js/toastr.min.js",
            "public/public/js/plugins-init/toastr-init.js",
            "public/public/vendor/sweetalert2/dist/sweetalert2.min.js",
            "public/public/js/bootstrap.bundle.min.js",
            "public/public/vendor/moment/moment.min.js",
            "public/public/vendor/pickadate/picker.js",
            "public/public/vendor/pickadate/picker.date.js",
            "public/public/js/plugins-init/pickadate-init.js",
            "public/public/js/dashboard/dashboard.js",
            "public/public/js/ajax.js",
            "public/public/js/customer.js",
            "public/public/js/vehicle.js",
            "public/public/js/purchase.js",
            "public/public/js/product.js",
            "public/public/js/profile.js",
            "public/public/js/list.js",
            "public/public/js/vendor.js",
            "public/public/js/url.js",
            "public/public/js/browser-navigation.js",
        ];

        $data["title"] = "Listed Purchase ";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getPurchaseInvoice($id)
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["memberDetail"] = $this->main_model->getRowData(
            "users",
            "*",
            "id = '$this->memberID'"
        );
        $data["zeto"] = $this->main_model->getRowData("users", "*", "id = '1'");

        $data["rate"] = $this->main_model->getQueryRowData(
            "select orders.*,vehicles.vehicle_no,sales.saleinvoice, product_category.product_category as catname ,product_category.product_specification as specification,listed_products.category from orders join listed_products on listed_products.id = orders.list_id join product_category on listed_products.category = product_category.id join sales on sales.order_id= orders.id join vehicles on vehicles.id = orders.vehicle_id  where orders.id  ='$id'"
        );

        $data["ratespecification"] = $this->main_model->getQueryAllData(
            "select order_product.*,  ls.sub_category, ls.mill_name, ls.size, ls.size_uom, ls.gsm, ls.quantity_uom, ls.quantity_type, ls.quality, ls.bf, ls.type, ls.quantity from order_product join list_specification ls on ls.id = order_product.specificationid  where orders_id = '$id' "
        );

        $data["title"] = " Sale Invoice";
        return view("purchase/purchaseinvoice", $data);
    }

    public function packingslip($id)
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["appproved"] = $this->accountStatus;

        $data["memberDetail"] = $this->main_model->getRowData(
            "users",
            "*",
            "id = '$this->memberID'"
        );
        $data["productcategory"] = $this->main_model->getQueryAllData(
            "select * from product_category where deleted = 0 and parentid = 0 order by product_category asc"
        );
        $data["notification"] = $this->main_model->getQueryAllData(
            "select * from notification where (notification_for =$this->userType or  notification_for_id = '$this->memberID' )  order by added_date desc"
        );
        $query = $this->main_model->getQueryAllData(
            "select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno, (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid  from sales join orders on sales.order_id = orders.id  where sales.deleted = 0 and sales.added_by = $this->memberID order by sales.added_date desc"
        );
        $nid = $query[0]["id"] ?? "";
        if ($nid) {
            $data["ordertracking"] = $this->main_model->getQueryAllData(
                "select * from ordertracking where order_id = '$nid' order by added_date asc"
            );
        } else {
            $data["ordertracking"] = "";
        }
        $data["ur_id"] = $this->memberID;
        $data["style"] = [
            "public/public/css/style.css",
            "public/public/vendor/toastr/css/toastr.min.css",
            "public/public/vendor/sweetalert2/dist/sweetalert2.min.css",
            "public/public/vendor/pickadate/themes/default.css",
            "public/public/vendor/pickadate/themes/default.date.css",
        ];
        $data["javascript"] = [
            "public/public/vendor/global/global.min.js",
            "public/public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js",
            "public/public/js/custom.min.js",
            "public/public/js/deznav-init.js",
            "public/public/vendor/toastr/js/toastr.min.js",
            "public/public/js/plugins-init/toastr-init.js",
            "public/public/vendor/sweetalert2/dist/sweetalert2.min.js",
            "public/public/js/bootstrap.bundle.min.js",
            "public/public/vendor/moment/moment.min.js",
            "public/public/vendor/pickadate/picker.js",
            "public/public/vendor/pickadate/picker.date.js",
            "public/public/js/plugins-init/pickadate-init.js",
            "public/public/js/dashboard/dashboard.js",
            "public/public/js/ajax.js",
            "public/public/js/customer.js",
            "public/public/js/vehicle.js",
            "public/public/js/purchase.js",
            "public/public/js/product.js",
            "public/public/js/profile.js",
            "public/public/js/list.js",
            "public/public/js/vendor.js",
            "public/public/js/url.js",
            "public/public/js/browser-navigation.js",
        ];

        $data["title"] = "Listed Purchase ";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getpackingslip($id)
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["memberDetail"] = $this->main_model->getRowData(
            "users",
            "*",
            "id = '$this->memberID'"
        );
        $data["zeto"] = $this->main_model->getRowData("users", "*", "id = '1'");

        $data["rate"] = $this->main_model->getQueryRowData(
            "select orders.*,vehicles.vehicle_no,sales.saleinvoice, product_category.product_category as catname ,product_category.product_specification as specification,listed_products.category from orders join listed_products on listed_products.id = orders.list_id join product_category on listed_products.category = product_category.id join sales on sales.order_id= orders.id join vehicles on vehicles.id = orders.vehicle_id  where orders.id  ='$id'"
        );

        $data["packingslip"] = $this->main_model->getQueryAllData(
            "select  * from packing_slip  where order_id = '$id' "
        );

        $data["title"] = " Sale Invoice";
        return view("purchase/packingslip", $data);
    }

    public function submitCredit(){
       
         $data['order_id']              =   $this->request->getpost("order_id");
         $data['partner']               =   $this->request->getpost("partner");
         $data['bank_name']             =   $this->request->getpost("bank_name");
         $data['accoutn_no']            =   $this->request->getpost("accoutn_no");
         $data['ifsc']                  =   $this->request->getpost("ifsc");
         $data['branch_name']           =   $this->request->getpost("branch_name"); 
        //  print_r($_FILES['gst_certificate']['name']);
        //  exit;
         $folder = "document/credit/";
            if (!empty($_FILES['gst_certificate']['name'])) {
                $gst_certificate              =   $_FILES['gst_certificate']['name']; 
                $gst_certificate_temp                =   $_FILES['gst_certificate']['tmp_name'];
                $data['gst_certificate']        =   "IMG_".time()."_".rand(11,99).".".str_replace(' ','-',strtolower($gst_certificate));
                move_uploaded_file($gst_certificate_temp,$folder.$data['gst_certificate']);
            }
            if (!empty($_FILES['aadhaar_card']['name'])) {
                $aadhaar_card                 =   $_FILES['aadhaar_card']['name'];
                $aadhaar_card_temp                   =   $_FILES['aadhaar_card']['tmp_name'];
                $data['aadhaar_card']           =   "IMG_".time()."_".rand(11,99).".".str_replace(' ','-',strtolower($aadhaar_card));
                move_uploaded_file($aadhaar_card_temp,$folder.$data['aadhaar_card']);
            }
            if (!empty($_FILES['pancard']['name'])) {
                $pancard                      =   $_FILES['pancard']['name'];
                $pancard_temp                        =   $_FILES['pancard']['tmp_name']; 
                $data['pancard']                =   "IMG_".time()."_".rand(11,99).".".str_replace(' ','-',strtolower($pancard));
                move_uploaded_file($pancard_temp,$folder.$data['pancard']);
            }
            if (!empty($_FILES['incorporation']['name'])) {
                $incorporation                =   $_FILES['incorporation']['name'];
                $incorporation_temp                  =   $_FILES['incorporation']['tmp_name']; 
                $data['incorporation']          =   "IMG_".time()."_".rand(11,99).".".str_replace(' ','-',strtolower($incorporation));
                move_uploaded_file($incorporation_temp,$folder.$data['incorporation']);

            }
            if (!empty($_FILES['moa']['name'])) {
                $moa                          =   $_FILES['moa']['name'];
                $moa_temp                            =   $_FILES['moa']['tmp_name']; 
                $data['moa']                    =   "IMG_".time()."_".rand(11,99).".".str_replace(' ','-',strtolower($moa));
                move_uploaded_file($moa_temp,$folder.$data['moa']);

            }
            if (!empty($_FILES['partnership_deed']['name'])) {
                $partnership_deed             =   $_FILES['partnership_deed']['name']; 
                $partnership_deed_temp               =   $_FILES['partnership_deed']['tmp_name']; 
                $data['partnership_deed']       =   "IMG_".time()."_".rand(11,99).".".str_replace(' ','-',strtolower($partnership_deed));
                move_uploaded_file($partnership_deed_temp,$folder.$data['partnership_deed']);

            } 
         
        $result = $this->main_model->insert_table(
            "credit_details",
            $data
        );
        $order_id = $data['order_id'];
        $dt['order_rem']=3;
        $update = $this->main_model->update_table(
            "orders",
            $dt,"id=$order_id"
        ); 
        if ($result) {
            $returnData["success"] = "true";
                    $returnData["message"] =
                        "Document Uploaded successfully !"; 
                    echo json_encode($returnData);
        }
       
    }

    public  function getCreditdata($id){
        $creditdoc = $this->main_model->getRowData(
            "credit_details",
            "*",
            "order_id = '$id'"
        );

     return json_encode($creditdoc);
    }

    public function Check_sizespecification(){
        $listid = $this->request->getpost("id");
        $data["productspecification"] = $this->main_model->getQueryAllData( "select * from ordered_product_specification where list_id=$listid"); 
        // print_r($data["productspecification"]);
        return json_encode($data);
    }
}
