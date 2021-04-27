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
    <div class="mx-auto px-20 py-20 my-20 bg-pink-50 rounded-lg text-center">
        <form action="/register" method="post">
            <a href="/"><img class="mx-auto" src="img/tinder-logo.png" width="180"></a>
            <br>
            <p class="text-pink-900">Username</p><input class="mx-auto flex rounded-full border-grey-light border h-8"
                                                        type="text" name="username">
            <br>
            <p class="text-pink-900">Sex</p>
            <div class="flex justify-evenly">
                <div><input type="radio" name="sex" value="male"><img src="img/sex-male.png" width="20"></div>
                <div><input type="radio" name="sex" value="female"><img src="img/sex-female.png" width="20"></div>
            </div>
            <br>
            <p class="text-pink-900">Password</p><input class="mx-auto flex rounded-full border-grey-light border h-8"
                                                        type="password" name="password">
            <br>
            <p class="text-pink-900">Confirm password</p><input class="mx-auto flex rounded-full border-grey-light border h-8"
                                                                type="password" name="confirmPassword">

            {% for error in errors %}
            <p class="text-red-700">{{ error|capitalize }}</p>
            {% endfor %}

            <br>
            <button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-20 rounded" type="submit">Register
            </button>
        </form>
    </div>
</div>

</body>
</html>