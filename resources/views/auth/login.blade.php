<x-header>
    <x-slot:metaDesc>Ini Halaman Login untuk masuk ke admin panel</x-slot:metaDesc>
    <x-slot:metaTitle>Halaman Login</x-slot:metaTitle>
    Login
</x-header>
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('assets/logo_smk_pgri_6.png') }}" class="h-12 me-2" alt="SMK PGRI 6 DPS LOGO" />
                </div>
                <div>
                    <h1
                        class="text-xl font-bold text-center leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Admin Panel
                    </h1>
                    <p class="mt-3 text-center text-gray-900 md:text-sm dark:text-white">Masukkan username dan password
                        untuk mengakses admin panel</p>
                </div>
                @if ($errors->has('loginError'))
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                        role="alert">
                        {{ $errors->first('loginError') }}
                    </div>
                @endif
                <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                                </svg>
                            </div>
                            <input type="email" id="email" name="email"
                                class="block w-full ps-9 pe-3 py-2.5 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Input email....">
                        </div>
                    </div>
                    <div x-data="{ show: false }">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Password
                        </label>

                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z" />
                                </svg>
                            </div>
                            <input :type="show ? 'text' : 'password'" name="password" id="password"
                                placeholder="••••••••"
                                class="block w-full ps-9 pe-3 py-2.5 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                required>

                            <!-- Toggle eye -->
                            <button type="button" @click="show = !show"
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white">
                                <!-- eye open -->
                                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5
                                        c4.478 0 8.268 2.943 9.542 7
                                        -1.274 4.057-5.064 7-9.542 7
                                        -4.477 0-8.268-2.943-9.542-7z" />
                                </svg>

                                <!-- eye closed -->
                                <svg x-show="show" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3l18 18" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19
                                        c-4.478 0-8.268-2.943-9.542-7
                                        a9.956 9.956 0 012.04-3.368" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.223 6.223A9.956 9.956 0 0112 5
                                        c4.478 0 8.268 2.943 9.542 7
                                        a9.965 9.965 0 01-4.298 5.137" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-primary-800">Sign
                        in</button>
                </form>
            </div>
        </div>
    </div>
</section>
<x-footer></x-footer>
