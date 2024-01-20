<html>
    <head>
        <title>Contact Mail</title>
    </head>

    <body>
        <p>Title : {{ $mailContents->mail_title }}</p>
        <p>
            <img src="{{ asset($mailContents->media_location) }}">
        </p>
    </body>
</html>