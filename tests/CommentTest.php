<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;

class CommentTest extends TestCase
{
    public function testCreateACommentForAPost()
    {
        $this->post('/api/blogs', ['name' => 'TestBlog']);
        $this->post('/api/blogs/1/post', ['title' => 'Title', 'content' => 'Content']);

        $this->post('/api/posts/1/comment', ['content' => 'Comment'])
            ->seeStatusCode(200)
            ->seeJson([
                'id' => 1,
                'content' => 'Comment'
            ]);
    }

    public function testCreateAReplyForAComment()
    {
        $this->post('/api/comments/1/comment', ['content' => 'Reply'])
            ->seeStatusCode(200)
            ->seeJson([
                'id' => 2,
                'content' => 'Reply'
            ]);
    }

    public function testGetAllComments()
    {
        $this->get('/api/comments')->seeStatusCode(200)->seeJson([
            'id' => 2
        ]);
    }

    public function testGetAComments()
    {
        $this->get('/api/comments/1')->seeStatusCode(200)->seeJson([
            'id' => 1,
            'content' => 'Comment'
        ]);
    }

    public function testUpdateAComments()
    {
        $this->patch('/api/comments/1', ['field' => 'content', 'value' => 'EditedComment'])
            ->seeStatusCode(200)
            ->seeJson([
                'id' => 1,
                'content' => 'EditedComment'
            ]);
    }

    public function testGetCommentsForAPost()
    {
        $this->get('/api/posts/1/comments')->seeStatusCode(200)->seeJson([
           'id' => 1,
            'content' => 'EditedComment'
        ]);
    }

    public function testDeleteAComment()
    {
        $this->delete('/api/comments/1')->seeStatusCode(200);
    }

    public function testGetCommentThatDoesNotExist()
    {
        $this->get('/api/comments/3')->seeStatusCode(404);
    }

    public function testUpdateACommentThatDoesNotExist()
    {
        $this->patch('/api/comments/3', ['field' => 'title', 'value' => 'Fail'])->seeStatusCode(404);
    }

    public function testDeleteACommentThatDoesNotExist()
    {
        $this->delete('/api/posts/3')->seeStatusCode(404);

        Artisan::call('migrate:reset');
        Artisan::call('migrate');
    }
}
