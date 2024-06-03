

// Adds a class 'js_on' to the <html> tag if JavaScript is enabled,
// also helps remove flickering...
document.documentElement.className += ' js_on ';

// Quick script to detect some more popular mobile devices
var detectedDeviceAgent = navigator.userAgent.toLowerCase();
var detectedAgentID = detectedDeviceAgent.match(/(android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini)/);
if (detectedAgentID) { document.body.className += ' mobile-detected'; }

// Signup Button
jQuery(document).ready(function($){
  $('p.signup-button a')
    .css({'backgroundPosition': '0 0'})
    .hover(function(){
	$(this).stop()
	  .animate({
	    'opacity': 0
	  }, 650);
	  },
	  function(){
	    $(this).stop()
	      .animate({
		'opacity': 1
	      }, 650);
	  }
    );
});

// Smooth scrolling related scripts
jQuery(document).ready(function($) {
    // "Back to Top" smooth scrolling
    $('a[href="#top"]').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false; // returning 'false' will prevent hashtag being added to URL
    });
    
    // Smooth page scrolling to an anchor on the same page
    if (udesign_script_vars.disable_smooth_scrolling_on_pages != 'yes') {
        $('a[href*="#"]:not([href="#"], a.vc_pagination-trigger, .wc-tabs li a, .vc_tta-tab a, .vc_tta-panel-title a, a.vc-carousel-control, a.vc_carousel-control, .wpb_tabs_nav a, a.acomment-reply.bp-primary-action)').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                // determine if the scroll-to target position should be offset (ex. if "Stay-on-Top" menu, "Admin Bar", etc.)
                var offsetElement = 0;
                if ($('body').hasClass('u-design-fixed-menu-on')) { offsetElement = 40; }
                if ($('body').hasClass('admin-bar')) { offsetElement += 32; }

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - offsetElement
                    }, 1000);
                    // if anchor is pointing to any "Tabs" then keep the hash "tab-..." else remove the hash
                    if ( this.hash.slice(1,5) === "tab-" ) {
                        return true; // add the hashtag to URL
                    } else {
                        return false; // remove hashtag from URL
                    }
                }
            }
        });
    }
});

// Menu Related Scripts
jQuery(document).ready(function($){
    var showAutoArrows = ( $('body').hasClass('u-design-menu-auto-arrows-on') ) ? 1 : 0;
    $("#navigation-menu ul.sf-menu").supersubs({
	minWidth:    12,   // minimum width of sub-menus in em units
	maxWidth:    15,   // maximum width of sub-menus in em units
	extraWidth:  1     // extra width can ensure lines don't sometimes turn over
			   // due to slight rounding differences and font-family
    }).superfish({	   
	hoverClass:    'sfHover', // the class applied to hovered list items
	delay:       700,  // the delay in milliseconds that the mouse can remain outside a submenu without it closing
	animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
	speed:       'normal',
        cssArrows:     showAutoArrows
    });
    
    // Fixed Menu
    var allowFixedMenuOnMobile = true;
    if ($("body").hasClass( "mobile-detected" ) && udesign_script_vars.remove_fixed_menu_on_mobile == 'yes') {
        allowFixedMenuOnMobile = false;
    }
    if ($('body').hasClass('u-design-fixed-menu-on') && allowFixedMenuOnMobile) {
        var distanceToMainMenu = $('#top-elements').height();
        var secondaryNavBarHeight = $("#secondary-navigation-bar-wrapper").height();
        $(window).scroll(function() {
                if ($(this).scrollTop() > (distanceToMainMenu + secondaryNavBarHeight) ) {
                    $('#sticky-menu-alias').css({
                        'display':'block', 
                        'height': distanceToMainMenu + $('#main-menu').height() + secondaryNavBarHeight
                    });
                    $('body').addClass('fixed-menu');
                } else {
                    $('body').removeClass('fixed-menu');
                    $('#sticky-menu-alias').css('display', 'none');
                }
        });
        $('#sticky-menu-logo').insertBefore("#navigation-menu .sf-menu");
    }
});

/**
 * CoolInput Plugin
 *
 * @version 1.5 (10/09/2009)
 * @requires jQuery v1.2.6+
 * @author Alex Weber <alexweber.com.br>
 * @author Evan Winslow <ewinslow@cs.stanford.edu> (v1.5)
 * @copyright Copyright (c) 2008-2009, Alex Weber
 * @see http://remysharp.com/2007/01/25/jquery-tutorial-text-box-hints/
 *
 * Distributed under the terms of the GNU General Public License
 * http://www.gnu.org/licenses/gpl-3.0.html
 */
jQuery(document).ready(function($){
    $.fn.coolinput=function(b){
	var c={
	    hint:null,
	    source:"value",
	    blurClass:"blur",
	    iconClass:false,
	    clearOnSubmit:true,
	    clearOnFocus:true,
	    persistent:true
	};if(b&&typeof b=="object")
	    $.extend(c,b);else
	    c.hint=b;return this.each(function(){
	    var d=$(this);var e=c.hint||d.attr(c.source);var f=c.blurClass;function g(){
		if(d.val()=="")
		    d.val(e).addClass(f)
		    }
	    function h(){
		if(d.val()==e&&d.hasClass(f))
		    d.val("").removeClass(f)
		    }
	    if(e){
		if(c.persistent)
		    d.blur(g);if(c.clearOnFocus)
		    d.focus(h);if(c.clearOnSubmit)
		    d.parents("form:first").submit(h);if(c.iconClass)
		    d.addClass(c.iconClass);g()
		}
	    })
	}
});
jQuery(document).ready(function($){
	// first input box is a search box, notice passing of a custom class and an icon to the coolInput function
	$('#search_field').coolinput({
		blurClass: 'blur'
	});
        
        // add placeholder attribute to the default Search widget form
        $(".widget_search input#s").attr("placeholder", udesign_script_vars.search_widget_placeholder);
        $(".widget_search input#searchsubmit").val(''); // remove default value "Search"
});


// ThumbCaption script
jQuery(document).ready(function($){
    $(".portfolio-img-thumb-1-col, .portfolio-img-thumb-2-col, .portfolio-img-thumb-3-col, .portfolio-img-thumb-4-col").hover(function(){
	    var info=$(this).find(".hover-opacity");
	    info.stop().animate({opacity:0.4},600);
    },
    function(){
	    var info=$(this).find(".hover-opacity");
	    info.stop().animate({opacity:1},800);
    });

    $(".post-image").hover(function(){
	    var info=$(this).find(".hover-opacity");
	    info.stop().animate({opacity:0.6},400);
    },
    function(){
	    var info=$(this).find(".hover-opacity");
	    info.stop().animate({opacity:1},600);
    });
});

// jQuery Validate
jQuery(document).ready(function($){
    if( $('body').hasClass('page-template-page-Contact-php') ) {
	// load js translated strings only when Contact page template is loaded
	$("#contactForm").validate({
	    rules: {
		    contact_name: {
			    required: true,
			    minlength: 2
		    },
		    contact_email: {
			    required: true,
			    email: true
		    },
		    contact_message: $('input#rules_contact_message').val()
	    },
	    messages: {
		    contact_name: {
			    required: $('input#contact_name_required').val(),
			    minlength: $('input#contact_name_min_length').val()
		    },
		    contact_email: $('input#messages_contact_email').val(),
		    contact_message: $('input#messages_contact_message').val()
	    }
	});
	// phone number + extension format validator
	$("#contact_phone_NA_format").mask("(999) 999-9999");
	$("#contact_ext_NA_format").mask("? 99999");
    }
});


// Content Toggle
jQuery(function($){
    // Initial state of toggle (hide)
    $(".slide_toggle_content").hide();
    // Process Toggle click (http://api.jquery.com/toggle/)
    $("h4.slide_toggle").toggle(function(){
	    $(this).addClass("clicked");
	}, function () {
	    $(this).removeClass("clicked");
    });
    // Toggle animation (http://api.jquery.com/slideToggle/)
    $("h4.slide_toggle").click(function(){
	$(this).next(".slide_toggle_content").slideToggle();
    });
});

// Content Accordion
jQuery(document).ready(function($){
    var $accordionHeader = $('.accordion-toggle'),
        $accordionHeaderOpenDefault = $('.accordion-toggle:first'),
        $accordionContent = $('.accordion-container');
        
    $accordionContent.hide();
    $accordionHeaderOpenDefault.addClass('active').next().show();
    $accordionHeader.click(function(){
        var $this = $(this);
        if( $this.next().is(':hidden') ) {
            $accordionHeader.removeClass('active').next().slideUp();
            $this.toggleClass('active').next().slideDown();
        }
        return false; // Prevent the browser jump to the link anchor
    });
});

//Page Peel
jQuery(document).ready(function($){
    $("#page-peel").hover(function() {
	$("#page-peel img, .msg_block").stop()
	.animate({width: '307px', height: '319px'}, 500);
    }, function() {
	$("#page-peel img").stop()
	.animate({width: '50px', height: '52px'}, 220);
	$(".msg_block").stop()
	.animate({width: '50px', height: '50px'}, 200);
    });
});

// remove the title attributes from the main menu and Subpages Widget
jQuery(document).ready(function($) {
        // remove 'title' attribute from menu items
        $("#navigation-menu a, .widget_subpages a").removeAttr("title");
        // Add the 'default' cursor when hover to menu link that have no links
        $('#navigation-menu a').each(function() {
            if ( !$(this).attr("href") ) {
                $(this).addClass("default-cursor");
            }
        });
});

// Tabs
jQuery(document).ready(function($){
    $('.tabs-wrapper .tabs a').click(function(){
        // Switch the tabs
        switch_tabs($(this));
        // Add URL hash to clicked tab without page jump
        if(history.pushState) {
            history.pushState(null, null, '#'+$(this).attr('id'));
        } else { // fall back for older browsers
            window.location.hash = "tabs";
        }
    });
    switch_tabs($('.defaulttab'));
    function switch_tabs(obj) {
        $('.tabs-wrapper .tab-content').hide();
        $('.tabs-wrapper .tabs a').removeClass("selected");
        var id = obj.attr("id");
        $('#'+id+'-content').show();
        obj.addClass("selected");
    }
    // The following allows to link with hashtag to a specific tab when the hashtag has been changed
    $(window).bind( 'hashchange', function(e) {
        // Grabs the hash tag from the url
        var hash = encodeURI(window.location.hash.substring(1));
            
        // Checks whether a hash tag is set and if it matches any of the tab id's
        if ( hash != "" && $('.tabs-wrapper .tabs a[id$="'+hash+'"]' ).attr('id') ) {
            // Removes all 'selected' classes from tabs
            $('.tabs-wrapper .tabs a').each(function() {
                $(this).removeClass('selected');
            });
            // This will add the 'selected' class to the matched tab
            var link = "";
            $('.tabs-wrapper .tabs a').each(function() {
                link = $(this).attr('id');
                if (link == hash) {
                    $(this).addClass('selected');
                }
            });
            // Take care of the content part of each tab accordingly
            $('.tabs-wrapper .tab-content').each(function() {
                link = $(this).attr('id');
                if (link == hash+'-content') {
                    $(this).css({
                        "display":"block"
                    }); 
                } else {
                    $(this).css({
                        "display":"none"
                    }); 
                }
            });
        }
    });
    $(window).trigger( 'hashchange' );
});

// Takes care of multiple WP galleries with prettyPhoto in a single page/post 
jQuery(document).ready(function($) {
    $('.gallery').each(function(g) {
        $(".gallery-item a[rel*='wp-prettyPhoto[gallery]']", this).each(function() {
            $(this).attr('rel', function() {
                return this.rel.replace('wp-prettyPhoto[gallery]', 'wp-prettyPhoto[gallery-' + g + ']');
            });
        });
    });
});

