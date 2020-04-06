<?php
session_start();
require_once('eligible.php');
if($_SESSION['username']!="ali"){
  header('location:index.php');
}

$con1 = mysqli_connect('35.186.157.176','root','Shadegame1');
$con2 = mysqli_connect('35.186.157.176','root','Shadegame1');
mysqli_select_db($con1, 'fooditemdb');
mysqli_select_db($con2, 'food_ordering');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  
  <title>Admin</title>
</head>

<body>
  <div id="table">
    <h1>Live Orders</h1>
    <div class="table-responsive-vertical shadow-z-1">
      <table id="table" class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Order</th>
            <th>Quantity</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $s = " select * from liveorders";
            $result = mysqli_query($con1, $s);
            $n=0;
            while($row = mysqli_fetch_assoc($result)){
              $n=$n+1;
              $order_id=$row['order_id'];
              $id=$row['id'];
              $name=$row['name'];
              $qty=$row['qty'];
              $s = " select fooditem_name from fooditemttb where id=$id";
              $result1 = mysqli_query($con1, $s);
              $food=mysqli_fetch_assoc($result1)['fooditem_name'];
            ?>
          <tr>
            <td data-title="ID"><?=$order_id?></td>
            <td data-title="Customer"><?=$name?></td>
            <td data-title="Order"><?=$food?></td>
            <td data-title="Quantity"><?=$qty?></td>
            <td data-title="Status">
              <button class="btn-primary" id="order<?=$order_id?>">Completed</button>
          </td>
          </tr>
          <?php
        }
          ?>
        </tbody>
        <tfoot>
        <tr>
            <th colspan="5" id="live">Live Orders--><?=$n?></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <script>
      function remove(elem)
      {
        orderid=elem.id;
        elem.parentNode.parentNode.parentNode.removeChild(elem.parentNode.parentNode);
        var xhr= new XMLHttpRequest();
        xhr.open('GET','completeorder.php/?o='+orderid.replace("order",""));
        xhr.send(null);
        var e=document.getElementById("live");
        var txt=e.textContent;
        var elem1=parseInt(txt.replace("Live Orders-->",""));
        e.textContent="Live Orders-->"+(elem1-1);
      }
<?php
            $s = " select * from liveorders";
            $result = mysqli_query($con1, $s);
            while($row1 = mysqli_fetch_assoc($result)){
              $order_id1=$row1['order_id'];
              $name=$row1['name'];
?>
      document.getElementById('order<?=$order_id1?>').addEventListener("click",function(){remove(this)},false);
<?php
    }
?>




    var xhra= new XMLHttpRequest();
  setInterval(function(){
    elem1=document.getElementById("live").textContent.replace("Live Orders-->","");
        xhra.open('GET','completeorder.php/?num='+elem1);
        xhra.send(null);
}, 5000);
var el;

xhra.onreadystatechange=function(){
  var DONE=4;
  var OK=200;
  if(xhra.readyState===DONE){
    if(xhra.status===OK){
      lemon=xhra.responseText;
      if(lemon=='0')
      {
        location.reload();
      }
    }
  }
}
    </script>
</body>
</html>