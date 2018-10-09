<?php $title = 'Mon blog'; ?>

<?php ob_start();?>


        <div id="conteneur">

          <div id="blocchat">

            <h1>Mon super blog !</h1>
            <p class="titremessage"><a href="index.php">Retour à la liste des articles</a></p>

                <div id="derniers_messages">
                    <p class="titremessage">
                        <?= htmlspecialchars($post['article_title']); ?>
                        </p>
                     <p class="date_message">publié le <?= $post['creation_date_fr']; ?>
                    </p>
                    
                    <p class="reponse">
                    <?= nl2br(htmlspecialchars($post['article_content']));
                    ?>
                    </p>
                </div>

                <div id="zonesaisie">


                    <p class="titremessage">Commentaires</p>

                    <?php
                    
                    while ($comment = $comments->fetch())
                    {
                    ?>

                    <p><strong><?= htmlspecialchars($comment['author']); ?></strong> </p>
                    <p class="date_message">le <?php echo $comment['comment_date_fr']; ?></p>
                    <p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>
                    <p>
                   <a href="index.php?action=modifyComment&amp;id=<?= $comment['post_id'] ?>"> <input class="bouton_modif" type="button" id="modif" name="modif" value="Modifier" /></a>
                    </p>


                    <?php
                    } 
                    ?>
                </div>       
             
                <form action="index.php?action=addComment&amp;id=<?= $post['article_id'] ?>" method="post">
                    <div>
                        <p class="titremessage">Ajouter un commentaire</p>
                        <label for="author">Pseudo</label><br />
                        <input type="text" id="author" name="author" />
                    </div>
                    <div>
                        <label for="comment">Commentaire</label><br />
                        <textarea id="comment" name="comment"></textarea>
                    </div>
                    <div>
                        <input type="submit" />
                    </div>
                </form>
                
         </div>
        
        <?php $content= ob_get_clean(); ?>
     </div>
         <?php require ('view/frontend/template.php'); ?>

