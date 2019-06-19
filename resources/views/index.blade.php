<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task</title>
    </head>
    <body>
        <h1>Test Api</h1>

        <hr>

        <h2>Registration</h2>

        <form method="POST" action="{{ route('registration') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <br>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="">
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <br>
            <button type="submit">Ok</button>
        </form>

        <hr>
        <h2>User details (GET)</h2>

        <a href="{{ url('user-details?token=$2y$10$xFroTpYCehX7m7m3ca9PtehCdPWxH6CzmMSiqjql.UCASVv.0Tlci') }}">
            {{ url('user-details?token=$2y$10$xFroTpYCehX7m7m3ca9PtehCdPWxH6CzmMSiqjql.UCASVv.0Tlci') }}
        </a>

        <hr>
        <h2>Create</h2>

        <form method="POST" action="{{ route('create') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="text" name="token" value="$2y$10$xFroTpYCehX7m7m3ca9PtehCdPWxH6CzmMSiqjql.UCASVv.0Tlci">
            <br>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            <br>
            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>
            <br>
            <button type="submit">Ok</button>
        </form>

        <hr>
        <h2>Update</h2>

        <form method="POST" action="{{ route('update') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="text" name="token" value="$2y$10$xFroTpYCehX7m7m3ca9PtehCdPWxH6CzmMSiqjql.UCASVv.0Tlci">
            <br>
            <label for="note_id">note_id</label>
            <input type="number" name="note_id" id="note_id">
            <br>
            <label for="title">title</label>
            <input type="text" name="title" id="title">
            <br>
            <label for="description">description</label>
            <textarea name="description" id="description"></textarea>
            <br>
            <button type="submit">Ok</button>
        </form>


        <hr>
        <h2>List (GET)</h2>

        <a href="{{ url('list?token=$2y$10$xFroTpYCehX7m7m3ca9PtehCdPWxH6CzmMSiqjql.UCASVv.0Tlci') }}">
            {{ url('list?token=$2y$10$xFroTpYCehX7m7m3ca9PtehCdPWxH6CzmMSiqjql.UCASVv.0Tlci') }}
        </a>

    </body>
</html>
