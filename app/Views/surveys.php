<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Survey Search | EvalForm</title>
      <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body class="bg-gray-100">

  <!-- Navbar -->
  <nav class="bg-blue-800 p-4">
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
              <a href="#" class="text-white">Dashboard</a>
              <a href=<?= base_url('surveys'); ?> class="text-white">Surveys</a>
              <a href="#" class="text-white">Account</a>
          </div>
      </div>
  </nav>

  <!-- Main Content -->
  <div class="container mx-auto px-4 py-8 min-h-screen">
    <div class="flex-grow">
      <h2 class="text-2xl font-bold mb-4">Survey Search</h2>
      <!-- Search Input -->
      <div class="mb-4">
          <input type="text" id="searchInput" class="w-full px-4 py-2 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter keywords to search for surveys">
      </div>
      <!-- Search Results -->
      <div id="searchResults" class="bg-white rounded-lg shadow-md p-4">
          <h3 class="text-lg font-bold mb-2">Search Results</h3>
          <ul id="surveyList" class="list-disc pl-8">
              <!-- Survey search results will be dynamically added here -->
              <!-- Example:
              <li><a href="#">Survey 1</a></li>
              <li><a href="#">Survey 2</a></li>
              -->
          </ul>
      </div>
    </div>
  </div>

  <script>
    const searchInput = document.getElementById('searchInput');
    const surveyList = document.getElementById('surveyList');

    // Function to perform search
    const searchSurveys = () => {
        const keyword = searchInput.value.toLowerCase();
        // Clear previous search results
        surveyList.innerHTML = '';
        // Simulated list of featured surveys
        const featuredSurveys = [
            { title: 'Survey Title 1', description: 'Description of Survey 1' },
            { title: 'Survey Title 2', description: 'Description of Survey 2' },
            { title: 'Survey Title 3', description: 'Description of Survey 3' },
            { title: 'Survey Title 4', description: 'Description of Survey 4' }
        ];
        // Filter surveys based on keyword
        const filteredSurveys = featuredSurveys.filter(survey => survey.title.toLowerCase().includes(keyword) || survey.description.toLowerCase().includes(keyword));
        // Display search results
        filteredSurveys.forEach(survey => {
            const div = document.createElement('div');
            div.classList.add('bg-white', 'rounded-lg', 'shadow-md', 'p-6', 'mb-4');

            const greyBox = document.createElement('div');
            greyBox.classList.add('h-40', 'bg-gray-400', 'mb-4');

            const h3 = document.createElement('h3');
            h3.classList.add('text-lg', 'font-bold', 'mb-2');
            h3.textContent = survey.title;

            const p = document.createElement('p');
            p.classList.add('text-gray-600');
            p.textContent = survey.description;

            div.appendChild(greyBox);
            div.appendChild(h3);
            div.appendChild(p);

            surveyList.appendChild(div);
        });
    };

    // Event listener for search input
    searchInput.addEventListener('input', searchSurveys);
  </script>

  <script>
    // Mobile menu toggle
    const btnToggle = document.querySelector('button');
    const navLinks = document.querySelector('.hidden');
    
    btnToggle.addEventListener('click', () => {
        navLinks.classList.toggle('block');
    });
  </script>

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

