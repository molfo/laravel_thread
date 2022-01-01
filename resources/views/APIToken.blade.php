<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h3 class="font-semibold text-xl text-gray-800 leading-tight">
                    Login Infomation. THE TOKEN CAN ONLY BE CONFIRMED THIS ONCE!
                </h3>
                <p></p>
                <p>Username : {{$user->name}}</p>
                <p>Email : {{$user->email}}</p>
                <p>Token : {{$token}}</p>
            </div>
        </div>
    </div>

    <div class="ml-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                User infomationm
            </a>
        </div>
    </div>

</x-app-layout>