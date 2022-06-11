<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title><?= $title; ?></title>
</head>
<body>
<?= $this->include('template/header'); ?>
<h1><?= $title; ?></h1>
<hr>
<p><?= $content; ?></p>
<br>
<div class="row">
                <img src="profil.JPG" title="Gunawan" alt="Gunawan" class="image" width="150" style="float: left; border: 2px solid black;">
                <br>
                <center><h1>Gunawan</h1></center>
                <center><p>Nama saya Gunawan,mahasiswa Teknik Informatika di <strong>Universitas Pelita Bangsa</strong> 
                Kelas : T120B1.
                Sekarang Tinggal Di Cikarang,Bekasi.
                </p></center>
            </div>
<?= $this->include('template/footer'); ?>
</body>
</html>