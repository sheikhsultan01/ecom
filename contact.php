<?php
require_once 'includes/db.php';
$page_name = 'Contact';

$CSS_FILES = [
    'animate.min.css',
    'contact.css'
];

$JS_FILES = [
    'contact.js'
];

require_once 'includes/head.php';
?>

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
                    <button type="submit" class="btn gs-btn-primary btn-lg w-100 animate__animated animate__zoomIn">Send Message <i class="hgi hgi-stroke hgi-sent ms-2"></i></button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once 'includes/foot.php'; ?>