<?php
include 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM alat");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Alat Rumah Sakit</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen">

<div class="container mx-auto py-10 px-6">
  <h1 class="text-4xl font-extrabold text-blue-700 mb-8 text-center">📋 Data Alat Rumah Sakit</h1>

  <div class="overflow-x-auto bg-white shadow-xl rounded-xl p-6">
    <a href="tambah.php"
       class="inline-block mb-6 bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition shadow">
       ➕ Tambah Alat
    </a>

    <table class="min-w-full text-sm text-left border border-gray-200">
      <thead class="bg-blue-600 text-white">
        <tr>
          <th class="py-3 px-4">ID</th>
          <th class="py-3 px-4">Nama Alat</th>
          <th class="py-3 px-4">Jumlah</th>
          <th class="py-3 px-4">Kondisi</th>
          <th class="py-3 px-4">Tanggal Pembelian</th>
          <th class="py-3 px-4">Riwayat Perbaikan</th>
          <th class="py-3 px-4 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr class="hover:bg-blue-50 transition">
            <td class="py-3 px-4"><?= $row['id'] ?></td>
            <td class="py-3 px-4"><?= htmlspecialchars($row['nama_alat']) ?></td>
            <td class="py-3 px-4"><?= $row['jumlah'] ?></td>
            <td class="py-3 px-4">
              <?php
                $badgeColor = match($row['kondisi']) {
                    'Baik' => 'bg-green-100 text-green-700',
                    'Perlu Servis' => 'bg-yellow-100 text-yellow-700',
                    'Rusak' => 'bg-red-100 text-red-700',
                    default => 'bg-gray-100 text-gray-700'
                };
              ?>
              <span class="px-3 py-1 rounded-full text-xs font-semibold <?= $badgeColor ?>">
                <?= $row['kondisi'] ?>
              </span>
            </td>
            <td class="py-3 px-4"><?= $row['tanggal_pembelian'] ?></td>
            <td class="py-3 px-4"><?= htmlspecialchars($row['riwayat_perbaikan']) ?></td>
            <td class="py-3 px-4 text-center">
              <a href="edit.php?id=<?= $row['id'] ?>"
                 class="bg-yellow-500 text-white px-3 py-1.5 rounded-lg hover:bg-yellow-600 transition mr-2">✏️ Edit</a>
              <button onclick="konfirmasiHapus(<?= $row['id'] ?>)"
                      class="bg-red-600 text-white px-3 py-1.5 rounded-lg hover:bg-red-700 transition">🗑️ Hapus</button>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script>
function konfirmasiHapus(id) {
  Swal.fire({
    title: 'Yakin hapus data ini?',
    text: "Data yang sudah dihapus tidak bisa dikembalikan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Ya, hapus!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      // Redirect ke hapus.php
      window.location.href = "hapus.php?id=" + id;
    }
  });
}

<?php if (isset($_GET['hapus']) && $_GET['hapus'] == 'sukses') { ?>
Swal.fire({
  title: 'Berhasil!',
  text: 'Data alat telah dihapus.',
  icon: 'success',
  confirmButtonColor: '#3085d6',
  confirmButtonText: 'OK'
});
<?php } ?>
</script>

</body>
</html>
