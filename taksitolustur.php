<?php include("header.php") ?>
<h3> Ögrenci Taksit Oluştur</h3>
<?php

if(isset($_POST["save"])){	
$ogrenci_id = $_POST['ogrenci_id'];	
$odenecek_ucret	= $_POST['odenecek_ucret'];	
$taksit_sayisi 	= $_POST['taksit_sayisi'];	
$bugun = date('d-m-Y');		
$taksit_tutari = $odenecek_ucret / $taksit_sayisi;
echo '
<table class="table ust15bosluk">
  <thead class="thead-light">
    <tr>
      <th>Taksit No</th>
      <th>Taksit Tutarı</th>
      <th>Ödeme Tarihi</th>
    </tr>
  </thead>
  <tbody>

<h3>
<center>
Taksit Tutarı: '.$taksit_tutari.' -
Taksit Sayısı : '.$taksit_sayisi.' -
Bugün: '.$bugun.'
</center>
</h3>
';
$date = date("d-m-Y");
for($sayi = 1; $sayi < 100; $sayi++) {

	

$date = strtotime(date("d-m-Y", strtotime($date)) . " +1 month");

 $date = date("d-m-Y",$date);


   echo "<tr><td>$sayi.Taksit</td><td>$taksit_tutari ₺ </td><td>$date</td></tr>";
   
   $sorguUrunEkle = "insert into taksitler 
			(ogrenci_id, taksit_sira, taksit_tutar, taksit_tarih, durum)
	values ('$ogrenci_id', '$sayi', $taksit_tutari, '$date', '0')";
	
	if( mysqli_query($baglanti, $sorguUrunEkle) ) {
			}
			else {
				echo '<div style="color:red;">Hata oluştu</div>';
			}
   if($sayi == $taksit_sayisi) {
      break;
 


}}} else { ?>
	<div class="col">
<form class="ust15bosluk" action="" method="POST">
	<div class="form-group">
		<label><strong>Öğrenci Seçiniz</strong></label><select name="ogrenci_id" class="form-control" ><?php $sorguliste = mysqli_query($baglanti, "select * from ogrencibilgileri"); while($diziliste = mysqli_fetch_array($sorguliste)) {  ?><option value="<?= $diziliste["id"] ?>"><?= $diziliste["ogrenci_ad"] ?> <?= $diziliste["ogrenci_soyad"] ?></option><?php } ?></select>
	</div>
	<div class="form-group">
		<label><strong>Ödenecek Ücret</strong></label><input type="text"  name="odenecek_ucret"  class="form-control" required>
	</div>
	<div class="form-group">
		<label><strong>Taksit Sayısı</strong></label><input class="form-control" type="number" min="1" max="36" name="taksit_sayisi" required>
	</div>
	<button name="save" type="submit" class="btn btn-primary"><strong>Taksitlendirme Oluştur</strong></button>
</form>
<?php  }?>