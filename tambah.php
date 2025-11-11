<?php include 'koneksi.php'; ?>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_alat'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];
    $tanggal = $_POST['tanggal_pembelian'];
    $riwayat = $_POST['riwayat_perbaikan'];

    $query = "INSERT INTO alat (nama_alat, jumlah, kondisi, tanggal_pembelian, riwayat_perbaikan)
              VALUES ('$nama', '$jumlah', '$kondisi', '$tanggal', '$riwayat')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Alat Rumah Sakit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="max-w-lg mx-auto mt-10 bg-white shadow-xl rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Tambah Data Alat Rumah Sakit</h1>

    <form action="" method="POST" class="space-y-4">
        <div>
            <label class="block font-medium mb-1">Nama Alat</label>
            <input type="text" name="nama_alat" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
        </div>

        <div>
            <label class="block font-medium mb-1">Jumlah</label>
            <input type="number" name="jumlah" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
        </div>

        <div>
            <label class="block font-medium mb-1">Kondisi</label>
            <select name="kondisi" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
                <option value="">-- Pilih Kondisi --</option>
                <option value="Baik">Baik</option>
                <option value="Perlu Servis">Perlu Servis</option>
                <option value="Rusak">Rusak</option>
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Tanggal Pembelian</label>
            <input type="date" name="tanggal_pembelian" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
        </div>

        <div>
            <label class="block font-medium mb-1">Riwayat Perbaikan</label>
            <textarea name="riwayat_perbaikan" rows="3"
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none"></textarea>
        </div>

        <div class="flex justify-between mt-6">
            <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <button type="submit" name="simpan"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>

</body>
</html>
