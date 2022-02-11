# Discussion forum
<?php
if (isset($_POST['submit'])){
$link = mysqli_connect("localhost",
            "root", "password", "chat_app");
  
if($link === false){
    die("ERROR: Could not connect. "
          . mysqli_connect_error());
}
  
$un= mysqli_real_escape_string(
      $link, $_REQUEST['uname']);
$m = mysqli_real_escape_string(
      $link, $_REQUEST['msg']);
// $ts=date('h:ia');
  
// Attempt insert query execution
$sql = "INSERT INTO chats (uname, msg)
        VALUES ('$un', '$m')";
if($link->query($sql)==true){
  ;
} else{
    echo "ERROR: Message not sent!!!";
}
// Close connection
mysqli_close($link);
}
?>
 
<html>
    <title>Queries</title>
<head>
<style>
*{
    box-sizing:border-box;
}
body{
    background-color:;
    font-family:Arial;
    overflow:hidden;
}
main header{
     height:60px;
    padding:30px 20px 30px 40px;
    /* background-color:#622569;*/
}
main header > *{
    display:inline-block;
    vertical-align:top;
}
main header img:first-child{
    width:24px;
    margin-top:3px;
}  
main header img:last-child{
    width:24px;
    margin-top:3px;
}
main header div{
    margin-left:500px;
    /* margin-right:50px; */
}
main header h2{
    font-size:24px;
    margin-top:3px; 
    /* text-align:center; */
    color:rgba(0,0,0,0.8);  
}
main .inner_div{
    padding-left:0;
    margin:0;
    list-style-type:none;
    position:relative;
    overflow:auto;
    height:500px;
    background-color:lightgrey;
    background-position:center;
    background-repeat:no-repeat;
    background-size:cover;
    position: relative;
    border-top:2px solid #fff;
    border-bottom:2px solid #fff;
     
}
main .triangle{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 8px 8px 8px;
    border-color: transparent transparent rgb(0,127,255) transparent;
    margin-left:20px;
    clear:both;
}
main .message{
    padding:10px;
    color:#000;
    margin-left:15px;
    background-color:rgb(0,127,255);
    line-height:20px;
    height:fit-content;
    max-width:90%;
    display:inline-block;
    text-align:left;
    border-radius:5px;
    clear:both;
}
main .triangle1{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 8px 8px 8px;
    border-color: transparent
      transparent rgba(0,0,0,0.3) transparent;
    margin-right:20px;
    float:right;
    clear:both;
}
main .message1{
    padding:10px;
    color:#000;
    margin-right:15px;
    background-color:rgba(0,0,0,0.3);   
    line-height:20px;
    max-width:90%;
    display:inline-block;
    text-align:left;
    border-radius:5px;
    float:right;
    clear:both;
}
 
main footer{
    height:150px;
    padding:20px 30px 10px 20px;
    /* background-color:; */
}
main footer .input1{
    resize:none;
    border:1px solid grey;
    display:block;
    width:120%;
    height:55px;
    border-radius:3px;
    padding:20px;
    font-size:13px;
    margin-bottom:13px;
    outline:none;
}
main footer textarea{
    resize:none;
    border:100%;
    display:block;
    width:210%;
    height:55px;
    border-radius:3px;
    padding:20px;
    font-size:13px;
    margin-bottom:13px;
    margin-left:20px;
    outline:none;
}
main footer .input2{
    resize:none;
    border:none;
    display:block;
    width:20%;
    height:55px;
    border-radius:3px;
    padding:10px;
    font-size:13px;
    margin-bottom:13px;
    margin-left:500px;
    color:white;
    text-align:center;
    background-color:rgb(0,127,255);
    /* border: 1px solid white;  */
    outline:none; 
}

main footer textarea::placeholder{
    /* color:#ddd; */
}
 
</style>
<body onload="show_func()">
<!-- navigation bar -->
<head>
    <link rel="stylesheet" href="style.css">
</head>
<div class="container">
        <div class="in-container">
            <div class="search">
                <h3 class="header1" style="padding:10px;font-size:1.5rem; color:#505050;">Connect</h3>
                <img src="images/icon.png">
                <h2 class="header1" style="padding:10px;font-size:1.5rem; color:#505050;">Infinity</h3>
                <!-- <input type="text" placeholder="search..." style="color: black;"> -->
            </div>
        </div>
        <div class="right-header"> 
            <div class="option">
                <ul>
                <a href="index.php" style="font-family:Verdana, Geneva, sans-serif;">HOME</a>
                <a href="Projects.html" style="font-family:Verdana, Geneva, sans-serif;">PROJECT IDEAS</a>
                <a href="Group_chat.php" style="font-family:Verdana, Geneva, sans-serif;">QUERIES</a>
                <!-- <a href="Alumni.html">ALUMNI</a> -->
                </ul>
           </div>
        </div>
   </div>
   <!--navbar ends-->
   
<div id="container">
    <main>
        <header>
            <div>
                <!-- <h2>Drop your Queries</h2> -->
            </div>
        </header>
 
<script>
function show_func(){
 
 var element = document.getElementById("chathist");
    element.scrollTop = element.scrollHeight;
  
 }
 </script>
  
<form id="myform" action="Group_chat.php" method="POST" >
<div class="inner_div" id="chathist">
<?php
$host = "localhost";
$user = "root";
$pass = "password";
$db_name = "chat_app";
$con = new mysqli($host, $user, $pass, $db_name);
 
$query = "SELECT * FROM chats";
 $run = $con->query($query);
 $i=0;
  
 while($row = $run->fetch_array()) :
 if($i==0){
 $i=5;
 $first=$row;
 ?>
 <div id="triangle1" class="triangle1"></div>
 <div id="message1" class="message1">
 <span style="color:white;float:right;">
 <?php echo $row['msg']; ?></span> <br/>
 <div>
   <span style="color:black;float:left;
   font-size:10px;clear:both;">
    <?php echo $row['uname']; ?>,
        <!--  -->
   </span>
</div>
</div>
<br/><br/>
 <?php
 }
else
{
if($row['uname']!=$first['uname'])
{
?>
 <div id="triangle" class="triangle"></div>
 <div id="message" class="message">
 <span style="color:white;float:left;">
   <?php echo $row['msg']; ?>
 </span> <br/>
 <div>
  <span style="color:black;float:right;
          font-size:10px;clear:both;">
  <?php echo $row['uname']; ?>,
        <!--  -->
 </span>
</div>
</div>
<br/><br/>
<?php
}
else
{
?>
 <div id="triangle1" class="triangle1"></div>
 <div id="message1" class="message1">
 <span style="color:white;float:right;">
  <?php echo $row['msg']; ?>
 </span> <br/>
 <div>
 <span style="color:black;float:left;
         font-size:10px;clear:both;">
 <?php echo $row['uname']; ?>,
      
 </span>
</div>
</div>
<br/><br/>
<?php
}
}
endwhile;
?>
</div>
    <footer>
        <table>
        <tr>
           <th>
            <input  class="input1" type="text"
                    id="uname" name="uname"
                    placeholder="From">
           </th>
           <th>
            <textarea id="msg" name="msg"
                rows='3' cols='50'
                placeholder="Type your message">
            </textarea></th>
           <th>
            <input class="input2" type="submit"
            id="submit" name="submit" value="send">
           </th>               
        </tr>
        </table>               
    </footer>
</form>
</main>   
</div>
 
</body>
</html>
