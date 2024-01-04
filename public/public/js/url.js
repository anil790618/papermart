var pageLoader =
  '<div id="preloader"><div class="sk-three-bounce"> <div class="sk-child sk-bounce1"></div><div class="sk-child sk-bounce2"></div>  <div class="sk-child sk-bounce3"></div> </div> </div>';

var currentUrl = window.location.href;
var urlData = currentUrl.replace(base_url, "");

var pageID = "";
var urlAddon = "";
var pageName = "";
secondParameter = "";
thirdParameter = "";
urlAddon1 = "";
urlAddon2 = "";

if (urlData == "") {
  pageName = "dashboard";
} else {
  var urlDataArr = urlData.split("/");
  if (urlDataArr.length == 1) {
    pageName = urlDataArr;
  } else if (urlDataArr.length == 2) {
    pageName = urlDataArr[0];
    pageID = urlDataArr[1];
  } else if (urlDataArr.length == 3) {
    pageName = urlDataArr[0];
    pageID = urlDataArr[1];
    secondParameter = urlDataArr[2];
  } else if (urlDataArr.length == 4) {
    pageName = urlDataArr[0];
    pageID = urlDataArr[1];
    secondParameter = urlDataArr[2];
    thirdParameter = urlDataArr[3];
  }
}

if (pageID != "") {
  var urlAddon = "/" + pageID;
}

if (secondParameter != "") {
  var urlAddon1 = "/" + secondParameter;
}

if (thirdParameter != "") {
  var urlAddon2 = "/" + thirdParameter;
}

// default page load
$(document).ready(function () {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-" + pageName + urlAddon + urlAddon1 + urlAddon2,
    { page: pageName },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
});

// ======================================================
// ======================================================

$(document).ready(function () {
  toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: false,
    positionClass: "toast-bottom-right",
    preventDuplicates: false,
    showDuration: "1000",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
  };
});

function changeURL(newUrl, title) {
  window.history.pushState("data", title, newUrl);
  document.title = title;
}

// ======================================================
// Dashboard Code
// ======================================================

$(document).on("click", ".nav-dashboard", function () {
  var utype = $(this).attr("utype");
  var status = $(this).attr("tag");
  var newUrl = base_url + "dashboard";
  changeURL(newUrl, "Paper Dashboard");

  getDashboard(status, utype);
});

function getDashboard(status, utype) {
  if (status == 1) {
    $(".resnavbar").html(
      '<a href="javascript:void(0);" class=" size-7 p-0 ">Seller Dashboard </a>'
    );
    $(".reslocation").removeClass("nav-purchase");
    $(".reslocation").addClass("nav-sale");

    $(".dashtext").html("Seller Dashboard");
    $(".dash1").css("display", "none");
    $(".dash0").css("display", "");
    $(".dash2").css("display", "");
  }
  if (status == 2) {
    $(".resnavbar").html(
      '<a href="javascript:void(0);" class=" size-7  p-0 "> Buyer Dashboard </a>'
    );
    $(".reslocation").removeClass("nav-sale");
    $(".reslocation").addClass("nav-purchase");

    $(".dashtext").html("Buyer Dashboard");
    $(".dash1").css("display", "");
    $(".dash0").css("display", "");
    $(".dash2").css("display", "none");
  }
  if (status == 0) {
    $(".resnavbar").html(
      '<a href="javascript:void(0);" class=" size-7  p-0 "> Main Dashboard </a>'
    );

    $(".dashtext").html("Main Dashboard");
    $(".dash1").css("display", "");
    $(".dash0").css("display", "none");
    $(".dash2").css("display", "");
  }
  if (utype == 4) {
    $(".dash2").css("display", "none");
  }

  if (status >= 0) {
    $.post(base_url + "usersidebar", { status: status }, function (data) {
      $(".userSidebar").html(data);
      $(".page-content-area").html(pageLoader);
      $.post(base_url + "get-dashboard", { page: "dashboard" }, function (
        data
      ) {
        $(".page-content-area").html(data);
      });
    });
  } else {
    $(".page-content-area").html(pageLoader);
    $.post(base_url + "get-dashboard", { page: "dashboard" }, function (data) {
      $(".page-content-area").html(data);
    });
  }
}

// ======================================================
// Customer Code
// ======================================================
$(document).on("click", ".nav-customer", function () {
  var newUrl = base_url + "customer";
  changeURL(newUrl, "Paper Customer");
  getCustomer();
});

function getCustomer() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-customer", { page: "customer" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".updateCustomer", function () {
  var id = $(this).attr("tag");
  var newUrl = base_url + "update-customer/" + id;
  changeURL(newUrl, "Paper Update Customer");
  getUpdateCustomer(id);
});

function getUpdateCustomer(id) {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-update-customer/" + id,
    { page: "update-customer" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

// ======================================================
// Product Code
// ======================================================

$(document).on("click", ".nav-product", function () {
  var id = $(this).attr("tag") || "";
  var mproduct = $(this).attr("self") || 0;
  var newUrl = base_url + "product/" + mproduct;
  changeURL(newUrl, "Paper Product");
  getProduct(id, mproduct);
});
function getProduct(id, mproduct) {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-product/" + mproduct,
    { page: "product", cid: id, mproduct: mproduct },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

$(document).on("click", ".productcat", function () {
  var id = $(this).attr("tag");

  var newUrl = base_url + "productcat/" + id;
  changeURL(newUrl, "Paper Product");
  getProductcat(id);
});
function getProductcat(id) {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-productcat/" + id, { page: "product" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-productCategory", function () {
  var newUrl = base_url + "categoryproduct";
  changeURL(newUrl, "Paper Product");
  getCategoryProduct();
});
function getCategoryProduct() {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-categoryproduct",
    { page: "categoryproduct" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

$(document).on("click", ".addCategory", function () {
  var newUrl = base_url + "add-category";
  changeURL(newUrl, "Paper Product Category");
  getAddCategory();
});
function getAddCategory() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-add-category", { page: "add-category" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-stock", function () {
  var newUrl = base_url + "product-stock";
  changeURL(newUrl, "Paper Product Stock");
  getProductStock();
});
function getProductStock() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-product-stock", { page: "product-stock" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".add-product", function () {
  var newUrl = base_url + "add-products";
  changeURL(newUrl, "Paper Add Product ");
  getAddProduct();
});
function getAddProduct() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-add-products", { page: "add-products" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-product-type", function () {
  var newUrl = base_url + "product-type";
  changeURL(newUrl, "Paper Product Type");
  getProductType();
});
function getProductType() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-product-type", { page: "product-type" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-product-category", function () {
  var newUrl = base_url + "product-category";
  changeURL(newUrl, "Paper Product Category");
  getProductCategory();
});
function getProductCategory() {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-product-category",
    { page: "product-category" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

$(document).on("click", ".nav-product-quality", function () {
  var newUrl = base_url + "product-quality";
  changeURL(newUrl, "Paper Product Quality");
  getProductQuality();
});
function getProductQuality() {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-product-quality",
    { page: "product-quality" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

$(document).on("click", ".editProduct", function () {
  var id = $(this).attr("tag");
  var newUrl = base_url + "edit-product/" + id;
  changeURL(newUrl, "Paper Edit Product");
  getEditProduct(id);
});

function getEditProduct(id) {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-edit-product/" + id,
    { page: "edit-product" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

$(document).on("click", ".viewProduct", function () {
  var id = $(this).attr("tag");
  var newUrl = base_url + "view-product/" + id;
  changeURL(newUrl, "Paper View Product");
  getViewProduct(id);
});

function getViewProduct(id) {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-view-product/" + id,
    { page: "view-product" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

// ======================================================
// Vehicle Code
// ======================================================

$(document).on("click", ".nav-vehicle", function () {
  var newUrl = base_url + "vehicle";
  changeURL(newUrl, "Paper Product Quality");
  getVehicle();
});
function getVehicle() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-vehicle", { page: "vehicle" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".addVehicle", function () {
  var newUrl = base_url + "add-vehicle";
  changeURL(newUrl, "Vehicle");
  getAddVehicle();
});
function getAddVehicle() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-add-vehicle", { page: "add-vehicle" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".editVehicle", function () {
  var id = $(this).attr("tag");
  var newUrl = base_url + "edit-vehicle/" + id;
  changeURL(newUrl, "Vehicle");
  getEditVehicle(id);
});
function getEditVehicle(id) {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-edit-vehicle/" + id,
    { page: "edit-vehicle" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

// ======================================================
// Purchase Code
// ======================================================

$(document).on("click", ".nav-purchase", function () {
  var newUrl = base_url + "purchase";
  changeURL(newUrl, "Paper Purchase");
  getPurchase();
});
function getPurchase() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-purchase", { page: "purchase" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".addPurchase", function () {
  var newUrl = base_url + "add-purchase";
  changeURL(newUrl, "purchase");
  getAddPurchase();
});
function getAddPurchase() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-add-purchase", { page: "add-purchase" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-guard", function () {
  var newUrl = base_url + "guard";
  changeURL(newUrl, "Paper Guard");
  getGuard();
});
function getGuard() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-guard", { page: "guard" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-qc", function () {
  var newUrl = base_url + "qc";
  changeURL(newUrl, "Paper Quality Control");
  getqc();
});
function getqc() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-qc", { page: "qc" }, function (data) {
    $(".page-content-area").html(data);
  });
}

// ======================================================
// Vendor Code
// ======================================================

$(document).on("click", ".nav-vendor", function () {
  var newUrl = base_url + "vendor";
  changeURL(newUrl, "Paper Vendor");
  getVendor();
});
function getVendor() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-vendor", { page: "vendor" }, function (data) {
    $(".page-content-area").html(data);
  });
}
$(document).on("click", ".nav-sauda", function () {
  var newUrl = base_url + "sauda";
  changeURL(newUrl, "Paper sauda");
  getsauda();
});
function getsauda() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-sauda", { page: "sauda" }, function (data) {
    $(".page-content-area").html(data);
  });
}
$(document).on("click", ".nav-wastepaper", function () {
  var newUrl = base_url + "wastepaper";
  changeURL(newUrl, "Paper wastepaper");
  getwastepaper();
});
function getwastepaper() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-wastepaper", { page: "wastepaper" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".addVendor", function () {
  var newUrl = base_url + "add-vendor";
  changeURL(newUrl, "Paper Vendor");
  getAddVendor();
});
function getAddVendor() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-add-vendor", { page: "add-vendor" }, function (data) {
    $(".page-content-area").html(data);
  });
}

// ======================================================
// List Code
// ======================================================

$(document).on("click", ".nav-list", function () {
  var newUrl = base_url + "list";
  changeURL(newUrl, "Paper List");
  getList();
});
function getList() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-list", { page: "list" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-interestlist", function () {
  var newUrl = base_url + "interestlist";
  changeURL(newUrl, "Paper List");
  getInterestList();
});
function getInterestList() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-interestlist", { page: "interestlist" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-decklelist", function () {
  var newUrl = base_url + "decklelist";
  changeURL(newUrl, "Paper List");
  getDeckleList();
});
function getDeckleList() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-decklelist", { page: "decklelist" }, function (data) {
    $(".page-content-area").html(data);
  });
}
$(document).on("click", ".nav-complain", function () {
  var newUrl = base_url + "complain";
  changeURL(newUrl, "Paper List");
  getComplain();
});
function getComplain() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-complain", { page: "complain" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".addlist", function () {
  var newUrl = base_url + "add-list";
  changeURL(newUrl, "Paper List");
  getAddList();
});
function getAddList() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-add-list", { page: "add-list" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".adddecklelist", function () {
  var newUrl = base_url + "add-decklelist";
  changeURL(newUrl, "Paper List");
  getAddDeckleList();
});
function getAddDeckleList() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-add-decklelist", { page: "add-decklelist" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

// $(document).on('click', '.viewListedProduct', function () {
//    var id = $(this).attr('tag');
//    var newUrl = base_url + "view-listproduct/" + id;
//    changeURL(newUrl, "Paper View List Product");
//    getViewListProduct(id);

// });

function getViewListProduct(id) {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-view-listproduct/" + id,
    { page: "view-listproduct" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

$(document).on("click", ".viewList", function () {
  var id = $(this).attr("tag");
  // alert(id);
  var newUrl = base_url + "view-list/" + id;
  changeURL(newUrl, "Paper View List ");
  getViewList(id);
});

function getViewList(id) {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-view-list/" + id, { page: "view-list" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-response", function () {
  var newUrl = base_url + "response";
  changeURL(newUrl, "Paper Response");
  getResponse();
});
function getResponse() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-response", { page: "response" }, function (data) {
    $(".page-content-area").html(data);
  });
}

// $(document).on('click', '.sendListResponse', function () {
//    const checkedValue = getCheckedValues();
//    var checkedValues = '"'+checkedValue+'"';
//    var id = $(this).attr('tag');
//    var newUrl = base_url + "send-listresponse/" + id;
//    changeURL(newUrl, "Paper Send List Response");
//    getSendListResponse(id, checkedValues);

// });

function getSendListResponse(id, checkedValues) {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-send-listresponse/" + id,
    { page: "send-listresponse", checkedValues: checkedValues },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

function getCheckedValues() {
  const checkboxes = document.getElementsByName("checked[]");
  const checkedValues = [];

  for (let i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      checkedValues.push(checkboxes[i].value);
    }
  }

  return checkedValues;
}

$(document).on("click", ".nav-userlist", function () {
  var newUrl = base_url + "userlist";
  changeURL(newUrl, "Paper List");
  getUserList();
});
function getUserList() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-userlist", { page: "userlist" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-interests", function () {
  var newUrl = base_url + "interest";
  changeURL(newUrl, "Paper Interests");
  getInterests();
});
function getInterests() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-interest", { page: "interest" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".confirmSaleResponse", function () {
  var id = $(this).attr("tag");
  swal({
    title: "Are You Sure !!",
    text: "You want to Conform Sale !!",
    type: "info",
    showCancelButton: !0,
    closeOnConfirm: !1,
    showLoaderOnConfirm: !0,
  }).then((result) => {
    if (result.value) {
      var newUrl = base_url + "confirmsaleresponse/"+id;
      changeURL(newUrl, "Paper Confirm Response");
      getConfirmSaleResponse(id);
    }
  });
});

function getConfirmSaleResponse(id) {
  // alert(id)
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-confirmsaleresponse/"+id,
    { page: "confirmsaleresponse" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

$(document).on("click", ".confirmPurchaseResponse", function () {
  var id = $(this).attr("tag");
  var newUrl = base_url + "confirmpurchaseresponse/" + id;
  changeURL(newUrl, "Paper Confirm Response");
  getConfirmPurchaseResponse(id);
});

function getConfirmPurchaseResponse(id) {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-confirmpurchaseresponse/" + id,
    { page: "confirmpurchaseresponse" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}
// ======================================================
// Profile Code
// ======================================================

$(document).on("click", ".nav-workprofile", function () {
  $(".close").trigger("click");

  var newUrl = base_url + "workprofile";
  changeURL(newUrl, "Paper workprofile");
  getWorkprofile();
});
function getWorkprofile() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-workprofile", { page: "workprofile" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".edit-profile", function () {
  $(".close").trigger("click");
  var newUrl = base_url + "editProfile";
  changeURL(newUrl, "Paper profile");
  geteditprofile();
});
function geteditprofile() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-editProfile", { page: "profile" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-profile", function () {
  $(".close").trigger("click");
  var newUrl = base_url + "profile";
  changeURL(newUrl, "Paper profile");
  getprofile();
});
function getprofile() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-profile", { page: "profile" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-staff", function () {
  $(".close").trigger("click");
  var newUrl = base_url + "staff";
  changeURL(newUrl, "Paper staff");
  getStaff();
});
function getStaff() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-staff", { page: "staff" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".addStaff", function () {
  $(".close").trigger("click");
  var newUrl = base_url + "add-staff";
  changeURL(newUrl, "Paper staff");
  getAddStaff();
});
function getAddStaff() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-add-staff", { page: "add-staff" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-rating", function () {
  $(".close").trigger("click");
  var newUrl = base_url + "rating";
  changeURL(newUrl, "Paper rating");
  getRating();
});
function getRating() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-rating", { page: "rating" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-contact", function () {
  $(".close").trigger("click");
  var newUrl = base_url + "contact";
  changeURL(newUrl, "Paper contact");
  getContact();
});
function getContact() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-contact", { page: "contact" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-about", function () {
  $(".close").trigger("click");
  var newUrl = base_url + "about";
  changeURL(newUrl, "Paper about");
  getAbout();
});
function getAbout() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-about", { page: "about" }, function (data) {
    $(".page-content-area").html(data);
  });
}

// ======================================================
// Sale Code
// ======================================================

$(document).on("click", ".nav-sale", function () {
  var newUrl = base_url + "sale";
  changeURL(newUrl, "Paper sale");
  getSale();
});
function getSale() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-sale", { page: "sale" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".addsale", function () {
  var newUrl = base_url + "add-sale";
  changeURL(newUrl, "sale");
  getAddsale();
});
function getAddsale() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-add-sale", { page: "add-sale" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-ordercat", function () {
  debugger;
  var id = $(this).attr("tag");
  var parent = $(this).attr("parent");
  var otype = $(this).attr("otype");
  var pid = $(this).attr("pid");
  var newUrl = base_url + "ordercat/" + id + "/" + parent + "/" + pid;
  changeURL(newUrl, "Order");
  getOrdercat(id, parent, otype, pid);
});
function getOrdercat(id, parent, otype, pid) {
  if (otype == 1) {
    $(".resnavbar").html(
      '<a href="javascript:void(0);" class=" size-7  p-0 " tag="2">Seller Dashboard </a>'
    );
    $(".reslocation").removeClass("nav-purchase");
    $(".reslocation").addClass("nav-sale");
  }
  if (otype == 2) {
    $(".resnavbar").html(
      '<a href="javascript:void(0);" class=" size-7  p-0 " tag="1">Buyer  Dashboard </a>'
    );
    $(".reslocation").removeClass("nav-sale");
    $(".reslocation").addClass("nav-purchase");
  }
  if (otype >= 0) {
    $.post(base_url + "usersidebar", { status: otype }, function (data) {
      $(".userSidebar").html(data);
      $(".page-content-area").html(pageLoader);
      $.post(
        base_url + "get-ordercat/" + id + "/" + parent + "/" + pid,
        { page: "ordercat", otype: otype },
        function (data) {
          $(".page-content-area").html(data);
        }
      );
    });
  } else {
    $(".page-content-area").html(pageLoader);
    $.post(
      base_url + "get-ordercat/" + id + "/" + parent + "/" + pid,
      { page: "ordercat", otype: otype },
      function (data) {
        $(".page-content-area").html(data);
      }
    );
  }
}

$(document).on("click", ".viewSaleInvoice", function () {
  var id = $(this).attr("tag");
  var newUrl = base_url + "saleinvoice/" + id;
  changeURL(newUrl, "Paper sale invoice");
  getSaleInvoice(id);
});
function getSaleInvoice(id) {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-saleinvoice/" + id,
    { page: "sale invoice" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

$(document).on("click", ".viewpurchaseInvoice", function () {
  var id = $(this).attr("tag");
  var newUrl = base_url + "purchaseinvoice/" + id;
  changeURL(newUrl, "Paper purchase invoice");
  getpurchaseInvoice(id);
});
function getpurchaseInvoice(id) {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-purchaseinvoice/" + id,
    { page: "purchase invoice" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}
$(document).on("click", ".packingslip", function () {
  var id = $(this).attr("tag");
  var newUrl = base_url + "packingslip/" + id;
  changeURL(newUrl, "Packing slip");
  getpackingslip(id);
});
function getpackingslip(id) {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-packingslip/" + id,
    { page: "Packing slip" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

// ======================================================
// Job Code
// ======================================================

$(document).on("click", ".nav-job", function () {
  var newUrl = base_url + "job";
  changeURL(newUrl, "Paper Job");
  getJob();
});
function getJob() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-job", { page: "job" }, function (data) {
    $(".page-content-area").html(data);
  });
}

// ======================================================
// Rate Code
// ======================================================

$(document).on("click", ".nav-rates", function () {
  var newUrl = base_url + "rates";
  changeURL(newUrl, "Paper Rates");
  getRates();
});
function getRates() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-rates", { page: "rates" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-postedrates", function () {
  var newUrl = base_url + "postedrates";
  changeURL(newUrl, "Paper Posted Rates");
  getPostedRates();
});
function getPostedRates() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-postedrates", { page: "postedrates" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".postrate", function () {
  var newUrl = base_url + "postrate";
  changeURL(newUrl, "Paper post rate ");
  getpostrate();
});

function getpostrate() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-postrate", { page: "postrate" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".view-postrate", function () {
  var id = $(this).attr("tag");
  var newUrl = base_url + "viewpostrate/" + id;
  changeURL(newUrl, "Paper View post rate ");
  getViewpostrate(id);
});

function getViewpostrate(id) {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-viewpostrate/" + id,
    { page: "viewpostrate" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

$(document).on("click", ".confirmSaleRate", function () {
  var id = $(this).attr("tag");
  var newUrl = base_url + "confirmsalerate/" + id;
  changeURL(newUrl, "Paper Confirm Rate");
  getConfirmSaleRate(id);
});

function getConfirmSaleRate(id) {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-confirmsalerate/" + id,
    { page: "confirmsalerate" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

$(document).on("click", ".confirmPurchaseRate", function () {
  var id = $(this).attr("tag");
  var newUrl = base_url + "confirmpurchaserate/" + id;
  changeURL(newUrl, "Paper Confirm Rate");
  getConfirmPurchaseRate(id);
});

function getConfirmPurchaseRate(id) {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-confirmpurchaserate/" + id,
    { page: "confirmpurchaserate" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}

$(document).on("click", ".nav-labservice", function () {
  var newUrl = base_url + "labservice";
  changeURL(newUrl, "Paper Lab Service");
  getLabservice();
});
function getLabservice() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-labservice", { page: "labservice" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".my-booking", function () {
  var newUrl = base_url + "mylabbooking";
  changeURL(newUrl, "Paper Lab Service");
  getMylabbooking();
});
function getMylabbooking() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-mylabbooking", { page: "mylabbooking" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".booking-placed", function () {
  var newUrl = base_url + "allbooking";
  changeURL(newUrl, "Paper Lab Bookings");
  getAllBooking();
});
function getAllBooking() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-allbooking", { page: "allbooking" }, function (data) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-customer", function () {
  var newUrl = base_url + "customer";
  changeURL(newUrl, "Paper Customer");
  getCustomer();
});

function getCustomer() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-customer", { page: "customer" }, function (data) {
    $(".page-content-area").html(data);
  });
}

// ======================================================
// transporter ortder confirmation Code
// ======================================================

$(document).on("click", ".nav-orderbooklist", function () {
  var newUrl = base_url + "orderbooklist";
  changeURL(newUrl, "Paper Order book list");
  getOrderbooklist();
});
function getOrderbooklist() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-orderbooklist", { page: "orderbooklist" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-alotedbooklist", function () {
  var newUrl = base_url + "alotedbooklist";
  changeURL(newUrl, "Paper Order book list");
  getAlotedBooklist();
});
function getAlotedBooklist() {
  $(".page-content-area").html(pageLoader);
  $.post(base_url + "get-alotedbooklist", { page: "alotedbooklist" }, function (
    data
  ) {
    $(".page-content-area").html(data);
  });
}

$(document).on("click", ".nav-transactionhistory", function () {
  var newUrl = base_url + "transactionhistory";
  changeURL(newUrl, "Paper Order Transactions");
  getTransactionhistory();
});
function getTransactionhistory() {
  $(".page-content-area").html(pageLoader);
  $.post(
    base_url + "get-transactionhistory",
    { page: "transactionhistory" },
    function (data) {
      $(".page-content-area").html(data);
    }
  );
}
// $(document).on('click', '.purchase_list', function () {
//    var newUrl = base_url + "transactionhistory";
//    changeURL(newUrl, "Paper Order Transactions");
//    getPurchaseList();

// });
// function getPurchaseList() {
//    $('.page-content-area').html(pageLoader);
//    $.post(base_url + "get-transactionhistory", { page: "transactionhistory" }, function (data) {
//       $('.page-content-area').html(data);
//    });
// }
// $(document).on('click', '.sale_list', function () {
//    var newUrl = base_url + "transactionhistory";
//    changeURL(newUrl, "Paper Order Transactions");
//    getSaleList();

// });
// function getSaleList() {
//    $('.page-content-area').html(pageLoader);
//    $.post(base_url + "get-transactionhistory", { page: "transactionhistory" }, function (data) {
//       $('.page-content-area').html(data);
//    });
// }

$(document).on("click", ".registeredServices", function (e) {
  $("#registeredServicesModal").modal("show");
});

// this script is used for sidebar menu dropdown

$(".metismenu li").click(function () {
  $(".metismenu li").removeClass("activeclass");
  $(this).toggleClass("activeclass");
});

$(document).on("change", "#user_type", function (e) {
  var id = $(this).val();
  if (id < 5) {
    getuserworkprofile(id);
  } else {
    $(".userprofile").html("");
  }
});

function getuserworkprofile(id) {
  $.post(
    base_url + "get-userworkprofile",
    { page: "userworkprofile", id: id },
    function (data) {
      $(".userprofile").html(data);
    }
  );
}

// function mynotificationfun(url){
//    let id = url.slice(17, 19);
//    let newurl =  url.slice(0, 16);
//    if(newurl=='view-listproduct'){
//        let title = 'view';
//        $("#r-id").val(id);
//        $("#titlev").val(title);
//        $.ajax({
//            type: "get",
//            url: base_url + "checkUserListId?id=" + id+"&title="+title,
//            data: {},
//            success: function (jsonData) {
//                console.log(jsonData);
//                var jd = JSON.parse(jsonData);
//                if (jd.is_empty == 0) {
//                    $('#userlist_request_modal').modal('show');
//                } else {
//                    let rid = jd.id;

//                    if(jd.title=='view'){
//                        var id = $(this).attr('tag');
//                        var newUrl = base_url + "view-listproduct/" + rid;
//                        changeURL(newUrl, "Paper View List Product");
//                        location.reload()
//                        getViewListProduct(id);
//                    }
//                }
//            }
//        })

//    }else{
//        window.location = base_url+url;
//    }

// }
