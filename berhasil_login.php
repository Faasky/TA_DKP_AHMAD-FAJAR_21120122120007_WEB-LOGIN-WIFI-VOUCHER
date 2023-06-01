<!DOCTYPE html>
<html>

<head>
    <title>Login Berhasil</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">

</head>

<body class="berhasil-login">
    <header id="header">
        <div class="logo">
            <img src="css/image/welcome.svg" />
        </div>
        <?php
        $vouchers = array(
            array("username" => "VCR1", "password" => "Pass1", "paket" => "Paket 1", "harga" => "Rp 2.000", "masa_aktif" => "5 Jam"),
            array("username" => "VCR2", "password" => "Pass2", "paket" => "Paket 2", "harga" => "Rp 10.000", "masa_aktif" => "1 Hari"),
            array("username" => "VCR3", "password" => "Pass3", "paket" => "Paket 3", "harga" => "Rp 50.000", "masa_aktif" => "7 Hari"),
            array("username" => "VCR4", "password" => "Pass4", "paket" => "Paket 4", "harga" => "Rp 75.000", "masa_aktif" => "15 Hari"),
            array("username" => "VCR5", "password" => "Pass5", "paket" => "Paket 5", "harga" => "Rp 125.000", "masa_aktif" => "30 Hari"),
            array("username" => "VCR6", "password" => "Pass6", "paket" => "Paket 6", "harga" => "Rp 200.000", "masa_aktif" => "60 Hari")
        );
        function getPaketHarga($username, $vouchers)
        {
            foreach ($vouchers as $voucher) {
                if ($voucher['username'] == $username) {
                    return $voucher;
                }
            }
            return null;
        }
        $submitted_username = $_POST['username'];
        $submitted_password = $_POST['password'];

        $login_success = false;
        foreach ($vouchers as $voucher) {
            if ($voucher['username'] == $submitted_username && $voucher['password'] == $submitted_password) {
                $login_success = true;
                break;
            }
        }
        if ($login_success) {
            $paket_harga = getPaketHarga($submitted_username, $vouchers);
        ?>
            <div class="container">
                <h1>Login Berhasil!</h1>
                <div class="card-login">
                    <p>Selamat datang, <?php echo $submitted_username; ?>!</p>
                    <?php if ($paket_harga) { ?>
                        <p>Paket: <?php echo $paket_harga['paket']; ?></p>
                        <p>Harga: <?php echo $paket_harga['harga']; ?></p>
                        <p>Masa Aktif: <?php echo $paket_harga['masa_aktif']; ?></p>
                    <?php } else { ?>
                        <p>Informasi paket tidak tersedia.</p>
                    <?php } ?>
                    <p>Gunakan internet dengan bijak.</p>
                </div>
                <div class="btn-group">
                    <a href="logout.php" class="btn-logout">Logout</a>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="container">
                <h2>Login Gagal</h2>
                <div class="card-login">
                    <p>Kode voucher tidak sesuai, Silakan coba lagi.</p>
                </div>
                <div class="btn-group">
                    <a href="index.php" class="btn-kembali">Kembali ke Halaman Utama</a>
                </div>
            </div>
        <?php
        }
        ?>
</body>

</html>