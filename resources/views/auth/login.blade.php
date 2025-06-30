<x-guest-layout>
    <x-slot name="header">
        <div class="text-center text-3xl font-extrabold text-indigo-700 py-6 tracking-tight">Login</div>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="bg-white shadow-lg rounded-2xl px-8 py-10 max-w-md mx-auto space-y-6">
        @csrf

        <!-- Email Input -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold mb-1" />
            <div class="flex gap-2">
                <x-text-input id="useremail" class="block w-full border-gray-300 rounded-md shadow-sm" type="text" name="useremail" required onkeyup="bentukemail()" />
                <x-select-input onchange="bentukemail()" name="jenisemail" id="jenisemail" required class="border-gray-300 rounded-md shadow-sm">
                    <option value="@staff.vg.ac.id">@staff.vg.ac.id</option>
                    <option value="@member.vg.ac.id">@member.vg.ac.id</option>

                </x-select-input>
            </div>
            <x-text-input id="email" class="hidden" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password Input -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold mb-1" />
            <x-text-input id="password" class="block w-full border-gray-300 rounded-md shadow-sm" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <label for="remember_me" class="ml-2 text-sm text-gray-600">Ingat saya</label>
        </div>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mt-6">
            <div class="space-x-2 text-sm">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Belum punya akun?</a>
                @endif
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline">Lupa password?</a>
                @endif
            </div>

            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Keterangan -->
        <div class="mt-6 bg-indigo-50 border border-indigo-200 rounded-md p-4 text-sm text-gray-700">
            <strong class="block text-gray-800 mb-1">Keterangan pengisian email:</strong>
            <ul class="list-disc list-inside space-y-1">
                <li>Fungsionaris: gunakan email <code>@staff.vg.ac.id</code></li>
                <li>Peserta: gunakan email <code>@member.vg.ac.id</code></li>
            </ul>
        </div>
    </form>

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => bentukemail());
        function bentukemail() {
            const useremail = document.getElementById("useremail").value;
            const jenisemail = document.getElementById("jenisemail").value;
            document.getElementById("email").value = useremail + jenisemail;
        }
    </script>
</x-guest-layout>
