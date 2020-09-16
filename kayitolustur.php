<?php include("header.php") ?>
	<h3><strong> Ögrenci Kayıt</strong></h3>
<?php
if(isset($_POST["btnKullaniciEkle"])){	

$ogrenci_ad		= $_POST["ogrenci_ad"];	
$ogrenci_soyad 	= $_POST["ogrenci_soyad"];	
$veli_ad		= $_POST["veli_ad"];	
$veli_soyad		= $_POST["veli_soyad"];	
$veli_tel 		= $_POST["veli_tel"];	
$veli_mail 		= $_POST["veli_mail"];	
$veli_tc 		= $_POST["veli_tc"];
$tarih 			= date("Y-m-d H:i:s");		
$sorguUrunEkle = "insert into ogrencibilgileri 
			(ogrenci_ad, ogrenci_soyad, veli_ad, veli_soyad, veli_tel, veli_mail, veli_tc, tarih)
	values ('$ogrenci_ad', '$ogrenci_soyad', '$veli_ad', '$veli_soyad', '$veli_tel', '$veli_mail', $veli_tc, '$tarih')";
	if( mysqli_query($baglanti, $sorguUrunEkle) ) {
				echo '<div style="color:green;">Kayıt başarılı</div>';
			}
			else {
			 die(mysqli_error($baglanti));
			}
			
}
		?>
		<div class="col">
<form class="ust15bosluk" action="" method="POST">
	<div class="form-group">
		<input name="ogrenci_ad" type="text" placeholder="Öğrenci Adı yazınız" class="form-control" value="">
	</div>
	<div class="form-group">
		<input name="ogrenci_soyad" type="text" placeholder="Öğrenci Soyadını yazınız" class="form-control" value="">
	</div>
	<div class="form-group">
		<input name="veli_ad" type="text" placeholder="Veli Adı yazınız" class="form-control" value="">
	</div>
	<div class="form-group">
		<input name="veli_soyad" type="text" placeholder="Veli Soyadını yazınız" class="form-control" value="">
	</div>
		<div class="form-group">
		<input name="veli_tel" type="text" placeholder="Veli Telefon Numarası yazınız" class="form-control" value="">
	</div>
		<div class="form-group">
		<input name="veli_mail" type="text" placeholder="Veli E-Posta Adresi yazınız" class="form-control" value="">
	</div>
		<div class="form-group">
		<input name="veli_tc" type="text" placeholder="Veli T.C Kimlik No yazınız" class="form-control" value="">
	</div>
	<button name="btnKullaniciEkle" type="submit" class="btn btn-primary"><strong>Kullanıcı Ekle</strong></button>
</form>
<table class="table ust15bosluk">
  <thead class="thead-dark">
    <tr>
      <th><strong>Ogrenci Adi</strong></th>
      <th><strong>Ogrenci Soyadi</strong></th>
      <th><strong>Veli Adi</strong></th>
	  <th><strong>Veli Soyadi</strong></th>
	  <th><strong>Veli Telefon</strong></th>
	  <th><strong>Veli E-posta</strong></th>
	  <th><strong>Veli Tc-Kimlik</strong></th>
	  <th><strong>Kayıt Tarihi</strong></th>
    </tr>
  </thead>
  <tbody>
  
  <?php
	$sorguOgrenci = mysqli_query($baglanti, "select * from ogrencibilgileri");
									
	while($diziOgrenci = mysqli_fetch_array($sorguOgrenci)) { ?>
	
		<tr>
		  <td><strong><?= $diziOgrenci["ogrenci_ad"] ?></strong></td>
		  <td><strong><?= $diziOgrenci["ogrenci_soyad"] ?></strong></td>
		  <td><strong><?= $diziOgrenci["veli_ad"] ?></strong></td>
		  <td><strong><?= $diziOgrenci["veli_soyad"] ?></strong></td>
		  <td><strong><?= $diziOgrenci["veli_tel"] ?></strong></td>
		  <td><strong><?= $diziOgrenci["veli_mail"] ?></strong></td>
		  <td><strong><?= $diziOgrenci["veli_tc"] ?></strong></td>
		  <td><strong><?= $diziOgrenci["tarih"] ?></strong></td>
		</tr>
		
	<?php } ?>
	
  </tbody>
</table>