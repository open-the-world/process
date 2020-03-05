<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => '投稿のタイトル',
        'body' => "本文です。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。\nテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。",
        'name' => '投稿者名',
        'category' => '投稿のカテゴリー',
        'conditions' => '投稿の条件',
        'process' => '学習プロセス',
        'goal' => '投稿のゴール',
    ];
});
