<?php
//load dependencies
include 'config/config.php';
include_once('model/Mahasiswa_Model.php');
include_once('model/Prodi_Model.php');
include_once('lib/Library.php');

$model_mahasiswa = new Mahasiswa_Model();
$model_prodi = new Prodi_Model(); 
$lib = new Library(); 

    //inisialisasi pages
    if (!isset($_GET['update']) && !isset($_GET['delete']) && !isset($_GET['create'])){
        if(isset($_GET['edit'])){
            $select = "tb_mahasiswa.*,tb_prodi.*";
            $where = "INNER JOIN tb_prodi ON tb_mahasiswa.id_prodi = tb_prodi.id_prodi WHERE id_mahasiswa=".$_GET['edit'];
            $mahasiswa = $model_mahasiswa->get_by($select, $where);
            $prodi = $model_prodi->get();
            
            include('views/edit-mahasiswa.php');
        }

        else if (isset($_GET['add'])){
            $prodi = $model_prodi->get();
            include('views/tambah-mahasiswa.php');
        }

        else if (isset($_GET['print'])){
            $tahun = explode("-", $_POST["tahun_masuk"]);
            $select = "tb_mahasiswa.*,tb_prodi.*";
            $where = "INNER JOIN tb_prodi ON tb_mahasiswa.id_prodi = tb_prodi.id_prodi WHERE tahun_masuk=".$tahun[0];
            $mahasiswa = $model_mahasiswa->print($select, $where);
            $array=array("1"=>"S3","2"=>"S2","3"=>"S1", "4"=>"D3","5"=>"D2","6"=>"D1");
            $date = date('d-m-yy');

            if($mahasiswa[0] == NULL){
                echo"<script type='text/javascript'>
                        alert('Tidak ada data yang dapat ditampilkan');
                        window.location.href = 'index.php?controller=mahasiswa';
                    </script>";
            }
            else{
                include('views/print.php');
            }   
        }
        else{    
            $mahasiswa = $model_mahasiswa->get();
            include('views/mahasiswa.php');
        }
    }

    //fungsi crud
    else if(isset($_GET['create']) && isset($_POST["nim"])){
        $array = str_split($_POST["nim"]);
        
        $_POST["tahun_masuk"] = "20".implode(array_slice($array, 0, 2)); //check
        $_POST["kode_jenjang"] = $array[2];
        $_POST["kode_prodi"] = $array[3].$array[4];
        $_POST["kode_kelas"] = $array[5];
        $_POST["semester_masuk"] = $array[6];
        $_POST["nomor_urut"] = implode(array_slice($array, 7, 9)); //check
        
        $validate = $lib->validate($_POST);
        if ($validate != 'valid'){
            echo"<script type='text/javascript'>
                    alert('$validate');
                    window.location.href = 'index.php?controller=mahasiswa&add';
                </script>";
        }
        else{
            $select = "id_prodi";
            $where = "WHERE kode_prodi='{$_POST["kode_prodi"]}'";
            $prodi = $model_prodi->get_by($select, $where);
            
            $_POST["id_prodi"] = $prodi["id_prodi"];
            unset($_POST["kode_prodi"]);
            $data = $_POST;

            $response = $model_mahasiswa->create($data);
            if($response === true){
               echo "<script type='text/javascript'>
                        alert('Berhasil menyimpan data');
                        window.location.href='index.php?controller=mahasiswa';
                     </script>";
            } 
            else {
               echo "<script type='text/javascript'>
                        alert('gagal menyimpan data');
                        window.location.href='index.php?controller=mahasiswa&create';
                     </script>";
            }
        }
    }

    else if(isset($_GET['create'])){
        $validate = $lib->validate($_POST);

        if ($validate != 'valid'){
            echo"<script type='text/javascript'>
                    alert('$validate');
                    window.location.href = 'index.php?controller=mahasiswa&add';
                </script>";
        }
        else{
            $tahun = explode("-", $_POST["tahun_masuk"]);
            $nomorUrut = $lib->generateNo($tahun[0]);
            $nim = $lib->generateNIM(
                $tahun[0], 
                $_POST["kode_jenjang"],
                $_POST["id_prodi"], 
                $_POST["kode_kelas"], 
                $_POST["semester_masuk"],
                $nomorUrut,
            );

            $_POST["tahun_masuk"] = $tahun[0];
            $_POST["nomor_urut"] = $nomorUrut;
            $_POST["nim"] = $nim;

            $data = $_POST;

            $response = $model_mahasiswa->create($data);
            if($response === true){
                echo"<script type='text/javascript'>
                        alert('Berhasil menyimpan data');
                        window.location.href='index.php?controller=mahasiswa';
                    </script>";
            } 
            else{
                echo"<script type='text/javascript'>
                        alert('gagal menyimpan data');
                        window.location.href='index.php?controller=mahasiswa&create';
                    </script>";
            }
        }
    }

    else if(isset($_GET['delete'])){
        $where = array("id_mahasiswa" => $_GET['delete']);
        $response = $model_mahasiswa->delete($where);
        if($response){
           echo "<script type='text/javascript'>
                    alert('data dihapus');
                    window.location.href='index.php?controller=mahasiswa';
                </script>";
        } 
        else {
           echo "<script type='text/javascript'>
                    alert('gagal menghapus data');
                    window.location.href = 'index.php?controller=mahasiswa';
                </script>";
        }
    }

    else if(isset($_GET['update'])){
        $validate = $lib->validate($_POST);
        $id = $_POST['id'];
        $nomorUrut = $_POST['nomor_urut'];
        unset($_POST['id']);
        unset($_POST['nomor_urut']);

        if ($validate != 'valid'){
            echo"<script type='text/javascript'>
                    alert('$validate');
                    window.location.href = 'index.php?controller=mahasiswa&edit='.$id;
                </script>";
        }
        else{
            $where_condition = array("id_mahasiswa" => $id);

            $tahun = explode("-", $_POST["tahun_masuk"]);
            $nim = $lib->generateNIM(
                $tahun[0], 
                $_POST["kode_jenjang"],
                $_POST["id_prodi"], 
                $_POST["kode_kelas"], 
                $_POST["semester_masuk"],
                $nomorUrut,
            );

            $_POST["tahun_masuk"] = $tahun[0];
            $_POST["nim"] = $nim;
            $data = $_POST;

            $response =  $model_mahasiswa->update($data,$where_condition);
            if($response){
                echo"<script type='text/javascript'>
                        alert('Berhasil diubah');
                        window.location.href = 'index.php?controller=mahasiswa';
                    </script>";
            }
            else{
                echo"<script type='text/javascript'>
                        alert('perintah gagal');
                        window.location.href = 'index.php?controller=mahasiswa&edit='.$id;
                    </script>";
            }
        }
    }

?>