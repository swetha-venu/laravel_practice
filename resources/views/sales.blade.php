<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type = "text/javascript" 
         src = "https://www.tutorialspoint.com/jquery/jquery-3.6.0.js">
      </script>
    <title>Document</title>
</head>
<body onload ='details()'>
    <form action="" method="post">
        @csrf
        <label for="">enter customer</label>
        <select name="cust" id="cust">

        </select>
        <br>
        <label for="">enter product</label>
        <select name="prod" id="prod">
           
        </select>
        <br>
        <label for="">enter quantity</label>
        <input type="text" name="qty" id="">
        <br>
        <button type="submit">add invoice</button>
    </form>
    <script>
        function details(){
          $.ajax({
            url:'get_product',
            type:'GET',
            success:function(response){
                prod="";
                for(i in response.pro){
                    prod+="<option value="+response.pro[i]['id']+">"+response.pro[i]['product_name']+"</option>";
                }
                $('#prod').append(prod);
            }
          })
          $.ajax({
            url:'get_customer',
            type:'GET',
            success:function(response){
                console.log(response.cus)
                cust="";
                for(i in response.cus){
                    cust+="<option value="+response.cus[i]['id']+">"+response.cus[i]['customer_name']+"</option>";
                }
                $('#cust').append(cust);
            }
          })
        }
    </script>
</body>
</html>