
<ul class="collapsible">
    <li>
        <div class="collapsible-header">Create slideshow</div>
        <div class="collapsible-body blue-grey lighten-4">
            <form action="api/deleteSelect.php" method="post" id="select">
                <div class="row">
                    <h4>Selecione arquivos para deletar:</h4>
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
                <div class="row">
                    <h4>Ou selecione Grupos para deletar:</h4>
                        <?php require_once 'files/getGroups.php';
                            foreach($groups as $group) {
                                echo'<div class="col m2">';
                                    echo'<p><label><input type="checkbox" name="id_media[]" value="'.$file['id'].'"><span>'.$file['titulo'].' Segundos: '.$file['duracao'].'</span></label></p>';
                                echo'</div>';
                            }?>
                </div>
                <button class="btn " type="submit" name="action">
                    <i class="material-icons">save</i>
                </button>
            </form>
        </div>
    </li>
</ul>
