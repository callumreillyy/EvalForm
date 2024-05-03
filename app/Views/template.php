<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home | EvalForm</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="bg-blue-800">
  
    <!-- Navbar -->
    <nav class="bg-blue-800 p-4 sticky top-0 z-10">
        <div class="container mx-auto flex justify-between items-center">
          <div class="flex items-center">
            <img src="EvalForm-Logo.png" alt="EvalForm logo" class="px-3 h-8 md:h-10 lg:h-12"/>
            <a href="#" class="text-white font-bold">EvalForm</a>
          </div>
          <button class="text-white focus:outline-none md:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
            <div class="hidden md:flex items-center space-x-4">
                <a href=<?= base_url(); ?> class="text-white">Home</a>
                <a href=<?= base_url('admin'); ?>  class="text-white">Admin</a>
                <a href=<?= base_url('surveys'); ?> class="text-white">Surveys</a>
                <a href="#" class="text-white">Login</a>
            </div>
        </div>
    </nav>

     <main>
         <?= $this->renderSection('content') ?> <!-- Placeholder for page content -->
     </main>
     
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
          <span class="text-sm">&copy; 2024 EvalForm</span>
          <nav>
              <a href="#" class="text-sm text-gray-300 hover:text-white mr-4">Home</a>
              <a href="#" class="text-sm text-gray-300 hover:text-white mr-4">Dashboard</a>
              <a href="#" class="text-sm text-gray-300 hover:text-white mr-4">Surveys</a>
              <a href="#" class="text-sm text-gray-300 hover:text-white mr-4">Login</a>
              <a href="#" class="text-sm text-gray-300 hover:text-white mr-4">Privacy</a>
              <a href="#" class="text-sm text-gray-300 hover:text-white mr-4">Terms</a>
          </nav>
      </div>
    </footer>
 </body>
 </html>
