<!-- Slideshow container -->
<div class="row">
  <div class="col m12">
    <div class="slideshow-container">

    <?php

      require_once 'files/getfiles.php';

      foreach($data as $file) {
        echo '<div class="mySlides fade">';
          echo '<div class="numbertext">'.$file['id'].'</div>';
          if($file['tipo'] == 'mp4' || $file['tipo'] == 'obb' || $file['tipo'] == 'webm'){
            echo '<video class="responsive-video" autoplay="autoplay" preload="metadata">';
              echo '<source src="files/'.$file['path'].'" type="video/'.$file['tipo'].'">';
            echo '</video>';
          }else{
            echo '<img src="files/'.$file['path'].'">';
          }
        echo '</div>';
      }

    ?>
    </div>
  </div>
</div>

  
