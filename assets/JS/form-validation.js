// log in form validation
function showForgotPassword() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('txt').style.display = 'none';
    document.getElementById('titre').style.display = 'none';
    document.getElementById('forgotPasswordForm').style.display = 'block';
}

function login() {
    // Clear previous error messages
    document.getElementById('loginEmailError').innerText = '';
    document.getElementById('loginPasswordError').innerText = '';

    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;

    // Validate email
    if (email.trim() === '') {
        document.getElementById('loginEmailError').innerText = 'Please enter your email.';
        return;
    }

    // Validate password
    if (password.trim() === '') {
        document.getElementById('loginPasswordError').innerText = 'Please enter your password.';
        return;
    }

    console.log('Logged in successfully!');
}

function sendResetLink() {
    // Clear previous error message
    document.getElementById('forgotPasswordEmailError').innerText = '';

    const email = document.getElementById('forgotPasswordEmail').value;

    // Validate email
    if (email.trim() === '') {
        document.getElementById('forgotPasswordEmailError').innerText = 'Please enter your email.';
        return;
    }


    console.log('Reset link sent successfully!');
}
function goToLoginForm() {
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('txt').style.display = 'block';
    document.getElementById('titre').style.display = 'block';
    document.getElementById('forgotPasswordForm').style.display = 'none';
}

//register form validation 

function validateForm() {
    // Clear previous error messages
    const errorSpans = document.getElementsByClassName('error');
    for (let i = 0; i < errorSpans.length; i++) {
        errorSpans[i].innerText = '';
    }

    // Get form values
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    // Validate name
    if (name.trim() === '') {
        document.getElementById('nameError').innerText = 'Please enter your name.';
    }

    // Validate email
    if (email.trim() === '') {
        document.getElementById('emailError').innerText = 'Please enter your email.';
    } else if (!isValidEmail(email)) {
        document.getElementById('emailError').innerText = 'Please enter a valid email address.';
    }

    // Validate password
    if (password.trim() === '') {
        document.getElementById('passwordError').innerText = 'Please enter a password.';
    }

    // Validate confirm password
    if (confirmPassword.trim() === '') {
        document.getElementById('confirmPasswordError').innerText = 'Please confirm your password.';
    } else if (password !== confirmPassword) {
        document.getElementById('confirmPasswordError').innerText = 'Passwords do not match.';
    }
}

// Function to validate email format
function isValidEmail(email) {
    // This regex pattern is a basic check for email format
    const emailPattern = /^\S+@\S+\.\S+$/;
    return emailPattern.test(email);
}




//contact page form validation 
function validateForm_contact() {
    // Clear previous error messages
    document.getElementById('nameError').innerText = '';
    document.getElementById('phoneError').innerText = '';
    document.getElementById('emailError').innerText = '';
    document.getElementById('messageError').innerText = '';

    // Fetch form input values
    const name = document.getElementById('name').value;
    const phoneNumber = document.getElementById('phoneNumber').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    // Regular expressions for email and phone number validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^[0-9]{10}$/;

    // Validate each field and display error messages
    if (name.trim() === '') {
        document.getElementById('nameError').innerText = 'Please enter your name.';
        return;
    }

    if (phoneNumber.trim() === '') {
        document.getElementById('phoneError').innerText = 'Please enter your phone number.';
        return;
    } else if (!phoneRegex.test(phoneNumber.trim())) {
        document.getElementById('phoneError').innerText = 'Please enter a valid phone number.';
        return;
    }

    if (email.trim() === '') {
        document.getElementById('emailError').innerText = 'Please enter your email.';
        return;
    } else if (!emailRegex.test(email.trim())) {
        document.getElementById('emailError').innerText = 'Please enter a valid email address.';
        return;
    }

    if (message.trim() === '') {
        document.getElementById('messageError').innerText = 'Please enter your message.';
        return;
    }

    // If all validations pass, you can proceed with form submission or further actions
    submitForm();
}

// Function to simulate form submission
function submitForm() {
    // Clear input fields after successful submission
    document.getElementById('name').value = '';
    document.getElementById('phoneNumber').value = '';
    document.getElementById('email').value = '';
    document.getElementById('message').value = '';

    // Display success message
    const successMessage = document.createElement('div');
    successMessage.innerText = 'Form submitted successfully!';
    successMessage.style.color = 'green';
    document.getElementById('contactForm').appendChild(successMessage);

    // Automatically remove success message after 3 seconds (3000 milliseconds)
    setTimeout(function() {
        successMessage.remove();
    }, 3000);
}
