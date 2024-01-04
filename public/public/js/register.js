$(document).ready(function () {
  // click on next button
  $("#submit-1").click(function () {
    var user_name = $("#user_name").val().trim();
    var email = $("#email").val().trim();
    var phone_number = $("#phone_number").val().trim();
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
          } else {
            if (jsonData["msg"] == "success") {
              $(".e_user_name").html("");
              $(".e_email").html("");
              $(".e_phone_number").html("");
              $(".e_company_name").html("");
              $(".e_alternate_phone_number").html("");

              nextWizardStep = "true";
              if (nextWizardStep == "true") {
                next.parents(".wizard-fieldset").removeClass("show", "400");
                currentActiveStep
                  .removeClass("active")
                  .addClass("activated")
                  .next()
                  .addClass("active", "400");
                next
                  .parents(".wizard-fieldset")
                  .next(".wizard-fieldset")
                  .addClass("show", "400");
                $(document)
                  .find(".wizard-fieldset")
                  .each(function () {
                    if ($(this).hasClass("show")) {
                      var formAtrr = $(this).attr("data-tab-content");
                      $(document)
                        .find(".form-wizard-steps .form-wizard-step-item")
                        .each(function () {
                          if ($(this).attr("data-attr") == formAtrr) {
                            $(this).addClass("active");
                            var innerWidth = $(this).innerWidth();
                            var position = $(this).position();
                            $(document)
                              .find(".form-wizard-step-move")
                              .css({ left: position.left, width: innerWidth });
                          } else {
                            $(this).removeClass("active");
                          }
                        });
                    }
                  });
              }
            }
          }
        },
      });
    }
  });

  $("#submit-2").click(function () {
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
                next.parents(".wizard-fieldset").removeClass("show", "400");
                currentActiveStep
                  .removeClass("active")
                  .addClass("activated")
                  .next()
                  .addClass("active", "400");
                next
                  .parents(".wizard-fieldset")
                  .next(".wizard-fieldset")
                  .addClass("show", "400");
                $(document)
                  .find(".wizard-fieldset")
                  .each(function () {
                    if ($(this).hasClass("show")) {
                      var formAtrr = $(this).attr("data-tab-content");
                      $(document)
                        .find(".form-wizard-steps .form-wizard-step-item")
                        .each(function () {
                          if ($(this).attr("data-attr") == formAtrr) {
                            $(this).addClass("active");
                            var innerWidth = $(this).innerWidth();
                            var position = $(this).position();
                            $(document)
                              .find(".form-wizard-step-move")
                              .css({ left: position.left, width: innerWidth });
                          } else {
                            $(this).removeClass("active");
                          }
                        });
                    }
                  });
              }
            }
          }
        },
        error: function (data) {
          console.log(data);
        },
      });
    }
  });

  $("#submit-3").click(function () {
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
              if (nextWizardStep == "true") {
                next.parents(".wizard-fieldset").removeClass("show", "400");
                currentActiveStep
                  .removeClass("active")
                  .addClass("activated")
                  .next()
                  .addClass("active", "400");
                next
                  .parents(".wizard-fieldset")
                  .next(".wizard-fieldset")
                  .addClass("show", "400");
                $(document)
                  .find(".wizard-fieldset")
                  .each(function () {
                    if ($(this).hasClass("show")) {
                      var formAtrr = $(this).attr("data-tab-content");
                      $(document)
                        .find(".form-wizard-steps .form-wizard-step-item")
                        .each(function () {
                          if ($(this).attr("data-attr") == formAtrr) {
                            $(this).addClass("active");
                            var innerWidth = $(this).innerWidth();
                            var position = $(this).position();
                            $(document)
                              .find(".form-wizard-step-move")
                              .css({ left: position.left, width: innerWidth });
                            $("#successmesage").html(jsonData["data"]);
                          } else {
                            $(this).removeClass("active");
                          }
                        });
                    }
                  });
              }
            }
          }
        },
      });
      $(this).siblings(".wizard-form-error").slideUp();
    }
  });
  //click on previous button
  $(".form-wizard-previous-btn").click(function () {
    var counter = parseInt($(".wizard-counter").text());
    var prev = $(this);
    var currentActiveStep = $(this)
      .parents(".form-wizard")
      .find(".form-wizard-steps .active");
    prev.parents(".wizard-fieldset").removeClass("show", "400");
    prev
      .parents(".wizard-fieldset")
      .prev(".wizard-fieldset")
      .addClass("show", "400");
    currentActiveStep
      .removeClass("active")
      .prev()
      .removeClass("activated")
      .addClass("active", "400");
    $(document)
      .find(".wizard-fieldset")
      .each(function () {
        if ($(this).hasClass("show")) {
          var formAtrr = $(this).attr("data-tab-content");
          $(document)
            .find(".form-wizard-steps .form-wizard-step-item")
            .each(function () {
              if ($(this).attr("data-attr") == formAtrr) {
                $(this).addClass("active");
                var innerWidth = $(this).innerWidth();
                var position = $(this).position();
                $(document)
                  .find(".form-wizard-step-move")
                  .css({ left: position.left, width: innerWidth });
              } else {
                $(this).removeClass("active");
              }
            });
        }
      });
  });
  //click on form submit button
  $(document).on("click", ".form-wizard .form-wizard-submit", function () {
    var parentFieldset = $(this).parents(".wizard-fieldset");
    var currentActiveStep = $(this)
      .parents(".form-wizard")
      .find(".form-wizard-steps .active");
    parentFieldset.find(".wizard-required").each(function () {
      var thisValue = $(this).val();
      if (thisValue == "") {
        $(this).siblings(".wizard-form-error").slideDown();
      } else {
        $(this).siblings(".wizard-form-error").slideUp();
      }
    });
  });
  // focus on input field check empty or not
  $(".wizard-required")
    .on("focus", function () {
      var tmpThis = $(this).val();
      if (tmpThis == "") {
        $(this).parent().addClass("focus-input");
        $(this).siblings(".text-danger").html("");
      } else if (tmpThis != "") {
        $(this).parent().addClass("focus-input");
        $(this).siblings(".text-danger").html("");
      }
    })
    .on("blur", function () {
      var tmpThis = $(this).val();
      if (tmpThis == "") {
        $(this).parent().removeClass("focus-input");
        $(this).siblings(".wizard-form-error").slideDown("3000");
      } else if (tmpThis != "") {
        $(this).parent().addClass("focus-input");
        $(this).siblings(".wizard-form-error").slideUp("3000");
      }
    });

  $("#alternate_phone_number")
    .on("focus", function () {
      var tmpThis = $(this).val();
      if (tmpThis == "") {
        $(this).parent().addClass("focus-input");
      } else if (tmpThis != "") {
        $(this).parent().addClass("focus-input");
      }
    })
    .on("blur", function () {
      var tmpThis = $(this).val();
      if (tmpThis == "") {
        $(this).parent().removeClass("focus-input");
        $(".e_alternate_phone_number").html("");
        $("#alternate_phone_number").siblings(".wizard-form-error").slideUp();
        $("#alternate_phone_number").removeClass("wizard-required");
      } else if (tmpThis != "") {
        var alt_no = $(this).val().trim();
        var pno = /^([5-9]){1}([0-9]){9}?$/;
        $(this).val(alt_no);
        if (alt_no.match(pno)) {
          $("#alternate_phone_number").siblings(".wizard-form-error").slideUp();
          $(".e_alternate_phone_number").html("");
          $("#alternate_phone_number").addClass("wizard-required");
        } else {
          $("#alternate_phone_number")
            .siblings(".wizard-form-error")
            .slideDown();
          $(".e_alternate_phone_number").html(
            "The Phone No is not in the correct format."
          );
          $("#alternate_phone_number").addClass("wizard-required");
        }
      }
    });

  $(document).on("keyup", "#pan_no", function () {
    var pan_no = $(this).val().trim().toUpperCase();
    var regpan = /^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/;
    $(this).val(pan_no);
    if (pan_no.match(regpan)) {
      $("#pan_no").siblings(".wizard-form-error").slideUp();
      $(".e_pan_no").html("");
    } else {
      $("#pan_no").siblings(".wizard-form-error").slideDown();
      $(".e_pan_no").html("The PAN No field is not in the correct format.");
    }
  });

  $(document).on("keyup", "#gst_no", function () {
    var gst_no = $(this).val().trim().toUpperCase();
    var reggst = /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[0-9a-zA-Z]{1}[0-9a-zA-Z]{1}[0-9a-zA-Z]{1}$/;
    $(this).val(gst_no);
    if (gst_no.match(reggst)) {
      $("#gst_no").siblings(".wizard-form-error").slideUp();
      $(".e_gst_no").html("");
    } else {
      $("#gst_no").siblings(".wizard-form-error").slideDown();
      $(".e_gst_no").html("The GST No field is not in the correct format.");
    }
  });
});


