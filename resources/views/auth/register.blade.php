<x-guest-layout>
    <x-slot name="header">
        <div class="text-center text-3xl font-extrabold text-indigo-700 py-6 tracking-tight"> Register</div>
    </x-slot>

    <form method="POST" action="{{ route('register') }}" class="bg-white shadow-xl rounded-2xl px-10 py-8 max-w-5xl mx-auto">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Kolom Kiri -->
            <div class="space-y-5">
                <div>
                    <x-input-label for="nama" :value="__('Nama')" />
                    <x-text-input id="nama" class="block w-full" type="text" name="nama"
                        required :value="old('nama')" autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="nrp" :value="__('NRP')" />
                    <x-text-input id="nrp" class="block w-full" type="text" name="nrp"
                        required :value="old('nrp')" autocomplete="nrp" />
                    <x-input-error :messages="$errors->get('nrp')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="angkatan" :value="__('Angkatan')" />
                    <x-text-input id="angkatan" class="block w-full" type="text" name="angkatan"
                        required :value="old('angkatan')" autocomplete="angkatan" />
                    <x-input-error :messages="$errors->get('angkatan')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="jurusan" :value="__('Jurusan')" />
                    <x-text-input id="jurusan" class="block w-full" type="text" name="jurusan"
                        required :value="old('jurusan')" autocomplete="jurusan" />
                    <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="id_line" :value="__('ID Line')" />
                    <x-text-input id="id_line" name="id_line" class="block w-full" type="text"
                        :value="old('id_line')" autocomplete="id_line" />
                    <x-input-error :messages="$errors->get('id_line')" class="mt-2" />
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="space-y-5">
                <div>
                    <x-input-label for="useremail" :value="__('Email')" />
                    <div class="flex gap-2 mt-1">
                        <x-text-input id="useremail" class="w-full" type="text" name="useremail_part"
                            required onkeyup="bentukemail()" />
                        <x-select-input onchange="bentukemail()" name="jenisemail" id="jenisemail" required>
                            <option value="@staff.vg.ac.id">@staff.vg.ac.id</option>
                            <option value="@member.vg.ac.id">@member.vg.ac.id</option>
                            <option value="@event.vg.ac.id">@event.vg.ac.id</option>
                        </x-select-input>
                    </div>
                    <x-text-input id="email" class="hidden" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block w-full" type="password" name="password"
                        required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="no_hp" :value="__('No HP')" />
                    <x-text-input id="no_hp" name="no_hp" required class="block w-full" type="text"
                        :value="old('no_hp')" autocomplete="no_hp" />
                    <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="jeniskelamin" :value="__('Jenis Kelamin')" />
                    <x-select-input name="jeniskelamin" id="jeniskelamin" required class="block w-full">
                        <option value="Laki-laki"
                            {{ old('jeniskelamin', $akun->jeniskelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki</option>
                        <option value="Perempuan"
                            {{ old('jeniskelamin', $akun->jeniskelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan</option>
                    </x-select-input>
                    <x-input-error :messages="$errors->get('jeniskelamin')" class="mt-2" />
                </div>
            </div>
        </div>

        <!-- Tombol -->
        <div class="flex items-center justify-between mt-8 border-t pt-6">
            <a class="text-sm text-indigo-600 hover:underline" href="{{ route('login') }}">
                {{ __('Sudah punya akun? Login') }}
            </a>

            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', () => bentukemail());
        function bentukemail() {
            const useremail = document.getElementById("useremail").value;
            const jenisemail = document.getElementById("jenisemail").value;
            document.getElementById("email").value = useremail + jenisemail;
        }
    </script>
</x-guest-layout>
