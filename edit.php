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
  <title>Edit Data Alat Rumah Sakit</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-2xl">
  <h1 class="text-3xl font-extrabold text-center text-blue-700 mb-6">Edit Data Alat Rumah Sakit</h1>
  <p class="text-center text-gray-600 mb-8">Perbarui data alat dengan informasi terbaru di bawah ini.</p>

  <form method="POST" class="space-y-5">
    <!-- Nama Alat -->
    <div>
      <label class="block font-semibold text-gray-700 mb-2">Nama Alat</label>
      <input type="text" name="nama_alat" value="<?= htmlspecialchars($row['nama_alat']) ?>" required
             class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition">
    </div>

    <!-- Jumlah -->
    <div>
      <label class="block font-semibold text-gray-700 mb-2">Jumlah</label>
      <input type="number" name="jumlah" value="<?= $row['jumlah'] ?>" required
             class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition">
    </div>

    <!-- Kondisi -->
    <div>
      <label class="block font-semibold text-gray-700 mb-2">Kondisi</label>
      <select name="kondisi" required
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition">
        <option value="Baik" <?= $row['kondisi']=='Baik'?'selected':'' ?>>Baik</option>
        <option value="Perlu Servis" <?= $row['kondisi']=='Perlu Servis'?'selected':'' ?>>Perlu Servis</option>
        <option value="Rusak" <?= $row['kondisi']=='Rusak'?'selected':'' ?>>Rusak</option>
      </select>
    </div>

    <!-- Tanggal Pembelian -->
    <div>
      <label class="block font-semibold text-gray-700 mb-2">Tanggal Pembelian</label>
      <input type="date" name="tanggal_pembelian" value="<?= $row['tanggal_pembelian'] ?>" required
             class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition">
    </div>

    <!-- Riwayat Perbaikan -->
    <div>
      <label class="block font-semibold text-gray-700 mb-2">Riwayat Perbaikan</label>
      <textarea name="riwayat_perbaikan" rows="4"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition"><?= htmlspecialchars($row['riwayat_perbaikan']) ?></textarea>
    </div>

    <!-- Tombol Aksi -->
    <div class="flex justify-between items-center mt-8">
      <a href="index.php"
         class="bg-gray-500 text-white px-5 py-2.5 rounded-lg hover:bg-gray-600 transition flex items-center gap-2">
         ← Kembali
      </a>
      <button type="submit" name="update"
              class="bg-blue-600 text-white px-6 py-2.5 rounded-lg hover:bg-blue-700 shadow-md hover:shadow-xl transition-all">
        💾 Simpan Perubahan
      </button>
    </div>
  </form>
</div>

</body>
</html>
