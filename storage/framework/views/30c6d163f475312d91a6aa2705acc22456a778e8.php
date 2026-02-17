<?php $__env->startSection('title', 'Services'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="page-title">Services</h1>
    
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-cogs me-2"></i>Manage Services</span>
            <button type="button" class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#serviceModal">
                <i class="fas fa-plus me-2"></i>Add New Service
            </button>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="servicesTable">
                        <?php $__empty_1 = true; $__currentLoopData = $services ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr id="service-row-<?php echo e($service->id); ?>">
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><i class="fas <?php echo e($service->icon ?? 'fa-cog'); ?> fa-lg text-success"></i></td>
                            <td><?php echo e($service->title); ?></td>
                            <td><?php echo e(Str::limit($service->description, 50)); ?></td>
                            <td>
                                <?php if($service->is_active): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($service->order); ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-primary me-1" onclick="editService(<?php echo e($service->id); ?>)" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteService(<?php echo e($service->id); ?>)" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="fas fa-cogs fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No services found. Add your first service!</p>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Service Modal -->
<div class="modal fade" id="serviceModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"><i class="fas fa-plus me-2"></i>Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="serviceForm" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="service_id" name="service_id">
                <input type="hidden" name="_method" id="formMethod" value="POST">
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="service_title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="service_title" name="title" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="service_icon" class="form-label">Icon Class</label>
                                <input type="text" class="form-control" id="service_icon" name="icon" placeholder="fa-cog">
                                <small class="text-muted">Font Awesome icon class (e.g., fa-facebook, fa-instagram)</small>
                            </div>
                            
                            <div class="mb-3">
                                <label for="order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control" id="order" name="order" value="0" min="0">
                            </div>
                            
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="service_is_active" name="is_active" value="1" checked>
                                <label class="form-check-label" for="service_is_active">Active</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="service_description" class="form-label">Description</label>
                                <textarea class="form-control" id="service_description" name="description" rows="8"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-custom" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Save Service
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
    const serviceModal = new bootstrap.Modal(document.getElementById('serviceModal'));
    
    // Form submission
    document.getElementById('serviceForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = document.getElementById('submitBtn');
        const spinner = document.getElementById('submitSpinner');
        const formData = new FormData(form);
        const serviceId = document.getElementById('service_id').value;
        
        submitBtn.disabled = true;
        spinner.classList.remove('d-none');
        
        const url = serviceId ? 
            '<?php echo e(route("admin.services.update", "")); ?>/' + serviceId :
            '<?php echo e(route("admin.services.store")); ?>';
        
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
                serviceModal.hide();
                
                // Update table or add new row
                if (serviceId) {
                    updateServiceRow(data.service);
                } else {
                    addServiceRow(data.service);
                }
            } else {
                showError(data.message || 'Failed to save service.');
            }
        })
        .catch(error => {
            submitBtn.disabled = false;
            spinner.classList.add('d-none');
            showError('An error occurred. Please try again.');
            console.error('Error:', error);
        });
    });
    
    // Edit service
    function editService(id) {
        fetch('<?php echo e(route("admin.services.show", "")); ?>/' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('service_id').value = data.service.id;
                    document.getElementById('service_title').value = data.service.title;
                    document.getElementById('service_description').value = data.service.description;
                    document.getElementById('service_icon').value = data.service.icon;
                    document.getElementById('order').value = data.service.order;
                    document.getElementById('service_is_active').checked = data.service.is_active;
                    document.getElementById('formMethod').value = 'PUT';
                    document.getElementById('modalTitle').innerHTML = '<i class="fas fa-edit me-2"></i>Edit Service';
                    
                    serviceModal.show();
                }
            })
            .catch(error => {
                showError('Failed to load service data.');
            });
    }
    
    // Delete service
    function deleteService(id) {
        confirmDelete(function() {
            fetch('<?php echo e(route("admin.services.destroy", "")); ?>/' + id, {
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
                    document.getElementById('service-row-' + id).remove();
                    
                    // Check if table is empty
                    const tbody = document.getElementById('servicesTable');
                    if (tbody.children.length === 0) {
                        tbody.innerHTML = `
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <i class="fas fa-cogs fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">No services found. Add your first service!</p>
                                </td>
                            </tr>
                        `;
                    }
                } else {
                    showError(data.message || 'Failed to delete service.');
                }
            })
            .catch(error => {
                showError('An error occurred. Please try again.');
            });
        });
    }
    
    // Update table row
    function updateServiceRow(service) {
        const row = document.getElementById('service-row-' + service.id);
        if (row) {
            const statusBadge = service.is_active ? 
                '<span class="badge bg-success">Active</span>' : 
                '<span class="badge bg-secondary">Inactive</span>';
            
            row.innerHTML = `
                <td>${row.cells[0].textContent}</td>
                <td><i class="fas ${service.icon || 'fa-cog'} fa-lg text-success"></i></td>
                <td>${service.title}</td>
                <td>${service.description ? service.description.substring(0, 50) + (service.description.length > 50 ? '...' : '') : ''}</td>
                <td>${statusBadge}</td>
                <td>${service.order}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-outline-primary me-1" onclick="editService(${service.id})" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteService(${service.id})" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            `;
        }
    }
    
    // Add new table row
    function addServiceRow(service) {
        const tbody = document.getElementById('servicesTable');
        const rowCount = tbody.querySelectorAll('tr').length + 1;
        
        // Remove empty message if exists
        if (tbody.querySelector('td[colspan]')) {
            tbody.innerHTML = '';
        }
        
        const statusBadge = service.is_active ? 
            '<span class="badge bg-success">Active</span>' : 
            '<span class="badge bg-secondary">Inactive</span>';
        
        const newRow = document.createElement('tr');
        newRow.id = 'service-row-' + service.id;
        newRow.innerHTML = `
            <td>${rowCount}</td>
            <td><i class="fas ${service.icon || 'fa-cog'} fa-lg text-success"></i></td>
            <td>${service.title}</td>
            <td>${service.description ? service.description.substring(0, 50) + (service.description.length > 50 ? '...' : '') : ''}</td>
            <td>${statusBadge}</td>
            <td>${service.order}</td>
            <td>
                <button type="button" class="btn btn-sm btn-outline-primary me-1" onclick="editService(${service.id})" title="Edit">
                    <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteService(${service.id})" title="Delete">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        
        tbody.appendChild(newRow);
    }
    
    // Reset form when modal is closed
    document.getElementById('serviceModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('serviceForm').reset();
        document.getElementById('service_id').value = '';
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('modalTitle').innerHTML = '<i class="fas fa-plus me-2"></i>Add New Service';
        document.getElementById('service_is_active').checked = true;
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/soma/resources/views/admin/services/index.blade.php ENDPATH**/ ?>