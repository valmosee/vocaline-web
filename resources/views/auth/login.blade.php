<x-guest-layout>
    <x-slot name="header">
        LOGIN
    </x-slot>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <table class="w-full">
                <tr>
                    <td>
                        <x-text-input id="useremail" class="block mt-1 w-full" type="text" name="useremail" required
                            onkeyup="bentukemail()" /></td>
                    <td>
                        <x-select-input onchange="bentukemail()" name="jenisemail" id="jenisemail" required
                            class="ml-2">
                            <option value="@staff.vg.ac.id">@staff.vg.ac.id</option>
                            <option value="@member.vg.ac.id">@member.vg.ac.id</option>
                            <option value="@event.vg.ac.id">@event.vg.ac.id</option>
                        </x-select-input>
                    </td>
                </tr>
            </table>
            <x-text-input id="email" class="hidden" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('register'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('register') }}">
                    {{ __('Have an account?') }}
                </a>
            @endif

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-4"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
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
</script>