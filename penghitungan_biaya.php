<?php include '../config/db.php'; ?>
<?php include '../views/header.php'; ?>
<?php include '../views/navbar.php'; ?>

<h3 class="mb-3">Penghitungan Biaya Per Pesanan</h3>
<div class="card p-3 mb-4">
<div class="table-responsive">
<table class="table table-bordered table-striped">
  <thead><tr><th>Nomor</th><th>Produk</th><th>JmlPesanan</th><th>BiayaLangsung</th><th>OverHead</th><th>TotalBiaya</th><th>Biaya/Unit</th></tr></thead>
  <tbody>
<?php
$sql = "SELECT A.NomorPesanan, JenisProduk, JmlPesanan,
               SUM(Jumlah) AS BiayaLangsung,
               SUM(Jumlah) * 0.30 AS BiayaOverHead,
               SUM(Jumlah) * 1.30 AS TotalBiaya,
               (SUM(Jumlah) * 1.30) / JmlPesanan AS BiayaPerUnit
        FROM KartuPesanan A INNER JOIN RincianBiaya B ON A.NomorPesanan = B.NomorPesanan
        GROUP BY A.NomorPesanan, JenisProduk, JmlPesanan
        ORDER BY A.NomorPesanan";
try {
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>'.htmlspecialchars($row['NomorPesanan']).'</td>';
        echo '<td>'.htmlspecialchars($row['JenisProduk']).'</td>';
        echo '<td>'.htmlspecialchars($row['JmlPesanan']).'</td>';
        echo '<td>Rp '.number_format($row['BiayaLangsung'],0,',','.').'</td>';
        echo '<td>Rp '.number_format($row['BiayaOverHead'],0,',','.').'</td>';
        echo '<td>Rp '.number_format($row['TotalBiaya'],0,',','.').'</td>';
        echo '<td>Rp '.number_format($row['BiayaPerUnit'],0,',','.').'</td>';
        echo '</tr>';
    }
} catch (Exception $e) {
    echo '<tr><td colspan="7">Error: '.htmlspecialchars($e->getMessage()).'</td></tr>';
}
?>
  </tbody>
</table>
</div></div>

<?php include '../views/footer.php'; ?>