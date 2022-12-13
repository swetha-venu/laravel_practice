<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('upd2_cat') }}/{{ $data->id }}" method="post">
        <label for="cname">category name:</label>
        <input type="text" name="cname" id="" value="{{ $data->cat_name }}">
        <button type="submit">update</button>
    </form>
</body>
</html>