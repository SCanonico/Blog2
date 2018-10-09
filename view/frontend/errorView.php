<?php 

namespace Blog\view;

$title = 'Erreur'; ?>

<?php ob_start();?>



		<div id="conteneur">
			<div id= "blocchat">
				<div >
					<p>
						<h1>Erreur</h1>
					</p>	
				</div>
				
				<div id="derniers_messages">
					<p class="titremessage">Erreur : <?= $errorMessage ?></p>

				
				<?php $content= ob_get_clean(); ?>
			</div>
				<?php require ('view/frontend/template.php'); ?>
	