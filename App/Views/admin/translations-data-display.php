<table class="table mt-4">
    <thead class="table-info bold">
    <tr>
        <td>Name</td>
        <td>Fr</td>
        <td>En</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    <script src="<?= PATH ?>/App/Views/js/translations.js"></script>
    <?php foreach ($translations as $translation): ?>
        <tr>
            <td>
                <div id="name_<?= $translation->id ?>"><?= $translation->name; ?></div>
            </td>
            <td>
                <div id="fr_<?= $translation->id ?>"><?= $translation->fr; ?></div>
            </td>
            <td>
                <div id="en_<?= $translation->id ?>"><?= $translation->en; ?></div>
            </td>
            <td>
                <i class="fas fa-search mr-4 pointer" data-toggle="modal" data-target="#translateModal<?= $translation->id ?>"></i>
                <i class="fas fa-trash red pointer" id="delete<?= $translation->id ?>"></i>
            </td>
        </tr>
        <div class="modal fade" id="translateModal<?= $translation->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <br />
                        <label for="name" class="bold"><?= $this->twig->translation('translations.name') ?></label>
                        <input type="text" name="name" id="name<?= $translation->id ?>" class="form-control" value="<?= $translation->name; ?>">
                        <br />

                        <label for="fr" class="bold"><?= $this->twig->translation('translations.fr') ?></label>
                        <textarea name="fr" id="fr<?= $translation->id ?>" class="form-control"><?= $translation->fr; ?></textarea>
                        <br />

                        <label for="en" class="bold"><?= $this->twig->translation('translations.en') ?></label>
                        <textarea name="en" id="en<?= $translation->id ?>" class="form-control"><?= $translation->en; ?></textarea>
                        <br />
                        <p id="response<?= $translation->id ?>" class="green display"><?= $this->twig->translation('translations.saved') ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $this->twig->translation('translations.close') ?></button>
                        <button type="button" class="btn btn-primary" id="save<?= $translation->id ?>"><?= $this->twig->translation('translations.save') ?></button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            save('<?= $translation->id ?>');
        </script>
    <?php endforeach; ?>
    </tbody>
</table>
