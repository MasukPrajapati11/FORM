<?php require_once 'db.php'; require_once 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center p-4" style="background: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1500&q=80') center center/cover no-repeat;">
  <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
    <h1 class="text-2xl font-bold text-gray-800 text-center">Log In</h1>
    <?php if ($msg = get_flash('error')): ?>
      <div class="mt-4 rounded-lg bg-red-50 text-red-700 p-3 text-sm"><?php echo e($msg); ?></div>
    <?php endif; ?>
    <?php if ($msg = get_flash('success')): ?>
      <div class="mt-4 rounded-lg bg-emerald-50 text-emerald-700 p-3 text-sm"><?php echo e($msg); ?></div>
    <?php endif; ?>

    <form class="mt-6 space-y-6" action="login_submit.php" method="POST" novalidate>
      <!-- Email Field -->
      <div class="relative">
        <input name="email" type="email" required
          class="peer w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-transparent" placeholder="Email">
        <label class="absolute left-3 top-3 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-500 peer-focus:-top-5 peer-focus:text-blue-600 bg-white px-1" for="email">
          <svg class="inline w-4 h-4 mr-1 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12A4 4 0 118 12a4 4 0 018 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 16v2m0 0h-2m2 0h2" /></svg>
          Email
        </label>
      </div>

      <!-- Password Field -->
      <div class="relative">
        <input name="password" type="password" required
          class="peer w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-transparent" placeholder="Password">
        <label class="absolute left-3 top-3 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-500 peer-focus:-top-5 peer-focus:text-blue-600 bg-white px-1" for="password">
          <svg class="inline w-4 h-4 mr-1 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2z" /><path stroke-linecap="round" stroke-linejoin="round" d="M17 11V7a5 5 0 00-10 0v4" /><rect width="20" height="12" x="2" y="11" rx="2" /></svg>
          Password
        </label>
      </div>

      <button type="submit"
        class="w-full rounded-lg bg-gradient-to-r from-blue-600 to-blue-400 text-white py-2.5 font-semibold shadow-lg hover:scale-105 hover:from-blue-700 hover:to-blue-500 transition-transform duration-200">
        <span class="inline-flex items-center justify-center">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
          Log In
        </span>
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
      Don’t have an account?
      <a href="signup.php" class="text-blue-600 hover:underline">Sign up</a>
    </p>
  </div>
</body>
</html>
