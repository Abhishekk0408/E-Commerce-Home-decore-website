let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let x = document.getElementsByClassName("mySlides1");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 3000); // Change slide every 2 seconds
}
