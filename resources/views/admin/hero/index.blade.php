@extends('layouts.admin')

@section('title', 'Hero Section')

@section('content')
<div class="container-fluid">
    <h1 class="page-title">Hero Section</h1>
    
    <div class="card">
        <div class="card-header">
            <i class="fas fa-home me-2"></i>Edit Hero Section
        </div>
        <div class="card-body">
            <form id="heroForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $hero->title ?? '' }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <textarea class="form-control" id="subtitle" name="subtitle" rows="3">{{ $hero->subtitle ?? '' }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="cta_text" class="form-label">CTA Button Text</label>
                            <input type="text" class="form-control" id="cta_text" name="cta_text" value="{{ $hero->cta_text ?? '' }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="cta_link" class="form-label">CTA Button Link</label>
                            <input type="url" class="form-control" id="cta_link" name="cta_link" value="{{ $hero->cta_link ?? '' }}" placeholder="https://example.com">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="background_image" class="form-label">Background Image</label>
                            <input type="file" class="form-control" id="background_image" name="background_image" accept="image/*">
                            <small class="text-muted">Recommended size: 1920x1080 pixels</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Image Preview</label>
                            <div class="image-preview-container" style="border: 2px dashed #ddd; border-radius: 10px; padding: 20px; text-align: center; min-height: 200px;">
                                @if(isset($hero->background_image) && $hero->background_image)
                                    <img id="imagePreview" src="{{ asset('storage/' . $hero->background_image) }}" style="max-width: 100%; max-height: 300px; border-radius: 8px;">
                                @else
                                    <img id="imagePreview" src="" style="max-width: 100%; max-height: 300px; border-radius: 8px; display: none;">
                                    <div id="noImageText" class="text-muted py-5">
                                        <i class="fas fa-image fa-3x mb-2"></i>
                                        <p>No image uploaded</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ isset($hero->is_active) && $hero->is_active ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
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
@endsection

@section('scripts')
<script>
    // Image preview functionality
    document.getElementById('background_image').addEventListener('change', function(e) {
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
    document.getElementById('heroForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = document.getElementById('submitBtn');
        const spinner = document.getElementById('submitSpinner');
        const formData = new FormData(form);
        
        // Show loading state
        submitBtn.disabled = true;
        spinner.classList.remove('d-none');
        
        fetch('{{ route("admin.hero.update", $hero->id ?? 1) }}', {
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
                showSuccess(data.message || 'Hero section updated successfully!');
                if (data.image_url) {
                    document.getElementById('imagePreview').src = data.image_url;
                    const noImageText = document.getElementById('noImageText');
                    if (noImageText) noImageText.style.display = 'none';
                }
            } else {
                showError(data.message || 'Failed to update hero section.');
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
@endsection
