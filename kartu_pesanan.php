<?php
// Menghubungkan file konfigurasi database dan template tampilan
include '../config/db.php';
include '../views/header.php';
include '../views/navbar.php';
?>

<div class="container mt-4">
  <h4 class="text-success fw-bold mb-3">Data Kartu Pesanan</h4>

  <?php
  try {
      // Ambil data dari tabel KartuPesanan
      $query = $pdo->query("SELECT * FROM KartuPesanan ORDER BY NomorPesanan ASC");
      $data = $query->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
      $data = [];
  }
  ?>

  <table class="table table-bordered table-hover align-middle">
    <thead class="table-success text-center">
      <tr>
        <th>Nomor Pesanan</th>
        <th>Jenis Produk</th>
        <th>Jumlah Pesanan</th>
        <th>Tanggal Pesanan</th>
        <th>Tanggal Selesai</th>
        <th>Dipesan Oleh</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($data) > 0): ?>
        <?php foreach ($data as $row): ?>
          <tr>
            <td class="text-center"><?= htmlspecialchars($row['NomorPesanan']) ?></td>
            <td><?= htmlspecialchars($row['JenisProduk']) ?></td>
            <td class="text-end"><?= number_format($row['JmlPesanan']) ?></td>
            <td><?= htmlspecialchars($row['TglPesanan']) ?></td>
            <td><?= htmlspecialchars($row['TglSelesai']) ?></td>
            <td><?= htmlspecialchars($row['DipesanOleh']) ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center text-muted py-3">
            Tidak ada data Kartu Pesanan.
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php include '../views/footer.php'; ?>
