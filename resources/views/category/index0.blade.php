<!doctype html>
<html lang="`en`">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Composer</title>
</head>
<body>

<ul>
    @foreach($categories as $category)
        <li>
            {{$category->name}}
        </li>
    @endforeach

    <hr>


    <form action="{{route('logg')}}" method="post">
        @csrf
        name<input type="text" name="name" id="name">
        email<input type="email" name="email" id="email">
        password<input type="text" name="password" id="password">

        <button type="submit">Login</button>
    </form>
</ul>
</body>
</html>
