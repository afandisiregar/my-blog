<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->has(Post::factory()->state(function (array $attributes, User $user) {return ['user_id' => $user->id];})->has(Comment::factory()->state(function (array $attributes, Post $post) {return ['post_id' => $post->id];})))->create();
    }
}
