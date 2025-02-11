<?php
    include "header.php";
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pendaftaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                            <li class="breadcrumb-item active">Pendaftaran</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                    <div class="card-body">
                                        <?php
                                            $tanggal=date('Y-m-d');
                                        ?>
                                        <form action="#" method="POST">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama..." required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Usia</label>
                                            <input type="number" min="15" name="usia" class="form-control" id="exampleFormControlInput1" placeholder="Usia..." required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-select" aria-label="Default select example" required>
                                                <option selected>-----Pilihan-----</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Tanggal Pemeriksaan</label>
                                            <input type="date" name="tgl_pemeriksaan" class="form-control" id="exampleFormControlInput1" value="<?php echo $tanggal;?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Pemeriksaan</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" checked name="asam_urat" value="1" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                        Asam Urat
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" checked name="gula_darah" value="1" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                        Gula Darah
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="kolesterol" value="1" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                        Kolesterol
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input class="btn btn-primary" name="simpan" type="submit" value="Simpan">
                                            <a class="btn btn-warning" href="pendaftaran.php" role="button">Kembali</a>
                                        </div>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php
    include "footer.php";
    include "koneksi.php";
if (isset ($_POST['simpan'])){
  $nama=$_POST['nama'];
  $usia=$_POST['usia'];
  $jenis_kelamin=$_POST['jenis_kelamin'];
  $alamat=$_POST['alamat'];
  $tgl=$_POST['tgl_pemeriksaan'];
  $asam=$_POST['asam_urat'];
  $gula=$_POST['gula_darah'];
  $kolesterol=$_POST['kolesterol'];
  $query =mysqli_query($koneksi,"insert into tb_daftar(nama,usia,jenis_kelamin,tgl_pemeriksaan,alamat,asam_urat,gula_darah,kolesterol) 
  VALUES('$nama','$usia','$jenis_kelamin','$tgl','$alamat','$asam','$gula','$kolesterol')");

  if ($query){
    echo "<script>
    Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {
      if (result.value) {
        window.location = 'pendaftaran.php';
      }
    })</script>";
  }else{
    echo "<script>
    Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {
      if (result.value) {
        window.location = 'tambahpendaftaran.php';
      }
    })</script>";
  }
}
?>