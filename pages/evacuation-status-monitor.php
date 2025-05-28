<?php

// Set session cookie lifetime to 1 hour (3600 seconds)
ini_set('session.cookie_lifetime', 3600);
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);

// Start session
session_start();

// Set header cache-control untuk mencegah caching
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Expires: Thu, 01 Jan 1970 00:00:00 GMT'); // Pastikan cache kadaluarsa

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: /dashboard-rfid-employee/pages/index.php?alert=' . urlencode('Anda harus login terlebih dahulu!'));
    exit;
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/KYB_Corporation_company_logo.svg/135px-KYB_Corporation_company_logo.svg.png">
  <title>
    Dashboard Safety Employee 
  </title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
<?php 
  $host = '192.168.11.236';
  file_get_contents('http://'.$host.':5000/evacuate');
  $url = 'http://'.$host.':5000/api/departments';
  $response = file_get_contents($url);
  $data = json_decode($response, true);
  ?>
    <?php include 'components/sidebar.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <!-- Navbar -->
    <?php include 'components/navbar.php';?>
    <!-- End Navbar -->
    <!-- Image below Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
      </div>
      <div class="row mb-4">
        <div class="col-md-4">
          <div class="form-group">
            <label for="departmentSelect" class="form-label text-sm font-weight-bold">Input Department</label>
            <select class="form-select" id="departmentSelect" aria-label="Select Department">
               <option selected disabled>Pilih Departemen</option>
                  <?php foreach ($data as $dept): ?>
                    <?php if (!empty($dept['id'])): ?>
                      <option value="<?php echo htmlspecialchars($dept['id']); ?>">
                        <?php echo htmlspecialchars($dept['name']); ?>
                      </option>
                    <?php endif; ?>
                  <?php endforeach; ?>
            </select>

          </div>
        </div>
      </div>
    </div>
    <div class="col-12 mt-0 pt-0">
          <!-- <img src="../assets/img/evacuation.png" class="img-fluid w-75 mx-auto d-block" alt="Evacuation Layout"> -->
          <style>
    .iframe-scaler {
    width: 960px; /* 1920 * 0.55 */
  height: 540px; /* 1080 * 0.55 */
  overflow: hidden;
  position: relative;
}

.iframe-scaler iframe {
  position: absolute;
  top: 0;
  left: 0;
  transform: scale(0.5); /* 960/1920 = 0.5 */
  transform-origin: top left;
  width: 1920px;
  height: 1080px;
  pointer-events: auto; /* Keep interaction enabled */
}

</style>

<div class="d-flex justify-content-center align-items-center mb-4 position-relative" style="max-width: 1000px; margin: 0 auto;">
  <div class="iframe-scaler" style="position: relative; top: -50px; width: 100%; padding-bottom: 56.25%; /* Aspect ratio 16:9 */">
    <iframe id="occupancyImage" 
        src="<?php echo 'http://' . $host . ':5000/static/html/evacuation_monitor.html'; ?>" 
        scrolling="true" 
        width="100%" 
        height="100%" 
        style="border:none; position: absolute; top: 0; left: 0;">
    </iframe>   
  </div>
</div>
    <style>
  /* Responsif untuk mobile */
  @media (max-width: 412px) {
    .iframe-scaler {
      padding-bottom: 100%; /* Memastikan gambar tetap menyesuaikan dengan ukuran layar */
      
    }

    .iframe-scaler iframe {
      width: 100%;
      height: 100%;
      border: none;
      transform: scale(1);
    }
  }
</style>
        </div>
  </main>
  <!-- Core JS Files -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    function updateDateTime() {
      const now = new Date();
      const options = {
        day: '2-digit',
        month: 'short',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        hour12: false
      };
      const dateTimeString = now.toLocaleString('en-GB', options).replace(',', '');
      document.getElementById('datetime').innerText = dateTimeString;
    }
    document.getElementById('departmentSelect').addEventListener('change', function() {
      const selectedDept = this.value;
      const host = "<?php echo $host; ?>";
      console.log('Departemen yang dipilih:', selectedDept);
      // Call the Flask endpoint with the selected department
      fetch(`http://${host}:5000/evacuate?dept=${selectedDept}`)
  .then(response => {
    if (response.ok) {
      // Reload the iframe on success
      const iframe = document.getElementById('occupancyImage');
      iframe.src = iframe.src;
    } else {
      console.error('Gagal memanggil API. Status:', response.status);
    }
  })
  .catch(error => {
    console.error('Terjadi kesalahan saat memanggil API:', error);
  });

    
    });
    updateDateTime();
    setInterval(updateDateTime, 1000);
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>