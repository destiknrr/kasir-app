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
            text-align: center;
        }
        .logo {
            float: left;
            margin-right: 10px;
        }
        .logo img {
            width: 80px; 
            height: auto;
            border-radius: 10px;
        }
        .nota h1 {
            margin-top: 0;
            font-size: 28px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #333;
        }
        .nota p {
            margin: 0;
            color: #666;
            text-align: center;
        }
        .nota hr {
            margin-top: 10px;
            margin-bottom: 20px;
            border-color: #ddd;
        }
        .nota .info {
            margin-bottom: 20px;
            text-align: left;
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
        .nota tfoot th {
            text-align: right;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
            text-align: center;
        }
        .timestamp {
            font-size: 12px;
            color: #999;
        }
        
    </style>
</head>
<body>
    <div class="nota">
        <div class="logo">
            <img src="../assets/images/logo.jpeg" alt="logo">
        </div>
        <h1>DigitalDream Laptop</h1>
        <p>Alamat: Jl. Waydream No.127, Kota Neo City Teknologi</p>
        <p>Telepon: 081578920417</p>
        <hr>
        <h2>Nota Transaksi</h2>
        <div class="info">
            <p style="text-align: left;">ID Transaksi: <?php echo $transaksi['id_transaksi']; ?></p>
            <p style="text-align: left;">Tanggal: <?php echo $transaksi['tanggal']; ?></p>
        </div>
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
        <div class="footer">
            <p>Terima kasih telah berbelanja di DigitalDream Laptop!</p>
            <!-- <p class="timestamp">Cetak Nota: <?php echo date('d-m-Y H:i:s'); ?></p> -->
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>
