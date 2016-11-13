<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;

class BlogTest extends TestCase
{
    public function testCreateABlog()
    {
        $this->post('/api/blogs', ['name' => 'TestBlog'])->seeStatusCode(200)->seeJson([
            'id' => 1,
            'name' => 'TestBlog'
        ]);
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testGetAllBlogs()
    {
        $this->get('/api/blogs')->seeStatusCode(200)->seeJson([
            'id' => 1,
            'name' => 'TestBlog'
        ]);
    }

    public function testGetABlog()
    {
        $this->get('/api/blogs/1')->seeStatusCode(200)->seeJson([
            'id' => 1,
            'name' => 'TestBlog'
        ]);
    }

    public function testUpdateABlog()
    {
        $this->patch('/api/blogs/1', ['field' => 'name', 'value' => 'EditedBlog'])
            ->seeStatusCode(200)
            ->seeJson([
                'id' => 1,
                'name' => 'EditedBlog'
            ]);
    }

    public function testDeleteABlog()
    {
        $this->delete('/api/blogs/1')->seeStatusCode(200);
    }

    public function testFailCreatingABlog()
    {
        $this->post('/api/blog', ['name' => null])->seeStatusCode(404);
    }

    public function testGetBlogThatDoesNotExist()
    {
        $this->get('/api/blogs/2')->seeStatusCode(404);
    }

    public function testUpdateABlogThatDoesNotExist()
    {
        $this->patch('/api/blogs/2', ['field' => 'name', 'value' => 'Fail'])->seeStatusCode(404);
    }

    public function testDeleteABlogThatDoesNotExist()
    {
        $this->delete('/api/blogs/2')->seeStatusCode(404);

        Artisan::call('migrate:reset');
        Artisan::call('migrate');
    }
}
