<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Social Media Agency - Creative Branding with AI">
    <title><?php echo e($hero->title ?? 'Social Media Agency'); ?></title>
    
    <!-- Preconnect to CDNs for faster loading -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-green: #1a4d2e;
            --dark-green: #143d24;
            --light-green: #2d6a4f;
            --accent-green: #40916c;
            --white: #ffffff;
            --light-gray: #f8f9fa;
            --dark-gray: #212529;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark-gray);
            overflow-x: hidden;
        }

        /* Navigation */
        .navbar {
            background: rgba(26, 77, 46, 0.95) !important;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            padding: 1rem 0;
        }

        .navbar.scrolled {
            background: rgba(26, 77, 46, 1) !important;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--white) !important;
        }

        .nav-link {
            color: var(--white) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--accent-green) !important;
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--dark-green) 100%);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.03" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            max-width: 600px;
        }

        .btn-primary-custom {
            background: var(--white);
            color: var(--primary-green);
            padding: 1rem 2.5rem;
            font-weight: 600;
            border: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            background: var(--light-gray);
            color: var(--primary-green);
        }

        /* Section Styles */
        .section-padding {
            padding: 5rem 0;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 1rem;
            text-align: center;
        }

        .section-subtitle {
            color: #666;
            text-align: center;
            max-width: 700px;
            margin: 0 auto 3rem;
        }

        /* About Section */
        .about-section {
            background: var(--light-gray);
        }

        .about-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }

        /* What We Do Section */
        .whatwedo-section {
            background: var(--primary-green);
            color: var(--white);
        }

        .whatwedo-section .section-title {
            color: var(--white);
        }

        .whatwedo-content {
            font-size: 1.1rem;
            line-height: 1.8;
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        /* Services Section */
        .services-section {
            background: var(--light-gray);
        }

        .service-card {
            background: var(--white);
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .service-icon {
            width: 70px;
            height: 70px;
            background: var(--primary-green);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
        }

        .service-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-green);
            margin-bottom: 1rem;
        }

        .service-description {
            color: #666;
            line-height: 1.6;
        }

        /* Portfolio Section */
        .portfolio-section {
            background: var(--white);
        }

        .portfolio-filter {
            text-align: center;
            margin-bottom: 2rem;
        }

        .portfolio-filter button {
            background: transparent;
            border: 2px solid var(--primary-green);
            color: var(--primary-green);
            padding: 0.5rem 1.5rem;
            margin: 0.25rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .portfolio-filter button:hover,
        .portfolio-filter button.active {
            background: var(--primary-green);
            color: var(--white);
        }

        .portfolio-item {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            margin-bottom: 1.5rem;
        }

        .portfolio-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .portfolio-item:hover img {
            transform: scale(1.1);
        }

        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(26, 77, 46, 0.9);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            padding: 1.5rem;
            text-align: center;
        }

        .portfolio-item:hover .portfolio-overlay {
            opacity: 1;
        }

        .portfolio-title {
            color: var(--white);
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .portfolio-category {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        /* Contact Section */
        .contact-section {
            background: var(--light-gray);
        }

        .contact-form {
            background: var(--white);
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.05);
        }

        .form-control {
            padding: 0.75rem 1rem;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-green);
            box-shadow: none;
        }

        .btn-submit {
            background: var(--primary-green);
            color: var(--white);
            padding: 1rem 2.5rem;
            font-weight: 600;
            border: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-submit:hover {
            background: var(--dark-green);
            transform: translateY(-2px);
        }

        .contact-info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-green);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        /* Footer */
        .footer {
            background: var(--dark-green);
            color: var(--white);
            padding: 3rem 0 1rem;
        }

        .footer-title {
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .footer-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: var(--white);
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--white);
            color: var(--primary-green);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 2rem;
            padding-top: 1rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .contact-form {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Social Media Agency</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="background-image: url('data:image/svg+xml,<svg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 30 30%27><path stroke=%27rgba(255,255,255,1)%27 stroke-linecap=%27round%27 stroke-miterlimit=%2710%27 stroke-width=%272%27 d=%27M4 7h22M4 15h22M4 23h22%27/></svg>');"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#works">Works</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php echo $__env->yieldContent('content'); ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Fade in animation on scroll (optimized)
    const observerOptions = {
        threshold: 0.05,
        rootMargin: '0px 0px -30px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target); // Stop observing after animation
            }
        });
    }, observerOptions);

    // Use requestIdleCallback for better performance
    if ('requestIdleCallback' in window) {
        requestIdleCallback(() => {
            document.querySelectorAll('.fade-in').forEach(el => {
                observer.observe(el);
            });
        });
    } else {
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });
    }
</script>

<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html><?php /**PATH /var/www/html/soma/resources/views/layouts/landing.blade.php ENDPATH**/ ?>