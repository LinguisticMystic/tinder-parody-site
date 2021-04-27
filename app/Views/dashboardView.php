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
    <div class="flex-2 bg-pink-50 px-1 py-1">
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

        {%if ( randomUsername is empty ) and ( randomUserID is empty ) and  ( pathToRandomUserPicture is empty ) %}
        <p class="text-pink-900">Nothing to show.</p>
        <p class="text-pink-900">You have rated every user there is to rate.</p>
        {% else %}

        <a class="text-pink-900" href=/user/{{ randomUserID }}>{{ randomUsername }}</a>
        <br>
        <br>
        <img src="profile-pictures/{{ pathToRandomUserPicture }}" width="400">
        <br>
        <br>
        <div class="flex justify-evenly">
        <div>
            <form action="/rate" method="post">
                <button class="text-8xl" type="submit" name="rate" value="0-{{ randomUserID }}">👎</button>
            </form>
        </div>
        <div>
            <form action="/rate" method="post">
                <button class="text-8xl" type="submit" name="rate" value="1-{{ randomUserID }}">👍</button>
            </form>
        </div>
        </div>

        {% endif %}

    </div>
</div>

</body>
</html>