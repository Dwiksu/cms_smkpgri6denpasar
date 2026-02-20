<x-app>
    <x-slot:title>Kontak</x-slot:title>

    <section id="hero" class="bg-white aspect-auto min-h-[300px] md:min-h-0 md:aspect-5/1 w-full relative flex overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('assets/guru.jpeg');">
            <div class="absolute inset-0 bg-linear-to-r from-sky-600/90 to-sky-600/70"></div>
        </div>
        <div class="py-8 px-4 max-w-screen-xl mx-auto w-full lg:py-16 lg:px-8 relative z-10 flex items-end">
            <div>
                <h1 class="mb-4 text-4xl font-bold tracking-tight text-white md:text-5xl lg:text-6xl">
                    Kontak Kami </h1>
                <p class="text-lg font-normal text-white lg:text-xl">
                    Punya pertanyaan seputar pendaftaran, kurikulum, atau kerjasama? Tim kami siap membantu Anda.</p>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 flex-grow">
        <div class="px-4 max-w-screen-xl mx-auto w-full lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20">

                <!-- Contact Info (Left Column) -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Kontak</h2>
                    <p class="text-gray-600 mb-8">
                        Silakan kunjungi sekolah kami pada jam kerja atau hubungi kami melalui saluran komunikasi
                        berikut.
                    </p>

                    <div class="space-y-6">
                        <!-- Address -->
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-blue-50 text-primary rounded-lg flex items-center justify-center text-xl flex-shrink-0">
                                @svg('lucide-map-pin', 'h-5 w-5 text-sky-600')
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Alamat Sekolah</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ $info->address }}
                                </p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-blue-50 text-primary rounded-lg flex items-center justify-center text-xl flex-shrink-0">
                                @svg('lucide-phone', 'h-5 w-5 text-sky-600')
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Telepon & WhatsApp</h3>
                                <p class="text-gray-600 text-sm">
                                    Office: {{ $info->office_phone ?? '-' }}<br>
                                    WhatsApp: {{ $info->whatsapp_phone ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-blue-50 text-primary rounded-lg flex items-center justify-center text-xl flex-shrink-0">
                                @svg('lucide-mail', 'h-5 w-5 text-sky-600')
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Email</h3>
                                <p class="text-gray-600 text-sm">
                                    Informasi Umum: {{ $info->email ?? '-' }}<br>
                                    PPDB: {{ $info->ppdb_link ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-blue-50 text-primary rounded-lg flex items-center justify-center text-xl flex-shrink-0">
                                @svg('lucide-share-2', 'w-5 h-5 text-sky-600')
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-3">Media Sosial Resmi</h3>
                                <div class="flex gap-3">
                                    <a href="{{ $info->facebook }}"
                                        class="w-10 h-10 rounded-full bg-[#1877F2] text-white flex items-center justify-center hover:opacity-90 transition shadow-sm"
                                        title="Facebook">
                                        @svg('lucide-facebook', 'h-5 w-5')
                                    </a>
                                    <a href="{{ $info->instagram }}"
                                        class="w-10 h-10 rounded-full bg-linear-to-tr from-[#f09433] via-[#dc2743] to-[#bc1888] text-white flex items-center justify-center hover:opacity-90 transition shadow-sm"
                                        title="Instagram">
                                        @svg('lucide-instagram', 'h-5 w-5')
                                    </a>
                                    <a href="{{ $info->youtube }}"
                                        class="w-10 h-10 rounded-full bg-[#FF0000] text-white flex items-center justify-center hover:opacity-90 transition shadow-sm"
                                        title="YouTube">
                                        @svg('lucide-youtube', 'h-5 w-5')
                                    </a>
                                    <a href="{{ $info->tiktok }}"
                                        class="w-10 h-10 rounded-full bg-black text-white flex items-center justify-center
           hover:opacity-90 transition shadow-sm"
                                        title="TikTok">
                                        <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.5 1c.9 2.6 2.9 4.6 5.5 5.5v3.3c-2.1 0-4.1-.7-5.5-1.9V15a6 6 0 1 1-6-6c.4 0 .8 0 1.2.1v3.4a2.7 2.7 0 1 0 1.8 2.5V1h3z" />
                                        </svg>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map (Right Column - Replaces Form) -->
                <div
                    class="bg-white p-4 rounded-2xl shadow-lg border border-gray-100 h-full min-h-[400px] flex flex-col">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 px-4 pt-2">Lokasi Kami</h2>
                    <div class="relative w-full flex-grow rounded-xl overflow-hidden bg-gray-100">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.155001235972!2d115.21844697592086!3d-8.67680598834165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240eeec312863%3A0x7cffa04e5587c843!2sSMK%20PGRI%206%20Denpasar!5e0!3m2!1sen!2sid!4v1770903262851!5m2!1sen!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            class="absolute inset-0"></iframe>
                    </div>
                    <div class="mt-4 px-2 flex justify-between items-center text-sm">
                        <span class="text-gray-500"><i class="fa-solid fa-map-pin text-red-500 mr-2"></i>Mudah diakses
                            dari pusat kota</span>
                        <a href="https://maps.google.com" target="_blank"
                            class="text-primary font-bold hover:underline">Buka Google Maps &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app>
