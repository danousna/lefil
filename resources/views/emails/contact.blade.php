<!DOCTYPE html>
<html>
<head>
    <title>Nouveau message reçu.</title>
    <style type="text/css">
        body {
            font-size: 15px;
            color: black;
            font-family: 'Helvetica Neue', 'Helvetica', sans-serif;
        }

        p {
            margin: 0;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 800;
        }
    </style>
</head>
<body>
    <h3>Nouveau message reçu :</h3>
    Nom : <b>{{ $request['name'] }}</b><br>
    Email : <b>{{ $request['email'] }}</b><br><br>
    Message :<br>
    <p>{{ $request['message'] }}</p>
</body>
</html>