<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Home | EvalForm</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-rns70jprv1y4wjol9pk7cv41vh0nz5rq4ncm/21eucgcxnnjdt3zvumru4/2o4vf" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <style>
          .nav-link {
              color: #1E3A8A;
              text-decoration: none;
          }
          .nav-link:hover {
              color: #2563EB;
          }
          .nav-link.active {
              font-weight: bold;
          }
      </style>
  </head>
  <body class="bg-blue-800 min-h-screen">
      <!-- Navbar -->
      <nav class="bg-white p-4 sticky top-0 z-10">
        <div class="container mx-auto flex justify-between items-center">
          <div class="flex items-center">
            <img src="<?= base_url('images/EvalForm-logo.png'); ?>" alt="EvalForm logo" class="px-3 h-16"/>
            <a href="#" class="text-blue-800 font-bold text-decoration-none">EvalForm</a>
          </div>
          <button class="text-blue-800 focus:outline-none md:hidden" id="menu-toggle">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path class="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
          <div id="menu" class="fixed inset-y-0 right-0 bg-white w-1/3 transform translate-x-full transition-transform md:relative md:transform-none md:flex items-center space-x-4 md:bg-transparent">
            <div class="flex flex-col md:flex-row md:space-x-4 justify-center p-4 md:p-0">
              <a class="nav-link <?= service('router')->getMatchedRoute()[0] == '/' ? 'active' : ''; ?>" href="<?= base_url(); ?>">Home</a>
              <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'surveys' ? 'active' : ''; ?>" href="<?= base_url('surveys/' . session()->get('userId')); ?>">Surveys</a>
              <?php if (session()->get('isLoggedIn')): ?>
                <?php if (session()->get('isAdmin')): ?>
                  <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'admin' ? 'active' : ''; ?>" href="<?= base_url('admin'); ?>">Admin</a>
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url("logout"); ?>">Logout</a>
              <?php else: ?>
                <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'login' ? 'active' : ''; ?>" href="<?= base_url("login"); ?>">Login</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </nav>

    <main>
        <?= $this->renderSection('content') ?> <!-- Placeholder for page content -->
    </main>

    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <span class="text-sm">&copy; <?= date('Y') ?></span>
            <nav>
              <a class="text-sm text-gray-300 hover:text-white mr-4 <?= service('router')->getMatchedRoute()[0] == '/' ? 'active' : ''; ?>" href="<?= base_url(); ?>">Home</a>
              <a class="text-sm text-gray-300 hover:text-white mr-4 <?= service('router')->getMatchedRoute()[0] == 'surveys' ? 'active' : ''; ?>" href="<?= base_url('surveys/' . session()->get('userId')); ?>">Surveys</a>
              <?php if (session()->get('isLoggedIn')): ?>
                <a class="text-sm text-gray-300 hover:text-white mr-4" href="<?= base_url("logout"); ?>">Logout</a>
              <?php else: ?>
                <a class="text-sm text-gray-300 hover:text-white mr-4 <?= service('router')->getMatchedRoute()[0] == 'login' ? 'active' : ''; ?>" href="<?= base_url("login"); ?>">Login</a>
              <?php endif; ?>
              <a href="#" class="text-sm text-gray-300 hover:text-white mr-4">Privacy</a>
              <a href="#" class="text-sm text-gray-300 hover:text-white mr-4">Terms</a>
            </nav>
        </div>
    </footer>

    <script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
      const menu = document.getElementById('menu');
      menu.classList.toggle('translate-x-full');
    });

    document.addEventListener('click', function (event) {
      const menu = document.getElementById('menu');
      const toggle = document.getElementById('menu-toggle');
      if (!menu.contains(event.target) && !toggle.contains(event.target)) {
        menu.classList.add('translate-x-full');
      }
    });
    </script>

</body>
</html>
