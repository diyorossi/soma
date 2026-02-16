<?php $__env->startSection('title', 'What We Do'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="page-title">What We Do Section</h1>
    
    <div class="card">
        <div class="card-header">
            <i class="fas fa-briefcase me-2"></i>Edit What We Do Section
        </div>
        <div class="card-body">
            <form id="whatWeDoForm">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                
                <div class="mb-3">
                    <label for="title" class="form-label">Section Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo e($whatWeDo->title ?? ''); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="content" name="content" rows="5"><?php echo e($whatWeDo->content ?? ''); ?></textarea>
                    <small class="text-muted">This text appears below the title in the What We Do section.</small>
                </div>
                
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" <?php echo e(isset($whatWeDo->is_active) && $whatWeDo->is_active ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="is_active">Show on Website</label>
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
<script>
    // Main form submission
    document.getElementById('whatWeDoForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = document.getElementById('submitBtn');
        const spinner = document.getElementById('submitSpinner');
        const formData = new FormData(form);
        
        submitBtn.disabled = true;
        spinner.classList.remove('d-none');
        
        fetch('<?php echo e(route("admin.whatwedo.update", $whatWeDo->id ?? 1)); ?>', {
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
                showSuccess(data.message || 'Section updated successfully!');
            } else {
                showError(data.message || 'Failed to update section.');
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/soma/resources/views/admin/whatwedo/index.blade.php ENDPATH**/ ?>