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
  
  
  <div class="container my-4" style="min-height: 80vh;">
    <h1 class="mx-2 py-1">Search Results for <em>"<?php echo $_GET['query']; ?>"</em></h1>

    <?php
        $noresult=true;
      $id = $_GET['query'];
      $sql = " SELECT * FROM `threads` WHERE MATCH(`thread_title`,`thread_desc`) against ('$id ')";
      $result=mysqli_query($conn,$sql);
      
      while($rows=mysqli_fetch_assoc($result))
        {      $noresult=false;
                 $title= $rows['thread_title'];
                 $desc= $rows['thread_desc'];  
                 $thread_id= $rows['thread_id'];  
                 $url="thread.php?threadid=".$thread_id;

                 echo ' <div class="results">
                    <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
                    <p>'.$desc.'</p>
                        </div>'; 
        }

        if($noresult){
            echo '<div class="container my-2 ">
      <div class="alert alert-danger" >
        <h1 class="alert-heading py-3"> No Results Founds</h1>
        <p class="lead">Suggestions:<ul>
         <li> Make sure that all words are spelled correctly. </li>
                <li>Try different keywords.</li>
                <li>Try more general keywords.</li>
        </ul>
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