<?php include 'config/db.php'; ?>
<?php include 'views/header.php'; ?>
<?php include 'views/navbar.php'; ?>

<div class="row">
  <div class="col-md-8">
    <div class="card card-quiet mb-3 p-3">
      <h2 class="brand">Pengendalian Biaya Produksi</h2>
      <p class="text-muted">Praktik 4 — SQL: GROUP BY, HAVING, SUM, AVG, MAX, MIN. Pilih menu untuk melihat laporan.</p>
      <div class="d-flex gap-2 flex-wrap">
        <a href="pages/laporan_per_pesanan.php" class="btn btn-outline-success btn-sm">Per Pesanan</a>
        <a href="pages/laporan_per_bulan.php" class="btn btn-outline-success btn-sm">Per Bulan</a>
        <a href="pages/laporan_per_produk.php" class="btn btn-outline-success btn-sm">Per Produk</a>
        <a href="pages/penghitungan_biaya.php" class="btn btn-outline-success btn-sm">Penghitungan</a>
        <a href="pages/statistik_biaya.php" class="btn btn-outline-success btn-sm">Statistik</a>
        <a href="pages/biaya_sepatu.php" class="btn btn-outline-success btn-sm">Sepatu</a>
        <a href="pages/biaya_lebih20.php" class="btn btn-outline-success btn-sm">>20 Juta</a>
        <a href="pages/top3_biaya.php" class="btn btn-outline-success btn-sm">Top 3</a>
      </div>
    </div>
  </div>
  <div class="card">
  <div class="card-header bg-light">
    <strong>Panduan Penggunaan</strong>
  </div>
  <div class="card-body text-secondary">
    <ol>
      <li>Buka <code>phpMyAdmin</code> dan buat database <code>PengendalianBiaya</code>.</li>
      <li>Jalankan perintah <code>CREATE TABLE</code> dan <code>INSERT</code> data sesuai tugas Praktik 4.</li>
      <li>Pastikan koneksi di <code>config/db.php</code> sudah sesuai (username, password, nama DB).</li>
      <li>Setelah itu, akses aplikasi di browser melalui <code>http://localhost/pengendalian-biaya-app/</code>.</li>
    </ol>
  </div>
</div>


<?php include 'views/footer.php'; ?>