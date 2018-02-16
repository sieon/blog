@if (count($posts))

    <ul class="list-unstyled">
        @foreach ($posts as $post)
            <li class="media">

                <a class="mr-3" href="{{ route('users.show', [$post->user_id]) }}">
                    <img class="img-thumbnail" style="width: 52px; height: 52px;" src="{{ $post->user->avatar }}" title="{{ $post->user->name }}">
                </a>

                <div class="media-body">

                    <div class="media-heading">
                        <a href="{{ route('posts.show', [$post->id]) }}" title="{{ $post->title }}">
                            {{ $post->title }}
                        </a>
                        <a class="pull-right" href="{{ route('posts.show', [$post->id]) }}" >
                            <span class="badge"> {{ $post->reply_count }} </span>
                        </a>
                    </div>

                    <div class="media-body meta">

                        <a href="{{ route('categories.show', $post->category->id) }}" title="{{ $post->category->name }}">
                            <span class="fa fa-folder-open" aria-hidden="true"></span>
                             {{ $post->category->name }}
                        </a>

                        <span> • </span>
                        <a href="{{ route('users.show', [$post->user_id]) }}" title="{{ $post->user->name }}">
                            <span class="fa fa-user" aria-hidden="true"></span>
                            {{ $post->user->name }}
                        </a>
                        <span> • </span>
                        <span class="fa fa-time" aria-hidden="true"></span>
                        <span class="timeago" title="最后活跃于">{{ $post->updated_at->diffForHumans() }}</span>
                    </div>

                </div>
            </li>

            @if ( ! $loop->last)
                <hr>
            @endif

        @endforeach
    </ul>

@else
   <div class="empty-block">暂无数据 ~_~ </div>
@endif
