<?php
class LoginPage
{
  private $title;

  public function __construct()
  {
    $this->title = "LOGIN | FajarNet|Hotspot";
  }

  public function render()
  {
?>
    <!DOCTYPE html>
    <html>

    <head>
      <title><?php echo $this->title; ?></title>
      <link rel="stylesheet" type="text/css" href="css/index.css">
      <link rel="stylesheet" href="fontawesome/css/all.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    </head>
    </div>
    <!-- Header -->
    <header id="header">
      <div class="logo">
        <img src="css/image/favicon.png" />
      </div>
      <div class="content">
        <h1>| FajarNet |</h1>

        <body>
          <?php
          function login($username, $password)
          {
            $vouchers = array(
              array("username" => "VCR1", "password" => "Pass1"),
              array("username" => "VCR2", "password" => "Pass2"),
              array("username" => "VCR3", "password" => "Pass3"),
              array("username" => "VCR4", "password" => "Pass4"),
              array("username" => "VCR5", "password" => "Pass5")
            );

            foreach ($vouchers as $voucher) {
              if ($voucher['username'] == $username && $voucher['password'] == $password) {
                return true;
              }
            }
            return false;
          }

          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $submitted_username = $_POST['username'];
            $submitted_password = $_POST['password'];

            $login_success = login($submitted_username, $submitted_password);

            if ($login_success) {
              echo "<h1>Login Berhasil!</h1>";
              echo "<p>Selamat datang, $submitted_username!</p>";
              echo "<p>Gunakan internet dengan bijak.</p>";
            } else {
              echo "<h1>Login Gagal</h1>";
              echo "<p>Kode voucher tidak sesuai, Silakan coba lagi.</p>";
            }
          }
          ?>

          <div class="container">
            <h1 class="active">Selamat Datang di FajarNet-Hotspot</h1>
            <h2>Silakan masukkan kode voucher Anda<h2>
                <form method="POST" action="berhasil_login.php">
                  <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                  </div>
                  <input type="submit" value="Login" class="btn-submit">
                </form>
          </div>

          <!-- Footer -->
          <footer id="footer">
          </footer>
          <div class="navbar">
            <div class="home_button">
              <a href="index.php">
                <div class="navigation">
                  <img alt="home" src="css/image/home.png" class="icon-menu">
                </div>
                <h6>Home</h6>
              </a>
            </div>
            <div class="price_button">
              <a href="daftar_harga.php">
                <div class="navigation">
                  <img alt="my-donations" src="css/image/price.png" class="icon-menu">
                </div>
                <h6>Harga</h6>
              </a>
            </div>
          </div>
        </body>

    </html>
<?php
  }
}

$loginPage = new LoginPage();
$loginPage->render();
?>