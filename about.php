<?php
require_once 'includes/db.php';
$page_name = 'About Us';

$CSS_FILES = [
    'aos.min.css',
    'about.css'
];

$JS_FILES = [
    'aos.min.js',
    'about.js'
];
define('INCLUDE_NAVBAR', false);

require_once 'includes/head.php';
?>

<!-- Banner -->
<div class="about-banner">
    <div class="banner-text">
        <h1 data-aos="fade-up">About Us</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="200">Learn our story and what makes us different</p>
    </div>
</div>

<!-- Our Story Section -->
<section class="section section-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-title">Our Story</h2>
                <p class="section-subtitle">How GreenShop became your trusted eco-friendly shopping destination</p>
                <p>Founded in 2015, GreenShop began with a simple mission: to make eco-friendly products accessible and affordable for everyone. We believed that sustainable living shouldn't be a luxury, but a choice available to all.</p>
                <p>What started as a small online store with just 10 products has now grown into a thriving marketplace with thousands of eco-conscious items, all carefully selected to meet our strict quality and sustainability standards.</p>
                <p>Today, we're proud to serve over 500,000 customers worldwide who share our vision for a greener future. Our commitment to sustainability extends beyond our products – it's embedded in everything we do, from our plastic-free packaging to our carbon-neutral shipping.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="https://images.unsplash.com/photo-1579781353080-ac87f28f132d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="GreenShop Story" class="img-fluid rounded-4 shadow">
            </div>
        </div>
    </div>
</section>

<!-- Our Values Section -->
<section class="section section-dark">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-aos="fade-up">Our Values</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">The principles that guide every decision we make</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card p-4 text-center">
                    <div class="card-icon">
                        <i class="bi bi-globe"></i>
                    </div>
                    <h4 class="card-title">Sustainability</h4>
                    <p>We believe in offering products that are kind to our planet. Every item in our store meets strict environmental standards.</p>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card p-4 text-center">
                    <div class="card-icon">
                        <i class="bi bi-award"></i>
                    </div>
                    <h4 class="card-title">Quality</h4>
                    <p>We never compromise on quality. Our products are built to last, reducing waste and giving you better value for money.</p>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card p-4 text-center">
                    <div class="card-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4 class="card-title">Community</h4>
                    <p>We foster a community of like-minded individuals who are passionate about sustainable living and conscious consumption.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="section section-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-aos="fade-up">Our Journey</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Key milestones that shaped who we are today</p>
        </div>

        <div class="timeline">
            <div class="timeline-item" data-aos="fade-right">
                <div class="timeline-content">
                    <div class="timeline-year">2015</div>
                    <h3 class="timeline-title">The Beginning</h3>
                    <p>GreenShop was founded with a vision to make eco-friendly products accessible to everyone.</p>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-left">
                <div class="timeline-content">
                    <div class="timeline-year">2017</div>
                    <h3 class="timeline-title">Expansion</h3>
                    <p>Expanded our product range to include over 500 items and launched our mobile app.</p>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-right">
                <div class="timeline-content">
                    <div class="timeline-year">2019</div>
                    <h3 class="timeline-title">Sustainability Award</h3>
                    <p>Recognized as the "Most Sustainable Online Retailer" at the Green Business Awards.</p>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-left">
                <div class="timeline-content">
                    <div class="timeline-year">2021</div>
                    <h3 class="timeline-title">Going Global</h3>
                    <p>Expanded operations to serve customers in over 50 countries worldwide.</p>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-right">
                <div class="timeline-content">
                    <div class="timeline-year">2023</div>
                    <h3 class="timeline-title">Carbon Neutral</h3>
                    <p>Achieved carbon neutrality across all operations and launched our tree planting initiative.</p>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-left">
                <div class="timeline-content">
                    <div class="timeline-year">2025</div>
                    <h3 class="timeline-title">Today & Beyond</h3>
                    <p>Continuing to innovate and expand our eco-friendly offerings to help more people live sustainably.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust Indicators Section -->
<section class="section section-dark">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-aos="fade-up">Why Trust Us</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Reasons why thousands of customers choose GreenShop</p>
        </div>

        <div class="row g-4">
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="trust-item">
                    <div class="trust-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5 class="trust-title">Secure Shopping</h5>
                    <p class="trust-description">100% secure payment processing with end-to-end encryption</p>
                </div>
            </div>

            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="trust-item">
                    <i class="bi bi-truck trust-icon"></i>
                    <h5 class="trust-title">Fast Delivery</h5>
                    <p class="trust-description">Quick and reliable shipping with tracking updates</p>
                </div>
            </div>

            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="trust-item">
                    <i class="bi bi-arrow-repeat trust-icon"></i>
                    <h5 class="trust-title">Easy Returns</h5>
                    <p class="trust-description">Hassle-free 30-day return policy for your peace of mind</p>
                </div>
            </div>

            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="500">
                <div class="trust-item">
                    <i class="bi bi-headset trust-icon"></i>
                    <h5 class="trust-title">24/7 Support</h5>
                    <p class="trust-description">Our customer service team is always ready to help</p>
                </div>
            </div>
        </div>

        <div class="row mt-5 g-4">
            <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                <div class="stats-box">
                    <i class="bi bi-people-fill stats-icon"></i>
                    <div class="stats-number" data-count="500000">500K+</div>
                    <div class="stats-title">Happy Customers</div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stats-box">
                    <i class="bi bi-box-seam stats-icon"></i>
                    <div class="stats-number" data-count="5000">5000+</div>
                    <div class="stats-title">Products</div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="400">
                <div class="stats-box">
                    <i class="bi bi-star-fill stats-icon"></i>
                    <div class="stats-number" data-count="98">98%</div>
                    <div class="stats-title">Satisfaction Rate</div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="500">
                <div class="stats-box">
                    <i class="bi bi-tree-fill stats-icon"></i>
                    <div class="stats-number" data-count="100000">100K+</div>
                    <div class="stats-title">Trees Planted</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section section-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-aos="fade-up">Customer Testimonials</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">What our valued customers say about GreenShop</p>
        </div>

        <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-card">
                    <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Sarah Johnson" class="testimonial-img">
                    <div class="testimonial-content">
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p>I've been shopping at GreenShop for over three years now, and I'm consistently impressed by the quality of their products. The customer service is excellent, and I love that I'm supporting a business that cares about the environment.</p>
                        <div class="testimonial-author">Sarah Johnson</div>
                        <div class="testimonial-position">Loyal Customer since 2020</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="testimonial-card">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Chen" class="testimonial-img">
                    <div class="testimonial-content">
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p>As someone who's been trying to reduce my environmental footprint, finding GreenShop was a game-changer. Their products are not only eco-friendly but also affordable. The packaging is minimal and sustainable too!</p>
                        <div class="testimonial-author">Michael Chen</div>
                        <div class="testimonial-position">Eco-Conscious Consumer</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                <div class="testimonial-card">
                    <img src="https://randomuser.me/api/portraits/women/42.jpg" alt="Emily Rodriguez" class="testimonial-img">
                    <div class="testimonial-content">
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <p>I recently discovered GreenShop and I'm already a huge fan! The website is user-friendly, shipping is fast, and the products are exactly as described. I appreciate their transparency about the environmental impact of each item.</p>
                        <div class="testimonial-author">Emily Rodriguez</div>
                        <div class="testimonial-position">New Customer</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="section section-dark">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-aos="fade-up">Meet Our Team</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">The passionate people behind GreenShop</p>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="team-card">
                    <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="David Miller" class="team-img">
                    <div class="team-info">
                        <h4 class="team-name">David Miller</h4>
                        <div class="team-position">Founder & CEO</div>
                        <div class="team-social">
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="team-card">
                    <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Amanda Chen" class="team-img">
                    <div class="team-info">
                        <h4 class="team-name">Amanda Chen</h4>
                        <div class="team-position">Head of Product</div>
                        <div class="team-social">
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="team-card">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="James Wilson" class="team-img">
                    <div class="team-info">
                        <h4 class="team-name">James Wilson</h4>
                        <div class="team-position">Sustainability Director</div>
                        <div class="team-social">
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="team-card">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Sophia Martinez" class="team-img">
                    <div class="team-info">
                        <h4 class="team-name">Sophia Martinez</h4>
                        <div class="team-position">Customer Experience</div>
                        <div class="team-social">
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Brands Section -->
<section class="brands-section">
    <div class="container">
        <h3 class="brand-title" data-aos="fade-up">Brands We Partner With</h3>

        <div class="row g-4 align-items-center">
            <div class="col-md-2 col-4" data-aos="fade-up" data-aos-delay="100">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Patagonia_logo.svg/1200px-Patagonia_logo.svg.png" alt="Patagonia" class="img-fluid brand-logo">
            </div>

            <div class="col-md-2 col-4" data-aos="fade-up" data-aos-delay="200">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Logo_NIKE.svg/1200px-Logo_NIKE.svg.png" alt="Nike" class="img-fluid brand-logo">
            </div>

            <div class="col-md-2 col-4" data-aos="fade-up" data-aos-delay="300">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Levi%27s_logo.svg/1200px-Levi%27s_logo.svg.png" alt="Levi's" class="img-fluid brand-logo">
            </div>

            <div class="col-md-2 col-4" data-aos="fade-up" data-aos-delay="400">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Adidas_logo.svg/1200px-Adidas_logo.svg.png" alt="Adidas" class="img-fluid brand-logo">
            </div>

            <div class="col-md-2 col-4" data-aos="fade-up" data-aos-delay="500">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/1200px-Apple_logo_black.svg.png" alt="Apple" class="img-fluid brand-logo">
            </div>

            <div class="col-md-2 col-4" data-aos="fade-up" data-aos-delay="600">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/1200px-Amazon_logo.svg.png" alt="Amazon" class="img-fluid brand-logo">
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/foot.php'; ?>