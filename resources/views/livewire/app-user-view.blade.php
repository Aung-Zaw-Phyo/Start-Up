<div>
    <div class="mb-4">
        {{ $this->infolist }}
    </div>
    <div>
        <h1 class="mb-4">POSTS</h1>
        <div>
            @foreach ($this->posts as $post)
                <div>
                    <h1>{{ $post->content }}</h1>
                </div>
            @endforeach
        </div>
    </div>
</div>
