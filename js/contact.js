$(document).ready(function () {

    // --- Staggered Animation for "How to Find Us" Section ---
    // Select elements that should animate and apply a staggered delay
    const $staggeredItems = $('.animate-stagger-item');
    const baseDelay = 300; // milliseconds between each item's animation start

    $staggeredItems.each(function (index) {
        const $item = $(this);
        // Apply the animation class and a calculated delay
        $item.css('animation-delay', (index * baseDelay) + 'ms');
        $item.addClass('animate__animated animate__fadeInDown');
    });

    // --- Form Submission Handling ---
    $('#contactForm').on('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        // Basic client-side validation
        const name = $('#contactName').val().trim();
        const email = $('#contactEmail').val().trim();
        const message = $('#contactMessage').val().trim();

        if (name === '' || email === '' || message === '') {
            alert('Please fill in all required fields (Name, Email, Message).');
            return;
        }

        if (!validateEmail(email)) {
            alert('Please enter a valid email address.');
            return;
        }

        // Simulate form submission
        // In a real application, you would send an AJAX request to your server here:
        // $.ajax({
        //     url: '/api/contact', // Your backend endpoint
        //     method: 'POST',
        //     data: {
        //         name: name,
        //         email: email,
        //         subject: $('#contactSubject').val().trim(),
        //         message: message
        //     },
        //     success: function(response) {
        //         alert('Thank you for your message! We will get back to you shortly.');
        //         $('#contactForm')[0].reset(); // Clear the form
        //     },
        //     error: function(xhr, status, error) {
        //         alert('There was an error sending your message. Please try again later.');
        //         console.error('Form submission error:', error);
        //     }
        // });

        alert('Thank you for your message, ' + name + '! We will get back to you shortly.');
        $('#contactForm')[0].reset(); // Clear the form after simulated success
    });

    // Basic email validation function
    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    // Banner animation
    $('.contact-banner').hover(function () {
        $(this).find('.animated-bg span').css('animation-play-state', 'paused');
    }, function () {
        $(this).find('.animated-bg span').css('animation-play-state', 'running');
    });

});