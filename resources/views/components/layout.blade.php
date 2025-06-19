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
    <style> {{ $style }}</style> <!-- After making many more styles, should have left the <style> tags for each view... -->
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

    <!-- Navbar CSS (Using at_stack, at_push did not work) -->

    <style>
        #head {
            position: sticky;
            top: 0;
            z-index: 1000; /* Ensure it stays above other content */
            padding: 0 0.5rem;
        }

        #header {
            display: flex;
            flex-wrap: wrap;
            row-gap: 1rem;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }
        #title {
            font-family: 'Buenard', serif;
            font-size: 225%;
            letter-spacing: 0.4vw;
            padding-top: 3.5vh;
        }

        .hor-line {
            height: 1px;
            background-color: black;
            width: 100%; /* length of the line */
            margin: 0 10px;
        }

        .nav-link {
            color: black;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
        }

        .nav-link:hover {
            color: darkgray;
            text-decoration: underline;
        }

        .ver-line {
            width: 1px;
            height: 30px;
            background-color: black;
        }


        #navbar {
            font-family: 'Buenard', serif;
            font-size: 150%;
        }

        .lang-btn {
            background-color: #F5EED2;
            border: 1px solid black;
            padding: 0.375rem 0.75rem;
            font-weight: 500;
            font-family: 'Buenard', serif;
        }

        .lang-btn:hover,
        .lang-btn:focus {
            background-color: #e9e0c1;
            border-color: gray;
        }

        .lang-menu {
            background-color: #F5EED2;
            padding: 0;
            margin: 0;
            border: 1px solid black;
            min-width: 8rem;
        }
        .lang-menu .dropdown-item {
            padding: 0.5rem 1rem;
            color: black;
            font-family: 'Buenard', serif;
            background-color: transparent;
        }

        .lang-menu .dropdown-item:hover {
            background-color: #e9e0c1;
        }

        .auth-btn {
            background-color: #F5EED2;
            border: 1px solid black;
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
            padding: 0.375rem 0.75rem;
            text-decoration: none;
        }

        .auth-btn:hover {
            background-color: #e9e0c1;
            color: black;
            border-color: gray;
        }

        #username {
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
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
