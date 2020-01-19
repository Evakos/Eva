// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = () => scrollFunction();

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {

    document.querySelector('.nav-header').style.height = '65px';

    //document.querySelector('.nav-header').style.position = 'fixed';

    document.querySelector('.nav-header').style.transition = 'height .5s';

    document.querySelector('img.custom-logo').style.width = '25px';

    document.querySelector('img.custom-logo').style.transition = 'width .5s';

  } else {

    document.querySelector('.nav-header').style.height = '80px';
    document.querySelector('img.custom-logo').style.width = '50px';

  }
}