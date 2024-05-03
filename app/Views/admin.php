<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-- Main Content -->
        <div class="flex py-5 px-5 min-h-screen">
        <div class="flex-grow">
        <div class="py-5 px-5">
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
                            <th class="px-4 py-2">View Resume</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2"><?= esc($user['name']) ?></td>
                            <td class="px-4 py-2"><?= esc($user['email']) ?></td>
                            <td class="px-4 py-2"><?= esc($user['phone']) ?></td>
                            <td class="px-4 py-2"><?= esc($user['status']) ?></td>
                            <td class="px-4 py-2"><?= esc($user['created_at']) ?></td>
                            <td class="px-4 py-2"><a href="<?= base_url('Surveys/'.$user['user_id']);?>" class="text-blue-500 hover:text-blue-600">View Surveys</a></td>
                            <!-- Add more user details as needed -->
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

<?= $this->endSection() ?>
