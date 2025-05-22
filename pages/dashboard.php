<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
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
  <style>
    #occupancyChart {
      max-height: 300px; /* Batasi tinggi maksimum chart */
      max-width: 100%; /* Pastikan chart tidak melar melebihi container */
    }
    .card-body {
      overflow: auto; /* Jika konten melebihi, tambahkan scrollbar lokal */
    }
  </style>
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a>
        <img id="logo-sidebar" class="me-5" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/KYB_Corporation_company_logo.svg/135px-KYB_Corporation_company_logo.svg.png" alt="" style="display: block; margin-left: auto; margin-right: auto;">
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <!-- Dashboard -->
        <li class="nav-item">
          <a class="nav-link active" href="../pages/dashboard.html">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>dashboard</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g fill="#FFFFFF" fill-rule="nonzero">
                    <path class="color-background" d="M3 3h7v7H3zM14 3h7v7h-7zM3 14h7v7H3zM14 14h7v7h-7z"></path>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <!-- Real-time Occupancy -->
        <li class="nav-item">
          <a class="nav-link" href="../pages/real-time-ccupancy.html">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>real-time-occupancy</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g fill="#FFFFFF" fill-rule="nonzero">
                    <path class="color-background" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z"></path>
                    <path class="color-background opacity-6" d="M12 8v4l4 2"></path>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Real time Occupancy</span>
          </a>
        </li>
         <!-- Evacuation Status Monitor -->
        <li class="nav-item">
          <a class="nav-link" href="../pages/Evacuation-Status-Monitor.html">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>evacuation-status</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g fill="#FFFFFF" fill-rule="nonzero">
                    <path class="color-background" d="M12 4a3 3 0 100-6 3 3 0 000 6zM12 7h-2v6h5l3-3-3-3h-3z"></path>
                    <path class="color-background opacity-6" d="M18 7h4v10h-4V7z"></path>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Evacuation Status Monitor</span>
          </a>
        </li>
        <!-- Historical Occupancy -->
        <li class="nav-item">
          <a class="nav-link" href="../pages/Historical Occupancy.html">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>historical-occupancy</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g fill="#FFFFFF" fill-rule="nonzero">
                    <path class="color-background" d="M3 17h18v2H3zM3 12h18v2H3zM3 7h18v2H3zM5 3h14v2H5z"></path>
                    <path class="color-background opacity-6" d="M8 3v14"></path>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Historical Occupancy</span>
          </a>
        </li>
        <!-- People Tracking -->
        <li class="nav-item">
          <a class="nav-link" href="../pages/People-Tracking.html">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>people-tracking</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g fill="#FFFFFF" fill-rule="nonzero">
                    <path class="color-background" d="M12 4a3 3 0 100-6 3 3 0 000 6z"></path>
                    <path class="color-background opacity-6" d="M12 7c-4.41 0-8 3.59-8 8v3h16v-3c0-4.41-3.59-8-8-8z"></path>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">People Tracking</span>
          </a>
        </li>
        <!-- Dwell Time Analysis -->
        <li class="nav-item">
          <a class="nav-link" href="../pages/Dwell-Time-Analysis.html">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>dwell-time</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g fill="#FFFFFF" fill-rule="nonzero">
                    <path class="color-background" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path>
                    <path class="color-background opacity-6" d="M12 6v6h6"></path>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Dwell Time Analysis</span>
          </a>
        </li>
        <!-- Anomaly Detection -->
        <li class="nav-item">
          <a class="nav-link" href="../pages/Anomaly-Detection.html">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>anomaly-detection</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g fill="#FFFFFF" fill-rule="nonzero">
                    <path class="color-background" d="M12 2L2 19h20L12 2zm0 3.5L19.09 17H4.91L12 5.5z"></path>
                    <path class="color-background opacity-6" d="M12 8v4m0 2h0"></path>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Anomaly Detection</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav justify-content-end">
  <li class="nav-item d-flex align-items-center">
    <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
      <span id="datetime" class="d-sm-inline d-none me-2"></span>
      <span class="d-sm-inline d-none">Welcome, <?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'User'; ?></span>
    </a>
  </li>
  <li class="nav-item d-flex align-items-center ms-3">
    <a href="../logout.php" class="nav-link text-body font-weight-bold px-0" onclick="return confirm('Are you sure you want to log out?');">
      <i class="fas fa-sign-out-alt me-1"></i>
      <span class="d-sm-inline d-none">Log Out</span>
    </a>
  </li>
  <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
      <div class="sidenav-toggler-inner">
        <i class="sidenav-toggler-line"></i>
        <i class="sidenav-toggler-line"></i>
        <i class="sidenav-toggler-line"></i>
      </div>
    </a>
  </li>
</ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <!-- KPI Section -->
      <div class="row mb-4">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Orang</p>
                    <h5 class="font-weight-bolder mb-0">
                      5
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Orang di Dalam</p>
                    <h5 class="font-weight-bolder mb-0">
                      5
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Orang di luar</p>
                    <h5 class="font-weight-bolder mb-0">
                      0
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Chart Section -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Distribusi Orang per Area</h5>
              <div style="position: relative; height: 300px; width: 100%;">
                <canvas id="occupancyChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Existing Cards -->
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-4">     
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
           </div>
        </div>
        <div class="row mt-4">
          <div class="col-xl-4 col-sm-6 mb-4">
             </div>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-4">
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-4">
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 text-center">
            <div class="copyright text-sm text-muted">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              PT KAYABA INDONESIA
            </div>
          </div>
        </div>
      </div>
    </footer>
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
        hour12: false,
        timeZone: 'Asia/Jakarta' // Mengatur zona waktu ke WIB
      };
      const dateTimeString = now.toLocaleString('en-GB', options).replace(',', '');
      document.getElementById('datetime').innerText = dateTimeString;
    }
    updateDateTime();
    setInterval(updateDateTime, 1000);

    // Chart Configuration
    var ctx = document.getElementById('occupancyChart').getContext('2d');
    var occupancyChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Office Atas', 'Plant', 'Koridor Kantin', 'Lobby Baru'],
        datasets: [{
          data: [1, 1, 2, 1],
          backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true, // Pastikan rasio tetap dipertahankan
        aspectRatio: 1.5, // Atur rasio lebar terhadap tinggi (misalnya 1.5:1)
        plugins: {
          legend: {
            position: 'top'
          },
          title: {
            display: true,
            text: 'Distribusi Orang per Area'
          }
        }
      }
    });
  </script>

  <script>
  // ... (existing code: updateDateTime, Chart.js, etc.) ...

  // Handle logout
  document.querySelector('a[href="../logout.php"]').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent default link behavior
    if (confirm('Are you sure you want to log out?')) {
      fetch('logout.php', {
        method: 'GET'
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            window.location.href = data.redirect || 'index.html';
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
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>