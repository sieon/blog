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
        // XSS 过滤
        // $post->content = clean($post->content, 'user_topic_body');

        $post->excerpt = make_excerpt($post->content);
    }

    public function saved(Post $post)
    {
        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        // if ( ! $post->slug) {
        //     $post->slug = app(SlugTranslateHandler::class)->translate($post->title);
        // }

        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        if ( ! $post->slug) {

            // 推送任务到队列
            dispatch(new TranslateSlug($post));
        }
    }

}
