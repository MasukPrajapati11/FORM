<?php
require_once 'db.php';
require_once 'functions.php';
require_login();
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50">
  <header class="bg-white shadow">
    <div class="max-w-4xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>
      <a href="logout.php" class="text-sm text-red-600 hover:underline">Logout</a>
    </div>
  </header>

  <main class="max-w-4xl mx-auto px-4 py-8">
    <?php if ($msg = get_flash('success')): ?>
      <div class="mb-6 rounded-lg bg-emerald-50 text-emerald-700 p-3 text-sm"><?php echo e($msg); ?></div>
    <?php endif; ?>
    <div class="bg-white rounded-2xl shadow p-8">
      <h2 class="text-2xl font-bold text-gray-800">Hello, <?php echo e($user['name']); ?> 👋</h2>
      <p class="mt-2 text-gray-600">You’re logged in with <span class="font-medium"><?php echo e($user['email']); ?></span>.</p>
      <p class="mt-6 text-gray-500 text-sm">This page is protected. Only authenticated users can see it.</p>
    </div>
  </main>
</body>
</html>
