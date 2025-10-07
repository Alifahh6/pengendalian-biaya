<?php include '../config/db.php'; ?>
<?php include '../views/header.php'; ?>
<?php include '../views/navbar.php'; ?>

<h3 class="mb-3">Top 3 Kelompok Biaya Terbesar</h3>
<div class="card p-3 mb-4">
<div class="table-responsive">
<table class="table table-bordered table-striped">
  <thead><tr><th>Kelompok</th><th>Produk</th><th>Nomor</th><th>JumlahBiaya</th></tr></thead>
  <tbody>
<?php
$sql = "SELECT Kelompok AS KelompokBiaya, A.JenisProduk, A.NomorPesanan, SUM(Jumlah) AS JumlahBiaya
        FROM KartuPesanan A INNER JOIN RincianBiaya B ON A.NomorPesanan = B.NomorPesanan
        GROUP BY A.NomorPesanan, A.JenisProduk, Kelompok
        ORDER BY SUM(Jumlah) DESC
        LIMIT 3";
try {
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>'.htmlspecialchars($row['KelompokBiaya']).'</td>';
        echo '<td>'.htmlspecialchars($row['JenisProduk']).'</td>';
        echo '<td>'.htmlspecialchars($row['NomorPesanan']).'</td>';
        echo '<td>Rp '.number_format($row['JumlahBiaya'],0,',','.').'</td>';
        echo '</tr>';
    }
} catch (Exception $e) {
    echo '<tr><td colspan="4">Error: '.htmlspecialchars($e->getMessage()).'</td></tr>';
}
?>
  </tbody>
</table>
</div></div>

<?php include '../views/footer.php'; ?>