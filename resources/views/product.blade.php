<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Document</title>
</head>
<body onload ='catg()'>
    <form action="" method="post">
        @csrf
        <label for="">enter product name</label>
        <input type="text" name="pname" id="">
        <br>
        <label for="">enter category</label>
       <select name="category" id="cat">
        
       </select>
       <br>
       <label for="">enter price</label>
       <input type="text" name="pprice" id="">
       <br>
       <button type="submit">add product</button>
        <br>
    </form>
    <script>
        function catg(){
            // alert('hi');
            $.ajax({
                url:'product_cat',
                type:'GET',
                success:function(response){
                    // console.log(response.cat);
                    category="";
                    for(i in response.cat){
                        category+="<option value="+response.cat[i]['id']+">"+response.cat[i]['cat_name']+"</option>";
                    }
                    $('#cat').append(category);
                }
            })

        }
    </script>
    @if(isset($msg))
    <script>
        alert('{{ $msg }}')
    </script>
    @endif
    <br>
    <table border="1 px solid">
        <tr>
            <td>id</td>
            <td>product_name</td>
            <td>product_category</td>
            <td>product_price</td>
            <td>update</td>
            <td>delete</td>
        </tr>
        @foreach($res as $i)
        <tr>
            <td>{{ $i->id }}</td>
            <td>{{ $i->product_name }}</td>
            <td>{{ $i->category->cat_name }}</td>
            <td>{{ $i->price }}</td>
            <td><a href="{{ url('upd1_prod') }}/{{ $i->id }}">update</a></td>
            <td><a href="{{ url('del_prod') }}/{{ $i->id }}">delete</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>