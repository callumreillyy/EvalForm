<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container h-screen mx-auto">
        <div class="flex justify-center">
            <div class="w-full lg:w-1/2">
                <h2 class="text-center text-white font-bold text-2xl"><?= isset($user) ? 'Edit User' : 'Add User' ?></h2>
                <form method="post" action="<?= base_url('admin/addedit' . (isset($user) ? '/' . $user['user_id'] : '')) ?>" class="mb-3">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-white">Name</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" id="name" name="name" value="<?= isset($user) ? esc($user['name']) : '' ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-white">Email</label>
                        <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" id="email" name="email" value="<?= isset($user) ? esc($user['email']) : '' ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-white">Phone</label>
                        <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" id="phone" name="phone" value="<?= isset($user) ? esc($user['phone']) : '' ?>">
                    </div>
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-white">Status</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" id="status" name="status" required>
                            <option value="active" <?= isset($user) && $user['status'] === 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="inactive" <?= isset($user) && $user['status'] === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600"><?= isset($user) ? 'Update User' : 'Add User' ?></button>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
