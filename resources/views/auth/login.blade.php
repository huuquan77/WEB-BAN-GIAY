<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('/images/shoes-bg.jpg');">
        <div class="w-full max-w-md bg-white/90 dark:bg-gray-900/90 backdrop-blur-md shadow-lg rounded-lg p-6">
            <!-- Logo shop -->
            <div class="flex justify-center mb-4">
                <img src="/images/logo.png" alt="Shop Giày" class="w-24">
            </div>

            <!-- Tiêu đề -->
            <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-4">Chào mừng đến với Sneaker Store</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <div class="relative">
                        <x-text-input id="email" class="block mt-1 w-full pl-10 rounded-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Mật khẩu -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Mật khẩu')" />
                    <div class="relative">
                        <x-text-input id="password" class="block mt-1 w-full pl-10 rounded-lg"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password" />
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Ghi nhớ đăng nhập -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-700 text-red-600 shadow-sm focus:ring-red-500 dark:focus:ring-red-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Ghi nhớ đăng nhập</span>
                    </label>
                </div>

                <!-- Nút và liên kết -->
                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-red-600 hover:underline" href="{{ route('password.request') }}">
                            Quên mật khẩu?
                        </a>
                    @endif

                    <x-primary-button class="ml-3 px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg shadow-md transition duration-200">
                        Đăng nhập
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
