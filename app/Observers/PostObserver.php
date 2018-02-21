<?php

namespace App\Observers;

use App\Models\Post;
use App\Handlers\SlugTranslateHandler;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class PostObserver
{
    public function creating(Post $post)
    {
        //
    }

    public function updating(Post $post)
    {
        //
    }

    public function saving(Post $post)
    {
        $post->excerpt = make_excerpt($post->content);

        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        if ( ! $post->slug) {
            $post->slug = app(SlugTranslateHandler::class)->translate($post->title);
        }
    }
}
