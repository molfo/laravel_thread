@extends('layouts.app2')

@section('content')

<section>
    <title>Login info</title>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto p-6 flex justify-between mb-6 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center">
                <h2>
                    Login infomation
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
                    <h1>
                        THE TOKEN CAN ONLY BE CONFIRMED THIS ONCE!
                    </h1>
                    <hr>
                    <li>Username : {{$user->name}}</li>
                    <li>Email : {{$user->email}}</li>
                    <li>Token : {{$token}}</li>
                </ul>
                <br>
                <div id="tec_message"></div>
            </div>
        </div>
    </div>
</div>
<!-- Script for save bearer token in local storage -->
<script language="javascript" type="text/javascript">
    var message = "";
    if (!window.localStorage) {
        message = "Tokenをローカルストレージに保存できませんでした";
        console.log(`tec_message= ${message}`);
        document.getElementById("tec_message").innerHTML = message;
    } else {
        window.localStorage.removeItem('bearer_token');
        const bearer_token = @json($token);
        // var bearer_token = document.getElementById("bearer_token").value;
        console.log(`bearer_token = ${bearer_token}`);
        window.localStorage.setItem('bearer_token', bearer_token);
        message = "Tokenをローカルストレージに保存しました";
        console.log(`tec_message= ${message}`);
        document.getElementById("tec_message").innerHTML = message;
    }
</script>
@endsection