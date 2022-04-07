<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Posts Pertama",
            "slug"=> "judul-post-pertama",
            "author" => "Anung Firdauzy",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Distinctio ducimus unde ullam deserunt nobis molestiae modi quos necessitatibus laboriosam et. 
            Non doloribus nihil ea aspernatur totam ipsum eius. In, incidunt."
        ],
        [
            "title" => "Judul Posts Kedua",
            "slug"=> "judul-post-kedua",
            "author" => "Orang kedua",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Distinctio ducimus unde ullam deserunt nobis molestiae modi quos necessitatibus laboriosam et. 
            Non doloribus nihil ea aspernatur totam ipsum eius. In, incidunt."
        ]
    ];

    public static function all() {
        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        $posts = static::all();
        // $post = [];
        // foreach($posts as $p ) {
        //     if($p["slug"]===$slug) {
        //         $post=$p;
        //     }
        // }

        return $posts->firstWhere('slug',$slug);
    }
}