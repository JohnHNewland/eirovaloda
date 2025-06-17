<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Buenard&display=swap" rel="stylesheet">
    <style>
        *, body {
            background-color: #F5EED2;
        }
        html {
            height: 100vh;
        }
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .main-container {
            width: 100vw;
            margin: 0;
            height: 100%;
        }
    </style>
</head>
<body>
<x-navbar/>
<main class="main-container">
    {{ $slot }}
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
