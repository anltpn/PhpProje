<link rel="stylesheet" href="css/stil.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">	
<link rel="stylesheet" href="stil.css" />
<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<a class="navbar-brand" href="index.php"><strong>Ödev Evi Projesi - Anıl Can Tapan</strong></a>

			</nav>	
		</div>
		<title>Anıl Can Tapan - Final Ödevi</title>
		
		<?php
		$baglanti = mysqli_connect("localhost","root","","odevevproje"); 
		mysqli_set_charset($baglanti,"utf8");
		?>
		
<div class="container-fluid">
			<div class="row">
				<div class="col-3">	
							<div class="list-group ust15bosluk">
							  <a href="#" class="list-group-item list-group-item-action active"><strong>Menüler</strong></a>
							  <a href="kayitolustur.php" class="list-group-item list-group-item-warning"><strong>Öğrenci Kaydı</strong></a>
							  <a href="ogrenciler.php" class="list-group-item list-group-item-warning"><strong>Öğrenciler</strong></a>
							  <a href="taksitolustur.php" class="list-group-item list-group-item-warning"><strong>Öğrenci Taksit Oluşturma</strong></a>
							  </div>
							 </div>
				<div class="col">
				
				
				
				
				
				
				
				
				
				
				
		