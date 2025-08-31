@extends('layouts.app')

@section('title', 'User Management')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Users</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">User Management</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 fw-semibold text-dark">User Management</h2>
        <a href="{{ route('users.users.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Add New User
        </a>
    </div>

    <!-- Filters and Search -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('users.users.index') }}" method="GET">
                <div class="row g-3">
                    <!-- Search -->
                    <div class="col-12 col-md-3">
                        <label for="search" class="form-label">Search</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" 
                               class="form-control" placeholder="Search by name, email or phone">
                    </div>

                    <!-- Role Filter -->
                    <div class="col-12 col-md-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select">
                            <option value="all">All Roles</option>
                            @foreach(App\Models\User::roles() as $key => $role)
                                <option value="{{ $key }}" {{ request('role') == $key ? 'selected' : '' }}>{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status Filter -->
                    <div class="col-12 col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="all">All Statuses</option>
                            @foreach(App\Models\User::statuses() as $key => $status)
                                <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sort -->
                    <div class="col-12 col-md-3">
                        <label for="sort_field" class="form-label">Sort By</label>
                        <div class="d-flex gap-2">
                            <select name="sort_field" id="sort_field" class="form-select flex-grow-1">
                                <option value="name" {{ request('sort_field') == 'name' ? 'selected' : '' }}>Name</option>
                                <option value="email" {{ request('sort_field') == 'email' ? 'selected' : '' }}>Email</option>
                                <option value="role" {{ request('sort_field') == 'role' ? 'selected' : '' }}>Role</option>
                                <option value="status" {{ request('sort_field') == 'status' ? 'selected' : '' }}>Status</option>
                                <option value="created_at" {{ request('sort_field') == 'created_at' || !request('sort_field') ? 'selected' : '' }}>Created At</option>
                            </select>
                            <select name="sort_direction" id="sort_direction" class="form-select" style="width: 90px;">
                                <option value="asc" {{ request('sort_direction') == 'asc' ? 'selected' : '' }}>ASC</option>
                                <option value="desc" {{ request('sort_direction') == 'desc' || !request('sort_direction') ? 'selected' : '' }}>DESC</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-filter me-2"></i> Apply Filters
                    </button>
                    <a href="{{ route('users.users.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-sync-alt me-2"></i> Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Users Table -->
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="border-0">Name</th>
                        <th scope="col" class="border-0">Email</th>
                        <th scope="col" class="border-0">Role</th>
                        <th scope="col" class="border-0">Status</th>
                        <th scope="col" class="border-0">Created</th>
                        <th scope="col" class="border-0 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img class="rounded-circle" src="{{ $user->photo ?? asset('images/default-avatar.png') }}" 
                                             alt="{{ $user->name }}" style="width: 40px; height: 40px; object-fit: cover;">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="fw-medium text-dark">{{ $user->name }}</div>
                                        <div class="small text-muted">{{ $user->phone }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-dark">{{ $user->email }}</td>
                            <td>
                                <span class="badge 
                                    @if($user->role === 'admin') bg-purple bg-opacity-10 text-purple
                                    @elseif(in_array($user->role, ['director', 'assistantdirector'])) bg-primary bg-opacity-10 text-primary
                                    @elseif(in_array($user->role, ['manager', 'secretary'])) bg-success bg-opacity-10 text-success
                                    @elseif($user->role === 'staff') bg-warning bg-opacity-10 text-warning
                                    @else bg-secondary bg-opacity-10 text-secondary @endif">
                                    {{ $user->role_name }}
                                </span>
                            </td>
                            <td>
                                <span class="badge 
                                    @if($user->status === 'active') bg-success bg-opacity-10 text-success
                                    @elseif($user->status === 'suspended') bg-danger bg-opacity-10 text-danger
                                    @else bg-secondary bg-opacity-10 text-secondary @endif">
                                    {{ $user->status_name }}
                                </span>
                            </td>
                            <td class="text-muted">{{ $user->created_at->format('M d, Y') }}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('users.users.show', $user) }}" class="btn btn-sm btn-outline-primary" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('users.users.edit', $user) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('users.users.destroy', $user) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this user?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                No users found matching your criteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        @if($users->hasPages())
            <div class="card-footer border-0 bg-white">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection