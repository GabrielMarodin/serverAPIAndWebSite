
<form action="api/saveSelect.php" method="post" id="select">
    <div class="row">
        <?php require_once 'files/getfiles.php';
            foreach($data as $file) {
                echo'<div class="col m2">';
                if($file['tipo'] == 'mp4' || $file['tipo'] == 'obb' || $file['tipo'] == 'webm'){
                    echo '<video class="responsive-video" preload="metadata">';
                        echo '<source src="files/'.$file['path'].'" type="video/'.$file['tipo'].'">';
                    echo '</video>';
                }else{
                    echo'<img class="responsive-img" src="files/'.$file['path'].'">';
                }
                    echo'<p><label><input type="checkbox" name="id_media[]" value="'.$file['id'].'"><span>'.$file['titulo'].' Segundos: '.$file['duracao'].'</span></label></p>';
                echo'</div>';
            }?>
    </div>
    <button class="btn " type="submit" name="action">
        <i class="material-icons ">Save</i>
    </button>
</form>
