@if (count($posts))

<ul class="list-group list-group-flush mb-3">
    @foreach ($posts as $post)
        <li class="list-group-item">
            <a href="{{ route('posts.show', $post->id) }}">
                {{ $post->title }}
            </a>
            <span class="meta pull-right">
                {{ $post->comment_count }} 回复
                <span> ⋅ </span>
                {{ $post->created_at->diffForHumans() }}
            </span>
        </li>
    @endforeach
</ul>

@else
   <div class="empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
{!! $posts->render() !!}
