<?php
// Start session
session_start();

// Set session cookie lifetime to 1 hour (3600 seconds)
ini_set('session.cookie_lifetime', 3600);
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);

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
  <!-- Moment.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
</head>

<body class="g-sidenav-show bg-gray-100">
<?php 
  $host = '192.168.11.236';
  file_get_contents('http://'.$host.':5000/historical_occupancy_dashboard');
  $url = 'http://'.$host.':5000/api/departments';
  $response = file_get_contents($url);
  $data = json_decode($response, true);
  ?>
    <?php include 'components/sidebar.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <!-- Navbar -->
  <?php include 'components/navbar.php'; ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
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
          <?php endforeach; ?></select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <label for="date1" class="me-2">Time:</label>
          <input type="datetime-local" id="date1" class="form-control me-3">
        </div>
        
        </div>
        <div class="col-md-4 d-flex align-items-end justify-content-start">
          <button id="applyButton" class="btn btn-primary">Apply</button>
        </div>
      </div>
      
      <style>
    .iframe-scaler {
      width: 960px; /* 1920 * 0.5 */
      height: 540px; /* 1080 * 0.5 */
      overflow: hidden;
      position: relative;
    }

    .iframe-scaler iframe {
      position: absolute;
      top: 0;
      left: 0;
      transform: scale(0.5); /* Scale to 50% */
      transform-origin: top left;
      width: 1920px;
      height: 1080px;
      border: none;
      pointer-events: auto; /* Keep interaction enabled */
    }

    /* Responsive for mobile */
    @media (max-width: 412px) {
      .iframe-scaler {
        width: 100%;
        height: auto;
        padding-bottom: 100%; /* Adjust aspect ratio for mobile */
      }

      .iframe-scaler iframe {
        width: 100%;
        height: 100%;
        transform: scale(1); /* No scaling on mobile */
      }
    }

    /* Ensure carousel items maintain proper height */
    .carousel-item {
      height: 540px; /* Match iframe-scaler height */
      position: relative;
    }
  </style>
      <div class="d-flex justify-content-center mb-4">
        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel" style="max-width: 1000px;">
        <div class="アクティブ carousel-inner">
        <div class="carousel-item active">
          <div class="iframe-scaler">
            <iframe id="occupancyImage-atas" 
                    src="<?php echo 'http://' . $host . ':5000/static/html/office_atas_occupied_history.html'; ?>" 
                    scrolling="no" 
                    width="100%" 
                    height="100%">
            </iframe>
          </div>
        </div>
        <div class="carousel-item">
          <div class="iframe-scaler">
            <iframe id="occupancyImage-bawah" 
                    src="<?php echo 'http://' . $host . ':5000/static/html/office_bawah_occupied_history.html'; ?>" 
                    scrolling="no" 
                    width="100%" 
                    height="100%">
            </iframe>
          </div>
        </div>
      </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          </div>
        </div>
      </div>
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
      console.log('Departemen yang dipilih:', selectedDept);
    });

   
    document.getElementById('date1').addEventListener('change', function(){
      const selectedDate1 = this.value;
      console.log('Date 1 = ', selectedDate1);
    });

    document.getElementById('applyButton').addEventListener('click', function() {
      const department = document.getElementById('departmentSelect').value;
      const rawStartTime = document.getElementById('date1').value;
      const startTime = rawStartTime.replace('T', ' ') + ':00';
      if (department && startTime) {
        console.log('Applying filter:', { department, startTime });
        const host = "<?php echo $host; ?>";
      // Call the Flask endpoint with the selected department
      fetch(`http://${host}:5000/historical_occupancy_dashboard?dept=${department}&date1=${startTime}`)
  .then(response => {
    if (response.ok) {
      // Reload the iframe on success
      const iframe = document.getElementById('occupancyImage-atas');
      iframe.src = iframe.src;
      const iframe2 = document.getElementById('occupancyImage-bawah');
      iframe2.src = iframe2.src;
    } else {
      console.error('Gagal memanggil API. Status:', response.status);
    }
  })
  .catch(error => {
    console.error('Terjadi kesalahan saat memanggil API:', error);
  });
        // Add your logic here to process the selected department and time
      } else {
        console.log('Please select department and start time');
      }
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