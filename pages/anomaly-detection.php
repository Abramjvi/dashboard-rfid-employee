<?php
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
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
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
<body class="g-sidenav-show  bg-gray-100">
  <?php include 'components/sidebar.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
    </div>
    <div class="d-flex justify-content-center mb-4">
      <img src="../assets/img/On-progress.png" class="d-block w-50 img-fluid" alt="Evacuation" style="height: auto;">
    </div>
  </main>
  <!--   Core JS Files   -->
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

    // Ensure DOM is ready before running time updates
    window.onload = function() {
      updateDateTime();
      setInterval(updateDateTime, 1000);
    };

    document.getElementById('departmentSelect').addEventListener('change', function() {
      const selectedDept = this.value;
      console.log('Departemen yang dipilih:', selectedDept);
      // Tambahkan logika untuk memproses pilihan, misalnya filter data
    });
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
  <script>
  // Handle logout
  document.querySelector('a[href="../logout.php"]').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent default link behavior
    if (confirm('Are you sure you want to log out?')) {
      fetch('../logout.php', {
        method: 'GET'
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            window.location.href = data.redirect || 'index.php';
          } else {
            alert(data.message || 'Logout failed. Please try again.');
          }
        })
        .catch(error => {
          alert('An error occurred during logout. Please try again.');
          console.error('Error:', error);
        });
    }
  });
</script>
</body>
</html>