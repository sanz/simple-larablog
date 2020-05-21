<!-- Single Comment -->
<div class="media mb-4 comment">
    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
    <div class="media-body">
        <h5 class="mt-0">
            {{ $comment->user->name }} says...
            <small class="float-right text-muted">{{ $comment->created_at->diffForHumans() }}</small>
        </h5>

        {{ $comment->body }}
    </div>
</div>