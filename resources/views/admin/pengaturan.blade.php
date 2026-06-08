<x-app-layout>
    <x-slot:title>Pengaturan</x-slot:title>

    <div class="space-y-6">
        <div>
            <h1 class="text-3xl font-bold">Pengaturan</h1>
            <p class="text-gray-500">Kelola pengaturan admin panel.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="rounded-xl border border-default bg-neutral-primary-soft shadow-xs  text-card-foreground">
                <div class="flex flex-col p-6">
                    <p class="text-2xl font-semibold tracking-tight">Ubah Credential</p>
                    <p class="text-sm text-gray-500">Edit credential admin panel.
                    </p>
                </div>
                <form class="p-6 pt-0" action="{{ route('admin.pengaturan.user.update', $user) }}" method="POST"
                    data-delay-submit>
                    @csrf
                    @method('PUT')
                    <div class="mb-5">
                        <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Email</label>
                        <input id="email" type="text" name="email"
                            value="{{ old('email', $user->email ?? '') }}"
                            class="bg-neutral-secondary-medium border {{ errorBorder('email') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Masukkan email..." />
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Password Lama</label>
                        <input type="password" name="old_password" value="{{ old('old_password', '') }}"
                            class="bg-neutral-secondary-medium border {{ errorBorder('old_password') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Masukkan password lama..." />
                        @error('old_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Password Baru</label>
                        <input type="password" name="password" value="{{ old('password', '') }}"
                            class="bg-neutral-secondary-medium border {{ errorBorder('password') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Masukkan password baru..." />
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation"
                            value="{{ old('password_confirmation', '') }}"
                            class="bg-neutral-secondary-medium border {{ errorBorder('password_confirmation') }} text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Konfirmasi password baru..." />
                        @error('password_confirmation')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        @svg('lucide-save', 'h-4 w-4 me-1.5')
                        Simpan Credential</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
