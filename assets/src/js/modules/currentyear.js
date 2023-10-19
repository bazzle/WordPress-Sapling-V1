const elem = document.querySelector('.js-year');
const currentYear= new Date().getFullYear();
elem.textContent = currentYear;