<html>
<head>
<title>Hasil Pemeriksaan</title>
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
</head>
<body style='font-family:tahoma; font-size:8pt;'>
    <?php
        include "koneksi.php";
        $id=$_GET['id'];
        $query=mysqli_query($koneksi,"select * from tb_daftar d JOIN tb_pemeriksaan p
        ON d.id_daftar=p.id_daftar Where p.id_pemeriksaan='$id'");
        $data=mysqli_fetch_array($query);

    ?>
<center>
    <table style='width:350px; font-size:13pt; font-family:calibri; border-collapse: collapse;' border = '1'>
        <td rowspan="2" align="center"><img src="assets/img/logobm.png" width="60px"></td>    
            <td width='70%' align='CENTER' vertical-align:top'><span style='color:black;'>
            <b>BHAKTI MULIA HEALTH CENTER CARE</b></br>Jl. Matahari, Tulungrejo, Pare</span></br>
        </td>
</table>
<style>
hr { 
    display: block;
    margin-top: 0;
    margin-bottom: 0;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
} 
table {
  border-collapse: collapse;
}
</style>
<table cellspacing='0' cellpadding='0' style='width:350px; font-size:11pt; font-family:calibri;  border-collapse: collapse;' border='0'>
<tr align='center'>
    <td colspan="4" style=margin-top:0px; margin-bottom:0px; ><h3>KARTU PEMERIKSAAN</h3></td>
</tr>
<tr>
    <td colspan="4" style=margin-top:0px; margin-bottom:0px;>Nama : <?php echo $data['nama'];?></td>
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

    <b><table border="1" width="350px" style="font-size:11pt">
        <tr align="center">
            <th>No</th>
            <th>Pemeriksaan</th>
            <th>Hasil</th>
            <th>Normal</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Tekanan Darah</td>
            <td align="center"><b><?php echo $data['tekanan_darah'];?></b></td>
            <td></td>
        </tr>
        <tr>
            <td rowspan="2">2</td>
            <td rowspan="2">Asam Urat</td>
            <td rowspan="2" align="center"><b><?php echo $data['asam_urat'];?></b></td>
            <td>Pria: < 7 mg/dl</td>
            </tr>
            <tr>
            <td>Wanita: < 6 mg/dl</td>
        </tr>
        <tr>
            <td rowspan="3">3</td>
            <td rowspan="3">Gula Darah</td>
            <td rowspan="3" align="center"><b><?php echo $data['gula_darah'];?></b></td>
            <td>Puasa: 70-110 mg/dl</td>
            </tr>
            <tr>
            <td>2 jam sesudah makan: <br> 100-150 mg/dl</td>
        </tr>
        <tr>
            <td>Acak: 70-125 mg/dl</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Kolesterol</td>
            <td align="center"><b><?php 
            if($data['kolesterol']=="0"){
                echo "-";
            }else{
                echo $data['kolesterol'];
            }?>
            </b></td>
            <td>< 200 mg/dl</td>
        </tr>
        <tr>
            <td rowspan="2">5</td>
            <td rowspan="2">Hemoglobin</td>
            <td rowspan="2" align="center"><b><?php 
             if($data['hemoglobin']=="0"){
                echo "-";
            }else{
                echo $data['hemoglobin'];
            }?>
          </b></td>
            <td>Pria: 14-18 g/dl</td>
        </tr>
        <tr>
            <td>Wanita: 12-16 g/dl</td>
        </tr>
    </table>
</b>

<table style='width:350; font-size:10pt;' cellspacing='2'style=margin-top:0px; margin-bottom:0px;><tr></br><td align='center'>****** TERIMAKASIH ******</br></td></tr>
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