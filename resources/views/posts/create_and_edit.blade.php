@extends('layouts.app')

@section('content')

<div class="row mt-4">
    <div class="col-md-8">
        <div class="card">
            <h1 class="card-header bg-transparent">
                <i class="glyphicon glyphicon-edit"></i>
                @if($post->id)
                    编辑文章
                @else
                    创建文章
                @endif
            </h1>

            @include('common.error')

            <div class="card-body">
                @if($post->id)
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('posts.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group row">
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $post->title ) }}" placeholder="请填写标题" required/>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-control" name="category_id" required>
                            <option value="" hidden disabled {{ $post->id ? '' : 'selected' }}>请选择分类</option>
                            @foreach ($categories as $value)
                                <option value="{{ $value->id }}" {{ $post->category_id == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="slug" id="slug-field" value="{{ old('slug', $post->slug ) }}" placeholder="别名" required/>
                </div>

                <div class="form-group">
                	<textarea name="content" id="content-field" class="form-control" rows="3" placeholder="正文，请填入至少三个字符的内容。" required>{{ old('content', $post->content ) }}</textarea>
                </div>
                {{-- <div class="form-group">
                	<label for="excerpt-field">Excerpt</label>
                	<textarea name="excerpt" id="excerpt-field" class="form-control" rows="3" placeholder="请填入至少三个字符的内容。" required>{{ old('excerpt', $post->excerpt ) }}</textarea>
                </div> --}}


                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
