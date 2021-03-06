<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Request $request, Post $post)
	{
        $posts = $post->withOrder($request->order)->paginate(20);
		return view('posts.index', compact('posts'));
	}

    public function show(Request $request, Post $post)
    {
        // URL 矫正
        if ( ! empty($post->slug) && $post->slug != $request->slug) {
            return redirect($post->link(), 301);
        }

        return view('posts.show', compact('post'));
    }

	public function create(Post $post)
	{
        $categories = Category::all();
		return view('posts.create_and_edit', compact('post', 'categories'));
	}

	public function store(PostRequest $request, Post $post)
	{
		$post->fill($request->all());
        $post->user_id = Auth::id();
        $post->save();

		return redirect()->to($post->link())->with('message', '创建成功！');
	}

	public function edit(Post $post)
	{
        $this->authorize('update', $post);
        $categories = Category::all();
		return view('posts.create_and_edit', compact('post', 'categories'));
	}

	public function update(PostRequest $request, Post $post)
	{
		$this->authorize('update', $post);
		$post->update($request->all());

		return redirect()->to($post->link())->with('message', '更新成功！');
	}

	public function destroy(Post $post)
	{
		$this->authorize('destroy', $post);
		$post->delete();

		return redirect()->route('posts.index')->with('message', '删除成功！');
	}
}
