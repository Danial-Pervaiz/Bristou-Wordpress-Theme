$(window).on("load", function() {
    "use strict";
        var windowLoaded = false;
        $(window).on("load", function() {
            windowLoaded = true;
        });


    /*================== Mega Menu Tabs =====================*/
    $(".megamenu-posts").fadeOut();
    $(".megamenu-posts.active").fadeIn();
    $(".selectors > a").on("click",function(){
        $(this).siblings().removeClass("active");
        $(this).addClass("active");
        $(".megamenu-posts").slideUp().removeClass("active");
        var tab_name = $(this).data("name");
        $(".menu-content .megamenu-posts").each(function() {
            if ($(this).data("id") == tab_name) {
                $(this).slideDown().addClass("active");
            }
        });
    });

    /*================== Search =====================*/
    $(".search-btn").on("click", function() {
        $(this).parent().toggleClass("active");
        return false;
    });


    /*================== Responsive Sidemenu =====================*/
    $(".sidemenu-btn").on("click", function() {
        $(".theme-layout").toggleClass("stop");
        $(".sidemenu").toggleClass("slidein");
        return false;
    });
    $(".close-menu").on("click", function() {
        $(".theme-layout").removeClass("stop");
        $(".sidemenu").removeClass("slidein");
        return false;
    });

    /*================== Responsive Menu Dropdown =====================*/
    $(".sidemenu ul ul").parent().addClass("menu-item-has-children");
    $(".sidemenu ul li.menu-item-has-children > a").on("click", function() {
        $(this).parent().toggleClass("active").siblings().removeClass("active");
        $(this).next("ul").slideToggle();
        $(this).parent().siblings().find("ul").slideUp();
        return false;
    });

}); /*=== Window.Load Ends Here ===*/
