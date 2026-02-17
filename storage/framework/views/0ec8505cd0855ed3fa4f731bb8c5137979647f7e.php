<?php $__env->startSection('title', 'About Section'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="page-title">About Section</h1>
    
    <div class="card">
        <div class="card-header">
            <i class="fas fa-info-circle me-2"></i>Edit About Section
        </div>
        <div class="card-body">
            <form id="aboutForm" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Section Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo e($about->title ?? ''); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="content" name="content" rows="10"><?php echo e($about->content ?? ''); ?></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="image" class="form-label">About Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <small class="text-muted">Recommended size: 800x600 pixels</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Image Preview</label>
                            <div class="image-preview-container" style="border: 2px dashed #ddd; border-radius: 10px; padding: 20px; text-align: center; min-height: 200px;">
                                <?php if(isset($about->image) && $about->image): ?>
                                    <img id="imagePreview" src="<?php echo e(asset('storage/' . $about->image)); ?>" style="max-width: 100%; max-height: 300px; border-radius: 8px;">
                                <?php else: ?>
                                    <img id="imagePreview" src="" style="max-width: 100%; max-height: 300px; border-radius: 8px; display: none;">
                                    <div id="noImageText" class="text-muted py-5">
                                        <i class="fas fa-image fa-3x mb-2"></i>
                                        <p>No image uploaded</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" <?php echo e(isset($about->is_active) && $about->is_active ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="is_active">Show on Website</label>
                        </div>
                    </div>
                </div>
                
                <div class="text-end">
                    <button type="submit" class="btn btn-primary-custom" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Save Changes
                        <span class="spinner-border spinner-border-sm ms-2 d-none" id="submitSpinner"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- CKEditor for rich text editing -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
    let editor;
    
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#content'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
        })
        .then(newEditor => {
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });

    // Image preview functionality
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');
        const noImageText = document.getElementById('noImageText');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                if (noImageText) noImageText.style.display = 'none';
            }
            reader.readAsDataURL(file);
        }
    });

    // Form submission with AJAX
    document.getElementById('aboutForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = document.getElementById('submitBtn');
        const spinner = document.getElementById('submitSpinner');
        const formData = new FormData(form);
        
        // Update textarea with CKEditor content
        formData.set('content', editor.getData());
        
        // Show loading state
        submitBtn.disabled = true;
        spinner.classList.remove('d-none');
        
        fetch('<?php echo e(route("admin.about.update", $about->id ?? 1)); ?>', {
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
                showSuccess(data.message || 'About section updated successfully!');
                if (data.image_url) {
                    document.getElementById('imagePreview').src = data.image_url;
                    const noImageText = document.getElementById('noImageText');
                    if (noImageText) noImageText.style.display = 'none';
                }
            } else {
                showError(data.message || 'Failed to update about section.');
            }
        })
        .catch(error => {
            submitBtn.disabled = false;
            spinner.classList.add('d-none');
            showError('An error occurred. Please try again.');
            console.error('Error:', error);
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/soma/resources/views/admin/about/index.blade.php ENDPATH**/ ?>