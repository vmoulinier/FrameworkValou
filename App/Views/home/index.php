<h2 class="center"><?= $this->twig->translation('index.title') ?></h2>


<div class="row mt-4">
    <div class="col-4 offset-4">
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Uploader un fichier</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="foo[]" required multiple />
                    <button type="submit" class="btn btn-sm btn-block btn-outline-primary mt-4">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
