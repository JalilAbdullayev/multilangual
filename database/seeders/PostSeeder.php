<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTranslate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Post::create();
        PostTranslate::create([
            'post_id' => Post::first()->id,
            'lang' => 'en',
            'title' => 'Lorem ipsum',
            'slug' => Str::slug('Lorem ipsum'),
            'description' => 'Lorem ipsum dolor sit amet'
        ]);
        PostTranslate::create([
            'post_id' => Post::first()->id,
            'lang' => 'ru',
            'title' => 'Lorem ipsumуыпуып',
            'slug' => Str::slug('Lorem ipsumуыпуып'),
            'description' => 'Lorem ipsum dolor sit amet'
        ]);
        PostTranslate::create([
            'post_id' => Post::first()->id,
            'lang' => 'az',
            'title' => 'Lorem ipsumıəöş',
            'slug' => Str::slug('Lorem ipsumıəöş'),
            'description' => 'Lorem ipsum dolor sit amet'
        ]);
    }
}
