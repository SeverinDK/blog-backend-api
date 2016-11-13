<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;

class PostTest extends TestCase
{
    public function testCreateAPostForABlog()
    {
        $this->post('/api/blogs', ['name' => 'TestBlog']);

        $this->post('/api/blogs/1/post', ['title' => 'Title', 'content' => 'Content'])
            ->seeStatusCode(200)
            ->seeJson([
                'id' => 1,
                'title' => 'Title',
                'content' => 'Content'
            ]);
    }

    public function testGetAllPostsForABlog()
    {
        $this->get('/api/blogs/1/posts')->seeStatusCode(200)->seeJson([
            'id' => 1,
            'title' => 'Title',
            'content' => 'Content'
        ]);
    }

    public function testGetAPost()
    {
        $this->get('/api/posts/1')->seeStatusCode(200)->seeJson([
            'id' => 1,
            'title' => 'Title',
            'content' => 'Content'
        ]);
    }

    public function testUpdateAPost()
    {
        $this->patch('/api/posts/1', ['field' => 'title', 'value' => 'EditedTitle'])
            ->seeStatusCode(200)
            ->seeJson([
                'id' => 1,
                'title' => 'EditedTitle'
            ]);
    }

    public function testDeleteAPost()
    {
        $this->delete('/api/posts/1')->seeStatusCode(200);
    }

    public function testFailCreatingAPost()
    {
        $this->post('/api/blogs/2/post', ['title' => 'Title', 'content' => 'Content'])->seeStatusCode(404);
    }

    public function testGetPostThatDoesNotExist()
    {
        $this->get('/api/posts/2')->seeStatusCode(404);
    }

    public function testUpdateAPostThatDoesNotExist()
    {
        $this->patch('/api/posts/2', ['field' => 'title', 'value' => 'Fail'])->seeStatusCode(404);
    }

    public function testDeleteAPostThatDoesNotExist()
    {
        $this->delete('/api/posts/2')->seeStatusCode(404);

        Artisan::call('migrate:reset');
        Artisan::call('migrate');
    }
}
