<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "password", "main");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO postsection (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM postsection");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title> Connect Infinity</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
    
                    function commentSubmit(){
                        if(form1.name.value == '' && form1.comments.value == ''){ //exit if one of the field is blank
                            alert('Enter your message !');
                            return;
                        }
                        var name = form1.name.value;
                        var comments = form1.comments.value;
                        var xmlhttp = new XMLHttpRequest(); //http request instance
                        
                        xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
                            if(xmlhttp.readyState==4&&xmlhttp.status==200){
                                document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
                            }
                        }
                        xmlhttp.open('GET', 'insert.php?name='+name+'&comments='+comments, true); //open and send http request
                        xmlhttp.send();
                    }
                    
                        $(document).ready(function(e) {
                            $.ajaxSetup({cache:false});
                            setInterval(function() {$('#comment_logs').load('logs.php');}, 2000);
                        });
                        
                </script> 
<style>
#cont{
	width:95%;
	margin:15px;
    padding-top:20px;
	
}
body{
    font-family:Verdana, Geneva, sans-serif;
}
.page_content{
	margin:15px;
	padding:5px;
	border-bottom:1px solid #CCC;
}
.comment_input{
	background:#CCC;
	margin:10px;
	padding:10px;
	border:1px solid #CCC;
    outline:none;
}

.button{
	padding:5px 15px 5px 15px;
    background:#0d8aba;
    color: #FFF;
	border-radius: 3px;
}

.button:hover{
	background:#4D9494;
}

a{
	text-decoration:none;
}

/* .comment_logs{
	 margin:5px;
	padding:5px;
	border:1px solid #CCC; 
} */
.top-border{
    background:#0d8aba;
    width:100%;
    height:2.5vh;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    margin-top:20px;
}
.comments_content{
	margin:5px;
	padding:5px;
	/* border:1px solid #CCC; */
	/* -webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px; */
}

h1{
	font-size:14px;
	font-family:Verdana, Geneva, sans-serif;
	color:#4040E6;
	/* padding-bottom:0px;
	margin-bottom:0px; */
}
h2{
	font-size:10px;
	font-family:Verdana, Geneva, sans-serif;
	color:#CECED6;
}
h3{
	font-size:12px;
	font-family:Verdana, Geneva, sans-serif;
	color:#75A3A3;
	/* padding-bottom:5px;
	margin-bottom:5px */
}
h4{
	font-size:14px;
	font-family:Verdana, Geneva, sans-serif;
	color:#CECED6;
	text-decoration:none;
	float:right;
} 
body{
    background-color: #f3f2ef; 
    /* overflow-x:hidden; */
} 
.news-block{
    /* position:relative;  */
    left:70%;
    /* position: absolute; */
    /*left: 600px;
    bottom: 2200px; */
    margin-left: 20px;
    margin-top:22px;
    display: flex;
    flex-direction: column;
    padding:12px;  
    width:25%;
}  
.news{
    border-radius: 10px;
    border:1px solid gray;
    /* padding:30px 10px; */
    margin-bottom:10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background:url("images/news.jpg");
    background-repeat:none;
    height:100px;
    /* padding:40px 30px; */
}

#content{
   	width: 100%;
   	margin: 20px 30px; 
   	/*border: 1px solid #cbcbcb; */
   }  
   form{
   	/* width: 100%; */
   	margin: 20px auto;
    /* position: relative; 
    left: 500px;
    top: 25px; */
   }
   form div{
   	margin-top: 5px;
   }
   #contentpara{
       margin:20px;
       padding-top:30px;
   }
   #img_div{
   	width: 100%;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	/* padding-left: 25px; */
   	width: 90%;
   	height: 70%;
       /* margin-bottom:20px; */
   } 
   .news-block{
      /* left:600px;
      bottom:2260px;
   }
}

</style>
</head>
<body>
    <!-- navigation bar -->
    <div class="container">
        
        <div class="in-container">
            <div class="search">
                <h2 class="header1" style="padding:10px;font-size:1.5rem;color:#505050;">Connect</h3>
                <img src="images/icon.png">
                <h2 class="header1" style="padding:10px;font-size:1.5rem; color:#505050;">Infinity</h3>
                <!-- <input type="text" placeholder="search..." style="color: black;"> -->
            </div>
        </div>
        <div class="right-header"> 
            <div class="option">
                <ul>
                <a href="#Home" style="font-family:Verdana, Geneva, sans-serif;">HOME</a>
                <a href="Projects.html" style="font-family:Verdana, Geneva, sans-serif;">PROJECT IDEAS</a>
                <a href="Group_chat.php" style="font-family:Verdana, Geneva, sans-serif;">QUERIES</a>
                </ul>
           </div>
        </div> 
   </div>
   <!--navbar ends-->
   
   <!-- home -->
    <section id="Home" class="home"> 
        <div class="main-body"> 
            <div class="profile">
            <div class="card">
                <div class="about">
                    <img  class="img" src="images/profile.jpg"> 
                </div>
                <h5 class="name">NAME</h4>
                <p style="margin-top:25px;">Tech enthusiastic student</p>
                <p style="margin-top:10px;margin-bottom: 25px;">Logged in to acquire industrial skills</p>
            </div>
            <div style="margin:20px;">
                <button class="msg">Message</button>
                <button class="follow">Following</button> 
            </div>
        </div>
        <!-- middle posts -->
        <div class="posts">
            <div class="top-border"></div>
            <div class="top-post">
                <div class="inner-posts" >
                <div id="content" >
                    <form method="POST" action="index.php" enctype="multipart/form-data">
                        <div>
                        <textarea 
                            id="text" 
                            cols="40" 
                            rows="4" 
                            name="image_text" 
                            placeholder="Short Description..." style="width:88%"; style="font-family:Verdana, Geneva, sans-serif;"></textarea>
                        </div>
                        <div >
                            <button type="submit" name="upload">POST</button>
                        </div>
                        <input type="hidden" name="size" value="1000000">
                        <div>
                        <input type="file" name="image">
                        </div>
                    </form>
                </div>
            </div>
        </div>
                    
        <!-- <div class="main-post" style="border-radius: 10px;">  -->
            <!-- <div class="card">  -->
                <div  style="margin-top:15px; ">  
                    <?php
                    {
                    while ($row = mysqli_fetch_array($result)) 
                    {
                        echo "<div id='img_div'>";
                        echo "<div style='background:white;margin-bottom:20px;border-radius: 10px;'>";
                        echo "<p id='contentpara'>".$row['image_text']."</p>";
                        echo "<img src='images/".$row['image']."'  style='padding-left:25px;padding-bottom:20px'>";
                        echo "</div>";
                    }
                    {
                        echo "<div id='img_div'>";
                        echo "<div style='background:white;margin-bottom:20px;border-radius: 10px;'>";
                        echo "<div id='cont' ' >";
    echo "<div class='comment_input'>
    <form name='form1'>
        	<input type='text' name='name' placeholder='Name...'/></br></br>
            <textarea name='comments' placeholder='Leave Comments Here...' style='width:100%; height:100px;'></textarea></br></br>
            <a href='#' onClick='commentSubmit()' class='button'>Post</a></br>
        </form>
    </div>
    <div id='comment_logs'>
    	Loading comments...
    </div> ";
                        
                        echo "</div>";
                        echo "</div>" ;  
                        }
                    }
                    ?> 
        </div> 
        </div>
    </div>
</div>
</div>
    </div>
    <div class="news-block" style="position:relative;margin-left:25px";>  
        <form class="news" action="" src="">
            <input class="news-input" type="text" placeholder="Get Updates"/>
            <input type="submit" value="Get" style="padding:2px 6px;margin-top:10px;color:crimson;font-weight:700;font-size: 1.2em;">
        </form>
        <div class="news-container">
            <ul class="list"></ul>
        </div>
    </div>
</div>
    </section>
    <script src="connect.js"></script>
</body>
</html>
