<?php $__env->startSection('content'); ?>

<!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 hero-content fade-in">
                <h1 class="hero-title"><?php echo e($hero->title ?? 'Transform Your Brand with AI-Powered Creativity'); ?></h1>
                <p class="hero-subtitle"><?php echo e($hero->subtitle ?? 'We help brands grow with content that is fast, consistent, and unmistakably on-brand.'); ?></p>
                <a href="<?php echo e($hero->cta_link ?? '#contact'); ?>" class="btn-primary-custom"><?php echo e($hero->cta_text ?? 'Get Started'); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 fade-in">
                <?php if($about && $about->image): ?>
                    <img src="<?php echo e(asset('storage/' . $about->image)); ?>" alt="About Us" class="img-fluid rounded-3 shadow" loading="lazy">
                <?php else: ?>
                    <img src="https://via.placeholder.com/600x400/1a4d2e/ffffff?text=About+Us" alt="About Us" class="img-fluid rounded-3 shadow" loading="lazy">
                <?php endif; ?>
            </div>
            <div class="col-lg-6 fade-in">
                <h2 class="section-title text-start"><?php echo e($about->title ?? 'About Us'); ?></h2>
                <div class="about-content">
                    <?php echo $about->content ?? 'We are the first creative branding agency AI based that built to help brands grow with content that\'s fast, consistent, and unmistakably on-brand. We combine an AI content engine with branding experts who understand your guidelines, so you achieve premium output without conventional agency overhead. Let\'s make your brand impossible to ignore.'; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Do Section -->
<section class="whatwedo-section section-padding">
    <div class="container">
        <h2 class="section-title fade-in"><?php echo e($whatWeDo->title ?? 'What We Do'); ?></h2>
        <div class="whatwedo-content fade-in">
            <?php echo nl2br(e($whatWeDo->content ?? 'We\'ll do whatever it takes to get your brand the attention it deserves, not just reach but real relevance. We deliver a full spectrum of creative branding services with an AI-powered workflow to create deeper, stronger, and longer-lasting connections between your brand, your ideas, and your audience.')); ?>

        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section section-padding">
    <div class="container">
        <h2 class="section-title fade-in">Our Services</h2>
        <p class="section-subtitle fade-in">Comprehensive creative branding solutions powered by AI</p>
        
        <div class="row g-4">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-4 fade-in">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="<?php echo e($service->icon); ?>"></i>
                    </div>
                    <h3 class="service-title"><?php echo e($service->title); ?></h3>
                    <p class="service-description"><?php echo e($service->description); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section id="works" class="portfolio-section section-padding">
    <div class="container">
        <h2 class="section-title fade-in">Our Works</h2>
        <p class="section-subtitle fade-in">Take a closer look to see how we've helped brands create on-brand content that performs from strategy to scroll-stopping visuals.</p>
        
        <?php if($categories->count() > 0): ?>
        <div class="portfolio-filter fade-in">
            <button class="active" data-filter="all">All</button>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button data-filter="<?php echo e($category); ?>"><?php echo e(ucfirst($category)); ?></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
        
        <div class="row g-4">
            <?php $__currentLoopData = $portfolioWorks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-4 portfolio-item-wrapper fade-in" data-category="<?php echo e($work->category); ?>">
                <div class="portfolio-item">
                    <img src="<?php echo e(asset('storage/' . $work->image)); ?>" alt="<?php echo e($work->title); ?>" loading="lazy">
                    <div class="portfolio-overlay">
                        <h4 class="portfolio-title"><?php echo e($work->title); ?></h4>
                        <span class="portfolio-category"><?php echo e(ucfirst($work->category)); ?></span>
                        <?php if($work->description): ?>
                            <p class="mt-2 text-white-50"><?php echo e(Str::limit($work->description, 100)); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section section-padding">
    <div class="container">
        <h2 class="section-title fade-in">Get In Touch</h2>
        <p class="section-subtitle fade-in">Ready to transform your brand? Let's start a conversation.</p>
        
        <div class="row">
            <div class="col-lg-8 mx-auto fade-in">
                <div class="contact-form">
                    <form id="contactForm" action="<?php echo e(route('contact.submit')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Your Name *</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Your Email *</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" name="phone" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message *</label>
                            <textarea name="message" class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-paper-plane me-2"></i>Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-md-4 text-center fade-in">
                <div class="contact-info-item justify-content-center">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="text-start">
                        <h5>Email</h5>
                        <p class="mb-0"><?php echo e($contactInfo->email ?? 'hello@agency.com'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center fade-in">
                <div class="contact-info-item justify-content-center">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="text-start">
                        <h5>Phone</h5>
                        <p class="mb-0"><?php echo e($contactInfo->phone ?? '+1 234 567 890'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center fade-in">
                <div class="contact-info-item justify-content-center">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="text-start">
                        <h5>Address</h5>
                        <p class="mb-0"><?php echo e($contactInfo->address ?? '123 Creative Street, Design City'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h4 class="footer-title">Social Media Agency</h4>
                <p>We are the first creative branding agency AI based that built to help brands grow with content that's fast, consistent, and unmistakably on-brand.</p>
                <div class="social-links mt-3">
                    <?php if($contactInfo && $contactInfo->facebook_link): ?>
                        <a href="<?php echo e($contactInfo->facebook_link); ?>" class="social-link" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                    <?php if($contactInfo && $contactInfo->instagram_link): ?>
                        <a href="<?php echo e($contactInfo->instagram_link); ?>" class="social-link" target="_blank"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                    <?php if($contactInfo && $contactInfo->twitter_link): ?>
                        <a href="<?php echo e($contactInfo->twitter_link); ?>" class="social-link" target="_blank"><i class="fab fa-twitter"></i></a>
                    <?php endif; ?>
                    <?php if($contactInfo && $contactInfo->linkedin_link): ?>
                        <a href="<?php echo e($contactInfo->linkedin_link); ?>" class="social-link" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <?php endif; ?>
                    <?php if($contactInfo && $contactInfo->tiktok_link): ?>
                        <a href="<?php echo e($contactInfo->tiktok_link); ?>" class="social-link" target="_blank"><i class="fab fa-tiktok"></i></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <h4 class="footer-title">Quick Links</h4>
                <a href="#home" class="footer-link">Home</a>
                <a href="#about" class="footer-link">About Us</a>
                <a href="#services" class="footer-link">Services</a>
                <a href="#works" class="footer-link">Our Works</a>
                <a href="#contact" class="footer-link">Contact</a>
            </div>
            <div class="col-lg-4 mb-4">
                <h4 class="footer-title">Contact Info</h4>
                <p><i class="fas fa-envelope me-2"></i><?php echo e($contactInfo->email ?? 'hello@agency.com'); ?></p>
                <p><i class="fas fa-phone me-2"></i><?php echo e($contactInfo->phone ?? '+1 234 567 890'); ?></p>
                <p><i class="fas fa-map-marker-alt me-2"></i><?php echo e($contactInfo->address ?? '123 Creative Street, Design City'); ?></p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo e(date('Y')); ?> Social Media Agency. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Portfolio filter
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

    // Contact form submission
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
                    confirmButtonColor: '#1a4d2e'
                });
                form.reset();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again.',
                    confirmButtonColor: '#1a4d2e'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong. Please try again.',
                confirmButtonColor: '#1a4d2e'
            });
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.landing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/soma/resources/views/landing/index.blade.php ENDPATH**/ ?>