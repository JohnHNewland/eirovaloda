<html>
<head>
    <title>
        Eirovaloda
    </title>
    <style>
        * {
            background-color: #F5EED2;
        }
        p {
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
            color: black;
        }
        a {
            font-size: 125%;
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

    <p>{{ 'Uzspied uz šo linku, lai apstiprinātu e-pastu: ' . $user->email }}</p>
    <a href="{{ $url }}">
        Apstiprināt e-pastu
    </a>
</body>
</html>
