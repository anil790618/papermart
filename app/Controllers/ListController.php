<?php
namespace App\Controllers;
use App\Models\Main_model;
use CodeIgniter\Controller;

class ListController extends BaseController
{
    public function index()
    {
        if ($this->session->get("user")) {
            return redirect()->to("dashboard");
        } else {
            return redirect()->to("login");
        }
    }

    public function list()
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

        $data["title"] = "List";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getList()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
 
        $data["query"] = $this->main_model->getQueryAllData(
            " select listed_products.* , (SELECT count(id) FROM `response` WHERE list_id = listed_products.id) as responsecount, pc.product_category as catname from listed_products join product_category pc on pc.id = listed_products.category  where listed_products.list_type = $this->dashboardStatus and listed_products.deleted = 0   and listed_products.added_by = '$this->memberID'     order by listed_products.added_date desc"
        );
       

        $data["title"] = "List";
        $data["deckle"] = "0";
        return view("list/list", $data);
    }

    public function interestlist()
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

        $data["title"] = "List";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getInterestList()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;

        $data["query"] = $this->main_model->getQueryAllData(
            " select listed_products.* , (SELECT count(id) FROM `response` WHERE list_id = listed_products.id) as responsecount, pc.product_category as catname from listed_products join product_category pc on pc.id = listed_products.category  where listed_products.list_type = $this->dashboardStatus and listed_products.deleted = 0 and listed_products.deckle = 0 and listed_products.added_by = '$this->memberID' and rcount>0 order by listed_products.added_date desc"
        );

        $data["title"] = "List";
        $data["deckle"] = "0";
        return view("list/list", $data);
    }
    public function decklelist()
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

        $data["title"] = "List";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getDeckleList()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;

        $data["query"] = $this->main_model->getQueryAllData(
            "select listed_products.* , (SELECT count(id) FROM `response` WHERE list_id = listed_products.id) as responsecount, pc.product_category as catname from listed_products join product_category pc on pc.id = listed_products.category  where listed_products.list_type = $this->dashboardStatus and listed_products.deleted = 0 and listed_products.deckle = 1 and listed_products.added_by = '$this->memberID'  order by listed_products.added_date desc"
        );

        $data["title"] = "List";
        $data["deckle"] = "1";
        return view("list/list", $data);
    }
    public function Complain()
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

        $data["title"] = "List";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getComplain()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;

        // $data["query"] = $this->main_model->getQueryAllData(
        //     "select listed_products.* , pc.product_category as catname from listed_products join product_category pc on pc.id = listed_products.category  where listed_products.list_type = $this->dashboardStatus and listed_products.deleted = 0 and listed_products.deckle = 1 and listed_products.added_by = '$this->memberID'  order by listed_products.added_date desc"

        // );

        $data["query"] = $this->main_model->getQueryAllData(
            "select orders.*,ops.*,orders.added_date as order_date, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno , (select id from transport_request where transport_request.order_id = orders.id and added_by = $this->memberID)as trid from sales join orders on sales.order_id = orders.id
            join ordered_product_specification ops on orders.id = ops.order_id  where sales.deleted = 0 and orders.vehiclestatus = 6 and ( sales.added_by = $this->memberID ) and ops.product_status=2 order by sales.added_date desc"
        );
        // echo"select orders.*, (select vehicle_no from vehicles where vehicles.id = orders.vehicle_id)as vno , (select id from transport_request where transport_request.order_id = orders.id and added_by != $this->memberID)as trid from purchases join orders on purchases.order_id = orders.id  where purchases.deleted = 0 and orders.vehiclestatus = 6 and ( purchases.added_by != $this->memberID   ) order by purchases.added_date desc";

        $data["title"] = "List";
        $data["deckle"] = "1";
        return view("complain/complain", $data);
    }

    public function addList()
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

        $data["title"] = "List";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getAddList()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["listcount"] = $this->main_model->getNumRow(
            "listed_products",
            "id",
            "deleted = 0 "
        );
        $data["memberDetail"] = $this->main_model->getRowData(
            "users",
            "*",
            "id = '$this->memberID'"
        );
        $data["product_type"] = $this->main_model->getQueryAllData(
            "select * from product_type where deleted = 0  order by added_date desc"
        );
        $data["product_quality"] = $this->main_model->getQueryAllData(
            "select * from product_quality where deleted = 0  order by added_date desc"
        );
        $data["product_category"] = $this->main_model->getQueryAllData(
            "select * from product_category where deleted = 0   and parentid = 0 order by added_date desc"
        );
        $data["product"] = $this->main_model->getQueryRowData(
            "select product.*, product_category.product_specification from product left join product_category on product.product_category = product_category.id where product.id = '0' "
        );
        $dtype = $this->dashboardStatus;
        $utype = $this->userType;
        if ($dtype == 1) {
            $cid = "and sale_user like '%$utype%'";
        } elseif ($dtype == 2) {
            $cid = "and buy_user like '%$utype%'";
        }

        $data["catdata"] = "";
        $data["category"] = $this->main_model->getQueryAllData(
            "select * from product_category where deleted = 0  and parentid = 0  $cid  order by product_category asc"
        );

        $data["subcatid"] = "";

        $data["title"] = "List";
        return view("list/add-list", $data);
        // return view('list/add-list-'.$this->userType.'',$data);
    }

    public function addDeckleList()
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

        $data["title"] = "List";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getAddDeckleList()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["listcount"] = $this->main_model->getNumRow(
            "listed_products",
            "id",
            "deleted = 0"
        );
        $data["product_type"] = $this->main_model->getQueryAllData(
            "select * from product_type where deleted = 0  order by added_date desc"
        );
        $data["product_quality"] = $this->main_model->getQueryAllData(
            "select * from product_quality where deleted = 0  order by added_date desc"
        );
        $data["productcategory"] = $this->main_model->getQueryAllData(
            "select * from product_category where deleted = 0 and parentid = 0 order by product_category asc"
        );
        $dtype = $this->dashboardStatus;
        $utype = $this->userType;
        if ($dtype == 1) {
            $cid = "and sale_user like '%$utype%'";
        } elseif ($dtype == 2) {
            $cid = "and buy_user like '%$utype%'";
        }
        $data["catdata"] = "";
        $data["category"] = $this->main_model->getQueryAllData(
            "select * from product_category where deleted = 0  and parentid = 0  $cid  order by product_category asc"
        );
        $data["title"] = "List";
        return view("list/add-decklelist", $data);
    }

    public function submitList()
    {
        if ($this->request->isAJAX()) 
        {
           $rules = [

                "category" => ["label" => "Valid category","rules" => "required"],
                "pterm" => ["label" => "Payment Terms","rules" => "required"], 
                "product_location" => ["label" => "Product location","rules" => "required"]

                ];
           if ($this->validate($rules)) 
           {
             $catname='';
            $list_number               = $this->request->getpost("list_number");
            $list_type                 = $this->request->getpost("list_type");
            $category                  = $this->request->getpost("category");
            $specification             = $this->request->getpost("specification");
            $delivery_type             = $this->request->getpost("delivery_type");
            $product_location          = $this->request->getpost("product_location");
            $pterm                     = $this->request->getpost("pterm");
            $ddays                     = $this->request->getpost("ddays");
            // $ratetype               = $this->request->getpost("ratetype") ?? '';
            $description               = $this->request->getpost("description");
            $deckle                    = $this->request->getpost("deckle") ?? '0';
            $rowcount                  = $this->request->getpost("rowcount") ;
            $validity                  = $this->request->getpost("validity") ?? date('Y-m-d H:i:s', strtotime("+2 days")); ;
            $rates_offered             = $this->request->getpost("rates_offered") ?? '' ;
            $sub_category     = $this->request->getpost("sub_category")??'';
            $truck_ratio      = $this->request->getpost("truck_ratio")??''; 
            $bundle_weight    = $this->request->getpost("bundle_weight")??'';
            $valid_from       = $this->request->getpost("valid_from");
            // $admin_approved       = $this->request->getpost("admin_approved");



            $string = $specification ;
            $string = preg_replace('/\.$/', '', $string); 
            $array = explode(',', $string); 
            foreach($array as $value) 
            {
               
                if($value == 'size'){
                    $size_length                    = $this->request->getpost('size_length') ;
                    $size_width                    = $this->request->getpost('size_width') ;
                }
                else if($value == 'tear'){
                    $md                    = $this->request->getpost('md') ;
                    $cd                    = $this->request->getpost('cd') ;
                }
                else if($value == 'rate'){
                    $$value                        = $this->request->getpost($value) ?? '';
                    $cashrate                      = $this->request->getpost('cashrate') ?? '';
                    $creditrate                    = $this->request->getpost('creditrate') ?? '';
                }
                else{
                    $$value                    = $this->request->getpost($value) ;
                }
            }
            $data['validity']               = $validity ;  
            if($sub_category){
                if ($sub_category==28 || $sub_category == 29) {
                    $data['validity']               = $valid_from ;
                } 
            }
           
            $data['list_number']            = $list_number ;
            $data['list_type']              = $list_type ;
            $data['category']               = $category ;  
            // $data['validity']               = $validity ;  
            $data['rates_offered']          = $rates_offered ;
            $data['product_location']       = $product_location ;
            $data['payment_terms']          = $pterm ; 
            $data['delivery_days']          = !empty($ddays) ? $ddays : null;
            $data['description']            = $description ;
            $data['deckle']                 = $deckle ;
            $data['delivery_type']          = $delivery_type ;
            // $data['admin_approved']          = $admin_approved ;
            $data['added_by']             = $this->memberID ;
            $data['added_date']           = $this->currentDate; 
            // print_r($data);
            // exit;

            $check = $this->main_model->insert_table('listed_products', $data);

           





            $memberDetail = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
            if($this->userType == 3){
                $millname = $memberDetail['user_name'];
            }
            else{
                $millname = '';
            }
            if($check)
            {
               
                for($i=0; $i<count($rowcount); $i++){
                  
                        $data2['list_id']               = $check ;
                        $data2['sub_category']     = $sub_category[0]??'';
                        $data2['truck_ratio']      = $truck_ratio; 
                        $data2['bundle_weight']    = $bundle_weight;
                        $data2['valid_from']       = $valid_from;
                        // print_r($data2);
                        // exit;
                        foreach($array as $value) 
                        {
                            if($value == 'size'){
                              
                                $data2['size_length']                  = $size_length[$i] ?? 0;
                                $data2['size_width']                   = $size_width[$i] ?? 0;
                                $sl = $size_length[$i] ?? '';
                                $sw = $size_width[$i] ?? '';
                                $data2['size']                   =  $sl .' X '.$sw ;
                            }
                            else if($value == 'tear'){
                              
                              
                                $data2[$value]                   = $md[$i] .' MD '.$cd[$i] .' CD ' ;
                            }
                            else if($value == 'rate'){
                                $data2[$value]                  = $$value[$i] ?? 0;
                                $data2['cashrate']                   = $cashrate[$i] ?? 0;
                                $data2['creditrate']                   = $creditrate[$i] ?? 0;
                            }
                            else if($value == 'mill_name'){
                                $data2[$value]                  = $$value[$i] ?? $millname;
                            }
                            
                            else{
                               
                                $data2[$value]                  = $$value[$i] ?? '';
                            }
                            $sl='';
                            $sw='';
                        }
                        $data2['added_by']             = $this->memberID ;
                        $data2['added_date']           = $this->currentDate;
                      

                        $check2 = $this->main_model->insert_table('list_specification', $data2);
                        // print_r($check2);
                        // exit;

                        if($deckle ==1){
                            $listtag                       = $this->request->getpost("listtag");
                            $listsize                       = $this->request->getpost("listsize".$listtag);
                            $listquantity                   = $this->request->getpost("listquantity".$listtag);
                            
                            for($i=0; $i<count($listsize); $i++){

                               
                                $listdata['list_id']           = $check ;
                                $listdata['size']              = $listsize[$i] ;
                                $listdata['product']           = $check2 ;
                                $listdata['quantity']          = $listquantity[$i] ;  
                                $listdata['added_by']          = $this->memberID ;
                                $listdata['added_date']        = $this->currentDate;
                                  $returnData['data'] = $listdata;
                                $check1 = $this->main_model->insert_table('ordered_product_specification', $listdata);
                            }
                        }
                    }
// exit;
                     // ****************************************************************************************************************
                 $dd['listed_product_id']     = $check;
                 $dd['category_id']     = $category;
                 $dd['list_number']     = $list_number ;
                $dd['sub_category']     = $this->request->getpost("sub_category");
                $dd['truck_ratio']      = $this->request->getpost("truck_ratio"); 
                $dd['bundle_weight']    = $this->request->getpost("bundle_weight");
                $dd['valid_from']       = $this->request->getpost("valid_from");
                $dd['k_corr1_on']       = $this->request->getpost("k_corr1_on");
                $dd['k_corr1_non']      = $this->request->getpost("k_corr1_non");
                $dd['k_corr2_on']       = $this->request->getpost("k_corr2_on");
                $dd['k_corr2_non']      = $this->request->getpost("k_corr2_non");
                $dd['k_dye_on']         = $this->request->getpost("k_dye_on");
                $dd['k_dye_non']        = $this->request->getpost("k_dye_non");
                $dd['k_grey_on']        = $this->request->getpost("k_grey_on");
                $dd['k_grey_non']       = $this->request->getpost("k_grey_non");
                $dd['k_duplex_on']      = $this->request->getpost("k_duplex_on");
                $dd['k_duplex_non']     = $this->request->getpost("k_duplex_non");
                $dd['k_mill_on']        = $this->request->getpost("k_mill_on");
                $dd['k_mill_non']       = $this->request->getpost("k_mill_non");
                $dd['k_core_on']        = $this->request->getpost("k_core_on");
                $dd['k_core_non']       = $this->request->getpost("k_core_non");

                $dd['w_scan_on']            = $this->request->getpost("w_scan_on");
                $dd['w_scan_non']           = $this->request->getpost("w_scan_non");
                $dd['w_color_on']           = $this->request->getpost("w_color_on");
                $dd['w_color_non']          = $this->request->getpost("w_color_non");
                $dd['w_copy_on']            = $this->request->getpost("w_copy_on");
                $dd['w_copy_non']           = $this->request->getpost("w_copy_non");
                $dd['w_record_on']          = $this->request->getpost("w_record_on");
                $dd['w_record_non']         = $this->request->getpost("w_record_non");
                $dd['w_short_on']           = $this->request->getpost("w_short_on");
                $dd['w_short_non']          = $this->request->getpost("w_short_non");
                $dd['w_whitecutting_on']    = $this->request->getpost("w_whitecutting_on");
                $dd['w_whitecutting_non']   = $this->request->getpost("w_whitecutting_non");
                $dd['w_pepsi_on']           = $this->request->getpost("w_pepsi_on");
                $dd['w_pepsi_non']          = $this->request->getpost("w_pepsi_non");
                $dd['w_board_on']           = $this->request->getpost("w_board_on");
                $dd['w_board_non']          = $this->request->getpost("w_board_non");
                $dd['w_book_on']            = $this->request->getpost("w_book_on");
                $dd['w_book_non']           = $this->request->getpost("w_book_non");
                $dd['w_rulled_on']          = $this->request->getpost("w_rulled_on");
                $dd['w_rulled_non']         = $this->request->getpost("w_rulled_non");
                $dd['w_tick_on']            = $this->request->getpost("w_tick_on");
                $dd['w_tick_non ']          = $this->request->getpost("w_tick_non ")??0;
                // print_r($dd);    
                $result = $this->main_model->insert_table("wastpaper_quality",$dd);
            // ****************************************************************************************************************
               
                $returnData['success'] = 'true';
                $returnData['message'] = 'List Added Successfully';
                $returnData['id'] = $check;

                $catname = $this->main_model->getRowData("product_category", "product_category", "id = '$category'");
                $catname = $catname['product_category'];
                $notification['title']                = 'New Product listed' ;
                $notification['description']          = 'Listed post  is of '. $catname. ' Send your response' ;
                $notification['url']                  = 'view-listproduct/'.$check ;
                $notification['added_by']             = $this->memberID ;
                $userid= $this->memberID ;
                $user_type=  $this->main_model->getRowData("users", "user_type", "id = '$userid'");
                $user_type = $user_type['user_type'];
                if ($user_type==3) {
                    $notification['notification_for']     = 2; 
                }else{
                    $notification['notification_for']     = 3; 
                }
                $notification['added_date']           = $this->currentDate;

                $this->main_model->insert_table('notification', $notification);
                echo json_encode($returnData);
              
            }
            else 
            {
                $returnData['success'] = 'false';
                $returnData['message'] = 'Something went wrong 1!';
                $returnData['data']    = $data;
                echo json_encode($returnData);
            } 
               
            } 
            else
            {
               $returnData['error']                         = true ;
               $returnData['category']                  = $this->validation->getError('category');
               $returnData['product_location']                 = $this->validation->getError('product_location');
               $returnData['pterm']                      = $this->validation->getError('pterm');
               $returnData['ddays']                 = $this->validation->getError('ddays');
             
                   
                echo json_encode($returnData);
            }
        }
    }


// public function submitList()
// {
//     if ($this->request->isAJAX()) 
//     {
//        $rules = [ 
//             "category" => ["label" => "Valid category","rules" => "required"],
//             "pterm" => ["label" => "Payment Terms","rules" => "required"], 
//             "product_location" => ["label" => "Product location","rules" => "required"] 
//             ];
//        if ($this->validate($rules)) 
//        {
//          $catname='';
//         $list_number               = $this->request->getpost("list_number")??'';
//         $list_type                 = $this->request->getpost("list_type")??'';
//         $category                  = $this->request->getpost("category")??'';
//         $specification             = $this->request->getpost("specification")??'';
//         $delivery_type             = $this->request->getpost("delivery_type")??'';
//         $product_location          = $this->request->getpost("product_location")??'';
//         $pterm                     = $this->request->getpost("pterm")??'';
//         $ddays                     = $this->request->getpost("ddays")??'';
//         $quantity                  = $this->request->getpost("quantity")??'';
//         $quantity_type             = $this->request->getpost("quantity_type")??'';
//         $quantity_uom              = $this->request->getpost("quantity_uom")??'';
//         $min_quantity              = $this->request->getpost("min_quantity")??'';
//         $min_quantity_uom          = $this->request->getpost("min_quantity_uom")??'';
//         $min_quantity_pertruck     = $this->request->getpost("min_quantity_pertruck")??'';
//         $truck_no                  = $this->request->getpost("truck_no")??'';

//         // $ratetype               = $this->request->getpost("ratetype") ?? '';
//         $description               = $this->request->getpost("description")??'';
//         $deckle                    = $this->request->getpost("deckle") ?? '0';
//         $rowcount                  = $this->request->getpost("rowcount")??'' ;
//         $validity                  = $this->request->getpost("validity") ?? date('Y-m-d H:i:s', strtotime("+2 days")); ;
//         $rates_offered             = $this->request->getpost("rates_offered") ?? '' ;
//         $sub_category     = $this->request->getpost("sub_category")??'';
//         $truck_ratio      = $this->request->getpost("truck_ratio")??''; 
//         $bundle_weight    = $this->request->getpost("bundle_weight")??'';
//         $valid_from       = $this->request->getpost("valid_from")??'';
//         // $admin_approved       = $this->request->getpost("admin_approved");



//         $string = $specification ;
//         $string = preg_replace('/\.$/', '', $string); 
//         $array = explode(',', $string); 
//         foreach($array as $value) 
//         {
           
//             if($value == 'size'){
//                 $size_length                    = $this->request->getpost('size_length') ;
//                 $size_width                    = $this->request->getpost('size_width') ;
//             }
//             else if($value == 'tear'){
//                 $md                    = $this->request->getpost('md') ;
//                 $cd                    = $this->request->getpost('cd') ;
//             }
//             else if($value == 'rate'){
//                 $$value                        = $this->request->getpost($value) ?? '';
//                 $cashrate                      = $this->request->getpost('cashrate') ?? '';
//                 $creditrate                    = $this->request->getpost('creditrate') ?? '';
//             }
//             else{
//                 $value                    = $this->request->getpost($value) ;
//             }
//         }
//         $data['validity']               = $validity ;  
//         if($sub_category){
//             if ($sub_category==28 || $sub_category == 29) {
//                 $data['validity']               = $valid_from ;
//             } 
//         }
       
//         $data['list_number']            = $list_number ;
//         $data['list_type']              = $list_type ;
//         $data['category']               = $category ;  
//         // $data['quantity']               = $quantity??'' ;  
//         // $data['quantity_uom']               = $quantity_uom??'' ;  
//         // $data['min_quantity']               = $min_quantity??'' ;  
//         // $data['min_quantity_uom']               = $min_quantity_uom??'' ;  

        
//         // $data['validity']               = $validity ;  
//         $data['quantity_type']               = $quantity_type ;  
//         $data['rates_offered']          = $rates_offered ;
//         $data['product_location']       = $product_location ;
//         $data['payment_terms']          = $pterm ; 
//         $data['delivery_days']          = !empty($ddays) ? $ddays : null;
//         $data['description']            = $description ;
//         $data['deckle']                 = $deckle ;
//         $data['delivery_type']          = $delivery_type ;
//         // $data['admin_approved']          = $admin_approved ;
//         $data['added_by']             = $this->memberID ;
//         $data['added_date']           = $this->currentDate;  

//         $check = $this->main_model->insert_table('listed_products', $data); 
//         $memberDetail = $this->main_model->getRowData("users", "*", "id = '$this->memberID'");
//         if($this->userType == 3){
//             $millname = $memberDetail['user_name'];
//         }
//         else{
//             $millname = '';
//         }
//         if($check)
//         {
//            $crow = count($rowcount);
//             for($i=0; $i<$crow; $i++){
              
//                     $data2['list_id']               = $check ;
//                     $data2['sub_category']     = $sub_category[0]??'';
//                     $data2['truck_ratio']      = $truck_ratio; 
//                     $data2['bundle_weight']    = $bundle_weight;
//                     $data2['valid_from']       = $valid_from;
                  
//                     foreach($array as $value) 
//                     {
//                         if($value == 'size'){
                          
//                             $data2['size_length']                  = $size_length[$i] ?? 0;
//                             $data2['size_width']                   = $size_width[$i] ?? 0;
//                             $sl = $size_length[$i] ?? '';
//                             $sw = $size_width[$i] ?? '';
//                             $data2['size']                   =  $sl .' X '.$sw ;
//                         }
//                         else if($value == 'tear'){
                          
                          
//                             $data2[$value]                   = $md[$i] .' MD '.$cd[$i] .' CD ' ;
//                         }
//                         else if($value == 'rate'){
//                             $data2[$value]                  = $$value[$i] ?? 0;
//                             $data2['cashrate']                   = $cashrate[$i] ?? 0;
//                             $data2['creditrate']                   = $creditrate[$i] ?? 0;
//                         }
//                         else if($value == 'mill_name'){
//                             $data2[$value]                  = $$value[$i] ?? $millname;
//                         }
                        
//                         else{
                           
//                             $data2[$value]                  = $$value[$i] ?? '';
//                         }
//                         $sl='';
//                         $sw='';
//                     }
//                     $data2['added_by']             = $this->memberID ;
//                     $data2['added_date']           = $this->currentDate; 
//                     $check2 = $this->main_model->insert_table('list_specification', $data2);
//                     // print_r($check2);
//                     // exit;

//                     if($deckle ==1){
//                         $listtag                       = $this->request->getpost("listtag");
//                         $listsize                       = $this->request->getpost("listsize".$listtag);
//                         $listquantity                   = $this->request->getpost("listquantity".$listtag);
//                         if (empty($listsize)) {
                           
//                         }else{
//                             for($i=0; $i<count($listsize); $i++){ 
//                                 $listdata['list_id']           = $check ;
//                                 $listdata['size']              = $listsize[$i] ;
//                                 $listdata['product']           = $check2 ;
//                                 $listdata['quantity']          = $listquantity[$i] ;  
//                                 $listdata['added_by']          = $this->memberID ;
//                                 $listdata['added_date']        = $this->currentDate; 
//                                 $check1 = $this->main_model->insert_table('ordered_product_specification', $listdata);
//                                 $returnData['data'] = $listdata;
//                             }
//                         }
                       
//                     }
                    
//                     if($deckle ==2){
//                         $listtag                       = $this->request->getpost("listtag")??'';
//                         $listsize                       = $this->request->getpost("size_list");
//                         $listquantity                   = $this->request->getpost("quantity_list");
//                         if (empty($listsize)) {
                           
//                         }else{
//                             for($i=0; $i<count($listsize); $i++){

                            
//                                 $listdata['list_id']           = $check ;
//                                 $listdata['size']              = $listsize[$i] ;
//                                 $listdata['product']           = $check2 ;
//                                 $listdata['quantity']          = $listquantity[$i] ;  
//                                 $listdata['added_by']          = $this->memberID ;
//                                 $listdata['added_date']        = $this->currentDate;
//                                     $returnData['data'] = $listdata;
//                                 $check1 = $this->main_model->insert_table('ordered_product_specification', $listdata);
//                             }
//                         }
                        
//                     }


//                 }
// // exit;
//                  // ****************************************************************************************************************
//              $dd['listed_product_id']     = $check;
//              $dd['category_id']     = $category;
//              $dd['list_number']     = $list_number ;
//             $dd['sub_category']     = $this->request->getpost("sub_category")??'';
//             $dd['truck_ratio']      = $this->request->getpost("truck_ratio")??''; 
//             $dd['bundle_weight']    = $this->request->getpost("bundle_weight")??'';
//             $dd['valid_from']       = $this->request->getpost("valid_from")??'';
//             $dd['k_corr1_on']       = $this->request->getpost("k_corr1_on")??'';
//             $dd['k_corr1_non']      = $this->request->getpost("k_corr1_non")??'';
//             $dd['k_corr2_on']       = $this->request->getpost("k_corr2_on")??'';
//             $dd['k_corr2_non']      = $this->request->getpost("k_corr2_non")??'';
//             $dd['k_dye_on']         = $this->request->getpost("k_dye_on")??'';
//             $dd['k_dye_non']        = $this->request->getpost("k_dye_non")??'';
//             $dd['k_grey_on']        = $this->request->getpost("k_grey_on")??'';
//             $dd['k_grey_non']       = $this->request->getpost("k_grey_non")??'';
//             $dd['k_duplex_on']      = $this->request->getpost("k_duplex_on")??'';
//             $dd['k_duplex_non']     = $this->request->getpost("k_duplex_non")??'';
//             $dd['k_mill_on']        = $this->request->getpost("k_mill_on")??'';
//             $dd['k_mill_non']       = $this->request->getpost("k_mill_non")??'';
//             $dd['k_core_on']        = $this->request->getpost("k_core_on")??'';
//             $dd['k_core_non']       = $this->request->getpost("k_core_non")??'';

//             $dd['w_scan_on']            = $this->request->getpost("w_scan_on")??'';
//             $dd['w_scan_non']           = $this->request->getpost("w_scan_non")??'';
//             $dd['w_color_on']           = $this->request->getpost("w_color_on")??'';
//             $dd['w_color_non']          = $this->request->getpost("w_color_non")??'';
//             $dd['w_copy_on']            = $this->request->getpost("w_copy_on")??'';
//             $dd['w_copy_non']           = $this->request->getpost("w_copy_non")??'';
//             $dd['w_record_on']          = $this->request->getpost("w_record_on")??'';
//             $dd['w_record_non']         = $this->request->getpost("w_record_non")??'';
//             $dd['w_short_on']           = $this->request->getpost("w_short_on")??'';
//             $dd['w_short_non']          = $this->request->getpost("w_short_non")??'';
//             $dd['w_whitecutting_on']    = $this->request->getpost("w_whitecutting_on")??'';
//             $dd['w_whitecutting_non']   = $this->request->getpost("w_whitecutting_non")??'';
//             $dd['w_pepsi_on']           = $this->request->getpost("w_pepsi_on")??'';
//             $dd['w_pepsi_non']          = $this->request->getpost("w_pepsi_non")??'';
//             $dd['w_board_on']           = $this->request->getpost("w_board_on")??'';
//             $dd['w_board_non']          = $this->request->getpost("w_board_non")??'';
//             $dd['w_book_on']            = $this->request->getpost("w_book_on")??'';
//             $dd['w_book_non']           = $this->request->getpost("w_book_non")??'';
//             $dd['w_rulled_on']          = $this->request->getpost("w_rulled_on")??'';
//             $dd['w_rulled_non']         = $this->request->getpost("w_rulled_non")??'';
//             $dd['w_tick_on']            = $this->request->getpost("w_tick_on")??'';
//             $dd['w_tick_non ']          = $this->request->getpost("w_tick_non ")??0;
//             // print_r($dd);    
//             $result = $this->main_model->insert_table("wastpaper_quality",$dd);
//         // ****************************************************************************************************************
           
//             $returnData['success'] = 'true';
//             $returnData['message'] = 'List Added Successfully';
//             $returnData['id'] = $check;

//             $catname = $this->main_model->getRowData("product_category", "product_category", "id = '$category'");
//             $catname = $catname['product_category']??'';
//             $notification['title']                = 'New Product listed' ;
//             $notification['description']          = 'Listed post  is of '. $catname. ' Send your response' ;
//             $notification['url']                  = 'view-listproduct/'.$check ;
//             $notification['added_by']             = $this->memberID ;
//             $notification['added_date']           = $this->currentDate;

//             $this->main_model->insert_table('notification', $notification);
//             echo json_encode($returnData);
          
//         }
//         else 
//         {
//             $returnData['success'] = 'false';
//             $returnData['message'] = 'Something went wrong 1!';
//             $returnData['data']    = $data;
//             echo json_encode($returnData);
//         } 
           
//         } 
//         else
//         {
//            $returnData['error']                         = true ;
//            $returnData['category']                  = $this->validation->getError('category');
//            $returnData['product_location']                 = $this->validation->getError('product_location');
//            $returnData['pterm']                      = $this->validation->getError('pterm');
//            $returnData['ddays']                 = $this->validation->getError('ddays');
         
               
//             echo json_encode($returnData);
//         }
//     }
// }



    public function checkuploadlist($id){
        $uploadcount = $this->main_model->getNumRow(
            "ordered_product_specification",
            "id",
            " product = '$id'"
        );
      return  json_encode($uploadcount);
    }


    public function viewListProduct($id)
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

        $data["title"] = "Product ";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getViewListProduct($id)
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;

        $data["listedproduct"] = $this->main_model->getQueryRowData(
            "select listed_products.*  ,product_category.product_category as catname, product_category.product_specification as specification from listed_products  join product_category on listed_products.category = product_category.id where listed_products.deleted = 0 and listed_products.id  ='$id' and listed_products.added_by != '$this->memberID'   order by listed_products.added_date desc"
        );

        $data["listspecification"] = $this->main_model->getQueryAllData(
            "select *, (select product_name from product where product.id = list_specification.brand_name) as bname, (select product_category from product_category where product_category.id = list_specification.sub_category) as cname from list_specification  where list_id = '$id' "
        );
        $data["listspecification_waste"] = $this->main_model->getRowData("wastpaper_quality","*"," listed_product_id='$id'"  );


        $uid = $data["listedproduct"]["added_by"];
        $data["userdata"] = $this->main_model->getRowData(
            "users",
            "*",
            "id = '$uid'"
        );
        $deckle = $data["listedproduct"]["deckle"];
        $addedby = $data["listedproduct"]["added_by"];
        if ($deckle == 1) {
            $data["decklesize"] = $data[
                "decklesize"
            ] = $this->main_model->getQueryAllData(
                "select ops.id,ops.size,ops.quantity, type,ops.gsm,bf  from ordered_product_specification ops left join list_specification ls on ops.product = ls.id  where ops.list_id = '$id' and ops.added_by = '$addedby' "
            );
        }
        $data["title"] = "Product ";
        return view("list/view-listproduct", $data);
    }


    public function viewListResponse($id)
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

        $data["title"] = "Product ";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getviewListResponse($id)
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;

        $data["listedproduct"] = $this->main_model->getQueryRowData(
            "select listed_products.*  ,product_category.product_category as catname, product_category.product_specification as specification from listed_products  join product_category on listed_products.category = product_category.id where listed_products.deleted = 0 and listed_products.id  ='$id' and listed_products.added_by != '$this->memberID'   order by listed_products.added_date desc"
        );

        $data["listspecification"] = $this->main_model->getQueryAllData(
            "select *, (select product_name from product where product.id = list_specification.brand_name) as bname, (select product_category from product_category where product_category.id = list_specification.sub_category) as cname from list_specification  where list_id = '$id' "
        );
        $data["listspecification_waste"] = $this->main_model->getRowData("wastpaper_quality","*"," listed_product_id='$id'"  );


        $uid = $data["listedproduct"]["added_by"];
        $data["userdata"] = $this->main_model->getRowData(
            "users",
            "*",
            "id = '$uid'"
        );
        $deckle = $data["listedproduct"]["deckle"];
        $addedby = $data["listedproduct"]["added_by"];
        if ($deckle == 1) {
            $data["decklesize"] = $data[
                "decklesize"
            ] = $this->main_model->getQueryAllData(
                "select ops.id,ops.size,ops.quantity, type,ops.gsm,bf  from ordered_product_specification ops left join list_specification ls on ops.product = ls.id  where ops.list_id = '$id' and ops.added_by = '$addedby' "
            );
        }
        $data["title"] = "Product ";
        return view("list/view-listresponse", $data);
    }

    public function viewList($id)
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

        $data["title"] = "Product ";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getViewList($id)
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;

        $data1["updates"] = 0;
        $this->main_model->update_table("listed_products", $data1, "id='$id'");

        if($this->userType ==4){
            $addedby='';
        }elseif ($this->userType !=0) {
            $addedby="and listed_products.added_by = '$this->memberID' "; 
        }
        else{
            $addedby='';
        }

        $data["listedproduct"] = $this->main_model->getQueryRowData(
            "select listed_products.*  ,product_category.product_category as catname, product_category.product_specification as specification from listed_products  join product_category on listed_products.category = product_category.id where listed_products.deleted = 0 and listed_products.id = '$id' $addedby  order by listed_products.added_date desc"
        );
        // $data["listedproduct"] = $this->main_model->getQueryRowData(
        //     "select listed_products.*  ,product_category.product_category as catname, product_category.product_specification as specification from listed_products  join product_category on listed_products.category = product_category.id where listed_products.deleted = 0 and listed_products.id = '$id' and listed_products.added_by = '$this->memberID'   order by listed_products.added_date desc"
        // );
        $data["listspecification"] = $this->main_model->getQueryAllData(
            "select *, (select product_name from product where product.id = list_specification.brand_name) as bname, (select product_category from product_category where product_category.id = list_specification.sub_category) as cname from list_specification  where list_id = '$id' "
        );
        
        $data["listspecification_waste"] = $this->main_model->getRowData("wastpaper_quality","*"," listed_product_id='$id'"  );


        $data["interested_request"] = $this->main_model->getQueryAllData(
            "select response.* , users.user_name,users.phone_number, users.user_type, users.email, users.company_name, users.address, users.state, users.city, users.state, users.pin_code, (select count(id) from ordered_product_specification ops where ops.list_id = '$id' and ops.added_by = response.interested_id ) as sizeupdate   from response join users on response.interested_id = users.id where response.deleted = 0 and response.list_id = '$id' "
        );
        // print_r($data["listedproduct"]);
        // exit;
        if ($data["listedproduct"] !== null) {
            $deckle = $data["listedproduct"]["deckle"];
            if ($deckle == 1) {
                $data["decklesize"] = $this->main_model->getQueryAllData(
                    "select ops.id,ops.size,ops.quantity, type,ops.gsm,bf  from ordered_product_specification ops left join list_specification ls on ops.product = ls.id  where ops.list_id = '$id' and ops.added_by = '$this->memberID' "
                );
            }
        }
        // and interested_id = '$this->memberID'
        $data["response"] = $this->main_model->getQueryRowData(
            "select * from response where list_id = '$id' "
        );
       $r_id =  $data["response"]['id']??'';
       $data["response_counter_status"]='';
       if ($r_id) {
        $data["response_counter_status"] = $this->main_model->getQueryRowData( "select * from counter_offer where response_id = '$r_id' ");
       }
      

        $data["title"] = "Product ";
        return view("list/view-list", $data);
    }

    public function addResponse()
    {
        $id = $this->request->getpost("id");

        $data["list_id"] = $id;
        $data["interested_id"] = $this->memberID;
        $data["added_by"] = $this->memberID;
        $data["added_date"] = $this->currentDate;

        $check = $this->main_model->insert_table("response", $data);
        if ($check) {
            $returnData["success"] = "true";
            $returnData["message"] = "Added to response Successfully";
            $returnData["data"] = "";
            echo json_encode($returnData);
        } else {
            $returnData["success"] = "false";
            $returnData["message"] = "Somthing went wrong!";
            $returnData["data"] = "";
            echo json_encode($returnData);
        }
    }

    public function response()
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

        $data["title"] = "List";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getResponse()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;

        $data["query"] = $this->main_model->getQueryAllData(
            "select listed_products.* , product.product_name as pname, users.user_name as name, users.phone_number as pno from listed_products join users on listed_products.added_by = users.id join product on listed_products.product_id = product.id where listed_products.deleted = 0 and listed_products.added_by = '$this->memberID'  order by listed_products.added_date desc"
        );

        $data["response"] = $this->main_model->getQueryAllData(
            "select response.* , product.product_name as pname , listed_products. *, users.user_name,users.phone_number, users.user_type, users.email, users.company_name, users.address, users.state, users.city, users.state, users.pin_code   from response join listed_products on response.list_id = listed_products.id join product on product.id = listed_products.product_id join users on listed_products.added_by = users.id  where response.deleted = 0 and response.added_by = $this->memberID "
        );

        $data["title"] = "List";
        return view("list/response", $data);
    }

    public function sendListResponse($id)
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

        $data["title"] = "Listed Product ";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getSendListResponse($id)
    {
        $data["user_type"] = $this->userType;

        $data['is_order'] = $this->main_model->getRowData("orders","*","list_id='$id'");
        if ($this->accountStatus == 1) {
            $checkedValues = "";
            $checkedValues = $this->request->getpost("checkedValues");
            $q1 = "";
            $specid = "";
            $outputString = !empty($checkedValues) ? str_replace('"', "", $checkedValues) : '';
            if ($outputString != "") {
                $q1 = "and list_specification.id in (" . $outputString . ")";
            }

            $data["dashboard_type"] = $this->dashboardStatus;
            $data["listedproduct"] = $this->main_model->getQueryRowData(
                "select listed_products.* ,(select wastpaper_quality.sub_category from wastpaper_quality where wastpaper_quality.listed_product_id = listed_products.id) as subcategory,product_category.product_category as catname, product_category.required, product_category.product_specification as specification from listed_products  join product_category on listed_products.category = product_category.id  where listed_products.deleted = 0 and listed_products.id  = '$id' and listed_products.added_by != '$this->memberID'   order by listed_products.added_date desc"
            );

            // echo "data:" . $data["listedproduct"]["category"];

            $data["response"] = $this->main_model->getQueryRowData(
                "select * from response where list_id = '$id' and interested_id = '$this->memberID'"
            );
            $res_id= $data["response"]['id']??'';
            $data["counter_status"] = $this->main_model->getQueryRowData(
                "select * from counter_offer where response_id = '$res_id' "
            );
            // echo "select * from response where list_id = '$id' and interested_id = '$this->memberID'";

            $responsespecification = $this->main_model->getQueryAllData(
                "select response_specification.* , (select product_name from product where product.id = response_specification.brand_name) as bname, (select product_category from product_category where product_category.id = response_specification.sub_category) as cname , co.rate as crate, co.qty as cqty  from response_specification left join counter_offer co on co.rspecific_id = response_specification.id left join list_specification on response_specification.specification_id = list_specification.id and ( response_specification.added_by = '$this->memberID' or  response_specification.added_by is null)  where list_specification.list_id = '$id' "  );
            if ($responsespecification) {
                foreach ($responsespecification as $key => $value) {
                    $data["responsespecificationArr"][
                        $value["specification_id"]
                    ] = $value;
                    if ($specid == "") {
                        $specid = $value["specification_id"];
                    } else {
                        $specid .= "," . $value["specification_id"];
                    }
                }
            }

            if ($data["response"] != "") {
                $q1 = "and list_specification.id in (" . $specid . ")";
            } 
            $addedby = $data["listedproduct"]["added_by"];
            $data["requestedsize"] = $this->main_model->getQueryAllData(
                "select ops.id,ops.size,ops.avail_size,ops.quantity, type,ops.gsm,bf  from ordered_product_specification ops left join list_specification ls on ops.product = ls.id  where ops.list_id = '$id' and ( ops.added_by = '$this->memberID' or ops.added_by = '$addedby'  )"  );

            $data["listspecification"] = $this->main_model->getQueryAllData("select response_specification.*,list_specification.* , (select product_name from product where product.id = list_specification.brand_name) as bname, (select product_category from product_category where product_category.id = list_specification.sub_category) as cname
              , (select `required` from product_category where product_category.id = list_specification.sub_category) as fl_required  from list_specification left join response_specification on response_specification.specification_id = list_specification.id and ( response_specification.added_by = '$this->memberID' or  response_specification.added_by is null)  where list_id = '$id' $q1 ");
              $data["listspecification_waste"] = $this->main_model->getRowData("wastpaper_quality","*"," listed_product_id='$id'"  );

            $data["checkedValues"] = $q1;
            $data["title"] = "Listed Product ";
            // requestedsize
            return view("list/send-listresponse", $data);
        } else {
            $data["error"] =
                "Register your company details to access this features";
            return view("notapproved", $data);
        }
    }


    public function confirmPurchaseResponse($id)
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

    public function getConfirmPurchaseResponse($id)
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;

        $data["response"] = $this->main_model->getQueryRowData(
            "select response.*, users.user_name,users.company_name, users.phone_number from response join users on response.interested_id = users.id where response.id = '$id' "
        );

        $lid = $data["response"]["list_id"];
        $ab = $data["response"]["added_by"];
        if ($this->userType != 4) {
            $addedby = "and listed_products.added_by = '$this->memberID'";
            $add = "and added_by = $ab ";
            $radd="and rs.added_by = $ab";
         } else {
            $addedby='';
            $add="";
            $radd="";
         }

        $data["responsespecification"] = $this->main_model->getQueryAllData(
            "select *, (select product_category from product_category where product_category.id = response_specification.sub_category) as cname, (select product_name from product where product.id = response_specification.brand_name) as bname  from response_specification where        response_id = '$id' and added_by = $ab "
        );

        // $data["listedproduct"] = $this->main_model->getQueryRowData(
        //     "select listed_products.* ,product_category.product_category as catname , product_category.product_specification as specification, product_category.id as pcatid, users.user_name as name, users.phone_number as pno from listed_products join users on listed_products.added_by = users.id  join product_category on listed_products.category = product_category.id where listed_products.deleted = 0 and listed_products.id  = '$lid' $addedby  order by listed_products.added_date desc"
        // );
        $data["listedproduct"] = $this->main_model->getQueryRowData(
            "select listed_products.* ,product_category.product_category as catname , product_category.product_specification as specification, product_category.id as pcatid, users.user_name as name, users.phone_number as pno from listed_products join users on listed_products.added_by = users.id  join product_category on listed_products.category = product_category.id where listed_products.deleted = 0 and listed_products.id  = '$lid' $addedby  order by listed_products.added_date desc"
        );

        $data["listspecification"] = $this->main_model->getQueryAllData(
            "select list_specification.* , rs.frate , rs.fquantity from list_specification join response_specification as rs on list_specification.id = rs.specification_id where list_specification.deleted = 0   and list_id = '$lid' and rs.added_by = $ab "
        );

        $data["ordercount"] = $this->main_model->getNumRow(
            "orders",
            "id",
            " added_by = '$this->memberID'"
        );
        $orderplaced = $this->main_model->getNumRow(
            "orders",
            "id",
            " list_id = '$lid'"
        );
        if ($orderplaced == 0) {
            $data["title"] = " Listed Purchase";
            return view("list/confirm-purchase", $data);
        } else {
            $data["redirect"] = "nav-purchase";
            return view("default", $data);
        }
    }

    public function confirmSaleResponse($id)
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

    public function getConfirmSaleResponse($id)
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;

        $data["response"] = $this->main_model->getQueryRowData(
            "select response.*, users.user_name,users.company_name, users.phone_number from response join users on response.interested_id = users.id where response.id = '$id' "
        );
        $lid = $data["response"]["list_id"];
        $ab = $data["response"]["added_by"];
        if ($this->userType != 4) {
            $addedby = "and listed_products.added_by = '$this->memberID'";
            $add = "and added_by = $ab ";
            $radd="and rs.added_by = $ab";
         } else {
            $addedby='';
            $add="";
            $radd="";
         }

        $data["responsespecification"] = $this->main_model->getQueryAllData(
            "select *, (select product_category from product_category where product_category.id = response_specification.sub_category) as cname, (select product_name from product where product.id = response_specification.brand_name) as bname  from response_specification where        response_id = '$id' $add"  );


        $data["listedproduct"] = $this->main_model->getQueryRowData(
            "select listed_products.* ,product_category.product_category as catname , product_category.product_specification as specification, product_category.id as pcatid, users.user_name as name, users.phone_number as pno from listed_products join users on listed_products.added_by = users.id  join product_category on listed_products.category = product_category.id where listed_products.deleted = 0 and listed_products.id  = '$lid' $addedby  order by listed_products.added_date desc"
        );
       
        // print_r( $data['listedproduct']);

        // $data['listedproduct'] = $this->main_model->getQueryRowData("select listed_products.* ,product_quality.product_quality as qname ,product_category.product_category as catname, product_category.product_specification as specification, product.product_category as pcatid, product.product_name as pname, users.user_name as name, users.phone_number as pno from listed_products join users on listed_products.added_by = users.id join product on listed_products.product_id = product.id left join product_quality on listed_products.quality_id = product_quality.id join product_category on product.product_category = product_category.id where listed_products.deleted = 0 and listed_products.id  = '$lid' and listed_products.added_by = '$this->memberID'   order by listed_products.added_date desc");

        $data["listspecification"] = $this->main_model->getQueryAllData(
            "select list_specification.* , rs.frate , rs.fquantity from list_specification join response_specification as rs on list_specification.id = rs.specification_id where list_specification.deleted = 0   and list_id = '$lid' $radd "
        );
        // $data["specification"] = $this->main_model->getQueryAllData(
        //     "select list_specification.* , rs.frate , rs.fquantity from list_specification join response_specification as rs on list_specification.id = rs.specification_id where list_specification.deleted = 0   and list_id = '$lid' and rs.added_by = $ab "
        // );

        $data["ordercount"] = $this->main_model->getNumRow(
            "orders",
            "id",
            " added_by = '$this->memberID'"
        );
        $orderplaced = $this->main_model->getNumRow(
            "orders",
            "id",
            " list_id = '$lid'"
        );

        $data["response"] = $this->main_model->getQueryRowData(
            "select response.*, users.user_name,users.company_name, users.phone_number from response join users on response.interested_id = users.id where response.id = '$id' "
        );
 
        // *****************************************************************************************************
        // $res_id =  $this->main_model->getRowData('counter_offer', "added_by", "response_id = '$id'");
        $listid = $this->main_model->getRowData(
            "response",
            "interested_id",
            "id = '$id'"
        );
        // $l_id=$listid['list_id'];
        $userid=$listid["interested_id"];
        $user_type=  $this->main_model->getRowData("users", "user_type", "id = '$userid'");
        $data_notification["url"] = "purchase";
        $data_notification["added_by"] = $this->memberID;
        $data_notification["title"] = "Order accepted  by the seller";
        $data_notification["description"] = "Order accepted  by the seller";
        $data_notification["added_date"] = $this->currentDate;
        $data_notification["notification_for"] = $user_type["user_type"];
        $data_notification["notification_for_id"] = $listid["interested_id"];
        $notification = $this->main_model->insert_table(  "notification",  $data_notification  );
        $notification;

        // **************************************responsespecification***************************************************************

        if ($orderplaced == 0) {
            $data["title"] = " Listed Sale";
            return view("list/confirm-sale", $data);
        } else {
            $data["redirect"] = "nav-sale";
            return view("default", $data);
        }
    }
    public function getcounterconfrimresponse($id)
    {
        echo $id;
    }

    public function submitResponse()
    {
         
        $return["success"] = "false";
        if ($this->request->isAJAX()) 
        {
            $list_id = $this->request->getpost("list_id");
            $quantity = $this->request->getpost("quantity");
            $truck_ratio = $this->request->getpost("truck_ratio")??'';
            // $rate  = $this->request->getpost("rate");
            $dellocation = $this->request->getpost("dellocation");
            $pterm = $this->request->getpost("pterm");
            $deldays = $this->request->getpost("deldays");
            $offerlimit = $this->request->getpost("offerlimit");
            $description = $this->request->getpost("description");
            $delivery_type = $this->request->getpost("delivery_type");
            $specification_id = $this->request->getpost("specification_id");
            $specification  = $this->request->getpost("specification");
            $checked_id     = $this->request->getpost("checked");

            
            $checked2 = !empty($checked_id) ? array_filter($checked_id) : [];
            
 
            if (empty($checked2)) {
                $error = "Please select atleast one response";
            } 

            if (empty($error)) 
            {
                $q=0;
                foreach ($quantity as $key => $qty) 
                {
                    $q = $q+(int)$qty;
                    // echo $q;
                    $row = $specification_id[$key];

                  
                }
                if (in_array($row, $checked_id)) 
                {
                  
                    if ($q < 150) {
                        $error = "Minimum Quantity is 150kg $q";
                    } elseif ($q > 200 && $q < 300) {
                        $error =
                            "Quantity should multiplication of 150kg <br> eg. 300kg, 450kg";
                    }
                }
            }

            if (empty($error)) 
            {
                if (empty($offerlimit)) {
                    $offerlimit = date("Y-m-d h:i A", strtotime("+7 hour"));
                } else {
                    $offerlimit = $offerlimit;
                }
                $string = $specification;
                $string = preg_replace('/\.$/', "", $string);
                $array = explode(",", $string);
                // $rate = $this->request->getpost("rate") ;
                foreach ($array as $value) {
                    if ($value == "rate") {
                        $rate = $this->request->getpost("rate");
                        $rate_uom = $this->request->getpost("rate_uom");
                        $cashrate = $this->request->getpost("cashrate");
                        $creditrate = $this->request->getpost("creditrate");
                        $freight_rate = $this->request->getpost("freight_rate");
                    } elseif ($value == "size") {
                        $size_length = $this->request->getpost("size_length");
                        $size_width = $this->request->getpost("size_width");
                        $size = $this->request->getpost("size");



                        
                    } else {
                        $$value = $this->request->getpost($value);
                    }
                }

                $data["list_id"] = $list_id;
                
                $data["interested_id"] = $this->memberID; 
                $data["dellocation"] = $dellocation;
                $data["truck_ratio"] = $truck_ratio[0]??'';
             
                $data["pterm"] = $pterm??'';
                $data["deldays"] = $deldays??'';
                $data["offerlimit"] = $offerlimit??'';
                $data["description"] = $description??'';
                $data["delivery_type"] = $delivery_type??'';
                $data["added_by"] = $this->memberID;
                $data["added_date"] = $this->currentDate;
                // print_r($data);


                $check = $this->main_model->insert_table("response", $data);
                // echo $check;
                // exit;
                $data2=[];
                $creditrate = !empty($creditrate)? $creditrate :" ";
                if ($check) 
                {
                    for ($i = 0; $i < count($specification_id); $i++) 
                    {
                        $row_id = $specification_id[$i];
                        if (in_array($row_id, $checked_id)) 
                        {
                           
                            $data2["response_id"] = $check;
                            $data2["specification_id"] = $specification_id[$i];
                            foreach ($array as $value) 
                            {
                                if ($value == "rate") {
                                    $data2[$value] = $$value[$i] ?? 0;
                                    $data2["rate_uom"] = $rate_uom[$i] ?? 0;
                                    $data2["cashrate"] = $cashrate[$i] ?? 0;
                                    $data2["creditrate"] = $creditrate[$i] ?? 0;
                                    $data2["freight_rate"] = $freight_rate[$i] ?? 0;
                                } else {
                                    $data2[$value] = $$value[$i] ?? 0;
                                }
                            }

                            $data2["fquantity"] = $quantity[$i] ?? "0";
                            $data2["frate"] = $rate[$i] ?? "0";
                            $data["bundle_weight"] = $bundle_weight??0;
                            $data2["added_by"] = $this->memberID;
                            $data2["added_date"] = $this->currentDate;
                            $check2 = $this->main_model->insert_table(
                                "response_specification",
                                $data2
                            );
                            $this->main_model->listspecresponse(
                                $specification_id[$i]
                            );

                            $data1["updates"] = 1;
                            $this->main_model->update_table(
                                "listed_products",
                                $data1,
                                "id='$list_id'"
                            );

                            $this->main_model->listproductresponse($list_id);
                            $return["success"] = "true";
                            $return["message"] = $creditrate;
                            $return["description"] = $description;
                            $return["id"] = $check;

                            $list_by = $this->main_model->getRowData(
                                "listed_products",
                                "added_by",
                                "id = '$list_id'"
                            );
                            $uid = $list_by['added_by'];
                            $userType = $this->main_model->getRowData( "users", "user_type", "id = '$uid'" );
                            $notification["title"] = "Response Recieved on Listed Product";
                            $notification["description"] =   "Response recieved from a user";
                            $notification["url"] = "view-list/" . $list_id;
                            $notification["added_by"] = $this->memberID;
                            $notification["added_date"] = $this->currentDate;
                            $notification["notification_for"] =$userType["user_type"]??'';
                            $notification["notification_for_id"] =$list_by["added_by"]??'';

                            $this->main_model->insert_table(
                                "notification", $notification
                            );
                        }
                    }

                    //echo json_encode($returnData);
                } else {
                    $return["message"] = "Query Does not Work";
                    $return["data"] = $data2;
                }
            }

            if (!empty($error)) {
                $return["message"] = $error;
            }
        }
        echo json_encode($return);
    }








    public function submit_response_location_terms()
    {
        $id = $this->request->getVar("r-id");
        $title = $this->request->getVar("title"); 
        $data["delivery_locations"] = $this->request->getVar(
            "delivery_locations"
        );
        $data["d_pincode"] = $this->request->getVar("d_pincode");
        $data["payment_terms"] = $this->request->getVar("payment_terms");
        $result = $this->main_model->update_table(
            "listed_products",
            $data,
            "id='$id'"
        );
        if ($result) {
            $returnData["success"] = "true";
            $returnData["message"] = "Location added successfully";
            $returnData["title"] = $title;
            $returnData["id"] = $id; 
            return json_encode($returnData);
        }
        $returnData["success"] = "false";
        $returnData["message"] = "Server Error";
        // $returnData['title']      =   $title;
        return json_encode($returnData);
    }

    public function approveList()
    {
        $id = $this->request->getpost("id");

        $data["status"] = "1";

        $check = $this->main_model->update_table("response", $data, "id='$id'");
        if ($check) {
            $responsedata = $this->main_model->getRowData(
                "response",
                "*",
                "id = '$id'"
            );

            $lid = $responsedata["list_id"];
            $accepted_id = $responsedata["interested_id"];

            $data1["list_status"] = "1";
            $data1["accepted_by"] = $accepted_id;
            $data1["accepted_date"] = $this->currentDate;
            $this->main_model->update_table(
                "listed_products",
                $data1,
                "id='$lid'"
            );

            $returnData["success"] = "true";
            $returnData["message"] = "List Approved Successfully";
            $returnData["data"] = $responsedata["list_id"];
            echo json_encode($returnData);
        } else {
            $returnData["success"] = "false";
            $returnData["message"] = "Somthing went wrong!";
            $returnData["data"] = "";
            echo json_encode($returnData);
        }
    }

    public function rejectResponse()
    {
        $id = $this->request->getpost("id");

        $data["status"] = "2";

        $check = $this->main_model->update_table("response", $data, "id='$id'");
        if ($check) {
            $returnData["success"] = "true";
            $returnData["message"] = "List Rejected Successfully";
            $returnData["data"] = "";
            echo json_encode($returnData);
        } else {
            $returnData["success"] = "false";
            $returnData["message"] = "Somthing went wrong!";
            $returnData["data"] = "";
            echo json_encode($returnData);
        }
    }
   

    public function userList()
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

        $data["title"] = "User List";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getUserList()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["location"] = $this->main_model->getAllRowsData(
            "freight_list",
            "*",
            "id>0"
        );

        $dtype = "";
        if ($data["dashboard_type"] == "1") {
            $dtype = "and listed_products.list_type = 2";
        } elseif ($data["dashboard_type"] == "2") {
            $dtype = "and listed_products.list_type = 1";
        } elseif ($data["dashboard_type"] == "0") {
            $dtype = "";
        }
        $q1 = "";
        if ($this->userType == 1) {
            $q1 = "and (listed_products.category = 1 )";
        } elseif ($this->userType == 2) {
            $q1 =
                "and ( (listed_products.category = 1 and listed_products.list_type = 2) or (listed_products.category  = 2 and listed_products.list_type = 1) or listed_products.category > 2 )";
        } elseif ($this->userType == 3) {
            $q1 =
                "and ( (listed_products.category = 1 and listed_products.list_type = 1) or (listed_products.category = 2 and listed_products.list_type = 2) or listed_products.category > 2) ";
        }

        $q2 = "";
        // if($data['dashboard_type'] == '2' and $this->userType == 3 ){  $q2 = 'and users.user_type != 2'; }
        // else if($data['dashboard_type'] == '0' and $this->userType == 3){  $q2 = 'and ( (listed_products.category = 1 and users.user_type != 2) or (listed_products.category = 2 ) or listed_products.category > 2) '; }

        $data["dtype"] = $dtype;
        $data["listposted"] = $this->main_model->getQueryAllData(
            "select ( select response.interested_id from response where response.list_id = listed_products.id and added_by = '$this->memberID') as interested_id,( select wastpaper_quality.sub_category from wastpaper_quality where wastpaper_quality.listed_product_id = listed_products.id ) as subcategory  ,( select wastpaper_quality.valid_from from wastpaper_quality where wastpaper_quality.listed_product_id = listed_products.id ) as valid_from,( select wastpaper_quality.truck_ratio from wastpaper_quality where wastpaper_quality.listed_product_id = listed_products.id ) as truck_ratio  , listed_products.* , product_category.product_category as pcatname from listed_products left join product_category on listed_products.category = product_category.id  where   listed_products.deleted = 0 $dtype and listed_products.list_status = 0  and  listed_products.added_by != '$this->memberID' and listed_products.accepted_by = 0 $q1 $q2 order by listed_products.added_date desc"
        );
        $addedby = $data["listposted"][0]['added_by'];
        $data["mill_name"] = $this->main_model->getRowData("users","*","id=$addedby");
        $data["title"] = "List";
        return view("list/userlist", $data);
    }

    public function getCounteroffer()
    {
        $responseid = $this->request->getpost("id");
        $counterid = $this->request->getpost("cid");

        $responsedata = $this->main_model->getRowData(
            "response",
            "*",
            "id = '$responseid'"
        );
        $counterdata = $this->main_model->getRowData(
            "counter_offer",
            "*",
            "id = ' $counterid'"
        );
        // $data['rspecification'] = $this->main_model->getQueryAllData("select ls.*, rs.rate as rrate, rs.quantity as rqty FROM response_specification as rs join list_specification as ls on rs.specification_id = ls.id  where response_id = $responseid and  rs.deleted = '0' ");

        $data["rspecification"] = $this->main_model->getQueryAllData(
            "select rs.*, rs.frate as rrate, rs.fquantity as rqty, (select product_name from product where product.id = rs.brand_name) as bname, (select product_category from product_category where product_category.id = rs.sub_category) as cname, co.qty as cqty , co.rate as crate,co.response_cqty ,co.response_crate,co.response_counter_status FROM response_specification as rs left join counter_offer co on rs.id = co.rspecific_id   where rs.response_id = $responseid and  rs.deleted = '0' "
        );

        $specification = $this->main_model->getQueryRowData(
            "select product_category.product_specification from listed_products join response on listed_products.id = response.list_id join  product_category on product_category.id = listed_products.category where response.id  =  '$responseid' "
        );

        $returnData["success"] = "true";
        $returnData["responsedata"] = $responsedata;
        $returnData["counterdata"] = $counterdata;
        $returnData["list"] = $data["rspecification"];
        $returnData["specification"] = $specification["product_specification"];
        echo json_encode($returnData, true);
    }

    public function submitCounteroffer()
    {
        $responseid = $this->request->getpost("responseid");
        $rsid = $this->request->getpost("rsid");
        $crate = $this->request->getpost("crate");
        $rrate = $this->request->getpost("rrate")??0;
        $cqty = $this->request->getpost("cqty");

        $data1["counterstatus"] = 3;
        $data1["response_counter_status"] = 2;
        $check1 = $this->main_model->update_table("response",$data1, "id='$responseid'" );
        for ($i = 0; $i < count($rsid); $i++) {
            $data["response_id"] = $responseid;
            $data["rspecific_id"] = $rsid[$i];
            $rrate = $rrate[$i];
            $data["rate"] = $crate[$i];
            $data["qty"] = $cqty[$i];
            $data["added_by"] = $this->memberID;
            $data["added_date"] = $this->currentDate;

            // if($rrate>$data["rate"]){
            //     $returnData["success"] = "false";
            //     $returnData["message"] = "Counter Price should Greater then Requested Price"; 
            //     echo json_encode($returnData);
                
            // }else{
            // }
            
            $check2 = $this->main_model->insert_table("counter_offer", $data); 
        }
        $res_id = $this->main_model->getRowData("response","*","id = '$responseid'");
        $usert = $res_id["interested_id"];
        $user_type = $this->main_model->getQueryRowData(
            "select user_type from users where id = '$usert' "
        );
        $lid = $res_id["list_id"];
        $data_notification["url"] = "send-listresponse/$lid";
        $data_notification["added_by"] = $this->memberID;
        $data_notification["title"] = "Counter send from seller";
        $data_notification["description"] ="product counter sent from seller to buyer";
        $data_notification["added_date"] = $this->currentDate;
        $data_notification["notification_for"] = $user_type["user_type"];
        $data_notification["notification_for_id"] = $res_id["interested_id"];
        $notification = $this->main_model->insert_table( "notification", $data_notification );
        $notification;
        //         if(!$notification){
        // // echo "notification not added";
        //         }

        if ($check2) {
            $returnData["success"] = "true";
            $returnData["message"] = "Counter Offer sent Successfully";

            echo json_encode($returnData);
        } else {
            $returnData["success"] = "false";
            $returnData["message"] = "Query Does not work";
            $returnData["data"] = $cqty;
            echo json_encode($returnData);
        }
    }

    public function approveCounteroffer()
    {
        $id = $this->request->getpost("id");

        $cnt = $this->main_model->getNumRow(
            "response_specification",
            "*",
            "response_id='$id'"
        );
        if ($cnt) { 
            $data["counterstatus"] = "1";

            $check = $this->main_model->update_table(
                "response",
                $data,
                "id='$id'"
            );
            if ($check) {
                $response_specification = $this->main_model->getQueryAllData(
                    "select response_id, rspecific_id, qty, rate from counter_offer   where response_id = $id "
                );

                foreach ($response_specification as $value) {
                    $specification_id = $value["rspecific_id"];
                    $data1["fquantity"] = $value["qty"];
                    $data1["frate"] = $value["rate"];
                    $this->main_model->update_table(
                        "response_specification",
                        $data1,
                        "id='$specification_id' and added_by = '$this->memberID'"
                    );
                }
                $returnData["success"] = "true";
                $returnData["message"] = "Wait for seller’s approval";
                $returnData["data"] = $response_specification;
                // ********************************************************************************************
                $res_id = $this->main_model->getRowData(
                    "counter_offer",
                    "added_by",
                    "response_id = '$id'"
                );
                $listid = $this->main_model->getRowData(
                    "response",
                    "list_id",
                    "id = '$id'"
                );
                $l_id = $listid["list_id"];
                $data_notification["url"] = "view-list/$l_id";
                $data_notification["added_by"] = $this->memberID;
                $data_notification["title"] = "Counter Accepted by buyer";
                $data_notification["description"] =
                    "counter response from user";
                $data_notification["added_date"] = $this->currentDate;
                $data_notification["notification_for"] = $res_id["added_by"];
                $notification = $this->main_model->insert_table(
                    "notification",
                    $data_notification
                );
                $notification;
                // ********************************************************************************************

                echo json_encode($returnData);
            } else {
                $returnData["success"] = "false";
                $returnData["message"] = "Somthing went wrong!";
                $returnData["data"] = "";
                echo json_encode($returnData);
            }
        } else {
            $returnData["success"] = "false";
            $returnData["message"] = "Size Required";
            echo json_encode($returnData);
        }
        // exit;
    }

    public function rejectCounteroffer()
    {
        $id = $this->request->getpost("id");

        $data["counterstatus"] = "2";

        $check = $this->main_model->update_table("response", $data, "id='$id'");
        if ($check) {
            $returnData["success"] = "true";
            $returnData["message"] = "Counter Offer Rejected Successfully";
            $returnData["data"] = "";
            echo json_encode($returnData);
        } else {
            $returnData["success"] = "false";
            $returnData["message"] = "Somthing went wrong!";
            $returnData["data"] = "";
            echo json_encode($returnData);
        }
    }

    public function cancelListresponse()
    {
        $id = $this->request->getpost("id");

        $data["status"] = "3";

        $check = $this->main_model->update_table("response", $data, "id='$id'");
        if ($check) {
            $returnData["success"] = "true";
            $returnData["message"] = "List Response Cancelled Successfully";
            $returnData["data"] = "";
            echo json_encode($returnData);
        } else {
            $returnData["success"] = "false";
            $returnData["message"] = "Somthing went wrong!";
            $returnData["data"] = "";
            echo json_encode($returnData);
        }
    }

    public function interest()
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

        $data["title"] = "Interest";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getInterest()
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $dtype = "";
        if ($data["dashboard_type"] == "1") {
            $dtype = "and listed_products.list_type = 2";
        } elseif ($data["dashboard_type"] == "2") {
            $dtype = "and listed_products.list_type = 1";
        } elseif ($data["dashboard_type"] == "0") {
            $dtype = "";
        }

        $data["response"] = $this->main_model->getQueryAllData(
            "select response.*, listed_products.list_number, listed_products.list_type, ( select product_name from product where product.id = listed_products.product_id) as pname , ( select orders.order_status from orders where orders.list_id = listed_products.id) as order_status , ( select orders.id from orders where orders.list_id = listed_products.id) as o_id  from response join listed_products on response.list_id = listed_products.id where response.added_by = $this->memberID $dtype order by added_date desc"
        );

        $data["title"] = "Interest";
        return view("list/interest", $data);
    }

    public function ordercat($id, $parent, $pid)
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

        $data["title"] = "Add Order";
        return view("include/header", $data) .
            view("include/navbar") .
            view("include/sidebar") .
            view("include/footer", $data);
    }

    public function getOrdercat($id, $parent, $pid)
    {
        $data["user_type"] = $this->userType;
        $data["dashboard_type"] = $this->dashboardStatus;
        $data["product_type"] = $this->main_model->getQueryAllData(
            "select * from product_type where deleted = 0  order by added_date desc"
        );
        $data["product_quality"] = $this->main_model->getQueryAllData(
            "select * from product_quality where deleted = 0  order by added_date desc"
        );
        $data["product_category"] = $this->main_model->getQueryAllData(
            "select * from product_category where deleted = 0  order by added_date desc"
        );

        $data["listcount"] = $this->main_model->getNumRow(
            "listed_products",
            "id",
            " deleted = 0"
        );
        $dtype = $this->dashboardStatus;
        $utype = $this->userType;
        if ($dtype == 1) {
            $cid = "and sale_user like '%$utype%'";
        } elseif ($dtype == 2) {
            $cid = "and buy_user like '%$utype%'";
        }

        $data["product"] = $this->main_model->getQueryRowData(
            "select product.*, product_category.product_specification from product left join product_category on product.product_category = product_category.id where product.id = '$pid' "
        );
        if ($parent == 0) {
            $data["catdata"] = $this->main_model->getQueryRowData(
                "select * from product_category where deleted = 0   and id = $id order by product_category asc"
            );
            $data["category"] = $this->main_model->getQueryAllData(
                "select * from product_category where deleted = 0  and parentid = 0  $cid  order by product_category asc"
            );
            $data["subcategory"] = $this->main_model->getQueryAllData(
                "select * from product_category where deleted = 0   and parentid = $id order by added_date asc"
            );
            $data["brand"] = $this->main_model->getQueryAllData(
                "select * from product where deleted = 0   and product_category = $id order by added_date asc"
            );
            $data["pquality"] = $this->main_model->getQueryAllData(
                "select * from product_quality where deleted = 0   and product_category = $id order by product_quality asc"
            );
            $data["subcatid"] = "";
        } else {
            $data["catdata"] = $this->main_model->getQueryRowData(
                "select * from product_category where deleted = 0   and id = $parent order by product_category asc"
            );
            $data["category"] = $this->main_model->getQueryAllData(
                "select * from product_category where deleted = 0  and parentid = 0  $cid  order by product_category asc"
            );
            $data["subcategory"] = $this->main_model->getQueryAllData(
                "select * from product_category where deleted = 0   and parentid = $parent order by added_date asc"
            );
            $data["brand"] = $this->main_model->getQueryAllData(
                "select * from product where deleted = 0   and product_category = $parent  order by added_date asc"
            );
            $data["pquality"] = $this->main_model->getQueryAllData(
                "select * from product_quality where deleted = 0   and product_category = $parent order by product_quality asc"
            );
            $data["subcatid"] = $id;
        }

        $data["otype"] = $this->request->getpost("otype");
        $data["title"] = "Add Order";

        return view("list/add-list", $data);

        // return view('list/add-list-'.$this->userType.'',$data);
    }

    public function getResponsespecification()
    {
        $return["success"] = false;
        if ($this->request->isAJAX()) {
            $search = "";
            $rid = $this->request->getpost("rid");
            if (!empty($rid)) {
                $data["rspecification"] = $this->main_model->getQueryAllData(
                    "select rs.*, rs.frate as rrate, rs.fquantity as rqty, (select product_name from product where product.id = rs.brand_name) as bname, (select product_category from product_category where product_category.id = rs.sub_category) as cname  FROM response_specification as rs where response_id = $rid and  rs.deleted = '0' "
                );

                $specification = $this->main_model->getQueryRowData(
                    "select product_category.product_specification from listed_products join response on listed_products.id = response.list_id join  product_category on product_category.id = listed_products.category where response.id  =  '$rid' "
                );
                if (!empty($data["rspecification"])) {
                    $return["success"] = true;
                    $return["list"] = $data["rspecification"];
                    $return["specification"] =
                        $specification["product_specification"];
                }
                $return['responseCounteroffer']=$this->main_model->getRowData('counter_offer', "*", "response_id = '$rid'");
            }
            echo json_encode($return, true);
        }
    }

    // public function getResponsedata()
    // {
    //     $return["success"] = false;
    //     if ($this->request->isAJAX()) {
    //         $brands = "";
    //         $sub_category = "";
    //         $quality = "";
    //         $search = "";
    //         $rid = $this->request->getpost("rid");
    //         if (!empty($rid)) {
    //             $listspecdata = $this->main_model->getQueryRowData(
    //                 "select c.product_specification , pc.product_category , c.required, lp.category,  ls.* from list_specification ls left join product_category pc on  pc.id = ls.sub_category left join listed_products lp on lp.id = ls.list_id left join product_category c on c.id = lp.category   where ls.id  = '$rid' "
    //             );
 
    //             $specification = $listspecdata["product_specification"];
    //             if (!empty($listspecdata)) {
    //                 $return["id"] = $listspecdata;
    //                 $subcat = $listspecdata["sub_category"];
    //                 $cat = $listspecdata["category"];
    //                 if ($subcat != "") {
    //                     $brands = $this->main_model->getQueryAllData(
    //                         "select * FROM product where sub_category = $subcat  "
    //                     );
    //                     $sub_category = $this->main_model->getQueryAllData(
    //                         "select * FROM product_category where parentid = $cat  "
    //                     );
    //                     $quality = $this->main_model->getQueryAllData(
    //                         "select * FROM product_quality where sub_category = $subcat  "
    //                     );
    //                 } else {
    //                     $brands = $this->main_model->getQueryAllData(
    //                         "select * FROM product where product_category = $cat  "
    //                     );
    //                     $sub_category = $this->main_model->getQueryAllData(
    //                         "select * FROM product_category where parentid = $cat  "
    //                     );
    //                     $quality = $this->main_model->getQueryAllData(
    //                         "select * FROM product_quality where product_category = $cat  "
    //                     );
    //                 }

    //                 $return["success"] = true;
    //                 $return["list"] = $brands;
    //                 $return["listspecdata"] = $listspecdata;
    //                 $return["specification"] = $specification;
    //                 $return["sub_category"] = $sub_category;
    //                 $return["quality"] = $quality;
    //                 $return["brand"] = $brands;
    //             }
    //         }
    //         echo json_encode($return, true);
    //     }
    // }

    public function getResponsedata()
    {
        $return["success"] = false;
        if ($this->request->isAJAX()) {
            $brands = "";
            $sub_category = "";
            $quality = "";
            $search = "";
            $rid = $this->request->getpost("rid");
            if (!empty($rid)) {
                $listspecdata = $this->main_model->getQueryRowData(
                    "select c.product_specification , pc.product_category , c.required, lp.category,  ls.* from list_specification ls left join product_category pc on  pc.id = ls.sub_category left join listed_products lp on lp.id = ls.list_id left join product_category c on c.id = lp.category   where ls.id  = '$rid' "
                );

                $specification = $listspecdata["product_specification"];
                if (!empty($listspecdata)) {
                    $return["id"] = $listspecdata;
                    $subcat = $listspecdata["sub_category"];
                    $cat = $listspecdata["category"];
                    if ($subcat != "") {
                        $brands = $this->main_model->getQueryAllData(
                            "select * FROM product where sub_category = $subcat  "
                        );
                        $sub_category = $this->main_model->getQueryAllData(
                            "select * FROM product_category where parentid = $cat  "
                        );
                        $quality = $this->main_model->getQueryAllData(
                            "select * FROM product_quality where sub_category = $subcat  "
                        );
                    } else {
                        $brands = $this->main_model->getQueryAllData(
                            "select * FROM product where product_category = $cat  "
                        );
                        $sub_category = $this->main_model->getQueryAllData(
                            "select * FROM product_category where parentid = $cat  "
                        );
                        $quality = $this->main_model->getQueryAllData(
                            "select * FROM product_quality where product_category = $cat  "
                        );
                    }

                    $return["success"] = true;
                    $return["list"] = $brands;
                    $return["listspecdata"] = $listspecdata;
                    $return["specification"] = $specification;
                    $return["sub_category"] = $sub_category;
                    $return["quality"] = $quality;
                    $return["brand"] = $brands;
                }
            }
            echo json_encode($return, true);
        }
    }
    public function getSizeList()
    {
        $listid = $this->request->getpost("listid");
        $userid = $this->request->getpost("userid");
        $addedby='';
if ($userid != 3) {
   $addedby="and ops.added_by = '$userid'";
}
        $data["requestedsize"] = $this->main_model->getQueryAllData(
            "select ops.id,ops.size,ops.avail_size,ops.quantity, type,ops.gsm,bf  from ordered_product_specification ops left join list_specification ls on ops.product = ls.id  where ops.list_id = '$listid'  $addedby "
        );

        $returnData["success"] = "true";
        $returnData["list"] = $data["requestedsize"];

        echo json_encode($returnData, true);
    }
    public function checkUserListId()
    {
        $id = $this->request->getVar("id");
        $title = $this->request->getVar("title");
        $is_data = $this->main_model->getQueryRowData("SELECT delivery_locations
        FROM listed_products
        WHERE delivery_locations IS NOT NULL AND id=$id");
        if (empty($is_data["delivery_locations"])) {
            // echo 0;
            $res = ["id" => $id, "is_empty" => 0, "title" => $title];
        } else {
            $res = ["id" => $id, "is_empty" => 1, "title" => $title];
        }
        return json_encode($res);
    }
    public function updateofferlimittime()
    {
        $id = $this->request->getVar("offerid");
        $offerlimit = $this->request->getVar("offerlimit");
        $data = ["offerlimit" => $offerlimit];
        $update = $this->main_model->update_table(
            "response",
            $data,
            "id='$id'"
        );
        if ($update) {
            $res = [
                "id" => $id,
                "msg" => "Offer Limit Updated",
                "status" => "true",
            ];
        } else {
            $res = [
                "id" => $id,
                "msg" => "Server Error Try again",
                "status" => "false",
            ];
        }
        return json_encode($res);
    }

    public function updatesizeform()
    {
        $id = $this->request->getVar("sid");
        $size = $this->request->getVar("size");
        $size_uom = $this->request->getVar("size_uom");
        $data = ["size" => $size, "size_uom" => $size_uom];
        $update = $this->main_model->update_table(
            "response_specification",
            $data,
            "id='$id'"
        );
        if ($update) {
            $res = [
                "id" => $id,
                "msg" => "Offer Limit Updated",
                "status" => "true",
            ];
        } else {
            $res = [
                "id" => $id,
                "msg" => "Server Error Try again",
                "status" => "false",
            ];
        }
        return json_encode($res);
    }
    public function avail_size_from()
    {
        $id = $this->request->getVar('id');
        $avail_size= $this->request->getVar('avail_size'); 
        $i=0;
       foreach ($id as $key => $vid) {
           $data['avail_size']=$avail_size[$i];
           $update = $this->main_model->update_table("ordered_product_specification",$data,"id='$vid'"
        );
           
      $i++;
       }
     
    if ($update) {
        $res = [
            "id" => $id,
            "msg" => "Offer Limit Updated",
            "status" => "true",
        ];
    } else {
        $res = [
            "id" => $id,
            "msg" => "Server Error Try again",
            "status" => "false",
        ];
    }
    return json_encode($res);
       
    }
 
public function advancePaymentRequest(){
    $id = $this->request->getVar("id");
    $oid = $this->request->getVar("oid");
    $data['order_rem']='1';
    $update = $this->main_model->update_table( "orders", $data, "id='$oid'" );
    $salerid =  $this->main_model->getRowData('orders', "purchase_id", "list_id = '$id'");
$data_notification['url']="purchase";
$data_notification['added_by'] = $this->memberID  ;
$data_notification['title']="Please Pay your bill";
$data_notification['description']="Payment Reminder message";
$data_notification['added_date'] = $this->currentDate;
$data_notification['notification_for']=$salerid['purchase_id'];
$notification = $this->main_model->insert_table('notification', $data_notification );
if($notification){
$returnData['success']   =   'true';
$returnData['message']   =    'Payment Reminder Send Successfully!';
$returnData['data']      =   '';
return json_encode($returnData);
}
}
public function creditPaymentRequest(){
    $id = $this->request->getVar("id");
    $oid = $this->request->getVar("oid");
    $data['order_rem']='2';
    $update = $this->main_model->update_table( "orders", $data, "id='$oid'" );
    $salerid =  $this->main_model->getRowData('orders', "purchase_id", "list_id = '$id'");
$data_notification['url']="purchase";
$data_notification['added_by'] = $this->memberID  ;
$data_notification['title']="Please Pay your bill";
$data_notification['description']="Payment Reminder message";
$data_notification['added_date'] = $this->currentDate;
$data_notification['notification_for']=$salerid['purchase_id'];
$notification = $this->main_model->insert_table('notification', $data_notification );
if($notification){
$returnData['success']   =   'true';
$returnData['message']   =    'Payment Reminder Send Successfully!';
$returnData['data']      =   '';
return json_encode($returnData);
}
}



public function update_wastpaper_price(){
    $data = $this->request->getVar();
    $id=$data['id']; 
   $result = $this->main_model->update_table("wastpaper_quality ", $data, "id='$id'");
   if($result){
    $returnData['success']   =   'true';
    $returnData['message']   =    'Price Updated!';
    $returnData['data']      =   '';
    return json_encode($returnData);
   }
}
public function apprived_wastepapersale(){
    $id = $this->request->getVar('id'); 
    $data['admin_approved']=0;
    $data1['counterstatus']=1;
   $result = $this->main_model->update_table("listed_products ", $data, "id='$id'");
   $result = $this->main_model->update_table("response ", $data1, "id='$id'");
   if($result){
    $returnData['success']   =   'true';
    $returnData['message']   =    'Price Updated!';
    $returnData['data']      =   '';
    return json_encode($returnData);
   }
}



public function confirmcounterresponse()
{
    $id = $this->request->getpost("id"); 
    $data1['confirm_counter_status']=1;
    $check1 = $this->main_model->update_table(
        "counter_offer",
        $data1,
        "response_id='$id'"
    ); 
    if($check1){
        $response = $this->main_model->getQueryRowData(
            "select list_id from response where id = '$id' "
        );
        $list_id = $response['list_id'];
        $listData = $this->main_model->getQueryRowData(
            "select * from listed_products where id = '$list_id' "
        );
        $usert = $listData['added_by'];
        $user_type = $this->main_model->getQueryRowData(
            "select user_type from users where user_type = '$usert' "
        );
      
        $data_notification["url"] = "";
        $data_notification["added_by"] = $this->memberID;
        $data_notification["title"] = "Counter Accepted by buyer";
        $data_notification["description"] =  "Confirm counter response from user";
        $data_notification["added_date"] = $this->currentDate;
        $data_notification["notification_for_id"] = $listData["added_by"];
        $data_notification["notification_for"] = $user_type["user_type"];
        $notification = $this->main_model->insert_table(
            "notification",
            $data_notification
        );
        $notification;
       
        $returnData["success"] = "true";
        $returnData["message"] = "Wait For Seller's Response";
        $returnData["data"] = "";
        echo json_encode($returnData);
    } 
}
public function getCounterofferresponse()
{
    $responseid = $this->request->getpost("id");
    $counterid = $this->request->getpost("cid");
   
    $responsedata = $this->main_model->getRowData(
        "response",
        "*",
        "id = '$responseid'"
    );
    $counterdata = $this->main_model->getRowData(
        "counter_offer",
        "*",
        "id = '$counterid'"
    );
    // $data['rspecification'] = $this->main_model->getQueryAllData("select ls.*, rs.rate as rrate, rs.quantity as rqty FROM response_specification as rs join list_specification as ls on rs.specification_id = ls.id  where response_id = $responseid and  rs.deleted = '0' ");

    $data["rspecification"] = $this->main_model->getQueryAllData(
        "select co.id as counterid,co.response_counter_status,co.response_crate,co.response_cqty,rs.*, rs.frate as rrate, rs.fquantity as rqty, (select product_name from product where product.id = rs.brand_name) as bname, (select product_category from product_category where product_category.id = rs.sub_category) as cname, co.qty as cqty , co.rate as crate,co.response_crate,co.response_cqty  FROM response_specification as rs left join counter_offer co on rs.id = co.rspecific_id   where rs.response_id = $responseid and  rs.deleted = '0' "
    );

    $specification = $this->main_model->getQueryRowData(
        "select product_category.product_specification from listed_products join response on listed_products.id = response.list_id join  product_category on product_category.id = listed_products.category where response.id  =  '$responseid' "
    );
// $list_id=$responseid['interested_id'];
//     $listData = $this->main_model->getQueryRowData(
//         "select * from listed_products where id = '$list_id' "
//     );
//     $usert = $listData['added_by'];
//     $user_type = $this->main_model->getQueryRowData(
//         "select user_type from users where user_type = '$usert' "
//     );
  
    // $data_notification["url"] = "";
    // $data_notification["added_by"] = $this->memberID;
    // $data_notification["title"] = "Counter Accepted by buyer";
    // $data_notification["description"] =  "Confirm counter response from user";
    // $data_notification["added_date"] = $this->currentDate;
    // $data_notification["notification_for_id"] = $listData["added_by"];
    // $data_notification["notification_for"] = $user_type["user_type"];
    // $notification = $this->main_model->insert_table(
    //     "notification",
    //     $data_notification
    // );
    // $notification;

    $returnData["success"] = "true";
    $returnData["responsedata"] = $responsedata;
    $returnData["counterdata"] = $counterdata;
    $returnData["list"] = $data["rspecification"];
    $returnData["specification"] = $specification["product_specification"];
    echo json_encode($returnData, true);
}

public function confirmcounterresponse_r()
    {
        $id = $this->request->getpost("id"); 
        $data1['confirm_counter_status']=1;
        $check1 = $this->main_model->update_table(
            "counter_offer",
            $data1,
            "response_id='$id'"
        ); 
         $cnt = $this->main_model->getNumRow(
            "response_specification",
            "*",
            "response_id='$id'"
        );
        // print_r($data1);
        if($cnt){
            $data["response_counter_status"] = "1";

            $check = $this->main_model->update_table(
                "response",
                $data,
                "id='$id'"
            );
            if ($check) {
                $response_specification = $this->main_model->getQueryAllData(
                    "select response_id, rspecific_id, qty, rate,response_counter_status,response_cqty,response_crate from counter_offer   where response_id = $id "
                );

                foreach ($response_specification as $value) {
                    $specification_id = $value["rspecific_id"];
                    if ($value['response_counter_status']==1) {
                        $data1["fquantity"] = $value["response_cqty"];
                        $data1["frate"] = $value["response_crate"];
                    }else{
                        $data1["fquantity"] = $value["qty"];
                        $data1["frate"] = $value["rate"]; 
                    }
                    $this->main_model->update_table(
                        "response_specification",
                        $data1,
                        "id='$specification_id' and added_by = '$this->memberID'"
                    );
                }
            }
            $response = $this->main_model->getQueryRowData(
                "select list_id from response where id = '$id' "
            );
            $list_id = $response['list_id'];
            $listData = $this->main_model->getQueryRowData(
                "select * from listed_products where id = '$list_id' "
            );
            $usert = $listData['added_by'];
            $user_type = $this->main_model->getQueryRowData(
                "select user_type from users where user_type = '$usert' "
            );
          
            $data_notification["url"] = "";
            $data_notification["added_by"] = $this->memberID;
            $data_notification["title"] = "Counter Accepted by buyer";
            $data_notification["description"] =  "Confirm counter response from user";
            $data_notification["added_date"] = $this->currentDate;
            $data_notification["notification_for_id"] = $listData["added_by"];
            $data_notification["notification_for"] = $user_type["user_type"];
            $notification = $this->main_model->insert_table(
                "notification",
                $data_notification
            );
            $notification;
           
            $returnData["success"] = "true";
            $returnData["message"] = "Wait For Seller's Response";
            $returnData["data"] = "";
            echo json_encode($returnData);
        } 
    }

public function submitCounterofferResponse()
{
    $counterid = $this->request->getpost("counterid");
    $rqty = $this->request->getpost("rcqty");
    $rrate = $this->request->getpost("rcrate"); 
    $rlistid = $this->request->getpost("rlistid"); 
    $responseid = $this->request->getpost("responseid"); 

    for ($i=0; $i < count($counterid); $i++) { 
        $data['fquantity'] = $rqty[$i];
        $data['frate'] = $rrate[$i];
        $responseid = $responseid;
        $data1['response_counter_status'] = 1;
        $data1['response_cqty'] = $rqty[$i];
        $data1['response_crate'] = $rrate[$i];
        $id = $counterid[$i]; 
        $check1 = $this->main_model->update_table(
                "counter_offer",
                $data1,
                "id='$id'"
            ); 
            
        $check2 = $this->main_model->update_table(
                "response_specification",
                $data,
                "response_id='$responseid'"
            ); 
    }
    // print_r($data1)
    if($check1){
      $userid=  $this->main_model->getRowData("listed_products", "added_by", "id = '$rlistid'");
      $usert = $userid['added_by'];
      $user_type=  $this->main_model->getRowData("users", "user_type", "id = '$usert'");
        $notification['title']                = 'Counter Response from Seller' ;
        $notification['description']          = 'Counter Response from seller side ' ;
        $notification['url']                  = 'view-list/'.$rlistid ;
        $notification['added_by']             = $this->memberID ;
        $notification['notification_for_id']     = $userid['added_by'];
        $notification['notification_for']     = $user_type['user_type'];
        $notification['added_date']           = $this->currentDate; 
        $this->main_model->insert_table('notification', $notification);

        $location = base_url()."/send-listresponse/".$rlistid; 
        return redirect()->to($location); 

    } 
}



    


}
