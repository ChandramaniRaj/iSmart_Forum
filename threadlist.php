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
      $id = $_GET['catid'];
      $sql = " SELECT * FROM `categories` WHERE category_id=$id";
      $result=mysqli_query($conn,$sql);
      while($rows=mysqli_fetch_assoc($result))
        {
                $desc= $rows['category_description'];
              $name= $rows['category_name'];
        }
     ?>

     <?php
               $showalert = false;
              $method=$_SERVER['REQUEST_METHOD'];
              if($method=='POST'){
              $th_title=$_POST['title'];
              $th_title=str_replace("<" , "&lt" ,$th_title);
              $th_title=str_replace(">" , "&gt" ,$th_title);

              $th_desc=$_POST['desc'];
              $th_desc=str_replace("<" , "&lt" ,$th_desc);
              $th_desc=str_replace(">" , "&gt" ,$th_desc);
              $user_id=$_POST['user_id'];
         

              $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', ' $user_id', current_timestamp())"; 
              $result=mysqli_query($conn,$sql);
             $showalert=true; 
            }
           
          
         if($showalert){
           echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> Your thread has been added ! Please wait for community to respond.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          }
        ?>

  <!-- box to show about category and rules -->
  <div class="container my-4 col-md-8">
    <div class="alert alert-success">
      <h1 class="alert-heading py-2">Welcome to
        <?php  echo $name ?> Forum
      </h1>
      <p class="lead">
        <?php  echo $desc ?>
      </p>
      <hr>
      <p class="mb-0 "> This is a peer to peer forum
        and a civilized place for Public Discussion. Improve the Discussion by " Be Agreeable, Even When You
        Disagree ". Respect other member all the time. Do not advertise on the support forums · Do not offer to pay for
        help · Do not post commercial products, offensive post, link or images.</p>

      <a class="btn btn-success btn-lg my-4" href="#" role="button">Learn more</a>
    </div>
  </div>

  <?php
      if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']=="true")){
        echo '<div class="container my-3 col-md-8">
        <h1 class="py-2">Start a Discussion</h1>
    
        <form action="'.$_SERVER["REQUEST_URI"] .'" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Problem Title</label>
            <input type="text" class="form-control" id="title" name="title" maxlength="255" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text ">Keep your title as short and crisp as possible.</div>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1">Elaborate Your Problem</label>
            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            <input type="hidden" name="user_id" value="'.$_SESSION["user_id"].'">
          </div>
    
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>';
      }
  else{
   echo '<div class="container my-3 col-md-8">
     <h1 class="py-2">Start a Discussion</h1>
    <p class="lead">You are not logged in . Please Login to be able to start a Discussion</p>
  </div>';
  }
  ?>

 
  <!-- Questions of that particular thread -->
  <div class="container  col-md-8 mb-5" style="min-height: 500px;">
    <h1 class="py-2">Browse Questions</h1>

    <?php
    $id = $_GET['catid'];
      $sql = " SELECT * FROM `threads` WHERE thread_cat_id=$id ";
      $result=mysqli_query($conn,$sql);
      $nores=true;
      while($rows=mysqli_fetch_assoc($result))
      {
          $nores=false;
                $id=$rows['thread_id'];
                $desc= $rows['thread_desc'];
                $title= $rows['thread_title'];
                $Thread_time=$rows['timestamp'];
                $thread_user_id=$rows['thread_user_id'];
           
                $sql2 ="SELECT user_email FROM `users` WHERE `S.NO.`='$thread_user_id' ";
              $result2 =mysqli_query($conn,$sql2);
            $rows2 =mysqli_fetch_assoc($result2);  

    echo '<div class="d-flex my-2">
    <div class="flex-shrink-0">
      <img src="images/images.jpeg" width="60px" alt="..." class="my-2">
    </div>
    <div class="flex-grow-1 ms-3 ">
     
       <h5 ><a class="text-dark" href="thread.php?threadid='. $id .'">'.$title.'</a></h5>               
      '.$desc.'</div><div >Asked by : <b>'.$rows2["user_email"].'</b> at <b>' .$Thread_time.'</b></div>
  </div>' ;
    }

    if($nores){
      echo '
      <div class="container my-5 ">
      <div class="alert alert-light" >
        <h1 class="alert-heading py-3"> No Threads Founds</h1>
        <p class="lead">
        Be the first person to ask a question
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