@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')

<div class="row mt-4">

    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
        <div class="card">
            <div class="card-body">
                <img class="img-fluid mb-4" src="{{ $user->avatar }}">
                <hr>
                <h4><strong>个人简介</strong></h4>
                <p>{{ $user->introduction }}</p>
                <hr>
                <h4><strong>注册于</strong></h4>
                <p>{{ $user->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title float-left" style="font-size:30px;">{{ $user->name }} <small>{{ $user->email }}</small></h1>
            </div>
        </div>
        <hr>

        {{-- 用户发布的内容 --}}
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#">Ta 的话题</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Ta 的回复</a></li>
                </ul>
            </div>

                @include('users._posts', ['posts' => $user->posts()->recent()->paginate(5)])

        </div>

    </div>
</div>
@stop
