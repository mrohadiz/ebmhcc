<?php
    include "header.php";
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Beranda</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Beranda</li>
                        </ol>
                         <!-- Content Row -->
                    <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Terdaftar</div>
                        <?php 
                            $q1=mysqli_query($koneksi,"select count(id_daftar) as total from tb_daftar");
                            $d1=mysqli_fetch_array($q1);
                        ?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $d1['total'];?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Sudah Periksa</div>
                        <?php 
                            $q2=mysqli_query($koneksi,"select count(id_daftar) as total from tb_daftar where status='sudah periksa'");
                            $d2=mysqli_fetch_array($q2);
                        ?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $d2['total'];?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-medkit fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
   
</div>



                       
                        
                    </div>
                </main>
<?php
    include "footer.php";
?>