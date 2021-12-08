document.querySelector('.menu-btn').addEventListener('click', () =>{
    document.querySelector('.nav-menu').classList.toggle('show');
});

ScrollReveal().reveal('.showcase');

ScrollReveal().reveal('.news-cards',{delay:500});

ScrollReveal().reveal('.wrapper',{delay:500});


/*var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("Pasar");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 9000); // Change image every 2 seconds
}*/