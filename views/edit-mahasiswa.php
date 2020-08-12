<?php
include('header.php');
?>
  <body>
    <div class="content">
      	<div class="card">
      		<div style="display: flex;width: 100%;flex-direction: row-reverse; margin-top: -10px;">	
      			<a href="index.php?controller=mahasiswa" style="flex-direction: row-reverse;"> 
      				<i class="fa fa-window-close fa-lg" aria-hidden="true" style="color: red"></i>
      			</a>
      		</div>
      		<h4 class="title" style="padding-bottom: 30px;">Edit Data Mahasiswa</h4>	
	      	<div id="card-content">
			  <form method="post" action="index.php?controller=mahasiswa&update">
			  	<div class=row>
				  	<div class="form-group">
				  		<label class="form-label" for="title">Nama Lengkap</label>
					  	<input value="<?=$mahasiswa['nama_mahasiswa'];?>" name="nama_mahasiswa" required placeholder="Isi nama mahasiswa" />
				  	</div>
				  	<div class="form-group">
				  		<label class="form-label" for="title">Program Studi</label>
					  	<select name="id_prodi" required>
					  	 <?php foreach($prodi as $item): ?>	
						  <option value="<?=$item['id_prodi'];?>" 
						  	<?php if($mahasiswa['id_prodi'] === $item['id_prodi']){ echo "selected";}?>>
						  	<?=$item['nama_prodi']?>
						  	</option>
						<?php endforeach; ?>	
						</select>
				  	</div>
				  	<div class="form-group">
				  		<label class="form-label" for="title">Kelas</label>
					  	<select name="kode_kelas" required>
						  <option value="1" <?php if($mahasiswa['kode_kelas'] == 1){ echo "selected";}?> >Reguler</option>
						  <option value="2" <?php if($mahasiswa['kode_kelas'] == 2){ echo "selected";}?> >Non-Reguler</option>
						</select>
				  	</div>
				  	<div class="form-group">
				  		<label class="form-label" for="title">Jenjang</label>
					  	<select name="kode_jenjang" >
						  <option value="1" <?php if($mahasiswa['kode_jenjang'] == 1){ echo "selected";}?>>S3</option>
						  <option value="2"<?php if($mahasiswa['kode_jenjang'] == 2){ echo "selected";}?>>S2</option>
						  <option value="3"<?php if($mahasiswa['kode_jenjang'] == 3){ echo "selected";}?>>S1</option>
						  <option value="4"<?php if($mahasiswa['kode_jenjang'] == 4){ echo "selected";}?>>D3</option>
						  <option value="5"<?php if($mahasiswa['kode_jenjang'] == 5){ echo "selected";}?>>D2</option>
						  <option value="6"<?php if($mahasiswa['kode_jenjang'] == 6){ echo "selected";}?>>D3</option>
						</select>
				  	</div>
			  	</div>
			  	<div class=row>
				  	<div class="form-group">
				  		<label class="form-label" for="title">Semester</label>
					  	<select name="semester_masuk" required>
						  <option value="1" <?php if($mahasiswa['semester_masuk'] == 1){ echo "selected";}?>>1</option>
						  <option value="2" <?php if($mahasiswa['semester_masuk'] == 2){ echo "selected";}?>>2</option>
						  <option value="3" <?php if($mahasiswa['semester_masuk'] == 3){ echo "selected";}?>>3</option>
						  <option value="4" <?php if($mahasiswa['semester_masuk'] == 4){ echo "selected";}?>>4</option>
						  <option value="5" <?php if($mahasiswa['semester_masuk'] == 5){ echo "selected";}?>>5</option>
						  <option value="6" <?php if($mahasiswa['semester_masuk'] == 6){ echo "selected";}?>>6</option>
						  <option value="7" <?php if($mahasiswa['semester_masuk'] == 7){ echo "selected";}?>>7</option>
						  <option value="8" <?php if($mahasiswa['semester_masuk'] == 8){ echo "selected";}?>>8</option>
						  <option value="9" <?php if($mahasiswa['semester_masuk'] == 9){ echo "selected";}?>>9</option>
						</select>
				  	</div>
				  	<div class="form-group">
				  		<label class="form-label" for="title">Tahun</label>
					  	<input value="<?=$mahasiswa['tahun_masuk']?>-01" type="month" id="tahun_masuk" name="tahun_masuk" min="2015-01" required>
				  	</div>
				  	<small style="display: flex; justify-content: center; padding-top: 10px;">NIM : <?=$mahasiswa['nim'];?>, Nomor urut : <?=$mahasiswa['nomor_urut'];?></small>
			  	</div>
			  	<input value="<?=$mahasiswa['id_mahasiswa'];?>" name="id" type="hidden"/>
			  	<input value="<?=$mahasiswa['nomor_urut'];?>" name="nomor_urut" type="hidden"/>
				<input type="submit" style="margin-top: 30px;padding: 6px; margin-left: 95px; background: #3282b8; color: white; border-width: 0px" />
			  </form>
			</div>
		</div>
    </div>
  </body>
</html>