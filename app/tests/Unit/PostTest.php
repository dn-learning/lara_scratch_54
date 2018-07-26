<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Archives should be visible.
     *
     * @return void
     */
    public function testArchivesShoudBeVisibleTest()
    {
        // given I have to posts in the DB
        $firstPost = factory(Post::class)->create();
        $secondPost = factory(Post::class)->create([
            'created_at' => Carbon::now()->subMonth()
        ]);

        // when I fetch archives
        $posts = Post::archives();

        // checking output to prepare test
        // dd($posts->toArray());                                   // using array to get quick info as it is Collection
        // dd(Carbon::Parse($firstPost->created_at)->format('F Y'));
        // dd($firstPost->created_at->format('F Y'));
        // dd([Carbon::Parse($firstPost->created_at)->format('F Y') => []]);

        // then
        $this->assertCount(2, $posts);
        $this->assertEquals([
            $firstPost->created_at->format('F Y') => [
                0 => [
                    "id" => $firstPost->id,
                    "created_at" => $firstPost->created_at->format('Y-m-d H:i:s')
                ]
            ],
            $secondPost->created_at->format('F Y') => [
                0 => [
                    "id" => $secondPost->id,
                    "created_at" => $secondPost->created_at->format('Y-m-d H:i:s')
                ]
            ]
        ], $posts->toArray());
    }
}
