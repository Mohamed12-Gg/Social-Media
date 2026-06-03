<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --fb-bg: #18191a;
            --fb-card: #242526;
            --fb-border: #3a3b3c;
            --fb-text: #e4e6eb;
            --fb-text-secondary: #b0b3b8;
            --fb-blue: #2374e1;
            --fb-hover: #3a3b3c;
        }

        body {
            background: var(--fb-bg);
            font-family: "Inter", sans-serif;
            color: var(--fb-text);
            min-height: 100vh;
        }

        .fb-navbar {
            background: var(--fb-card);
            border-bottom: 1px solid var(--fb-border);
            padding: 0 16px;
            height: 56px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .fb-brand {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--fb-blue);
            text-decoration: none;
        }

        .fb-nav-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .fb-nav-btn {
            background: var(--fb-hover);
            border: none;
            color: var(--fb-text);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background 0.2s;
            text-decoration: none;
        }

        .fb-nav-btn:hover {
            background: #4a4b4c;
            color: var(--fb-text);
        }

        .fb-main {
            padding-top: 70px;
            max-width: 680px;
            margin: 0 auto;
            padding-left: 16px;
            padding-right: 16px;
        }

        .fb-post {
            background: var(--fb-card);
            border-radius: 8px;
            margin-bottom: 16px;
            border: 1px solid var(--fb-border);
        }

        .fb-post-header {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            gap: 10px;
        }

        .fb-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .fb-avatar-placeholder {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--fb-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .fb-post-meta strong {
            display: block;
            font-size: 0.95rem;
            color: var(--fb-text);
        }

        .fb-post-meta small {
            color: var(--fb-text-secondary);
            font-size: 0.8rem;
        }

        .fb-post-content {
            padding: 0 16px 12px;
            font-size: 0.95rem;
            line-height: 1.5;
            color: var(--fb-text);
        }

        .fb-post-image img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
        }

        .fb-post-stats {
            padding: 8px 16px;
            display: flex;
            justify-content: space-between;
            color: var(--fb-text-secondary);
            font-size: 0.85rem;
            border-top: 1px solid var(--fb-border);
            border-bottom: 1px solid var(--fb-border);
        }

        .fb-post-actions {
            display: flex;
            padding: 4px 8px;
            gap: 4px;
        }

        .fb-action-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px;
            border: none;
            background: transparent;
            color: var(--fb-text-secondary);
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 600;
            transition: background 0.2s;
        }

        .fb-action-btn:hover {
            background: var(--fb-hover);
            color: var(--fb-text);
        }

        .fb-comments {
            padding: 8px 16px 12px;
            border-top: 1px solid var(--fb-border);
        }

        .fb-comment {
            display: flex;
            gap: 8px;
            margin-bottom: 8px;
        }

        .fb-comment-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .fb-comment-avatar-placeholder {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--fb-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 0.75rem;
            flex-shrink: 0;
        }

        .fb-comment-bubble {
            background: var(--fb-hover);
            border-radius: 18px;
            padding: 8px 12px;
            font-size: 0.875rem;
        }

        .fb-comment-bubble strong {
            display: block;
            font-size: 0.8rem;
            color: var(--fb-text);
        }

        .fb-comment-bubble span {
            color: var(--fb-text-secondary);
        }

        textarea::placeholder,
        input::placeholder {
            color: #b0b3b8 !important;
        }

        .form-control:focus {
            box-shadow: none !important;
            border: none !important;
            background: var(--fb-hover) !important;
            color: white !important;
        }

        .fb-comment-time {
            font-size: 0.75rem;
            color: var(--fb-text-secondary);
            margin-top: 2px;
            padding-left: 4px;
        }

        .fb-comment-input {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 8px;
        }

        .fb-comment-input input {
            flex: 1;
            background: var(--fb-hover);
            border: none;
            border-radius: 20px;
            padding: 8px 16px;
            color: var(--fb-text);
            font-size: 0.875rem;
            outline: none;
        }

        .fb-comment-input input::placeholder {
            color: var(--fb-text-secondary);
        }

        .fb-comment-input button {
            background: transparent;
            border: none;
            color: var(--fb-blue);
            font-size: 1.2rem;
            cursor: pointer;
        }

        .fb-user-bar {
            background: var(--fb-card);
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
            border: 1px solid var(--fb-border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .fb-user-bar-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .fb-user-bar-placeholder {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--fb-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .liked-btn {
            color: var(--fb-blue) !important;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="fb-navbar">
        <a href="{{ route('home') }}" class="fb-brand">Social Media</a>
        <div class="fb-nav-actions">
            <a href="{{ route('profile') }}" class="fb-nav-btn" title="Profile">
                <i class="bi bi-person-fill"></i>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="fb-nav-btn" title="Logout">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="fb-main">

        <!-- User Welcome Bar -->
        <div class="fb-user-bar">
            @if (Auth::user()->image)
                <img src="{{ asset('storage/' . Auth::user()->image) }}" class="fb-user-bar-avatar" alt="avatar">
            @else
                <div class="fb-user-bar-placeholder">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            @endif
            <div>
                <strong>{{ Auth::user()->name }}</strong>
                <small class="d-block" style="color: var(--fb-text-secondary);">{{ Auth::user()->email }}</small>
            </div>
        </div>

        <!-- Create Post -->
        <div class="fb-post mb-4">
            <div class="p-3">
                <form action="{{ route('storePost') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf

                    <div class="d-flex align-items-center gap-3 mb-3">
                        @if (Auth::user()->image)
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" class="fb-user-bar-avatar"
                                alt="avatar">
                        @else
                            <div class="fb-user-bar-placeholder">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <div class="flex-grow-1">
                            <input type="text" name="title" class="form-control border-0"
                                placeholder="What's on your mind, {{ Auth::user()->name }}?"
                                style="background: var(--fb-hover); color: white; border-radius: 50px; padding: 12px 18px;"
                                value="{{ old('title') }}" required>
                            @error('title')
                                <small style="color: #e74c3c; padding-left: 12px;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <textarea name="content" rows="3" class="form-control border-0" placeholder="Write something..."
                            style="background: var(--fb-hover); color: white; border-radius: 14px; resize: none;">{{ old('content') }}</textarea>
                        @error('content')
                            <small style="color: #e74c3c; padding-left: 4px;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                        <img id="imagePreview" src="" alt="" class="rounded"
                            style="width: 60px; height: 60px; object-fit: cover; display: none;">

                        <label for="imageInput" class="btn btn-dark px-3 rounded-pill" style="cursor:pointer;">
                            <i class="bi bi-image-fill text-success"></i> Photo <small
                                class="text-secondary">(optional)</small>
                        </label>
                        <input type="file" name="image" id="imageInput" hidden accept="image/*">

                        @if (session('msg'))
                            <div class="alert alert-dismissible fade show d-flex align-items-center gap-2"
                                role="alert"
                                style="background: transparent; border: 1.5px solid #2ecc71; border-radius: 12px; color: #2ecc71; font-size: 0.9rem; padding: 12px 18px;">
                                <i class="bi bi-check-circle" style="font-size: 1.1rem;"></i>
                                <span class="flex-grow-1">{{ session('msg') }}</span>
                                <button type="button" class="btn-close btn-close-white opacity-50"
                                    data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold">Post</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Posts Feed -->
        @forelse ($posts as $post)
            <div class="fb-post">

                <!-- Header -->
                <div class="fb-post-header">
                    @if ($post->user && $post->user->image)
                        <img src="{{ asset('storage/' . $post->user->image) }}" class="fb-avatar" alt="avatar">
                    @else
                        <div class="fb-avatar-placeholder">
                            {{ strtoupper(substr($post->user->name ?? 'U', 0, 1)) }}
                        </div>
                    @endif
                    <div class="fb-post-meta">
                        <strong>{{ $post->user->name ?? 'Unknown' }}</strong>
                        <small>{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>

                <!-- Title -->
                <div class="fb-post-content pt-2">
                    <strong>{{ $post->title }}</strong>
                </div>

                <!-- Content -->
                <div class="fb-post-content">
                    <p class="mb-0">{{ $post->content }}</p>
                </div>

                <!-- Image -->
                @if ($post->image)
                    <div class="fb-post-image">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="post image">
                    </div>
                @endif

                <!-- Stats -->
                <div class="fb-post-stats">
                    <span>👍 <span id="likeCount{{ $post->id }}">{{ $post->likes->count() }}</span> Likes</span>
                    <span>💬 <span id="commentCount{{ $post->id }}">{{ $post->comments->count() }}</span>
                        Comments</span>

                </div>

                <!-- Actions -->
                <div class="fb-post-actions">

                    {{-- Like --}}
                    <form class="likeForm" data-post-id="{{ $post->id }}"
                        action="{{ route('posts.like', $post->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="fb-action-btn {{ $post->likes->contains('user_id', Auth::id()) ? 'liked-btn' : '' }}"
                            id="likeBtn{{ $post->id }}">
                            👍 <span id="likeBtnText{{ $post->id }}">
                                {{ $post->likes->contains('user_id', Auth::id()) ? 'Liked' : 'Like' }}
                                ({{ $post->likes->count() }})
                            </span>
                        </button>
                    </form>

                    {{-- Comment --}}
                    <button class="fb-action-btn"
                        onclick="document.getElementById('commentInput{{ $post->id }}').focus()">
                        💬 Comment {{ $post->comments->count() }}
                    </button>

                    {{-- Share --}}
                    <button class="fb-action-btn"
                        onclick="navigator.clipboard.writeText('{{ route('home') }}').then(() => alert('Link copied!'))">
                        ↗️ Share
                    </button>

                </div>

                <!-- Comments -->
                <div class="fb-comments">

                    {{-- Comments List --}}
                    <div id="commentsList{{ $post->id }}">
                        @foreach ($post->comments->whereNull('parent_id') as $comment)
                            <div class="fb-comment">
                                @if ($comment->user && $comment->user->image)
                                    <img src="{{ asset('storage/' . $comment->user->image) }}"
                                        class="fb-comment-avatar" alt="avatar">
                                @else
                                    <div class="fb-comment-avatar-placeholder">
                                        {{ strtoupper(substr($comment->user->name ?? 'U', 0, 1)) }}
                                    </div>
                                @endif
                                <div class="flex-grow-1">
                                    <div class="fb-comment-bubble">
                                        <strong>{{ $comment->user->name ?? 'Unknown' }}</strong>
                                        <span>{{ $comment->comment }}</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3 mt-1 ps-2">
                                        <span
                                            class="fb-comment-time">{{ $comment->created_at->diffForHumans() }}</span>
                                        @if ($comment->user_id !== Auth::id())
                                            {{-- جديد --}}
                                            <span
                                                style="font-size:0.75rem; color: var(--fb-blue); cursor:pointer; font-weight:600;"
                                                onclick="const el = document.getElementById('replyInput{{ $comment->id }}'); el.style.display = el.style.display === 'none' ? 'flex' : 'none'">
                                                Reply
                                            </span>
                                        @endif
                                    </div>

                                    {{-- فورم الـ Reply --}}
                                    <div id="replyInput{{ $comment->id }}" class="fb-comment-input mt-1"
                                        style="display:none;">
                                        <form action="{{ route('comment.store') }}" method="POST"
                                            class="d-flex gap-2 w-100">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                            <input type="text" name="comment" placeholder="Write a reply..."
                                                style="flex:1; background: var(--fb-hover); border:none; border-radius:20px; padding: 6px 14px; color: var(--fb-text); font-size:0.8rem; outline:none;">
                                            <button type="submit"
                                                style="background:transparent; border:none; color: var(--fb-blue); font-size:1.1rem; cursor:pointer;">➤</button>
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
                                                    <div
                                                        class="w-100 h-100 d-flex align-items-center justify-content-center bg-secondary">
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
                                                <small
                                                    class="text-secondary ms-1">{{ $reply->created_at->diffForHumans() }}</small>
                                                <p class="text-white-50 m-0 mb-1" style="font-size: 0.85rem;">
                                                    {{ $reply->comment }}</p>

                                                @if ($reply->user_id !== Auth::id())
                                                    {{-- زر Reply على الـ reply --}}
                                                    <span
                                                        style="font-size:0.75rem; color: var(--fb-blue); cursor:pointer; font-weight:600;"
                                                        onclick="const el = document.getElementById('replyOnReply{{ $reply->id }}'); el.style.display = el.style.display === 'none' ? 'block' : 'none'">
                                                        Reply
                                                    </span>
                                                @endif

                                                {{-- فورم الـ Reply على الـ reply --}}
                                                <div id="replyOnReply{{ $reply->id }}" style="display:none;"
                                                    class="mt-1">
                                                    <form action="{{ route('comment.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="post_id"
                                                            value="{{ $post->id }}">
                                                        <input type="hidden" name="parent_id"
                                                            value="{{ $comment->id }}">
                                                        <div class="d-flex gap-2">
                                                            <input type="text" name="comment"
                                                                placeholder="Write a reply..."
                                                                class="form-control form-control-sm bg-dark border-secondary text-white"
                                                                style="border-radius: 10px;">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-primary text-nowrap">
                                                                <i class="bi bi-send"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                            </div>
                        @endforeach
                    </div>

                    {{-- Add Comment --}}
                    <form class="commentForm" data-post-id="{{ $post->id }}"
                        action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="fb-comment-input">
                            @if (Auth::user()->image)
                                <img src="{{ asset('storage/' . Auth::user()->image) }}" class="fb-comment-avatar"
                                    alt="avatar">
                            @else
                                <div class="fb-comment-avatar-placeholder">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                            <input type="text" name="comment" id="commentInput{{ $post->id }}"
                                placeholder="Write a comment..." autocomplete="off">
                            <button type="submit">➤</button>
                        </div>
                    </form>

                </div>

            </div>
        @empty
            <div class="text-center py-5" style="color: var(--fb-text-secondary);">
                <p>No posts available yet!</p>
            </div>
        @endforelse

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Image Preview
        document.getElementById("imageInput").addEventListener("change", function() {
            const preview = document.getElementById("imagePreview");
            const file = this.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = "block";
            } else {
                preview.src = "";
                preview.style.display = "none";
            }
        });

        // Auto-hide alerts
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                new bootstrap.Alert(alert).close();
            });
        }, 3000);

        // Like (no refresh)
        document.querySelectorAll('.likeForm').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const postId = this.dataset.postId;
                const btn = document.getElementById('likeBtn' + postId);
                const textEl = document.getElementById('likeBtnText' + postId);
                const countEl = document.getElementById('likeCount' + postId);
                const isLiked = btn.classList.contains('liked-btn');
                const count = parseInt(countEl.textContent);

                fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: new FormData(this)
                }).then(res => {
                    if (res.ok) {
                        if (isLiked) {
                            btn.classList.remove('liked-btn');
                            textEl.textContent = `Like (${count - 1})`;
                            countEl.textContent = count - 1;
                        } else {
                            btn.classList.add('liked-btn');
                            textEl.textContent = `Liked (${count + 1})`;
                            countEl.textContent = count + 1;
                        }
                    }
                });
            });
        });

        // Comment (no refresh)
        document.querySelectorAll('.commentForm').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const postId = this.dataset.postId;
                const input = this.querySelector('input[name="comment"]');
                const text = input.value.trim();
                if (!text) return;

                fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: new FormData(this)
                }).then(res => {
                    if (res.ok) {
                        const list = document.getElementById('commentsList' + postId);
                        const countEl = document.getElementById('commentCount' + postId);
                        const div = document.createElement('div');
                        div.className = 'fb-comment';
                        div.innerHTML = `
                            <div class="fb-comment-avatar-placeholder">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="fb-comment-bubble">
                                    <strong>{{ Auth::user()->name }}</strong>
                                    <span>${text}</span>
                                </div>
                                <div class="fb-comment-time">Just now</div>
                            </div>
                        `;
                        list.appendChild(div);
                        input.value = '';
                        countEl.textContent = parseInt(countEl.textContent) + 1;
                    }
                });
            });
        });
    </script>
</body>

</html>
