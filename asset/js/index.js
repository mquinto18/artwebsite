
let whiteLine = document.querySelector(".white-line");
let cart = document.querySelector(".cart");

let profileImg = document.querySelector(".profile-img");
let userLogout = document.querySelector(".user-logout");
let closeBtn = document.querySelector(".closebtnLog");


function scrollHeader(){
    const headerColor = document.querySelector(".header-menu");
    if(this.scrollY >= 80) headerColor.classList.add("header-scroll");
}
window.addEventListener("scroll", scrollHeader);


///////////////////////////
closeBtn.addEventListener("click", function(){
  userLogout.style.display = "none";
})
profileImg.addEventListener("click", function(){
  userLogout.style.display = "block";
});


var swiperArt = new Swiper(".mySwiper", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 50,
    stretch: -100,
    depth: 500,
    modifier: 1,
    slideShadows: true,
  },
  pagination: {
    el: ".swiper-pagination",
  },
});

const sr = ScrollReveal({
  origin: "top",
  distance: "60px",
  durantion: 2500,
  delay: 400
})
sr.reveal(`.title-name`);
sr.reveal(`.title-button`, {delay:500})
sr.reveal(`.section-title`, {delay:600})
sr.reveal(`.content`, {interval: 100});
sr.reveal(`.third-title`, {origin:"bottom"});
sr.reveal(`.third-line`, {origin:"left"});
sr.reveal(`.text-description`, {origin:"left"});
sr.reveal(`.third-btn`, {origin:"right"});
sr.reveal(`.third-text, .third-texts`);
sr.reveal(`.swiper-wrapper`, {delay:0})
sr.reveal(`.fourth-title`);
sr.reveal(`.first-content`, {origin:"bottom", interval: 80});
sr.reveal(`.left`, {origin:"left"});
sr.reveal(`.right`, {origin:"right"});
sr.reveal(`.fifth-line`, {origin:"left"});
sr.reveal(`.fifth-btn`, {origin:"bottom"});
sr.reveal(`.sixth-title,.sixth-description`, {origin:"left"});
sr.reveal(`.sixth-updated`, {origin:"right"});
sr.reveal(`.sixth-img`, {origin:"left", delay:500});
sr.reveal(`.seven-first, .seven-two, .seven-two`, {origin:"bottom"});





