

<?php $__env->startSection('title', '| NBA'); ?>

<?php $__env->startSection('style'); ?>
<link rel='stylesheet' href="<?php echo e(asset('css/home.css')); ?>">
<?php $__env->stopSection(); ?>


<!-- Che fare con la parte php? Mettere nel controller? -->
		<?php

			// API REST DA PHP
			$curl = curl_init();

			curl_setopt_array($curl, [
				CURLOPT_URL => "https://nba-teams2.p.rapidapi.com/NBA",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"X-RapidAPI-Host: nba-teams2.p.rapidapi.com",
					"X-RapidAPI-Key: 4bfcc78970mshce645f492d886cdp172b44jsn1426c44f320c"
				],
			]);

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				echo "<h1>Elenco delle squadre attualmente presenti in NBA</h1>";
				echo $response;
			}

		?>


<?php $__env->startSection('content'); ?>
		<!-- API REST DA JS -->
		<form id="search_player">
		<h2>Scrivi nome e cognome di un giocatore NBA per leggere i suoi dati</h2>
		<div>
			<input type="text" id="player"/>
			<input type="submit" value="Cerca">
			<div id="players-view"></div>
		</div>
		</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.skeleton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CoseMie\xampp\htdocs\Programmi\AR_SPORT\resources\views/nba.blade.php ENDPATH**/ ?>