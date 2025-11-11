<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_alat = $_POST['nama_alat'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];
    $tanggal_pembelian = $_POST['tanggal_pembelian'];
    $riwayat_perbaikan = $_POST['riwayat_perbaikan'];

    $query = "INSERT INTO alat (nama_alat, jumlah, kondisi, tanggal_pembelian, riwayat_perbaikan)
              VALUES ('$nama_alat', '$jumlah', '$kondisi', '$tanggal_pembelian', '$riwayat_perbaikan')";

    if (mysqli_query($conn, $query)) {
        header("Location: tambah.php?sukses=1");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Alat Rumah Sakit</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-2xl rounded-2xl p-10 w-full max-w-2xl">
  <h2 class="text-3xl font-extrabold text-center text-blue-700 mb-8">➕ Tambah Data Alat Rumah Sakit</h2>

  <form action="" method="POST" class="space-y-6">
    <div>
      <label class="block text-gray-700 font-semibold mb-2">Nama Alat</label>
      <input type="text" name="nama_alat" required
             class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none p-3">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-2">Jumlah</label>
      <input type="number" name="jumlah" min="1" required
             class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none p-3">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-2">Kondisi</label>
      <select name="kondisi" required
              class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none p-3">
        <option value="">-- Pilih Kondisi --</option>
        <option value="Baik">Baik</option>
        <option value="Perlu Servis">Perlu Servis</option>
        <option value="Rusak">Rusak</option>
      </select>
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-2">Tanggal Pembelian</label>
      <input type="date" name="tanggal_pembelian" required
             class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none p-3">
    </div>

    <div>
      <label class="block text-gray-700 font-semibold mb-2">Riwayat Perbaikan</label>
      <textarea name="riwayat_perbaikan" rows="3"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none p-3"></textarea>
    </div>

    <div class="flex justify-between items-center pt-4">
      <a href="index.php"
         class="bg-gray-400 text-white px-5 py-2 rounded-lg hover:bg-gray-500 transition shadow">
         ⬅️ Kembali
      </a>
      <button type="submit"
              class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition shadow-lg">
              💾 Simpan
      </button>
    </div>
  </form>
</div>

<!-- Notifikasi sukses -->
<?php if (isset($_GET['sukses'])) { ?>
<script>
Swal.fire({
  title: 'Berhasil!',
  text: 'Data alat berhasil ditambahkan!',
  icon: 'success',
  confirmButtonColor: '#3085d6',
  confirmButtonText: 'OK'
}).then(() => {
  window.location.href = 'index.php';
});
</script>
<?php } ?>

</body>
</html>
