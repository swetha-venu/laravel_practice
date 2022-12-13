<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Document</title>
</head>
<body onload='detail()'>

    <h2>customers that have sale</h2>
    <table id='deta'border="1 px solid">
      <tr>
        <td>invoice_no</td>
        <td>customer_name</td>
        <td>email</td>
      </tr>
    </table>
    <br><br>

    <h2>customers with no sale</h3>
    <table id='ns'border="1 px solid">
        <tr>
            <td>customer_name</td>
            <td>email</td>
        </tr>
    </table>
    <br><br>

    <h2>customers with sale count</h2>
    <table id='tc'border="1 px solid">
        <tr>
            <td>name</td>
            <td>sales_count</td>
        </tr>
    </table>
    <br><br>
    
    <h2>products with sale_count</h2>
    <table id='pc'border="1 px solid">
        <tr>
            <td>product_name</td>
            <td>sales_count</td>
        </tr>
    </table>
    <br><br>

    <!-- <h2>customers that have sale</h2>
    <table id='det'border="1 px solid">
      <tr>
        <td>invoice_no</td>
        <td>name</td>
        <td>email</td>
      </tr>
    </table> -->
     <script>
        function detail(){
        //CUSTOMER WITH SALE
            $.ajax({
                url:'sales_det',
                type:'GET',
                success:function(response){
                    console.log(response.res);
                    detail="";
                    for(i in response.res){
                        detail+="<tr>";
                        detail+="<td>"+"INV-00"+response.res[i]['id']+"</td>";
                        detail+="<td>"+response.res[i]['customer_name']+"</td>";
                        detail+="<td>"+response.res[i]['email']+"</td>";
                    }
                    $('#deta').append(detail);
                }
            })
        //CUSTOMER SALES WITH COUNT   
            $.ajax({
                url:'get_count',
                type:'GET',
                success:function(response){
                //    console.log(response.dat)
                    detail="";
                    $.each(response.dat, function(index, value) {
                        // console.log('ONE');
                        // console.log(value);
                        // console.log('TWO');
                        detail+="<tr>";
                        detail+="<td>"+value.customer+"</td>";
                        detail+="<td>"+value.count+"</td>";
                    });
                    $('#tc').append(detail);
                }
            })
        //CUSTOMERS WITH NO SALE
            $.ajax({
                url:'no_sale',
                type:'GET',
                success:function(response){
                    // console.log(response.data);
                    detail="";
                    for(i in response.data){
                        detail+="<tr>";
                        detail+="<td>"+response.data[i]['customer_name']+"</td>";
                        detail+="<td>"+response.data[i]['email']+"</td>";
                    }
                    $('#ns').append(detail);
                }
            })
        //PRODUCT COUNT IN SALES
            $.ajax({
                url:'pro_count',
                type:'GET',
                success:function(response){
                    // console.log(response.res)
                    detail="";
                    $.each(response.res, function(index, value) {
                        // console.log('a');
                        // console.log(value);
                        // console.log('b');
                        detail+="<tr>";
                        detail+="<td>"+value.product+"</td>";
                        detail+="<td>"+value.count+"</td>";
                    });
                    $('#pc').append(detail);
                }
            })

            // $.ajax({
            //     url:'get_detail',
            //     type:'GET',
            //     success:function(response){
            //         console.log(response.data);
            //         detail="";
            //         for(i in response.data){
            //             console.log(response.data[i]);
            //             detail+="<tr>";
            //             detail+="<td>"+"INV-00"+response.data[i][0]['id']+"</td>";
            //             detail+="<td>"+response.data[i][0]['customer']['customer_name']+"</td>";
            //             detail+="<td>"+response.data[i][0]['customer']['email']+"</td>";
            //         }
            //         $('#det').append(detail);
            //     }
            // })
        }
     </script>
    
</body>
</html>