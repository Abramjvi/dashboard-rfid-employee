<?php
// Get the current page filename
$current_page = basename($_SERVER['PHP_SELF']);
?>

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
          <a class="nav-link <?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>" href="../pages/dashboard.php">
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
          <a class="nav-link <?php echo $current_page == 'real-time-occupancy.php' ? 'active' : ''; ?>" href="../pages/real-time-occupancy.php">
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
          <a class="nav-link <?php echo $current_page == 'evacuation-status-monitor.php' ? 'active' : ''; ?>" href="../pages/evacuation-status-monitor.php">
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
          <a class="nav-link <?php echo $current_page == 'historical-occupancy.php' ? 'active' : ''; ?>" href="../pages/historical-occupancy.php">
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
          <a class="nav-link <?php echo $current_page == 'people-tracking.php' ? 'active' : ''; ?>" href="../pages/people-tracking.php">
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
          <a class="nav-link <?php echo $current_page == 'dwell-time-analysis.php' ? 'active' : ''; ?>" href="../pages/dwell-time-analysis.php">
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
          <a class="nav-link <?php echo $current_page == 'anomaly-detection.php' ? 'active' : ''; ?>" href="../pages/anomaly-detection.php">
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