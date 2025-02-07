<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Responsive Navbar</title>
</head>

<body>

    <nav class="flex justify-between px-8 md:px-14 py-5 items-center bg-white shadow">
        <!-- Logo -->
        <div>
            <!-- <h1 class="font-bold text-2xl md:text-2xl xl:text-4xl text-gray-800">MPoultry</h1> -->
            <img src="/simple_ecommerce/Assets/Img/hen.jpg" alt="" class="h-16 w-26">
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex gap-8">
            <a href="#" class="text-gray-600 hover:text-blue-500">Home</a>
            <a href="#" class="text-gray-600 hover:text-blue-500">Products</a>
            <a href="#" class="text-gray-600 hover:text-blue-500">Services</a>
            <a href="#" class="text-gray-600 hover:text-blue-500">Contact</a>
        </div>

        <!-- Desktop Icons -->
        <div class="hidden md:flex items-center gap-4">
            <!-- Cart Icon -->
            <!-- <svg onclick="toggleCartModal()" class="w-6 h-6 text-gray-600 cursor-pointer" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
            </svg> -->

            <!-- Login Button -->
            <button onclick="openLoginModal()"
                class="py-2 px-6 bg-blue-500 hover:bg-blue-600 text-white rounded cursor-pointer">
                Login
            </button>
        </div>

        <!-- Login Modal -->
        <div id="loginModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
                <h2 class="text-xl font-bold">Login</h2>
                <p class="text-gray-600">Enter your credentials to continue.</p>

                <!-- Close Button -->
                <span class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 cursor-pointer" onclick="closeModals()">
                    &times;
                </span>

                <form id="loginForm" action="/simple_ecommerce/Route/UserRoute/UserLogin.php" method="post">
                    <!-- Form Fields -->
                    <div class="mt-4">
                        <label class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" class="w-full mt-1 p-2 border rounded" placeholder="Enter your email">
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium">Password</label>
                        <input type="password" name="password" class="w-full mt-1 p-2 border rounded" placeholder="Enter your password">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="mt-4 w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded">
                        Submit
                    </button>
                </form>

                <!-- Register Link -->
                <p class="mt-4 text-center text-sm text-gray-600">
                    Don't have an account?
                    <span class="text-blue-500 hover:underline cursor-pointer" onclick="openRegisterModal()">Register</span>
                </p>
            </div>
        </div>

        <!-- Register Modal -->
        <div id="registerModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
                <h2 class="text-xl font-bold">Register</h2>
                <p class="text-gray-600">Create your account.</p>

                <!-- Close Button -->
                <span class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 cursor-pointer" onclick="closeModals()">
                    &times;
                </span>

                <!-- Form Fields -->
                <form id="registerForm" action="/simple_ecommerce/Route/UserRoute/UserAuth.php" method="post">
                    <div class="mt-4">
                        <label class="block text-sm font-medium">Full Name</label>
                        <input type="text" name="name" class="w-full mt-1 p-2 border rounded" placeholder="Enter your full name">
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" class="w-full mt-1 p-2 border rounded" placeholder="Enter your email">
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium">Password</label>
                        <input type="password" name="password" class="w-full mt-1 p-2 border rounded" placeholder="Enter your password">
                    </div>

                    <!-- Register Button -->
                    <button type="submit" class="mt-4 w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded">
                        Register
                    </button>
                </form>

                <!-- Back to Login Link -->
                <p class="mt-4 text-center text-sm text-gray-600">
                    Already have an account?
                    <span class="text-blue-500 hover:underline cursor-pointer" onclick="openLoginModal()">Login</span>
                </p>
            </div>
        </div>
    </nav>

    <!-- Cart Modal -->
    <!-- <div id="cart-modal" class="fixed z-10 inset-0 bg-gray-500/75 hidden transition-opacity" aria-hidden="true">
            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <div class="pointer-events-auto w-screen max-w-md">
                            <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                                <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                    <div class="flex items-start justify-between">
                                        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                                        <div class="ml-3 flex h-7 items-center">
                                            <button type="button" onclick="toggleCartModal()" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                                <span class="absolute -inset-0.5"></span>
                                                <span class="sr-only">Close panel</span>
                                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>

                                <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <p>Subtotal</p>
                                        <p>$262.00</p>
                                    </div>
                                    <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                    <div class="mt-6">
                                        <a href="#" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-xs hover:bg-indigo-700">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/simple_ecommerce/Assets/Alert/RegisterAlert.js"></script>
    <script src="/simple_ecommerce/Assets/Alert/LoginAlert.js"></script>
    <script>
        function toggleCartModal() {
            const cartModal = document.getElementById('cart-modal');
            cartModal.classList.toggle('hidden');
        }

        function openLoginModal() {
            document.getElementById('loginModal').classList.remove('hidden');
            document.getElementById('registerModal').classList.add('hidden');
        }

        function openRegisterModal() {
            document.getElementById('registerModal').classList.remove('hidden');
            document.getElementById('loginModal').classList.add('hidden');
        }

        function closeModals() {
            document.getElementById('loginModal').classList.add('hidden');
            document.getElementById('registerModal').classList.add('hidden');
        }
    </script>

</body>

</html>