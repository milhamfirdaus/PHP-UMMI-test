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
      		<h4 class="title" style="padding-bottom: 30px;">Tambah Data Mahasiswa</h4>	
	      	<div id="card-content">
  			<div class="form-group">
		  		<label class="form-label" for="title">Tambah dengan</label>
			  	<select name="kode_kelas" onchange="changeForm(this)">
				  <option value="nim">NIM</option>
				  <option value="manual">Manual</option>
				</select>
		  	</div>
			 	<form  method="post" action="index.php?controller=mahasiswa&create" id="form-nim">
				  	<div class=row>
					  	<div class="form-group">
					  		<label class="form-label" for="title">NIM</label>
						  	<input name="nim" required placeholder="Isi NIM" />
					  	</div>
					  	<div class="form-group">
					  		<label class="form-label" for="title">Nama Lengkap</label>
						  	<input name="nama_mahasiswa" required placeholder="Isi nama mahasiswa" />
					  	</div>
				  	</div>
					<input type="submit" style="margin-top: 30px;padding: 6px; margin-left: 95px; background: #3282b8; color: white; border-width: 0px" />
			 	</form>
			 	<form method="post" action="index.php?controller=mahasiswa&create" id="form-manual" style="display: none;">
				  	<div class=row>
					  	<div class="form-group">
					  		<label class="form-label" for="title">Nama Lengkap</label>
						  	<input name="nama_mahasiswa" required placeholder="Isi nama mahasiswa" />
					  	</div>
					  	<div class="form-group">
					  		<label class="form-label" for="title">Program Studi</label>
						  	<select name="id_prodi" required>
						  	<option value="" style="display: none;">Pilih Program Studi</option>
						  	 <?php foreach($prodi as $item): ?>	
							  <option value="<?=$item['id_prodi'];?>"><?=$item['nama_prodi']?></option>
							<?php endforeach; ?>	
							</select>
					  	</div>
					  	<div class="form-group">
					  		<label class="form-label" for="title">Kelas</label>
						  	<select name="kode_kelas" required>
						  	  <option value="" style="display: none;">Pilih Kelas</option>
							  <option value="1">Reguler</option>
							  <option value="2">Non-reguler</option>
							</select>
					  	</div>
					  	<div class="form-group">
					  		<label class="form-label" for="title">Jenjang</label>
						  	<select name="kode_jenjang" required>
						  	  <option value="" style="display: none;">Pilih Jenjang</option>
							  <option value="1">S3</option>
							  <option value="2">S2</option>
							  <option value="3">S1</option>
							  <option value="4">D3</option>
							  <option value="5">D2</option>
							  <option value="6">D3</option>
							</select>
					  	</div>
				  	</div>
				  	<div class=row>
					  	<div class="form-group">
					  		<label class="form-label" for="title">Semester</label>
						  	<select name="semester_masuk" required>
						  	  <option value="" style="display: none;">Pilih Semester</option>
							  <option value="1">1</option>
							  <option value="2">2</option>
							  <option value="3">3</option>
							  <option value="4">4</option>
							  <option value="5">5</option>
							  <option value="6">6</option>
							  <option value="7">7</option>
							  <option value="8">8</option>
							  <option value="9">9</option>
							</select>
					  	</div>
					  	<div class="form-group">
					  		<label class="form-label" for="title">Tahun</label>
						  	<input type="month" id="tahun_masuk" name="tahun_masuk" min="2015-01" required>
					  	</div>
				  	</div>
					<input type="submit" style="margin-top: 30px;padding: 6px; margin-left: 95px; background: #3282b8; color: white; border-width: 0px" />
			 	</form>
			</div>
		</div>
    </div>
  </body>
  <script type="text/javascript">
  	window.onload = function() {
  		document.getElementById('form-manual').style.display = 'hidden';
	};

  	function changeForm(selectObject) {
	  var value = selectObject.value;  
	  console.log(value);
	  if(value == 'nim'){
	  	document.getElementById("form-nim").style.display = "block";
	  	document.getElementById("form-manual").style.display = "none";
	  }
	  else{
	  	document.getElementById("form-nim").style.display = "none";
	  	document.getElementById("form-manual").style.display = "block";
	  }
	}
  </script>
</html>