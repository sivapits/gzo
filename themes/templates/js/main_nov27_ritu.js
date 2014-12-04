var siteScript = {} || siteScript;
var windowWidth = $(window).width();

siteScript = {
    init: function() {
        // object  private variables    
        var Vars = {

        }
        this.tabNav({
            element: '.mod-highlight',
            tag: 'a',
            classname: 'active',
            target: '.tab-content'
        });
        // this.closebtn({
        //     element: '.btn-close'
        // });
        this.carousel();
        this.customsearch();
        this.selectRedirect();
        this.selectPicker();
        this.touchNav();

    },
    carousel: function() {
        $('.carousel .item:first-child').addClass('active');
        this.countcarousel();
    },
    countcarousel: function() {
        if ($('.carousel.spotlight .item').length < 2) return false;
        var activeClass;
        var markup = '<ol class="carousel-indicators container">';
        $('.carousel.spotlight .item').each(function(index) {
            activeClass = (index < 1) ? 'active' : '';
            markup += '<li data-target="#carousel-example-generic" data-slide-to="' + index + '" class="' + activeClass + '">';
        })
        markup += '</ol>';
        $('.carousel.spotlight .carousel-inner').after(markup);
    },
    customsearch: function() {
        $('.mob-button').on('click', function() {
            $('html').toggleClass('search-active');
        })
    },
    tabNav: function(obj) {
        $('body').on('click', obj.element + ' ' + obj.tag, function(e) {
            //alert('test');
            var _this = $(this),
                targetElement = _this.attr('href'),
                parentTab = _this.closest(obj.element);
            // remove existing active classname from tab content
            parentTab.siblings(obj.target).removeClass(obj.classname);
            parentTab.siblings(targetElement).addClass(obj.classname);
            // update classname for navigation items
            parentTab.find(obj.tag).removeClass(obj.classname);
            _this.addClass(obj.classname);
            //alert(obj.element);
            if ($(obj.element).hasClass('cta')) {} else {
                e.preventDefault();
            }
            $('.scroll-pane').jScrollPane({
                hideFocus: true
            });
        })
    },
    closebtn: function(obj) {
        $('body').on('click', obj.element, function() {
            alert(obj);
            var dataTarget = $(this).data('target');
            alert(dataTarget);
            $(dataTarget).slideUp();
        })
    },
    selectRedirect: function() {
        $('select.link-select').on('change', function() {
            var selectVal = $(this).val();
            if (selectVal != "") {
                window.location.assign(selectVal);
            }
        })
    },
    selectPicker: function() {
        $(".selectpicker").selectpicker();
        $(".powermail_select").selectpicker();
    },
    touchNav: function() {
        $('.navbar-nav.mob-hide li').each(function() {
            if ($(this).find('> ul').length > 0) {
                $(this).addClass('hover-init');
            }
        });
        $('.hover-init > a').on('touchend', function(e) {
            if ($(this).parent('li').hasClass('hover')) {
                $(this).parent('li').removeClass('hover');
            } else {
                $(this).closest('.hover-init').siblings('.hover-init').removeClass('hover');
                $(this).closest('.hover-init').find('.hover').removeClass('hover');
                $(this).closest('.hover-init').addClass('hover');
                e.preventDefault();
            }
        });
        $('body').on('touchend', function(e) {
            if (e.target.className == "container") {
                $('.navbar-nav.mob-hide li').removeClass('hover');
            }
        });
    }
}
function mobiledetect() {
    setTimeout(function() {
        var windowHeight = $(window).height();
        var footer = $('footer>.container').outerHeight(true);
        var header = $('.outerdiv.hdr').outerHeight(true);
        var minpageHgt = windowHeight-(footer + header + 15);
        $('#wrapper>.container').css("min-height", minpageHgt + "px");
        //alert(minpageHgt + "ss");
    }, 0);
}
function collapselist() {

}

function collapseTeaserlist() {
    if (window.innerWidth < 768) {
        //alert('test');
        $('.mod-details .collapse').removeClass('in');
        $('.mod-details h2').addClass('collapsed');
    } else {
        //alert('test1'); 
        $('.mod-details .collapse').addClass('in');
        $('.mod-details h2').removeClass('collapsed');
    }
}
function mobilemenuHgt(){
    if (windowWidth <=767)
    {
        if ( $('html').hasClass('nav-expanded') ) {
        var windowHeight = $(window).height();
        var wrapperHeight = $("#wrapper").height();
        var footer = $('footer>.container').outerHeight(true);
        var header = $('.outerdiv.hdr').outerHeight(true);
        var mobmenuHgt = $(".nav.navbar-nav.desktop-hide").height();
        var minMenuHgt = mobmenuHgt + (15);
        var minpageHgt = minMenuHgt -(footer + header + 15);
        $('.nav-expanded nav.navbar-default').css("min-height", minMenuHgt + "px");
        //$('#wrapper').css("min-height", minMenuHgt + "px");
        $('#wrapper>.container').css("min-height", minpageHgt + "px");
        //$('.nav-expanded nav.navbar-default').css("min-height", "1px");
        //alert(minpageHgt)
        }
        else{
            $('nav.navbar-default').css("min-height", "1px");
            var windowHeight = $(window).innerHeight();
            var footer = $('footer>.container').outerHeight(true);
            var header = $('.outerdiv.hdr').outerHeight(true);
            var minpageHgt = windowHeight-(footer + header + 15);
            $('#wrapper>.container').css("min-height", minpageHgt + "px");
            //alert(minpageHgt + "hh");
        }    
    }   
}
$(window).on('load', function() {
    collapseTeaserlist();
    $('.accordion-toggle').addClass('collapsed');
    $('.accordion-body').removeClass('in');
    mobiledetect();
    (function($) {
        $.support.placeholder = ('placeholder' in document.createElement('input'));
    })(jQuery);

    //fix for IE7 and IE8
    $(function() {
        if (!$.support.placeholder) {
            $("[placeholder]").focus(function() {
                if ($(this).val() == $(this).attr("placeholder")) $(this).val("");
            }).blur(function() {
                if ($(this).val() == "") $(this).val($(this).attr("placeholder"));
            }).blur();

            $("[placeholder]").parents("form").submit(function() {
                $(this).find('[placeholder]').each(function() {
                    if ($(this).val() == $(this).attr("placeholder")) {
                        $(this).val("");
                    }
                });
            });
        }
    });
    if ($.fn.filestyle) {
        $(":file").filestyle({
            buttonBefore: true,
            buttonText: "Datei auswählen"
        });
    }
    $(".selectpicker").selectpicker('refresh');
    $(".powermail_select").selectpicker('refresh');
    //$('#nav-expander').on('touchstart click', function(e) {
    $('.mod-details.infocontent h2').on('click', function(e) {

    });
    $('.mod.data-list.tabbed.news > a').on('click', function(e) {
        // $('.scroll-pane').jScrollPane();
    });

    function customCheckbox(checkboxName) {
        var checkBox = $('input[class="' + checkboxName + '"]');
        $(checkBox).each(function() {
            $(this).wrap("<span class='custom-checkbox'></span>");
            if ($(this).is(':checked')) {
                $(this).parent().addClass("selected");
            }
        });
        $(checkBox).click(function() {
            $(this).parent().toggleClass("selected");
        });
    }

    function customRadio(radioName) {
        var radioButton = $('input[class="' + radioName + '"]');
        $(radioButton).each(function() {
            $(this).wrap("<span class='custom-radio'></span>");
            if ($(this).is(':checked')) {
                $(this).parent().addClass("selected");
            }
        });
        $(radioButton).click(function() {
            if ($(this).is(':checked')) {
                $(this).parent().addClass("selected");
            }
            $(radioButton).not(this).each(function() {
                $(this).parent().removeClass("selected");
            });
        });
    }

    function customRadio1(radioName1) {
        var radioButton1 = $('input[class="' + radioName1 + '"]');
        $(radioButton1).each(function() {
            $(this).wrap("<span class='custom-radio'></span>");
            if ($(this).is(':checked')) {
                $(this).parent().addClass("selected");
            }
        });
        $(radioButton1).click(function() {
            if ($(this).is(':checked')) {
                $(this).parent().addClass("selected");
            }
            $(radioButton1).not(this).each(function() {
                $(this).parent().removeClass("selected");
            });
        });
    }
    customCheckbox("custom-chkbox");
    //customCheckbox("powermail_checkbox");
    customRadio("custom-rdo");
    customRadio1("custom-rdo1");
    $('.scroll-pane').jScrollPane({
        hideFocus: true
    });
});
$(window).on('resize', function() {
    mobiledetect();
    collapseTeaserlist();
});

function set_min_height() {
    var height = $(window).height();
    var thirtypc = (70 * height) / 100;
    thirtypc = parseInt(thirtypc) + 'px';
    $('.content-wrapper').css('min-height', thirtypc);
}
$( window ).on( "orientationchange", function( event ) {
  //alert( "This device is in " + event.orientation + " mode!" );
  mobilemenuHgt();
  //postResize();

});
$(document).ready(function() {
    if ( $( ".mobdateFilterTo" ).length ) {
        /*$(".mobdateFilterTo").datepicker({
            orientation: 'right'
        });*/
    }
    
    
    $('.icon.btn-close').on('click touchstart', function(e) {
        //alert(e + "e");
        e.preventDefault();
        $('.mod.info').slideUp();
    });
    $('#nav-expander, .fixedoverlay').on('click touchstart', function(e) {
        e.preventDefault();
        $('html').toggleClass('nav-expanded');
        $('.fixedoverlay').toggleClass('show');
        if ($('.mod.info')){
            $('.mod.info').toggleClass('topmargin-info')
        }
        mobilemenuHgt();
    });
    $('#trigger, .mob-resetbtn .resetbtn').click(function(event) {
        //alert(event); 
        $('#trigger').toggleClass("eventactive");
        event.stopPropagation();
        $('#drop').toggle();
    }); 
    $('#accordion1 .resetbtn').click(function(event) {
      //  $('.accordion-body.collapse#collapseTwo').toggleClass("in");
    }); 
       
    $('button.mobsearch').click(function() {
        //alert('testing');
        $('input.mac-style').css('display', 'block');
        $('input.mac-style').focus();
    });
    $('.secondary-nav .icons img').on('hover touchstart', function(e) {
     //$('.secondary-nav .icons img').hover(function() {
        this.src = this.src.replace(/(.*)(\.[^.]+)$/, '$1-h$2');
    }, function() {
        this.src = this.src.replace(/-h(\.[^.]+)$/, '$1');
    });
    $('.scroll-pane').jScrollPane({
        hideFocus: true
    });
    $(".dropdown.pos-rel>span.icon-mobiledropdown").on("click", function(e) {
        //alert('test');
        var parent = $(this).parent('.dropdown');
        parent.toggleClass('open');
        parent.toggleClass('bold');
        mobilemenuHgt();
    });
    $(".dropdown-submenu>span.icon-mobiledropdown").on("click", function(e) {
        var parent = $(this).parent('.dropdown-submenu');
        parent.toggleClass('activelink');
        //children.closest('ul').css( "background-color", "red" );
        parent.children('.dropdown-menu').toggleClass('showmenu');
        //var parent1 = $(this).parents().find('.dropdown.pos-rel').attr('class');
        var parent1 = $(this).parent().parent().parent();
        parent1.removeClass('bold');
        console.log(parent1);
        if ((parent.siblings().hasClass('activelink')) || (parent.hasClass('activelink'))) {} else {
            parent1.addClass('bold');
        }
        mobilemenuHgt();
    });
    siteScript.init();
    $('body').on('click', '#lightbox', function(event) {
        $('#lightbox').hide();
    });
    $('#myCarousel').on('click', 'li', function(event) {
        setTimeout(function() {
            $('.scroll-pane').jScrollPane({
                hideFocus: true
            });
        }, 300);
    });
    $('#accordion').on('shown.bs.collapse', function() {
        //alert('test')
    });
    collapseTeaserlist();

    function customCheckbox(checkboxName) {
        var checkBox = $('input.' + checkboxName);
        checkBox.each(function() {
            $(this).wrap("<span class='custom-checkbox'></span>");
            if ($(this).is(':checked')) {
                $(this).parent().addClass("selected");
            }
        });
        $('body').on('click', 'input.' + checkboxName, function() {
            $(this).parent('span').toggleClass("selected");
        });
    }
    customCheckbox("powermail_checkbox");
    $("#myCarousel .carousel-inner, #carousel-example-generic.spotlight .carousel-inner").swiperight(function() {
        $(this).parent().carousel('prev');
    });
    $("#myCarousel .carousel-inner, #carousel-example-generic.spotlight .carousel-inner").swipeleft(function() {
        $(this).parent().carousel('next');
    });
    // $('.list-detail.galerie').on('click', '.mobdateFilterTo', function (event) {
    //     alert(event);
    // });
    $('.mod-details').on('click', 'h2', function(event) {
        // alert('scroll');
        setTimeout(function() {
            $('.scroll-pane').jScrollPane({
                hideFocus: true
            });
        }, 300);
    });
});