const carousel = document.querySelector(".carousel");
const carouselContainer = document.querySelector(".carousel-container");
const prevButton = document.querySelector(".carousel-prev");
const nextButton = document.querySelector(".carousel-next");
const carouselImages = document.querySelectorAll(".carousel-container img");

let currentIndex = 0;

function slide() {
  carouselContainer.style.transform = `translateX(-${currentIndex * 25}%)`;
}

prevButton.addEventListener("click", () => {
  currentIndex--;
  if (currentIndex < 0) {
    currentIndex = carouselImages.length - 4;
  }
  slide();
});

nextButton.addEventListener("click", () => {
  currentIndex++;
  if (currentIndex >= carouselImages.length) {
    currentIndex =   0;
  }
  slide();
});