<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Document</title>
</head>
<body>
<form action="{{ url('upd2_prod') }}/{{ $pro->id }}" method="post">
    @csrf
        <label for="pname">pname:</label>
        <input type="text" name="pname" id="" value="{{ $pro->product_name }}"><br>
        <label for="pcat">category:</label>
        <select name="pcat" id="cat">
            <option value="{{ $pro->fk_cat_id }}">{{ $pro->category->cat_name }}</option>
        </select>
        <label for="pprice">price:</label>
        <input type="text" name="pprice" id="" value="{{ $pro->price }}"><br>
        <button type="submit">update</button>
    </form>
</body>
</html>