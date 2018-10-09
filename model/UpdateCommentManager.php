<?php

namespace Blog\model;

require_once("model/Manager.php");

class UpdateCommentManager extends Manager
{
    public function getComment($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT post_id, article_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ?');
        $req->execute(array($postId));
        $comment = $req->fetch();

        return $comment;
    }

    public function updatedComment($postId, $comment)
    {
        $db = $this->dbConnect();
        $updatedComment = $db->prepare('UPDATE comments SET comment=? WHERE post_id=?');
        $affectedLines = $updatedComment->execute(array($comment, $postId));

        return $affectedLines;
    }

}