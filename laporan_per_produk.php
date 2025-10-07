<?php include '../config/db.php'; ?>
<?php include '../views/header.php'; ?>
<?php include '../views/navbar.php'; ?>

<h3 class="mb-3">Laporan Biaya Langsung Per Produk</h3>
<div class="card p-3 mb-4">
<div class="table-responsive">
<table class="table table-bordered table-striped">
  <thead><tr><th>Produk</th><th>Kelompok</th><th>JumlahBiaya</th></tr></thead>
  <tbody>
<?php
$sql = "SELECT JenisProduk, Kelompok, SUM(Jumlah) AS JumlahBiaya
        FROM KartuPesanan A INNER JOIN RincianBiaya B ON A.NomorPesanan = B.NomorPesanan
        GROUP BY JenisProduk, Kelompok
        ORDER BY JenisProduk, Kelompok";
try {
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>'.htmlspecialchars($row['JenisProduk']).'</td>';
        echo '<td>'.htmlspecialchars($row['Kelompok']).'</td>';
        echo '<td>Rp '.number_format($row['JumlahBiaya'],0,',','.').'</td>';
        echo '</tr>';
    }
} catch (Exception $e) {
    echo '<tr><td colspan="3">Error: '.htmlspecialchars($e->getMessage()).'</td></tr>';
}
?>
  </tbody>
</table>
</div></div>

<?php include '../views/footer.php'; ?>