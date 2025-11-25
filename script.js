// Menu Toggle
const menuButton = document.getElementById('menu-button');
const navLinks = document.querySelector('.nav-links');

menuButton.addEventListener('click', () => {
    navLinks.classList.toggle('open');
    const isOpen = navLinks.classList.contains('open');
    menuButton.innerHTML = isOpen ? '✕' : '☰';
    menuButton.setAttribute('aria-expanded', isOpen);
});

// Close menu when a link is clicked
navLinks.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
        if(navLinks.classList.contains('open')) {
            navLinks.classList.remove('open');
            menuButton.innerHTML = '☰';
            menuButton.setAttribute('aria-expanded', false);
        }
    });
});

// Auto-hide navbar on scroll down
let lastScroll = 0;
const navbar = document.querySelector('.navbar');

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    if(currentScroll > lastScroll){
        navbar.style.top = "-90px";
    } else {
        navbar.style.top = "0px";
    }
    lastScroll = currentScroll;
});

// Contact Form
const contactForm = document.getElementById('contact-form-id');
const messageDiv = document.getElementById('form-message');

contactForm.addEventListener('submit', function(e){
    e.preventDefault();
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    if(!name || !email){
        messageDiv.textContent = "Please fill out all required fields.";
        messageDiv.style.color = "red";
    } else {
        messageDiv.textContent = "Thank you! I will get back to you soon.";
        messageDiv.style.color = "green";
        contactForm.reset();
    }
});
