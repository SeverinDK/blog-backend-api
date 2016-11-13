<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 10-11-2016
 * Time: 19:11
 */

namespace App\Comment;

class CommentService
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * CommentService constructor.
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param int $id
     * @param string $content
     * @return mixed
     */
    public function createCommentReply(int $id, string $content)
    {
        $comment = $this->commentRepository->get($id);

        if($comment) {
            return $comment->comments()->create([
                'content' => $content,
                'user_id' => 1
            ]);
        }

        return false;
    }

    /**
     * @param $id
     * @param $field
     * @param $value
     * @return bool|mixed
     */
    public function update($id, $field, $value)
    {
        $comment = $this->commentRepository->get($id);

        if($comment[$field] != null) {
            $comment[$field] = $value;
            return $this->commentRepository->save($comment);
        }

        return false;
    }

    public function delete($id)
    {
        $comment = $this->commentRepository->get($id);

        if($comment) {
            if($this->commentRepository->delete($id)) {
                return true;
            }
        }

        return false;
    }
}