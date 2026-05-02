@extends('layouts.landing')

@section('content')

<!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="hero-deco">
        <div class="hero-deco-block"></div>
        <div class="hero-deco-block"></div>
        <div class="hero-deco-block"></div>
        <div class="hero-deco-block"></div>
    </div>
    <div class="hero-grid-lines"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 hero-content">
                <span class="hero-subtitle">{{ $hero->subtitle ?? 'Creative Excellence' }}</span>
                <h1 class="hero-title">{{ $hero->title ?? 'Transform Your Brand with AI-Powered Creativity' }}</h1>
                <p class="hero-description">{{ $hero->description ?? 'We help brands grow with content that is fast, consistent, and unmistakably on-brand.' }}</p>
                <div class="hero-cta">
                    <a href="{{ $hero->cta_link ?? '#contact' }}" class="btn-primary-custom">
                        {{ $hero->cta_text ?? 'Get Started' }}
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-scroll">
        <span>Scroll</span>
        <div class="hero-scroll-line"></div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section section-padding">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 fade-in">
                <div class="about-image-wrapper">
                    @if($about && $about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" alt="About Us" class="img-fluid" loading="lazy">
                    @else
                        <img src="https://via.placeholder.com/600x750/0a0a0a/ffffff?text=About" alt="About Us" class="img-fluid" loading="lazy">
                    @endif
                </div>
            </div>
            <div class="col-lg-6 fade-in">
                <span class="section-label">About Us</span>
                <h2 class="section-title">{{ $about->title ?? 'We Are SOMA' }}</h2>
                <div class="about-content">
                    {!! $about->content ?? 'We are the first creative branding agency AI based that built to help brands grow with content that\'s fast, consistent, and unmistakably on-brand. We combine an AI content engine with branding experts who understand your guidelines, so you achieve premium output without conventional agency overhead.' !!}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Do Section -->
<section class="whatwedo-section section-padding">
    <div class="container">
        <span class="section-label fade-in">What We Do</span>
        <h2 class="whatwedo-content fade-in">
            {{ $whatWeDo->content ?? 'We\'ll do whatever it takes to get your brand the attention it deserves, not just reach but real relevance. We deliver a full spectrum of creative branding services with an AI-powered workflow.' }}
        </h2>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label fade-in">Our Services</span>
            <h2 class="section-title fade-in">What We Offer</h2>
        </div>
        
        <div class="row g-4">
            @foreach($services as $index => $service)
            <div class="col-md-6 col-lg-4 fade-in stagger-{{ $index + 1 }}">
                <div class="service-card">
                    <span class="service-number">0{{ $index + 1 }}</span>
                    <h3 class="service-title">{{ $service->title }}</h3>
                    <p class="service-description">{{ $service->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section id="works" class="portfolio-section section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label fade-in">Our Works</span>
            <h2 class="section-title fade-in">Featured Projects</h2>
        </div>
        
        @if($categories->count() > 0)
        <div class="portfolio-filter fade-in">
            <button class="active" data-filter="all">All</button>
            @foreach($categories as $category)
                <button data-filter="{{ $category }}">{{ ucfirst($category) }}</button>
            @endforeach
        </div>
        @endif
        
        <div class="row g-4">
            @foreach($portfolioWorks as $work)
            <div class="col-md-6 col-lg-4 portfolio-item-wrapper fade-in" data-category="{{ $work->category }}">
                <div class="portfolio-item">
                    <img src="{{ asset('storage/' . $work->image) }}" alt="{{ $work->title }}" loading="lazy">
                    <div class="portfolio-overlay">
                        <h4 class="portfolio-title">{{ $work->title }}</h4>
                        <span class="portfolio-category">{{ ucfirst($work->category) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label fade-in">Get In Touch</span>
            <h2 class="section-title fade-in">Let's Talk</h2>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8 fade-in">
                <div class="contact-form">
                    <form id="contactForm" action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Your Name *</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Your Email *</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="row g-4 mt-2">
                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="tel" name="phone" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control">
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="form-label">Message *</label>
                            <textarea name="message" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-paper-plane"></i>Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row g-4 mt-5 justify-content-center">
            <div class="col-md-4 text-center fade-in">
                <div class="contact-info-item justify-content-center">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h5>Email</h5>
                        <p class="mb-0">{{ $contactInfo->email ?? 'hello@soma.com' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center fade-in">
                <div class="contact-info-item justify-content-center">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h5>Phone</h5>
                        <p class="mb-0">{{ $contactInfo->phone ?? '+1 234 567 890' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center fade-in">
                <div class="contact-info-item justify-content-center">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h5>Address</h5>
                        <p class="mb-0">{{ $contactInfo->address ?? '123 Creative Street' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <span class="footer-brand">SOMA</span>
                <p class="footer-description">{{ $about->content ?? 'We are the first creative branding agency AI based that built to help brands grow with content that\'s fast, consistent, and unmistakably on-brand.' }}</p>
                <div class="social-links mt-4">
                    @if($contactInfo && $contactInfo->facebook_link)
                        <a href="{{ $contactInfo->facebook_link }}" class="social-link" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($contactInfo && $contactInfo->instagram_link)
                        <a href="{{ $contactInfo->instagram_link }}" class="social-link" target="_blank"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($contactInfo && $contactInfo->twitter_link)
                        <a href="{{ $contactInfo->twitter_link }}" class="social-link" target="_blank"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if($contactInfo && $contactInfo->linkedin_link)
                        <a href="{{ $contactInfo->linkedin_link }}" class="social-link" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                    @if($contactInfo && $contactInfo->tiktok_link)
                        <a href="{{ $contactInfo->tiktok_link }}" class="social-link" target="_blank"><i class="fab fa-tiktok"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <h4 class="footer-title">Quick Links</h4>
                <a href="#home" class="footer-link">Home</a>
                <a href="#about" class="footer-link">About Us</a>
                <a href="#services" class="footer-link">Services</a>
                <a href="#works" class="footer-link">Our Works</a>
                <a href="#contact" class="footer-link">Contact</a>
            </div>
            <div class="col-lg-4">
                <h4 class="footer-title">Contact Info</h4>
                <p class="footer-link mb-2"><i class="fas fa-envelope me-2"></i>{{ $contactInfo->email ?? 'hello@soma.com' }}</p>
                <p class="footer-link mb-2"><i class="fas fa-phone me-2"></i>{{ $contactInfo->phone ?? '+1 234 567 890' }}</p>
                <p class="footer-link mb-2"><i class="fas fa-map-marker-alt me-2"></i>{{ $contactInfo->address ?? '123 Creative Street' }}</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} SOMA. All rights reserved.</p>
        </div>
    </div>
</footer>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.portfolio-filter button').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.portfolio-filter button').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            
            document.querySelectorAll('.portfolio-item-wrapper').forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const formData = new FormData(form);
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message,
                    confirmButtonColor: '#0D0D0D'
                });
                form.reset();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again.',
                    confirmButtonColor: '#0D0D0D'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong. Please try again.',
                confirmButtonColor: '#0D0D0D'
            });
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    });
</script>
@endsection