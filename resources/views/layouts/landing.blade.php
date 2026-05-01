<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Social Media Agency - Creative Branding with AI">
    <title>{{ $hero->title ?? 'Social Media Agency' }}</title>
    
    <!-- Preconnect to CDNs for faster loading -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts - Editorial Style -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --color-black: #0a0a0a;
            --color-dark: #1a1a1a;
            --color-gray: #6b6b6b;
            --color-light: #f5f5f5;
            --color-white: #ffffff;
            --color-accent: #c9a96e;
            --font-display: 'Playfair Display', serif;
            --font-body: 'DM Sans', sans-serif;
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-body);
            color: var(--color-dark);
            background: var(--color-white);
            font-size: 16px;
            line-height: 1.7;
            overflow-x: hidden;
        }

        /* Typography */
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-display);
            font-weight: 500;
            line-height: 1.2;
        }

        .display-1 { font-size: clamp(2.5rem, 8vw, 5rem); }
        .display-2 { font-size: clamp(2rem, 5vw, 3.5rem); }
        .display-3 { font-size: clamp(1.75rem, 4vw, 2.5rem); }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 1.5rem 0;
            transition: var(--transition);
            background: transparent;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            padding: 1rem 0;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);
        }

        .navbar.scrolled .navbar-brand,
        .navbar.scrolled .nav-link {
            color: var(--color-black) !important;
        }

        .navbar.scrolled .nav-link:hover {
            color: var(--color-accent) !important;
        }

        .navbar-brand {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--color-white) !important;
            letter-spacing: -0.02em;
        }

        .nav-link {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--color-white) !important;
            padding: 0.5rem 1rem !important;
            letter-spacing: 0.02em;
            text-transform: uppercase;
            position: relative;
            transition: var(--transition);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 1rem;
            right: 1rem;
            height: 1px;
            background: var(--color-accent);
            transform: scaleX(0);
            transition: var(--transition);
        }

        .nav-link:hover::after {
            transform: scaleX(1);
        }

        .nav-link:hover {
            color: var(--color-accent) !important;
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            background-image: none;
            width: 24px;
            height: 2px;
            background: var(--color-white);
            position: relative;
            transition: var(--transition);
        }

        .navbar.scrolled .navbar-toggler-icon {
            background: var(--color-black);
        }

        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background: var(--color-white);
            left: 0;
            transition: var(--transition);
        }

        .navbar.scrolled .navbar-toggler-icon::before,
        .navbar.scrolled .navbar-toggler-icon::after {
            background: var(--color-black);
        }

        .navbar-toggler-icon::before { top: -8px; }
        .navbar-toggler-icon::after { top: 8px; }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #0a0a0a 0%, #0d0d12 50%, #08080a 100%);
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            overflow: hidden;
        }

        .hero-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            animation: floatOrb 20s ease-in-out infinite;
        }

        .orb-1 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(201, 169, 110, 0.2) 0%, transparent 70%);
            top: -15%;
            right: -10%;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(201, 169, 110, 0.15) 0%, transparent 70%);
            bottom: -20%;
            left: -15%;
            animation-delay: -5s;
            animation-duration: 25s;
        }

        .orb-3 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(201, 169, 110, 0.1) 0%, transparent 70%);
            top: 40%;
            left: 30%;
            animation-delay: -10s;
            animation-duration: 18s;
        }

        @keyframes floatOrb {
            0%, 100% { 
                transform: translate(0, 0) scale(1); 
                opacity: 0.6;
            }
            25% { 
                transform: translate(30px, -30px) scale(1.1); 
                opacity: 0.8;
            }
            50% { 
                transform: translate(-20px, 20px) scale(0.9); 
                opacity: 0.5;
            }
            75% { 
                transform: translate(20px, -20px) scale(1.05); 
                opacity: 0.7;
            }
        }

        .hero-particles {
            position: absolute;
            inset: 0;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(201, 169, 110, 0.6);
            border-radius: 50%;
            animation: particleFloat 15s ease-in-out infinite;
        }

        .particle:nth-child(1) { left: 10%; top: 20%; animation-delay: 0s; animation-duration: 12s; }
        .particle:nth-child(2) { left: 20%; top: 60%; animation-delay: -2s; animation-duration: 14s; }
        .particle:nth-child(3) { left: 30%; top: 40%; animation-delay: -4s; animation-duration: 16s; }
        .particle:nth-child(4) { left: 40%; top: 80%; animation-delay: -6s; animation-duration: 11s; }
        .particle:nth-child(5) { left: 50%; top: 30%; animation-delay: -8s; animation-duration: 13s; }
        .particle:nth-child(6) { left: 60%; top: 70%; animation-delay: -1s; animation-duration: 15s; }
        .particle:nth-child(7) { left: 70%; top: 50%; animation-delay: -3s; animation-duration: 17s; }
        .particle:nth-child(8) { left: 80%; top: 20%; animation-delay: -5s; animation-duration: 12s; }
        .particle:nth-child(9) { left: 90%; top: 60%; animation-delay: -7s; animation-duration: 14s; }
        .particle:nth-child(10) { left: 15%; top: 85%; animation-delay: -9s; animation-duration: 16s; }
        .particle:nth-child(11) { left: 25%; top: 15%; animation-delay: -11s; animation-duration: 13s; }
        .particle:nth-child(12) { left: 75%; top: 75%; animation-delay: -4s; animation-duration: 15s; }

        @keyframes particleFloat {
            0%, 100% { 
                transform: translateY(0) translateX(0); 
                opacity: 0;
            }
            10% { 
                opacity: 0.8;
            }
            90% { 
                opacity: 0.8;
            }
            100% { 
                transform: translateY(-100px) translateX(50px); 
                opacity: 0;
            }
        }

        .hero-lines {
            position: absolute;
            inset: 0;
            overflow: hidden;
            opacity: 0.03;
        }

        .hero-line {
            position: absolute;
            width: 1px;
            height: 100%;
            background: linear-gradient(to bottom, transparent, rgba(201, 169, 110, 0.5), transparent);
            animation: lineFloat 8s ease-in-out infinite;
        }

        .hero-line:nth-child(1) { left: 20%; animation-delay: 0s; }
        .hero-line:nth-child(2) { left: 40%; animation-delay: -2s; }
        .hero-line:nth-child(3) { left: 60%; animation-delay: -4s; }
        .hero-line:nth-child(4) { left: 80%; animation-delay: -6s; }

        @keyframes lineFloat {
            0%, 100% { transform: translateY(-100%); }
            50% { transform: translateY(100%); }
        }

        .hero-grain {
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
            opacity: 0.05;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-subtitle {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.3em;
            color: var(--color-accent);
            margin-bottom: 1.5rem;
            font-weight: 500;
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards 0.2s;
        }

        .hero-title {
            font-family: var(--font-display);
            font-size: clamp(2.5rem, 7vw, 5rem);
            font-weight: 400;
            color: var(--color-white);
            margin-bottom: 1.5rem;
            line-height: 1.1;
            letter-spacing: -0.02em;
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards 0.4s;
        }

        .hero-title span {
            display: inline-block;
        }

        .hero-title .word {
            display: inline-block;
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards;
        }

        .hero-description {
            font-size: 1.125rem;
            color: rgba(255, 255, 255, 0.7);
            max-width: 500px;
            margin-bottom: 2.5rem;
            line-height: 1.8;
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards 0.6s;
        }

        .hero-cta {
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards 0.8s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-scroll {
            position: absolute;
            bottom: 3rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards 1s;
        }

        .hero-scroll-line {
            width: 1px;
            height: 40px;
            background: linear-gradient(to bottom, var(--color-accent), transparent);
            animation: scrollLine 2s ease-in-out infinite;
        }

        @keyframes scrollLine {
            0%, 100% { transform: scaleY(1); opacity: 1; }
            50% { transform: scaleY(0.5); opacity: 0.5; }
        }

        .btn-primary-custom {
            background: var(--color-white);
            color: var(--color-black);
            padding: 1rem 2.5rem;
            font-weight: 500;
            border: none;
            border-radius: 0;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
        }

        .btn-primary-custom:hover {
            background: var(--color-accent);
            color: var(--color-white);
            transform: translateX(10px);
        }

        .btn-primary-custom i {
            transition: var(--transition);
        }

        .btn-primary-custom:hover i {
            transform: translateX(5px);
        }

        /* Section Styles */
        .section-padding {
            padding: clamp(4rem, 10vw, 8rem) 0;
        }

        .section-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: var(--color-accent);
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .section-title {
            font-family: var(--font-display);
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 400;
            color: var(--color-black);
            margin-bottom: 1.5rem;
            letter-spacing: -0.01em;
        }

        .section-subtitle {
            color: var(--color-gray);
            max-width: 600px;
            margin: 0 auto;
        }

        /* About Section */
        .about-section {
            background: var(--color-white);
        }

        .about-image-wrapper {
            position: relative;
            overflow: hidden;
        }

        .about-image-wrapper img {
            width: 100%;
            height: auto;
            transition: var(--transition);
        }

        .about-image-wrapper:hover img {
            transform: scale(1.03);
        }

        .about-image-wrapper::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            right: 20px;
            bottom: 20px;
            border: 1px solid var(--color-accent);
            z-index: -1;
        }

        .about-content {
            font-size: 1.125rem;
            line-height: 1.9;
            color: var(--color-gray);
        }

        /* What We Do Section */
        .whatwedo-section {
            background: var(--color-black);
            color: var(--color-white);
        }

        .whatwedo-section .section-title {
            color: var(--color-white);
        }

        .whatwedo-content {
            font-size: clamp(1.25rem, 3vw, 1.75rem);
            line-height: 1.8;
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            font-family: var(--font-display);
            font-weight: 400;
        }

        /* Services Section */
        .services-section {
            background: var(--color-light);
        }

        .service-card {
            background: var(--color-white);
            padding: clamp(2rem, 4vw, 3rem);
            transition: var(--transition);
            height: 100%;
            border: 1px solid transparent;
        }

        .service-card:hover {
            border-color: var(--color-accent);
            transform: translateY(-5px);
        }

        .service-number {
            font-family: var(--font-display);
            font-size: 3rem;
            color: var(--color-light);
            margin-bottom: 1rem;
            line-height: 1;
        }

        .service-title {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 500;
            color: var(--color-black);
            margin-bottom: 1rem;
        }

        .service-description {
            color: var(--color-gray);
            font-size: 0.95rem;
            line-height: 1.7;
        }

        /* Portfolio Section */
        .portfolio-section {
            background: var(--color-white);
        }

        .portfolio-filter {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 3rem;
        }

        .portfolio-filter button {
            background: transparent;
            border: none;
            color: var(--color-gray);
            padding: 0.5rem 1.5rem;
            font-size: 0.85rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            transition: var(--transition);
            cursor: pointer;
            position: relative;
        }

        .portfolio-filter button::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 1px;
            background: var(--color-accent);
            transition: var(--transition);
            transform: translateX(-50%);
        }

        .portfolio-filter button:hover,
        .portfolio-filter button.active {
            color: var(--color-black);
        }

        .portfolio-filter button.active::after {
            width: 100%;
        }

        .portfolio-item {
            position: relative;
            overflow: hidden;
            aspect-ratio: 4/5;
            background: var(--color-light);
        }

        .portfolio-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .portfolio-item:hover img {
            transform: scale(1.05);
        }

        .portfolio-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 50%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 2rem;
            opacity: 0;
            transition: var(--transition);
        }

        .portfolio-item:hover .portfolio-overlay {
            opacity: 1;
        }

        .portfolio-title {
            color: var(--color-white);
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            transform: translateY(20px);
            transition: var(--transition);
        }

        .portfolio-category {
            color: var(--color-accent);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            transform: translateY(20px);
            transition: var(--transition);
            transition-delay: 0.05s;
        }

        .portfolio-item:hover .portfolio-title,
        .portfolio-item:hover .portfolio-category {
            transform: translateY(0);
        }

        /* Contact Section */
        .contact-section {
            background: var(--color-white);
        }

        .contact-form {
            background: var(--color-white);
            padding: 0;
        }

        .form-control {
            padding: 1rem 0;
            border: none;
            border-bottom: 1px solid #e0e0e0;
            border-radius: 0;
            transition: var(--transition);
            background: transparent;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: var(--color-accent);
            box-shadow: none;
            background: transparent;
        }

        .form-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--color-gray);
            margin-bottom: 0.5rem;
        }

        .btn-submit {
            background: var(--color-black);
            color: var(--color-white);
            padding: 1.25rem 3rem;
            font-weight: 500;
            border: none;
            border-radius: 0;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            transition: var(--transition);
            width: auto;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
        }

        .btn-submit:hover {
            background: var(--color-accent);
            transform: translateX(10px);
        }

        .contact-info-item {
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            border: 1px solid var(--color-black);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: var(--transition);
        }

        .contact-info-item:hover .contact-icon {
            background: var(--color-black);
            color: var(--color-white);
        }

        .contact-info-item h5 {
            font-family: var(--font-body);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--color-gray);
            margin-bottom: 0.25rem;
            font-weight: 600;
        }

        .contact-info-item p {
            color: var(--color-dark);
            font-size: 1rem;
        }

        /* Footer */
        .footer {
            background: var(--color-black);
            color: var(--color-white);
            padding: clamp(3rem, 8vw, 6rem) 0 2rem;
        }

        .footer-brand {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            display: block;
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.95rem;
            max-width: 300px;
            line-height: 1.8;
        }

        .footer-title {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-bottom: 1.5rem;
            color: var(--color-white);
            font-weight: 600;
        }

        .footer-link {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            display: block;
            margin-bottom: 0.75rem;
            transition: var(--transition);
            font-size: 0.95rem;
        }

        .footer-link:hover {
            color: var(--color-accent);
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 45px;
            height: 45px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--color-white);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: var(--transition);
            font-size: 1rem;
        }

        .social-link:hover {
            background: var(--color-white);
            color: var(--color-black);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 4rem;
            padding-top: 2rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 1rem;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.85rem;
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .stagger-1 { transition-delay: 0.1s; }
        .stagger-2 { transition-delay: 0.2s; }
        .stagger-3 { transition-delay: 0.3s; }
        .stagger-4 { transition-delay: 0.4s; }

        /* Responsive */
        @media (max-width: 991px) {
            .navbar-collapse {
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(20px);
                padding: 2rem;
                margin-top: 1rem;
                border-radius: 0;
            }

            .navbar.scrolled .navbar-collapse {
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            }

            .nav-link {
                color: var(--color-black) !important;
            }

            .about-image-wrapper::before {
                display: none;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .section-title {
                text-align: center;
            }

            .about-section .row {
                flex-direction: column-reverse;
            }

            .contact-info-item {
                justify-content: center;
                text-align: center;
            }

            .portfolio-filter {
                gap: 0.5rem;
            }

            .portfolio-filter button {
                padding: 0.5rem 1rem;
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">SOMA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
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

@yield('content')

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

@yield('scripts')

</body>
</html>