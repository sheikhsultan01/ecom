$(document).ready(function () {
    // Initialize variables
    let cropper;

    // Profile Update Callback
    ss.fn.cb.updateProfileCB = function ($form, res) {
        let { data, status } = res;
        if (status == 'success') {
            $('.profile-info').find('.login-user-name').text(data.name);  // Set user name
            notify(data.msg, status);
            return true;
        }
        notify(res.data, res.status);
    }

    // Delete Address Callback
    ss.fn.cb.deleteAddressCB = function ($form, res) {
        if (res.status == 'success') {
            notify(res.data, res.status);
            return true;
        }
        notify(res.data, res.status);
    }

    // Callbefore of update password
    ss.fn.bc.updatePasswordCB = function ($form) {
        const newPassword = $form.find('#newPassword').val();
        const confirmPassword = $form.find('#confirmPassword').val();

        // Check if new password and confirm password match
        if (newPassword !== confirmPassword) {
            notify("New Password is not matching with confirm Password", 'error');
            return false;
        }
        return true;
    }

    ss.fn.cb.updatePasswordCB = function ($form, res) {
        let { data, status } = res;
        if (status == 'success') {
            $form.trigger('reset');
            notify(data, status);
            return true;
        }
        notify(data, status);
    }

    // Initialize google map
    new LocationMap('map-canvas', 'map-lat', 'map-lng', {
        'street_number': 'street_number',
        'route': 'street_address',
        'locality': 'town_city',
        'administrative_area_level_1': 'state',
        'country': 'country',
        'postal_code': 'postal_code'
    }, "#addressForm");

    // Open avatar upload modal
    $('#uploadAvatarBtn').click(function () {
        $('#avatarModal').modal('show');
    });

    // Trigger file input when select button is clicked
    $('#selectImageBtn').click(function () {
        $('#avatarUpload').click();
    });

    // Handle file selection
    $('#avatarUpload').change(function () {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                // Display image in the modal
                $('#avatarImage').attr('src', e.target.result);
                $('.img-container').removeClass('d-none');
                $('#cropImageBtn').removeClass('d-none');
                $('#selectImageBtn').text('Change Image');

                // Initialize cropper
                if (cropper) {
                    cropper.destroy();
                }

                cropper = new Cropper(document.getElementById('avatarImage'), {
                    aspectRatio: 1,
                    viewMode: 1,
                    dragMode: 'move',
                    autoCropArea: 0.8,
                    restore: false,
                    guides: true,
                    center: true,
                    highlight: false,
                    cropBoxMovable: true,
                    cropBoxResizable: true,
                    toggleDragModeOnDblclick: false
                });
            };

            reader.readAsDataURL(file);
        }
    });

    // Handle image cropping
    $(document).on('click', '#cropImageBtn', function () {
        if (cropper) {
            // Get cropped canvas
            const canvas = cropper.getCroppedCanvas({
                width: 300,
                height: 300
            });

            // Update profile image (preview ke liye)
            const croppedImageUrl = canvas.toDataURL('image/jpeg');
            const profileImage = $('#profileAvatar');
            // Convert to Blob & send via FormData
            canvas.toBlob(function (blob) {
                const formData = new FormData();
                formData.append('upload_image', blob, 'profile.jpg');
                formData.append('image', profileImage.attr('data-old-image') || '')
                formData.append('updateUserProfilePicture', true);

                $.ajax({
                    url: "controllers/profile",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function (res) {
                        let { data, status } = res;
                        if (res.status == 'success') {
                            $('#avatarModal').modal('hide'); // close modal
                            $('#profileAvatar').attr('src', croppedImageUrl); // Set Image
                            profileImage.attr('data-old-image', data.image); // Set Profile Image in attribute
                            notify(data.msg, status);
                            return true;
                        }
                        notify(data, status);
                    },
                    error: function (xhr, status, error) {
                        console.error("Upload failed:", error);
                    }
                });
            }, 'image/jpeg'); // output format
        }
    });

    // Password strength meter
    $('#newPassword').on('input', function () {
        const password = $(this).val();
        let strength = 0;
        let feedback = '';

        if (password.length < 8) {
            feedback = 'Password must be at least 8 characters long';
        } else {
            // Calculate password strength
            strength += password.length * 4;
            strength += (password.match(/[a-z]/) ? 10 : 0);
            strength += (password.match(/[A-Z]/) ? 10 : 0);
            strength += (password.match(/[0-9]/) ? 10 : 0);
            strength += (password.match(/[^a-zA-Z0-9]/) ? 10 : 0);

            // Cap strength at 100
            strength = Math.min(100, strength);

            if (strength < 40) {
                feedback = 'Weak password. Add uppercase letters, numbers, or symbols.';
                $('#passwordStrength').removeClass().addClass('strength-weak');
            } else if (strength < 70) {
                feedback = 'Medium strength password. Add more variety for better security.';
                $('#passwordStrength').removeClass().addClass('strength-medium');
            } else {
                feedback = 'Strong password. Good job!';
                $('#passwordStrength').removeClass().addClass('strength-strong');
            }
        }

        // Update UI
        $('#passwordStrength').css('width', strength + '%');
        $('#passwordFeedback').text(feedback);

        // Check if confirm password matches
        const confirmPassword = $('#confirmPassword').val();
        if (confirmPassword && confirmPassword !== password) {
            $('#confirmPasswordFeedback').text('Passwords do not match').addClass('text-danger');
        } else if (confirmPassword) {
            $('#confirmPasswordFeedback').text('Passwords match').removeClass('text-danger').addClass('text-success');
        }
    });

    // Check if confirm password matches
    $('#confirmPassword').on('input', function () {
        const password = $('#newPassword').val();
        const confirmPassword = $(this).val();

        if (confirmPassword !== password) {
            $('#confirmPasswordFeedback').text('Passwords do not match').addClass('text-danger').removeClass('text-success');
        } else {
            $('#confirmPasswordFeedback').text('Passwords match').removeClass('text-danger').addClass('text-success');
        }
    });
});