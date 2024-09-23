document.addEventListener("DOMContentLoaded", function() {
    const registrationForm = document.querySelector('form[action="../controllers/RegistrationController.php"]');
    const loginForm = document.querySelector('form[action="../controllers/LoginController.php"]');
    const changePasswordForm = document.querySelector('form[action="../controllers/ChangePasswordController.php"]'); // Adjust as needed
    const updateProfileForm = document.querySelector('form[action="../controllers/UpdateProfileController.php"]'); // Adjust as needed

    function validateForm(form, type) {
        let valid = true;
        const email = form.querySelector('input[name="email"]');
        const password = form.querySelector('input[name="password"]');
        const confirmPassword = form.querySelector('input[name="confirm_password"]');
        const contactNumber = form.querySelector('input[name="contact_number"]');
        const genderMale = form.querySelector('input[name="gender"][value="male"]');
        const genderFemale = form.querySelector('input[name="gender"][value="female"]');

        form.querySelectorAll('.error').forEach(span => {
            span.textContent = '';
        });

        if (type === 'registration') {
            if (email.value.trim() === '') {
                form.querySelector('span[data-error="email"]').textContent = "Please fill up the email properly!";
                valid = false;
            }

            if (password.value.trim() === '') {
                form.querySelector('span[data-error="password"]').textContent = "Please fill up the password properly!";
                valid = false;
            }

            if (confirmPassword.value.trim() === '' || confirmPassword.value !== password.value) {
                form.querySelector('span[data-error="confirm_password"]').textContent = "Passwords do not match!";
                valid = false;
            }

            if (contactNumber.value.trim() === '') {
                form.querySelector('span[data-error="contact_number"]').textContent = "Please fill up the contact number!";
                valid = false;
            }

            if (!genderMale.checked && !genderFemale.checked) {
                form.querySelector('span[data-error="gender"]').textContent = "Please select a gender!";
                valid = false;
            }

            // Check if email exists via AJAX
            if (valid) {
                fetch("../controllers/checkEmail.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "email=" + encodeURIComponent(email.value)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        form.querySelector('span[data-error="email"]').textContent = "This email is already registered.";
                        valid = false;
                    }
                });
            }

        } else if (type === 'login') {
            if (email.value.trim() === '') {
                form.querySelector('span[data-error="login_email"]').textContent = "Please fill up the email!";
                valid = false;
            }

            if (password.value.trim() === '') {
                form.querySelector('span[data-error="login_password"]').textContent = "Please fill up the password!";
                valid = false;
            }
        }

        return valid;
    }

    if (registrationForm) {
        registrationForm.addEventListener('submit', function(event) {
            if (!validateForm(registrationForm, 'registration')) {
                event.preventDefault();
            }
        });
    }

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            if (!validateForm(loginForm, 'login')) {
                event.preventDefault();
            }
        });
    }

    // Old password check for change password
    if (changePasswordForm) {
        const oldPasswordField = changePasswordForm.querySelector('input[name="old_password"]');
        oldPasswordField.addEventListener("blur", function() {
            const oldPassword = oldPasswordField.value;

            if (oldPassword) {
                fetch("../controllers/checkOldPassword.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "old_password=" + encodeURIComponent(oldPassword)
                })
                .then(response => response.json())
                .then(data => {
                    const errorSpan = changePasswordForm.querySelector('.error'); // Adjust selector as needed
                    if (!data.valid) {
                        errorSpan.textContent = "Old password is incorrect.";
                    } else {
                        errorSpan.textContent = "";
                    }
                });
            }
        });
    }

    // Profile update via AJAX
    if (updateProfileForm) {
        updateProfileForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            const formData = new FormData(updateProfileForm);

            fetch("../controllers/updateProfile.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const messageDiv = updateProfileForm.querySelector("#message"); // Adjust selector as needed
                messageDiv.textContent = data.message; // Display success or error message
            });
        });
    }
});
