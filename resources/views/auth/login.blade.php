<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo" >
            {{-- <img src="{{ asset('img/logo.png') }}" style="height: 50%; width: 50%" /> --}}
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="text-center m-4">
                <img class="mb-3 center-block" src="{{ asset('img/logo.png') }}" />
                <hr>
            </div>

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="mt-4">
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-jet-button >
                    <a href="{{ route('pegawai-login') }}" class="text-white">
                        {{ __('Login sebagai pegawai') }}
                    </a>
                </x-jet-button>

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
