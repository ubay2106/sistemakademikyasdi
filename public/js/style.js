
//bars
const bars = document.querySelector('#bars');
const navMenu = document.querySelector('#nav-menu');

bars.addEventListener('click', function(){
    bars.classList.toggle('bars-active');
    navMenu.classList.toggle('hidden');
});

//nav
window.onscroll = function(){
    const header = document.querySelector('header');
    const fixednav = header.offsetTop;

    if(window.pageYOffset > fixednav){
        header.classList.add('nav-fixed');
    } else {
        header.classList.remove('nav-fixed');
    }

};

// dropdown pendi
const pendidikanLink = document.querySelector('#dropdown-pendidikan').previousElementSibling;
const dropdownPendidikan = document.getElementById('dropdown-pendidikan');

pendidikanLink.addEventListener('click', function (e) {
    const isMobile = window.innerWidth < 1024;
    if (isMobile) {
        e.preventDefault();
        dropdownPendidikan.classList.toggle('hidden');
    }
});

document.addEventListener('click', function (e) {
    const isMobile = window.innerWidth < 1024;
    if (isMobile && !pendidikanLink.contains(e.target)) {
        dropdownPendidikan.classList.add('hidden');
    }
});

// swiper
const swiper = new Swiper('.swiper', {
    speed: 400,
    spaceBetween: 30,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true
    },
    grabCursor: true,
    breakpoints: {
        640: {
            slidesPerView: 1
        },
        768: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 3
        },
    }
});

