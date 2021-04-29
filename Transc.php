<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SPX NetBanking-View All Transactions</title>
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
  background-image:url('158.jpg');
  background-size:cover;
  background-position: 0px 0px ;

}
header{
  padding:10px 10px;
  color:purple;
  font-family:'Trebuchet MS',sans-serif;
  font-size:25px;
  text-decoration: none;
}
header a{
  text-decoration: none;
}
.tablediv{
  float: center;
  padding: 8px;
  margin:5px;
  width:70%; 
 margin-left:15%; 
margin-right:15%;
overflow-x:auto;
}
table{
  
  font-family:'Trebuchet MS',sans-serif;
  font-weight:bold;
  padding:5px;
  margin:1px;
  background:linear-gradient(
      rgba(50, 50, 50, 0.1),
      rgba(250, 250, 250, 0.5));
  width: 100%;  
  border:1px solid white;
  border-collapse: collapse;
}
th{
  padding: 10px 10px;
  text-align: left;
  font-weight: 500;
  font-size: 20px;
  color: red;
  text-transform: uppercase;
}
td{
  padding: 8px;
  text-align: left;
  vertical-align:middle;
  font-weight: bold;
  font-size: 18px;
  color: black;
  border-bottom: solid black;
}
@media screen and (max-width: 800px){
    
  body{
  background-size:cover;
  background-position: right;

}
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
</head>
<body>
<header> 
<div class="topnav" id="myTopnav">
<a href="home.html" >Home</a>
<a href="view.php" >View Customers</a>
<a href="Transc.php" class="active">View Transactions</a>
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

<div class="tablediv"> 
<br><br>
<table>
<tr>
<th>Sender Name</th>
<th>Sender A/c No.</th>
<th>Recipient Name</th>
<th>Recipient A/c No.</th>
<th>Amount</th>
<th>Date & Time</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "qxp");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM transfer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<form method ='post' action = 'OneCustomer.php'>";
    echo "<td>" . $row["s_name"]. "</td><td>" . $row["s_acc_no"] . "</td><td>" . $row["r_name"]. "</td><td>" . $row["r_acc_no"] . "</td><td>" . $row["amount"] . "</td><td>" . $row["date_time"] . "</td>";
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

