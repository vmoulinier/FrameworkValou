<h2 class="center mb-4"><?= $this->twig->translation('translations.title') ?></h2>

<div class="row">
    <div class="col-10">
        <input type="text" name="search" id="search" class="form-control" placeholder="<?= $this->twig->translation('translations.placeholder') ?>">
    </div>
    <div class="col-2">
        <button class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i><?= $this->twig->translation('translations.add') ?></button>
    </div>
    <div class="col-12" id="display_info"></div>
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <br />
                    <label for="name" class="bold"><?= $this->twig->translation('translations.name') ?></label>
                    <input type="text" name="add_name" id="add_name" class="form-control">
                    <br />

                    <label for="fr" class="bold"><?= $this->twig->translation('translations.fr') ?></label>
                    <textarea name="add_fr" id="add_fr" class="form-control"></textarea>
                    <br />

                    <label for="en" class="bold"><?= $this->twig->translation('translations.en') ?></label>
                    <textarea name="add_en" id="add_en" class="form-control"></textarea>
                    <br />
                    <p id="response" class="green display"><?= $this->twig->translation('translations.saved') ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $this->twig->translation('translations.close') ?></button>
                    <button type="button" class="btn btn-primary" id="add_save"><?= $this->twig->translation('translations.save') ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= PATH ?>/App/Views/js/translations.js"></script>
<script>
    $(document).ready(search());
</script>
