# 11_Lab11Web

<Hr>

TUGAS PERTEMUAN 12<br>
PEMROGRAMAN WEB<br>
TEKNIK INFORMATIKA<br>
UNIVERSITAS PELITA BANGSA<br>

| NAMA  :| GUNAWAN |
| --- | --- |
| NIM   :| 312010191 |
| KELAS :| TI.20.B1 |
| DOSEN :| Agung Nugroho,S.Kom.,M.Kom |

<Hr>

# Pemrograman Web: PHP  Framework (Codeigniter)

<hr>

**Instruksi Praktikum**<br>
1. Persiapkan text editor misalnya VSCode.
2. Buat folder baru dengan nama **lab11_php_ci** pada docroot webserver **(htdocs)**
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.

**Langkah-langkah Praktikum**<br>
**Persiapan**<br>
Sebelum memulai menggunakan Framework Codeigniter, perlu dilakukan konfigurasi 
pada webserver. Beberapa ekstensi PHP perlu diaktifkan untuk kebutuhan 
pengembangan Codeigniter 4.
Berikut beberapa ekstensi yang perlu diaktifkan:
• php-json ekstension untuk bekerja dengan JSON;
• php-mysqlnd native driver untuk MySQL;
• php-xml ekstension untuk bekerja dengan XML;
• php-intl ekstensi untuk membuat aplikasi multibahasa;
• libcurl (opsional), jika ingin pakai Curl.<br>

Untuk mengaktifkan ekstentsi tersebut, melalu **XAMPP Control Panel**, pada bagian 
Apache **klik Config -> PHP.ini**
Untuk menjalankan MySQL Server dari menu XAMPP Contol.
![11_Lab11Web](Gambar/01.Gambar_Konfigurasi_PHP.jpg)

Gambar 01. Konfigurasi PHP

Pada bagian extention, hilangkan tanda ; (titik koma) pada ekstensi yang akan 
diaktifkan. Kemudian simpan kembali filenya dan restart Apache web server.

![11_Lab11Web](Gambar/02.Gambar_Ekstensi_PHP-1.jpg)
![11_Lab11Web](Gambar/02.Gambar_Ekstensi_PHP.jpg)

Gambar 02. Ekstensi PHP

**`Instalasi Codeigniter 4`**

Untuk melakukan instalasi Codeigniter 4 dapat dilakukan dengan dua cara, yaitu cara 
manual dan menggunakan **composer**. Pada praktikum ini kita menggunakan cara 
manual.<br>
• Unduh **Codeigniter** dari website https://codeigniter.com/download<br>
• Extrak file zip Codeigniter ke direktori **htdocs/lab11_ci**.<br>
• Ubah nama direktory **framework-4.x.xx** menjadi **ci4**.<br>


![11_Lab11Web](Gambar/03.Gambar_direktory_framework-4_ci4.jpg)

Gambar 03. Direktory framework-4 ci4

• Buka browser dengan alamat **http://localhost/lab11_php_ci/ci4/public/**

![11_Lab11Web](Gambar/03.Gambar_Tampilan_Codeigniter4.jpg)

Gambar 04. Tampilan Codeigniter4

**`Menjalankan CLI (Command Line Interface)`**

Codeigniter 4 menyediakan CLI untuk mempermudah proses development. Untuk 
mengakses CLI buka terminal/command prompt. 

![11_Lab11Web](Gambar/04.Gambar_Tampilan_Command_Prompt.jpg)

Gambar 05. Tampilan Command Prompt

Arahkan lokasi direktori sesuai dengan direktori kerja project dibuat **(xampp/htdocs/lab11_php_ci/ci4/)** 
Perintah yang dapat dijalankan untuk memanggil CLI Codeigniter adalah:

~~~
php spark
~~~

![11_Lab11Web](Gambar/05.Gambar_Perintah_CLI.jpg)

Gambar 06. Perintah CLI

lalu jalankan perintah

~~~
php spark serve
~~~

**`Mengaktifkan Mode Debugging`**<br>

Codeigniter 4 menyediakan fitur **debugging** untuk memudahkan developer untuk 
mengetahui pesan error apabila terjadi kesalahan dalam membuat kode program.

**Secara default fitur ini belum aktif. Ketika terjadi error pada aplikasi akan ditampilkan
pesan kesalahan seperti berikut.**

![11_Lab11Web](Gambar/08.Gambar_CI_Error.jpg)

Gambar 07. CI Error

Cara mengaktifkannya dengan mengubah nama file **env** menjadi **.env** kemudian buka filenya dan ubah nilai **CI_ENVIRONMENT** menjadi **development.**

![11_Lab11Web](Gambar/06.Gambar_Konfigurasi_CI.jpg)

Gambar 08. Konfigurasi CI

Contoh error yang terjadi. Untuk mencoba error tersebut, ubah kode pada file
**app/Controller/Home.php** hilangkan titik koma pada akhir kode.

![11_Lab11Web](Gambar/07.Gambar_Kode_Home.jpg)

Gambar 09. Kode Home

Buka browser : http://localhost:8080

![11_Lab11Web](Gambar/09.Gambar_Error.jpg)

Gambar 10. Error

**Membuat Route Baru.**

Tambahkan kode berikut di dalam **Routes.php**
~~~
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
~~~
![11_Lab11Web](Gambar/10.Gambar_add_app_config_Routes.php.jpg)

Gambar 11. Gambar add app config Routes.php

Untuk mengetahui route yang ditambahkan sudah benar, buka CLI dan jalankan
perintah berikut.

`php spark routes`

![11_Lab11Web](Gambar/11.Gambar_CLI_php_spark_routes.jpg)

Gambar 12. Tampilan CLI

Selanjutnya coba akses route yang telah dibuat dengan mengakses alamat url
http://localhost:8080/about

![11_Lab11Web](Gambar/12.Gambar_Tampilan_error_page.jpg)

Gambar 13. Tampilan error page.

Ketika diakses akan mucul tampilan error 404 file not found, itu artinya file/page
tersebut tidak ada. Untuk dapat mengakses halaman tersebut, harus dibuat terlebih
dahulu Contoller yang sesuai dengan routing yang dibuat yaitu Contoller Page.

**Membuat Controller**

Selanjutnya adalah membuat Controller Page. Buat file baru dengan nama **page.php** di dalam direktori Controller (/app/Controllers).<br>
Pada direktori Controller kemudian isi kodenya seperti berikut.
~~~
<?php
namespace App\Controllers;
class Page extends BaseController
{
public function about()
{
echo "Ini halaman About";
}
public function contact()
{
echo "Ini halaman Contact";
}
public function faqs()
{
echo "Ini halaman FAQ";
}
}
~~~
![11_Lab11Web](Gambar/13.Gambar_Controller_Page.php.jpg)

Gambar 14. Code Controller Page.php

Selanjutnya refresh Kembali browser, maka akan ditampilkan hasilnya yaitu halaman
sudah dapat diakses.

![11_Lab11Web](Gambar/14.Gambar_Tampilan_Halaman_About.jpg)

Gambar 14. Tampilan Halaman About

**Auto Routing**
Secara default fitur autoroute pada Codeiginiter sudah aktif. Untuk mengubah status
autoroute dapat mengubah nilai variabelnya. Untuk menonaktifkan ubah nilai true
menjadi false.
~~~
$routes->setAutoRoute(true);
~~~
Tambahkan method baru pada Controller Page seperti berikut.
~~~
public function tos()
{
echo "ini halaman Term of Services";
}
~~~

Method ini belum ada pada routing, sehingga cara mengaksesnya dengan menggunakan
alamat: http://localhost:8080/page/tos

![11_Lab11Web](Gambar/15.Gambar_Tampilan_autoroute_Tos.jpg)

Gambar 15. Tampilan autoroute

**Membuat View**

Selanjutnya adalam membuat view untuk tampilan web agar lebih menarik. Buat file
baru dengan nama **about.php** pada direktori view **(app/view/about.php)** kemudian isi
kodenya seperti berikut.
~~~
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= $title; ?></title>
</head>
<body>
<h1><?= $title; ?></h1>
<hr>
<p><?= $content; ?></p>
</body>
</html>
~~~
![11_Lab11Web](Gambar/16.Gambar_app_view_about.php.jpg)

Gambar 16. Code app view about.php

Ubah **method about** pada class **Controller Page** menjadi seperti berikut:
~~~
public function about()
{
return view('about', [
'title' => 'Halaman Abot',
'content' => 'Ini adalah halaman abaut yang menjelaskan tentang isi
halaman ini.'
]);
}
~~~
![11_Lab11Web](Gambar/17.Gambar_Controller_Page.jpg)

Gambar 17. Code Controller Page

Kemudian lakukan refresh pada halaman tersebut.

![11_Lab11Web](Gambar/18.Gambar_Halaman_about.jpg)

Gambar 18.Halaman about

**Membuat Layout Web dengan CSS**

Pada dasarnya layout web dengan css dapat diimplamentasikan dengan mudah pada
codeigniter. Yang perlu diketahui adalah, pada Codeigniter 4 file yang menyimpan asset
css dan javascript terletak pada direktori **public**.<br>
Buat file css pada direktori public dengan nama **style.css** (copy file dari praktikum
**lab4_layout**). Kita akan gunakan layout yang pernah dibuat pada praktikum 4.

![11_Lab11Web](Gambar/19.Gambar_Direktori_asset.jpg)

Gambar 19.Direktori asset

Kemudian buat folder **template** pada direktori **view** kemudian buat file **header.php** dan
**footer.php**<br>
File **app/view/template/header.php**<br>
~~~
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= $title; ?></title>
<link rel="stylesheet" href="<?= base_url('/style.css');?>">
</head>
<body>
<div id="container">
<header>
<h1>Layout Sederhana</h1>
</header>
<nav>
<a href="<?= base_url('/');?>" class="active">Home</a>
<a href="<?= base_url('/artikel');?>">Artikel</a>
<a href="<?= base_url('/about');?>">About</a>
<a href="<?= base_url('/contact');?>">Kontak</a>
</nav>
<section id="wrapper">
<section id="main">
~~~
![11_Lab11Web](Gambar/20.Gambar_header.php.jpg)

Gambar 20.Code header.php

File **app/view/template/footer.php**
~~~
</section>
<aside id="sidebar">
<div class="widget-box">
<h3 class="title">Widget Header</h3>
<ul>
<li><a href="#">Widget Link</a></li>
<li><a href="#">Widget Link</a></li>
</ul>
</div>
<div class="widget-box">
<h3 class="title">Widget Text</h3>
<p>Vestibulum lorem elit, iaculis in nisl volutpat, malesuada
tincidunt arcu. Proin in leo fringilla, vestibulum mi porta, faucibus felis.
Integer pharetra est nunc, nec pretium nunc pretium ac.</p>
</div>
</aside>
</section>
<footer>
<p>&copy; 2021 - Universitas Pelita Bangsa</p>
</footer>
</div>
</body>
</html>
~~~
![11_Lab11Web](Gambar/21.Gambar_footer.php.jpg)

Gambar 21.Code footer.php

Kemudian ubah file **app/view/about.php** seperti berikut.
~~~
<?= $this->include('template/header'); ?>
<h1><?= $title; ?></h1>
<hr>
<p><?= $content; ?></p>
<?= $this->include('template/footer'); ?>
~~~
![11_Lab11Web](Gambar/22.Gambar_about.php.jpg)

Gambar 22.Code about.php

Selanjutnya refresh tampilan pada alamat http://localhost:8080/about

![11_Lab11Web](Gambar/23.Gambar_tampilan_web_about.jpg)

Gambar 22.Tampilan web about

<hr>

**`Pertanyaan dan Tugas`**

Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga
semua link pada navigasi header dapat menampilkan tampilan dengan layout yang
sama.
<hr>

 >**Jawab**
 
 
Di atas sudah kita buat Route jadi kita tinggal.
Tambahkan kode **Route artikel** di dalam **Routes.php**

![11_Lab11Web](Gambar/24.Gambar_add_Routes_artikel.jpg)

Gambar 23.add_Routes_artikel

Untuk mengetahui route yang ditambahkan sudah benar, buka CLI dan jalankan
perintah berikut.

`php spark routes`

![11_Lab11Web](Gambar/25.Gambar_add_Routes_artikel_CLI.jpg)

Gambar 24.add_Routes_artikel_CLI

Selanjutnya kita buat Buat dan tambahkan file
baru dengan nama **artikel.php dan contact.php** di **htdocs\lab11_php_ci\ci4\app\Views**

hasil : buka web Browser 

**`Tampilan page about:`**

![11_Lab11Web](Gambar/26.Gambar_halaman_about.jpg)

Gambar 25.Halaman about

**`Tampilan page artikel:`**

![11_Lab11Web](Gambar/27.Gambar_halaman_artikel.jpg)

Gambar 26.Halaman artikel

**`Tampilan page Kontak:`**

![11_Lab11Web](Gambar/28.Gambar_halaman_contact.jpg)

Gambar 27.Halaman contact

<hr>

# TUGAS PERTEMUAN 12

<hr>

**Praktikum 12: Framework Lanjutan (CRUD)**

**Pemrograman Web: Framework Lanjutan (CRUD)**

<hr>

**Instruksi Praktikum**
1. Persiapkan text editor misalnya **VSCode**.
2. Buka kembali folder dengan nama **lab11_php_ci** pada docroot webserver **(htdocs)**
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.<br>

**Langkah-langkah Praktikum
Persiapan.**
Untuk memulai membuat aplikasi CRUD sederhana, yang perlu disiapkan adalah 
database server menggunakan MySQL. Pastikan MySQL Server sudah dapat dijalankan 
melalui XAMPP.

**Membuat Database: Studi Kasus Data Artikel**

![11_Lab11Web](Gambar/29.Gambar_Membuat_Database.jpg)

**`Membuat Database`**

```
CREATE DATABASE lab_ci4;
```
![11_Lab11Web](Gambar/30.Gambar_CREATE_DATABASE_lab_ci4.jpg)

Gambar 28.CREATE DATABASE

**`Membuat Tabel`**
```
CREATE TABLE artikel (
id INT(11) auto_increment,
judul VARCHAR(200) NOT NULL,
isi TEXT,
gambar VARCHAR(200),
status TINYINT(1) DEFAULT 0,
slug VARCHAR(200),
PRIMARY KEY(id)
);
```
![11_Lab11Web](Gambar/31.Gambar_Membuat_Tabel.jpg)

Gambar 29.Membuat Tabel

![11_Lab11Web](Gambar/32.Gambar_Membuat_Tabel_Struktur.jpg)

**`Konfigurasi koneksi database`**

Selanjutnya membuat konfigurasi untuk menghubungkan dengan database server.
Konfigurasi dapat dilakukan dengan du acara, yaitu pada file **app/config/database.php**
atau menggunakan file **.env**. Pada praktikum ini kita gunakan konfigurasi pada file .env.

![11_Lab11Web](Gambar/33.Gambar_Konfigurasi_Database.env.jpg)

Gambar 30.Konfigurasi Database

**`Membuat Model`**

Selanjutnya adalah membuat Model untuk memproses data Artikel. Buat file baru pada
direktori **app/Models** dengan nama **ArtikelModel.php**
```
<?php
namespace App\Models;
use CodeIgniter\Model;
class ArtikelModel extends Model
{
protected $table = 'artikel';
protected $primaryKey = 'id';
protected $useAutoIncrement = true;
protected $allowedFields = ['judul', 'isi', 'status', 'slug', 'gambar'];
}
```
![11_Lab11Web](Gambar/34.Gambar_ArtikelModel.php.jpg)

Gambar 31.ArtikelModel.php

**`Membuat Controller`**

Buat Controller baru dengan nama ***Artikel.php*** pada direktori ***app/Controllers***.
```
<?php
namespace App\Controllers;
use App\Models\ArtikelModel;
class Artikel extends BaseController
{
   public function index()
  {
  $title = 'Daftar Artikel';
  $model = new ArtikelModel();
  $artikel = $model->findAll();
  return view('artikel/index', compact('artikel', 'title'));
  }
}
```
![11_Lab11Web](Gambar/35.Gambar_Artikel.php.jpg)

Gambar 32.Artikel.php

**`Membuat View`**

Buat direktori baru dengan nama ***artikel*** pada direktori ***app/views***, kemudian buat file
baru dengan nama ***index.php***.
```
<?= $this->include('template/header'); ?>

<?php if($artikel): foreach($artikel as $row): ?>
    <article class="entry">
    <h2><a href="<?= base_url('/artikel/' . $row['slug']);?>"><?= $row['judul']; ?></a>
</h2>
    <img src="<?= base_url('/gambar/' . $row['gambar']);?>" alt="<?= $row['judul']; ?>">
    <p><?= substr($row['isi'], 0, 200); ?></p>
</article>
<hr class="divider" />
<?php  endforeach; else: ?>
<article class="entry">
    <h2>Belum ada data.</h2>
</article>
<?php endif; ?>
<?= $this->include('template/footer'); ?>
```
![11_Lab11Web](Gambar/36.Gambar_index.php.jpg)

Gambar 33.index.php

Selanjutnya buka browser kembali, dengan mengakses url http://localhost:8080/artikel

![11_Lab11Web](Gambar/38.Gambar_TampilanWeb.Artikel.jpg)

Gambar 34.Tampilan Web.Artikel

Belum ada data yang diampilkan. Kemudian coba tambahkan beberapa data pada
***Database*** agar dapat ditampilkan datanya.
```
INSERT INTO artikel (judul, isi, slug) VALUE
('Artikel pertama', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri
percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi
standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak
dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah
buku contoh huruf.', 'artikel-pertama'),
('Artikel kedua', 'Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah
teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari
era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih
dari 2000 tahun.', 'artikel-kedua');
```
![11_Lab11Web](Gambar/39.Gambar_add_database.Artikel.jpg)

Gambar 35.add database.Artikel

Refresh kembali browser, sehingga akan ditampilkan hasilnya.

![11_Lab11Web](Gambar/40.Gambar_Tampilan_Artikel.jpg)

Gambar 36.Tampilan Artikel

**`Membuat Tampilan Detail Artikel`**

Tampilan pada saat judul berita di klik maka akan diarahkan ke halaman yang berbeda.
Tambahkan fungsi baru pada ***Controller Artikel*** dengan nama ***view()***.
```
public function view($slug)
    {
         $model = new ArtikelModel();
         $artikel = $model->where([
         'slug' => $slug
         ])->first();
         
         // Menampilkan error apabila data tidak ada.
         if (!$artikel)
         {
             throw PageNotFoundException::forPageNotFound();
         }
       $title = $artikel['judul'];
       return view('artikel/detail', compact('artikel', 'title'));
    }
    public function admin_index()
   {
    $title = 'Daftar Artikel';
    $model = new ArtikelModel();
    $artikel = $model->findAll();
    return view('artikel/admin_index', compact('artikel', 'title'));
   }
   ```
![11_Lab11Web](Gambar/41.Gambar_Controller_Artikel.jpg)

Gambar 37.Controller_Artikel

**`Membuat View Detail`**

Buat view baru untuk halaman detail dengan nama ***app/views/artikel/detail.php***.
```
<?= $this->include('template/header'); ?>
<article class="entry">
<h2><?= $artikel['judul']; ?></h2>
<img src="<?= base_url('/gambar/' . $artikel['gambar']);?>" alt="<?=
$artikel['judul']; ?>">
<p><?= $artikel['isi']; ?></p>
</article>
<?= $this->include('template/footer'); ?>
```
![11_Lab11Web](Gambar/42.Gambar_detail.php.jpg)

Gambar 38.View detail.php

**`Membuat Routing untuk artikel detail`**

Buka Kembali file ***app/config/Routes.php***, kemudian tambahkan routing untuk artikel
detail.
```
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
```
![11_Lab11Web](Gambar/37.Gambar_routes.Artikel.jpg)

Gambar 39.routes.Artikel

Refresh kembali browser, sehingga akan ditampilkan hasilnya.

![11_Lab11Web](Gambar/43.Gambar_Detail_Artikel.jpg)

Gambar 40.Detail Artikel

**`Membuat Menu Admin`**

Menu admin adalah untuk proses CRUD data artikel. Buat method baru pada
***Controller Artikel*** dengan nama ***admin_index()***.
```
public function admin_index()
{
$title = 'Daftar Artikel';
$model = new ArtikelModel();
$artikel = $model->findAll();
return view('artikel/admin_index', compact('artikel', 'title'));
}
```
![11_Lab11Web](Gambar/44.Gambar_Controller_Artikel_admin_index.jpg)

Gambar 41.Controller_Artikel_admin_index

Selanjutnya buat view untuk tampilan admin dengan nama ***admin_index.php***
```
<?= $this->include('template/admin_header'); ?>

<table class="table">
    <thead>
       <tr>
          <th>ID</th>
          <th>Judul</th>
          <th>Status</th>
          <th>AKsi</th>
     </tr>
    </thead>
    <tbody>
    <?php if($artikel): foreach($artikel as $row): ?>
    <tr>
       <td><?= $row['id']; ?></td>
       <td>
          <b><?= $row['judul']; ?></b>
          <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
       </td>
       <td><?= $row['status']; ?></td>
       <td>
          <a class="btn" href="<?= base_url('/admin/artikel/edit/' .
$row['id']);?>">Ubah</a>
            <a class="btn btn-danger" onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('/admin/artikel/delete/' .
$row['id']);?>">Hapus</a>
    </td>
    </tr>
    <?php endforeach; else: ?>
    <tr>
       <td colspan="4">Belum ada data.</td>
     </tr>
     <?php endif; ?>
     </tbody>
     <tfoot>
        <tr>
           <th>ID</th>
           <th>Judul</th>
           <th>Status</th>
           <th>AKsi</th>
        </tr>
     </tfoot>
 </table>
 
<?= $this->include('template/admin_footer'); ?>
```
![11_Lab11Web](Gambar/45.Gambar_admin_index.jpg)
![11_Lab11Web](Gambar/45.Gambar_admin_index-1.jpg)

Gambar 42.admin_index.php

Selanjutnya kita buat template halaman admin **di app/Views/template** dengan nama :<br>
`admin_header.php`

`admin_footer.php`

lalu buat css baru **di folder ci4/public** dengan nama :

`adminstyle.css`

Tambahkan routing untuk menu admin seperti berikut:
```
$routes->group('admin', function($routes) {
$routes->get('artikel', 'Artikel::admin_index');
$routes->add('artikel/add', 'Artikel::add');
$routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
$routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});
```
![11_Lab11Web](Gambar/46.Gambar_routing.jpg)

Gambar 43.add routing.php

Akses menu admin dengan url http://localhost:8080/admin/artikel

![11_Lab11Web](Gambar/50.Gambar_Admin_index.jpg)

Gambar 44.Admin index

**`Menambah Data Artikel`**

Tambahkan fungsi/method baru pada **Controller Artikel** dengan nama **add()**.
```
public function add()
{
// validasi data.
$validation = \Config\Services::validation();
$validation->setRules(['judul' => 'required']);
$isDataValid = $validation->withRequest($this->request)->run();
if ($isDataValid)
{
$artikel = new ArtikelModel();
$artikel->insert([
'judul' => $this->request->getPost('judul'),
'isi' => $this->request->getPost('isi'),
'slug' => url_title($this->request->getPost('judul')),
]);
return redirect('admin/artikel');
}
$title = "Tambah Artikel";
return view('artikel/form_add', compact('title'));
}
```
![11_Lab11Web](Gambar/51.Gambar_Controller_add.jpg)

Gambar 45.Controller_add

Kemudian buat view untuk form tambah dengan nama **form_add.php**
```
<?= $this->include('template/admin_header'); ?>
<h2><?= $title; ?></h2>
<form action="" method="post">
<p>
<input type="text" name="judul">
</p>
<p>
<textarea name="isi" cols="50" rows="10"></textarea>
</p>
<p><input type="submit" value="Kirim" class="btn btn-large"></p>
</form>
<?= $this->include('template/admin_footer'); ?>
```
![11_Lab11Web](Gambar/52.Gambar_form_add.php.jpg)

Gambar 46.form_add.php

Akses menu admin dengan url http://localhost:8080/admin/artikel/add

![11_Lab11Web](Gambar/53.Gambar_Tambah_Artikel.jpg)

Gambar 47.Tambah Artikel

**`Mengubah Data`**

Tambahkan fungsi/method baru pada ***Controller Artikel*** dengan nama ***edit()***.
```
public function edit($id)
{
$artikel = new ArtikelModel();
// validasi data.
$validation = \Config\Services::validation();
$validation->setRules(['judul' => 'required']);
$isDataValid = $validation->withRequest($this->request)->run();
if ($isDataValid)
{
$artikel->update($id, [
'judul' => $this->request->getPost('judul'),
'isi' => $this->request->getPost('isi'),
]);
return redirect('admin/artikel');
}
// ambil data lama
$data = $artikel->where('id', $id)->first();
$title = "Edit Artikel";
return view('artikel/form_edit', compact('title', 'data'));
}
```
![11_Lab11Web](Gambar/54.Gambar_Controller_edit.jpg)

Gambar 48.Controller_Function edit

Kemudian buat view untuk form tambah dengan nama ***form_edit.php***
```
<?= $this->include('template/admin_header'); ?>
<h2><?= $title; ?></h2>
<form action="" method="post">
<p>
<input type="text" name="judul" value="<?= $data['judul'];?>" >
</p>
<p>
<textarea name="isi" cols="50" rows="10"><?=
$data['isi'];?></textarea>
</p>
<p><input type="submit" value="Kirim" class="btn btn-large"></p>
</form>
<?= $this->include('template/admin_footer'); ?>
```
![11_Lab11Web](Gambar/55.Gambar_form_edit.php.jpg)

Gambar 49.form_edit.php

Akses menu admin dengan url http://localhost:8080/admin/artikel/edit/1

![11_Lab11Web](Gambar/56.Gambar_Ubah_Artikel.jpg)

Gambar 50.Ubah Artikel

**`Menghapus Data`**

Tambahkan fungsi/method baru pada ***Controller Artikel ***dengan nama ***delete()***.
```
public function delete($id)
{
$artikel = new ArtikelModel();
$artikel->delete($id);
return redirect('admin/artikel');
}
```
![11_Lab11Web](Gambar/57.Gambar_Controller_delete.jpg)

Gambar 51.Controller_delete

<hr>

## **`Pertanyaan dan Tugas`**

<hr>

Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan
improvisasi.

>**Jawab**:

Saya Coba Dengan menambahakan Artikel ketiga,
Akses menu admin dengan url http://localhost:8080/admin/artikel/add

**`Tambah Artikel`**

![11_Lab11Web](Gambar/58.Gambar_tambah_artikel.jpg)

Gambar 52.Tambah_artikel ketiga

![11_Lab11Web](Gambar/59.Gambar_Tampilan_tambah_artikel.jpg)

Gambar 53.Tampilan_tambah_artikel ketiga

![11_Lab11Web](Gambar/60.Gambar_Tampilan_tambah_artikel-1.jpg)

Gambar 54.Tampilan_Portal Berita_artikel ketiga


**`Edit Artikel`**

Akses menu admin dengan url http://localhost:8080/admin/artikel/edit/1

![11_Lab11Web](Gambar/61.Gambar_Tampilan_edit_artikel-1.jpg)

Gambar 55.Edit_artikel

![11_Lab11Web](Gambar/62.Gambar_Tampilan_edit_artikel-2.jpg)

Gambar 56.Tampilan_edit_artikel

![11_Lab11Web](Gambar/62.Gambar_Tampilan_edit_artikel-3.jpg)

Gambar 57.Tampilan_Portal Berita_edit_artikel pertama

**`Hapus Artikel`**

Akses menu admin dengan url http://localhost:8080/admin/artikel/

![11_Lab11Web](Gambar/63.Gambar_Tampilan_hapus.jpg)

Gambar 58.Hapus_artikel

![11_Lab11Web](Gambar/63.Gambar_Tampilan_hapus-1.jpg)

Gambar 59.Tampilan_Hapus_artikel

![11_Lab11Web](Gambar/63.Gambar_Tampilan_hapus-2.jpg)

Gambar 60.Tampilan_Portal Berita_Hapus_artikel ketiga

<hr>

# Praktikum 13: Framework Lanjutan (Modul Login)

<hr>

**Instruksi Praktikum**<br>
1. Persiapkan text editor misalnya VSCode.
2. Buka kembali folder dengan nama lab11_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.

**Langkah-langkah Praktikum**<br>
**Persiapan.**<br>
Untuk memulai membuat modul Login, yang perlu disiapkan adalah database server 
menggunakan MySQL. Pastikan MySQL Server sudah dapat dijalankan melalui 
XAMPP.<br>
**Membuat Tabel: User Login**

![11_Lab11Web](Gambar/64.Gambar_Tabel_Login.jpg)

Gambar 61.Tabel user Login

**Membuat Tabel User**
```
CREATE TABLE user (
 id INT(11) auto_increment,
 username VARCHAR(200) NOT NULL,
 useremail VARCHAR(200),
 userpassword VARCHAR(200),
 PRIMARY KEY(id)
);
```
Selanjutnya Buka Url : <http://localhost/phpmyadmin/index.php?route=/database/sql&db=lab_ci4>

![11_Lab11Web](Gambar/65.Gambar_Tabel_Login_mySQL.jpg)
![11_Lab11Web](Gambar/65.Gambar_Tabel_Login_mySQL-1.jpg)

Gambar 62.MySQL Server User Login

**Membuat Model User**<br>
Selanjutnya adalah membuat Model untuk memproses data Login. Buat file baru pada 
direktori ***app/Models*** dengan nama ***UserModel.php***
```
<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model
{
 protected $table = 'user';
 protected $primaryKey = 'id';
 protected $useAutoIncrement = true;
 protected $allowedFields = ['username', 'useremail', 'userpassword'];
}
```
![11_Lab11Web](Gambar/66.Gambar_UserModel.php.jpg)

Gambar 63.UserModel.php

**Membuat Controller User**<br>
Buat Controller baru dengan nama **User.php** pada direktori **app/Controllers**.
Kemudian tambahkan method **index()** untuk menampilkan daftar user, dan method 
**login()** untuk proses login.
```
<?php
namespace App\Controllers;
use App\Models\UserModel;
class User extends BaseController
{
 public function index() 
 {
 $title = 'Daftar User';
 $model = new UserModel();
 $users = $model->findAll();
 return view('user/index', compact('users', 'title'));
 }
 public function login()
 {
 helper(['form']);
 $email = $this->request->getPost('email');
 $password = $this->request->getPost('password');
 if (!$email)
 {
 return view('user/login');
 }
 $session = session();
 $model = new UserModel();
 $login = $model->where('useremail', $email)->first();
 if ($login)
 {
 $pass = $login['userpassword'];
 if (password_verify($password, $pass))
 {
 $login_data = [
'user_id' => $login['id'],
 'user_name' => $login['username'],
 'user_email' => $login['useremail'],
 'logged_in' => TRUE,
 ];
 $session->set($login_data);
 return redirect('admin/artikel');
 }
 else
 {
 $session->setFlashdata("flash_msg", "Password salah.");
 return redirect()->to('/user/login');
 }
 }
 else
 {
 $session->setFlashdata("flash_msg", "email tidak terdaftar.");
 return redirect()->to('/user/login');
 }
 }
}
```
![11_Lab11Web](Gambar/67.Gambar_User.php.jpg)
![11_Lab11Web](Gambar/67.Gambar_User.php-1.jpg)

Gambar 64.Membuat Controller User.php


**Membuat View Login**<br>
Buat direktori baru dengan nama **user** pada direktori **app/views**, kemudian buat file 
baru dengan nama **login.php**.
```
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Login</title>
 <link rel="stylesheet" href="<?= base_url('/loginstyle.css');?>">
</head>
<body>
 <div id="login-wrapper">
 <h1>Sign In</h1>
 <?php if(session()->getFlashdata('flash_msg')):?>
 <div class="alert alert-danger"><?=
session()->getFlashdata('flash_msg') ?></div>
 <?php endif;?>
 <form action="" method="post">
 <div class="mb-3">
 <label for="InputForEmail" class="form-label">Email 
address</label>
 <input type="email" name="email" class="form-control"
id="InputForEmail" value="<?= set_value('email') ?>">
 </div>
<div class="mb-3">
 <label for="InputForPassword"
class="form-label">Password</label>
 <input type="password" name="password"
class="form-control" id="InputForPassword">
 </div>
 <button type="submit" class="btn 
btn-primary">Login</button>
 </form>
 </div>
</body>
</html>
```
Selanjutnya Kita Buat CSS baru di C:\xampp\htdocs\lab11_php_ci\ci4\public Dengan nama : **loginstyle.css**

![11_Lab11Web](Gambar/68.Gambar_login.php.jpg)

Gambar 65.Membuat View Login.php

**Membuat Database Seeder**<br>
Database seeder digunakan untuk membuat data dummy. Untuk keperluan ujicoba modul 
login, kita perlu memasukkan data user dan password kedaalam database. Untuk itu buat 
database seeder untuk tabel user. Buka CLI, kemudian tulis perintah berikut:

**`php spark make:seeder UserSeeder`**

![11_Lab11Web](Gambar/69.Gambar_CLI_UserSeeder.jpg)

Gambar 66.CLI_UserSeeder

Selanjutnya, buka file **UserSeeder.php** yang berada di lokasi direktori 
**/app/Database/Seeds/UserSeeder.php** kemudian isi dengan kode berikut:
```
<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class UserSeeder extends Seeder
{
public function run()
{
$model = model('UserModel');
$model->insert([
'username' => 'admin',
'useremail' => 'admin@email.com',
'userpassword' => password_hash('admin123', PASSWORD_DEFAULT),
]);
}
}
```
![11_Lab11Web](Gambar/70.Gambar_CLI_UserSeeder.php.jpg)

Gambar 67.Membuat CLI_UserSeeder.php

Selanjutnya buka kembali CLI dan ketik perintah berikut:

**`php spark db:seed UserSeeder`**

![11_Lab11Web](Gambar/71.Gambar_CLI_seedUserSeeder.jpg)

Gambar 68.CLI_seedUserSeeder

**Uji Coba Login**<br>
Selanjutnya buka url http://localhost:8080/user/login seperti berikut:

![11_Lab11Web](Gambar/72.Gambar_Login_Form.jpg)

Gambar 69.Login Form

**Menambahkan Auth Filter**

Selanjutnya membuat filer untuk halaman admin. Buat file baru dengan nama **Auth.php**
pada direktori **app/Filters.**
```
<?php namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
class Auth implements FilterInterface
{
public function before(RequestInterface $request, $arguments = null)
{
// jika user belum login
if(! session()->get('logged_in')){
// maka redirct ke halaman login
return redirect()->to('/user/login');
}
}
public function after(RequestInterface $request, ResponseInterface
$response, $arguments = null)
{
// Do something here
}
}
?>
```
![11_Lab11Web](Gambar/73.Gambar_Auth.php.jpg)

Gambar 70.Membuat Auth.php

Selanjutnya buka file **app/Config/Filters.php** tambahkan kode berikut:
```
'auth' => \App\Filters\Auth::class
```
![11_Lab11Web](Gambar/74.Gambar_Filters.php.jpg)

Gambar 71.Config Filters

Selanjutnya buka file **app/Config/Routes.php** dan sesuaikan kodenya.

![11_Lab11Web](Gambar/75.Gambar_Routes.php.jpg)

Gambar 72.Config Routes

Percobaan Akses Menu Admin<br>
Buka url dengan alamat http://localhost:8080/admin/artikel<br>
ketika alamat tersebut
diakses maka, akan dimuculkan halaman login.

![11_Lab11Web](Gambar/76.Gambar_Login_Admin.jpg)

Gambar 73.Login Admin

**Fungsi Logout**

Tambahkan method logout pada Controller User seperti berikut:
```
public function logout()
{
session()->destroy();
return redirect()->to('/user/login');
}
```
![11_Lab11Web](Gambar/77.Gambar_Fungsi_Logout.jpg)

Gambar 74.Menambah Fungsi_Logout

<hr>

# Pertanyaan dan Tugas

<hr>

**`Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan
improvisasi.`**

> **Jawab:**

Saya Tambahkan Routes Logout di C:\xampp\htdocs\lab11_php_ci\ci4\app\Config :

![11_Lab11Web](Gambar/78.Gambar_addRoutes_Logout.jpg)

Gambar 75.Menambah Fungsi_Logout

# **`Login Admin`**

Buka url dengan alamat http://localhost:8080/artikel<br>
Selanjutnya saya coba masuk Login dengan memasukkan kode :

**`Email :admin@email.com`**<br>
**`Password :admin123`**

![11_Lab11Web](Gambar/79.Gambar_Login_admin.jpg)

Gambar 76. Login_admin

Apabila Email Dan Password Benar, Maka akan Masuk Ke halaman Admin Portal Berita :

![11_Lab11Web](Gambar/80.Gambar_admin_portal_berita.jpg)

Gambar 77. Login_admin

Dan apabila kita memasukkan Email dan Password yang salah maka akan muncul **Comment : email tidak terdaftar**

![11_Lab11Web](Gambar/81.Gambar_Login_admin_salah.jpg)
![11_Lab11Web](Gambar/82.Gambar_Login_admin_salah_comment.jpg)

Gambar 78. Login_admin email tidak terdaftar

# **`Tambah Menu Navigasi admin dan Logout`**

Saya sudah menambahkan Menu admin :

![11_Lab11Web](Gambar/85.Gambar_artikel_Nav_Admin.jpg)

Gambar 79. Tampilan artikel_Nav_Admin

Setelah masuk Admin Maka akan di arahkan ke halam Artikel/admin/indek : Admin Portal Berita

![11_Lab11Web](Gambar/86.Gambar_Admin_portal_berita_tambah.jpg)

Gambar 80. Tampilan Admin_portal_berita_tambah

Setelah masuk **Admin portal_berita > tambah Artikel** Maka akan masuk ke Login : saya masukkan Email & pasword admin

![11_Lab11Web](Gambar/87.Gambar_Admin_portal_berita_tambah_login.jpg)

Gambar 81. Tampilan Admin_portal_berita_tambah_login

Setelah berhasil Tambah artikel 

![11_Lab11Web](Gambar/88.Gambar_Admin_portal_berita_tambah_artikel_Berhasil.jpg)

Gambar 82. Tampilan Admin_portal_berita_tambah_artikel

Berikut tampilan artikel berhasil di tambahkan.

![11_Lab11Web](Gambar/89.Gambar_Admin_portal_berita_tambah_artikel_Berhasil.jpg)

Gambar 83. Tampilan Admin_portal_berita_tambah_artikel

Selanjutnya saya akan mencoba menu Logout :

![11_Lab11Web](Gambar/90.Gambar_Nav_Logout.jpg)

Gambar 84. Tampilan Nav_Logout

Setelah itu kita akan di arahkan ke halaman Login kembali

![11_Lab11Web](Gambar/91.Gambar_Nav_Logout-Login.jpg)

Gambar 85. Tampilan Nav_Logout-Login

**`Apabila kita mau masuk halan Admin kita masukkan kembali Email dan password tapi kalau kita keluar tinggal kita close browser`**

Cukup Sekian Penjelasan dari saya.

**TERIMAKASIH**

<hr>

## Praktikum 14: Pagination dan Pencarian

<hr>

**Instruksi Praktikum**
1. Persiapkan text editor misalnya **VSCode.**
2. Buka kembali folder dengan nama **lab11_php_ci** pada docroot webserver **(htdocs)**
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.<br>
**Langkah-langkah Praktikum**<br>
**Membuat Pagination**<br>
Pagination merupakan proses yang digunakan untuk membatasi tampilan yang panjang
dari data yang banyak pada sebuah website. Fungsi pagination adalah memecah
tampilan menjadi beberapa halaman tergantung banyaknya data yang akan ditampilkan
pada setiap halaman.

Pada Codeigniter 4, fungsi pagination sudah tersedia pada Library sehingga cukup
mudah menggunakannya.
Untuk membuat pagination, buka Kembali **Controller Artikel**, kemudian modifikasi
kode pada method admin_index seperti berikut.
```
public function admin_index()
{
$title = 'Daftar Artikel';
$model = new ArtikelModel();
$data = [
'title' => $title,
'artikel' => $model->paginate(10), #data dibatasi 10 record per
halaman
'pager' => $model->pager,
];
return view('artikel/admin_index', $data);
}
```
![11_Lab11Web](Gambar/92.Gambar_admin_index_pagination.jpg)

Gambar 86. modifikasi
kode pada method admin_index

Kemudian buka file **views/artikel/admin_index.php** dan tambahkan kode berikut
dibawah deklarasi tabel data.
```
<?= $pager->links(); ?>
```
![11_Lab11Web](Gambar/93.Gambar_admin_index_pagination_link.jpg)

Gambar 87. Pagination_link

Selanjutnya buka kembali menu daftar artikel, tambahkan data lagi untuk melihat
hasilnya.

![11_Lab11Web](Gambar/96.Gambar_Pagination.jpg)

Gambar 88. Pagination

**Membuat Pencarian**<br>
Pencarian data digunakan untuk memfilter data.<br>
Untuk membuat pencarian data, buka kembali **Controller Artikel**, pada method
**admin_index** ubah kodenya seperti berikut:
```
public function admin_index()
{
$title = 'Daftar Artikel';
$q = $this->request->getVar('q') ?? '';
$model = new ArtikelModel();
$data = [
'title' => $title,
'q' => $q,
'artikel' => $model->like('judul', $q)->paginate(10), # data
dibatasi 10 record per halaman
'pager' => $model->pager,
];
return view('artikel/admin_index', $data);
}
```
![11_Lab11Web](Gambar/97.Gambar_Pagination.admin.index.filter.data.jpg)

Gambar 89. Pagination.admin.index.filter.data

Kemudian buka kembali file **views/artikel/admin_index.php** dan tambahkan form
pencarian sebelum deklarasi tabel seperti berikut:
```
<form method="get" class="form-search">
<input type="text" name="q" value="<?= $q; ?>" placeholder="Cari data">
<input type="submit" value="Cari" class="btn btn-primary">
</form>
```
Dan pada link pager ubah seperti berikut.
```
<?= $pager->only(['q'])->links(); ?>
```
![11_Lab11Web](Gambar/98.Gambar_form_pencarian.jpg)
![11_Lab11Web](Gambar/99.Gambar_form_pencarian-1.jpg)

Gambar 90. form_pencarian_admin_index.php

Selanjutnya ujicoba dengan membuka kembali halaman admin artikel, masukkan kata
kunci tertentu pada form pencarian.

![11_Lab11Web](Gambar/100.Gambar_Pencarian_Data.jpg)

Gambar 91. Pencarian Data

**Upload Gambar**<br>
Menambahkan fungsi unggah gambar pada tambah artikel. Buka kembali **Controller**
Artikel, sesuaikan kode pada method **add** seperti berikut:
```
public function add()
{
// validasi data.
$validation = \Config\Services::validation();
$validation->setRules(['judul' => 'required']);
$isDataValid = $validation->withRequest($this->request)->run();
if ($isDataValid)
{
$file = $this->request->getFile('gambar');
$file->move(ROOTPATH . 'public/gambar');
$artikel = new ArtikelModel();
$artikel->insert([
'judul' => $this->request->getPost('judul'),
'isi' => $this->request->getPost('isi'),
'slug' => url_title($this->request->getPost('judul')),
'gambar' => $file->getName(),
]);
return redirect('admin/artikel');
}
$title = "Tambah Artikel";
return view('artikel/form_add', compact('title'));
}
```
![11_Lab11Web](Gambar/101.Gambar_Fungsi_method_add_gambar.jpg)

Gambar 92. Upload Gambar

Kemudian pada file **views/artikel/form_add.php** tambahkan field input file seperti
berikut.
```
<p>
<input type="file" name="gambar">
</p>
```
Dan sesuaikan tag form dengan menambahkan *ecrypt type* seperti berikut.
```
<form action="" method="post" enctype="multipart/form-data">
```
![11_Lab11Web](Gambar/102.Gambar_form_add.php_gambar.jpg)

Gambar 93. add ecrypt type

Ujicoba file upload dengan mengakses menu tambah artikel.


![11_Lab11Web](Gambar/104.Gambar_Upload_Gambar.jpg)

Gambar 94. Upload Gambar

<hr>

# Pertanyaan dan Tugas

<hr>

**Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan
improvisasi>**

>**Jawab:**
 
 **`Tambah Artikel & Upload Gambar`**
 
Saya Buat Artikel Keempat dan mengupload gambar artikel :

![11_Lab11Web](Gambar/105.Gambar_Upload_Gambar-1.jpg)

Gambar 95. Upload Gambar


![11_Lab11Web](Gambar/107.Gambar_Tambah_artikel.jpg)

Disini saya sudah setting untuk tampilan saya batasi 4 halaman :

Dan Selanjutnya kita buat artikel lagi dan kita buka Navigasi Halaman Ke 2 :

![11_Lab11Web](Gambar/107.Gambar_Tambah_artikel-1.jpg)

 **`Cari/Filter Artikel`**
 
 saya coba Cari/filter untuk Artikel Kelima :
 
 ![11_Lab11Web](Gambar/108.Gambar_Cari_artikel.jpg)

 **`Tampilan Artikel Di portal Berita`**
 
  ![11_Lab11Web](Gambar/109.Gambar_Tampilan_portal-berita.jpg)
  
  Tampilan Detail Portal Berita :

  ![11_Lab11Web](Gambar/110.Gambar_Tampilan_portal-berita_keenam.jpg)
  
  <hr>
  
  Cukup Sekian Penjelasan Dari saya
  
  **TERIMAKASIH**
  <hr>

