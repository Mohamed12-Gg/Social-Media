@extends('shared.admin.app')

@section('main')
    {{-- Success Alert --}}
    @if (session('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- جدول المنشورات مع تأثير الـ Glassmorphism --}}
    <div class="table-section">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-white m-0">
                <i class="bi bi-file-earmark-text"></i> All Posts ({{ count($posts) }})
            </h2>
            <a class="btn btn-primary" href="{{ route('posts.create') }}">
                <i class="bi bi-plus"></i> Add Post
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><i class="bi bi-image me-1"></i>Image</th>
                        <th scope="col"><i class="bi bi-type me-1"></i>Title</th>
                        <th scope="col"><i class="bi bi-text-paragraph me-1"></i>Content</th>
                        <th scope="col"><i class="bi bi-gear me-1"></i>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>

                            <td>
                                @if ($post->image)
                                    <img src="/storage/{{ $post->image }}" alt="Post Image" width="70" height="70"
                                         class="rounded shadow border border-2 border-secondary" style="object-fit: cover;">
                                @else
                                    <div class="rounded shadow d-flex align-items-center justify-content-center bg-secondary"
                                         style="width: 70px; height: 70px;">
                                        <i class="bi bi-image text-white fs-4"></i>
                                    </div>
                                @endif
                            </td>

                            <td>
                                <strong class="text-white">{{ $post->title }}</strong>
                            </td>

                            <td style="max-width: 300px;" class="text-white-50">
                                {{ Str::limit($post->content, 80) }}
                            </td>

                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-sm btn-primary" href="{{ route('posts.edit', $post->id) }}">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this post?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                    <a class="btn btn-sm btn-warning" href="{{ route('posts.show', $post->id) }}">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary py-5">
                                <i class="bi bi-journal-x fs-2 d-block mb-2"></i>
                                No posts added yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
