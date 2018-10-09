<?php 


$title = 'Mon blog'; ?>

<?php ob_start();?>



		<div id="conteneur">
			<div id= "blocchat">
				<div >
					<p>
						<h1>Blog</h1>
					</p>	
				</div>
				

<!---AFFICHAGE MESSAGE--->
				<div id="derniers_messages">
					<p class="titremessage">20 derniers articles</p>

				<?php
					while ($data = $posts->fetch())
					{
				echo '<p class="pseudonyme">' .htmlspecialchars($data['article_title']). '</p>
				<p class="date_message"> publié le '.htmlspecialchars($data['creation_date_fr']). ' </p>  
				<p class="reponse">'.htmlspecialchars($data['article_content']).'</p>' ;

				?>


					<p class="commentaire">
			    	<a href="index.php?action=post&amp;id=<?= $data['article_id'] ?>">Commentaires</a>
			    	</p> 
				<?php
					}

					$posts->closeCursor();
				?>
				<?php $content= ob_get_clean(); ?>
			</div>
				<?php require ('view/frontend/template.php'); ?>
	