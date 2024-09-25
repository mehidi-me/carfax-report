let links = document.querySelector(".links");
let mnuBtn = document.querySelector(".menu");
function menu() {
  links.classList.toggle("active");
  mnuBtn.classList.toggle("active");
}
window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  header.classList.toggle("sticky", window.scrollY > 0);
});

const questions = document.querySelectorAll(".question");

questions.forEach((question) => {
  question.addEventListener("click", () => {
    // Toggle the clicked FAQ question
    question.classList.toggle("active");
    const answer = question.nextElementSibling;
    const ico = question.querySelector(".ico");

    // Show or hide the answer and icon
    if (answer.classList.contains("show")) {
      answer.classList.remove("show");
      ico.classList.remove("open");
    } else {
      answer.classList.add("show");
      ico.classList.add("open");
    }
  });
});


