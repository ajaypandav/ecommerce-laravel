(function(a) {
    a(".animsition").animsition({
        inClass: "fade-in",
        outClass: "fade-out",
        inDuration: 1500,
        outDuration: 800,
        linkElement: ".animsition-link",
        loading: !0,
        loadingParentElement: "html",
        loadingClass: "animsition-loading-1",
        loadingInner: '<div data-loader="ball-scale"></div>',
        timeout: !1,
        timeoutCountdown: 5E3,
        onLoadEvent: !0,
        browser: ["animation-duration", "-webkit-animation-duration"],
        overlay: !1,
        overlayClass: "animsition-overlay-slide",
        overlayParentElement: "html",
        transition: function(a) {
            window.location.href = a
        }
    });
    var g = a(window).height() / 2;
    a(window).on("scroll", function() {
        a(this).scrollTop() > g ? a("#myBtn").css("display", "flex") : a("#myBtn").css("display", "none")
    });
    a("#myBtn").on("click", function() {
        a("html, body").animate({
            scrollTop: 0
        }, 300)
    });
    var d = a(".topbar").height(),
        e = a(".container-menu-header");
    a(window).on("scroll", function() {
        if (a(this).scrollTop() >= d) a(".header1").addClass("fixed-header"), a(e).css("top", -d);
        else {
            var b = -a(this).scrollTop();
            a(e).css("top", b);
            a(".header1").removeClass("fixed-header")
        }
        200 <= a(this).scrollTop() && 992 < a(window).width() ? (a(".fixed-header2").addClass("show-fixed-header2"), a(".header2").css("visibility", "hidden"), a(".header2").find(".header-dropdown").removeClass("show-header-dropdown")) : (a(".fixed-header2").removeClass("show-fixed-header2"), a(".header2").css("visibility", "visible"), a(".fixed-header2").find(".header-dropdown").removeClass("show-header-dropdown"))
    });
    a(".btn-show-menu-mobile").on("click", function() {
        a(this).toggleClass("is-active");
        a(".wrap-side-menu").slideToggle()
    });
    for (var f = a(".arrow-main-menu"), c = 0; c < f.length; c++) a(f[c]).on("click", function() {
        a(this).parent().find(".sub-menu").slideToggle();
        a(this).toggleClass("turn-arrow")
    });
    a(window).resize(function() {
        992 <= a(window).width() && ("block" == a(".wrap-side-menu").css("display") && (a(".wrap-side-menu").css("display", "none"), a(".btn-show-menu-mobile").toggleClass("is-active")), "block" == a(".sub-menu").css("display") && (a(".sub-menu").css("display", "none"), a(".arrow-main-menu").removeClass("turn-arrow")))
    });
    a(".btn-romove-top-noti").on("click", function() {
        a(this).parent().remove()
    });
    a(".block2-btn-addwishlist").on("click", function(b) {
        b.preventDefault();
        a(this).addClass("block2-btn-towishlist");
        a(this).removeClass("block2-btn-addwishlist");
        a(this).off("click")
    });
    a(".btn-num-product-down").on("click", function(b) {
        b.preventDefault();
        b = Number(a(this).next().val());
        1 < b && a(this).next().val(b - 1)
    });
    a(".btn-num-product-up").on("click", function(b) {
        b.preventDefault();
        b = Number(a(this).prev().val());
        $(this).siblings('.num-product').attr('max') > b && a(this).prev().val(b + 1)
    });
    a(".active-dropdown-content .js-toggle-dropdown-content").toggleClass("show-dropdown-content");
    a(".active-dropdown-content .dropdown-content").slideToggle("fast");
    a(".js-toggle-dropdown-content").on("click", function() {
        a(this).toggleClass("show-dropdown-content");
        a(this).parent().find(".dropdown-content").slideToggle("fast")
    });
    var h = a(".video-mo-01").children("iframe").attr("src");
    a('[data-target="#modal-video-01"]').on("click", function() {
        a(".video-mo-01").children("iframe")[0].src += "&autoplay=1";
        setTimeout(function() {
            a(".video-mo-01").css("opacity", "1")
        }, 300)
    });
    a('[data-dismiss="modal"]').on("click", function() {
        a(".video-mo-01").children("iframe")[0].src = h;
        a(".video-mo-01").css("opacity", "0")
    })
})(jQuery);

// Allow Numbers only
jQuery(document).on('input', '.number', function(event) {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// Allow Numbers with decimal only
jQuery(document).on('input', '.number-decimal', function(event) {
    this.value = this.value.replace(/[^0-9.]/g, '');
});