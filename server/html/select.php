<?php

require_once 'files/getfiles.php';

foreach($data as $file) {
  echo '<div class="select">';
    echo '<div class="numbertext">'.$file['id'].'</div>';
    if($file['tipo'] == 'mp4' || 'obb' || 'webm'){
      echo '<video preload="metadata">';
       echo '<source src="files/'.$file['path'].'" type="video/mp4">';
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