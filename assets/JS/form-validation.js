// // log in form validation
// function showForgotPassword() {
//     document.getElementById('loginForm').style.display = 'none';
//     document.getElementById('txt').style.display = 'none';
//     document.getElementById('titre').style.display = 'none';
//     document.getElementById('forgotPasswordForm').style.display = 'block';
// }

// function login() {
//     // Clear previous error messages
//     document.getElementById('loginEmailError').innerText = '';
//     document.getElementById('loginPasswordError').innerText = '';

//     const email = document.getElementById('loginEmail').value;
//     const password = document.getElementById('loginPassword').value;

//     // Validate email
//     if (email.trim() === '') {
//         document.getElementById('loginEmailError').innerText = 'Please enter your email.';
//         return;
//     }

//     // Validate password
//     if (password.trim() === '') {
//         document.getElementById('loginPasswordError').innerText = 'Please enter your password.';
//         return;
//     }

//     console.log('Logged in successfully!');
// }

// function sendResetLink() {
//     // Clear previous error message
//     document.getElementById('forgotPasswordEmailError').innerText = '';

//     const email = document.getElementById('forgotPasswordEmail').value;

//     // Validate email
//     if (email.trim() === '') {
//         document.getElementById('forgotPasswordEmailError').innerText = 'Please enter your email.';
//         return;
//     }


//     console.log('Reset link sent successfully!');
// }
// function goToLoginForm() {
//     document.getElementById('loginForm').style.display = 'block';
//     document.getElementById('txt').style.display = 'block';
//     document.getElementById('titre').style.display = 'block';
//     document.getElementById('forgotPasswordForm').style.display = 'none';
// }

//register form validation 

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("registrationForm").addEventListener("submit", function(event) {
        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let password = document.getElementById("password").value;
        let confirmPassword = document.getElementById("confirmPassword").value;

        let nameError = document.getElementById("nameError");
        let emailError = document.getElementById("emailError");
        let passwordError = document.getElementById("passwordError");
        let confirmPasswordError = document.getElementById("confirmPasswordError");

        let isValid = true;

        // Name validation
        if (name === "") {
            nameError.textContent = "Please enter your name";
            isValid = false;
        } else {
            nameError.textContent = "";
        }

        // Email validation
        if (email === "") {
            emailError.textContent = "Please enter your email address";
            isValid = false;
        } else {
            emailError.textContent = "";
        }

        // Password validation
        if (password === "") {
            passwordError.textContent = "Please enter a password";
            isValid = false;
        } else if (password.length < 8) {
            passwordError.textContent = "Password must be at least 8 characters";
            isValid = false;
        } else {
            passwordError.textContent = "";
        }

        // Confirm Password validation
        if (confirmPassword === "") {
            confirmPasswordError.textContent = "Please confirm your password";
            isValid = false;
        } else if (password !== confirmPassword) {
            confirmPasswordError.textContent = "Passwords do not match";
            isValid = false;
        } else {
            confirmPasswordError.textContent = "";
        }

        if (!isValid) {
            event.preventDefault(); // Prevent the form from submitting if validation fails
        }
    });
});




// //contact page form validation 
// function validateForm_contact() {
//     // Clear previous error messages
//     document.getElementById('nameError').innerText = '';
//     document.getElementById('phoneError').innerText = '';
//     document.getElementById('emailError').innerText = '';
//     document.getElementById('messageError').innerText = '';

//     // Fetch form input values
//     const name = document.getElementById('name').value;
//     const phoneNumber = document.getElementById('phoneNumber').value;
//     const email = document.getElementById('email').value;
//     const message = document.getElementById('message').value;

//     // Regular expressions for email and phone number validation
//     const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//     const phoneRegex = /^[0-9]{10}$/;

//     // Validate each field and display error messages
//     if (name.trim() === '') {
//         document.getElementById('nameError').innerText = 'Please enter your name.';
//         return;
//     }

//     if (phoneNumber.trim() === '') {
//         document.getElementById('phoneError').innerText = 'Please enter your phone number.';
//         return;
//     } else if (!phoneRegex.test(phoneNumber.trim())) {
//         document.getElementById('phoneError').innerText = 'Please enter a valid phone number.';
//         return;
//     }

//     if (email.trim() === '') {
//         document.getElementById('emailError').innerText = 'Please enter your email.';
//         return;
//     } else if (!emailRegex.test(email.trim())) {
//         document.getElementById('emailError').innerText = 'Please enter a valid email address.';
//         return;
//     }

//     if (message.trim() === '') {
//         document.getElementById('messageError').innerText = 'Please enter your message.';
//         return;
//     }

//     // If all validations pass, you can proceed with form submission or further actions
//     submitForm();
// }

// // Function to simulate form submission
// function submitForm() {
//     // Clear input fields after successful submission
//     document.getElementById('name').value = '';
//     document.getElementById('phoneNumber').value = '';
//     document.getElementById('email').value = '';
//     document.getElementById('message').value = '';

//     // Display success message
//     const successMessage = document.createElement('div');
//     successMessage.innerText = 'Form submitted successfully!';
//     successMessage.style.color = 'green';
//     document.getElementById('contactForm').appendChild(successMessage);

//     // Automatically remove success message after 3 seconds (3000 milliseconds)
//     setTimeout(function() {
//         successMessage.remove();
//     }, 3000);
// }
