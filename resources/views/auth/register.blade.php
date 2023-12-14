<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Naam')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- surname -->
        <div>
        <x-input-label for="surname" :value="__('Familienaam')" />
        <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Aanvoerder (Captain) -->
        <div class="mt-4">
            <x-input-label for="teamleader" :value="__('Aanvoerder')" />
            <div>
                <input id="aanvoerder_yes" type="radio" name="teamleader" value="1">
                <label for="aanvoerder_yes">Yes</label>
            </div>
            <div>
                <input id="aanvoerder_no" type="radio" name="teamleader" value="0" checked>
                <label for="aanvoerder_no">No</label>
            </div>
        </div>

        <!-- Reservespeler (Reserve Player) -->
        <div class="mt-4">
            <x-input-label for="reserveplayer" :value="__('Reservespeler')" />
            <div>
                <input id="reservespeler_yes" type="radio" name="reserveplayer" value="1">
                <label for="reservespeler_yes">Yes</label>
            </div>
            <div>
                <input id="reservespeler_no" type="radio" name="reserveplayer" value="0" checked>
                <label for="reservespeler_no">No</label>
            </div>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Wachtwoord')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Bevestig Wachtwoord')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Al ingeschreven?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
