// INIZIO LOGIN

let signUpButton = document.getElementById('signUp');
let signInButton = document.getElementById('signIn');
let container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

// FINE LOGIN

//BARRA DI RICERCA INIZIO NAVBAR


//BARRA DI RICERCA FINE NAVBAR

//swiper

var swiper = new Swiper(".mySwiper", {
  pagination: {
    el: ".swiper-pagination",
  },
});





// // ottieni tutti gli elementi x-_locale nella dropdown
// const localeElements = document.querySelectorAll('.dropdown .dropdown-menu x-_locale');

// // ottieni l'elemento li come dropdown button
// const liElement = document.querySelector('.dropdown .btn');

// // per ogni elemento, ascolta l'evento click
// localeElements.forEach(element => {
//   element.addEventListener('click', () => {
//     // sostituisci l'elemento li con la bandiera selezionata
//     const selectedLocale = element.getAttribute('lang');
//     liElement.innerHTML = `<x-_locale lang="${selectedLocale}" class="rounded-circle"/>`;
//   });
// });
