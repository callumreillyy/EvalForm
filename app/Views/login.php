<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-- Login Container -->
<div class="flex justify-center items-center h-screen">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <h2 class="text-2xl font-bold mb-2">Login to EvalForm</h2>
            <p class="text-gray-600">Welcome back! Please login to your account.</p>
        </div>
        <!-- Form -->
        <form>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Enter your username">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Enter your password">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Sign In
                </button>
                <div class="flex flex-col">
                  <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                      Forgot Password?
                  </a>
                  <div class="flex">
                    <p class="text-gray-600">Don't have an account? </p>
                    <a class="font-bold text-sm text-blue-500 hover:text-blue-800 py-0.5 px-1" href="#">
                      Signup
                    </a>
                  </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>