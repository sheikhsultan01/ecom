<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenShop - Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #28a745;
            --secondary-color: #218838;
            --light-green: #e8f5e9;
            --dark-green: #1e7e34;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }

        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-green));
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

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

        .contact-container {
            max-width: 1200px;
            margin: -50px auto 60px;
            position: relative;
            z-index: 3;
        }

        .contact-box {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .find-us {
            background: linear-gradient(to bottom, var(--primary-color), var(--dark-green));
            color: white;
            padding: 40px;
            height: 100%;
        }

        .section-title {
            font-weight: 600;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.8s ease;
        }

        .section-title.show {
            opacity: 1;
            transform: translateY(0);
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: white;
        }

        .contact-info {
            margin-bottom: 30px;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s ease;
        }

        .contact-info.show {
            opacity: 1;
            transform: translateY(0);
        }

        .contact-info h5 {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .contact-info p {
            margin-bottom: 5px;
        }

        .contact-info i {
            margin-right: 10px;
            font-size: 18px;
        }

        .social-icons {
            margin-top: 30px;
            display: flex;
        }

        .social-icons a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }

        .social-icons a:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-5px);
        }

        .contact-form {
            padding: 40px;
        }

        .form-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }

        .form-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
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

        .submit-btn {
            background: linear-gradient(to right, var(--primary-color), var(--dark-green));
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 30px;
            font-weight: 500;
            letter-spacing: 1px;
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
            transition: all 0.3s;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(40, 167, 69, 0.6);
        }

        .map-container {
            margin-top: 60px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s ease;
        }

        .map-container.show {
            opacity: 1;
            transform: translateY(0);
        }

        .map-container iframe {
            width: 100%;
            height: 400px;
            border: 0;
        }

        .footer {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-green));
            color: white;
            padding: 30px 0;
            margin-top: 50px;
        }

        @media (max-width: 768px) {
            .contact-banner {
                height: 180px;
            }

            .banner-text h1 {
                font-size: 2rem;
            }

            .contact-container {
                margin-top: -30px;
            }

            .find-us,
            .contact-form {
                padding: 30px;
            }

            .contact-box>div:first-child {
                border-radius: 10px 10px 0 0;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a href="index.html" class="text-white text-decoration-none">
                    <h3 class="m-0">GreenShop</h3>
                </a>
                <nav class="d-none d-md-block">
                    <a href="index.html" class="text-white mx-3">Home</a>
                    <a href="products.html" class="text-white mx-3">Products</a>
                    <a href="cart.html" class="text-white mx-3">Cart</a>
                    <a href="contact.html" class="text-white mx-3 fw-bold">Contact</a>
                </nav>
                <div>
                    <a href="cart.html" class="btn btn-outline-light">
                        <i class="bi bi-cart-fill"></i>
                    </a>
                    <button class="btn text-white d-md-none" type="button">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
            </div>
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

    <!-- Contact Content -->
    <div class="contact-container container">
        <div class="contact-box row">
            <!-- Find Us Section -->
            <div class="col-md-5 px-0">
                <div class="find-us">
                    <h3 class="section-title find-us-title">How to Find Us</h3>

                    <div class="contact-info address-info">
                        <h5>Headquarters</h5>
                        <p><i class="bi bi-geo-alt-fill"></i> 123 Green Street, Eco City, 10001</p>
                        <p><i class="bi bi-telephone-fill"></i> +1 (800) 123-4567</p>
                        <p><i class="bi bi-envelope-fill"></i> support@greenshop.com</p>
                    </div>

                    <div class="contact-info hours-info">
                        <h5>Business Hours</h5>
                        <p><i class="bi bi-clock-fill"></i> Monday - Friday: 9am - 6pm</p>
                        <p><i class="bi bi-clock-fill"></i> Saturday: 10am - 4pm</p>
                        <p><i class="bi bi-clock-fill"></i> Sunday: Closed</p>
                    </div>

                    <div class="social-icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-7">
                <div class="contact-form">
                    <h3 class="form-title">Get in Touch</h3>
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Your Email" required>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="Subject">
                        <textarea class="form-control" placeholder="Your Message" required></textarea>
                        <div class="text-end">
                            <button type="submit" class="submit-btn">
                                Send Message <i class="bi bi-send ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215171814396!2d-73.9856644!3d40.7484405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1657981586121!5m2!1sen!2sus" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p>About GreenShop: Quality eco-friendly products at affordable prices.</p>
            <p>© 2025 GreenShop. All rights reserved.</p>
            <div>
                <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Animate elements on scroll
            function checkVisibility() {
                $('.section-title, .contact-info, .map-container').each(function() {
                    const elementTop = $(this).offset().top;
                    const elementHeight = $(this).height();
                    const windowHeight = $(window).height();
                    const scrollY = $(window).scrollTop();

                    if (scrollY > elementTop - windowHeight + elementHeight / 2) {
                        $(this).addClass('show');
                    }
                });
            }

            // Initial check on page load
            setTimeout(function() {
                $('.find-us-title').addClass('show');
                setTimeout(function() {
                    $('.address-info').addClass('show');
                }, 300);
                setTimeout(function() {
                    $('.hours-info').addClass('show');
                }, 600);
                setTimeout(function() {
                    $('.map-container').addClass('show');
                }, 900);
            }, 500);

            // Check visibility on scroll
            $(window).on('scroll', checkVisibility);

            // Form animations
            $('#contactForm input, #contactForm textarea').on('focus', function() {
                $(this).addClass('shadow-sm');
            }).on('blur', function() {
                $(this).removeClass('shadow-sm');
            });

            // Submit animation
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();

                const submitBtn = $('.submit-btn');
                submitBtn.html('<i class="bi bi-hourglass-split me-2"></i> Sending...');
                submitBtn.attr('disabled', true);

                // Simulating form submission
                setTimeout(function() {
                    $('#contactForm').html('<div class="text-center py-5"><i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i><h4 class="mt-4">Message Sent Successfully!</h4><p class="text-muted">We\'ll get back to you as soon as possible.</p></div>');
                }, 2000);
            });

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