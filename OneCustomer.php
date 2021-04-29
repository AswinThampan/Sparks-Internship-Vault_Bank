<?php
session_start();
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"qxp");
if(!$con){
    die("Connection failed");

}
$_SESSION['user']=$_POST['user'];
$_SESSION['sender']=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">    
<title>Vault Bank</title>
<style>
 
 .topnav {
  overflow: hidden;
  background:linear-gradient(
      rgba(0, 0, 0, 0.6),
      rgba(255, 255, 255, 0.7));
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
  color:  #ffe01a;
}

.topnav .icon {
  display: none;
}

.topnav a:hover{
  color:  #ffe01a;
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

@media screen and (max-width: 400px) {
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
  background-image:url('789.jpg');
  width:auto;
  height:100%;
  background-size:cover;

}
button {
  border: 2px solid #2b67f8;
  background-color: white;
  color:#2b67f8;
  padding:0.35em 1.2em;
  border:0.1em solid #2b67f8;
  margin:0 0.3em 0.3em 0;
  font-size: 20px;
  font-weight:300;
  cursor: pointer;
  display:inline-block;
  text-align:center;
  min-width:250px;
  border-radius: 5px;
  font-family:'Trebuchet MS',sans-serif;
}
button:hover{
color:peachpuff;
background-color:#2b67f8;
}
.hidden {
   display: none;
   background:linear-gradient(
      rgba(255, 255, 255, 0.6),
      rgba(255, 255, 255, 0.5));
      padding:10px;
}

h3{
  font-family:'Trebuchet MS',sans-serif;
  font-size:25px;
  color:yellow;
}

.user_details{
  font-size:20px;
  color:white;
  font-weight:bold;
  width:100%;  
  height:auto;
  margin-left:275%;
  text-align: left;
}

.container{
  display:inline-flex;
  width:100%;
}
.flex-direction{
  flex-direction:row;
}


.textbox{
  height: 20px;
  background-color: white);
  color:black;
  font-size: 15px;
  font-family:'Trebuchet MS',sans-serif;
  font-weight:bold;
}

@media screen and (max-width: 800px){
.flex-direction{
  flex-direction:column;
}    

.user_details{ 
  float:none; 
  top:0px;
  margin-left:20%;
  width:100%;
  }
    
button{
  display:block;
  margin:0.4em auto;
  display:flex;
  justify-content: center;
}  
	}
 
</style>

<script type='text/JavaScript'>
function toggleTable() {

  document.getElementById("myTable").classList.toggle("hidden");

}

</script>
</head>
<body>
<header> 
<div class="topnav" id="myTopnav">
<a href="home.html" >Home</a>
<a href="View.php">View Customers</a>
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
<div class="container flex-direction">
<div class="center">  
  <div class="user_details">
    <br><br><br><br>
    <h3>Customers Details</h3>
        <?php
        if (isset($_SESSION['user']))
        {
          $user=$_SESSION['user'];
          $result=mysqli_query($con,"SELECT * FROM customer WHERE Name='$user'");
          while($row=mysqli_fetch_array($result))
          {
            echo "<p><b>User ID &nbsp&nbsp&nbsp:</b> ".$row['UserID']."</p>";
            echo "<p name='sender'><b>Name &nbsp&nbsp&nbsp&nbsp</b>  :  ".$row['Name']."</p>";
            echo "<p><b>Email ID</b>&nbsp&nbsp: ".$row['Email']."</p>";
            echo "<p><b>A/C No.</b>&nbsp&nbsp&nbsp: ".$row['Acc_Number']."</p>";
            echo "<p><b>IFSC</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: ".$row['IFSC']."</p>";
            echo "<p><b class='font-weight-bold'>Balance</b>&nbsp&nbsp:<b>&nbsp&#8377;</b> ".$row['Balance']."</p>";
          }         
        }
      ?>
      <br>
      <form action="transfer.php" method="POST">
                    <h3>Make a Transaction</h3>
                    To&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
                <select name="reciever" id="dropdown" class="textbox" required>
                    <option>Select Recipient</option>
                <?php
                $db = mysqli_connect("localhost", "root", "", "qxp");
                $res = mysqli_query($db, "SELECT * FROM customer WHERE name!='$user'");
                while($row = mysqli_fetch_array($res)) {
                    echo("<option> "."  ".$row['Name']."</option>");
                }
                ?>
                </select>
                <br><br>
                    From&nbsp&nbsp&nbsp&nbsp :&nbsp&nbsp <span style="font-size:1.2em;"><input id="myinput" name="sender" class="textbox" disabled type="text" value='<?php echo "$user";?>'></input></span>
                    <br><br>
                    
                
                        <b >Amount :&#8377;</b>
                        <input name="amount" type="number" min="100" class="textbox" required >
                        <br><br>
                        <a><button id="transfer"  name="transfer" ; >Transfer</button></a>
                        </form>
  </div>
</div>       
<br>
</div>
</body>
</html>
