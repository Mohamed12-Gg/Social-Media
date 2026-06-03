@extends('shared.admin.app')

@section('main')
    @if (session('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-section">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-white m-0">
                <i class="bi bi-people"></i> All Users ({{ $users->total() }})
            </h2>
            <a class="btn btn-primary btn-sm px-3" href="{{ route('users.create') }}">
                <i class="bi bi-plus"></i> Add User
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><i class="bi bi-person me-1"></i>Name</th>
                        {{-- مخفية على الموبايل --}}
                        <th class="d-none d-sm-table-cell">
                            <i class="bi bi-envelope me-1"></i>Email
                        </th>
                        <th class="d-none d-md-table-cell">
                            <i class="bi bi-phone me-1"></i>Phone
                        </th>
                        <th class="d-none d-sm-table-cell">
                            <i class="bi bi-shield-check me-1"></i>Role
                        </th>
                        <th><i class="bi bi-gear me-1"></i>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>

                            {{-- Name + Avatar — دايماً ظاهر --}}
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    {{-- Avatar --}}
                                    @if ($user->image)
                                        <img src="{{ url('storage/' . $user->image) }}" alt="User Image" loading="lazy"
                                            class="rounded-circle border border-2 flex-shrink-0"
                                            style="width: 38px; height: 38px; object-fit: cover;">
                                    @else
                                        <div class="rounded-circle border border-2 d-flex align-items-center justify-content-center bg-primary flex-shrink-0"
                                            style="width: 38px; height: 38px; font-size: 15px; font-weight: 700; color: white;">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                    @endif

                                    <div style="min-width: 0;">
                                        <strong class="text-white d-block text-truncate" style="max-width: 110px;">
                                            {{ $user->name }}
                                        </strong>
                                        {{-- Email كـ subtitle على الموبايل --}}
                                        <small class="text-secondary d-sm-none text-truncate d-block"
                                            style="max-width: 110px;">
                                            {{ $user->email }}
                                        </small>
                                        {{-- Role كـ badge صغير على الموبايل --}}
                                        <span class="d-sm-none badge badge-role badge-admin" style="font-size: 0.65rem;">
                                            {{ $user->role }}
                                        </span>
                                    </div>
                                </div>
                            </td>

                            {{-- Email: مخفي على xs --}}
                            <td class="d-none d-sm-table-cell text-white-50" style="max-width: 180px;">
                                <span class="text-truncate d-block" style="max-width: 160px;">{{ $user->email }}</span>
                            </td>

                            {{-- Phone: مخفي على xs و sm --}}
                            <td class="d-none d-md-table-cell text-white-50">{{ $user->phone }}</td>

                            {{-- Role: مخفي على xs --}}
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-role badge-admin">{{ $user->role }}</span>
                            </td>

                            {{-- Actions: دايماً ظاهرة --}}
                            <td>
                                <div class="d-flex gap-1 flex-nowrap">
                                    @if (Auth::user()->id == $user->id)
                                        <span class="badge bg-success align-self-center">You</span>
                                    @else
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"
                                                title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <a class="btn btn-sm btn-primary" href="{{ route('users.edit', $user->id) }}"
                                        title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm btn-warning" href="{{ route('users.show', $user->id) }}"
                                        title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
