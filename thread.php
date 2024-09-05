<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>iSmart-Coding Discuss Forum</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>


<body>
  <?php include 'partials/header.php'; ?>
  <?php include 'partials/dbconnect.php'; ?>

  <?php
      $id = $_GET['threadid'];
      $sql = " SELECT * FROM `threads` WHERE thread_id=$id";
      $result=mysqli_query($conn,$sql);
      
      while($rows=mysqli_fetch_assoc($result))
        {      
                 $title= $rows['thread_title'];
                 $desc= $rows['thread_desc'];
                 $userid=$rows['thread_user_id'];
                 $sql2 ="SELECT  `user_email` FROM `users` WHERE `S.NO.`= '$userid' ";
                 $result2 =mysqli_query($conn,$sql2);
                 $rows2 =mysqli_fetch_assoc($result2); 
                  $posted_by=$rows2['user_email'];
                 
             
        }
     ?>

    <?php
               $showalert = false;
              $method=$_SERVER['REQUEST_METHOD'];
              if($method=='POST'){
             
              $comment=$_POST['comment'];
              $user_id=$_POST['user_id'];
              $comment=str_replace("<" , "&lt" , $comment);
              $comment=str_replace(">" , "&gt" , $comment);

              $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$user_id', current_timestamp())"; 
              $result=mysqli_query($conn,$sql);
             $showalert=true; 
            }
           
          
         if($showalert){
           echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> Your comment has been added !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          }
     ?>

  <!-- box to show about category and rules -->
  <div class="container my-4 col-md-10">
    <div class="alert alert-primary" role="alert">
      <h1 class="alert-heading py-2">
        <?php  echo $title ?>
      </h1>
      <p class="lead">
        <?php  echo $desc ?>
      </p>
      <hr>
      <p class="mb-0 "> This is a peer to peer forum.
        This is a Civilized Place for Public Discussion. Improve the Discussion by " Be Agreeable, Even When You
        Disagree ". Respect other member all the time. Do not advertise on the support forums · Do not offer to pay for
        help · Do not post commercial products, offensive post, link or images.</p>

      <p>Posted by :<em> <?php echo $posted_by ; ?></em></p>
    </div>
  </div>

  <?php
      if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']=="true")){
        echo ' <div class="container my-3 col-md-10">
    <h1 class="py-2">Post a Comment</h1>

    <form action="'.$_SERVER["REQUEST_URI"] .'" method="post">

      <div class="mb-3 ">
        <label for="exampleFormControlTextarea1" class="my-1">Type Your Comment</label>
        <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
        <input type="hidden" name="user_id" value= "'.$_SESSION["user_id"].'">
      </div>

      <button type="submit" class="btn btn-success">Post Comment</button>
    </form>
  </div>
 ';
 }
else{
  echo '<div class="container my-3 col-md-10">
     <h1 class="py-2">Post a Comment</h1>
    <p class="lead">You are not logged in . Please Login to be able to post a comment.</p>
  </div>';
  }
  ?>

  <!-- Questions of that particular thread -->
  <div class="container my-4 col-md-10 mb-5" style="min-height: 500px;">
    <h1 class="py-2">Discussion</h1>

    <?php
      $id = $_GET['threadid'];
      $sql = " SELECT * FROM `comments` WHERE thread_id=$id;";
      $result=mysqli_query($conn,$sql);
      $nores=true;
      
      while( $rows = mysqli_fetch_assoc($result) )
      {         $nores=false;
                $id=$rows['comment_id'];
                $content= $rows['comment_content'];
                $time=$rows['comment_time'];
              
              $comment_user=$rows['comment_by'];

              $sql2 ="SELECT  `user_email` FROM `users` WHERE `S.NO.`= '$comment_user' ";
              $result2 =mysqli_query($conn,$sql2);

            $rows2 =mysqli_fetch_assoc($result2); 

     echo '<div class="d-flex my-2">
    <div class="flex-shrink-0 ">
      <img src="images/images.jpeg" width="55px" alt="...">
    </div>
    <div class="flex-grow-1 ms-3">
            <div class="my-0"><b>Commented by : '.$rows2["user_email"].' at ' .$time.'</b></div>     
      '.$content.'
    </div>
  </div>';
    }

    if($nores){
      echo '
      <div class="container my-2 ">
      <div class="alert alert-light" >
        <h1 class="alert-heading py-3"> No Comments Founds</h1>
        <p class="lead">
        Be the first person to comment
        </p>
        
        
      </div>
    </div>';
    }
     ?>
  </div>

  <?php
     include 'partials/footer.php';
    ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>