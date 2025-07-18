<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - GreenShop</title>
    <!-- Google Fonts (Poppins for modern look) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Animate.css for entrance animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Custom CSS -->
    <style>
        /* --- Global GreenShop Styling (from previous steps) --- */
        :root {
            --greenshop-primary: #28a745;
            /* Your main green */
            --greenshop-primary-dark: #218838;
            /* Darker green for hover */
            --greenshop-light-green: #e9f5e9;
            /* Light background for some elements */
            --greenshop-text-dark: #343a40;
            /* Dark text */
            --greenshop-text-muted: #6c757d;
            /* Muted text */
            --greenshop-card-bg: #fff;
            --greenshop-border-color: #dee2e6;
            --greenshop-border-radius: 0.75rem;
            /* Consistent rounded corners */
            --greenshop-shadow: rgba(0, 0, 0, 0.075);
            /* Subtle shadow */
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: var(--greenshop-text-dark);
        }

        /* Contact Banner */

        .contact-banner {
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.9), rgba(30, 126, 52, 0.9)),
                url('https://images.unsplash.com/photo-1549637642-90187f64f420?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .banner-text {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .banner-text h1 {
            font-weight: 700;
            font-size: 3rem;
            margin-bottom: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .animated-bg span {
            position: absolute;
            display: block;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 25s infinite linear;
        }

        .animated-bg span:nth-child(1) {
            top: 20%;
            left: 10%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }

        .animated-bg span:nth-child(2) {
            top: 60%;
            left: 20%;
            width: 60px;
            height: 60px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .animated-bg span:nth-child(3) {
            top: 40%;
            left: 40%;
            width: 90px;
            height: 90px;
            animation-delay: 4s;
            animation-duration: 15s;
        }

        .animated-bg span:nth-child(4) {
            top: 70%;
            left: 70%;
            width: 50px;
            height: 50px;
            animation-delay: 6s;
            animation-duration: 20s;
        }

        .animated-bg span:nth-child(5) {
            top: 30%;
            left: 80%;
            width: 70px;
            height: 70px;
            animation-delay: 8s;
            animation-duration: 18s;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.5;
            }

            50% {
                transform: translateY(-100px) rotate(180deg);
                opacity: 0.8;
            }

            100% {
                transform: translateY(0) rotate(360deg);
                opacity: 0.5;
            }
        }

        /* End contact banner */

        .container {
            max-width: 1200px;
        }

        /* --- Header Styling --- */
        .gs-header {
            background-color: var(--greenshop-primary);
            color: #fff;
            box-shadow: 0 2px 4px var(--greenshop-shadow);
        }

        .gs-logo-link {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .gs-search-bar .gs-search-input {
            border-radius: 0.5rem 0 0 0.5rem;
            border: none;
            padding-left: 1.25rem;
        }

        .gs-search-bar .gs-search-btn {
            background-color: #fff;
            color: var(--greenshop-primary);
            border-radius: 0 0.5rem 0.5rem 0;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .gs-search-bar .gs-search-btn:hover {
            background-color: var(--greenshop-light-green);
            color: var(--greenshop-primary-dark);
        }

        .gs-cart-btn {
            background-color: var(--greenshop-primary-dark);
            border-color: var(--greenshop-primary-dark);
            color: #fff;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .gs-cart-btn:hover {
            background-color: #fff;
            color: var(--greenshop-primary);
            border-color: #fff;
            transform: translateY(-2px);
        }

        .gs-badge {
            background-color: #fff;
            color: var(--greenshop-primary);
            font-weight: bold;
            padding: 0.3em 0.6em;
            border-radius: 50%;
            transform: scale(0.9);
            transition: transform 0.2s ease;
        }

        /* --- Main Content Cards --- */
        .gs-card {
            background-color: var(--greenshop-card-bg);
            border-radius: var(--greenshop-border-radius);
            border: none;
            box-shadow: 0 0.25rem 0.5rem var(--greenshop-shadow) !important;
            transition: transform 0.2s ease-in-out;
        }

        .gs-card:hover {
            transform: translateY(-3px);
        }

        .gs-section-title {
            color: var(--greenshop-primary-dark);
            font-weight: 600;
            letter-spacing: 0.05em;
            position: relative;
        }

        .gs-section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background-color: var(--greenshop-primary);
            margin: 10px 0 0;
            /* Align left */
            border-radius: 2px;
        }

        /* Staggered Animation for "How to Find Us" section */
        .animate-stagger-item {
            opacity: 0;
            /* Start hidden */
            transform: translateY(-20px);
            /* Start slightly above */
            animation-fill-mode: both;
            /* Keep element at final state */
        }

        /* Base animation for staggered items */
        .animate-stagger-item.animate__fadeInDown {
            animation-name: fadeInDown;
            animation-duration: 0.8s;
            animation-timing-function: ease-out;
        }

        /* Stagger delays - apply via jQuery */
        /* .animate-stagger-delay-1 { animation-delay: 0.2s; } */
        /* .animate-stagger-delay-2 { animation-delay: 0.4s; } */
        /* .animate-stagger-delay-3 { animation-delay: 0.6s; } */
        /* .animate-stagger-delay-4 { animation-delay: 0.8s; } */


        /* Contact Info List */
        .list-unstyled li i {
            color: var(--greenshop-primary-dark);
            /* Icons in dark green */
        }

        .list-unstyled a {
            color: var(--greenshop-text-dark);
            transition: color 0.2s ease;
        }

        .list-unstyled a:hover {
            color: var(--greenshop-primary);
        }

        /* Map Placeholder */
        .gs-map-placeholder {
            width: 100%;
            height: 250px;
            background-color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-weight: 500;
            overflow: hidden;
            /* Ensure rounded corners on iframe */
        }

        .gs-map-placeholder iframe {
            border-radius: var(--greenshop-border-radius);
            /* Apply radius to iframe */
        }

        /* --- Buttons --- */
        .gs-btn-primary {
            background: linear-gradient(to right, var(--greenshop-primary), var(--greenshop-primary-dark));
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 30px;
            font-weight: 500;
            letter-spacing: 1px;
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
            transition: all 0.3s;
        }

        .gs-btn-primary:hover {
            background-color: var(--greenshop-primary-dark);
            border-color: var(--greenshop-primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(40, 167, 69, 0.3);
        }

        .gs-btn-primary:active {
            transform: translateY(0);
            box-shadow: none;
        }


        /* --- Footer Styling --- */
        .gs-footer {
            background-color: var(--greenshop-primary);
            color: #fff;
        }

        .gs-footer-heading {
            font-weight: 600;
            margin-bottom: 1.25rem;
            color: #fff;
        }

        .gs-footer-text,
        .gs-copyright {
            color: rgba(255, 255, 255, 0.8);
        }

        .gs-footer-links li {
            margin-bottom: 0.5rem;
        }

        .gs-footer-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .gs-footer-link:hover {
            color: #fff;
        }

        .gs-social-icons .gs-social-icon {
            color: #fff;
            font-size: 1.2rem;
            transition: transform 0.2s ease;
        }

        .gs-social-icons .gs-social-icon:hover {
            transform: translateY(-2px);
        }

        /* Contact Form Styling */
        .gs-form-control {
            border-radius: 0.5rem;
            padding: 0.85rem 1rem;
            border: 1px solid var(--greenshop-border-color);
            background-color: #fdfdfd;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .gs-form-control:focus {
            border-color: var(--greenshop-primary) !important;
            box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
            background-color: #fff;
        }

        .gs-form-control::placeholder {
            color: var(--greenshop-text-muted);
            opacity: 0.7;
        }

        .form-control {
            border-radius: 30px;
            padding: 12px 20px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }

        textarea.form-control {
            min-height: 120px;
            border-radius: 20px;
        }

        .gs-btn-newsletter {
            background-color: #ffc107;
            color: var(--greenshop-text-dark);
            border-radius: 0 0.5rem 0.5rem 0;
            transition: background-color 0.2s ease;
        }

        .gs-btn-newsletter:hover {
            background-color: #e0a800;
        }

        .gs-payment-icons img {
            filter: brightness(0.9) saturate(1.2);
        }

        .gs-footer-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* --- Responsive Adjustments --- */
        @media (max-width: 767.98px) {

            .contact-banner {
                height: 180px;
            }

            .gs-section-title::after {
                margin: 10px auto 0;
                /* Center underline on mobile for titles in cards */
            }

            .gs-map-placeholder {
                height: 200px;
            }

            .gs-card {
                padding: 1.5rem !important;
            }
        }
    </style>
</head>

<body>

    <!-- Header (Consistent with your GreenShop homepage) -->
    <header class="gs-header py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="home.html" class="gs-logo-link h4 mb-0">
                <i class="fas fa-leaf me-2"></i>GreenShop
            </a>
            <div class="input-group gs-search-bar w-50 d-none d-lg-flex">
                <input type="text" class="form-control gs-search-input" placeholder="Search in GreenShop">
                <button class="btn gs-search-btn" type="button"><i class="fas fa-search"></i></button>
            </div>
            <a href="cart.html" class="btn gs-cart-btn position-relative">
                <i class="fas fa-shopping-cart me-1"></i> Cart <span class="badge gs-badge ms-1">0</span>
            </a>
        </div>
    </header>

    <!-- Contact Banner -->
    <div class="contact-banner">
        <div class="animated-bg">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="banner-text">
            <h1 class="fade-in">Contact Us</h1>
            <p class="lead">We'd love to hear from you</p>
        </div>
    </div>

    <main class="container my-5">
        <div class="row gx-lg-5">
            <!-- Left Column: How to Find Us -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="gs-card p-4 shadow-sm h-100">
                    <h2 class="gs-section-title mb-4 animate-stagger-item">How to Find Us</h2>
                    <p class="mb-4 text-muted animate-stagger-item animate-stagger-delay-1">
                        If you have any questions, just fill in the contact form, and we will answer you shortly.
                        If you are living nearby, come visit GreenShop at one of our comfortable offices.
                    </p>

                    <h5 class="fw-bold text-success mb-3 animate-stagger-item animate-stagger-delay-2">Headquarters</h5>
                    <ul class="list-unstyled mb-4 animate-stagger-item animate-stagger-delay-3">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2 text-primary-dark"></i> 9863 Green Street, Eco City, EC 12345, GreenLand</li>
                        <li class="mb-2"><i class="fas fa-phone me-2 text-primary-dark"></i> <a href="tel:+15551234567" class="text-decoration-none text-dark">+1 (555) 123-4567</a></li>
                        <li><i class="fas fa-envelope me-2 text-primary-dark"></i> <a href="mailto:info@greenshop.com" class="text-decoration-none text-dark">info@greenshop.com</a></li>
                    </ul>

                    <!-- Optional: Embedded Map Placeholder -->
                    <div class="gs-map-placeholder rounded-3 animate-stagger-item animate-stagger-delay-4">
                        <!-- Replace with actual Google Maps embed iframe -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2890.35406798028!2d-80.53696898424269!3d43.47514337827827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b8812c3f8e5f7%3A0xc3f8e5f7a0f7e6f8!2sUniversity%20of%20Waterloo!5e0!3m2!1sen!2sca!4v1678901234567!5m2!1sen!2sca" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Right Column: Get in Touch Form -->
            <div class="col-lg-6">
                <div class="gs-card p-4 shadow-sm h-100">
                    <h2 class="gs-section-title mb-4 animate__animated animate__fadeInUp">Get in Touch</h2>
                    <form id="contactForm">
                        <div class="row mb-3">
                            <div class="col-md-12 mt-3 mt-md-0">
                                <label for="contactName" class="form-label visually-hidden">Name</label>
                                <input type="text" class="form-control gs-form-control animate__animated animate__fadeInLeft" id="contactName" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-12 mt-3 mt-md-0">
                                <label for="contactEmail" class="form-label visually-hidden">Email</label>
                                <input type="email" class="form-control gs-form-control animate__animated animate__fadeInRight" id="contactEmail" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="contactSubject" class="form-label visually-hidden">Subject</label>
                            <input type="text" class="form-control gs-form-control animate__animated animate__fadeInUp" id="contactSubject" placeholder="Subject">
                        </div>
                        <div class="mb-4">
                            <label for="contactMessage" class="form-label visually-hidden">Message</label>
                            <textarea class="form-control gs-form-control animate__animated animate__fadeInUp" id="contactMessage" rows="6" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="btn gs-btn-primary btn-lg w-100 animate__animated animate__zoomIn">Send Message <i class="fas fa-paper-plane ms-2"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer (Consistent with your GreenShop homepage) -->
    <footer class="gs-footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <h5 class="gs-footer-heading">About GreenShop</h5>
                    <p class="gs-footer-text">Your trusted partner for premium quality products. We bring you the best selection of eco-friendly and sustainable products for a better tomorrow.</p>
                    <div class="d-flex gs-social-icons">
                        <a href="#" class="gs-social-icon me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="gs-social-icon me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="gs-social-icon me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="gs-social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="gs-footer-heading">Quick Links</h5>
                    <ul class="list-unstyled gs-footer-links">
                        <li><a href="#" class="gs-footer-link">Home</a></li>
                        <li><a href="#" class="gs-footer-link">Products</a></li>
                        <li><a href="#" class="gs-footer-link">Categories</a></li>
                        <li><a href="#" class="gs-footer-link">Deals</a></li>
                        <li><a href="#" class="gs-footer-link">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="gs-footer-heading">Customer Service</h5>
                    <ul class="list-unstyled gs-footer-links">
                        <li><a href="#" class="gs-footer-link">Help Center</a></li>
                        <li><a href="#" class="gs-footer-link">Shipping Info</a></li>
                        <li><a href="#" class="gs-footer-link">Returns</a></li>
                        <li><a href="#" class="gs-footer-link">Warranty</a></li>
                        <li><a href="#" class="gs-footer-link">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="gs-footer-heading">Contact Info</h5>
                    <ul class="list-unstyled gs-footer-links">
                        <li>123 Green Street, Eco City, EC 12345</li>
                        <li><a href="tel:+15551234567" class="gs-footer-link">+1 (555) 123-4567</a></li>
                        <li><a href="mailto:info@greenshop.com" class="gs-footer-link">info@greenshop.com</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Newsletter</h5>
                    <p class="gs-footer-text">Subscribe to get special offers, exclusive deals, and the latest updates.</p>
                    <div class="input-group mb-3 gs-newsletter-input">
                        <input type="email" class="form-control" placeholder="Enter your email">
                        <button class="btn gs-btn-newsletter" type="button"><i class="fas fa-paper-plane"></i></button>
                    </div>
                    <div class="d-flex gap-2 gs-payment-icons">
                        <img src="https://via.placeholder.com/50x30/FFFFFF/000000?text=VISA" alt="Visa" class="img-fluid rounded">
                        <img src="https://via.placeholder.com/50x30/FFFFFF/000000?text=MC" alt="Mastercard" class="img-fluid rounded">
                        <img src="https://via.placeholder.com/50x30/FFFFFF/000000?text=PayPal" alt="PayPal" class="img-fluid rounded">
                    </div>
                </div>
            </div>
            <hr class="gs-footer-divider my-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap small gs-copyright">
                <div class="mb-2 mb-md-0">&copy; 2024 GreenShop. All rights reserved.</div>
                <div>
                    <a href="#" class="gs-footer-link me-3">Privacy Policy</a>
                    <a href="#" class="gs-footer-link me-3">Terms of Service</a>
                    <a href="#" class="gs-footer-link">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS (Popper and Bootstrap JS bundle) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Custom JS for animations and form handling -->
    <script>
        $(document).ready(function() {

            // --- Staggered Animation for "How to Find Us" Section ---
            // Select elements that should animate and apply a staggered delay
            const $staggeredItems = $('.animate-stagger-item');
            const baseDelay = 300; // milliseconds between each item's animation start

            $staggeredItems.each(function(index) {
                const $item = $(this);
                // Apply the animation class and a calculated delay
                $item.css('animation-delay', (index * baseDelay) + 'ms');
                $item.addClass('animate__animated animate__fadeInDown');
            });

            // --- Form Submission Handling ---
            $('#contactForm').on('submit', function(event) {
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
            $('.contact-banner').hover(function() {
                $(this).find('.animated-bg span').css('animation-play-state', 'paused');
            }, function() {
                $(this).find('.animated-bg span').css('animation-play-state', 'running');
            });

        });
    </script>
</body>

</html>