<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Return JSON response for consistency with login-post.php
header('Content-Type: application/json');
echo json_encode([
    'success' => true,
    'redirect' => 'login.php' // Redirect to login page
]);
exit;
?>