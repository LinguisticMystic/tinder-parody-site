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
        <a class="text-ms text-pink-900 font-bold" href=/dashboard>Back to user gallery</a>
    </div>
    <div class="m-auto px-20 pt-10 pb-20 mb-20 bg-pink-50 rounded-lg shadow-lg text-center">
        {% if pictures is empty %}
        <img class="mx-auto rounded-full" src="img/empty-profile-image.png" width="200">
        {% else %}
        {% for picture in pictures %}
        {% if picture.is_main == 1 %}
        <img class="mx-auto rounded-full" src="profile-pictures/{{ picture.path }}" width="200">
        {% endif %}
        {% endfor %}
        {% endif %}

        <p>Hi, {{ username }}!</p>

        <div><a class="text-pink-900" href=/edit-gallery>Add & remove pictures</a></div>
        <div><a class="text-pink-900" href=/favorites>View liked pictures</a></div>
        <div><a class="text-pink-900" href=/dislikes>View disliked pictures</a></div>

        <div class="grid grid-flow-col auto-cols-max gap-4">
            {% for picture in pictures %}
            {% if picture.is_main == 0 %}
            <img src="profile-pictures/{{ picture.path }}" width="200">
            {% endif %}
            {% endfor %}
        </div>

    </div>
</div>
</body>
</html>