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
      include 'partials/dbconnect.php';
    ?>
  <!-- slider starts -->
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/slider1.jpg" height="450px" class="d-block w-100"
          alt="slider1" />
      </div>
      <div class="carousel-item">
        <img src="images/slider2.jpg" height="450px" class="d-block w-100"
          alt="slider2" />
      </div>
      <div class="carousel-item">
        <img src="images/slider3.jpg" height="450px"  class="d-block w-100"
          alt="slider3" />
      </div>
      <div class="carousel-item">
        <img src="images/slider4.jpg" height="450px"  class="d-block w-100"
          alt="slider4" />
      </div>
      <div class="carousel-item">
        <img src="images/slider5.jpg" height="450px" class="d-block w-100"
          alt="slider5" />
      </div>
      <div class="carousel-item">
        <img src="images/slider6.jpg" height="450px" class="d-block w-100"
          alt="slider6" />
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- category container  starts-->
  <div class="container my-3" style="min-height: 500px;">
    <h2 class="text-center my-4">iSmart-Browse Categories</h2>
    <div class="row mx-5">

       <?php
              $sql="SELECT * FROM `categories`";
              $result=mysqli_query($conn,$sql);
              while($rows=mysqli_fetch_assoc($result))
            {
              $desc= $rows['category_description'];
              $id= $rows['category_id'];
              echo '      <div class="col-md-4">
                        <div class="card my-3" style="width: 20rem">
                          <img
                            src="images/card-'.$id.'.jpg" class="card-img-top" height="255px" alt="..."
                          />
                          <div class="card-body">
                             <h5 class="card-title"><a href="threadlist.php?catid='.$id.'">'.$rows['category_name'].'</a></h5>
                             <p class="card-text">'.substr($desc,0,104).'....</p>
                            <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
                          </div>
                        </div>
                      </div>';
              
              
             }
         ?>
    </div>
  </div>

  <?php
     include 'partials/footer.php';
    ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>