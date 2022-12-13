<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <label for="">enter name</label>
        <input type="text" name="cname" id="">
        <br>
        <label for="">enter dob</label>
        <input type="date" name="dob" id="">
        <br>
        <label for="">enter email</label>
        <input type="email" name="email" id="">
        <br>
        <button type="submit">add customer</button>
    </form>
    @if(isset($msg))
    <script>
        alert('{{ $msg }}');
    </script>
    @endif
    <br><br>
    <table border="1 px solid">
        <tr>
            <td>id</td>
            <td>cname</td>
            <td>cdob</td>
            <td>cemail</td>
            <td>update</td>
            <td>delete</td>
        </tr>
        @foreach($cus as $i)
        <tr>
            <td>{{ $i->id }}</td>
            <td>{{ $i->customer_name }}</td>
            <td>{{ $i->dob }}</td>
            <td>{{ $i->email }}</td>
            <td><a href="{{ url('upd1_cust') }}/{{ $i->id }}">update</a></td>
            <td><a href="{{ url('del_cust') }}/{{ $i->id }}">delete</a></td>
        </tr>
        @endforeach
    </table>
   
</body>
</html>