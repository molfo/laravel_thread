<!DOCTYPE html>
<html>

<head>
    <section>
        <meta charset="UTF-8">
        <meta name="description" content="Comment board">
        <meta name="keywords" content="laravel,breeze,board">
        <meta name="author" content="Masakazu Kobayashi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comment Board</title>
    </section>
    <section>
        <h2>
            Comment board
        </h2>
    </section>
</head>

<body>
    <!-- Comment form -->
    <section>
        <form action="{{ route('', ) }}" method="POST" class="">
            @csrf
            <label for="comment">Comment</label><br>
            <textarea id="comment" name="comment" cols="30" rows="4"></textarea>
            <input type="submit" value="Submit">
        </form>
        <hr>
    </section>
    <!-- comments -->
    <section>
        @if ($comments->count())
        @foreach ($comments as $comment)
        <div class="post" id={{id}}>
            <div class="meta">
                <span class="number">{{id}}</span>
                <span class="username">
                    <b>{{username}}</b>
                </span>
                <span class="date">{{created_at}}</span>
            </div>
            <div class="comments">
                {{$comment}}
            </div>
        </div>
        @endforeach
        @else
        <p>No comments</p>
        @endif
    </section>
</body>

</html>