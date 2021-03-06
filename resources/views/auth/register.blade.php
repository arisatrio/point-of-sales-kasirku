<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="text-center m-4">
                <img class="mb-3 center-block" src="{{ asset('img/logo.png') }}" />
                <hr>
            </div>
            <div>
                <x-jet-label for="name" value="{{ __('Nama Pemilik') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <!-- Jenis Usaha -->
            <div class="mt-4">
                @livewire('jenis-usaha')
            </div>
            
            <!-- Alamat Toko -->
            <div class="mt-4">
                <x-jet-label for="alamat_toko" value="{{ __('Alamat Toko') }}" />
                <x-jet-input name="alamat_toko" type="text" class="mt-1 block w-full" wire:model.defer="state.alamat_toko" required autocomplete="alamat_toko" />
                <x-jet-input-error for="alamat_toko" class="mt-2" />
            </div>

            <!-- No Telepon -->
            <div class="mt-4">
                <x-jet-label for="nohp" value="{{ __('No Telepon') }}" />
                <x-jet-input name="nohp" type="text" class="mt-1 block w-full" wire:model.defer="state.nohp" required autocomplete="nohp" />
                <x-jet-input-error for="nohp" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Sudah daftar?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Daftar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
