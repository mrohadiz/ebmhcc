<?php
    include "header.php";
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pemeriksaan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                            <li class="breadcrumb-item active">Pemeriksaan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a class="btn btn-warning btn-sm" href="cetak_laporan.php" target="_blank" role="button"><i class="fas fa-print"></i> Cetak Laporan</a>
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Usia</th>
                                            <th>Tanggal Pemeriksaan</th>
                                            <th>Hasil Tekanan Darah</th>
                                            <th>Hasil Asam Urat</th>
                                            <th>Hasil Gula Darah</th>
                                            <th>Hasil Kolesterol</th>
                                            <th>Hasil Hemoglobin</th>
                                            <th>Keterangan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            $query=mysqli_query($koneksi,"select * from tb_daftar d JOIN tb_pemeriksaan p
                                            ON d.id_daftar=p.id_daftar order by id_pemeriksaan desc");
                                            while($data=mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['usia'];?></td>
                                            <td><?php $tanggal=$data['tgl_pemeriksaan']; echo $tgl=date("d-m-Y",strtotime($tanggal));?></td>
                                            <td><?php echo $data['tekanan_darah'];?></td>
                                            <td><?php echo $data['asam_urat'];?> mg/dl</td>
                                            <td><?php echo $data['gula_darah'];?> mg/dl</td>
                                            <td><?php echo $data['kolesterol'];?> mg/dl</td>
                                            <td><?php echo $data['hemoglobin'];?> g/dl</td>
                                            <td> 
                                                <?php if($data['status']=="terdaftar"){?>
                                                    <span class="badge text-bg-primary"><?php echo $data['status'];?></span>
                                                <?php }else { ?>
                                                    <span class="badge text-bg-success"><?php echo $data['status'];?></span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-light btn-sm" href="cetak_hasil.php?id=<?php echo $data['id_pemeriksaan'];?>" target="_blank" role="button" title="Cetak Hasil"><i class="fas fa-print"></i></a>
                                            </td>
                                        </tr>
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
?>             