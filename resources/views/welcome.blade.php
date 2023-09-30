<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
     @php $pwd =  Hash::make('12345');@endphp

    <form method="POST" action="{{ route('identify') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Client Code')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="code" :value="old('code')"  autofocus autocomplete="code" />
            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
             <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Add new client') }}
            </a>
            <x-primary-button class="mx-auto w-60 justify-center ">
                {{ __('Continue') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
