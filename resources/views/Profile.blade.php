@extends('layouts.app2')

@section('content')
<section>
    <title>Login info</title>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto p-6 flex justify-between mb-6 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center">
                <h2>
                    Profile
                </h2>
            </div>
        </div>
    </header>
</section>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <ul>
                    <li>Username : {{$user->name}}</li>
                    <li>Email : {{$user->email}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection