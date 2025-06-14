<x-guest-layout>
    <x-slot name="header">
        REGISTER
    </x-slot>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                <div>
                    <div>
                        <x-input-label for="nama" :value="__('Nama')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                            required :value="old('nama')" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="nrp" :value="__('NRP')" />
                        <x-text-input id="nrp" class="block mt-1 w-full" type="text" name="nrp"
                            required :value="old('nrp')" autocomplete="nrp" />
                        <x-input-error :messages="$errors->get('nrp')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="angkatan" :value="__('Angkatan')" />
                        <x-text-input id="angkatan" class="block mt-1 w-full" type="text" name="angkatan"
                            required :value="old('angkatan')" autocomplete="angkatan" />
                        <x-input-error :messages="$errors->get('angkatan')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="jurusan" :value="__('Jurusan')" />
                        <x-text-input id="jurusan" class="block mt-1 w-full" type="text" name="jurusan"
                            required :value="old('jurusan')" autocomplete="jurusan" />
                        <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="id_line" :value="__('ID Line')" />
                        <x-text-input id="id_line" name="id_line" class="block mt-1 w-full" type="text"
                            :value="old('id_line')" autocomplete="id_line" />
                        <x-input-error :messages="$errors->get('id_line')" class="mt-2" />
                    </div>
                </div>

                <div>
                    <div>
                        <x-input-label for="useremail" :value="__('Email')" />
                        <div class="flex mt-1">
                            <x-text-input id="useremail" class="flex-grow" type="text" name="useremail_part"
                                required onkeyup="bentukemail()" />
                            <x-select-input onchange="bentukemail()" name="jenisemail" id="jenisemail" required
                                class="ml-2">
                                <option value="@staff.vg.ac.id">@staff.vg.ac.id</option>
                                <option value="@member.vg.ac.id">@member.vg.ac.id</option>
                                <option value="@event.vg.ac.id">@event.vg.ac.id</option>
                            </x-select-input>
                        </div>
                        <x-text-input id="email" class="hidden" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="no_hp" :value="__('No HP')" />
                        <x-text-input id="no_hp" name="no_hp" required class="block mt-1 w-full" type="text"
                            :value="old('no_hp')" autocomplete="no_hp" />
                        <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="jeniskelamin" :value="__('Jenis Kelamin')" />
                        <x-select-input name="jeniskelamin" id="jeniskelamin" required class="block mt-1 w-full">
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

            <div class="flex items-center justify-end mt-6">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>

<script language="javascript">
    document.addEventListener('DOMContentLoaded', (event) => {
        bentukemail();
    });

    function bentukemail() {
        var useremail = document.getElementById("useremail").value;
        var jenisemail = document.getElementById("jenisemail").value;
        var email = useremail + jenisemail;
        document.getElementById("email").value = email;
    }
</script>S