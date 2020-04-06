const menu = document.querySelector(".navigation-menu");
const hamburger = document.querySelector(".menu-icon");
const cross = document.querySelector(".cross-icon");
const eventReadMoreBtn = document.querySelector(".event-read-more");
const expandedEvent = document.querySelector(".event-card-expanded");
const eventThumbnail = document.querySelector(".thumbnail-image");
const eventShortInfo = document.querySelector(".event-short-info");

eventReadMoreBtn.addEventListener("click", e => {
  expandedEvent.classList.toggle("expand");
  eventThumbnail.classList.toggle("image-appear");
  eventShortInfo.classList.toggle("hide");
});

hamburger.addEventListener("click", e => {
  menu.classList.add("appear");
});

cross.addEventListener("click", e => {
  menu.classList.remove("appear");
});

const newsCards = document.querySelectorAll(".news-card");

newsCards.forEach(card => {
  const readMoreButton = card.querySelector(".news-read-more-button");
  const readLessButton = card.querySelector(".news-read-less-button");
  const newsParagraph = card.querySelector(".news-card-paragraph");
  readMoreButton.addEventListener("click", () => {
    newsParagraph.classList.add("visible");
    readMoreButton.classList.add("hidden");
    readLessButton.classList.remove("hidden");
  });
  readLessButton.addEventListener("click", () => {
    newsParagraph.classList.remove("visible");
    readMoreButton.classList.remove("hidden");
    readLessButton.classList.add("hidden");
  });
});

// onclick news filter.

const filterNewsContent = document.querySelector(".filter-content");
const filterNewsButton = document.querySelector(".news-filter");

filterNewsButton.addEventListener("click", () => {
  filterNewsContent.classList.toggle("toggle-filter");
  filterNewsButton.classList.toggle("news-filter-borders");
});
