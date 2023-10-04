$(document).ready(function () {
  //  date picker
  $("#booking_date, .checkin_date, .checkout_date").datepicker();

  //  time picker
  $("#booking_time").timepicker({
    scrollDefault: "now",
  });

  $(".sideNavOpen").click(function (e) {
    var sideNavTarget = $(this).data("side-nav-target");
    e.preventDefault();
    if (typeof sideNavTarget !== "undefined" && sideNavTarget) {
      showSideMenu(sideNavTarget);
    }
  });

  $(".sideNavClose").click(function (e) {
    e.preventDefault();
    console.log(sideNavTarget);
    var sideNavTarget = $(this).data("side-nav-target");
    if (typeof sideNavTarget !== "undefined" && sideNavTarget) {
      hideSideMenu(sideNavTarget);
    }
  });

  // owlCarousel for hero banner
  $(".owl-banner").owlCarousel({
    items: 1,
    loop: true,
    nav: false,
    dots: true,
    autoplay: true,
    autoplaySpeed: 1000,
    smartSpeed: 350,
    autoplayHoverPause: false,
  });

  // rooms and suits card
  $(".owl-rooms").owlCarousel({
    items: 2,
    loop: false,
    nav: false,
    dots: true,
    margin: 40,
  });

  // testimonial
  $(".owl-testimonial").owlCarousel({
    items: 2,
    loop: false,
    nav: false,
    dots: true,
  });

  // image gallery
  $(".owl-images-gallery").owlCarousel({
    items: 3,
    loop: false,
    nav: false,
    dots: true,
    autoplay: true,
    autoplaySpeed: 1000,
    smartSpeed: 350,
    autoplayHoverPause: true,
    margin: 20,
  });

  // menu-items
  $(".owl-menu-category").owlCarousel({
    // autoWidth: true,
    center: true,
    items: 3,
    loop: true,
    nav: true,
    dots: false,
    margin: 20,
    navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>",
    ],
    responsive : {
      0 : {
        items: 1,
      },
      480 : {
        items: 2,
      },
      767 : {
        items: 3,
      },
      991 : {
        items: 4,
      },
      1200 : {
        items: 5,
      },
  }
  });

  // click on next button
  jQuery(".form-wizard-next-btn").click(function () {
    var parentFieldset = jQuery(this).parents(".wizard-fieldset");
    var currentActiveStep = jQuery(this)
      .parents(".form-wizard")
      .find(".form-wizard-steps .active");
    var next = jQuery(this);
    var nextWizardStep = true;
    parentFieldset.find(".wizard-required").each(function () {
      var thisValue = jQuery(this).val();
      if (thisValue == "") {
        jQuery(this).siblings(".wizard-form-error").slideDown();
        nextWizardStep = false;
      } else {
        jQuery(this).siblings(".wizard-form-error").slideUp();
      }
    });
    if (nextWizardStep) {
      next.parents(".wizard-fieldset").removeClass("show", "400");
      currentActiveStep.next().addClass("active", "400");
      next
        .parents(".wizard-fieldset")
        .next(".wizard-fieldset")
        .addClass("show", "400");
    }
  });
  jQuery(".book-now-button").click(function () {
    $(this).css("display", "none");
    $("#room-selection-fieldset").removeClass("show");
    $("#personal-details-fieldset").addClass("show");
    $(".form-wizard-steps-personal-details").addClass("active");
  });
  jQuery(".go-to-selction-button").click(function () {
    $(".book-now-button").css("display", "block");
  });

  //click on previous button
  jQuery(".form-wizard-previous-btn").click(function () {
    var prev = jQuery(this);
    var currentActiveStep = jQuery(this)
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
  });

  //click on form submit button
  jQuery(document).on("click", ".form-wizard .form-wizard-submit", function () {
    var parentFieldset = jQuery(this).parents(".wizard-fieldset");
    var currentActiveStep = jQuery(this)
      .parents(".form-wizard")
      .find(".form-wizard-steps .active");
    parentFieldset.find(".wizard-required").each(function () {
      var thisValue = jQuery(this).val();
      if (thisValue == "") {
        jQuery(this).siblings(".wizard-form-error").slideDown();
      } else {
        jQuery(this).siblings(".wizard-form-error").slideUp();
      }
    });
  });

  // focus on input field check empty or not
  // jQuery(".form-control")
  //   .on("focus", function () {
  //     var tmpThis = jQuery(this).val();
  //     if (tmpThis == "") {
  //       jQuery(this).parent().addClass("focus-input");
  //     } else if (tmpThis != "") {
  //       jQuery(this).parent().addClass("focus-input");
  //     }
  //   })
  //   .on("blur", function () {
  //     var tmpThis = jQuery(this).val();
  //     if (tmpThis == "") {
  //       jQuery(this).parent().removeClass("focus-input");
  //       jQuery(this).siblings(".wizard-form-error").slideDown("3000");
  //     } else if (tmpThis != "") {
  //       jQuery(this).parent().addClass("focus-input");
  //       jQuery(this).siblings(".wizard-form-error").slideUp("3000");
  //     }
  //   });
});

function showSideMenu(sideNavTarget) {
  $(sideNavTarget).addClass("open");
  $("body").addClass("open-opacity");
  $("header").addClass("dimheader");
}

function hideSideMenu(sideNavTarget) {
  $(sideNavTarget).removeClass("open");
  $("body").removeClass("open-opacity");
  $("header").removeClass("dimheader");
}

const $sideNavMenu = $("#mySideNav");
$(document).mouseup((e) => {
  if (!$sideNavMenu.is(e.target) && $sideNavMenu.has(e.target).length === 0) {
    $sideNavMenu.removeClass("open");
    $("body").removeClass("open-opacity");
    $("header").removeClass("dimheader");
  }
});
