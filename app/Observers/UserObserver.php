<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Str;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user, Post $post)
    {
        $post->user_id = $user->id;
        $post->title = 'Title One';
        $post->slug = Str::slug($post->title);
        $post->content = 'Content One Me';
        $post->save();
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $post = Post::where('user_id',$user->id)->first();
        if ($post) {
            Comment::where('post_id',$post->id)->delete();
            $post->delete();
        }
        
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
