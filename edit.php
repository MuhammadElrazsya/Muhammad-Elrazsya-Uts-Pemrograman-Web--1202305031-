<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM alat WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama = $_POST['nama_alat'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];
    $tanggal = $_POST['tanggal_pembelian'];
    $riwayat = $_POST['riwayat_perbaikan'];

    $update = "UPDATE alat SET nama_alat='$nama', jumlah='$jumlah', kondisi='$kondisi',
               tanggal_pembelian='$tanggal', riwayat_perbaikan='$riwayat' WHERE id=$id";

    if (mysqli_query($conn, $update)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Alat</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-lg mx-auto mt-10 bg-white shadow-lg rounded-xl p-6">
  <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Edit Data Alat</h1>

  <form method="POST" class="space-y-4">
    <div>
      <label class="block font-medium mb-1">Nama Alat</label>
      <input type="text" name="nama_alat" value="<?= $row['nama_alat'] ?>" required
             class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
    </div>

    <div>
      <label class="block font-medium mb-1">Jumlah</label>
      <input type="number" name="jumlah" value="<?= $row['jumlah'] ?>" required
             class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
    </div>

    <div>
      <label class="block font-medium mb-1">Kondisi</label>
      <select name="kondisi" required
              class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
        <option value="Baik" <?= $row['kondisi']=='Baik'?'selected':'' ?>>Baik</option>
        <option value="Perlu Servis" <?= $row['kondisi']=='Perlu Servis'?'selected':'' ?>>Perlu Servis</option>
        <option value="Rusak" <?= $row['kondisi']=='Rusak'?'selected':'' ?>>Rusak</option>
      </select>
    </div>

    <div>
      <label class="block font-medium mb-1">Tanggal Pembelian</label>
      <input type="date" name="tanggal_pembelian" value="<?= $row['tanggal_pembelian'] ?>" required
             class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
    </div>

    <div>
      <label class="block font-medium mb-1">Riwayat Perbaikan</label>
      <textarea name="riwayat_perbaikan" rows="3"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none"><?= $row['riwayat_perbaikan'] ?></textarea>
    </div>

    <div class="flex justify-between mt-6">
      <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
      <button type="submit" name="update"
              class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
    </div>
  </form>
</div>

</body>
</html>
