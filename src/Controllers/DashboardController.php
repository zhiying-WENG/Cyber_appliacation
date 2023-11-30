<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\File;
use App\Services\Csrf;
use App\Services\Message;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends AbstractController
{
    public function index(): Response
    {
        $file = new File();
        $files = $file->getByUser((int)$_SESSION['user']['id']);
        $usedSize = $file->getUsedSize((int)$_SESSION['user']['id']);
        $maxFileSize = $this->config['max_file_size'];
        $maxTotalSize = $this->config['max_total_size'];
        $quota = $maxTotalSize - $usedSize;

        $response = new Response(
            $this->render('Dashboard/index', [
                "name" => $_SESSION['user']['firstname'],
                "files" => $files,
                "messages" => (new Message())->getMessages(),
                "csrf_delete" => (new Csrf())->generate(),
                "csrf_upload" => (new Csrf())->generate(),
                "quota" => $quota / (1024 * 1024),
                "used_size" => $usedSize / (1024 * 1024),
                "max_file_size" => $maxFileSize
            ])
        );

        return $response->send();
    }

    public function show($id): Response
    {
        $fileModel = new File();
        $file = $fileModel->get($id);
  
        if (!$file || !file_exists($file['path']) || $file['user_id'] !== $_SESSION['user']['id']) {
            return $this->error('File not found');
        }
        
        $commentModel = new Comment();
        
        $comments = $commentModel->getByFile($file['id']);
        
        $response = new Response(
            $this->render('Dashboard/show', [
                "file" => $file,
                "base_url" => $this->config['url'],
                "csrf" => (new Csrf())->generate(),
                'comments' => $comments,
            ])
        );

        return $response->send();
    }

}