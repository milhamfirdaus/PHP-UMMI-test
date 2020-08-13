<?php 
class Library{
	//load dependencies
	public function __construct(){
        include_once('model/Mahasiswa_Model.php');
        include_once('model/Prodi_Model.php');
		$this->model_mahasiswa = new Mahasiswa_Model();
		$this->model_prodi = new Prodi_Model();
    }

    //validasi input
	public function validate($data_array){
		$message = 'valid';

		if(isset($data_array['nim'])){
			$nim = trim($data_array['nim']);

			if(strlen($nim) != 10 || !is_numeric($nim)){
				return $message = "Error NIM - NIM tidak valid";
			}
			else if($data_array['kode_jenjang'] == 0 || $data_array['kode_jenjang'] > 6 ){
            	return $message = "Error NIM - Jenjang tidak valid";
            }
            else if($data_array['kode_kelas'] == 0 || $data_array['kode_kelas'] > 2){
            	return $message = "Error NIM - Kelas tidak valid";
            }
            else if($data_array['semester_masuk'] == 0 || $data_array['kode_kelas'] > 9){
            	return $message = "Error NIM - Semester tidak valid";
            }

            $kode_prodi = $data_array['kode_prodi'];
			$queryProdi = "WHERE kode_prodi='{$kode_prodi}'";
			$count_prodi = $this->model_prodi->count($queryProdi);
			if($count_prodi == 0){
            	return $message = "Error NIM - Prodi tidak terdaftar";
            }

            $tahun = $data_array['tahun_masuk'];
            $nomorUrut = $data_array['nomor_urut'];
            $queryMahasiswa = "WHERE tahun_masuk='{$tahun}' AND nomor_urut='{$nomorUrut}'";
            $count_mahasiswa = $this->model_mahasiswa->count($queryMahasiswa);
            if($count_mahasiswa > 0){
            	return $message = "Error NIM - Mahasiswa sudah terdaftar";
            }
		}
		else{
			foreach ($data_array as $key => $value) {
				$value = trim($value);
				if(strlen($value) == 0 || empty($value)){
					$data = str_replace('_', ' ', $key);
					$msg  = str_replace('id', '', $data);
					return $message = 'error - '.$msg.' masih kosong';
				}
			}
		}

		return $message;
	}

	//generate nim mahasiswa, output 10 digit
	public function generateNIM($tahun,$jenjang,$id_prodi,$kelas,$semester,$nomorUrut){
		$select = "kode_prodi";
        $where = "WHERE id_prodi=".$id_prodi;
        $prodi = $this->model_prodi->get_by($select, $where);
		$tahun = substr($tahun, -2);

		$nim = $tahun.$jenjang.$prodi["kode_prodi"].$kelas.$semester.$nomorUrut;

		return $nim;
	}

	//generate nomor urut berdasarkan tahun, output 3 digit
	public function generateNo($tahun){
		$where = "WHERE tahun_masuk=".$tahun;
		$get_data = $this->model_mahasiswa->get_by('nomor_urut',$where);
		$nomor = "001";

		if(!empty($get_data)){
			$maxNomorUrut = max($get_data);
			$value = $maxNomorUrut["nomor_urut"];
			$nomor = str_pad($value+1, 3, '0', STR_PAD_LEFT);

			$queryMahasiswa = "WHERE tahun_masuk='{$tahun}' AND nomor_urut='{$nomor}'";
            $count_mahasiswa = $this->model_mahasiswa->count($queryMahasiswa);
            
            if($count_mahasiswa > 0){
            	$nomor = str_pad($nomor+1, 3, '0', STR_PAD_LEFT);
            }
		}		
		return $nomor;
	}

}
?>