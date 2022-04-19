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
        </div>
    </nav>
</div>

<div id="app">
    <books-list
        :columns="['author_name', 'title', 'category' , 'publish_at', 'country', 'page_no']"
    ></books-list>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
