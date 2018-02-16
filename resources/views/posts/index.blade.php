@extends('layouts.app')

@section('title', isset($category) ? $category->name : '话题列表')

@section('content')
<div class="row mt-4">
    <div class="col-md-9">
        @if (isset($category))
            <div class="alert alert-info" role="alert">
                {{ $category->name }} ：{{ $category->description }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item"><a class="nav-link active" href="#">最后回复</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">最新发布</a></li>
                </ul>
            </div>

            <div class="card-body">
                {{-- 话题列表 --}}
                @include('posts._post_list', ['posts' => $posts])
                {{-- 分页 --}}
                {!! $posts->render() !!}
            </div>
        </div>
    </div>
</div>

@endsection
