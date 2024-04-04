/* vanilla js*/

let navbar = document.querySelector(".header .navbar");

document.querySelector("#menu-btn").onclick = () => {
  navbar.classList.toggle("active");
};

window.onscroll = () => {
  navbar.classList.remove("active");
};

document.querySelectorAll(".contact .row .faq .box h3").forEach((faqBox) => {
  faqBox.onclick = () => {
    faqBox.parentElement.classList.toggle("active");
  };
});

document.querySelectorAll(".goals .statements .box h3").forEach((goalBox) => {
  goalBox.onclick = () => {
    goalBox.parentElement.classList.toggle("active");
  };
});

var swiper = new Swiper(".doctor-slider", {
  loop: true,
  slidesPerView: 1,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  breakpoints: {
    560: {
      slidesPerView: 2,
    },
    950: {
      slidesPerView: 2,
    },
    1250: {
      slidesPerView: 1,
    },
  },
});

var swiper = new Swiper(".search", {
  loop: true,
  slidesPerView: 1,
  spaceBetween: 20, // Adjust the value to set the desired spacing
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  breakpoints: {
    560: {
      slidesPerView: 2,
    },
    950: {
      slidesPerView: 2,
    },
    1250: {
      slidesPerView: 4,
    },
  },
});

var swiper = new Swiper(".reviews-slider", {
  loop: true,
  slidesPerView: "auto",
  grabCursor: true,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  breakpoints: {
    768: {
      slidesPerView: 1,
    },
    991: {
      slidesPerView: 2,
    },
  },
});
