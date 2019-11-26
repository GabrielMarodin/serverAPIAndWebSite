<ul class="collapsible">
        <li>
            <div class="collapsible-header">Reproduzir grupo</div>
            <div class="collapsible-body blue-grey lighten-4">
                <form action="#" method="get" id="select">
                    <div class="row">
                        <?php require_once 'files/getGroups.php'; require_once 'files/getfiles.php';
                            if ($groups) {
                                foreach($groups as $group) {
                                    echo'<div class="col m2">';
                                        if($group['tipo'] == 'mp4' || $group['tipo'] == 'obb' || $group['tipo'] == 'webm'){
                                            echo '<video class="responsive-video" preload="metadata">';
                                                echo '<source src="files/'.$group['path'].'" type="video/'.$group['tipo'].'">';
                                            echo '</video>';
                                        }else{
                                            echo'<img class="responsive-img" src="files/'.$group['path'].'">';
                                        }
                                        echo'<p><label><input type="radio" name="group_name" value="'.$group['nome'].'"><span>'.$group['nome'].'</span></label></p>';
                                    echo '</div>';
                                }
                            }else {
                                echo'<h4>Não há grupos disponíveis</h4>';
                            }
                            ?>
                    </div>
                    <button class="btn " type="submit">
                        <i class="material-icons">save</i>
                    </button>
                </form>
            </div>
        </li>
    </ul>