<!-- Slideshow container -->
<div class="row">
  <div class="col m12">
    <div class="slideshow-container">

    <?php

      require_once 'files/getfiles.php';

      foreach($data as $file) {
        echo '<div class="mySlides fade">';
          echo '<div class="numbertext">'.$file['id'].'</div>';
          if($file['tipo'] == 'mp4'){
            echo '<video autoplay="autoplay" preload="metadata">';
              echo '<source src="files/'.$file['path'].'" type="video/mp4">';
            echo '</video>';
          }else{
            echo '<img src="files/'.$file['path'].'" style="width:100%">';
          }
        echo '</div>';
      }

    ?>
    </div>
  </div>
</div>

  
