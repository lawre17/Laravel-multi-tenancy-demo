<x-guest-layout>
    <h3 class="text-center text-lg">Add Tenants</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Tenant Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- tenant -->
        <div class="mt-4">
            <x-input-label for="tenant" :value="__('Database')" />
            <select name="tenant" id="tenant" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value=""></option>
                @foreach ($databases as $db)
                <option value="{{$db->Database}}">{{$db->Database}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('tenant')" class="mt-2" />
        </div>

        

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
