document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('changePasswordForm');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        // Get form values
        const email = document.getElementById('email').value;
        const oldPassword = document.getElementById('old_password').value;
        const newPassword = document.getElementById('new_password').value;
        const confirmNewPassword = document.getElementById('confirm_new_password').value;

        // Clear previous error messages
        clearErrors();

        // Validate email and password fields
        if (newPassword !== confirmNewPassword) {
            showError('confirm_new_password', 'Passwords do not match.');
            return;
        }

       

        // Send the data to the AJAX validation script
        const data = `email=${encodeURIComponent(email)}&old_password=${encodeURIComponent(oldPassword)}`;
        xhr.send(data);
    });

    function showError(field, message) {
        const errorSpan = document.querySelector(`span[data-error="${field}"]`);
        errorSpan.textContent = message;
    }

    function clearErrors() {
        const errorSpans = document.querySelectorAll('span.error');
        errorSpans.forEach(span => {
            span.textContent = '';
        });
    }

     // AJAX request to validate email and old password
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../controllers/ajaxValidate.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            const response = JSON.parse(this.responseText);

            if (response.valid) {
                // If validation passes, submit the form
                form.submit(); // Submit the form to the controller
            } else {
                // Show validation errors
                if (response.emailError) {
                    showError('email', response.emailError);
                }
                if (response.oldPasswordError) {
                    showError('old_password', response.oldPasswordError);
                }
            }
        };
});
