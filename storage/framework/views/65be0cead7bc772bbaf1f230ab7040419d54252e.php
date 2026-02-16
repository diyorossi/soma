<?php $__env->startSection('title', 'Contact Information'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="page-title">Contact Information</h1>
    
    <div class="card">
        <div class="card-header">
            <i class="fas fa-address-card me-2"></i>Contact Information
        </div>
        <div class="card-body">
            <form id="contactForm">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope text-success me-2"></i>Email Address
                            </label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo e($contact->email ?? ''); ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">
                                <i class="fas fa-phone text-success me-2"></i>Phone Number
                            </label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo e($contact->phone ?? ''); ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="address" class="form-label">
                                <i class="fas fa-map-marker-alt text-success me-2"></i>Address
                            </label>
                            <textarea class="form-control" id="address" name="address" rows="2"><?php echo e($contact->address ?? ''); ?></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="facebook_link" class="form-label">
                                <i class="fab fa-facebook text-success me-2"></i>Facebook
                            </label>
                            <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="<?php echo e($contact->facebook_link ?? ''); ?>" placeholder="https://facebook.com/yourpage">
                        </div>
                        
                        <div class="mb-3">
                            <label for="instagram_link" class="form-label">
                                <i class="fab fa-instagram text-success me-2"></i>Instagram
                            </label>
                            <input type="url" class="form-control" id="instagram_link" name="instagram_link" value="<?php echo e($contact->instagram_link ?? ''); ?>" placeholder="https://instagram.com/yourpage">
                        </div>
                        
                        <div class="mb-3">
                            <label for="twitter_link" class="form-label">
                                <i class="fab fa-twitter text-success me-2"></i>Twitter
                            </label>
                            <input type="url" class="form-control" id="twitter_link" name="twitter_link" value="<?php echo e($contact->twitter_link ?? ''); ?>" placeholder="https://twitter.com/yourpage">
                        </div>
                        
                        <div class="mb-3">
                            <label for="linkedin_link" class="form-label">
                                <i class="fab fa-linkedin text-success me-2"></i>LinkedIn
                            </label>
                            <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" value="<?php echo e($contact->linkedin_link ?? ''); ?>" placeholder="https://linkedin.com/in/yourprofile">
                        </div>
                    </div>
                </div>
                
                <div class="text-end">
                    <button type="submit" class="btn btn-primary-custom" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Save Contact Info
                        <span class="spinner-border spinner-border-sm ms-2 d-none" id="submitSpinner"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Social Media Section -->
    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-share-alt me-2"></i>Social Media Links</span>
            <button type="button" class="btn btn-sm btn-primary-custom" data-bs-toggle="modal" data-bs-target="#socialModal">
                <i class="fas fa-plus me-1"></i>Add Social Link
            </button>
        </div>
        <div class="card-body">
            <div id="socialList">
                <?php if($socialLinks->count() > 0): ?>
                    <?php $__currentLoopData = $socialLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex justify-content-between align-items-center mb-3 p-2 border rounded" id="social-<?php echo e($social->id); ?>">
                        <div class="d-flex align-items-center">
                            <i class="fab <?php echo e($social->icon ?? 'fa-link'); ?> fa-lg me-3" style="color: <?php echo e($social->color ?? '#1a4d2e'); ?>;"></i>
                            <div>
                                <strong class="d-block"><?php echo e($social->platform); ?></strong>
                                <small class="text-muted"><?php echo e(Str::limit($social->url, 30)); ?></small>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-primary me-1" onclick="editSocial(<?php echo e($social->id); ?>)" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteSocial(<?php echo e($social->id); ?>)" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="text-center py-4 text-muted" id="noSocialMessage">
                        <i class="fas fa-share-alt fa-2x mb-2"></i>
                        <p>No social media links added</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Map Section -->
    <div class="card mt-4">
        <div class="card-header">
            <i class="fas fa-map me-2"></i>Google Maps Embed
        </div>
        <div class="card-body">
            <form id="mapForm">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                
                <div class="mb-3">
                    <label for="map_embed" class="form-label">Google Maps Embed Code</label>
                    <textarea class="form-control" id="map_embed" name="map_embed" rows="4" placeholder='<iframe src="https://www.google.com/maps/embed?..." ...></iframe>'><?php echo e($contact->map_embed ?? ''); ?></textarea>
                    <small class="text-muted">Paste the embed code from Google Maps</small>
                </div>
                
                <div class="text-end">
                    <button type="submit" class="btn btn-primary-custom" id="mapSubmitBtn">
                        <i class="fas fa-save me-2"></i>Save Map
                        <span class="spinner-border spinner-border-sm ms-2 d-none" id="mapSpinner"></span>
                    </button>
                </div>
            </form>
            
            <?php if(isset($contact->map_embed) && $contact->map_embed): ?>
            <div class="mt-4">
                <label class="form-label">Map Preview</label>
                <div class="border rounded overflow-hidden" style="height: 300px;">
                    <?php echo $contact->map_embed; ?>

                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Add/Edit Social Media Modal -->
<div class="modal fade" id="socialModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="socialModalTitle"><i class="fas fa-plus me-2"></i>Add Social Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="socialForm">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="social_id" name="social_id">
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="platform" class="form-label">Platform Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="platform" name="platform" placeholder="Facebook, Twitter, Instagram..." required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="social_url" class="form-label">URL <span class="text-danger">*</span></label>
                        <input type="url" class="form-control" id="social_url" name="url" placeholder="https://..." required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon Class</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="fa-facebook, fa-twitter, fa-instagram">
                        <small class="text-muted">Font Awesome brand icon class</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="color" class="form-label">Icon Color</label>
                        <input type="color" class="form-control" id="color" name="color" value="#1a4d2e">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-custom">
                        <i class="fas fa-save me-2"></i>Save
                        <span class="spinner-border spinner-border-sm ms-2 d-none" id="socialSpinner"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    const socialModal = new bootstrap.Modal(document.getElementById('socialModal'));
    
    // Contact form submission
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = document.getElementById('submitBtn');
        const spinner = document.getElementById('submitSpinner');
        const formData = new FormData(this);
        
        submitBtn.disabled = true;
        spinner.classList.remove('d-none');
        
        fetch('<?php echo e(route("admin.contact.update", $contact->id ?? 1)); ?>', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            submitBtn.disabled = false;
            spinner.classList.add('d-none');
            
            if (data.success) {
                showSuccess(data.message || 'Contact information updated successfully!');
            } else {
                showError(data.message || 'Failed to update contact information.');
            }
        })
        .catch(error => {
            submitBtn.disabled = false;
            spinner.classList.add('d-none');
            showError('An error occurred. Please try again.');
        });
    });
    
    // Map form submission
    document.getElementById('mapForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = document.getElementById('mapSubmitBtn');
        const spinner = document.getElementById('mapSpinner');
        const formData = new FormData(this);
        
        submitBtn.disabled = true;
        spinner.classList.remove('d-none');
        
        fetch('<?php echo e(route("admin.contact.update", $contact->id ?? 1)); ?>', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            submitBtn.disabled = false;
            spinner.classList.add('d-none');
            
            if (data.success) {
                showSuccess(data.message || 'Map updated successfully!');
            } else {
                showError(data.message || 'Failed to update map.');
            }
        })
        .catch(error => {
            submitBtn.disabled = false;
            spinner.classList.add('d-none');
            showError('An error occurred. Please try again.');
        });
    });
    
    // Social media form submission
    document.getElementById('socialForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const socialId = document.getElementById('social_id').value;
        const formData = new FormData(form);
        
        const url = socialId ? 
            '<?php echo e(route("admin.contact.social.update", "")); ?>/' + socialId :
            '<?php echo e(route("admin.contact.social.store")); ?>';
        
        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showSuccess(data.message);
                socialModal.hide();
                
                if (socialId) {
                    updateSocialItem(data.social);
                } else {
                    addSocialItem(data.social);
                }
            } else {
                showError(data.message || 'Failed to save social link.');
            }
        })
        .catch(error => {
            showError('An error occurred. Please try again.');
        });
    });
    
    // Edit social
    function editSocial(id) {
        fetch('<?php echo e(route("admin.contact.social.show", "")); ?>/' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('social_id').value = data.social.id;
                    document.getElementById('platform').value = data.social.platform;
                    document.getElementById('social_url').value = data.social.url;
                    document.getElementById('icon').value = data.social.icon;
                    document.getElementById('color').value = data.social.color || '#1a4d2e';
                    document.getElementById('socialModalTitle').innerHTML = '<i class="fas fa-edit me-2"></i>Edit Social Link';
                    
                    socialModal.show();
                }
            });
    }
    
    // Delete social
    function deleteSocial(id) {
        confirmDelete(function() {
            fetch('<?php echo e(route("admin.contact.social.destroy", "")); ?>/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccess(data.message);
                    document.getElementById('social-' + id).remove();
                    
                    // Show empty message if no items left
                    const list = document.getElementById('socialList');
                    if (list.children.length === 0) {
                        list.innerHTML = `
                            <div class="text-center py-4 text-muted" id="noSocialMessage">
                                <i class="fas fa-share-alt fa-2x mb-2"></i>
                                <p>No social media links added</p>
                            </div>
                        `;
                    }
                } else {
                    showError(data.message || 'Failed to delete social link.');
                }
            });
        });
    }
    
    // Add social item
    function addSocialItem(social) {
        const list = document.getElementById('socialList');
        const noMessage = document.getElementById('noSocialMessage');
        if (noMessage) noMessage.remove();
        
        const item = document.createElement('div');
        item.className = 'd-flex justify-content-between align-items-center mb-3 p-2 border rounded';
        item.id = 'social-' + social.id;
        item.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="fab ${social.icon || 'fa-link'} fa-lg me-3" style="color: ${social.color || '#1a4d2e'};"></i>
                <div>
                    <strong class="d-block">${social.platform}</strong>
                    <small class="text-muted">${social.url.length > 30 ? social.url.substring(0, 30) + '...' : social.url}</small>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-sm btn-outline-primary me-1" onclick="editSocial(${social.id})" title="Edit">
                    <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteSocial(${social.id})" title="Delete">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        
        list.appendChild(item);
    }
    
    // Update social item
    function updateSocialItem(social) {
        const item = document.getElementById('social-' + social.id);
        if (item) {
            item.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fab ${social.icon || 'fa-link'} fa-lg me-3" style="color: ${social.color || '#1a4d2e'};"></i>
                    <div>
                        <strong class="d-block">${social.platform}</strong>
                        <small class="text-muted">${social.url.length > 30 ? social.url.substring(0, 30) + '...' : social.url}</small>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-sm btn-outline-primary me-1" onclick="editSocial(${social.id})" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteSocial(${social.id})" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
        }
    }
    
    // Reset social form
    document.getElementById('socialModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('socialForm').reset();
        document.getElementById('social_id').value = '';
        document.getElementById('socialModalTitle').innerHTML = '<i class="fas fa-plus me-2"></i>Add Social Link';
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/soma/resources/views/admin/contact/index.blade.php ENDPATH**/ ?>