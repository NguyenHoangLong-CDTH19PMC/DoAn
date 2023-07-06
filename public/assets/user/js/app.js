NN_FRAMEWORK.Menu = function () {
    $(window).scroll(function () {
        if ($(window).scrollTop() >= $(".header").height())
            $(".menu").addClass("menu-sticky");
        else $(".menu").removeClass("menu-sticky");
    });
    /* tạo menu mobile */
    var menu_mobi = $("ul.menu_desktop").html();
    $(".load-menu").append(
        '<span class="close_menu">X</span><ul>' + menu_mobi + "</ul>"
    );
    $(".menu_mobi_add ul li").each(function (index, element) {
        if ($(this).children("ul").children("li").length > 0) {
            $(this)
                .children("a")
                .append('<i class="fas fa-chevron-right"></i>');
        }
    });
    $(".menu_mobi_add ul li a i").click(function () {
        if ($(this).parent("a").hasClass("active2")) {
            $(this).parent("a").removeClass("active2");
            if (
                $(this).parent("a").parent("li").children("ul").children("li")
                    .length > 0
            ) {
                $(this).parent("a").parent("li").children("ul").hide(300);
                return false;
            }
        } else {
            $(this).parent("a").addClass("active2");
            if (
                $(this).parents("li").children("ul").children("li").length > 0
            ) {
                $(".menu_m ul li ul").hide(0);
                $(this).parents("li").children("ul").show(300);
                return false;
            }
        }
    });

    $(".icon_menu_mobi,.close_menu,.menu_baophu").click(function () {
        if ($(".menu_mobi_add").hasClass("menu_mobi_active")) {
            $(".menu_mobi_add").removeClass("menu_mobi_active");
            $(".menu_baophu").fadeOut(300);
        } else {
            $(".menu_mobi_add").addClass("menu_mobi_active");
            $(".menu_baophu").fadeIn(300);
        }
        return false;
    });
};

/* Wow */
NN_FRAMEWORK.Wows = function () {
    new WOW().init();
};

/* */
NN_FRAMEWORK.scrolltoTop = function () {
    $(document).ready(function () {
        "use strict";
        var progressPath = document.querySelector(".progress-wrap path");
        var pathLength = progressPath.getTotalLength();
        progressPath.style.transition = progressPath.style.WebkitTransition =
            "none";
        progressPath.style.strokeDasharray = pathLength + " " + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition =
            "stroke-dashoffset 10ms linear";
        var updateProgress = function () {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var progress = pathLength - (scroll * pathLength) / height;
            progressPath.style.strokeDashoffset = progress;
        };
        updateProgress();
        $(window).scroll(updateProgress);
        var offset = 150;
        var duration = 550;
        $(window).on("scroll", function () {
            if ($(this).scrollTop() > offset) {
                $(".progress-wrap").addClass("active-progress");
            } else {
                $(".progress-wrap").removeClass("active-progress");
            }
        });
        $(".progress-wrap").on("click", function (event) {
            event.preventDefault();
            $("html, body").animate(
                {
                    scrollTop: 0,
                },
                duration
            );
            return false;
        });
    });
};

/* Owl Data */
NN_FRAMEWORK.OwlData = function (obj) {
    if (obj.length < 0) return false;
    var xsm_items = obj.attr("data-xsm-items");
    var sm_items = obj.attr("data-sm-items");
    var md_items = obj.attr("data-md-items");
    var lg_items = obj.attr("data-lg-items");
    var xlg_items = obj.attr("data-xlg-items");
    var rewind = obj.attr("data-rewind");
    var autoplay = obj.attr("data-autoplay");
    var loop = obj.attr("data-loop");
    var lazyLoad = obj.attr("data-lazyload");
    var mouseDrag = obj.attr("data-mousedrag");
    var touchDrag = obj.attr("data-touchdrag");
    var animations = obj.attr("data-animations");
    var smartSpeed = obj.attr("data-smartspeed");
    var autoplaySpeed = obj.attr("data-autoplayspeed");
    var autoplayTimeout = obj.attr("data-autoplaytimeout");
    var dots = obj.attr("data-dots");
    var nav = obj.attr("data-nav");
    var navText = false;
    var navContainer = false;
    var responsive = {};
    var responsiveClass = true;
    var responsiveRefreshRate = 200;

    if (xsm_items != "") {
        xsm_items = xsm_items.split(":");
    }
    if (sm_items != "") {
        sm_items = sm_items.split(":");
    }
    if (md_items != "") {
        md_items = md_items.split(":");
    }
    if (lg_items != "") {
        lg_items = lg_items.split(":");
    }
    if (xlg_items != "") {
        xlg_items = xlg_items.split(":");
    }
    if (rewind == 1) {
        rewind = true;
    } else {
        rewind = false;
    }
    if (autoplay == 1) {
        autoplay = true;
    } else {
        autoplay = false;
    }
    if (loop == 1) {
        loop = true;
    } else {
        loop = false;
    }
    if (lazyLoad == 1) {
        lazyLoad = true;
    } else {
        lazyLoad = false;
    }
    if (mouseDrag == 1) {
        mouseDrag = true;
    } else {
        mouseDrag = false;
    }
    if (animations != "") {
        animations = animations;
    } else {
        animations = false;
    }
    if (smartSpeed > 0) {
        smartSpeed = Number(smartSpeed);
    } else {
        smartSpeed = 800;
    }
    if (autoplaySpeed > 0) {
        autoplaySpeed = Number(autoplaySpeed);
    } else {
        autoplaySpeed = 800;
    }
    if (autoplayTimeout > 0) {
        autoplayTimeout = Number(autoplayTimeout);
    } else {
        autoplayTimeout = 5000;
    }
    if (dots == 1) {
        dots = true;
    } else {
        dots = false;
    }
    if (nav == 1) {
        nav = true;
        navText = obj.attr("data-navtext");
        navContainer = obj.attr("data-navcontainer");

        if (navText != "") {
            navText =
                navText.indexOf("|") > 0
                    ? navText.split("|")
                    : navText.split(":");
            navText = [navText[0], navText[1]];
        }

        if (navContainer != "") {
            navContainer = navContainer;
        }
    } else {
        nav = false;
    }

    responsive = {
        0: {
            items: Number(xsm_items[0]),
            margin: Number(xsm_items[1]),
        },
        576: {
            items: Number(sm_items[0]),
            margin: Number(sm_items[1]),
        },
        768: {
            items: Number(md_items[0]),
            margin: Number(md_items[1]),
        },
        992: {
            items: Number(lg_items[0]),
            margin: Number(lg_items[1]),
        },
        1200: {
            items: Number(xlg_items[0]),
            margin: Number(xlg_items[1]),
        },
    };

    obj.owlCarousel({
        rewind: rewind,
        autoplay: autoplay,
        loop: loop,
        lazyLoad: lazyLoad,
        mouseDrag: mouseDrag,
        touchDrag: touchDrag,
        smartSpeed: smartSpeed,
        autoplaySpeed: autoplaySpeed,
        autoplayTimeout: autoplayTimeout,
        dots: dots,
        nav: nav,
        navText: navText,
        navContainer: navContainer,
        responsiveClass: responsiveClass,
        responsiveRefreshRate: responsiveRefreshRate,
        responsive: responsive,
    });

    if (autoplay) {
        obj.on("translate.owl.carousel", function (event) {
            obj.trigger("stop.owl.autoplay");
        });

        obj.on("translated.owl.carousel", function (event) {
            obj.trigger("play.owl.autoplay", [autoplayTimeout]);
        });
    }

    if (animations && obj.find("[owl-item-animation]").length > 0) {
        var animation_now = "";
        var animation_count = 0;
        var animations_excuted = [];
        var animations_list = animations.indexOf(",")
            ? animations.split(",")
            : animations;

        obj.on("changed.owl.carousel", function (event) {
            $(this)
                .find(".owl-item.active")
                .find("[owl-item-animation]")
                .removeClass(animation_now);
        });

        obj.on("translate.owl.carousel", function (event) {
            var item = event.item.index;

            if (Array.isArray(animations_list)) {
                var animation_trim = animations_list[animation_count].trim();

                if (!animations_excuted.includes(animation_trim)) {
                    animation_now = "animate__animated " + animation_trim;
                    animations_excuted.push(animation_trim);
                    animation_count++;
                }

                if (animations_excuted.length == animations_list.length) {
                    animation_count = 0;
                    animations_excuted = [];
                }
            } else {
                animation_now = "animate__animated " + animations_list.trim();
            }
            $(this)
                .find(".owl-item")
                .eq(item)
                .find("[owl-item-animation]")
                .addClass(animation_now);
        });
    }
};

/* Owl Page */
NN_FRAMEWORK.OwlPage = function () {
    if ($(".owl-page").length > 0) {
        $(".owl-page").each(function () {
            NN_FRAMEWORK.OwlData($(this));
        });
    }
    if (".owl-slideshow".length > 0) {
        $(".owl-slideshow").owlCarousel({
            items: 1,
            rewind: true,
            autoplay: true,
            loop: false,
            lazyLoad: false,
            mouseDrag: false,
            touchDrag: false,
            animateIn: "slideOutDown",
            animateOut: "flipInX",
            margin: 0,
            smartSpeed: 500,
            autoplaySpeed: 3500,
            nav: false,
            dots: false,
        });
        $(".prev-slideshow").click(function () {
            $(".owl-slideshow").trigger("prev.owl.carousel");
        });
        $(".next-slideshow").click(function () {
            $(".owl-slideshow").trigger("next.owl.carousel");
        });
    }
};

NN_FRAMEWORK.Cart = function () {
    if ($(".color-pro-detail").length > 0) {
        $(document).on("click", ".color-pro-detail input", function () {
            $this = $(this).parents(".color-pro-detail");
            if ($this.hasClass("active")) {
                $(".color-pro-detail").removeClass("active");
                $this.removeClass("active");
            } else {
                $(".color-pro-detail").removeClass("active");
                $this.addClass("active");
            }
        });
    }

    if ($(".size-pro-detail").length > 0) {
        $(document).on("click", ".size-pro-detail input", function () {
            $this = $(this).parents(".size-pro-detail");
            if ($this.hasClass("active")) {
                $(".size-pro-detail").removeClass("active");
                $this.removeClass("active");
            } else {
                $(".size-pro-detail").removeClass("active");
                $this.addClass("active");
            }
        });
    }
    /* Add Cart */
    $("body").on("click", ".add-cart", function () {
        $this = $(this);
        $parents = $this.parents().parents(".right-pro-detail");
        var id = $this.data("id");
        var quantity = $parents
            .find(".quantity-pro-detail")
            .find(".qty-pro")
            .val();
        quantity = quantity ? quantity : 1;

        var color = $parents.find(".color-pro-detail input:checked").val();

        color = color ? color : 0;

        var size = $parents.find(".size-pro-detail input:checked").val();

        if (id) {
            $.ajax({
                type: "GET",
                url: "/addcart",
                data: {
                    id: id,
                    id_color: color,
                    id_size: size,
                    quantity: quantity,
                },
                success: function (response) {
                    Swal.fire({
                        title: "Thông báo",
                        text: "Thêm vào giỏ hàng thành công",
                        icon: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Vào giỏ hàng!",
                        cancelButtonText: "Tiếp tục mua hàng",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/cart";
                        }
                    });
                },
            });
        }
    });

    /* Delete Cart */
    $("body").on("click", ".del-procart", function () {
        var code_order = $(this).data("code");
        Swal.fire({
            title: "Thông báo",
            text: "Bạn muốn xóa sản phẩm này khỏi giỏ hàng ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Đồng ý",
            cancelButtonText: "Huỷ",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: "/remove",
                    data: {
                        code: code_order,
                    },
                    success: function (response) {
                        window.location.reload();
                    },
                });
            }
        });
    });

    /* Counter */
	$('body').on('click', '.counter-procart', function () {
		var $button = $(this);
		var quantity = 1;
		var input = $button.parent().find('input');
		var id = input.data('pid');
		var code = input.data('code');
		var oldValue = $button.parent().find('input').val();
		if ($button.text() == '+') quantity = parseFloat(oldValue) + 1;
		else if (oldValue > 1) quantity = parseFloat(oldValue) - 1;
		$button.parent().find('input').val(quantity);
		updateCart(id, code, quantity);
	});

    /* Quantity detail page */
	if ($('.quantity-pro-detail span').length > 0) {
		$('.quantity-pro-detail span').click(function () {
			var $button = $(this);
			var oldValue = $button.parent().find('.qty-pro').val();
			if ($button.text() == '+') {
				var newVal = parseFloat(oldValue) + 1;
			} else {
				if (oldValue > 1) var newVal = parseFloat(oldValue) - 1;
				else var newVal = 1;
			}
			$button.parent().find('input').val(newVal);
		});
	}
};
NN_FRAMEWORK.Search = function () {
    /* Search */
    $("body").on("click", ".btn-search", function () {
        var keyword = $("#keyword").val();
        if ($("#keyword").val() == "") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Bạn chưa nhập từ khoá!",
            });
        } 
        else{
            window.location.href = "/search/"+$("#keyword").val();
        }
    });
};

/* Ready */
$(document).ready(function () {
    NN_FRAMEWORK.Menu();
    NN_FRAMEWORK.OwlPage();
    NN_FRAMEWORK.Wows();
    NN_FRAMEWORK.scrolltoTop();
    NN_FRAMEWORK.Cart();
    NN_FRAMEWORK.Search();
});
