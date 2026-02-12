<x-header>
    <x-slot:metaTitle>{{ $metaTitle ?? '' }}</x-slot:metaTitle>
    <x-slot:metaDesc>{{ $metaDesc ?? '' }}</x-slot:metaDesc>
    {{ $title ?? '' }}
</x-header>

<x-navbar></x-navbar>

<main class="flex-1 bg-gray-50 min-h-screen">
    {{ $slot }}
</main>

<footer class="bg-gray-800 antialiased pt-14 relative overlay-top">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="border-b py-6 border-gray-700 md:py-8 lg:py-16">
            <div class="items-start gap-6 md:gap-8 lg:flex 2xl:gap-24">
                <div class="grid min-w-0 flex-1 grid-cols-2 gap-6 md:gap-8 xl:grid-cols-3">
                    <div>
                        <h6 class="mb-4 text-sm font-semibold uppercase text-white">Company</h6>
                        <ul class="space-y-3">
                            <li>
                                <a href="#" title="" class=" text-gray-400 hover:text-white">
                                    About </a>
                            </li>

                            <li>
                                <a href="#" title="" class="text-gray-400 hover:text-white">
                                    Premium </a>
                            </li>

                            <li>
                                <a href="#" title="" class=" text-gray-400 hover:text-white">
                                    Blog </a>
                            </li>

                            <li>
                                <a href="#" title="" class=" text-gray-400 hover:text-white">
                                    Affiliate Program </a>
                            </li>

                            <li>
                                <a href="#" title="" class=" text-gray-400 hover:text-white">
                                    Get Coupon </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900 text-white">Order &
                            Purchases</h6>
                        <ul class="space-y-3">
                            <li>
                                <a href="#" title="" class=" text-gray-400 hover:text-white">Order
                                    Status</a>
                            </li>
                            <li>
                                <a href="#" title="" class=" text-gray-400 hover:text-white">Track
                                    Your Order</a>
                            </li>
                            <li>
                                <a href="#" title="" class=" text-gray-400 hover:text-white">Purchase
                                    History</a>
                            </li>
                            <li>
                                <a href="#" title="" class=" text-gray-400 hover:text-white">Returns
                                    & Refunds</a>
                            </li>
                            <li>
                                <a href="#" title="" class=" text-gray-400 hover:text-white">Payment
                                    Methods</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900 text-white">Support &
                            Services</h6>
                        <ul class="space-y-3">
                            <li>
                                <a href="#" title="" class=" text-gray-400 hover:text-white">Contact
                                    Support</a>
                            </li>
                            <li>
                                <a href="#" title="" class=" text-gray-400 hover:text-white">FAQs</a>
                            </li>
                            <li>
                                <a href="#" title="" class=" text-gray-400 hover:text-white">Service
                                    Centers</a>
                            </li>
                            <li>
                                <a href="#" title="" class=" text-gray-400 hover:text-white">Warranty
                                    Information</a>
                            </li>
                            <li>
                                <a href="#" title="" class=" text-gray-400 hover:text-white">Product
                                    Manuals</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-6 w-full md:mt-8 lg:mt-0 lg:max-w-lg">
                    <div class="space-y-5 rounded-lg bg-gray-50 p-6 shadow-sm shadow-gray-400">
                        <div class="text-base font-medium border-b-2 border-dashed text-primary-700 w-fit"> Lokasi
                            Kami </div>

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.155001235972!2d115.21844697592086!3d-8.67680598834165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240eeec312863%3A0x7cffa04e5587c843!2sSMK%20PGRI%206%20Denpasar!5e0!3m2!1sen!2sid!4v1770903262851!5m2!1sen!2sid"
                            width="464" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-6 md:py-8">
            <div class="gap-4 space-y-5 xl:flex xl:items-center xl:justify-between xl:space-y-0">
                <p class="text-sm text-gray-500 text-gray-400">© 2026 <span class="hover:underline">SMK PGRI 6
                        Denpasar</span>. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<x-footer></x-footer>
