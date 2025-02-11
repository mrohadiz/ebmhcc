    <html>
        <head>
            <title>Laporan Hasil Pemeriksaan</title>
        </head>
<body>
    <center><h3>LAPORAN HASIL PEMERIKSAAN KESEHATAN</h3></center>
    <table border="1" style="border-collapse: collapse;" cellpadding="1" cellspacing="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Tgl. Periksa</th>
            <th>Hasil Tekanan Darah</th>
            <th>Hasil Asam Urat</th>
            <th>Hasil Gula Darah</th>
            <th>Hasil Kolesterol</th>
            <th>Hasil Hemoglobin</th>
    </tr>
    <?php
    include "koneksi.php";
    $no=1;
    $query=mysqli_query($koneksi,"select * from tb_daftar d JOIN 
    tb_pemeriksaan p ON d.id_daftar=p.id_daftar order by id_pemeriksaan asc");
    while($data=mysqli_fetch_array($query)){
    ?>
    <tr align="center">
        <td><?php echo $no++;?></td>
        <td><?php echo $data['nama'];?></td>
        <td><?php echo $data['usia'];?></td>
        <td><?php echo $data['alamat'];?></td>
        <td><?php echo $data['jenis_kelamin'];?></td>
        <td><?php echo $data['tgl_pemeriksaan'];?></td>
        <td><?php echo $data['tekanan_darah'];?></td>
        <td><?php echo $data['asam_urat'];?> mg/dl</td>
        <td><?php echo $data['gula_darah'];?> mg/dl</td>
        <td><?php echo $data['kolesterol'];?> mg/dl</td>
        <td><?php echo $data['hemoglobin'];?> mg/dl</td>
    </tr>
    <?php
    }
    ?>
    </table>
    <script>
		window.print();
	</script>