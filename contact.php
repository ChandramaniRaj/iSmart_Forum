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
  <?php
      include 'partials/header.php';
      
      ?>
<?php

if($_SERVER['REQUEST_METHOD']=="POST")
{
  include 'partials/dbconnect.php'; 
      $email_id=$_POST['email'];
      $name=$_POST['name'];
      $message=$_POST['message'];
      $about=$_POST['about'];
      $query="INSERT INTO `contacts` (`email_id`, `name`, `message`, `about`) VALUES ( '$email_id', '$name', '$message', '$about')";
      $result=mysqli_query($conn,$query);
      if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Success! </strong> Your message has been send!
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
       }
        
      else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Success! </strong> Your message not send!
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
       }
    }
    ?>

  <div class="container my-3" style="min-height:87dvh;  background-color: hwb(163 97% 0%);" >
    <h1 class="text-center">Contact Us</h1>

    <form action="<?php echo $_SERVER['REQUEST_URI'] ;?>" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Full name</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
     <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
      </div>
      <div>
        <label for="form-select">About yourself</label>
        <select class="form-select" aria-label="Default select example" name="about">
          <option selected>select from this</option>
          <option value="1">Student</option>
          <option value="2">Fresher</option>
          <option value="3">Experienced</option>
        </select>
      </div>
      <br>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <?php
      include 'partials/footer.php';
     ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>