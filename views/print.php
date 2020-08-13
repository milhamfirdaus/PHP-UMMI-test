<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <meta charset = "UTF-8" />
    <title>Colleger</title>
    <link href="./assets/print.css" rel="stylesheet">
  </head>
  <body onload="window.print()">

    <div class="content">
      <img src="./assets/logo.png" alt="Girl in a jacket" style="width: 100px; height: 100px; display: flex; padding:20px;">
      <h1 class="title">Data Mahasiswa</h1>
      <h2 style="margin-bottom: 30px;" class="title">Universitas Muhammadiyah Sukabumi</h2>
      
      <div style="display:flex; flex-direction:left; width: 100%; height: 20px; align-items: center;">
        <small >Dibuat tanggal : <?=$date?></small> 
      </div>
      <table class="table" style="margin-top: 10px;">
        <tbody>

            <tr>
              <th width="5%">No</th>
              <th width="13%">NIM</th>
              <th width="20%">Nama</th>
              <th width="12%">Tahun Masuk</th>
              <th width="25%">Program Studi</th>
              <th width="15%">Kelas</th>
              <th width="15%">Jenjang</th>
            </tr>
            <?php
            if ( !empty($mahasiswa) ) {
            $index = 1;
            foreach ($mahasiswa as $data): 
              $i = $data['kode_jenjang']; 
            ?>
              
            <tr>
              <td scope="row"><?=$index; ?></td>
              <td scope="row"><?=$data['nim']; ?></td>
              <td><?=$data['nama_mahasiswa']; ?></td>
              <td><?=$data['tahun_masuk']; ?></td>
              <td><?=$data['nama_prodi']; ?></td>
              <td><?= ($data['kode_kelas']=="1") ? 'Reguler' : 'Non-Reguler';?></td>
              <td><?=$array[$i]; ?></td>
            </tr>
            <?php $index++; endforeach;
            } else{ ?>
            <tr>
              <td colspan="7">Tidak ada data untuk ditampilkan.</td>
            </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>