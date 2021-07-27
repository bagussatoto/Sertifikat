!function (t, e, a) {
    var i = {
        css: myPrefix + "asset/theme/frontend/css/",
        js: myPrefix + "asset/theme/frontend/js/vendor/"
    }, n = {_jquery_cdn: myPrefix+"asset/theme/frontend/js/vendor/jquery.min.js",
        _jquery_local: i.js + "jquery.min.js", _fastclick: i.js + "fastclick.min.js", _slick: i.js + "slick.min.js", _equalheight: i.js + "equalheight.min.js"}, s = {init: function () {
            s.fastClick(), s.enableActiveStateMobile(), s.WPViewportFix(), s.fill_img(), s.homeSlider(), s.equalize(), s.tabNav(), t.Site = s
        }, fastClick: function () {
            Modernizr.load({load: n._fastclick, complete: function () {
                    FastClick.attach(e.body)
                }})
        }, enableActiveStateMobile: function () {
            e.addEventListener && e.addEventListener("touchstart", function () {
            }, !0)
        }, WPViewportFix: function () {
            if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
                var t = e.createElement("style"), a = e.createTextNode("@-ms-viewport{width:auto!important}");
                t.appendChild(a), e.getElementsByTagName("head")[0].appendChild(t)
            }
        }, fill_img: function () {
            function t() {
                setTimeout(function () {
                    var t = $(".fill-img > img");
                    t.each(function (t, e) {
                        var a = $(e).attr("src");
                        $(e).parent().css("background-image", "url(" + a + ")")
                    })
                }, 50)
            }
            Modernizr.load({complete: function () {
                    t()
                }})
        }, homeSlider: function () {
            var t = $(".home-slider"), e = ($(".home-slider__item"), {speed: 1e3, autoplay: !0, autoplaySpeed: 3e3, dots: !0, prevArrow: '<button type="button" class="btn-prev"><span class="icon-angle-left"></span><span class="sr-only">Prev</span></button>', nextArrow: '<button type="button" class="btn-next"><span class="icon-angle-right"></span><span class="sr-only">Next</span></button>'});
            t.length && Modernizr.load({load: n._slick, complete: function () {
                    t.slick(e), $(".ultah-slider").slick({arrows: !1, speed: 1e3, autoplay: !0, autoplaySpeed: 3e3, dots: !0}), $(".latest-list").slick(e)
                }})
        }, equalize: function () {
            var e = "[data-equal]";
            Modernizr.load({load: n._equalheight, complete: function () {
                    equalheight(e), t.onload = function () {
                        equalheight(e)
                    }, $(t).resize(function () {
                        equalheight(e)
                    })
                }})
        }, tabNav: function () {
            var t = $(".tab-nav a"), a = $(".tab-btn--trigger"), i = ".tab-content ";
            a.click(function (t) {
                t.preventDefault(), t.stopPropagation(), $(this).next().addClass("is-show"), $("body").addClass("no-scroll")
            }), $(e).click(function () {
                a.next().hasClass("is-show") && (a.next().removeClass("is-show"), $("body").removeClass("no-scroll"))
            }), t.on("click", function (t) {
                var e = $(this).attr("href"), a = $(this).closest(".tab-nav").find(".tab-btn--trigger .btn-text"), n = $(this).children("span").text();
                $(this).attr("title");
                $(i + e).show().siblings().hide(), console.log(e), $(this).parent("li").addClass("active-tab").siblings().removeClass("active-tab"), a.text(n), t.preventDefault()
            })
        }}, o = function () {
        Modernizr.load([{test: t.jQuery, nope: n._jquery_local, complete: s.init}])
    };
    Modernizr.load({load: n._jquery_local, complete: o})
}(window, document);