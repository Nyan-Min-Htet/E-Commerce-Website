var swiper = new Swiper(".mySwiper", {
    direction: "horizontal",
    slidesPerView: 1,
    spaceBetween: 30,
    mousewheel: true,
    loop: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    pagination: {
    el: ".swiper-pagination",
    clickable: true,
    },
  });
let mybutton =document.getElementById('top');
  window.onscroll =function(){scrollFunction()};
  function scrollFunction(){
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
      }
  function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
}
document.addEventListener('DOMContentLoaded', () => {
  const slider = document.querySelector('.feedback-slider');
  const items = document.querySelectorAll('.feedback-item');

  // Clone items for smooth infinite scrolling
  items.forEach(item => {
    const clone = item.cloneNode(true);
    slider.appendChild(clone);
  });

  let currentIndex = 0;

  setInterval(() => {
    items[currentIndex].style.opacity = '0';
    currentIndex = (currentIndex + 1) % items.length;
    items[currentIndex].style.opacity = '1';
  }, 5000); // Adjust time between slides
});

