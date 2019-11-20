<div class="row">
  <div class="col m12">
    <div class="slideshow-container">

      <?php

        require_once 'api/getSelect.php';

        foreach($data as $file) {
          echo '<div class="mySlides fade">';
            echo '<div class="numbertext">'.$file['id'].'</div>';
            if($file['tipo'] == 'mp4' || 'ogg' || 'webm'){
              echo '<video autoplay="autoplay" preload="metadata">';
              echo '<source src="files/'.$file['path'].'" type="video/'.file['tipo'].'">';
              echo '</video>';
            }else{
              echo '<img src="files/'.$file['path'].'" style="width:100%">';
            }
          echo '</div>';
          echo '<div style="text-align:center">';
            echo '<span class="dot" onclick="currentSlide('.$file['id'].')"></span>';
          echo '</div>';
        }

      ?>
    </div>
  </div>
</div>

