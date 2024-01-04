var lightBackground = "#FFFFFF";
var lightErrorColor = "#B00020";
var darkBackground = "#121212";
var darkErrorColor = "#CF6679";

var darkModetoggleIsOn = false;

function toggleDarkModeColors() {
  document.body.style.transition = "color 1s, background-color 1s";
}
let userplan = "";
let userplanDurations = "Monthly plan";
var yearlyPlanPrice = document.getElementsByClassName("yearly-description");
var Yearlyoffer = document.querySelectorAll(".yearly-offer");
var yrunit = document.querySelectorAll(".yr");
let PlanPrice = "";

const formSteps = document.querySelectorAll(".form-step");

for (let i = 0; i < formSteps.length; i++) {
  formSteps[i].style.display = "none";
}

let currentStep = 0;
formSteps[currentStep].style.display = "block";

const stepIndicators = document.querySelectorAll(".step-indicator");
stepIndicators[currentStep].classList.add("active");
const nextBtn = document.querySelector(".next-step");
nextBtn.addEventListener("click", () => {
  if (currentStep === 2) {
    nextBtn.innerHTML = "Confirm"; 
  }
  if (currentStep == 3) {
    nextBtn.style.display = "none";
    backBtn.style.display = "none";
  }
  if (currentStep === 0 && userplan == "") {
    nextBtn.disabled ? true : false;
  }
  backBtn.style.visibility = "visible";
  let valid = true;
  const inputs = form.querySelectorAll("input[required]");
  inputs.forEach(function (input) {
    if (!input.checkValidity()) {
      valid = false;
      input.style.border = "1px solid red";
    } else {
      input.style.border = "";
    }
  });
  let resultstatus = 0;

  if (currentStep === 0) {
    var user_name = $("#user_name").val().trim();
    var email = $("#email").val().trim();
    var emailotp = $("#emailotp").val().trim();
    var phone_number = $("#phone_number").val().trim();
    var phoneotp = $("#phoneotp").val().trim();
    var alternate_phone_number = $("#alternate_phone_number").val().trim();
    var company_name = $("#company_name").val().trim();
    var parentFieldset = $(this).parents(".wizard-fieldset");
    var currentActiveStep = $(this)
      .parents(".form-wizard")
      .find(".form-wizard-steps .active");
    var next = $(this);
    var nextWizardStep = "";
    var val1success = 0;
    parentFieldset.find(".wizard-required").each(function () {
      var thisValue = $(this).val();
      if (thisValue == "") {
        $(this).siblings(".wizard-form-error").slideDown();
        nextWizardStep = "true";
        val1success++;
      } else {
        var errortext = $(this).siblings(".text-danger").text();
        if (errortext != "") {
          val1success++;
        }
        nextWizardStep = "false";
      }
    });

    if (val1success == 0) {
      $.ajax({
        url: base_url + "register-submit-one",
        type: "post",
        data: {
          user_name: user_name,
          email: email,
          phone_number: phone_number,
          company_name: company_name,
          alternate_phone_number: alternate_phone_number,
        },
        success: function (jsonData) {
          var jsonData = JSON.parse(jsonData);
          if (jsonData["error"] == true) {
            if (jsonData["user_name"] != "") {
              $("#user_name").siblings(".wizard-form-error").slideDown();
              $(".e_user_name").html(jsonData["user_name"]);
            } else {
              $("#user_name").siblings(".wizard-form-error").slideUp();
              $(".e_user_name").html("");
            }
            if (jsonData["email"] != "") {
              $("#email").siblings(".wizard-form-error").slideDown();
              $(".e_email").html(jsonData["email"]);
            } else {
              $("#email").siblings(".wizard-form-error").slideUp();
              $(".e_email").html("");
            }
            if (jsonData["phone_number"] != "") {
              $("#phone_number").siblings(".wizard-form-error").slideDown();
              $(".e_phone_number").html(jsonData["phone_number"]);
            } else {
              $("#phone_number").siblings(".wizard-form-error").slideUp();
              $(".e_phone_number").html("");
            }
            if (jsonData["phone_number"] != "") {
              $("#phone_number").siblings(".wizard-form-error").slideDown();
              $(".e_phone_number").html(jsonData["phone_number"]);
            } else {
              $("#phone_number").siblings(".wizard-form-error").slideUp();
              $(".e_phone_number").html("");
            }
            if (jsonData["company_name"] != "") {
              $("#company_name").siblings(".wizard-form-error").slideDown();
              $(".e_company_name").html(jsonData["company_name"]);
            } else {
              $("#company_name").siblings(".wizard-form-error").slideUp();
              $(".e_company_name").html("");
            }
            if (jsonData["alternate_phone_number"] != "") {
              $("#alternate_phone_number")
                .siblings(".wizard-form-error")
                .slideDown();
              $(".e_alternate_phone_number").html(
                jsonData["alternate_phone_number"]
              );
            } else {
              $("#alternate_phone_number")
                .siblings(".wizard-form-error")
                .slideUp();
              $(".e_alternate_phone_number").html("");
            }
            resultstatus = 0;
          } else {
            if (jsonData["msg"] == "success") {
              $(".e_user_name").html("");
              $(".e_email").html("");
              $(".e_phone_number").html("");
              $(".e_company_name").html("");
              $(".e_alternate_phone_number").html("");

              nextWizardStep = "true";
              if (nextWizardStep == "true") {
                if (currentStep === formSteps.length - 1) return;
                formSteps[currentStep].style.display = "none";
                stepIndicators[currentStep].classList.remove("active");
                currentStep++;
                formSteps[currentStep].style.display = "block";
                stepIndicators[currentStep].classList.add("active"); 
              }
              resultstatus = 1;
            }
          }
        },
      });
    }
    // if (currentStep === 0) return;
  }
  if (currentStep === 1) {
    var address = $("#address").val().trim();
    var state = $("#state").val().trim();
    var city = $("#city").val().trim();
    var pin_code = $("#pin_code").val().trim();
    var gst_no = $("#gst_no").val().trim();
    var pan_no = $("#pan_no").val().trim();

    var parentFieldset = $(this).parents(".wizard-fieldset");
    var currentActiveStep = $(this)
      .parents(".form-wizard")
      .find(".form-wizard-steps .active");
    var next = $(this);
    var nextWizardStep = "";
    var val1success = 0;
    parentFieldset.find(".wizard-required").each(function () {
      var thisValue = $(this).val();

      if (thisValue == "") {
        $(this).siblings(".wizard-form-error").slideDown();
        nextWizardStep = "true";
        val1success++;
      } else {
        var errortext = $(this).siblings(".text-danger").text();
        if (errortext != "") {
          val1success++;
        }
        nextWizardStep = "false";
      }
    });

    if (val1success == 0) {
      $.ajax({
        url: base_url + "register-submit-two",
        type: "post",
        data: {
          address: address,
          state: state,
          city: city,
          pin_code: pin_code,
          pan_no: pan_no,
          gst_no: gst_no,
        },
        success: function (jsonData) {
          var jsonData = JSON.parse(jsonData);
          if (jsonData["error"] == true) {
            if (jsonData["address"] != "") {
              $("#address").siblings(".wizard-form-error").slideDown();
              $(".e_address").html(jsonData["address"]);
            } else {
              $("#address").siblings(".wizard-form-error").slideUp();
              $(".e_address").html("");
            }
            if (jsonData["state"] != "") {
              $("#state").siblings(".wizard-form-error").slideDown();
              $(".e_state").html(jsonData["state"]);
            } else {
              $("#state").siblings(".wizard-form-error").slideUp();
              $(".e_state").html("");
            }
            if (jsonData["city"] != "") {
              $("#city").siblings(".wizard-form-error").slideDown();
              $(".e_city").html(jsonData["city"]);
            } else {
              $("#city").siblings(".wizard-form-error").slideUp();
              $(".e_city").html("");
            }
            if (jsonData["pin_code"] != "") {
              $("#pin_code").siblings(".wizard-form-error").slideDown();
              $(".e_pin_code").html(jsonData["pin_code"]);
            } else {
              $("#pin_code").siblings(".wizard-form-error").slideUp();
              $(".e_pin_code").html("");
            }

            if (jsonData["gst_no"] != "") {
              $("#gst_no").siblings(".wizard-form-error").slideDown();
              $(".e_gst_no").html(jsonData["gst_no"]);
            } else {
              $("#gst_no").siblings(".wizard-form-error").slideUp();
              $(".e_gst_no").html("");
            }
            if (jsonData["pan_no"] != "") {
              $("#pan_no").siblings(".wizard-form-error").slideDown();
              $(".e_pan_no").html(jsonData["pan_no"]);
            } else {
              $(".e_pan_no").html("");
              $("#pan_no").siblings(".wizard-form-error").slideUp();
            }
          } else {
            if (jsonData["msg"] == "success") {
              $(".e_address").html("");
              $(".e_state").html("");
              $(".e_city").html("");
              $(".e_pin_code").html("");
              $(".e_pan_no").html("");
              $(".e_gst_no").html("");
              nextWizardStep = "true";
              if (nextWizardStep == "true") {
                if (currentStep === formSteps.length - 1) return;
                formSteps[currentStep].style.display = "none";
                stepIndicators[currentStep].classList.remove("active");
                currentStep++;
                formSteps[currentStep].style.display = "block";
                stepIndicators[currentStep].classList.add("active"); 
              }
            }
          }
        },
        error: function (data) {
          console.log(data);
        },
      });
    }
  }
  if (currentStep === 2) {
    var user_type = $("#user_type").val();
    var password = $("#password").val().trim();
    var cr_password = $("#cr_password").val().trim();
    var designation = $("#designation").val().trim();

    var parentFieldset = $(this).parents(".wizard-fieldset");
    var currentActiveStep = $(this)
      .parents(".form-wizard")
      .find(".form-wizard-steps .active");
    var next = $(this);
    var nextWizardStep = "";
    var val1success = 0;
    parentFieldset.find(".wizard-required").each(function () {
      var thisValue = $(this).val();

      if (thisValue == "") {
        $(this).siblings(".wizard-form-error").slideDown();
        nextWizardStep = "true";
        val1success++;
      } else {
        var errortext = $(this).siblings(".text-danger").text();
        if (errortext != "") {
          val1success++;
        }
        nextWizardStep = "false";
      }
    });

    if (val1success == 0) {
      $.ajax({
        url: base_url + "register-submit-three",
        type: "post",
        data: {
          user_type: user_type,
          password: password,
          cr_password: cr_password,
          designation: designation,
        },
        success: function (jsonData) {
          var jsonData = JSON.parse(jsonData);
          if (jsonData["error"] == true) {
            if (jsonData["user_type"] != "") {
              $("#user_type").siblings(".wizard-form-error").slideDown();
              $(".e_user_type").html(jsonData["user_type"]);
            } else {
              $("#user_type").siblings(".wizard-form-error").slideUp();
              $(".e_user_type").html("");
            }
            if (jsonData["password"] != "") {
              $("#password").siblings(".wizard-form-error").slideDown();
              $(".e_password").html(jsonData["password"]);
            } else {
              $("#password").siblings(".wizard-form-error").slideUp();
              $(".e_password").html("");
            }
            if (jsonData["cr_password"] != "") {
              $("#cr_password").siblings(".wizard-form-error").slideDown();
              $(".e_cr_password").html(jsonData["cr_password"]);
            } else {
              $("#cr_password").siblings(".wizard-form-error").slideUp();
              $(".e_cr_password").html("");
            }
            if (jsonData["designation"] != "") {
              $("#designation").siblings(".wizard-form-error").slideDown();
              $(".e_designation").html(jsonData["designation"]);
            } else {
              $("#designation").siblings(".wizard-form-error").slideUp();
              $(".e_designation").html("");
            }
          } else {
            if (jsonData["msg"] == "success") {
              $("#successmesage").html(jsonData["data"]);
              $(".e_user_type").html("");
              $(".e_password").html("");
              $(".e_cr_password").html("");
              $(".e_designation").html("");
              nextWizardStep = "true"; 
              if (currentStep === formSteps.length - 1) return;
              formSteps[currentStep].style.display = "none";
              stepIndicators[currentStep].classList.remove("active");
              currentStep++;
              formSteps[currentStep].style.display = "block";
              stepIndicators[currentStep].classList.add("active");
            }
          }
        },
      });
      $(this).siblings(".wizard-form-error").slideUp();
    }
  }
  if (currentStep==3) {
	if (currentStep === formSteps.length - 1) return;
	formSteps[currentStep].style.display = 'none';
	stepIndicators[currentStep].classList.remove('active');
	currentStep++;
	formSteps[currentStep].style.display = 'block';
	stepIndicators[currentStep].classList.add('active');
  }
  // if (currentStep === 1) return;
  //   }
  // alert(resultstatus);
  // if (resultstatus==1) {
//   if (currentStep === formSteps.length - 1) return;
//   formSteps[currentStep].style.display = 'none';
//   stepIndicators[currentStep].classList.remove('active');
//   currentStep++;
//   formSteps[currentStep].style.display = 'block';
//   stepIndicators[currentStep].classList.add('active');
  // }else{
  // 	if (currentStep === formSteps.length - 1) return;
  // 	formSteps[currentStep].style.display = 'none';
  // 	stepIndicators[currentStep].classList.remove('active');
  // 	currentStep;
  // 	formSteps[currentStep].style.display = 'block';
  // 	stepIndicators[currentStep].classList.add('active');
  // }
});

const backBtn = document.querySelector(".go-back-button");
backBtn.addEventListener("click", () => {
  if (currentStep === 0) return;
  nextBtn.innerHTML = "Next Step";
  formSteps[currentStep].style.display = "none";
  stepIndicators[currentStep].classList.remove("active");
  currentStep--;
  formSteps[currentStep].style.display = "block";
  stepIndicators[currentStep].classList.add("active");
});

const form = document.querySelector(".user-input");
var finalPlanPrice = document.getElementsByClassName("final-plan-price")[0];
var addfinal = document.getElementsByClassName("user-selected-add-ons")[0];

function checkAddOns() {
  let addOns = new Set();
  let addOnOptions = document.querySelectorAll(".opts");

  for (let option of addOnOptions) {
    let addOnInput = option.querySelector('input[type="checkbox"]');
    if (addOnInput.checked) {
      option.style.border = "1px solid blue";
      addOns.add(
        `${option.querySelector("h3").textContent} (${
          option.querySelector(".option-price").textContent
        })`
      );
    } else {
      option.style.border = "";
    }
  }

  if (addOns.size) {
    addfinal.innerHTML = "";
    let newDiv = document.createElement("div");
    addOns.forEach((addon) => {
      let addonDiv = document.createElement("div");
      addonDiv.innerHTML = addon;
      addfinal.appendChild(addonDiv);
    });
  } else {
    addfinal.innerHTML = "No Addon Selected";
  }
}

const showAlert = (msg, cls) => {
  $(".alertcls").html(msg);
  // $('.alertcls').addClass(cls);
  $(".alertcls").slideDown("2000");

  setTimeout(() => {
    $(".alertcls").html("");
    $(".alertcls").slideUp("2000");
  }, 3000);
};

$(".addno").click(function () {
  $(".alternateno").toggle();
});

function validateEmail(email) {
  // Regular expression for a basic email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  // Test the email against the regular expression
  return emailRegex.test(email);
}

$("#email").on("change", function () {
  let email = $("#email").val();
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (!filter.test(email)) {
    $(".e_email").html("Please provide a valid email address");
    email.focus;
    return false;
  } else {
    $(".emailotp").show();
  }
});
$("#phone_number").on("change", function () {
  let phone = $("#phone_number").val();
  var phoneRegex = /^[0-9]{10}$/;
  if (!phoneRegex.test(phone)) {
    $(".e_phone").html("The Phone No is not in the correct format.");
    return false;
  } else {
    $(".phoneotp").show();
  }
});


// $("#user_name").change(function(){
//   alert("The text has been changed.");
// });