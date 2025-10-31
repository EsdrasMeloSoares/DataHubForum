<div class="flex flex-col space-y-4">
    <div>
        <p>
            {{ $post->user->name }} · {{ $post->created_at->diffForHumans() }}
        </p>
        <h1 class="text-3xl font-bold">
            {{ $post->title }}
        </h1>
    </div>
    <div>
        {!! $post->body !!}
    </div>
</div>