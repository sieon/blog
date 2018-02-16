@extends('layouts.app')

@section('title', $post->title)
@section('description', $post->excerpt)

@section('content')

<div class="row mt-4">

    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    作者：{{ $post->user->name }}
                </div>
                <hr>
                <div class="media">
                    <div align="center">
                        <a href="{{ route('users.show', $post->user->id) }}">
                            <img class="thumbnail img-fluid" src="{{ $post->user->avatar }}" width="300px" height="300px">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 post-content">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">
                    {{ $post->title }}
                </h1>

                <div class="article-meta text-center">
                    {{ $post->created_at->diffForHumans() }}
                    ⋅
                    <span class="fa fa-comment" aria-hidden="true"></span>
                    {{ $post->comment_count }}
                </div>

                <div class="post-content">
                    {!! $post->content !!}
                </div>

                @can('update', $post)
                    <div class="operate">
                        <hr>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-xs pull-left" role="button">
                            <i class="fa fa-edit"></i> 编辑
                        </a>

                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-default btn-xs pull-left" style="margin-left: 6px">
                                <i class="fa fa-trash"></i>
                                删除
                            </button>
                        </form>
                    </div>
                @endcan

            </div>
        </div>
    </div>
</div>
@stop
