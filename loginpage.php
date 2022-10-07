<!DOCTYPE html>
<html>
<head>
<title>Login page</title>
</head>
<body>
<form action="loginpage.php" method="get">
<h1>Create a new account</h1>
<h2>Username:</h2>
<input type="text" name="username"/>
<h2>Password:</h2>
<input type="text" name="password"/>
<br></br>
<input type="submit" name="Createaccount"/>
<br></br>		
<h1>Login</h1>
<h2>Username:</h2>
<input type="text" name="usernamelogin"/>
<h2>Password:</h2>
<input type="text" name="passwordlogin"/>
<br></br>
<input type="submit" name="loginbutton"/> 
</form>
</body>
<?php
$conn = mysqli_connect("localhost","root","","login");
if(isset($_GET["Createaccount"])){
if(isset($_GET["username"])&&isset($_GET["password"])){
$Name=$_GET["username"];
$Password =$_GET["password"];
$sqlcheck="SELECT * FROM `login` WHERE Username='$Name'";
$runbefore = mysqli_query($conn,$sqlcheck);
if($Name==mysqli_num_rows($runbefore)>0){
echo"The username has been taken";     
}else{
$sql = "INSERT INTO `login`(`Username`, `Password`) VALUES ('$Name','$Password')";
$run = mysqli_query($conn,$sql)or die(mysqli_error());
}
}
}

if(isset($_GET["loginbutton"])){
if(isset($_GET["usernamelogin"])&&isset($_GET["passwordlogin"])){
$LName=$_GET["usernamelogin"];
$LPassword =$_GET["passwordlogin"];
$sqlchecks="SELECT * FROM `login` WHERE Username='$LName' AND Password='$LPassword'";
$results = mysqli_query($conn,$sqlchecks);
if(mysqli_num_rows($results)==1){
$Column = mysqli_fetch_assoc($results);
if($LName==$Column["Username"]&&$LPassword==$Column["Password"]){
header('Location: https://nomics3000.wixsite.com/notchmodsofficial');
}else{
echo "Wrong username and password";
}
}else{
echo "Wrong username and password";
}
}
}
?> 
</html>