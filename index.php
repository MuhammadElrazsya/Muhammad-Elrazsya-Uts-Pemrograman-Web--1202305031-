<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Alat Rumah Sakit</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="max-w-5xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-6">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-blue-700">Data Alat Rumah Sakit</h1>
    <a href="tambah.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">+ Tambah Data</a>
  </div>

  <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
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
    <tbody>
      <?php
      $no = 1;
      $result = mysqli_query($conn, "SELECT * FROM alat ORDER BY id DESC");
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr class="border-b hover:bg-gray-50">
        <td class="py-3 px-4"><?php echo $no++; ?></td>
        <td class="py-3 px-4"><?php echo htmlspecialchars($row['nama_alat']); ?></td>
        <td class="py-3 px-4"><?php echo $row['jumlah']; ?></td>
        <td class="py-3 px-4">
          <?php
          $badge = [
            'Baik' => 'bg-green-100 text-green-700',
            'Perlu Servis' => 'bg-yellow-100 text-yellow-700',
            'Rusak' => 'bg-red-100 text-red-700'
          ];
          echo "<span class='px-3 py-1 rounded-full text-sm font-medium {$badge[$row['kondisi']]}'>
                {$row['kondisi']}</span>";
          ?>
        </td>
        <td class="py-3 px-4"><?php echo $row['tanggal_pembelian']; ?></td>
        <td class="py-3 px-4"><?php echo nl2br(htmlspecialchars($row['riwayat_perbaikan'])); ?></td>
        <td class="py-3 px-4 text-center">
          <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-blue-600 hover:underline">Edit</a> |
          <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin hapus data ini?')" class="text-red-600 hover:underline">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
