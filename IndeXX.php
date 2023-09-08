<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
   

<head>
  <title>KAMITI PRISON</title>
    <STYLE>
        body{
margin: 0;
padding: 0;
box-shadow: lightsteelblue;

}

.main{

	padding-top: 15px;
	padding-bottom: 15px;
	height: 70px;
   background: grey;
}

.hed{

   float: left;

}

.container{
   margin: Auto;
   width: 80%;
   overflow: hidden;

}

.nav{
   float: right;


}

.nav ul li{
   display: inline-flex;
   margin: 10px;

}
a{
   text-decoration: none;
   color: purple;

}



.bg{
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 350px;
  margin: 100px ;
  font-family: arial;
  background: grey;
  color: white;
 
  padding: 20px;
  border-radius: 10px;
  text-transform: uppercase;

}
.search{
	padding-top: 90px;
	padding-bottom: 90px;
}
.sachet{
 background: greenyellow;
}
.inp{
   font-size: 20px;
   border-radius: 5px;
   width: 350px;
}
.seach{
   font-size: 20px;
   background: red;
   color: white;
   border-radius: 5px;
}

.search{
	padding-top: 90px;
	padding-bottom: 90px;
}
.sachet{
 background: greenyellow;
}
.inp{
   font-size: 20px;
   border-radius: 5px;
   width: 350px;
}
.seach{
   font-size: 20px;
   background: red;
   color: white;
   border-radius: 5px;
}
.red{
   text-transform: uppercase;
   color:green;
   font-family: !important;

}
.high{
   color: red;
}

.gold{
   text-transform: uppercase;
   color: gold;
   font-family: !important;
}
.btns{
 color: green;
 background: black;
 border: none;
 border-radius: 10px;
}

    </STYLE>


</head>

<body> 
 <section class="main">
      <div class="container">
   <header >
      <div class="hed">
         <h2><span class="high">KAMITI</span><span class="red">PRISON <span class="gold">system</span></h2>
             
      </div>
      <nav class="nav">
         <ul>
            <li><a href="">HOME</a></li>
            <li><a href="about.html">ABOUT</a></li>
            <li><a href="contact.html">CONTACT</a></li>
            <li><a href="feedback.html">FEEDBACK</a></li>
         

         </ul>

      </nav>

   </header>
   </div>
   </section>

   <section class="sachet">

    <center>
        <form method="POST" action="ajaxsearch.php" autocomplete="off">
        <div class="search">
            <input type="text" name="search" class="inp" placeholder="Enter your Research">
            <button  class="seach" name="search">Search</button>
        </div>
        </form>
        
    </center>

</section>

    
    <?php if (isset($user)): ?>
        
       
        
        <p><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
        <p><a href="log_in.php">Log in</a> or <a href="signingup.html">sign up</a></p>
        
    <?php endif; ?>
    
</body>
</html>