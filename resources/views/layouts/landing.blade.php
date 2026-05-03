<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ \App\Models\SiteSetting::getSettings()->site_name }} - Creative Branding Agency with AI-Powered Workflow">
    <title>{{ $hero->title ?? \App\Models\SiteSetting::getSettings()->site_name . ' — Creative Branding Agency' }}</title>
    
    <!-- Preconnect -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts - Neo-Brutalist -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        /* ============================================
           NEO-BRUTALIST DESIGN SYSTEM
           ============================================ */
        :root {
            --color-bg: #FFFDF5;
            --color-black: #0D0D0D;
            --color-dark: #1A1A1A;
            --color-gray: #555555;
            --color-light-gray: #E8E8E8;
            --color-white: #FFFFFF;
            --color-pink: #FF5277;
            --color-yellow: #FFE156;
            --color-cyan: #00C2FF;
            --color-lime: #CCFF00;
            --color-orange: #FF8A3D;
            --font-display: 'Space Mono', monospace;
            --font-body: 'Space Grotesk', sans-serif;
            --border: 3px solid var(--color-black);
            --shadow: 5px 5px 0px var(--color-black);
            --shadow-lg: 8px 8px 0px var(--color-black);
            --shadow-hover: 3px 3px 0px var(--color-black);
            --transition: all 0.15s ease;
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
            color: var(--color-black);
            background: var(--color-bg);
            font-size: 16px;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Typography */
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-display);
            font-weight: 700;
            line-height: 1.15;
            text-transform: uppercase;
        }

        ::selection {
            background: var(--color-yellow);
            color: var(--color-black);
        }

        /* ============================================
           NAVIGATION
           ============================================ */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 1rem 0;
            transition: var(--transition);
            background: transparent;
            border-bottom: 3px solid transparent;
        }

        .navbar.scrolled {
            background: var(--color-bg);
            border-bottom: var(--border);
        }

        .navbar.scrolled .navbar-brand {
            color: var(--color-black) !important;
        }

        .navbar.scrolled .nav-link {
            color: var(--color-black) !important;
        }

        .navbar-brand {
            font-family: var(--font-display);
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--color-white) !important;
            letter-spacing: -0.03em;
            text-transform: uppercase;
            text-decoration: none;
        }

        .nav-link {
            font-family: var(--font-display);
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--color-white) !important;
            padding: 0.4rem 0.8rem !important;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            position: relative;
            transition: var(--transition);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0.8rem;
            right: 0.8rem;
            height: 3px;
            background: var(--color-pink);
            transform: scaleX(0);
            transform-origin: left;
            transition: var(--transition);
        }

        .nav-link:hover::after {
            transform: scaleX(1);
        }

        .nav-link:hover {
            color: var(--color-pink) !important;
        }

        .navbar.scrolled .nav-link:hover {
            color: var(--color-pink) !important;
        }

        .navbar-toggler {
            border: var(--border);
            padding: 0.4rem 0.6rem;
            border-radius: 0;
            background: var(--color-yellow);
        }

        .navbar-toggler:focus {
            box-shadow: var(--shadow-hover);
        }

        .navbar-toggler-icon {
            background-image: none;
            width: 24px;
            height: 3px;
            background: var(--color-black);
            position: relative;
            transition: var(--transition);
        }

        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 3px;
            background: var(--color-black);
            left: 0;
            transition: var(--transition);
        }

        .navbar-toggler-icon::before { top: -7px; }
        .navbar-toggler-icon::after { top: 7px; }

        /* ============================================
           HERO SECTION
           ============================================ */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: var(--color-black);
            border-bottom: var(--border);
        }

        .hero-deco {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .hero-deco-block {
            position: absolute;
            border: 3px solid rgba(255, 255, 255, 0.08);
        }

        .hero-deco-block:nth-child(1) {
            width: 200px;
            height: 200px;
            top: 10%;
            right: 5%;
            background: var(--color-pink);
            opacity: 0.15;
            transform: rotate(12deg);
        }

        .hero-deco-block:nth-child(2) {
            width: 150px;
            height: 150px;
            bottom: 15%;
            right: 20%;
            background: var(--color-yellow);
            opacity: 0.12;
            transform: rotate(-8deg);
        }

        .hero-deco-block:nth-child(3) {
            width: 100px;
            height: 100px;
            top: 35%;
            right: 15%;
            background: var(--color-cyan);
            opacity: 0.1;
            transform: rotate(25deg);
        }

        .hero-deco-block:nth-child(4) {
            width: 80px;
            height: 300px;
            bottom: 0;
            left: 8%;
            background: var(--color-lime);
            opacity: 0.06;
            transform: rotate(-3deg);
        }

        .hero-grid-lines {
            position: absolute;
            inset: 0;
            overflow: hidden;
            opacity: 0.04;
        }

        .hero-grid-lines::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,1) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-subtitle {
            font-family: var(--font-display);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--color-yellow);
            margin-bottom: 1.5rem;
            font-weight: 700;
            display: inline-block;
            background: var(--color-black);
            border: 2px solid var(--color-yellow);
            padding: 0.4rem 1rem;
            opacity: 0;
            animation: brutalistFadeIn 0.4s ease forwards 0.2s;
        }

        .hero-title {
            font-family: var(--font-display);
            font-size: clamp(2.2rem, 6.5vw, 4.5rem);
            font-weight: 700;
            color: var(--color-white);
            margin-bottom: 1.5rem;
            line-height: 1.1;
            letter-spacing: -0.03em;
            text-transform: uppercase;
            opacity: 0;
            animation: brutalistFadeIn 0.4s ease forwards 0.35s;
        }

        .hero-title .highlight {
            color: var(--color-pink);
            position: relative;
        }

        .hero-description {
            font-family: var(--font-body);
            font-size: 1.15rem;
            color: rgba(255, 255, 255, 0.7);
            max-width: 520px;
            margin-bottom: 2.5rem;
            line-height: 1.7;
            opacity: 0;
            animation: brutalistFadeIn 0.4s ease forwards 0.5s;
        }

        .hero-cta {
            opacity: 0;
            animation: brutalistFadeIn 0.4s ease forwards 0.65s;
        }

        @keyframes brutalistFadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-scroll {
            position: absolute;
            bottom: 2.5rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.5);
            font-family: var(--font-display);
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            opacity: 0;
            animation: brutalistFadeIn 0.4s ease forwards 0.8s;
        }

        .hero-scroll-line {
            width: 3px;
            height: 40px;
            background: var(--color-pink);
            animation: scrollPulse 1.5s ease-in-out infinite;
        }

        @keyframes scrollPulse {
            0%, 100% { transform: scaleY(1); opacity: 1; }
            50% { transform: scaleY(0.4); opacity: 0.4; }
        }

        /* Primary CTA Button */
        .btn-primary-custom {
            background: var(--color-yellow);
            color: var(--color-black);
            padding: 1rem 2.5rem;
            font-family: var(--font-display);
            font-weight: 700;
            border: var(--border);
            border-radius: 0;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: var(--shadow);
            cursor: pointer;
        }

        .btn-primary-custom:hover {
            background: var(--color-pink);
            color: var(--color-white);
            box-shadow: var(--shadow-hover);
            transform: translate(2px, 2px);
        }

        .btn-primary-custom:active {
            box-shadow: none;
            transform: translate(5px, 5px);
        }

        .btn-primary-custom i {
            transition: var(--transition);
        }

        .btn-primary-custom:hover i {
            transform: translateX(4px);
        }

        /* ============================================
           SECTION SHARED STYLES
           ============================================ */
        .section-padding {
            padding: clamp(4rem, 10vw, 7rem) 0;
        }

        .section-label {
            font-family: var(--font-display);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--color-black);
            margin-bottom: 0.75rem;
            font-weight: 700;
            display: inline-block;
            background: var(--color-yellow);
            padding: 0.3rem 0.8rem;
            border: 2px solid var(--color-black);
            box-shadow: 3px 3px 0 var(--color-black);
        }

        .section-title {
            font-family: var(--font-display);
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 700;
            color: var(--color-black);
            margin-bottom: 1.5rem;
            letter-spacing: -0.02em;
            text-transform: uppercase;
        }

        /* ============================================
           ABOUT SECTION
           ============================================ */
        .about-section {
            background: var(--color-bg);
            border-bottom: var(--border);
        }

        .about-image-wrapper {
            position: relative;
            overflow: hidden;
            border: var(--border);
            box-shadow: var(--shadow-lg);
        }

        .about-image-wrapper img {
            width: 100%;
            height: auto;
            display: block;
            transition: var(--transition);
        }

        .about-image-wrapper:hover img {
            transform: scale(1.03);
        }

        .about-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--color-dark);
        }

        /* ============================================
           WHAT WE DO SECTION
           ============================================ */
        .whatwedo-section {
            background: var(--color-black);
            color: var(--color-white);
            border-bottom: var(--border);
            position: relative;
            overflow: hidden;
        }

        .whatwedo-section::before {
            content: '//';
            position: absolute;
            top: -30px;
            right: 5%;
            font-family: var(--font-display);
            font-size: 15rem;
            color: rgba(255, 255, 255, 0.03);
            font-weight: 700;
            pointer-events: none;
        }

        .whatwedo-section .section-label {
            background: var(--color-pink);
            color: var(--color-white);
            border-color: var(--color-white);
            box-shadow: 3px 3px 0 rgba(255,255,255,0.3);
        }

        .whatwedo-content {
            font-size: clamp(1.2rem, 2.5vw, 1.6rem);
            line-height: 1.8;
            max-width: 850px;
            margin: 0 auto;
            text-align: center;
            color: rgba(255, 255, 255, 0.85);
            font-family: var(--font-body);
            font-weight: 400;
        }

        /* ============================================
           SERVICES SECTION
           ============================================ */
        .services-section {
            background: var(--color-bg);
            border-bottom: var(--border);
        }

        .service-card {
            background: var(--color-white);
            padding: clamp(1.5rem, 3vw, 2.5rem);
            transition: var(--transition);
            height: 100%;
            border: var(--border);
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--color-yellow);
            transition: var(--transition);
        }

        .service-card:hover {
            transform: translate(-2px, -2px);
            box-shadow: var(--shadow-lg);
        }

        .service-card:hover::before {
            height: 8px;
            background: var(--color-pink);
        }

        .service-number {
            font-family: var(--font-display);
            font-size: 3.5rem;
            color: var(--color-light-gray);
            margin-bottom: 0.5rem;
            line-height: 1;
            font-weight: 700;
        }

        .service-card:hover .service-number {
            color: var(--color-pink);
        }

        .service-title {
            font-family: var(--font-display);
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--color-black);
            margin-bottom: 0.8rem;
            text-transform: uppercase;
        }

        .service-description {
            color: var(--color-gray);
            font-size: 0.95rem;
            line-height: 1.7;
        }

        /* ============================================
           PORTFOLIO SECTION
           ============================================ */
        .portfolio-section {
            background: var(--color-white);
            border-bottom: var(--border);
        }

        .portfolio-filter {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            justify-content: center;
            margin-bottom: 2.5rem;
        }

        .portfolio-filter button {
            background: transparent;
            border: var(--border);
            color: var(--color-black);
            padding: 0.5rem 1.2rem;
            font-family: var(--font-display);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            transition: var(--transition);
            cursor: pointer;
            box-shadow: 3px 3px 0 var(--color-black);
        }

        .portfolio-filter button:hover {
            background: var(--color-yellow);
            transform: translate(-1px, -1px);
            box-shadow: 4px 4px 0 var(--color-black);
        }

        .portfolio-filter button.active {
            background: var(--color-black);
            color: var(--color-white);
            box-shadow: none;
            transform: translate(3px, 3px);
        }

        .portfolio-item {
            position: relative;
            overflow: hidden;
            aspect-ratio: 4/5;
            background: var(--color-light-gray);
            border: var(--border);
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .portfolio-item:hover {
            transform: translate(-2px, -2px);
            box-shadow: var(--shadow-lg);
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
            background: rgba(13, 13, 13, 0.85);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 1.5rem;
            opacity: 0;
            transition: var(--transition);
        }

        .portfolio-item:hover .portfolio-overlay {
            opacity: 1;
        }

        .portfolio-title {
            color: var(--color-white);
            font-family: var(--font-display);
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            transform: translateY(10px);
            transition: var(--transition);
        }

        .portfolio-category {
            color: var(--color-yellow);
            font-family: var(--font-display);
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 700;
            transform: translateY(10px);
            transition: var(--transition);
            transition-delay: 0.05s;
        }

        .portfolio-item:hover .portfolio-title,
        .portfolio-item:hover .portfolio-category {
            transform: translateY(0);
        }

        /* ============================================
           CONTACT SECTION
           ============================================ */
        .contact-section {
            background: var(--color-bg);
            border-bottom: var(--border);
        }

        .contact-form {
            background: var(--color-white);
            border: var(--border);
            box-shadow: var(--shadow-lg);
            padding: clamp(1.5rem, 4vw, 3rem);
        }

        .form-control {
            padding: 0.9rem 1rem;
            border: var(--border);
            border-radius: 0;
            transition: var(--transition);
            background: var(--color-bg);
            font-family: var(--font-body);
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: var(--color-pink);
            box-shadow: 4px 4px 0 var(--color-pink);
            background: var(--color-white);
            outline: none;
        }

        .form-label {
            font-family: var(--font-display);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--color-black);
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .btn-submit {
            background: var(--color-black);
            color: var(--color-white);
            padding: 1.15rem 2.5rem;
            font-family: var(--font-display);
            font-weight: 700;
            border: var(--border);
            border-radius: 0;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            transition: var(--transition);
            width: auto;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: var(--shadow);
            cursor: pointer;
        }

        .btn-submit:hover {
            background: var(--color-pink);
            color: var(--color-white);
            transform: translate(-2px, -2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-submit:active {
            box-shadow: none;
            transform: translate(5px, 5px);
        }

        .contact-info-item {
            display: flex;
            align-items: flex-start;
            gap: 1.25rem;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            border: var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: var(--transition);
            box-shadow: 3px 3px 0 var(--color-black);
            background: var(--color-yellow);
        }

        .contact-info-item:hover .contact-icon {
            background: var(--color-pink);
            color: var(--color-white);
            transform: translate(-2px, -2px);
            box-shadow: var(--shadow);
        }

        .contact-info-item h5 {
            font-family: var(--font-display);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--color-gray);
            margin-bottom: 0.25rem;
            font-weight: 700;
        }

        .contact-info-item p {
            color: var(--color-dark);
            font-size: 1rem;
        }

        /* ============================================
           FOOTER
           ============================================ */
        .footer {
            background: var(--color-black);
            color: var(--color-white);
            padding: clamp(3rem, 8vw, 5rem) 0 2rem;
            border-top: 5px solid var(--color-yellow);
        }

        .footer-brand {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: block;
            text-transform: uppercase;
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            max-width: 300px;
            line-height: 1.7;
        }

        .footer-title {
            font-family: var(--font-display);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            margin-bottom: 1.5rem;
            color: var(--color-yellow);
            font-weight: 700;
        }

        .footer-link {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            display: block;
            margin-bottom: 0.75rem;
            transition: var(--transition);
            font-size: 0.9rem;
        }

        .footer-link:hover {
            color: var(--color-pink);
            transform: translateX(4px);
        }

        .social-links {
            display: flex;
            gap: 0.75rem;
        }

        .social-link {
            width: 45px;
            height: 45px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: var(--color-white);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: var(--transition);
            font-size: 1rem;
            background: transparent;
        }

        .social-link:hover {
            background: var(--color-yellow);
            color: var(--color-black);
            border-color: var(--color-yellow);
            box-shadow: 3px 3px 0 rgba(255, 255, 255, 0.3);
            transform: translate(-2px, -2px);
        }

        .footer-bottom {
            border-top: 2px solid rgba(255, 255, 255, 0.1);
            margin-top: 3rem;
            padding-top: 1.5rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 1rem;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.8rem;
            font-family: var(--font-display);
        }

        /* Scroll to Top Button */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 45px;
            height: 45px;
            background: #ffe057;
            color: #000;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            background: #ff5277;
            color: #000;
            transform: translateY(-3px);
        }

        /* ============================================
           ANIMATIONS
           ============================================ */
        .fade-in {
            opacity: 0;
            transform: translateY(25px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .stagger-1 { transition-delay: 0.08s; }
        .stagger-2 { transition-delay: 0.16s; }
        .stagger-3 { transition-delay: 0.24s; }
        .stagger-4 { transition-delay: 0.32s; }
        .stagger-5 { transition-delay: 0.40s; }

        /* ============================================
           RESPONSIVE
           ============================================ */

        /* --- Tablet (max-width: 991px) --- */
        @media (max-width: 991px) {
            .navbar-collapse {
                background: var(--color-bg);
                border: var(--border);
                padding: 1.5rem;
                margin-top: 1rem;
                box-shadow: var(--shadow);
            }

            .navbar-collapse .nav-link {
                color: var(--color-black) !important;
                padding: 0.6rem 0.8rem !important;
                border-bottom: 2px solid var(--color-light-gray);
            }

            .navbar-collapse .nav-link:last-child {
                border-bottom: none;
            }

            .navbar-collapse .nav-link::after {
                display: none;
            }

            .hero-title {
                font-size: clamp(2rem, 5.5vw, 3.5rem);
            }

            .hero-description {
                font-size: 1rem;
            }

            .section-padding {
                padding: clamp(3rem, 8vw, 5rem) 0;
            }

            .service-card {
                box-shadow: 4px 4px 0 var(--color-black);
            }

            .about-image-wrapper {
                box-shadow: var(--shadow);
            }

            .contact-form {
                box-shadow: var(--shadow);
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }

            .footer-description {
                max-width: 100%;
            }
        }

        /* --- Mobile (max-width: 768px) --- */
        @media (max-width: 768px) {
            body {
                font-size: 15px;
            }

            .container {
                padding-left: 1.25rem;
                padding-right: 1.25rem;
            }

            /* Hero */
            .hero-section {
                min-height: 100svh;
                padding-top: 5rem;
                padding-bottom: 4rem;
            }

            .hero-title {
                font-size: clamp(1.8rem, 8vw, 2.8rem);
                word-break: break-word;
            }

            .hero-subtitle {
                font-size: 0.7rem;
                padding: 0.3rem 0.7rem;
            }

            .hero-description {
                font-size: 0.95rem;
                margin-bottom: 2rem;
                max-width: 100%;
            }

            .btn-primary-custom {
                padding: 0.85rem 1.8rem;
                font-size: 0.8rem;
                width: 100%;
                justify-content: center;
                box-shadow: 4px 4px 0 var(--color-black);
            }

            .hero-scroll {
                bottom: 1.5rem;
            }

            .hero-deco-block:nth-child(1) {
                width: 100px;
                height: 100px;
                top: 8%;
                right: 3%;
            }

            .hero-deco-block:nth-child(2) {
                width: 70px;
                height: 70px;
                bottom: 20%;
                right: 10%;
            }

            .hero-deco-block:nth-child(3),
            .hero-deco-block:nth-child(4) {
                display: none;
            }

            /* Sections */
            .section-padding {
                padding: clamp(2.5rem, 8vw, 4rem) 0;
            }

            .section-title {
                text-align: center;
                font-size: clamp(1.4rem, 5vw, 2rem);
            }

            .section-label {
                display: block;
                text-align: center;
                width: fit-content;
                margin-left: auto;
                margin-right: auto;
                font-size: 0.65rem;
                padding: 0.25rem 0.6rem;
            }

            /* About */
            .about-section .row {
                flex-direction: column-reverse;
            }

            .about-image-wrapper {
                box-shadow: 4px 4px 0 var(--color-black);
                margin-bottom: 1rem;
            }

            .about-content {
                font-size: 1rem;
                text-align: center;
            }

            /* What We Do */
            .whatwedo-section::before {
                font-size: 8rem;
            }

            .whatwedo-content {
                font-size: clamp(1rem, 4vw, 1.3rem);
                line-height: 1.7;
            }

            /* Services */
            .service-card {
                padding: 1.25rem;
                box-shadow: 4px 4px 0 var(--color-black);
            }

            .service-number {
                font-size: 2.5rem;
            }

            .service-title {
                font-size: 1rem;
            }

            .service-description {
                font-size: 0.9rem;
            }

            /* Portfolio */
            .portfolio-filter {
                gap: 0.4rem;
            }

            .portfolio-filter button {
                padding: 0.35rem 0.7rem;
                font-size: 0.65rem;
                box-shadow: 2px 2px 0 var(--color-black);
            }

            .portfolio-item {
                box-shadow: 4px 4px 0 var(--color-black);
                aspect-ratio: 1/1;
            }

            .portfolio-title {
                font-size: 1rem;
            }

            .portfolio-overlay {
                padding: 1rem;
            }

            /* Contact */
            .contact-form {
                padding: 1.25rem;
                box-shadow: 4px 4px 0 var(--color-black);
            }

            .form-control {
                padding: 0.75rem 0.8rem;
                font-size: 0.95rem;
            }

            .form-control:focus {
                box-shadow: 3px 3px 0 var(--color-pink);
            }

            .btn-submit {
                width: 100%;
                justify-content: center;
                padding: 1rem 2rem;
                box-shadow: 4px 4px 0 var(--color-black);
            }

            .contact-info-item {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 0.75rem;
            }

            .contact-icon {
                width: 45px;
                height: 45px;
            }

            .contact-info-item p {
                font-size: 0.9rem;
                word-break: break-all;
            }

            /* Footer */
            .footer {
                padding: 2.5rem 0 1.5rem;
                text-align: center;
            }

            .footer-brand {
                font-size: 1.5rem;
                text-align: center;
            }

            .footer-description {
                max-width: 100%;
                margin: 0 auto;
                text-align: center;
            }

            .footer-title {
                margin-top: 1.5rem;
                margin-bottom: 1rem;
            }

            .social-links {
                justify-content: center;
            }

            .social-link {
                width: 42px;
                height: 42px;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
                margin-top: 2rem;
            }

            .footer-link {
                text-align: center;
            }
        }

        /* --- Small Mobile (max-width: 480px) --- */
        @media (max-width: 480px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .navbar-brand {
                font-size: 1.3rem;
            }

            .hero-title {
                font-size: clamp(1.5rem, 9vw, 2.2rem);
            }

            .hero-description {
                font-size: 0.9rem;
            }

            .btn-primary-custom {
                padding: 0.75rem 1.2rem;
                font-size: 0.75rem;
                gap: 0.5rem;
                box-shadow: 3px 3px 0 var(--color-black);
            }

            .section-title {
                font-size: clamp(1.2rem, 6vw, 1.6rem);
            }

            .section-padding {
                padding: 2rem 0;
            }

            .service-card {
                padding: 1rem;
                box-shadow: 3px 3px 0 var(--color-black);
            }

            .service-number {
                font-size: 2rem;
            }

            .service-title {
                font-size: 0.9rem;
            }

            .portfolio-item {
                box-shadow: 3px 3px 0 var(--color-black);
            }

            .contact-form {
                padding: 1rem;
                box-shadow: 3px 3px 0 var(--color-black);
            }

            .form-label {
                font-size: 0.65rem;
            }

            .btn-submit {
                padding: 0.85rem 1.5rem;
                font-size: 0.75rem;
                box-shadow: 3px 3px 0 var(--color-black);
            }

            .footer-brand {
                font-size: 1.3rem;
            }

            .whatwedo-section::before {
                font-size: 5rem;
            }
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">{{ \App\Models\SiteSetting::getSettings()->site_name }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">Works</a></li>
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

    // Fade in animation on scroll
    const observerOptions = {
        threshold: 0.05,
        rootMargin: '0px 0px -30px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

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

<!-- Scroll to Top Button -->
<button class="scroll-top" id="scrollTop" aria-label="Scroll to top">
    <i class="fas fa-arrow-up"></i>
</button>

<script>
    // Scroll to Top functionality
    const scrollTopBtn = document.getElementById('scrollTop');
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            scrollTopBtn.classList.add('visible');
        } else {
            scrollTopBtn.classList.remove('visible');
        }
    });
    
    scrollTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>

</body>
</html>