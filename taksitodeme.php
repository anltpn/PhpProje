<?php ob_start(); ?>
<?php include("header.php") ?>
<h3>Taksit Ödeme</h3>
<?php
error_reporting(0); //Get işlemlerinin gizlenmesi için..

if($_GET["ode"]) {
$ogrenci_id = $_GET['ode'];	
?>
<table class="table ust15bosluk">
  <thead class="thead-dark">
    <tr>
      <th><strong>ID</strong></th>
      <th><strong>Öğrenci Adı</strong></th>
      <th><strong>Taksit Sırası</strong></th>
      <th><strong>Taksit Tutarı</strong></th>
	  <th><strong>Taksit Tarihi</strong></th>
	  <th><strong>Durum</strong></th>
    </tr>
  </thead>
  <tbody>
<?php 
$sorguliste = mysqli_query($baglanti, "select * from taksitler where ogrenci_id='$ogrenci_id'"); while($diziKayitSec = mysqli_fetch_array($sorguliste)) {
?>
<tr>
<td><strong><?php echo $diziKayitSec["id"]; ?></strong></td>
 <td><strong><?php $icsorgu = mysqli_query($baglanti, "select * from ogrencibilgileri where id='$ogrenci_id'"); while($icliste = mysqli_fetch_array($icsorgu)) { echo ''.$icliste["ogrenci_ad"].' '.$icliste["ogrenci_soyad"].''; } ?></td>
 <td><strong><?php echo $diziKayitSec["taksit_sira"]; ?>.Taksit</strong> </td>
 <td><strong><?php echo $diziKayitSec["taksit_tutar"]; ?> </strong></td>
 <td><strong><?php echo $diziKayitSec["taksit_tarih"]; ?> </strong></td>
 <td><strong><?php if ($diziKayitSec["durum"] == 0) { echo 'Ödenmedi - <a href="?odeme='.$diziKayitSec["id"].'&id='.$ogrenci_id.'">Taksiti Öde</a>';} else {echo 'Ödendi';} ?> <strong></td>


<?php 
}}


if($_GET["odeme"])
{
$id = $_GET["odeme"];
$oid = $_GET["id"];
$date = date('d-m-Y');		
$sorguUrunGuncelle = "update taksitler set durum='1', odenme_tarihi='$date' where id='$id'";
	if( mysqli_query($baglanti, $sorguUrunGuncelle) ) {
				echo '<div style="color:green;">Ödeme başarılı</div>';
				header("Refresh:10 ogrenciler.php");
			}
			else {
				echo '<div style="color:red;">Hata oluştu</div>';
			}
			$sorguliste = mysqli_query($baglanti, "select * from taksitler where id='$id' and ogrenci_id='$oid'"); while($diziKayitSec = mysqli_fetch_array($sorguliste)) {

?>
<h2>Taksiti ödediğiniz için teşekkür ederiz.</h2>
<li><strong>Ödenen Taksit Tutarı:</strong>	<b><?php echo $diziKayitSec["taksit_tutar"]; ?> ₺</b></li>
<li><strong>Kalan Taksit Sayısı:</strong>	<b><?php $s1 = mysqli_query($baglanti, "SELECT * FROM taksitler where durum='0' AND ogrenci_id='$oid'"); $t1= mysqli_num_rows($s1); if (empty($t1)){echo "Yok";} else { echo "$t1 taksit";} ?></b></li> 
<li><strong>Kalan Borç:</strong> 	<b><?php $query = mysqli_query($baglanti, "SELECT SUM(taksit_tutar) FROM taksitler where durum='0' AND ogrenci_id='$oid'");  $row = mysqli_fetch_array($query); echo $row['SUM(taksit_tutar)']; ?> ₺</b></li> 
<li><strong>Ödeme Yapılan Tarih:</strong>	<b><?php echo $diziKayitSec["odenme_tarihi"]; ?></b></li>
<br>
<br>
<div style="color:blue;"><strong>10 Saniye Sonra Ogrenciler Sayfasına Yönlendirilicesiniz !!</strong></div>

<?php }} ?>			


