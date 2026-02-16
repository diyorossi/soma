@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="page-title">Dashboard</h1>
    
    <!-- Stats Row -->
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="stat-info">
                    <h4>{{ $stats['total_services'] }}</h4>
                    <p>Total Services</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-images"></i>
                </div>
                <div class="stat-info">
                    <h4>{{ $stats['total_works'] }}</h4>
                    <p>Portfolio Works</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stat-info">
                    <h4>{{ $stats['total_messages'] }}</h4>
                    <p>Total Messages</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(220, 53, 69, 0.1); color: #dc3545;">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="stat-info">
                    <h4>{{ $stats['unread_messages'] }}</h4>
                    <p>Unread Messages</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Recent Messages -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-envelope me-2"></i>Recent Messages</span>
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-primary-custom">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentMessages as $message)
                                <tr>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subject ?? 'N/A' }}</td>
                                    <td>{{ $message->created_at->format('M d, Y') }}</td>
                                    <td>
                                        @if($message->is_read)
                                            <span class="badge bg-success">Read</span>
                                        @else
                                            <span class="badge bg-warning">Unread</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">No messages yet</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Links -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-link me-2"></i>Quick Links
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('admin.hero.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Edit Hero Section
                            <i class="fas fa-chevron-right text-muted"></i>
                        </a>
                        <a href="{{ route('admin.services.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Manage Services
                            <i class="fas fa-chevron-right text-muted"></i>
                        </a>
                        <a href="{{ route('admin.portfolio.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Manage Portfolio
                            <i class="fas fa-chevron-right text-muted"></i>
                        </a>
                        <a href="{{ route('admin.contact.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Update Contact Info
                            <i class="fas fa-chevron-right text-muted"></i>
                        </a>
                        <a href="{{ route('landing') }}" target="_blank" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            View Website
                            <i class="fas fa-external-link-alt text-muted"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection