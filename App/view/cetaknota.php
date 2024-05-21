<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Nota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .nota {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
        }
        .nota h4 {
            text-align: center;
        }
        .nota h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .nota table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .nota table, .nota th, .nota td {
            border: 1px solid #ddd;
        }
        .nota th, .nota td {
            padding: 8px;
            text-align: left;
        }
        .nota th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="nota">
        <h2> DigitalDreams</h2>
        <h4> JL. Mugarsari, Tamansari, Kota Tasikmallaya </h4>
        <h3>Nota Transaksi</h3>
        <p>ID Transaksi: <?php echo $transaksi['id_transaksi']; ?></p>
        <p>Tanggal: <?php echo $transaksi['tanggal']; ?></p>
        <table>
            <thead>
                <tr>
                    <th>#ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Harga Jual</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($detailTransaksi as $detail) {
                    $subtotal = $detail['qty'] * $detail['harga_jual'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><?php echo $detail['id_barang']; ?></td>
                        <td><?php echo $detail['nama_barang']; ?></td>
                        <td><?php echo $detail['qty']; ?></td>
                        <td><?php echo number_format($detail['harga_jual'], 2); ?></td>
                        <td><?php echo number_format($subtotal, 2); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total</th>
                    <th><?php echo number_format($total, 2); ?></th>
                </tr>
                <tr>
                    <th colspan="4">Bayar</th>
                    <th><?php echo number_format($transaksi['bayar'], 2); ?></th>
                </tr>
                <tr>
                    <th colspan="4">Kembalian</th>
                    <th><?php echo number_format($transaksi['kembalian'], 2); ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>
