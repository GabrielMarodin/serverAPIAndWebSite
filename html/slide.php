<!-- Slideshow container -->
<div class="row">
  <div class="col m12">
    <div class="slideshow-container">

    <?php

      require_once 'files/getfiles.php';

      foreach($data as $file) {
        echo '<div class="mySlides fade" id="mySlides">';
          echo '<div class="numbertext">'.$file['id'].'</div>';
          if($file['tipo'] == 'mp4' || $file['tipo'] == 'obb' || $file['tipo'] == 'webm'){
            echo '<video id="'.$file['id'].'" class="responsive-video" data-duracao="'.$file['duracao'].'" preload="metadata"  muted="muted">';
              echo '<source src="files/'.$file['path'].'" type="video/'.$file['tipo'].'">';
            echo '</video>';
          }else{
            echo '<img id="'.$file['id'].'" data-duracao="30" src="files/'.$file['path'].'">';
          }
        echo '</div>';
      }

    ?>
    </div>
  </div>
</div>

  
