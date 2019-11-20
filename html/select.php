<div class="collapsible">
    <div class="collapsible-header"><i class="material-icons">slideshow</i>Create slideshow</div>
    <div class="collapsible-body">
    <form action="api/saveSelect.php" method="post" id="select">
        <div class="form-select-box">  
            <?php

                require_once 'files/getfiles.php';

                foreach($data as $file) {
                    echo'<img src="files/'.$file['path'].'">';
                    echo'<input type="checkbox" name="id_media" value="'.$file['id'].'">'.$file['titulo'].'<br>';
                }
            ?>
        </div>
        <label for="group_name"><b>Nome da Apresentação</b></label>
        <input type="text" name="group_name"></input>
        <button type="submit">Play</button>
    </form>
    </div>
</div>