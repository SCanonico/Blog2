<?php

namespace Blog\model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT article_id, article_title, article_content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM blog ORDER BY creation_date DESC LIMIT 0, 10');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT article_id, article_title, article_content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM blog WHERE article_id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}