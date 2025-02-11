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
                            <div class="card-header">
                                <a class="btn btn-primary btn-sm" href="tambahpendaftaran.php" role="button"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Usia</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Pemeriksaan</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            $query=mysqli_query($koneksi,"select * from tb_daftar order by id_daftar desc");
                                            while($data=mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['usia'];?></td>
                                            <td><?php echo $data['jenis_kelamin'];?></td>
                                            <td><?php $tanggal=$data['tgl_pemeriksaan']; echo $tgl=date("d-m-Y",strtotime($tanggal));?></td>
                                            <td><?php echo $data['alamat'];?></td>
                                            <td>
                                                <?php if($data['status']=="terdaftar"){?>
                                                    <span class="badge text-bg-primary"><?php echo $data['status'];?></span>
                                                <?php }else { ?>
                                                    <span class="badge text-bg-success"><?php echo $data['status'];?></span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" title="pemeriksaan" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $data['id_daftar']; ?>">
                                                    <i class="fas fa-medkit"></i>
                                                </button>
                                                <a class="btn btn-warning btn-sm" href="editpendaftaran.php?id=<?php echo $data['id_daftar'];?>" role="button" title="Edit data"><i class="fas fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" title="Hapus data" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo $data['id_daftar']; ?>">
                                                <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <a class="btn btn-default btn-sm" target="_blank" href="cetak_pendaftaran.php?id=<?php echo $data['id_daftar'];?>" role="button" title="Print Pendaftaran"><i class="fas fa-print"></i></a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?php echo $data['id_daftar'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pemeriksaan</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                <div class="modal-body">
                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <input type="hidden" name="id_daftar" value="<?php echo $data['id_daftar'];?>">
                                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" value="<?php echo $data['nama'];?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Hasil Tekanan Darah</label>
                                            <input type="text" name="tekanan_darah" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Data Angka" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Hasil Cek Asam Urat</label>
                                            <input type="text" name="asam_urat" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Data Angka" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Hasil Cek Gula Darah</label>
                                            <input type="text" name="gula_darah" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Data Angka" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Hasil Cek Kolesterol</label>
                                            <input type="text" name="kolesterol" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Data Angka" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Hasil Cek Hemoglobin</label>
                                            <input type="text" name="hemoglobin" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Data Angka" required>
                                        </div>
                                         </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="hapusModal<?php echo $data['id_daftar'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                <div class="modal-body">
                                                    Apakah anda ingin menghapus data ini?
                                                <div class="modal-footer">
                                                    <form action="" method="POST">
                                                    <input type="hidden" name="id_daftar" value="<?php echo $data['id_daftar'];?>">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" name="hapus" class="btn btn-primary">Simpan</button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <?php
                                            }?>
                                    </tbody>
                                </table>
                                        </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php
    include "footer.php";
    if(isset($_POST['simpan'])){
    $id_daftar=$_POST['id_daftar'];
    $tekanan_darah=$_POST['tekanan_darah'];
    $asam_urat=$_POST['asam_urat'];
    $gula_darah=$_POST['gula_darah'];
    $kolesterol=$_POST['kolesterol'];
    $hemoglobin=$_POST['hemoglobin'];

    $query=mysqli_query($koneksi,"insert into tb_pemeriksaan(id_daftar,tekanan_darah,asam_urat,gula_darah,kolesterol,hemoglobin)
    values('$id_daftar','$tekanan_darah','$asam_urat','$gula_darah','$kolesterol','$hemoglobin')");
    if ($query){
        mysqli_query($koneksi,"update tb_daftar set status='sudah periksa' where id_daftar='$id_daftar'");
        echo "<script>
        Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
            window.location = 'pemeriksaan.php';
          }
        })</script>";
      }else{
        echo "<script>
        Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
            window.location = 'pendaftaran.php';
          }
        })</script>";
      }
    }
    if(isset($_POST['hapus'])){
        $id=$_POST['id_daftar'];
    $query=mysqli_query($koneksi,"delete tb_daftar, tb_pemeriksaan
    from tb_daftar INNER JOIN tb_pemeriksaan
    ON tb_daftar.id_daftar=tb_pemeriksaan.id_daftar
    where tb_daftar.id_daftar='$id'");
    if ($query){
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
            window.location = 'pendaftaran.php';
          }
        })</script>";
      }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
            window.location = 'pendaftaran.php';
          }
        })</script>";
      }
    }
?>             