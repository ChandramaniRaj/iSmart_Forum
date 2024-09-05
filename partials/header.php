<?php
session_start();
include 'partials/dbconnect.php';
        
echo '<nav class="navbar navbar-expand-lg navbar-dark  bg-dark " >
    <div class="container-fluid">
      <a class="navbar-brand" href="/">iSmart</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Top Categories
            </a>
            <ul class="dropdown-menu">';
           
              $sql="SELECT * FROM `categories` LIMIT 5 ";
              $result=mysqli_query($conn,$sql);
              while($rows=mysqli_fetch_assoc($result)) {
              $desc= $rows["category_name"];
              $id= $rows["category_id"];
            echo '<li><a class="dropdown-item" style="color:green;" href="threadlist.php?catid='.$id.'">'.$desc.' </a></li>';
                }
              
            echo '</ul>
          </li>
          <li class="nav-item">
            <a class="nav-link "  href="contact.php">Contact Us</a>
          </li>
        </ul> 
    <div class="row"> ';
        if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']=="true"))
        {
          echo '   <form class="d-flex" role="search" action="search.php" method="get">
                      <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                      <button class="btn btn-success " type="submit">Search</button>
                      <p class="text-light my-0 mx-2 " style=" white-space: nowrap;"> Welcome '.$_SESSION['username'].'</p>
                      
                     <a href="partials/logout.php" class="btn btn-success" >Logout</a>
           
                 </form>';
        }
        else{
         
          echo  ' <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success " type="submit">Search</button>
           
              <button type="button" class="btn btn-outline-primary mx-2" data-bs-toggle="modal" data-bs-target="#signmodal">Signup</button>
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
           
          </form>';
        }  

       
      echo ' </div>
        
      </div>
    </div>
    
   
  </nav>';
  include 'partials/loginmodal.php';
  include 'partials/signmodal.php';
if(isset($_GET['signupsuccess']) && ($_GET['signupsuccess']=="true")){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success! </strong> Your can now Login.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['signupsuccess']) && ($_GET['signupsuccess']=="false")){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Warning! </strong> '.$_GET['error'].'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['loggedin']) && ($_GET['loggedin']=="true")){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success! </strong> Your can now Login.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['loggedin']) && ($_GET['loggedin']=="false")){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Warning! </strong> '.$_GET['error'].'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>