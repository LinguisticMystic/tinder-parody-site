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

<div class="flex">
    <div class="flex-1 bg-pink-50 px-1 py-1">
        <a href="/"><img src="img/tinder-logo.png" width="130"></a>
    </div>
    <div class="flex-1 bg-pink-50">
    </div>
    <div class="flex-2">
        <form action="/logout" method="post">
            <button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-8" type="submit">Logout</button>
        </form>
    </div>
</div>

<div class="container mx-auto flex content-center flex-col">
    <div class="text-center my-5">
        <a class="text-ms text-pink-900 font-bold" href=/profile>Go to profile</a>
    </div>
    <div class="m-auto px-20 pt-10 pb-20 mb-20 bg-pink-50 rounded-lg shadow-lg text-center">

        <p class="text-2xl text-pink-900">Your disliked pictures</p>
        <br>

        <div class="grid grid-cols-3 gap-4">
            {% if dislikedPictures is empty %}
            <p class="text-ms text-pink-900">You haven't disliked any pictures yet.</p>
            {% else %}
            {% for picture in dislikedPictures %}
            <a href=/user/{{ picture.user_id }}><img src="profile-pictures/{{ picture.path }}" width="200"></a>
            {% endfor %}
            {% endif %}
        </div>

    </div>
</div>
</body>
</html>