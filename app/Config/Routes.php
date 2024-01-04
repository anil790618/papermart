<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// filter Auth not login
// filter Authenticate is login
//*****************************************************************************************************//
//                                            UserController                                           //
//*****************************************************************************************************//

$routes->get('/', 'UserController::index');
$routes->match(['get','post'],'register','UserController::register',['filter' => 'isAuthenticLoginIn']);
$routes->match(['get','post'],'login', 'UserController::reglogin',['filter' => 'isAuthenticLoginIn']);
$routes->match(['get','post'],'reglogin', 'UserController::reglogin',['filter' => 'isAuthenticLoginIn']);
$routes->match(['get','post'],'get-plogin', 'UserController::plogin',['filter' => 'isAuthenticLoginIn']);
$routes->get('logout', 'UserController::logout');

$routes->match(['get','post'],'dashboard', 'UserController::dashboard',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'usersidebar', 'UserController::userSidebar',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-dashboard', 'UserController::getDashboard',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'register-submit-one','UserController::registerSubmitOne',['filter' => 'isAuthenticLoginIn']);
$routes->match(['get','post'],'register-submit-two','UserController::registerSubmitTwo',['filter' => 'isAuthenticLoginIn']);
$routes->match(['get','post'],'register-submit-three','UserController::registerSubmitThree',['filter' => 'isAuthenticLoginIn']);



$routes->match(['get','post'],'workprofile', 'UserController::workprofile',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-workprofile', 'UserController::getWorkprofile',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'get-userworkprofile', 'UserController::getuserworkprofile',['filter' => 'isAuthenticNotLogin']);


$routes->match(['get','post'],'profile', 'UserController::profile',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-profile', 'UserController::getprofile',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'editProfile', 'UserController::editprofile',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-editProfile', 'UserController::geteditProfile',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'rating', 'UserController::rating',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-rating', 'UserController::getRating',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'contact', 'UserController::contact',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-contact', 'UserController::getContact',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'about', 'UserController::about',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-about', 'UserController::getAbout',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'reset-password', 'UserController::resetPassword',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'staff', 'UserController::staff',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-staff', 'UserController::getStaff',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'add-staff', 'UserController::addStaff',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-add-staff', 'UserController::getAddStaff',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'submit-staff', 'UserController::submitStaff',['filter' => 'isAuthenticNotLogin']);

//*****************************************************************************************************//
//                                       Customer Controller                                           //
//*****************************************************************************************************//

$routes->match(['get','post'],'customer','CustomerController::customer',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-customer','CustomerController::getCustomer',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'add-customer', 'CustomerController::addCustomer',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'update-customer/(:num)', 'CustomerController::updateCustomer/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-update-customer/(:num)', 'CustomerController::getUpdateCustomer/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'submit-updateCustomer', 'CustomerController::submitUpdateCustomer',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'delete-customer', 'CustomerController::deleteCustomer',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'customer-statusupdate', 'CustomerController::customerStatusupdate',['filter' => 'isAuthenticNotLogin']);


//*****************************************************************************************************//
//                                       Product Controller                                            //
//*****************************************************************************************************//

$routes->match(['get'],'productcat/(:num)','ProductController::productcat/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-productcat/(:num)','ProductController::getProductcat/$1',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get'],'product/(:num)','ProductController::product/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-product/(:num)','ProductController::getProduct/$1',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get'],'product-stock','ProductController::productStock',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-product-stock','ProductController::getProductStock',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get'],'categoryproduct','ProductController::categoryProduct',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-categoryproduct','ProductController::getcategoryProduct',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get'],'add-category','ProductController::addCategory',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-add-category','ProductController::getAddCategory',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get'],'add-products','ProductController::addProduct',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-add-products','ProductController::getAddProduct',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'submit-product','ProductController::submitProduct',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get'],'product-type','ProductController::productType',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-product-type','ProductController::getProductType',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'submit-productType','ProductController::submitProductType',['filter' => 'isAuthenticNotLogin']);


$routes->match(['get'],'product-category','ProductController::productCategory',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-product-category','ProductController::getProductCategory',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'submit-productCategory','ProductController::submitProductCategory',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-pcat','ProductController::getPcat',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'update-productCategory','ProductController::updateProductCategory',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-subcat','ProductController::getSubcat',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'add-subCategory','ProductController::addsubCategory',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'update-subCategory','ProductController::updatesubCategory',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'delete-productcategory','ProductController::deleteProductCategory',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'product-quality','ProductController::productQuality',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-product-quality','ProductController::getProductQuality',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'submit-productQuality','ProductController::submitProductQuality',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-pquality','ProductController::getPquality',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'update-productQuality','ProductController::updateProductQuality',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'edit-product/(:num)','ProductController::editProduct/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-edit-product/(:num)','ProductController::getEditProduct/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'update-product','ProductController::updateProduct',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'delete-product','ProductController::deleteProduct',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'view-product/(:num)','ProductController::viewProduct/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-view-product/(:num)','ProductController::getViewProduct/$1',['filter' => 'isAuthenticNotLogin']);


$routes->match(['get','post'],'get-qualityspec','ProductController::getqualityspec',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-pdata','ProductController::getpdata',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-searchbycategory','ProductController::getSearchByCategory',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-millspecification/(:num)','ProductController::getMillspecification/$1',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'get-filterproductcat','ProductController::getFilterproductcat',['filter' => 'isAuthenticNotLogin']);



//*****************************************************************************************************//
//                                       Vehicle Controller                                            //
//*****************************************************************************************************//

$routes->match(['get','post'],'vehicle','VehicleController::vehicle',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-vehicle','VehicleController::getVehicle',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'add-vehicle','VehicleController::addVehicle',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-add-vehicle','VehicleController::getAddVehicle',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'submit-vehicle','VehicleController::submitVehicle',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'edit-vehicle/(:num)','VehicleController::editVehicle/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-edit-vehicle/(:num)','VehicleController::getEditVehicle/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'update-vehicle','VehicleController::updateVehicle',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'send-vehiclerequest','VehicleController::sendVehicleRequest',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'check-size-location','VehicleController::check_size_location',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'generate-vehiclerequest','VehicleController::generateVehicleRequest',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'get-transportRateList','VehicleController::getTransportRateList',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'get-trrate','VehicleController::getTrrate',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'send-transportrequestrate','VehicleController::sendTransportRequestRate',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'confirmtr-rate','VehicleController::confirmTrRate',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'rejecttr-rate','VehicleController::rejectTrRate',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'update-vehicledelivery','VehicleController::updateVehicleDelivery',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'get-ordertracking','VehicleController::getOrdertracking',['filter' => 'isAuthenticNotLogin']);

//*****************************************************************************************************//
//                                       transporter vehicle allocation Controller                     //
//*****************************************************************************************************//

$routes->match(['get','post'],'orderbooklist','VehicleController::orderBooklist',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-orderbooklist','VehicleController::getOrderBooklist',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'update-transportrequest','VehicleController::updateTransportrequest',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'alotedbooklist','VehicleController::alotedbooklist',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-alotedbooklist','VehicleController::getalotedbooklist',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'sendtopickup','VehicleController::sendtopickup',['filter' => 'isAuthenticNotLogin']);


//*****************************************************************************************************//
//                                       Purchase Controller                                           //
//*****************************************************************************************************//

$routes->match(['get','post'],'purchase','PurchaseController::purchase',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-purchase','PurchaseController::getPurchase',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'add-purchase','PurchaseController::addPurchase',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-add-purchase','PurchaseController::getAddPurchase',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'submit-purchase','PurchaseController::submitPurchase',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'submit-credit','PurchaseController::submitCredit',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'get-clients','PurchaseController::getClient',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-vehicles','PurchaseController::getVehicle',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-searchproducts','PurchaseController::getSearchProducts',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'get-paydata','PurchaseController::getPaydata',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'submit-payment','PurchaseController::submitPayment',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'transactionhistory','PurchaseController::transactionhistory',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-transactionhistory','PurchaseController::getTransactionhistory',['filter' => 'isAuthenticNotLogin']);


$routes->match(['get','post'],'get-orderspecification','PurchaseController::getOrderspecification',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'submit-orderspecification','PurchaseController::submitOrderspecification',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'send-orderspecification','PurchaseController::sendOrderspecification',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'receive-orderspecification','PurchaseController::receiveOrderspecification',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'guard','PurchaseController::guard',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-guard','PurchaseController::getGuard',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'qc','PurchaseController::qc',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-qc','PurchaseController::getqc',['filter' => 'isAuthenticNotLogin']);


$routes->match(['get','post'],'purchaseinvoice/(:num)','PurchaseController::purchaseinvoice/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-purchaseinvoice/(:num)','PurchaseController::getPurchaseInvoice/$1',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'packingslip/(:num)','PurchaseController::packingslip/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-packingslip/(:num)','PurchaseController::getpackingslip/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-creditdata/(:num)','PurchaseController::getCreditdata/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'Check-sizespecification','PurchaseController::Check_sizespecification',['filter' => 'isAuthenticNotLogin']);




//*****************************************************************************************************//
//                                       Vendor Controller                                             //
//*****************************************************************************************************//

$routes->match(['get','post'],'vendor','VendorController::vendor',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-vendor','VendorController::getVendor',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'sauda','SaudaController::sauda',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-sauda','SaudaController::getsauda',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'wastepaper','WastepaperController::wastepaper',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-wastepaper','WastepaperController::getwastepaper',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'add-vendor','VendorController::addVendor',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-add-vendor','VendorController::getAddVendor',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'submit-vendor','VendorController::submitVendor',['filter' => 'isAuthenticNotLogin']);


//*****************************************************************************************************//
//                                        List Controller                                              //
//*****************************************************************************************************//

$routes->match(['get','post'],'list','ListController::list',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-list','ListController::getList',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'interestlist','ListController::interestlist',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-interestlist','ListController::getInterestList',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'decklelist','ListController::decklelist',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-decklelist','ListController::getDeckleList',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'complain','ListController::Complain',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-complain','ListController::getComplain',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'add-list','ListController::addList',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-add-list','ListController::getAddList',['filter' => 'isAuthenticNotLogin']);


$routes->match(['get','post'],'add-decklelist','ListController::addDeckleList',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-add-decklelist','ListController::getAddDeckleList',['filter' => 'isAuthenticNotLogin']);


$routes->match(['get','post'],'submit-list','ListController::submitList',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'update_wastpaper_price','ListController::update_wastpaper_price',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'apprived_wastepapersale','ListController::apprived_wastepapersale',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'view-listproduct/(:num)','ListController::viewListProduct/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-view-listproduct/(:num)','ListController::getViewListProduct/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'check-upload-list/(:num)','ListController::checkuploadlist/$1',['filter' => 'isAuthenticNotLogin']);

// $routes->match(['get','post'],'view-listresponse/(:num)','ListController::viewListResponse/$1',['filter' => 'isAuthenticNotLogin']);
// $routes->match(['get','post'],'get-view-listresponse/(:num)','ListController::getviewListResponse/$1',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'view-list/(:num)','ListController::viewList/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-view-list/(:num)','ListController::getViewList/$1',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'add-response','ListController::addResponse',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'response','ListController::response',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-response','ListController::getResponse',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'send-listresponse/(:num)','ListController::sendListResponse/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-send-listresponse/(:num)','ListController::getSendListResponse/$1',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'submit-response','ListController::submitResponse',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'approve-list','ListController::approveList',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'reject-response','ListController::rejectResponse',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'userlist','ListController::userList',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-userlist','ListController::getUserList',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'checkUserListId','ListController::checkUserListId',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'confirmsaleresponse/(:num)','ListController::confirmSaleResponse/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-confirmsaleresponse/(:num)','ListController::getConfirmSaleResponse/$1',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'get-counterconfrimresponse/(:num)','ListController::getcounterconfrimresponse/$1',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'confirmpurchaseresponse/(:num)','ListController::confirmPurchaseResponse/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-confirmpurchaseresponse/(:num)','ListController::getConfirmPurchaseResponse/$1',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'advancePaymentRequest/(:num)','ListController::advancePaymentRequest/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'creditPaymentRequest','ListController::creditPaymentRequest',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'get-counteroffer','ListController::getCounteroffer',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'submit-counteroffer','ListController::submitCounteroffer',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'approve-counteroffer','ListController::approveCounteroffer',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'reject-counteroffer','ListController::rejectCounteroffer',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'cancel-listresponse','ListController::cancelListresponse',['filter' => 'isAuthenticNotLogin']);


$routes->match(['get','post'],'interest','ListController::interest',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-interest','ListController::getInterest',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'submit-response_location_terms','ListController::submit_response_location_terms',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'ordercat/(:num)/(:num)/(:num)','ListController::ordercat/$1/$2/$3',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-ordercat/(:num)/(:num)/(:num)','ListController::getOrdercat/$1/$2/$3',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-responsespecification','ListController::getResponsespecification',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-responsedata','ListController::getResponsedata',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'get-sizelist','ListController::getSizeList',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'updateofferlimittime','ListController::updateofferlimittime',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'updatesizeform','ListController::updatesizeform',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'avail_size_from','ListController::avail_size_from',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'get-counterofferresponse','ListController::getCounterofferresponse',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'submit-counteroffer_response','ListController::submitCounterofferResponse',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'confirmcounterresponse','ListController::confirmcounterresponse',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'confirmcounterresponse_r','ListController::confirmcounterresponse_r',['filter' => 'isAuthenticNotLogin']);
//*****************************************************************************************************//
//                                       SALE Controller                                               //
//*****************************************************************************************************//

$routes->match(['get','post'],'sale','SaleController::sale',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-sale','SaleController::getSale',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'add-sale','SaleController::addSale',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-add-sale','SaleController::getAddSale',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'submit-sale','SaleController::submitSale',['filter' => 'isAuthenticNotLogin']);

// $routes->match(['get','post'],'submit-counteroffer','SaleController::submitCounteroffer',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'get-paymentdata','SaleController::getPaymentdata',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'confirm-sale','SaleController::confirmSale',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'saleinvoice/(:num)','SaleController::saleinvoice/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-saleinvoice/(:num)','SaleController::getSaleInvoice/$1',['filter' => 'isAuthenticNotLogin']);


//*****************************************************************************************************//
//                                       Jobs Controller                                             //
//*****************************************************************************************************//

$routes->match(['get','post'],'job','JobController::job',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-job','JobController::getJob',['filter' => 'isAuthenticNotLogin']);


$routes->match(['get','post'],'submit-job','JobController::submitJob',['filter' => 'isAuthenticNotLogin']);


$routes->match(['get','post'],'get-jobdata','JobController::getJobData',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'update-job','JobController::updateJob',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'delete-job','JobController::deleteJob',['filter' => 'isAuthenticNotLogin']);


//*****************************************************************************************************//
//                                       Rates Controller                                             //
//*****************************************************************************************************//

$routes->match(['get','post'],'rates','RateController::rates',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-rates','RateController::getRates',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'postrate','RateController::postrate',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-postrate','RateController::getPostrate',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'submit-rates','RateController::submitRate',['filter' => 'isAuthenticNotLogin']);


$routes->match(['get','post'],'get-ratedata','RateController::getRateData',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'update-rate','RateController::updateRate',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'delete-rate','RateController::deleteRate',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'viewpostrate/(:num)','RateController::viewPostrate/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-viewpostrate/(:num)','RateController::getViewPostrate/$1',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'postedrates','RateController::postedRates',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-postedrates','RateController::getPostedRates',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'confirmsalerate/(:num)','RateController::confirmSaleRate/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-confirmsalerate/(:num)','RateController::getConfirmSaleRate/$1',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'confirmpurchaserate/(:num)','RateController::confirmPurchaseRate/$1',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-confirmpurchaserate/(:num)','RateController::getConfirmPurchaseRate/$1',['filter' => 'isAuthenticNotLogin']);

//*****************************************************************************************************//
//                                       LAB Controller                                             //
//*****************************************************************************************************//


$routes->match(['get','post'],'labservice','LabController::labservice',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-labservice','LabController::getLabservice',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'submit-labservice','LabController::submitLabService',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'get-labservicedata','LabController::getLabserviceData',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'update-labservice','LabController::updateLabservice',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'delete-labservice','LabController::deleteLabservice',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'book-labservice','LabController::bookLabService',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'mylabbooking','LabController::myLabBooking',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-mylabbooking','LabController::getMyLabBooking',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'cancel-labservice','LabController::cancelLabservice',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'allbooking','LabController::allBooking',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'get-allbooking','LabController::getAllBooking',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'confirm-labservice','LabController::confirmLabservice',['filter' => 'isAuthenticNotLogin']);

$routes->match(['get','post'],'complainResponse','ComplainController::complainResponse',['filter' => 'isAuthenticNotLogin']);
$routes->match(['get','post'],'complainResolve','ComplainController::complainResolve',['filter' => 'isAuthenticNotLogin']);





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
