<?php ob_start(); ?>
<?php include("header.php") ?>
<h3> Ögrenci Taksit Ödeme</h3>
<?php 
error_reporting(0);


if($_GET["sil"]){	
$id = $_GET["sil"];
$sorguOgrenciSil = "delete from ogrencibilgileri where id='$id'";
$sorguTaksitSil = "delete from taksitler where ogrenci_id='$id'";
	
		if( mysqli_query($baglanti, $sorguTaksitSil) ) {
			echo '<div style="color:green;">Taksit Silme başarılı</div>';
			header("Refresh:1 ogrenciler.php");
			
			
		}
		else {
			echo '<div style="color:red;">Hata oluştu</div>';
		
	}
	if( mysqli_query($baglanti, $sorguOgrenciSil) ) {
			echo '<div style="color:green;">Öğrenci Silme başarılı</div>';
			
		}
		else {
			echo '<div style="color:red;">Hata oluştu</div>';
		
	}
}
if($_GET["guncelle"]){
	$id = $_GET["guncelle"];
	
if(isset($_POST["btnKullaniciEkle"])){	

$ogrenci_ad		= $_POST["ogrenci_ad"];	
$ogrenci_soyad 	= $_POST["ogrenci_soyad"];	
$veli_ad		= $_POST["veli_ad"];	
$veli_soyad		= $_POST["veli_soyad"];	
$veli_tel 		= $_POST["veli_tel"];	
$veli_mail 		= $_POST["veli_mail"];	
$veli_tc 		= $_POST["veli_tc"];
$tarih 			= date("Y-m-d H:i:s");		
$sorguUrunGuncelle = "update ogrencibilgileri 
			set ogrenci_ad='$ogrenci_ad', ogrenci_soyad='$ogrenci_soyad', veli_ad='$veli_ad',
				veli_soyad='$veli_soyad', veli_tel='$veli_tel', veli_mail='$veli_mail', veli_tc='$veli_tc', tarih='$tarih'
				where id='$id'";

	
			if( mysqli_query($baglanti, $sorguUrunGuncelle) ) {
				echo '<div style="color:green;">Guncelleme başarılı</div>';
				header("Refresh:1 ogrenciler.php");
			}
			else {
				 die(mysqli_error($baglanti));
				echo '<div style="color:red;">Hata oluştu</div>';
			}
			
}
	$sorguKayitSec = mysqli_query($baglanti, "select * from ogrencibilgileri where id='$id'");
			$diziKayitSec = mysqli_fetch_array($sorguKayitSec);		
?>
<div class="col">
<form class="ust15bosluk" action="" method="POST">
	<div class="form-group">
		<input name="ogrenci_ad" type="text"  class="form-control" value="<?php if(isset($diziKayitSec)) echo $diziKayitSec["ogrenci_ad"]; else if(isset($_POST["ogrenci_ad"])) echo $_POST["ogrenci_ad"]; ?>">
	</div>
	<div class="form-group">
		<input name="ogrenci_soyad" type="text"  class="form-control" value="<?php if(isset($diziKayitSec)) echo $diziKayitSec["ogrenci_soyad"]; else if(isset($_POST["ogrenci_soyad"])) echo $_POST["ogrenci_soyad"]; ?>">
	</div>
	<div class="form-group">
		<input name="veli_ad" type="text"  class="form-control" value="<?php if(isset($diziKayitSec)) echo $diziKayitSec["veli_ad"]; else if(isset($_POST["veli_ad"])) echo $_POST["veli_ad"]; ?>">
	</div>
	<div class="form-group">
		<input name="veli_soyad" type="text"  class="form-control" value="<?php if(isset($diziKayitSec)) echo $diziKayitSec["veli_soyad"]; else if(isset($_POST["veli_soyad"])) echo $_POST["veli_soyad"]; ?>">
	</div>
		<div class="form-group">
		<input name="veli_tel" type="text"  class="form-control" value="<?php if(isset($diziKayitSec)) echo $diziKayitSec["veli_tel"]; else if(isset($_POST["veli_tel"])) echo $_POST["veli_tel"]; ?>">
	</div>
		<div class="form-group">
		<input name="veli_mail" type="text"  class="form-control" value="<?php if(isset($diziKayitSec)) echo $diziKayitSec["veli_mail"]; else if(isset($_POST["veli_mail"])) echo $_POST["veli_mail"]; ?>">
	</div>
		<div class="form-group">
		<input name="veli_tc" type="text" class="form-control" value="<?php if(isset($diziKayitSec)) echo $diziKayitSec["veli_tc"]; else if(isset($_POST["veli_tc"])) echo $_POST["veli_tc"]; ?>">
	</div>
	<button name="btnKullaniciEkle" type="submit" class="btn btn-primary">Kullanıcı Güncelle</button>
</form>

<?php } ?>		
<table class="table ust15bosluk">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th><strong>Öğrenci Adı Soyadı</strong></th>
      <th><strong>Veli Adı Soyadı</strong></th>
      <th><strong>Veli Telefon No</strong></th>
	  <th><strong>Kayıt Tarihi</strong></th>
	  <th><strong>Ödenmemiş Taksitler</strong></th>
	  <th><strong>Ödenen Taksitler</strong></th>
	  <th><strong>Kalan Tutar</strong></th>
	  <th><strong>Ödenen Tutar</strong></th>
    </tr>
  </thead>
  <tbody>
  
<?php $sorguliste = mysqli_query($baglanti, "select * from ogrencibilgileri"); while($diziliste = mysqli_fetch_array($sorguliste)) {  ?>
		<tr>
		  <td>
		  <a href="?sil=<?= $diziliste["id"] ?>"><strong>Sil</strong></a>
		  |
		  <a href="?guncelle=<?= $diziliste["id"] ?>"><strong>Güncelle</strong></a>

		  <a href="taksitodeme.php?ode=<?= $diziliste["id"] ?>"><strong>Taksit Öde</strong></a>
		  </td>
		  <td><strong><?= $diziliste["ogrenci_ad"] ?> <?= $diziliste["ogrenci_soyad"] ?></strong></td>
		  <td><strong><?= $diziliste["veli_ad"] ?> <?= $diziliste["veli_soyad"] ?></strong></td>
		  <td><strong><?= $diziliste["veli_tel"] ?></strong></td>
		  <td><strong><?= $diziliste["tarih"] ?></strong></td>
		  <td><strong><?php $oid = $diziliste["id"]; $s1 = mysqli_query($baglanti, "SELECT * FROM taksitler where durum='0' AND ogrenci_id='$oid'"); $t1= mysqli_num_rows($s1); if (empty($t1)){echo "Yok";} else { echo "$t1 taksit";} ?></strong></td>
		  <td><strong><?php $s1 = mysqli_query($baglanti, "SELECT * FROM taksitler where durum='1' AND ogrenci_id='$oid'"); $t1= mysqli_num_rows($s1); if (empty($t1)){echo "Yok";} else { echo "$t1 taksit";} ?></strong></td>
		 <td><strong><?php $query = mysqli_query($baglanti, "SELECT SUM(taksit_tutar) FROM taksitler where durum='0' AND ogrenci_id='$oid'");  $row = mysqli_fetch_array($query); echo $row['SUM(taksit_tutar)']; ?> ₺</strong></td>
		 <td><strong><?php $query = mysqli_query($baglanti, "SELECT SUM(taksit_tutar) FROM taksitler where durum='1' AND ogrenci_id='$oid'");  $row = mysqli_fetch_array($query); echo $row['SUM(taksit_tutar)']; ?> ₺</strong></td>

		</tr>
	
<?php } ?>		

  </tbody>
</table>