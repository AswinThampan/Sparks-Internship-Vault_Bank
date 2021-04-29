<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.topnav {
  overflow: hidden;
  background:linear-gradient(
    rgba(0, 0, 0, 0.3),
      rgba(0, 0, 0, 0));
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 90px;
  text-decoration: none;
  font-size: 20px;
  font-weight:bold;
}

a.active {
  color:  #2b67f8;
}

.topnav .icon {
  display: none;
}

.topnav a:hover{
  color:  #f78b8b;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {
    display: none;
  }

  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}    
body{
  background-image:url('16582.jpg');
  width:auto;
  height:100%;
  background-size:cover;
}

button {
  display: inline-block;
  border-radius: 4px;
  background-color:yellow;
  border: none;
  color: black;
  text-align: center;
  font-size: 15px;
  font-family:'Trebuchet MS';
  padding: 10px;
  width: 90%;
  margin: 5px;
}

.tablediv{
  float: center;
  padding: 8px;
  margin:5px;
  width:70%; 
  margin-left:15%; 
  margin-right:15%;
  border:2px solid white;
}
table{
  
  font-family:'Trebuchet MS',sans-serif;
  font-weight:bold;
  padding:5px;
  margin:2px;
  background: rgba(75, 75, 75, 0.7);
  width: 100%;  
  border:1px solid black;
}
th{
  padding: 10px 10px;
  text-align: center;
  font-weight: 500;
  font-size: 20px;
  color: yellow;
  text-transform: uppercase;
}
td{
  padding: 8px;
  text-align: center;
  vertical-align:middle;
  font-weight: bold;
  font-size: 18px;
  color: white;
}
@media screen and (max-width: 800px){
    div.tablediv{
        width:100%; 
        margin-left:0%; 
        margin-right:0%;
        padding:0px;
        margin:0px;
        }
     table{
         padding:0px;
         margin:0px;
     } 
}
</style>  
<title>Vault Bank</title>
</head>
<body>

<div class="topnav" id="myTopnav">
<a href="home.html" >Home</a>
<a href="view.php" class="active">View Customers</a>
<a href="Transc.php">View Transactions</a>
</div>    
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<br><br><br><br><br><br><br><br><br>
<div class="tablediv"> 
<table>
<tr>
<th>Name</th>
<th>Account Number</th>
<th></th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "qxp");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name, acc_number FROM customer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<form method ='post' action = 'OneCustomer.php'>";
    echo "<td>" . $row["name"]. "</td><td>" . $row["acc_number"] . "</td>";
    echo "<td ><a href='OneCustomer.php'><button type='submit'' name='user'  id='users1' value= '{$row['name']}' ><span>Expand</span></button></a></td>";
    echo "</tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>

</table>
</div>
</body>
</html>
