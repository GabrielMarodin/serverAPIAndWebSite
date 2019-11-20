var slideIndex = 0;
showSlides();

function showSlides(){

  var i;
  var j;

  var slides = document.getElementsByClassName("mySlides");

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slideIndex++;

  if (slideIndex > slides.length) {slideIndex = 1}

  slides[slideIndex-1].style.display = "block";

  var child;
  var id;
  var element;
  
  for(j = 0; j < slides[slideIndex-1].childNodes.length; j++){
    child = slides[slideIndex-1].childNodes[j];
    if(child.nodeName == 'VIDEO' || child.nodeName == 'IMG'){
        id = child.id;
    }
  }

  element = document.getElementById(id.toString());

  var length = Number(element.dataset.duracao) * 1000;
  console.log(length)

  if (element.tagName == 'VIDEO') {
    element.play(); 
  }

  setTimeout(showSlides, length);
}