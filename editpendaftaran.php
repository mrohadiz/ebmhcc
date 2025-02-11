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
                                            $id=$_GET['id'];
                                            $query=mysqli_query($koneksi,"select * from tb_daftar where id_daftar='$id'");
                                            $data=mysqli_fetch_array($query);
                                        ?>
                                        <form action="#" method="POST">
                                        <div class="mb-3">
                                            <input type="hidden" name="id_daftar" value="<?php echo $data['id_daftar'];?>">
                                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" value="<?php echo $data['nama'];?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Usia</label>
                                            <input type="number" min="15" name="usia" class="form-control" id="exampleFormControlInput1" value="<?php echo $data['usia'];?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-select" aria-label="Default select example" required>
                                            <?php
         //cek data yg dipilih sebelumnya
        if ($data['jenis_kelamin'] == "Laki-laki") echo "<option value='Laki-laki' selected>Laki-laki</option>";
        else echo "<option value='Laki-laki'>Laki-Laki</option>";
        if ($data['jenis_kelamin'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
        else echo "<option value='Perempuan'>Perempuan</option>";?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Tanggal Pemeriksaan</label>
                                            <input type="date" name="tgl_pemeriksaan" class="form-control" id="exampleFormControlInput1" value="<?php echo $data['tgl_pemeriksaan'];?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" required><?php echo $data['alamat'];?></textarea>
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
$id=$_POST['id_daftar'];
  $nama=$_POST['nama'];
  $usia=$_POST['usia'];
  $jenis_kelamin=$_POST['jenis_kelamin'];
  $alamat=$_POST['alamat'];
  $tgl=$_POST['tgl_pemeriksaan'];
  $query =mysqli_query($koneksi,"update tb_daftar set
  nama='$nama',
  usia='$usia',
  jenis_kelamin='$jenis_kelamin',
  tgl_pemeriksaan='$tgl',
  alamat='$alamat'
  where id_daftar='$id'");

  if ($query){
    echo "<script>
    Swal.fire({title: 'Edit Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {
      if (result.value) {
        window.location = 'pendaftaran.php';
      }
    })</script>";
  }else{
    echo "<script>
    Swal.fire({title: 'Edit Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {
      if (result.value) {
        window.location = 'tambahpendaftaran.php';
      }
    })</script>";
  }
}
?>