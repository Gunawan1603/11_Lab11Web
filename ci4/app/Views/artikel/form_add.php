<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>
<form action="" method="post">
     <p>
        <input type="text" name="judul">
     </p>
     <p>
        <textarea name="isi" cols="50" rows="10"></textarea>
     </p>
     <p>
          <label>Photo</label>
         <?php
         if (!empty($artikel->gambar)) {
         echo '<img src="'.base_url('/gambar/' . $artikel['gambar']).'" width="150">';
          }
         ?>
         <div class="form-group">
         <input type="file" name="file_upload" class="form-control"> 
     </p>
        <p><input type="submit" value="Kirim" class="btn btn-large"></p>
</form>

<?= $this->include('template/admin_footer'); ?>