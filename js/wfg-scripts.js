/**
 * @file wfg-scripts.js
 *
 * Frontend core script for WooCommerce free gift plugin.
 *
 * Copyright (c) 2015, Ankit Pokhrel <info@ankitpokhrel.com.np, http://ankitpokhrel.com>
 */
jQuery(document).ready(function ($) {


  var currentSection = 1;
  var sections;

  $('document').ready(function () {
    setCurrentSection();
    setSectionIndicator(1);
    $('.navigation').click(function () {
      if (this.id == "nav-left") {
        if (currentSection != 1) {
          scrollToSection(currentSection - 1);
          $('#nav-left').prop('disabled', true);
        }
      }
      else  {
        if (currentSection+1 <= sections) {
          scrollToSection(currentSection + 1);
          $('#nav-right').prop('disabled', true);
        }
      }
    });

    $('.navigation').on('mouseover', function() {
      if (this.id == 'nav-left') {
        if (currentSection != 1) $(this).addClass('navigation-hover');
      } else {
        if (currentSection+1 <= sections) $(this).addClass('navigation-hover');
      }
    }).on('mouseout', function () {
      $(this).removeClass('navigation-hover');
    });

    $(window).resize(function() {
      setCurrentSection();
      setSectionIndicator(currentSection);
    });

  });

  function setCurrentSection() {
    var carouselWidth = $('.carousel').width();
    var projectWidth = $('.project').width() + parseInt($('.project').css('margin-right').replace('px',''));
    var projectsQtt = $('.project').size();
    var projectsPerSection = carouselWidth / projectWidth;
    sections = Math.round(projectsQtt / projectsPerSection);
    var rollLeft = Math.abs(parseInt($('.roll').css('left').replace('px','')));
    if (rollLeft == 0) currentSection = 1;
    else {
      currentSection = Math.round((rollLeft / carouselWidth) + 1);
    }
    $('#nav-left').prop('disabled', false);
    $('#nav-left').removeClass('navigation-hover');
    $('#nav-right').prop('disabled', false);
    $('#nav-right').removeClass('navigation-hover');
  }

  function scrollToSection(section) {
    var width = $('.carousel').width() * (Math.abs(currentSection - section));
    if (section < currentSection) {
      $('.roll').animate({left: '+='+width}, "slow", setCurrentSection);
    } else {
      $('.roll').animate({left: '-='+width}, "slow", setCurrentSection);
    }
    setSectionIndicator(section);
  }

  function setSectionIndicator(section) {
    $('.sections').html('');
    for (var i = 1; i <= sections; i++) {
      if (i == section) circleClass = 'fa fa-circle';
      else circleClass = 'fa fa-circle-thin';
      $('.sections').html($('.sections').html() + '<i class="'+circleClass+' indicator" data-id="'+i+'" aria-hidden="true"></i>');
    }
    $('.indicator').click(function() {
      scrollToSection($(this).attr('data-id'));
    });
  }






  if($('.wfg-popup, .wfg-overlay, .wfg-fixed').length) {
    setTimeout(function () {
      $('.wfg-popup, .wfg-fixed, .wfg-overlay').fadeIn(1300);
    }, 700);

    $('.wfg-no-thanks').click(function (e) {
      e.preventDefault();
      $('.wfg-popup, .wfg-overlay').fadeOut(500, function () {
        $(this).remove();
      });
    });

    $('.wfg-add-gifts').click(function (e) {
      e.preventDefault();
      var form = $(this).closest('form');
      $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: form.serialize(),
        success: function (response) {
          window.location.reload();
        }
      });
    });

    var wfgCheckboxes = $('.wfg-checkbox');
    wfgCheckboxes.click(function () {
      if(WFG_SPECIFIC.gifts_allowed <= 0) {
        return;
      }

      if($('.wfg-checkbox:checked').length >= WFG_SPECIFIC.gifts_allowed) {
        wfgCheckboxes.not('.wfg-checkbox:checked').attr('disabled', 'disabled').parent().addClass("opaque");
      }
      else {
        wfgCheckboxes.removeAttr('disabled').parent().removeClass("opaque");
      }
    })
  }

  $('.wfg-fixed-notice-remove').click(function () {
    $(this).closest('.wfg-fixed-notice').fadeOut(1000);
  });



});

/* use as handler for resize*/
jQuery(window).resize(wfgAdjustLayout);
/* call function in ready handler*/
jQuery(document).ready(function () {
  wfgAdjustLayout();
  /* Resize ma adjust garnay code sabai yesma haalnay*/
});

function wfgAdjustLayout() {
  jQuery('.wfg-popup').css({
    position: 'fixed',
    left: (jQuery(window).width() - jQuery('.wfg-popup').outerWidth()) / 2,
    top: (jQuery(window).height() - jQuery('.wfg-popup').outerHeight()) / 2
  });

}
