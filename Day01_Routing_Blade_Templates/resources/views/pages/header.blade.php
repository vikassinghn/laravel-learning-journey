{{-- <h1>Header Page</h1>
@forelse ($names as $c)
    <p>{{ $c }}</p>
@empty
    <p>No item Found!</p>
@endforelse --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yahoo Baba</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="wrapper">
        <header>
            <h1>YahooBaba</h1>
        </header>
        <nav>
            <a href="/">Home</a> |
            <a href="/about">About</a> |
            <a href="/post">Post</a>
        </nav>
        <main>