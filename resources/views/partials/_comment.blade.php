<div class="comment" id="{{ $comment['id'] }}">
    <div class="comment-author">
        <a href="{{ route('pages.user', $comment['username']) }}">{{ $comment['username'] }}</a>
        <small class="text-muted ml-2">
            {{ date('d/m/Y à H\hi', strtotime($comment['created_at'])) }}
        </small>
        @if (Auth::check())
            <small class="ml-2">
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Répondre à {{ $comment['username'] }}">
                    <a href="#" id="{{ $comment['user_id'] }}" class="comment-reply"><i class="fas fa-reply"></i></a>
                </span>
            </small>
        @endif
    </div>
    <div class="comment-body">
        @if ($comment['status'] == 'deleted')
            <p>Ce commentaire a été supprimé.</p>
        @else
            <p>{{ $comment['body'] }}</p>
        @endif
    </div>
    <hr>
</div>
@if (Auth::check())
    <form method="POST" action="{{ route('comments.store', [$comment['article_id'], $comment['id']]) }}" style="display: none;">
        {{ csrf_field() }}
        <div class="form-group floating-label-form-group controls">
            <label class="font-weight-bold">Répondre à {{ $comment['username'] }}</label>
            <textarea rows="3" class="form-control" name="body" id="body" required></textarea>
        </div>                
        <input type="submit" class="btn btn-secondary" value="Envoyer">
        <hr>
    </form>
@endif

@if (count($comment['children']) > 0)
    <div class="ml-4">
    @foreach ($comment['children'] as $comment)

        @include('partials._comment', $comment)

    @endforeach
    </div>

@endif