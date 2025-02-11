<html>
<head>
<title>Pendaftaran</title>
<style>
 
#tabel
{
font-size:15px;
border-collapse:collapse;
}
#tabel  td
{
padding-left:5px;
border: 1px solid black;
}
</style>
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>
<body style='font-family:tahoma; font-size:8pt;'>
    <?php
        include "koneksi.php";
        $id=$_GET['id'];
        $query=mysqli_query($koneksi,"select * from tb_daftar where id_daftar='$id'");
        $data=mysqli_fetch_array($query);

    ?>
<center>
    
<style>
hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
} 
table {
  border-collapse: collapse;
}
</style>
<table cellspacing='0' cellpadding='0' style='width:350px; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>
<tr align='center'>
    <td colspan="4"><h2>KARTU PENDAFTARAN</h2></td>
</tr>
<tr>
    <td colspan="4">Nama : <?php echo $data['nama'];?></td>
</tr>
<tr>
    <td colspan="4">Usia : <?php echo $data['usia'];?> Tahun</td>
</tr>
<tr>
    <td colspan="4">Jenis Kelamin : <?php echo $data['jenis_kelamin'];?></td>
</tr>
<tr>
    <td colspan="4">Tanggal Pemeriksaan : <?php $tanggal=$data['tgl_pemeriksaan']; echo $tgl=date("d-m-Y",strtotime($tanggal));?></td>
</tr>
</table>
<br/>
    <b><table border="1" width="300px" style="font-size:12pt" cellpadding="5px">
        <tr align="center">
            <th>Pemeriksaan</th>
        </tr>
        
                <?php 
                    if($data['asam_urat']=='1'){?>
                    <tr>
                    <td>
                        <i class="fas fa-check"></i>
                        <?php
                        echo "Asam Urat";
                    }else{

                    }

                ?>
            </td>
                </tr>
               
                <?php 
                    if($data['gula_darah']=='1'){?>
                     <tr>
                     <td>
                        <i class="fas fa-check"></i>
                        <?php
                        echo "Gula Darah";
                    }else{
                        
                    }

                ?>
            </td>
            </tr>
                
           
                <?php 
                    if($data['kolesterol']=='1'){?>
                    <tr>
                     <td>
                    <i class="fas fa-check"></i>
                    <?php
                        echo "Kolesterol";
                    }else{
                        
                    }
                ?>
            </td>
        </tr>
        
    </table>
</b>

<table style='width:350; font-size:10pt;' cellspacing='2'><tr></br><td align='center'>****** TERIMAKASIH ******</br></td></tr>
<tr>
    <td align='center'>
        <h3>Aplikasi Dibuat Oleh: Jurusan Komputer (RPL)</h3>
    </td>
</tr>
</table></center></body>
<script>
		window.print();
	</script>
</html>