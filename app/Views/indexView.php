<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../main.css">
    <title>Tinder</title>
</head>
<body>

<div class="container mx-auto flex content-center">
    <div class="m-auto px-20 py-20 my-20 bg-pink-50 rounded-lg shadow-lg text-center">
        <form action="/login" method="post">
            <a href="/"><img class="mx-auto my-10" src="img/tinder-logo.png" width="180"></a>
            <br>
            <p class="text-pink-900">Username</p><input class="mx-auto flex rounded-full border-grey-light border h-8"
                                                        type="text" name="username">
            <p class="text-pink-900">Password</p><input class="mx-auto flex rounded-full border-grey-light border h-8"
                                                        type="password" name="password">
            <br>

            {% for error in errors %}
            <p class="text-red-700">{{ error|capitalize }}</p>
            {% endfor %}

            <br>
            <button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-20 rounded" type="submit">Log in
            </button>
            <br>
            <br>
            <a class="text-xs text-pink-900 font-bold" href=/register>Register</a>
        </form>
    </div>
</div>

</body>
</html>