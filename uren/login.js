const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

// Your existing JavaScript code

// Add the following event listeners for the form submissions

// const signUpForm = document.querySelector('.sign-up-container form');
// signUpForm.addEventListener('submit', function(e) {
//     const errors = document.querySelectorAll('.overlay-panel.overlay-left .alert-danger');
//     if (errors.length > 0) {
//         container.classList.add('right-panel-active');
//         e.preventDefault();
//     }
// });

// const signInForm = document.querySelector('.sign-in-container form');
// signInForm.addEventListener('submit', function(e) {
//     const errors = document.querySelectorAll('.overlay-panel.overlay-right .alert-danger');
//     if (errors.length > 0) {
//         container.classList.remove('right-panel-active');
//         e.preventDefault();
//     }
// });


