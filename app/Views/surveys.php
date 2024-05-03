<?= $this->extend('template') ?>
<?= $this->section('content') ?>
  <!-- Main Content -->
  <div class="container mx-auto px-4 py-8 min-h-screen">
    <div class="flex-grow">
      <h2 class="text-white text-2xl font-bold mb-4">Survey Search</h2>
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
    const featuredSurveys = <?php echo json_encode($surveys['surveys']); ?>;
    const searchInput = document.getElementById('searchInput');
    const surveyList = document.getElementById('surveyList');

    // Function to perform search
    const searchSurveys = () => {
        const keyword = searchInput.value.toLowerCase();
        // Clear previous search results
        surveyList.innerHTML = '';
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

<?= $this->endSection() ?>
