"use strict";

// main.js 3/15/23
// Author: Ben Hillman
// Stores the selected theme, 
// selected theme will automatically be applied on page reloads.
// Validation for sign in and sign up pages

const $ = selector => document.querySelector(selector);


// Theme Local Storage
// Grab all input elements that have the name attribute = to theme
const themes = document.querySelectorAll('[name="theme"]');

// loop through each theme in themes and add an eventlistener for when the input is clicked,
// call the storeTheme function and pass it the id of the clicked input
themes.forEach((theme) => {
    theme.addEventListener('click', () => {
        storeTheme(theme.id);
    });
});

// store the id the clicked input in local storage
const storeTheme = function(theme) {
    localStorage.setItem("theme", theme);
};

// when the DOM is loaded, call getTheme,
// get the value from key value pair in local storage setting it to variable selectedTheme,
// loop through each theme checking if the id matches selecedTheme to then check the correct theme
const getTheme = () => {
    const selectedTheme = localStorage.getItem("theme");
    themes.forEach((theme) => {
        if(theme.id === selectedTheme) {
            theme.checked = true;
            const label = document.querySelector(`[for="${selectedTheme}"]`);
            if (label) {
                label.classList.add("active");
            }
        } 
        else {
            const label = document.querySelector(`[for="${theme.id}"]`);
            if (label) {
                label.classList.remove("active");
            }
        }
    });
};

document.addEventListener("DOMContentLoaded", () => {
    getTheme();

    // Toggle Active Class
    // Grab each label with the class of theme-label
    const themeLabel = document.getElementsByClassName("theme-label");

    // Loop through each label adding a click event listener,
    // to remove and add the active class to the clicked label
    for(let i = 0; i < themeLabel.length; i++) {
        themeLabel[i].addEventListener('click', function(event) {
            let current = document.getElementsByClassName("active");
            if (current.length > 0) {
                current[0].classList.remove("active");
            }
            event.target.classList.add("active");
        });
    };


    // Grabs sign in form if it exists on the current page
    const signInForm = $("#signInForm");

    if (signInForm) {
        // Function to validate input in sign in form when submitted
        signInForm.addEventListener("submit", (event) => {

            // Prevents form from clearing inputs when submitted
            event.preventDefault();

            // Grab input variables
            const password = $("#password").value;
            const email = $("#email").value;

            // Grab error span tag
            const passwordError = document.querySelector("#password + .error");
            const emailError = document.querySelector("#email + .error");

            // Email pattern for validation
            const emailPattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
            let emailPassed = false;
            let pswdPassed = false;

            // !isNaN Throws error if input is only numbers or empty
            // Clears error when input is correct
            if(!isNaN(password)) {
                passwordError.textContent = "Please enter a valid password";
            }
            else if (password.length < 5) {
                passwordError.textContent = "Password must be more than 4 characters";
            }
            else {
                passwordError.textContent = "";
                pswdPassed = true
            }

            if(!emailPattern.test(email)) {
                emailError.textContent = "Please enter a valid email";
            }
            else {
                emailError.textContent = "";
                emailPassed = true;
            }

            if (emailPassed && pswdPassed)
            {
                document.getElementById("signInForm").submit();
            }
        });
    };

    // Grabs sign up form if it exists on the current page
    const signUpForm = $("#signUpForm");

    if(signUpForm) {
        // Function to validate input in sign up form when submitted
        signUpForm.addEventListener("submit", (event) => {

            // Prevents form from clearing inputs when submitted
            event.preventDefault();

            // Grab input variables
            const username = $("#username").value;
            const password = $("#password").value;
            const confirmPassword = $("#confirm-password").value;
            const email = $("#email").value;
            // const isValid = true;
            let usernamePassed = false;
            let passwordPassed = false;
            let confirmPasswordPassed = false;
            let emailPassed = false;

            // Grab error span tag
            const usernameError = document.querySelector("#username + .error");
            const passwordError = document.querySelector("#password + .error");
            const confirmError = document.querySelector("#confirm-password + .error");
            const emailError = document.querySelector("#email + .error");

            // Email pattern for validation
            const emailPattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

            // !isNaN() Throws error if input is only numbers or empty
            // Clears error when input is correct
            if(!isNaN(username)) {
                usernameError.textContent = "Please enter a valid username";
                // isValid = false;
            }
            else if(username.length < 2) {
                usernameError.textContent = "Username must be more than 1 character";
                // isValid = false;
            }
            else {
                usernameError.textContent = "";
                usernamePassed = true;
            }

            if(!isNaN(password)) {
                passwordError.textContent = "Please enter a valid password";
            }
            else if (password.length < 5) {
                passwordError.textContent = "Password must be more than 4 characters";
                // isValid = false;
            }
            else {
                passwordError.textContent = "";
                passwordPassed = true;
            }

            if(confirmPassword !== password) {
                confirmError.textContent = "Incorrect password";
                // isValid = false;
            }
            else if(!isNaN(confirmPassword)) {
                confirmError.textContent = "Confirm password";
                // isValid = false;
            }
            else {
                confirmError.textContent = "";
                confirmPasswordPassed = true;
            }

            if(!emailPattern.test(email)) {
                emailError.textContent = "Please enter a valid email";
                // isValid = false;
            }
            else {
                emailError.textContent = "";
                emailPassed = true;
            }

            if (usernamePassed && passwordPassed && confirmPasswordPassed && emailPassed) {
                document.getElementById("signUpForm").submit();
            }
        });
    };

    //code for all tool bar button functionality 
    const elements = document.querySelectorAll('.button')

    elements.forEach(element => {
        element.addEventListener('click', () => {
            let command = element.dataset['element'];

            document.execCommand(command, false, null);
        });
    });

    const manuscript = document.querySelector("#manuscript");
    //let storeText = document.querySelector("#db-manuscript");
    const projectEditorForm = $("#project_editor_form");

    if(projectEditorForm) {
        projectEditorForm.addEventListener("submit", (event) => {

            event.preventDefault();
            
            //storeText = manuscript.textContent;
            $("#db-manuscript").value = encodeURI(manuscript.innerHTML);

            //console.log(storeText);

            projectEditorForm.submit();
        });
    }
});


