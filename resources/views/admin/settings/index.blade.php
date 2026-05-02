@extends('layouts.admin')

@section('title', 'Site Settings')

@section('content')
<div class="container-fluid">
    <h1 class="page-title">Site Settings</h1>
    
    <div class="card">
        <div class="card-header">
            <i class="fas fa-cogs me-2"></i>General Settings
        </div>
        <div class="card-body">
            <form id="settingsForm">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="site_name" class="form-label">Site Name / Brand Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="site_name" name="site_name" value="{{ $settings->site_name ?? 'SOMA' }}" required>
                            <small class="text-muted">This name appears in the navbar, admin sidebar, and login page.</small>
                        </div>
                    </div>
                </div>
                
                <div class="text-start mt-3">
                    <button type="submit" class="btn btn-primary-custom" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Save Settings
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
    document.getElementById('settingsForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = document.getElementById('submitBtn');
        const spinner = document.getElementById('submitSpinner');
        const formData = new FormData(form);
        
        submitBtn.disabled = true;
        spinner.classList.remove('d-none');
        
        fetch('{{ route("admin.settings.update") }}', {
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
                showSuccess(data.message || 'Settings updated successfully!');
                
                // Update brand name in current sidebar immediately
                const newBrandName = document.getElementById('site_name').value;
                const sidebarBrand = document.querySelector('.sidebar-brand');
                if(sidebarBrand) {
                    sidebarBrand.innerHTML = '<i class="fas fa-s me-2"></i>' + newBrandName;
                }
            } else {
                showError(data.message || 'Failed to update settings.');
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
