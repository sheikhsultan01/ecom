<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - GreenShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <style>
        :root {
            --primary-color: #28a745;
            --secondary-color: #218838;
            --light-green: #e8f5e9;
            --dark-green: #1e7e34;
            --super-light-green: #f5fbf6;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-green));
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .about-banner {
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.9), rgba(30, 126, 52, 0.9)),
                url('https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
        }

        .about-banner::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: linear-gradient(to top, #08460b, transparent);
        }

        .banner-text {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .banner-text h1 {
            font-weight: 700;
            font-size: 3.5rem;
            margin-bottom: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .section {
            padding: 80px 0;
        }

        .section-light {
            background-color: white;
        }

        .section-dark {
            background-color: var(--super-light-green);
        }

        .section-title {
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: var(--primary-color);
        }

        .section-subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 40px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(40, 167, 69, 0.1);
        }

        .card-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .card-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 4px;
            background: linear-gradient(to bottom, var(--primary-color), var(--dark-green));
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -2px;
            border-radius: 4px;
        }

        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
        }

        .timeline-item:nth-child(even) {
            left: 50%;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            background: white;
            border: 4px solid var(--primary-color);
            top: 18px;
            border-radius: 50%;
            z-index: 1;
            box-shadow: 0 0 0 6px rgba(40, 167, 69, 0.2);
        }

        .timeline-item:nth-child(odd)::before {
            right: -13px;
        }

        .timeline-item:nth-child(even)::before {
            left: -13px;
        }

        .timeline-content {
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            position: relative;
            transition: all 0.3s ease;
        }

        .timeline-item:nth-child(odd) .timeline-content::after {
            content: '';
            position: absolute;
            top: 18px;
            right: -15px;
            width: 0;
            height: 0;
            border-top: 15px solid transparent;
            border-left: 15px solid white;
            border-bottom: 15px solid transparent;
        }

        .timeline-item:nth-child(even) .timeline-content::after {
            content: '';
            position: absolute;
            top: 18px;
            left: -15px;
            width: 0;
            height: 0;
            border-top: 15px solid transparent;
            border-right: 15px solid white;
            border-bottom: 15px solid transparent;
        }

        .timeline-year {
            background: var(--primary-color);
            color: white;
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .timeline-title {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .team-card {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .team-img {
            width: 100%;
            height: auto;
            transition: all 0.3s ease;
        }

        .team-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            padding: 20px;
            color: white;
            transform: translateY(20%);
            transition: all 0.3s ease;
            opacity: 0.9;
        }

        .team-card:hover .team-info {
            transform: translateY(0);
            background: linear-gradient(to top, rgba(40, 167, 69, 0.9), transparent);
        }

        .team-card:hover .team-img {
            transform: scale(1.05);
        }

        .team-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .team-position {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .team-social {
            margin-top: 10px;
            display: flex;
        }

        .team-social a {
            color: white;
            margin-right: 10px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .team-social a:hover {
            transform: translateY(-3px);
        }

        .testimonial-card {
            position: relative;
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-top: 40px;
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            box-shadow: 0 15px 35px rgba(40, 167, 69, 0.1);
        }

        .testimonial-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: -40px;
            left: 30px;
        }

        .testimonial-content {
            margin-top: 50px;
        }

        .testimonial-content p {
            font-style: italic;
            margin-bottom: 20px;
            position: relative;
        }

        .testimonial-content p::before {
            content: '\201C';
            font-size: 4rem;
            position: absolute;
            left: -20px;
            top: -30px;
            opacity: 0.1;
            color: var(--primary-color);
        }

        .testimonial-author {
            font-weight: 600;
            color: var(--dark-green);
        }

        .testimonial-position {
            font-size: 0.9rem;
            color: #666;
        }

        .rating {
            color: #ffc107;
            margin-bottom: 15px;
        }

        .stats-box {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
        }

        .stats-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(40, 167, 69, 0.1);
        }

        .stats-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .stats-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 10px;
        }

        .stats-title {
            font-weight: 600;
            color: #666;
        }

        .brands-section {
            background-color: white;
            padding: 60px 0;
        }

        .brand-title {
            text-align: center;
            margin-bottom: 40px;
            font-weight: 600;
            color: var(--dark-green);
        }

        .brand-logo {
            height: 60px;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: 0.6;
            transition: all 0.3s ease;
        }

        .brand-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.1);
        }

        .trust-item {
            text-align: center;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .trust-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .trust-title {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .trust-description {
            color: #666;
            font-size: 0.9rem;
        }

        .footer {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-green));
            color: white;
            padding: 50px 0 20px;
        }

        .footer-title {
            font-weight: 600;
            margin-bottom: 20px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            margin-top: 30px;
        }

        .social-icons a {
            color: white;
            margin-right: 15px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            transform: translateY(-3px);
        }

        .btn-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 99;
        }

        .btn-top.active {
            opacity: 1;
            visibility: visible;
        }

        .btn-top:hover {
            background: var(--dark-green);
            transform: translateY(-5px);
        }

        /* Media Queries */
        @media (max-width: 991px) {
            .timeline-item {
                width: 100%;
                padding-right: 25px;
                padding-left: 70px;
            }

            .timeline-item:nth-child(even) {
                left: 0;
            }

            .timeline::after {
                left: 31px;
            }

            .timeline-item::before {
                left: 18px;
                top: 16px;
            }

            .timeline-item:nth-child(odd)::before {
                right: auto;
            }

            .timeline-item:nth-child(even)::before {
                left: 18px;
            }

            .timeline-item:nth-child(odd) .timeline-content::after {
                right: auto;
                left: -15px;
                border-right: 15px solid white;
                border-left: none;
            }
        }

        @media (max-width: 767px) {
            .section {
                padding: 60px 0;
            }

            .about-banner {
                height: 200px;
            }

            .banner-text h1 {
                font-size: 2.5rem;
            }

            .stats-number {
                font-size: 2rem;
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
                    <a href="about.html" class="text-white mx-3 fw-bold">About Us</a>
                    <a href="contact.html" class="text-white mx-3">Contact</a>
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

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="footer-title">About GreenShop</h5>
                    <p>GreenShop is your trusted destination for eco-friendly and sustainable products. We're committed to making a positive impact on the planet while providing high-quality items at affordable prices.</p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="products.html">Shop</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="footer-title">Customer Service</h5>
                    <ul class="footer-links">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Track Order</a></li>
                        <li><a href="#">Shipping Policy</a></li>
                        <li><a href="#">Returns & Exchanges</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="footer-title">Newsletter</h5>
                    <p>Subscribe to our newsletter for updates on new products, promotions, and sustainability tips.</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Your Email" aria-label="Your Email">
                        <button class="btn btn-light" type="button">Subscribe</button>
                    </div>
                </div>
            </div>

            <div class="row footer-bottom text-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <p class="mb-0">© 2025 GreenShop. All Rights Reserved.</p>
                </div>
                <div class="col-md-6">
                    <p class="mb-0">Payment Methods:
                        <i class="bi bi-credit-card me-2"></i>
                        <i class="bi bi-paypal me-2"></i>
                        <i class="bi bi-wallet2 me-2"></i>
                        <i class="bi bi-bank"></i>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="btn-top" id="btnTop">
        <i class="bi bi-arrow-up"></i>
    </a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize AOS animation library
            AOS.init({
                duration: 800,
                once: true
            });

            // Back to top button
            $(window).scroll(function() {
                if ($(this).scrollTop() > 300) {
                    $('#btnTop').addClass('active');
                } else {
                    $('#btnTop').removeClass('active');
                }
            });

            $('#btnTop').click(function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, 300);
            });

            // Number counter animation
            function animateValue(obj, start, end, duration) {
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    const value = Math.floor(progress * (end - start) + start);

                    // Format the number with commas for thousands
                    const formattedValue = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                    if (value > 999) {
                        // For numbers over 1000, use K notation
                        if (value >= 1000 && value < 1000000) {
                            obj.innerHTML = (value / 1000).toFixed(0) + 'K+';
                        } else {
                            obj.innerHTML = formattedValue + '+';
                        }
                    } else {
                        obj.innerHTML = formattedValue + '%';
                    }

                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);
            }

            // Function to start animation when element is in view
            function isInViewport(element) {
                const rect = element.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }

            let animated = false;

            $(window).scroll(function() {
                if (!animated) {
                    const statsSection = document.querySelector('.stats-number');
                    if (statsSection && isInViewport(statsSection)) {
                        animated = true;

                        // Start animation for each stat number
                        document.querySelectorAll('.stats-number').forEach(function(el) {
                            const endValue = parseInt(el.getAttribute('data-count'));
                            animateValue(el, 0, endValue, 2000);
                        });
                    }
                }
            });

            // Timeline animation enhancements
            $('.timeline-item').hover(function() {
                $(this).find('.timeline-content').css('transform', 'scale(1.05)');
            }, function() {
                $(this).find('.timeline-content').css('transform', 'scale(1)');
            });
        });
    </script>
</body>

</html>