<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="{{ url('upd2_cust') }}/{{ $data->id }}" method="post">
        @csrf
        <label for="cname">name:</label>
       <input type="text" name="cname" id="" value="{{ $data->customer_name }}"><br>
       <label for="cdob">dob:</label>
       <input type="text" name="cdob" id="" value="{{ $data->dob }}"><br>
       <label for="cemail">email:</label>
       <input type="text" name="cemail" id="" value="{{ $data->email }}"><br>
       <button type="submit">update</button>
    </form>
    <br><br>
    
</body>
</html>