<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$post->title}}</title>
</head>
<body>
    <div class="">
        <h1>{{$post->title}}</h1>
        <p>Creato il : {{$post->created_at->format('d-m-y H:i')}}</p>
        <div class="">
            <p>{{post->content}}</p>
        </div>
    </div>
</body>
</html>