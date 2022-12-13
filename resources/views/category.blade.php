<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <label for="name">enter category name</label>
        <input type="text" name="cname" id="">
        <button type="submit">add</button>
    </form>
    @if(isset($msg))
    <script>
        alert('{{ $msg }}');
    </script>
    @endif
    @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
    <table border="1 px solid">
        <tr>
            <td>id</td>
            <td>category_name</td>
            <td>update</td>
            <td>delete</td>
        </tr>
        @foreach($data as $i)
        <tr>
            <td>{{ $i->id }}</td>
            <td>{{ $i->cat_name }}</td>
            <td><a href="{{ url('upd1_cat') }}/{{ $i->id }}">update</a></td>
            <td><a href="{{ url('del_cat') }}/{{ $i->id }}">delete</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>