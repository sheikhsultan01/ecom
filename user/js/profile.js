$(document).ready(function () {
    // Profile Update Callback
    ss.fn.cb.updateProfileCB = function ($form, res) {
        if (res.status == 'success') {
            notify(res.data, res.status);
            return true;
        }
        notify(res.data, res.status);
    }
    // Initialize variables
    let cropper;
    let map;
    let marker;

    // Initialize Google Map
    function initMap() {
        // Default coordinates (New York City)
        const defaultLocation = {
            lat: 40.7128,
            lng: -74.0060
        };

        // Create map centered at default location
        map = new google.maps.Map(document.getElementById("map"), {
            center: defaultLocation,
            zoom: 12,
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: false
        });

        // Create draggable marker
        marker = new google.maps.Marker({
            position: defaultLocation,
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP
        });

        // Update hidden inputs when marker is dragged
        google.maps.event.addListener(marker, 'dragend', function () {
            const position = marker.getPosition();
            $('#addressLatitude').val(position.lat());
            $('#addressLongitude').val(position.lng());

            // Reverse geocode to get address
            const geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'location': position
            }, function (results, status) {
                if (status === 'OK' && results[0]) {
                    updateAddressFields(results[0]);
                }
            });
        });

        // Search box for location
        const input = document.getElementById('addressLine1');
        const searchBox = new google.maps.places.Autocomplete(input);

        // Update map when a place is selected
        searchBox.addListener('place_changed', function () {
            const place = searchBox.getPlace();

            if (!place.geometry) {
                return;
            }

            // Update map and marker
            map.setCenter(place.geometry.location);
            marker.setPosition(place.geometry.location);

            // Update hidden inputs
            $('#addressLatitude').val(place.geometry.location.lat());
            $('#addressLongitude').val(place.geometry.location.lng());

            // Fill address fields
            updateAddressFields(place);
        });
    }

    // Update address fields from Google Maps result
    function updateAddressFields(place) {
        for (const component of place.address_components) {
            const componentType = component.types[0];

            switch (componentType) {
                case "street_number":
                    // We combine street number and route later
                    break;
                case "route":
                    $('#addressLine1').val(component.long_name);
                    break;
                case "locality":
                    $('#addressCity').val(component.long_name);
                    break;
                case "administrative_area_level_1":
                    $('#addressState').val(component.short_name);
                    break;
                case "postal_code":
                    $('#addressZip').val(component.short_name);
                    break;
                case "country":
                    $('#addressCountry').val(component.short_name);
                    break;
            }
        }
    }

    // Initialize map when the modal opens
    $('#addAddressModal').on('shown.bs.modal', function () {
        initMap();

        // Use geolocation if available
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                map.setCenter(pos);
                marker.setPosition(pos);

                // Update hidden inputs
                $('#addressLatitude').val(pos.lat);
                $('#addressLongitude').val(pos.lng);

                // Reverse geocode to get address
                const geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    'location': pos
                }, function (results, status) {
                    if (status === 'OK' && results[0]) {
                        updateAddressFields(results[0]);
                    }
                });
            });
        }
    });

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
    $('#cropImageBtn').click(function () {
        if (cropper) {
            // Get cropped canvas
            const canvas = cropper.getCroppedCanvas({
                width: 300,
                height: 300
            });

            // Convert to data URL
            const croppedImageUrl = canvas.toDataURL('image/jpeg');

            // Update profile image
            $('#profileAvatar').attr('src', croppedImageUrl);

            // In a real application, you would upload this to your server
            // using AJAX or form submission

            // Close modal
            $('#avatarModal').modal('hide');
        }
    });

    $('#passwordChangeForm').submit(function (e) {
        e.preventDefault();

        // Validate password
        const currentPassword = $('#currentPassword').val();
        const newPassword = $('#newPassword').val();
        const confirmPassword = $('#confirmPassword').val();

        // Check if new password and confirm password match
        if (newPassword !== confirmPassword) {
            $('#confirmPasswordFeedback').text('Passwords do not match').addClass('text-danger');
            return;
        }

        // Reset form
        this.reset();
        $('#passwordStrength').css('width', '0');
        $('#passwordFeedback').text('Password must be at least 8 characters long');
        $('#confirmPasswordFeedback').text('');
    });

    // Handle address form submission
    $('#saveAddressBtn').click(function () {
        // In a real application, you would submit this to your server
        // using AJAX or form submission

        // Close modal
        $('#addAddressModal').modal('hide');
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