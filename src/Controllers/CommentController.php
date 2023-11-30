<?php

namespace App\Controllers;

use App\Services\Csrf;
use App\Models\Comment;
use App\Models\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;




class CommentController extends AbstractController
{
    private Comment $commentModel;

    public function __construct()
    {
        parent::__construct();
        $this->commentModel = new Comment();
    }

    public function addComment(string $token): Response
    {

        $userId = $_SESSION['user']['id'];
        $content = $this->request->get('comment');

        $fileModel = new File();
        $file = $fileModel->getByToken($token);

        if (!$file || !$file['isPublic']) {
            return $this->error('File not found');
        }


        if ($this->commentModel->addComment($file['id'], $userId, $content)) {
            // Redirect user

            $response = new RedirectResponse('/dl/' . $token);
            return $response->send();
        } else {
            return $this->error("Error adding the comment.");
        }

    }

    public function deleteComment(int $commentId): Response
    {
        if (!(new Csrf())->check($this->request->get('csrf'))) {
            return $this->error('Invalid CSRF token', 400);
        }

        $comment = $this->commentModel->get($commentId);

        if (!$comment) {
            return $this->error('Comment not found');
        }
        $fileId = $comment['file_id'];

        // check if user is the owner of the file 
      
        if ($_SESSION['user']['id'] !== $comment['user_id']) {
            return $this->error('You do not have permission to delete this comment');
        }

        if ($this->commentModel->delete($commentId)) {
            $response = new RedirectResponse('/file/' . $fileId);
            return $response->send();
        } else {
            return $this->error("Error deleting the comment.");
        }

    }
}