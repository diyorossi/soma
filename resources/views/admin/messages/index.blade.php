@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('content')
<div class="container-fluid">
    <h1 class="page-title">Contact Messages</h1>
    
    <!-- Stats -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="stat-icon me-3" style="width: 50px; height: 50px; font-size: 1.25rem;">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">{{ $stats['total'] ?? 0 }}</h5>
                        <small class="text-muted">Total Messages</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="stat-icon me-3" style="width: 50px; height: 50px; font-size: 1.25rem; background: rgba(255, 193, 7, 0.1); color: #ffc107;">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">{{ $stats['unread'] ?? 0 }}</h5>
                        <small class="text-muted">Unread</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="stat-icon me-3" style="width: 50px; height: 50px; font-size: 1.25rem; background: rgba(40, 167, 69, 0.1); color: #28a745;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">{{ $stats['read'] ?? 0 }}</h5>
                        <small class="text-muted">Read</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Messages Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-list me-2"></i>All Messages</span>
            <div>
                <!-- Buttons removed - functionality not implemented yet -->
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th width="120">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="messagesTable">
                        @forelse($messages ?? [] as $message)
                        <tr id="message-row-{{ $message->id }}" class="{{ !$message->is_read ? 'table-warning' : '' }}">
                            <td>
                                @if($message->is_read)
                                    <span class="badge bg-success">Read</span>
                                @else
                                    <span class="badge bg-warning">Unread</span>
                                @endif
                            </td>
                            <td>{{ $message->name }}</td>
                            <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
                            <td>{{ $message->subject ?? 'No Subject' }}</td>
                            <td>{{ $message->created_at->format('M d, Y H:i') }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-primary me-1" onclick="viewMessage({{ $message->id }})" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteMessage({{ $message->id }})" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No messages yet</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Pagination -->
    @if(isset($messages) && $messages->hasPages())
    <div class="mt-3">
        {{ $messages->links() }}
    </div>
    @endif
</div>

<!-- View Message Modal -->
<div class="modal fade" id="viewMessageModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-envelope me-2"></i>Message Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="messageContent">
                <!-- Content loaded dynamically -->
            </div>
            <div class="modal-footer">
                <a href="#" id="replyLink" class="btn btn-primary-custom">
                    <i class="fas fa-reply me-2"></i>Reply
                </a>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const viewMessageModal = new bootstrap.Modal(document.getElementById('viewMessageModal'));
    
    // View message
    function viewMessage(id) {
        fetch('{{ route("admin.messages.show", "") }}/' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const message = data.message;
                    const content = document.getElementById('messageContent');
                    
                    content.innerHTML = `
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h6 class="mb-1"><strong>From:</strong> ${message.name} &lt;${message.email}&gt;</h6>
                                    <small class="text-muted">${message.created_at}</small>
                                </div>
                                ${!message.is_read ? '<span class="badge bg-warning">Unread</span>' : '<span class="badge bg-success">Read</span>'}
                            </div>
                            <hr>
                            <div class="mb-3">
                                <strong>Subject:</strong>
                                <p class="mb-0">${message.subject || 'No Subject'}</p>
                            </div>
                            <div class="bg-light p-3 rounded">
                                <strong>Message:</strong>
                                <p class="mb-0 mt-2" style="white-space: pre-wrap;">${message.message}</p>
                            </div>
                        </div>
                    `;
                    
                    document.getElementById('replyLink').href = `mailto:${message.email}?subject=Re: ${message.subject || ''}`;
                    
                    viewMessageModal.show();
                    
                    // Mark as read if unread
                    if (!message.is_read) {
                        markAsRead(id);
                    }
                }
            })
            .catch(error => {
                showError('Failed to load message.');
            });
    }
    
    // Mark as read
    function markAsRead(id) {
        fetch('{{ route("admin.messages.read", "") }}/' + id, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const row = document.getElementById('message-row-' + id);
                if (row) {
                    row.classList.remove('table-warning');
                    const statusCell = row.querySelector('td:nth-child(2)');
                    statusCell.innerHTML = '<span class="badge bg-success">Read</span>';
                }
            }
        });
    }
    
    // Delete message
    function deleteMessage(id) {
        confirmDelete(function() {
            fetch('{{ route("admin.messages.destroy", "") }}/' + id, {
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
                    document.getElementById('message-row-' + id).remove();
                    
                    // Check if table is empty
                    const tbody = document.getElementById('messagesTable');
                    if (tbody.children.length === 0) {
                        tbody.innerHTML = `
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">No messages yet</p>
                                </td>
                            </tr>
                        `;
                    }
                } else {
                    showError(data.message || 'Failed to delete message.');
                }
            })
            .catch(error => {
                showError('An error occurred. Please try again.');
            });
        });
    }
    
</script>
@endsection
