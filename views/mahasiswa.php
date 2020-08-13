<?php
include('header.php');
?>
  <body>
    <div class="content">
      <img src="./assets/logo.png" alt="Girl in a jacket" style="width: 80px; height: 80px; display: flex; padding:10px;">
      <h1 class="title">Data Mahasiswa</h1>
      <h2 class="title">Universitas Muhammadiyah Sukabumi</h2>

      <div class="control" style="margin-top: 34px; ">
        <form method="post" target="_blank" action="index.php?controller=mahasiswa&print" style="display: flex;width: 90%;flex-direction: row; align-items: center; ">
          <button type="submit" class="button-link" style="margin-right: 10px;border-color: transparent;"> Print </button>
          <input style="width: 20%; max-height: 10px;" type="month" id="tahun_masuk" name="tahun_masuk" min="2015-01" required>
        </form>
        <a class="button-link" href="index.php?controller=mahasiswa&add"> Add </a>    
      </div>
      
      <table class="table">
        <tbody>
            <tr>
              <th scope="col" style="border-top-left-radius: 7px;">No</th>
              <th scope="col">NIM</th>
              <th scope="col">Nama</th>
              <th scope="col" style="border-top-right-radius: 7px;">Aksi</th>
            </tr>
            <?php
            if ( !empty($mahasiswa) ) {
            $index = 1;
            foreach ($mahasiswa as $data): ?>
            <tr>
              <td scope="row"><?=$index; ?></td>
              <td scope="row"><?=$data['nim']; ?></td>
              <td><?=$data['nama_mahasiswa']; ?></td>
              <td>
                  <a href="index.php?controller=mahasiswa&edit=<?php echo $data['id_mahasiswa']; ?>"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: green"></i></a>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <a onclick="if(!confirm('Anda akan menghapus data mahasiswa : <?=$data['nama_mahasiswa']; ?>, lanjutkan ?')){ return false;}" href="index.php?controller=mahasiswa&delete=<?php echo $data['id_mahasiswa']; ?>"><i class="fa fa-ban fa-lg" aria-hidden="true" style="color: red"></i></a>
              </td>
            </tr>
            <?php $index++; endforeach;
            } else{ ?>
            <tr>
              <td colspan="4">Tidak ada data. Silahkan tambah data</td>
            </tr>
            <?php } ?>
            <tr>
              <td colspan="4" style="border-bottom-right-radius: 7px; border-bottom-left-radius: 7px;">&nbsp;</td>
            </tr>
        </tbody>
      </table>
    </div>
  </body>
</html>