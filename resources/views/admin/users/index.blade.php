@extends('shared.admin.app')
@section('main')
    {{-- Main Content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        {{-- Success Alert --}}
        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Users Table --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="text-white m-0">
                <i class="bi bi-people"></i> All Users ({{ count($users) }})
            </h2>

            <a class="btn btn-primary" href="{{ route('users.create') }}">
                <i class="bi bi-plus"></i> Add User
            </a>

        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><i class="bi bi-person me-1"></i>Name</th>
                        <th scope="col"><i class="bi bi-envelope me-1"></i>Email</th>
                        <th scope="col"><i class="bi bi-shield-check me-1"></i>Role</th>
                        <th scope="col"><i class="bi bi-phone me-1"></i>Phone</th>
                        <th scope="col"><i class="bi bi-gear me-1"></i>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{ $users }} --}}
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>
                                @if ($user->image)
                                    <img src="{{ asset('storage/' . $user->image) }}" alt="User Image"
                                        class="rounded-circle border border-3"
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="rounded-circle border border-3 d-flex align-items-center justify-content-center bg-primary"
                                        style="width: 50px; height: 50px; font-size: 18px; font-weight: 700; color: white;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                @endif
                            </td>
                            <td>{{ $user['email'] }}</td>
                            <td>
                                <span class="badge badge-role badge-admin">{{ $user['role'] }}</span>
                            </td>
                            <td>{{ $user['phone'] }}</td>
                            <td>


                                <div class="d-flex gap-2">

                                    @if (Auth::user()->id == $user->id)
                                        <span class="badge bg-success align-self-center">You</span>
                                    @else
                                        <!-- Delete -->
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <!-- Edit -->
                                    <a class="btn btn-sm btn-primary" href="{{ route('users.edit', $user->id) }}">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm btn-warning" href="{{ route('users.show', $user->id) }}">
                                        <i class="bi bi-eye"></i>
                                    </a>





                                </div>

                            </td>



                            {{-- <td>
                                <span class="text-muted small">
                                    <i class="bi bi-lock"></i> You
                                </span>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </main>
@endsection
