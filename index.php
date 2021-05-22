<html>
<head>
	<title>Pelatihan hari pertama RND diulang dihari ke-2</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
</head>
<body>
	<div class="judul">		
		<h1>Membuat CRUD Dengan PHP Dan MySQL</h1>
		<h2>Menampilkan data dari database</h2>
		<h3>www.malasngoding.com</h3>
	</div>
	<br/>
 
	<?php 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}else if($pesan == "update"){
			echo "Data berhasil di update.";
		}else if($pesan == "hapus"){
			echo "Data berhasil di hapus.";
		}
	}
	?>
	<br/>
	<a class="tombol" href="input.php">+ Tambah Data Baru</a>
 
	<h3>Data user</h3>
	<table border="1" class="table">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Pekerjaan</th>
			<th>Opsi</th>		
		</tr>
		<?php 
		include "koneksi.php";
		$sql = "SELECT * FROM user";
		$query_mysql = mysqli_query($host, $sql) or die(mysqli_error());
		$nomor = 1;
		while($data = mysqli_fetch_array($query_mysql)){
		?>
		<tr>
			<td><?php echo $nomor++; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['alamat']; ?></td>
			<td><?php echo $data['pekerjaan']; ?></td>
			<td>
				<a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
				<!-- <a class="hapus" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>					 -->
				<a class="hapus" href="#" onclick="onHapus(<?php echo $data['id']; ?>)">Hapus</a>					
				<a class="hapus" href="#" onclick="testAlert()">Alert</a>					
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>

<script type="text/javascript">
	
function onHapus(id) {
	// alert('hello on hapus' + id);
	if (confirm('Anda yakin untuk menghapus id '+id)) {
		document.location.href='hapus.php?id='+id;
		alert(id+ ' telah terhapus');
		document.location.href='index.php';
	}
}

function testAlert() {
	Swal.fire('Any fool can use a computer')
}

</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.all.min.js"></script>