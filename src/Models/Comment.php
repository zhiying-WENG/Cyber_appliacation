<?php

namespace App\Models;

use PDO;
class Comment extends AbstractModel{

   
    public function get(int $id): array|bool
    {
        $query = $this->pdo->prepare('SELECT * FROM comment WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getByFile(int $fileId): array|bool
    {
        $query = $this->pdo->prepare('SELECT comment.*, user.firstname, user.lastname FROM comment INNER JOIN user ON comment.user_id = user.id WHERE comment.file_id = :fileId ORDER BY comment.created_at DESC;
        '); /*SELECT * FROM comment WHERE file_id = :fileId ORDER BY created_at DESC*/
        $query->bindParam(':fileId', $fileId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addComment($fileId, $userId, $content){
        $query = $this->pdo->prepare('INSERT INTO comment (file_id, user_id, content, created_at) VALUES (:fileId, :userId, :content, NOW())');
        $query->bindParam(':fileId', $fileId, PDO::PARAM_INT);
        $query->bindParam(':userId', $userId, PDO::PARAM_INT);
        $query->bindParam(':content', $content, PDO::PARAM_STR);

        return  $query->execute();
    }

    public function delete(int $id): bool
    {
        $query = $this->pdo->prepare('DELETE FROM comment WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }

    public function deleteByFile(int $fileId): bool
    {
        $query = $this->pdo->prepare('DELETE FROM comment WHERE file_id = :fileId');
        $query->bindParam(':fileId', $fileId, PDO::PARAM_INT);
        return $query->execute();
    }

}