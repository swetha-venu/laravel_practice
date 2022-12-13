<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .errors{
            color:red;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        @csrf
        <label for="name">enter name:</label>
        <input type="text" name="name" id=""><br>
        <label for="email">enter email:</label>
        <input type="email" name="email" id=""><br>
        <label for="password">enter password:</label>
        <input type="password" name="password" id=""><br>
        <label for="cpassword">confirm password:</label>
        <input type="password" name="cpassword" id=""><br>
        <button type="submit">register</button>
    </form>
    @if($errors->any())
    <ul>
        <li>{{ $errors->first() }}</li>
    </ul>
    @endif
</body>
</html>