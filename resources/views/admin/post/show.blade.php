@extends('shared.admin.app')

@section('show')
    <div class="container-fluid py-4">

        <div class="card border-0 shadow-lg" style="background: rgba(20,25,55,0.95); border-radius:20px;">

            <div class="card-body p-3 p-md-5">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4 mb-md-5">
                    <h2 class="text-white m-0 fs-5 fs-md-4">
                        <i class="bi bi-file-earmark-text text-primary"></i>
                        Post Details
                    </h2>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-arrow-left"></i>
                        Back
                    </a>
                </div>

                @if (session('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('msg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="row g-3 g-md-4">

                    <!-- Image -->
                    <div class="col-12 text-center mb-2">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image"
                                class="rounded shadow border border-3 border-light"
                                style="width: 200px; height: 200px; object-fit: cover;">
                        @else
                            <div class="rounded shadow border border-3 border-secondary d-flex align-items-center justify-content-center mx-auto"
                                style="width: 200px; height: 200px; background: rgba(255,255,255,0.05);">
                                <i class="bi bi-image text-secondary" style="font-size: 4rem;"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Author -->
                    <div class="col-12">
                        <div class="p-3 p-md-4 rounded-4 d-flex align-items-center gap-3"
                            style="background: rgba(255,255,255,0.05);">
                            <img src="{{ $post->user->image ? asset('storage/' . $post->user->image) : asset('images/default/image.png') }}"
                                class="rounded-circle border border-2 border-primary flex-shrink-0"
                                style="width: 48px; height: 48px; object-fit: cover;">
                            <div class="min-w-0">
                                <small class="text-secondary d-block mb-1">Post Author</small>
                                <h5 class="text-white m-0 text-truncate">{{ $post->user->name ?? 'Unknown' }}</h5>
                                <small class="text-secondary text-truncate d-block">{{ $post->user->email ?? '' }}</small>
                            </div>
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="col-12">
                        <div class="p-3 p-md-4 rounded-4" style="background: rgba(255,255,255,0.05);">
                            <small class="text-secondary d-block mb-2">Post Title</small>
                            <h3 class="text-white m-0 fs-5 fs-md-3">{{ $post->title }}</h3>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="col-12">
                        <div class="p-3 p-md-4 rounded-4" style="background: rgba(255,255,255,0.05);">
                            <small class="text-secondary d-block mb-3">Content</small>
                            <p class="text-white m-0" style="line-height: 1.8; word-break: break-word;">
                                {{ $post->content }}
                            </p>
                        </div>
                    </div>

                    <!-- Dates -->
                    <div class="col-6">
                        <div class="p-3 rounded-4 h-100" style="background: rgba(255,255,255,0.05);">
                            <small class="text-secondary d-block mb-2">Created At</small>
                            <h6 class="text-white m-0">{{ $post->created_at->format('Y-m-d') }}</h6>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 rounded-4 h-100" style="background: rgba(255,255,255,0.05);">
                            <small class="text-secondary d-block mb-2">Updated At</small>
                            <h6 class="text-white m-0">{{ $post->updated_at->format('Y-m-d') }}</h6>
                        </div>
                    </div>

                    <!-- Likes -->
                    <div class="col-12">
                        <div class="p-3 p-md-4 rounded-4" style="background: rgba(255,255,255,0.05);">
                            <small class="text-secondary">👍 Likes ({{ $post->likes->count() }})</small>
                            @if ($post->likes->count() > 0)
                                <div class="d-flex flex-wrap gap-2 mt-3">
                                    @foreach ($post->likes as $like)
                                        <div class="d-flex align-items-center gap-2 px-3 py-2 rounded-3"
                                            style="background: rgba(255,255,255,0.05);">
                                            <div class="rounded-circle overflow-hidden border border-primary flex-shrink-0"
                                                style="width: 28px; height: 28px;">
                                                @if ($like->user && $like->user->image)
                                                    <img src="{{ asset('storage/' . $like->user->image) }}"
                                                        class="w-100 h-100" style="object-fit: cover;">
                                                @else
                                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-primary">
                                                        <span class="text-white fw-bold" style="font-size: 0.65rem;">
                                                            {{ strtoupper(substr($like->user->name ?? 'U', 0, 1)) }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                            <small class="text-white">{{ $like->user->name ?? 'Unknown' }}</small>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-secondary m-0 mt-2">No likes yet.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Comments -->
                    <div class="col-12">
                        <div class="p-3 p-md-4 rounded-4" style="background: rgba(255,255,255,0.05);">

                            <!-- Comments Header -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <small class="text-secondary">💬 Comments ({{ $post->comments->count() }})</small>
                                <button class="btn btn-sm btn-primary px-3" data-bs-toggle="collapse"
                                    data-bs-target="#addCommentForm">
                                    <i class="bi bi-plus-lg me-1"></i> Add
                                </button>
                            </div>

                            <!-- Add Comment Form -->
                            <div class="collapse mb-3" id="addCommentForm">
                                <form action="{{ route('comment.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <div class="d-flex gap-2 align-items-start">
                                        <div class="rounded-circle overflow-hidden border border-primary flex-shrink-0"
                                            style="width: 38px; height: 38px;">
                                            @if (auth()->user()->image)
                                                <img src="{{ asset('storage/' . auth()->user()->image) }}"
                                                    class="w-100 h-100" style="object-fit: cover;">
                                            @else
                                                <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-primary">
                                                    <span class="text-white fw-bold">
                                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-grow-1">
                                            <textarea name="comment" rows="2"
                                                class="form-control bg-dark border-secondary text-white mb-2 @error('comment') is-invalid @enderror"
                                                placeholder="Write your comment..."
                                                style="border-radius: 10px; resize: none;">{{ old('comment') }}</textarea>
                                            @error('comment')
                                                <div class="invalid-feedback d-block mb-2">{{ $message }}</div>
                                            @enderror
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-sm btn-success px-4">
                                                    <i class="bi bi-send me-1"></i> Post
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                           <!-- Comments List -->
@forelse ($post->comments->whereNull('parent_id') as $comment)
    <div class="d-flex align-items-start gap-2 gap-md-3 mb-3 p-3 rounded-3"
        style="background: rgba(255,255,255,0.03);">

        <!-- Avatar -->
        <div class="rounded-circle overflow-hidden border border-primary flex-shrink-0"
            style="width: 36px; height: 36px;">
            @if ($comment->user && $comment->user->image)
                <img src="{{ asset('storage/' . $comment->user->image) }}"
                    class="w-100 h-100" style="object-fit: cover;">
            @else
                <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-info">
                    <span class="text-white fw-bold" style="font-size: 0.8rem;">
                        {{ strtoupper(substr($comment->user->name ?? 'U', 0, 1)) }}
                    </span>
                </div>
            @endif
        </div>

        <!-- Content -->
        <div class="flex-grow-1 min-w-0">

            <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                <strong class="text-info" style="font-size: 0.9rem;">
                    {{ $comment->user->name ?? 'Unknown' }}
                </strong>
                <small class="text-secondary">{{ $comment->created_at->diffForHumans() }}</small>
            </div>

            <p class="text-white-50 m-0 mb-2" style="word-break: break-word; font-size: 0.9rem;">
                {{ $comment->comment }}
            </p>

            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-primary py-0 px-2"
                    data-bs-toggle="collapse"
                    data-bs-target="#editComment{{ $comment->id }}"
                    style="font-size: 0.75rem;">
                    <i class="bi bi-pencil"></i>
                </button>
                <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger py-0 px-2"
                        onclick="return confirm('Are you sure?')"
                        style="font-size: 0.75rem;">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
                {{-- زر Reply --}}
                <button class="btn btn-sm btn-secondary py-0 px-2"
                    data-bs-toggle="collapse"
                    data-bs-target="#replyComment{{ $comment->id }}"
                    style="font-size: 0.75rem;">
                    <i class="bi bi-reply"></i>
                </button>
            </div>

            {{-- Edit Form --}}
            <div class="collapse mt-2" id="editComment{{ $comment->id }}">
                <form action="{{ route('comment.update', $comment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex gap-2">
                        <input type="text" name="comment" value="{{ $comment->comment }}"
                            class="form-control form-control-sm bg-dark border-secondary text-white"
                            style="border-radius: 10px;">
                        <button type="submit" class="btn btn-sm btn-success text-nowrap">Save</button>
                    </div>
                </form>
            </div>

            {{-- Reply Form --}}
            <div class="collapse mt-2" id="replyComment{{ $comment->id }}">
                <form action="{{ route('comment.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    <div class="d-flex gap-2">
                        <input type="text" name="comment" placeholder="Write a reply..."
                            class="form-control form-control-sm bg-dark border-secondary text-white"
                            style="border-radius: 10px;">
                        <button type="submit" class="btn btn-sm btn-primary text-nowrap">
                            <i class="bi bi-send"></i>
                        </button>
                    </div>
                </form>
            </div>

            {{-- الـ Replies --}}
@foreach ($comment->replies as $reply)
    <div class="d-flex align-items-start gap-2 mt-2 p-2 rounded-3"
        style="background: rgba(255,255,255,0.03); margin-left: 10px;">
        <div class="rounded-circle overflow-hidden border border-secondary flex-shrink-0"
            style="width: 28px; height: 28px;">
            @if ($reply->user && $reply->user->image)
                <img src="{{ asset('storage/' . $reply->user->image) }}"
                    class="w-100 h-100" style="object-fit: cover;">
            @else
                <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-secondary">
                    <span class="text-white fw-bold" style="font-size: 0.65rem;">
                        {{ strtoupper(substr($reply->user->name ?? 'U', 0, 1)) }}
                    </span>
                </div>
            @endif
        </div>
        <div class="flex-grow-1">
            <strong class="text-info" style="font-size: 0.8rem;">
                {{ $reply->user->name ?? 'Unknown' }}
            </strong>
            <small class="text-secondary ms-1">{{ $reply->created_at->diffForHumans() }}</small>
            <p class="text-white-50 m-0 mb-1" style="font-size: 0.85rem;">{{ $reply->comment }}</p>

            {{-- أزرار Edit و Delete --}}
            <div class="d-flex gap-2 mt-1">
                <button class="btn btn-sm btn-primary py-0 px-2"
                    data-bs-toggle="collapse"
                    data-bs-target="#editReply{{ $reply->id }}"
                    style="font-size: 0.7rem;">
                    <i class="bi bi-pencil"></i>
                </button>
                <form action="{{ route('comment.destroy', $reply->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger py-0 px-2"
                        onclick="return confirm('Are you sure?')"
                        style="font-size: 0.7rem;">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </div>

            {{-- Edit Form --}}
            <div class="collapse mt-1" id="editReply{{ $reply->id }}">
                <form action="{{ route('comment.update', $reply->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex gap-2">
                        <input type="text" name="comment" value="{{ $reply->comment }}"
                            class="form-control form-control-sm bg-dark border-secondary text-white"
                            style="border-radius: 10px;">
                        <button type="submit" class="btn btn-sm btn-success text-nowrap">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endforeach
        </div>
    </div>
@empty
    <p class="text-secondary m-0">No comments yet.</p>
@endforelse

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
