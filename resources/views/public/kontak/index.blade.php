<x-app>
    <x-slot:title>Kontak</x-slot:title>

    <section id="hero" class="bg-white aspect-5/1 w-full relative flex overflow-hidden">
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

    <section class="py-16 flex-grow">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20">

                <!-- Contact Info (Left Column) -->
                <div>
                    <h2 class="text-2xl font-serif font-bold text-gray-900 mb-6">Informasi Kontak</h2>
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
                                    Jl. Pendidikan No. 123, Kelurahan Cerdas,<br>
                                    Kecamatan Harapan, Kota Harapan, 12345
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
                                    Kantor: (021) 1234-5678<br>
                                    WhatsApp: +62 812-3456-7890 (Humas)
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
                                    Informasi Umum: info@smkharapanbangsa.sch.id<br>
                                    PPDB: ppdb@smkharapanbangsa.sch.id
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
                                    <a href="#"
                                        class="w-10 h-10 rounded-full bg-[#1877F2] text-white flex items-center justify-center hover:opacity-90 transition shadow-sm"
                                        title="Facebook">
                                        @svg('lucide-facebook', 'h-5 w-5')
                                    </a>
                                    <a href="#" class="w-10 h-10 rounded-full bg-linear-to-tr from-[#f09433] via-[#dc2743] to-[#bc1888] text-white flex items-center justify-center hover:opacity-90 transition shadow-sm"
                                        title="Instagram">
                                        @svg('lucide-instagram', 'h-5 w-5')
                                    </a>
                                    <a href="#"
                                        class="w-10 h-10 rounded-full bg-[#FF0000] text-white flex items-center justify-center hover:opacity-90 transition shadow-sm"
                                        title="YouTube">
                                        @svg('lucide-youtube', 'h-5 w-5')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map (Right Column - Replaces Form) -->
                <div
                    class="bg-white p-4 rounded-2xl shadow-lg border border-gray-100 h-full min-h-[400px] flex flex-col">
                    <h2 class="text-2xl font-serif font-bold text-gray-900 mb-6 px-4 pt-2">Lokasi Kami</h2>
                    <div class="relative w-full flex-grow rounded-xl overflow-hidden bg-gray-100">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613507864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sPT%20Google%20Indonesia!5e0!3m2!1sid!2sid!4v1633072803112!5m2!1sid!2sid"
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
