<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UpdateCommentManager.php');

function listPosts()
{
    $postManager = new Blog\model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new Blog\model\PostManager();
    $commentManager = new \Blog\model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);


    require('view/frontend/postView.php');
}

function modifyComment()
{
    $updateComment = new \Blog\model\UpdateCommentManager();

    $comment = $updateComment->getComment($_GET['id']);

    require('view/frontend/updateCommentView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new Blog\model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

    function updateComment($postId, $comment)
    {
        $updateCommentManager = new Blog\model\UpdateCommentManager();

        $affectedLines = $updateCommentManager->updatedComment($_GET['id'], $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible de modifier le commentaire !');
        } else {
            header('Location: index.php?action=listPosts');
        }
    }
