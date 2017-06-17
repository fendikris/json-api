<html
<body>
	<form action="parsing.php" method="POST" enctype="multipart/from=data">
	<div align="center">
	<h2>Input Data Mahasiswa</h2>
	<table border="0" cellspacing="3px" align="center">
		<tr>
			<td>NRP</td>
			<td>
			<input type="number" name="nrp"></input>
			</td>
		</tr>
		<tr>
			<td>Nama Mahasiswa</td>
			<td>
			<input type="text" name="nama"></input>
			</td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td>
			<input type="text" name="jurusan" ></input>
			</td>
		</tr>
		<tr>
			<td>Jenis Kelamin </td>
			<td>
			<input type="radio" name="jenis_kelamin" value="Pria" checked>Laki-Laki
			<input type="radio" name="jenis_kelamin" value="Perempuan" checked>Perempuan
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
			<input type="submit" name="submit" value="SAVE">
			<input type="reset" name="reset" value="RESET">
			<input type="submit" name="load" value="LOAD">
		</tr>
	</table>
	</form>
</body>
</html>

<?php
include 'koneksi.php';

	$nrp = isset($_POST['nrp']) ? $_POST['nrp']: '';
	$nama = isset($_POST['nama']) ? $_POST['nama']: '';
	$jurusan = isset($_POST['jurusan']) ? $_POST['jurusan']: '';
	$jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin']: '';
	
if(isset($_POST["submit"])) {
	$query = "insert into data_mhs(nrp,nama,jurusan,jenis_kelamin) values ('$nrp','$nama','$jurusan','$jenis_kelamin')";
	mysql_query($query);
	echo "Data Tersimpan,$query";
}
	$tab_name = "data_mhs";
	$query = "select * from $tab_name";
	$result = mysql_query($query);
	$field_count = mysql_num_fields($result);
	$sitejson = array();
	
	while($data=mysql_fetch_array($result)){
		$sitejson[]=array(
			'nrp' => $data['nrp'],
			'nama' => $data['nama'],
			'jurusan' => $data['jurusan'],
			'jenis_kelamin' => $data['jenis_kelamin']);
	}
	$file = fopen('mahasiswa.json','w');
	fwrite($file,json_encode($sitejson));
	fclose($file);
?>