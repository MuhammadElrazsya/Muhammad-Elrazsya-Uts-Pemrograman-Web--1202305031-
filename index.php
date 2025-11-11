<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Alat Rumah Sakit</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

<!-- HEADER -->
<header class="bg-blue-700 text-white py-4 shadow-lg">
  <div class="max-w-6xl mx-auto flex items-center justify-between px-6">
    <div class="flex items-center space-x-3">
      <img src="https://cdn-icons-png.flaticon.com/512/2966/2966327.png" alt="Logo RS" class="w-10 h-10">
      <div>
        <h1 class="text-2xl font-bold leading-tight">Rumah Sakit Rasya Ponorogo</h1>
        <p class="text-sm text-blue-100">Sistem Inventarisasi Alat Medis</p>
      </div>
    </div>
    <a href="tambah.php" class="bg-white text-blue-700 font-semibold px-4 py-2 rounded-lg shadow hover:bg-blue-50 transition">
      + Tambah Data
    </a>
  </div>
</header>

<!-- MAIN CONTENT -->
<main class="max-w-6xl mx-auto mt-8 bg-white shadow-lg rounded-xl p-6">
  <h2 class="text-xl font-semibold text-blue-700 mb-4 border-b pb-2">Daftar Alat Rumah Sakit</h2>

  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden text-sm">
      <thead class="bg-blue-600 text-white">
        <tr>
          <th class="py-3 px-4 text-left">No</th>
          <th class="py-3 px-4 text-left">Nama Alat</th>
          <th class="py-3 px-4 text-left">Jumlah</th>
          <th class="py-3 px-4 text-left">Kondisi</th>
          <th class="py-3 px-4 text-left">Tanggal Pembelian</th>
          <th class="py-3 px-4 text-left">Riwayat Perbaikan</th>
          <th class="py-3 px-4 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        <?php
        $no = 1;
        $result = mysqli_query($conn, "SELECT * FROM alat ORDER BY id DESC");
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr class="hover:bg-gray-50 transition">
          <td class="py-3 px-4"><?php echo $no++; ?></td>
          <td class="py-3 px-4 font-medium"><?php echo htmlspecialchars($row['nama_alat']); ?></td>
          <td class="py-3 px-4"><?php echo $row['jumlah']; ?></td>
          <td class="py-3 px-4">
            <?php
              $badge = [
                'Baik' => 'bg-green-100 text-green-700',
                'Perlu Servis' => 'bg-yellow-100 text-yellow-700',
                'Rusak' => 'bg-red-100 text-red-700'
              ];
              echo "<span class='px-3 py-1 rounded-full text-xs font-semibold {$badge[$row['kondisi']]}'>
                      {$row['kondisi']}
                    </span>";
            ?>
          </td>
          <td class="py-3 px-4"><?php echo date('d M Y', strtotime($row['tanggal_pembelian'])); ?></td>
          <td class="py-3 px-4"><?php echo nl2br(htmlspecialchars($row['riwayat_perbaikan'])); ?></td>
          <td class="py-3 px-4 text-center">
            <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-blue-600 font-medium hover:underline">Edit</a>
            <span class="text-gray-400 mx-1">|</span>
            <a href="hapus.php?id=<?php echo $row['id']; ?>"
               onclick="return confirm('Yakin hapus data ini?')"
               class="text-red-600 font-medium hover:underline">Hapus</a>
          </td>
        </tr>
        <?php
          }
        } else {
          echo "<tr><td colspan='7' class='text-center py-6 text-gray-500 italic'>Belum ada data alat</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</main>

<!-- FOOTER -->
<footer class="mt-10 text-center text-gray-500 text-sm pb-6">
  &copy; <?php echo date('Y'); ?> Rumah Sakit Sehat Sentosa. Semua Hak Dilindungi.
</footer>

</body>
</html>
