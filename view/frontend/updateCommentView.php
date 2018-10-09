<?php $title = 'Mon blog modifier un commentaire'; ?>

<?php ob_start();?>


        <div id="conteneur">

          <div id="blocchat">

            <h1>Mon super blog !</h1>
            <p class="titremessage"><a href="index.php">Retour à la liste des articles</a></p>

                <div id="zonesaisie">
                   
                    <p class="titremessage">Commentaire que vous souhaitez modifier</p>

                    <p><strong><?= htmlspecialchars($comment['author']); ?></strong> </p>
                    <p class="date_message">le <?php echo $comment['comment_date_fr']; ?></p>
                    <p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>
                  
                </div>       
             
                <form action="index.php?action=updatedComment&amp;id=<?= $comment['post_id'] ?>" method="post">
                    <div>
                        <p class="titremessage">Modifier ce commentaire</p>
                    </div>
                    <div>
                        <label for="comment">Commentaire</label><br />
                        <textarea id="comment" name="comment"></textarea>
                    </div>
                    <div>
                    <input class="bouton_modif" type="submit" value="Envoyer" />
                    </div>
                </form>
                
         </div>
        
        <?php $content= ob_get_clean(); ?>
     </div>
         <?php require ('view/frontend/template.php'); ?>

