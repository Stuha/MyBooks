<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Books</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-dark bg-dark  border-bottom">
        <div class="container">
            <a class="navbar-brand" href="/">My Books</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</div>

<div id="app" class="">
    <books-list
        :columns="['author_name', 'title', 'category' , 'publish_at', 'country', 'page_no']"
    ></books-list>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
