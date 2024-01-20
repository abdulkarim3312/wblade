// Header Scroll

let nav = document.querySelector(".navbar");
if (nav) {
    window.onscroll = function () {
        if (document.documentElement.scrollTop > 100) {
            nav.classList.add("header-scrolled");
        } else {
            nav.classList.remove("header-scrolled");
        }
    };

    // Nav Hide

    let navBar = document.querySelectorAll(".nav-link");
    let navCollapse = document.querySelector(".navbar-collapse.collapse");

    navBar.forEach(function (a) {
        a.addEventListener("click", function () {
            navCollapse.classList.remove("show");
        });
    });

    var swiper = new Swiper(".mySwiper", {
        loop: true,
        speed: 1000,
        centeredSlides: false,
        // grabCursor: true,
        slidesPerView: 4,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            // type: "progressbar",
        },
        breakpoints: {
            1200: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 2,
            },
            400: {
                slidesPerView: 2,
            },
            0: {
                slidesPerView: 1,
            },
        },
    });

    var clientSwiper = new Swiper(".clientSwiper", {
        loop: true,
        speed: 1000,
        centeredSlides: false,
        slidesPerView: 4,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            1200: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 2,
            },
            400: {
                slidesPerView: 2,
            },
            0: {
                slidesPerView: 1,
            },
        },
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
    });
}
