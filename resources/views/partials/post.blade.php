<!-- Blog Post -->
<div class="card mb-4">
    <div class="card-body">
        <p>
            <a href="{{ $post->category->path() }}">
                <span class="badge badge-pill badge-primary">{{ $post->category->name }}</span>
            </a>
        </p>
        <h2 class="card-title">
            <a href="{{ $post->path() }}">
                {{ $post->title }}
            </a>
        </h2>
        <p class="card-text">{{ substr($post->body, 0, 200) }}</p>

        <a href="{{ $post->path() }}" class="btn btn-primary">
            Read More &rarr;
        </a>
    </div>
    <div class="card-footer text-muted">
        Posted on {{ $post->created_at->toDayDateTimeString() }} by <a href="#">{{ $post->user->name }}</a>
        <span class="badge badge-pill badge-info float-right">Comments {{ $post->comments_count }}</span>
    </div>
</div>
