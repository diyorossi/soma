@extends('layouts.admin')

@section('title', 'Portfolio')

@section('content')
<div class="container-fluid">
    <h1 class="page-title">Portfolio</h1>
    
    <!-- Filter and Add Button -->
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-custom active" onclick="filterPortfolio('all')">All</button>
                @foreach($categories ?? [] as $category)
                <button type="button" class="btn btn-outline-custom" onclick="filterPortfolio('{{ Str::slug($category) }}')">{{ $category }}</button>
                @endforeach
            </div>
        </div>
        <div class="col-md-6 text-end">
            <button type="button" class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#portfolioModal">
                <i class="fas fa-plus me-2"></i>Add New Work
            </button>
        </div>
    </div>
    
    <!-- Portfolio Grid -->
    <div class="row" id="portfolioGrid">
        @forelse($works ?? [] as $item)
        <div class="col-md-6 col-lg-4 col-xl-3 mb-4 portfolio-item" data-category="{{ Str::slug($item->category) }}">
            <div class="card h-100">
                <div class="position-relative">
                    @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @else
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-image fa-3x text-muted"></i>
                    </div>
                    @endif
                    <div class="position-absolute top-0 end-0 p-2">
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="editPortfolio({{ $item->id }})"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                <li><a class="dropdown-item text-danger" href="#" onclick="deletePortfolio({{ $item->id }})"><i class="fas fa-trash me-2"></i>Delete</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <span class="badge bg-success mb-2">{{ $item->category ?? 'Uncategorized' }}</span>
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($item->description, 80) }}</p>
                    @if($item->client_name)
                    <small class="text-muted"><i class="fas fa-user me-1"></i>{{ $item->client_name }}</small>
                    @endif
                </div>
                <div class="card-footer bg-transparent">
                    @if($item->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="fas fa-images fa-4x text-muted mb-3"></i>
            <h4 class="text-muted">No portfolio items yet</h4>
            <p class="text-muted">Add your first portfolio work to showcase!</p>
        </div>
        @endforelse
    </div>
</div>

<!-- Add/Edit Portfolio Modal -->
<div class="modal fade" id="portfolioModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"><i class="fas fa-plus me-2"></i>Add New Work</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="portfolioForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="portfolio_id" name="portfolio_id">
                <input type="hidden" name="_method" id="formMethod" value="POST">
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="portfolio_title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="portfolio_title" name="title" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="">Select Category</option>
                                    <option value="Web Development">Web Development</option>
                                    <option value="Mobile App">Mobile App</option>
                                    <option value="UI/UX Design">UI/UX Design</option>
                                    <option value="Branding">Branding</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Other">Other</option>
                                    @foreach($categories ?? [] as $category)
                                        @if(!in_array($category, ['Web Development', 'Mobile App', 'UI/UX Design', 'Branding', 'Digital Marketing', 'Other']))
                                        <option value="{{ $category }}">{{ $category }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="client_name" class="form-label">Client Name</label>
                                <input type="text" class="form-control" id="client_name" name="client_name">
                            </div>
                            
                            <div class="mb-3">
                                <label for="project_link" class="form-label">Project URL</label>
                                <input type="url" class="form-control" id="project_link" name="project_link" placeholder="https://example.com">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="portfolio_image" class="form-label">Project Image</label>
                                <input type="file" class="form-control" id="portfolio_image" name="image" accept="image/*">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Image Preview</label>
                                <div class="border rounded p-2 text-center" style="min-height: 150px; background: #f8f9fa;">
                                    <img id="imagePreview" src="" style="max-width: 100%; max-height: 200px; display: none;">
                                    <div id="noImagePlaceholder" class="text-muted py-4">
                                        <i class="fas fa-image fa-2x mb-2"></i>
                                        <p class="mb-0">No image selected</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="portfolio_is_active" name="is_active" value="1" checked>
                                <label class="form-check-label" for="portfolio_is_active">Show on Website</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="portfolio_description" class="form-label">Description</label>
                        <textarea class="form-control" id="portfolio_description" name="description" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-custom" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Save Work
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
    const portfolioModal = new bootstrap.Modal(document.getElementById('portfolioModal'));
    
    // Image preview
    document.getElementById('portfolio_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');
        const placeholder = document.getElementById('noImagePlaceholder');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                if (placeholder) placeholder.style.display = 'none';
            }
            reader.readAsDataURL(file);
        }
    });
    
    // Form submission
    document.getElementById('portfolioForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = document.getElementById('submitBtn');
        const spinner = document.getElementById('submitSpinner');
        const formData = new FormData(form);
        const portfolioId = document.getElementById('portfolio_id').value;
        
        submitBtn.disabled = true;
        spinner.classList.remove('d-none');
        
        const url = portfolioId ? 
            '{{ route("admin.portfolio.update", "") }}/' + portfolioId :
            '{{ route("admin.portfolio.store") }}';
        
        fetch(url, {
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
                showSuccess(data.message);
                portfolioModal.hide();
                
                // Reload page to show updated data
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showError(data.message || 'Failed to save portfolio item.');
            }
        })
        .catch(error => {
            submitBtn.disabled = false;
            spinner.classList.add('d-none');
            showError('An error occurred. Please try again.');
        });
    });
    
    // Edit portfolio
    function editPortfolio(id) {
        fetch('{{ route("admin.portfolio.show", "") }}/' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const item = data.work;
                    document.getElementById('portfolio_id').value = item.id;
                    document.getElementById('portfolio_title').value = item.title;
                    document.getElementById('portfolio_description').value = item.description || '';
                    document.getElementById('category').value = item.category;
                    document.getElementById('client_name').value = item.client_name || '';
                    document.getElementById('project_link').value = item.project_link || '';
                    document.getElementById('portfolio_is_active').checked = item.is_active;
                    document.getElementById('formMethod').value = 'PUT';
                    document.getElementById('modalTitle').innerHTML = '<i class="fas fa-edit me-2"></i>Edit Work';
                    
                    // Show existing image if available
                    if (item.image) {
                        document.getElementById('imagePreview').src = '{{ asset("storage") }}/' + item.image;
                        document.getElementById('imagePreview').style.display = 'block';
                        document.getElementById('noImagePlaceholder').style.display = 'none';
                    }
                    
                    portfolioModal.show();
                }
            })
            .catch(error => {
                showError('Failed to load portfolio data.');
            });
    }
    
    // Delete portfolio
    function deletePortfolio(id) {
        confirmDelete(function() {
            fetch('{{ route("admin.portfolio.destroy", "") }}/' + id, {
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
                    const card = document.querySelector(`[onclick="editPortfolio(${id})"]`).closest('.portfolio-item');
                    card.remove();
                } else {
                    showError(data.message || 'Failed to delete portfolio item.');
                }
            })
            .catch(error => {
                showError('An error occurred. Please try again.');
            });
        });
    }
    
    // Filter portfolio
    function filterPortfolio(category) {
        const items = document.querySelectorAll('.portfolio-item');
        const buttons = document.querySelectorAll('.btn-group .btn');
        
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
        
        items.forEach(item => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
    
    // Add portfolio card
    function addPortfolioCard(item) {
        const grid = document.getElementById('portfolioGrid');
        
        // Remove empty message if exists
        if (grid.querySelector('.col-12')) {
            grid.innerHTML = '';
        }
        
        const imageUrl = item.image ? '{{ asset("storage") }}/' + item.image : '';
        const statusBadge = item.is_active ? 
            '<span class="badge bg-success">Active</span>' : 
            '<span class="badge bg-secondary">Inactive</span>';
        
        const card = document.createElement('div');
        card.className = 'col-md-6 col-lg-4 col-xl-3 mb-4 portfolio-item';
        card.dataset.category = item.category_slug || 'all';
        card.innerHTML = `
            <div class="card h-100">
                <div class="position-relative">
                    ${imageUrl ? `<img src="${imageUrl}" class="card-img-top" style="height: 200px; object-fit: cover;">` : 
                    `<div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-image fa-3x text-muted"></i>
                    </div>`}
                    <div class="position-absolute top-0 end-0 p-2">
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="editPortfolio(${item.id})"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                <li><a class="dropdown-item text-danger" href="#" onclick="deletePortfolio(${item.id})"><i class="fas fa-trash me-2"></i>Delete</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <span class="badge bg-success mb-2">${item.category_name || 'Uncategorized'}</span>
                    <h5 class="card-title">${item.title}</h5>
                    <p class="card-text text-muted">${item.description ? item.description.substring(0, 80) + '...' : ''}</p>
                    ${item.client_name ? `<small class="text-muted"><i class="fas fa-user me-1"></i>${item.client_name}</small>` : ''}
                </div>
                <div class="card-footer bg-transparent">${statusBadge}</div>
            </div>
        `;
        
        grid.appendChild(card);
    }
    
    // Update portfolio card
    function updatePortfolioCard(item) {
        const card = document.querySelector(`[onclick="editPortfolio(${item.id})"]`).closest('.portfolio-item');
        if (card) {
            const imageUrl = item.image ? '{{ asset("storage") }}/' + item.image : '';
            const statusBadge = item.is_active ? 
                '<span class="badge bg-success">Active</span>' : 
                '<span class="badge bg-secondary">Inactive</span>';
            
            card.dataset.category = item.category_slug || 'all';
            card.innerHTML = `
                <div class="card h-100">
                    <div class="position-relative">
                        ${imageUrl ? `<img src="${imageUrl}" class="card-img-top" style="height: 200px; object-fit: cover;">` : 
                        `<div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>`}
                        <div class="position-absolute top-0 end-0 p-2">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#" onclick="editPortfolio(${item.id})"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                    <li><a class="dropdown-item text-danger" href="#" onclick="deletePortfolio(${item.id})"><i class="fas fa-trash me-2"></i>Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-success mb-2">${item.category_name || 'Uncategorized'}</span>
                        <h5 class="card-title">${item.title}</h5>
                        <p class="card-text text-muted">${item.description ? item.description.substring(0, 80) + '...' : ''}</p>
                        ${item.client_name ? `<small class="text-muted"><i class="fas fa-user me-1"></i>${item.client_name}</small>` : ''}
                    </div>
                    <div class="card-footer bg-transparent">${statusBadge}</div>
                </div>
            `;
        }
    }
    
    // Reset form when modal is closed
    document.getElementById('portfolioModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('portfolioForm').reset();
        document.getElementById('portfolio_id').value = '';
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('modalTitle').innerHTML = '<i class="fas fa-plus me-2"></i>Add New Work';
        document.getElementById('imagePreview').style.display = 'none';
        document.getElementById('noImagePlaceholder').style.display = 'block';
    });
</script>
@endsection
