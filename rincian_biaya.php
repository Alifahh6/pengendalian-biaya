<?php
// Hubungkan ke database dan template tampilan
include '../config/db.php';
include '../views/header.php';
include '../views/navbar.php';
?>

<div class="container mt-4">
  <h4 class="text-success fw-bold mb-3">Data Rincian Biaya</h4>

  <?php
  try {
      // Ambil data dari tabel RincianBiaya
      $query = $pdo->query("SELECT * FROM RincianBiaya ORDER BY IdBiaya ASC");
      $data = $query->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
      $data = [];
  }
  ?>

  <table class="table table-bordered table-hover align-middle">
    <thead class="table-success text-center">
      <tr>
        <th>ID Biaya</th>
        <th>Nomor Pesanan</th>
        <th>Tanggal</th>
        <th>Kelompok</th>
        <th>Sub Kelompok</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($data) > 0): ?>
        <?php foreach ($data as $row): ?>
          <tr>
            <td class="text-center"><?= htmlspecialchars($row['IdBiaya']) ?></td>
            <td class="text-center"><?= htmlspecialchars($row['NomorPesanan']) ?></td>
            <td><?= htmlspecialchars($row['Tanggal']) ?></td>
            <td><?= htmlspecialchars($row['Kelompok']) ?></td>
            <td><?= htmlspecialchars($row['SubKelompok']) ?></td>
            <td class="text-end">Rp <?= number_format($row['Jumlah'], 0, ',', '.') ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center text-muted py-3">
            Tidak ada data Rincian Biaya.
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php include '../views/footer.php'; ?>
