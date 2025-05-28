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
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
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
              <option value="hr">HR</option>
              <option value="it">IT</option>
              <option value="finance">Finance</option>
              <option value="marketing">Marketing</option>
              <option value="operations">Operations</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="startTimeSelect" class="form-label text-sm font-weight-bold"> Time</label>
            <select class="form-select" id="startTimeSelect" aria-label="Select Start Time">
              <option selected disabled>Select Time</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-12 text-end">
          <button id="applyButton" class="btn btn-primary">Apply</button>
        </div>
      </div>
      <div class="d-flex justify-content-center mb-4">
        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel" style="max-width: 1000px;">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../assets/img/lantai-atas.png" class="d-block w-100 img-fluid" alt="Lantai Atas" style="height: auto;">
            </div>
            <div class="carousel-item">
              <img src="../assets/img/lantai-bawah.png" class="d-block w-100 img-fluid" alt="Lantai Bawah" style="height: auto;">
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

    // Function to populate time dropdown using Moment.js
    function populateTimeDropdowns() {
      const startSelect = document.getElementById('startTimeSelect');
      const startOfDay = moment().startOf('day');
      
      for (let i = 0; i < 48; i++) { // 48 intervals for 30 minutes over 24 hours
        const time = startOfDay.clone().add(i * 30, 'minutes').format('HH:mm');
        const option = document.createElement('option');
        option.value = time;
        option.text = time;
        startSelect.appendChild(option);
      }
    }

    document.getElementById('departmentSelect').addEventListener('change', function() {
      const selectedDept = this.value;
      console.log('Departemen yang dipilih:', selectedDept);
    });

    document.getElementById('startTimeSelect').addEventListener('change', function() {
      const selectedStartTime = this.value;
      console.log('Start Time yang dipilih:', selectedStartTime);
    });

    document.getElementById('applyButton').addEventListener('click', function() {
      const department = document.getElementById('departmentSelect').value;
      const startTime = document.getElementById('startTimeSelect').value;
      
      if (department && startTime) {
        console.log('Applying filter:', { department, startTime });
        // Add your logic here to process the selected department and time
      } else {
        console.log('Please select department and start time');
      }
    });

    // Initialize page
    populateTimeDropdowns();
    updateDateTime();
    setInterval(updateDateTime, 1000);
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>