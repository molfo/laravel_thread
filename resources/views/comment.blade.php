@extends('layouts.app2')

@section('content')
<section>
    <title>Comments</title>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto p-6 flex justify-between mb-6 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center">
                <h2>
                    Comment board
                </h2>
            </div>
        </div>
    </header>
    <hr>
</section>
<div class="flex justify-center">
    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg">
        <section>
            <!-- Comment form -->
            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="comment">Comment</label><br>
                    <textarea id="comment" name="comment" cols="30" rows="4" value="{{ old('comment') }}" class="@error('comment') @enderror"></textarea>
                    <!-- <input type="text" value="{{ old('comment') }}" class="@error('comment') text-red-500 @enderror"> -->

                    @error('comment')
                    <div class="alert alert-error mb-4 text-red-500">
                        {{$message}}
                    </div>
                    @enderror

                    <!-- @if(session('success_message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                        <strong>Successful!</strong> {{ session('success_message') }}
                    </div>
                    @endif
                    @if(session('error_message'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                        <strong>Error!</strong> {{ session('error_message') }}
                    </div>
                    @endif-->

                    <button type="submit" class="flex justify-end pb-2 font-medium rounded-md border">
                        ????????????
                    </button>
                </div>
            </form>
            <hr>
            <!-- ApiComment form -->
            <form action="{{ route('api.comment.store') }}" method="POST" id="apicommentForm">
                <!-- @csrf -->
                <div class="mb-2">
                    <label for="api-comment">API???????????????????????????</label><br>
                    <textarea id="api-comment" name="api-comment" cols="30" rows="4"></textarea>
                    <button type="submit" class="flex justify-end pb-2 font-medium rounded-md border text-blue-700">
                        API??????
                    </button>
                </div>
            </form>
            <hr>
        </section>
        <!-- comments -->
        <section>
            @if ($comments->count())
            @foreach ($comments as $comment)
            <div class="post" id={{$comment->id}}>
                <div class="meta">
                    <b>
                        <span class="number">
                            {{$comment->display_no}}
                        </span>
                        <span class="username">
                            {{$comment->user->name}}
                        </span>
                        <span class="date">
                            {{$comment->created_at}}
                        </span>
                        <span class="user_id">
                            ID:{{$comment->user_id}}
                        </span>
                    </b>
                </div>

                <div class="px-6">
                    {{$comment->comment}}
                </div>
                <!-- delete button -->
                @if(Auth::user()->id===$comment->user_id)
                <form action="{{route('comment.destroy',$comment)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex justify-end rounded-md border text-red-500">
                        ??????
                    </button>
                </form>
                @endif
            </div>
            <hr>
            @endforeach
            <p>{{$comments->links()}}</p>
            @else
            <p>No comments</p>
            @endif
        </section>
    </div>
</div>
<script language="javascript" type="text/javascript">
    const bearer_token = window.localStorage.getItem('bearer_token');
    let element = document.getElementById('apicommentForm');
    element.insertAdjacentHTML('beforeend', `<input type="hidden" id="bearer_token" name="bearer_token" value=${bearer_token}>`);
</script>
@endsection