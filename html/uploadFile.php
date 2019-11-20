<div class="row teal ">
    <form action="files/upload.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <h5>Select image to upload:</h5>
            <div class="input-field col m12">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input  type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <div class="input-field col m12">
                <input class="validate" type='text' value="30" name='duration' id='duration' size='5' />
            </div>
            <div class="col m12">
                <button class="btn" type="submit" name="submit">
                    <i class="material-icons right">Upload Image</i>
                </button>
            </div>
        </div>
    </form>

    <audio id='audio'></audio>
</div>