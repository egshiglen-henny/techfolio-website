// Egshiglen Enkhbayar, 2024359

// -------------------- CONTACT FORM VALIDATION --------------------
function validateForm() { // Defining function for validating contact form
    const firstName = document.getElementById('firstName').value.trim(); // Getting and trimming the first name input
    const surname = document.getElementById('surname').value.trim(); // Getting and trimming the surname input
    const phone = document.getElementById('phone').value.trim(); // Getting and trimming the phone number input
    const email = document.getElementById('email').value.trim(); // Getting and trimming the email input
    const message = document.getElementById('message').value.trim(); // Getting and trimming the message input
    const consentCheckbox = document.getElementById('consent'); // Getting the GDPR consent checkbox

    const namePattern = /^[A-Za-z\s]+$/; // Defining regex for validating name
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // Defining regex for validating email
    const phonePattern = /^\d+$/; // Defining regex for validating phone number

    if (!namePattern.test(firstName)) { // Checking if first name is valid
        alert("Please enter a valid FIRST NAME."); // Showing alert if invalid
        return false; // Stopping form submission
    }

    if (!namePattern.test(surname)) { // Checking if surname is valid
        alert("Please enter a valid SURNAME."); // Showing alert if invalid
        return false; // Stopping form submission
    }

    if (phone === "" || !phonePattern.test(phone) || phone.length < 9 || phone.length > 10) { // Validating phone number format and length
        alert("Please enter a valid PHONE NUMBER (9–10 digits)."); // Showing alert for invalid phone
        return false; // Stopping form submission
    }

    if (!emailPattern.test(email)) { // Validating email format
        alert("Invalid EMAIL format."); // Showing alert for invalid email
        return false; // Stopping form submission
    }

    if (message === "") { // Checking if message is empty
        alert("Please enter your message."); // Showing alert for empty message
        return false; // Stopping form submission
    }

    if (!consentCheckbox.checked) { // Checking if GDPR consent checkbox is ticked
        alert("You must accept the GDPR policy."); // Showing alert if not ticked
        return false; // Stopping form submission
    }

    const selectedEmoji = document.getElementById('emojiCaptchaAnswer').value; // Getting the selected emoji for CAPTCHA
    if (selectedEmoji !== '🐱') { // Validating the emoji CAPTCHA selection
        alert("❌ Wrong CAPTCHA. Please click on the cat 🐱."); // Showing alert for incorrect selection
        return false; // Stopping form submission
    }

    alert("Form submitted successfully!"); // Showing success message
    return true; // Allowing form submission
}

function selectEmojiCaptcha(answer, button) { // Defining function for selecting emoji captcha answer
  document.getElementById('emojiCaptchaAnswer').value = answer; // Setting the hidden input with selected emoji

  // Optional: visually highlight selected button
  document.querySelectorAll('.emoji-captcha-selected').forEach(btn => btn.classList.remove('emoji-captcha-selected')); // Removing highlight from all emoji buttons
  button.classList.add('emoji-captcha-selected'); // Highlighting the clicked emoji button
}

// -------------------- REGISTRATION CAPTCHA --------------------
let captchaAnswer = 0; // Initializing the registration math CAPTCHA answer

function generateCaptchaNum() { // Defining function to generate simple math CAPTCHA
    const a = Math.floor(Math.random() * 10); // Generating random number a
    const b = Math.floor(Math.random() * 10); // Generating random number b
    captchaAnswer = a + b; // Storing sum of a and b as answer
    const q = document.getElementById('captcha-question'); // Getting the CAPTCHA display element
    if (q) q.textContent = `What is ${a} + ${b}?`; // Displaying CAPTCHA question
}

function validateRegisterForm() { // Defining function for validating registration form
    const firstName = document.getElementById('firstName').value.trim(); // Getting first name input
    const surname = document.getElementById('surname').value.trim(); // Getting surname input
    const email = document.getElementById('email').value.trim(); // Getting email input
    const password = document.getElementById('password').value; // Getting password input
    const confirmPassword = document.getElementById('confirm_password').value; // Getting confirmation password input
    const captchaInput = document.getElementById('captcha-input').value.trim(); // Getting CAPTCHA input

    const namePattern = /^[A-Za-z\s]+$/; // Regex for name validation
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // Regex for email validation
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/; // Regex for strong password validation

    if (!namePattern.test(firstName) || !namePattern.test(surname)) { // Validating first and surname
        alert("Please enter a valid name (letters only)."); // Alerting if names are invalid
        return false; // Stopping form submission
    }

    if (!emailPattern.test(email)) { // Validating email format
        alert("Invalid EMAIL format."); // Alerting if email is invalid
        return false; // Stopping form submission
    }

    if (!passwordPattern.test(password)) { // Validating password format
        alert("Password must include upper, lower, number, and special char."); // Alerting invalid password
        return false; // Stopping form submission
    }

    if (password !== confirmPassword) { // Comparing passwords
        alert("Passwords do not match."); // Alerting if they don’t match
        return false; // Stopping form submission
    }

    if (captchaInput === "" || parseInt(captchaInput) !== captchaAnswer) { // Validating CAPTCHA input
        alert("Incorrect CAPTCHA. Try again."); // Alerting if incorrect
        generateCaptchaNum(); // Regenerating CAPTCHA
        return false; // Stopping form submission
    }

    return true; // Allowing registration form to submit
}

// -------------------- LOGIN CAPTCHA --------------------
function generateCaptchaAlph() { // Defining function for generating alphanumeric CAPTCHA
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; // Declaring characters to choose from
    let captcha = ''; // Initializing empty string to store CAPTCHA
    for (let i = 0; i < 6; i++) { // Looping 6 times to create 6-character CAPTCHA
        captcha += chars.charAt(Math.floor(Math.random() * chars.length)); // Appending random character from 'chars'
    }
    return captcha; // Returning the generated CAPTCHA string
}

function setupLoginCaptcha() { // Defining function to set up CAPTCHA on login form
    const captchaTextEl = document.getElementById('captchaText'); // Getting the element to display CAPTCHA
    const form = document.getElementById('loginForm'); // Getting the login form element
    if (!captchaTextEl || !form) return; // Exiting if CAPTCHA element or form is missing

    const captchaText = generateCaptchaAlph(); // Calling function to generate CAPTCHA
    captchaTextEl.textContent = captchaText; // Displaying CAPTCHA in HTML element
    sessionStorage.setItem('captcha', captchaText); // Saving CAPTCHA in session storage
}

// -------------------- LOGIN FORM VALIDATION --------------------
function validateLoginForm() { // Defining function to validate login form
    const email = document.getElementById('email').value.trim(); // Getting and trimming email input
    const password = document.getElementById('password').value; // Getting password input
    const captchaInput = document.getElementById('captcha')?.value.trim(); // Getting and trimming CAPTCHA input (optional chaining used)
    const storedCaptcha = sessionStorage.getItem('captcha'); // Retrieving stored CAPTCHA from session

    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // Defining regex for email validation
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/; // Defining regex for strong password validation

    // Step 1: Validating email input
    if (!emailPattern.test(email)) { // Checking if email matches pattern
        alert("Invalid email format."); // Alerting user if email is invalid
        return false; // Preventing form submission
    }

    // Step 2: Validating password input
    if (!passwordPattern.test(password)) { // Checking if password matches pattern
        alert("Password must meet complexity rules."); // Alerting user if password is weak
        return false; // Preventing form submission
    }

    // Step 3: Validating CAPTCHA input
    if (!captchaInput || captchaInput !== storedCaptcha) { // Comparing user input with stored CAPTCHA
        alert('❌ CAPTCHA incorrect!'); // Alerting user if CAPTCHA does not match
        return false; // Preventing form submission
    }

    return true; // ✅ Returning true if all validations pass
}

document.addEventListener('DOMContentLoaded', () => { // Listening for the DOM to finish loading
  // Theme
  const theme = localStorage.getItem('theme'); // Getting the saved theme from local storage
  if (theme === 'dark') { // Checking if the theme is set to dark
    document.body.classList.add('dark-mode'); // Applying dark mode to the body
  }

  // Captchas
  generateCaptchaNum();      // Calling function to generate math CAPTCHA for registration
  setupLoginCaptcha();       // Calling function to generate alphanumeric CAPTCHA for login
});

// 🌙 Theme Toggle Script
function toggleTheme() { // Defining function to toggle theme mode
  document.body.classList.toggle('dark-mode'); // Toggling the dark-mode class on the body
  const currentTheme = document.body.classList.contains('dark-mode') ? 'dark' : 'light'; // Checking the current theme

  // Saving to localStorage
  localStorage.setItem('theme', currentTheme); // Saving the theme in localStorage

  // Saving to server via AJAX
  fetch('update_theme.php', { // Sending theme value to the server
    method: 'POST', // Using POST request
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, // Setting header
    body: 'theme=' + encodeURIComponent(currentTheme) // Encoding and sending the theme value
  });

  // Saving as cookie (expires in 30 days)
  document.cookie = "techfolio_theme=" + currentTheme + "; path=/; max-age=" + (30*24*60*60); // Setting a cookie with theme value
}

function acceptCookies() { // Defining function for accepting cookies
  document.cookie = "cookieConsent=true; path=/; max-age=31536000"; // Setting a cookie to store user consent for 1 year
  document.getElementById("cookie-banner").style.display = "none"; // Hiding the cookie banner
}

function checkCookieConsent() { // Defining function to check for cookie consent
  const cookies = document.cookie.split(';').map(c => c.trim()); // Splitting and trimming cookies
  const consentGiven = cookies.some(c => c.startsWith("cookieConsent=")); // Checking if consent cookie exists
  if (!consentGiven) { // If consent not found
    document.getElementById("cookie-banner").style.display = "block"; // Showing the cookie banner
  }
}

document.addEventListener('DOMContentLoaded', () => { // Listening for DOMContentLoaded again
  checkCookieConsent(); // Calling the function to check for cookie consent
});