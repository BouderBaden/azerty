const menuHamburger = document.querySelector(".menu-hamburger")
const navLinks = document.querySelector(".contenant-liste-boutons")
const choices = document.querySelectorAll('.boutons a');

menuHamburger.addEventListener('click',()=>{
navLinks.classList.toggle('mobile-menu')
})
choices.forEach(choice => {
choice.addEventListener('click', () => {
    navLinks.classList.remove('mobile-menu');
});
});

const loader = document.querySelector('.loader');

window.addEventListener('load', () => {

    loader.classList.add('fondu-out');

})