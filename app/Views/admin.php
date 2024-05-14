<?= $this->extend('template') ?>
<?= $this->section('content') ?>

  <!-- Main Content -->
  <div class="flex py-5 px-5 min-h-screen">
    <div class="flex-grow">
      <div class="py-5 px-5">
        <div class="flex flex-col md:flex-row mb-4">
          <div class="w-full md:w-1/2 md:mb-0 md:mr-3">
            <form method="get" action="<?= base_url('admin/'); ?>">
              <div class="flex">
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" placeholder="Enter your search..." name="search">
                <button class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600" type="submit">Search</button>
              </div>
            </form>
          </div>
          <div class="w-full md:w-1/2 flex justify-end">
            <a class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600" href=<?= base_url('addedit/');?>>Add User</a>
          </div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 my-4">
          <h2 class="text-2xl font-bold mb-4">User List</h2>
          <table class="w-full text-left">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Phone</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Created At</th>
                <th class="px-4 py-2">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user): ?>
              <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-2 name"><?= esc($user['name']) ?></td>
                <td class="px-4 py-2 email"><?= esc($user['email']) ?></td>
                <td class="px-4 py-2 phone"><?= esc($user['phone']) ?></td>
                <td class="px-4 py-2 status"><?= esc($user['status']) ?></td>
                <td class="px-4 py-2 created"><?= esc($user['created_at']) ?></td>
                <td class="px-4 py-2 actions">
                  <a class="text-blue-500 hover:text-blue-600" href="<?= base_url('admin/addedit/'.$user['user_id']);?>">edit</a>
                  <a class="text-blue-500 hover:text-blue-600" href="<?= base_url('admin/delete/' . $user['user_id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">delete</a>
                  <a class="text-blue-500 hover:text-blue-600" href="<?= base_url('Surveys/'.$user['user_id']);?>">surveys</a></td>
                </td>
                <!-- Add more user details as needed -->
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    const actions = document.querySelectorAll('.actions');

    actions.forEach(action => {
      const links = action.querySelectorAll('a');

      links.forEach(link => {
        link.addEventListener('mouseover', () => {
          console.log(link);
          //link.classList.add('hidden');
          // for each action style the table background 
          switch(link.textContent.trim()) {
            case "edit":
              action.classList.add('hover:bg-green-200');
              break;
            case "delete":
              action.classList.add('hover:bg-red-200');
              break;
            case "surveys":
              action.classList.add('hover:bg-blue-200');
              break;
            default:
            case "edit":
              action.classList.add('hover:bg-grey-200');
              break;
          }
        });

        link.addEventListener('mouseout', () => {
          switch(link.textContent.trim()) {
            case "edit":
              action.classList.remove('hover:bg-green-200');
              break;
            case "delete":
              action.classList.remove('hover:bg-red-200');
              break;
            case "surveys":
              action.classList.remove('hover:bg-blue-200');
              break;
            default:
            case "edit":
              action.classList.remove('hover:bg-grey-200');
              break;
          }
        });
      });
    });
  </script>


<?= $this->endSection() ?>
