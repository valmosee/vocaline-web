<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama -->
        <div class="mt-4">
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" id="nama" name="nama" required
                :value="old('nama')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <!-- NRP -->
        <div class="mt-4">
            <x-input-label for="nrp" :value="__('NRP')" />
            <x-text-input id="nrp" class="block mt-1 w-full" type="text" id="nrp" name="nrp" required
                :value="old('nrp')" autocomplete="nrp" />
            <x-input-error :messages="$errors->get('nrp')" class="mt-2" />
        </div>

        <!-- Angkatan -->
        <div class="mt-4">
            <x-input-label for="angkatan" :value="__('Angkatan')" />
            <x-text-input id="angkatan" class="block mt-1 w-full" type="text" id="angkatan" name="angkatan" required
                :value="old('angkatan')" autocomplete="angkatan" />
            <x-input-error :messages="$errors->get('angkatan')" class="mt-2" />
        </div>

        <!-- Jurusan -->
        <div class="mt-4">
            <x-input-label for="jurusan" :value="__('Jurusan')" />
            <x-text-input id="jurusan" class="block mt-1 w-full" type="text" id="jurusan" name="jurusan" required
                :value="old('jurusan')" autocomplete="jurusan" />
            <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        
        <!-- Jenis Kelamin -->
        <div class="mt-4">
            <x-input-label for="jeniskelamin" :value="__('Jenis Kelamin')" />
            <select name="jeniskelamin" id="jeniskelamin" required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="Laki-laki" {{ (old('jeniskelamin', $akun->jeniskelamin ?? '') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ (old('jeniskelamin', $akun->jeniskelamin ?? '') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
            </select>
            <x-input-error :messages="$errors->get('jeniskelamin')" class="mt-2" />
        </div>

        <!-- No HP -->
        <div class="mt-4">
            <x-input-label for="no_hp" :value="__('No HP')" />
            <input type="text" id="no_hp" name="nrp" required
                class="w-full px-4 py-3 rounded-md bg-gray-400 text-white text-base outline-none focus:ring-2 focus:ring-gray-600 placeholder-white"
                placeholder="Masukkan No HP">
        </div>

        <!-- ID Line -->
        <div class="mt-4">
            <x-input-label for="id_line" :value="__('ID Line')" />
            <input type="text" id="id_line" name="id_line" required
                class="w-full px-4 py-3 rounded-md bg-gray-400 text-white text-base outline-none focus:ring-2 focus:ring-gray-600 placeholder-white"
                placeholder="Masukkan ID Line">
        </div>

        <!-- Jurusan -->
        <div class="mt-4">
            <x-input-label for="jurusan" :value="__('Jurusan')" />
            <input type="text" id="jurusan" name="jurusan" required
                class="w-full px-4 py-3 rounded-md bg-gray-400 text-white text-base outline-none focus:ring-2 focus:ring-gray-600 placeholder-white"
                placeholder="Masukkan Jurusan">
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
