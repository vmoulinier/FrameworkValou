<h2 class="center mb-4">Page translate</h2>
<div class="row">
    <div class="col-12">
        <input type="text" name="search" id="search" class="form-control" placeholder="Nom">
    </div>
    <div class="col-12">
        <table class="table mt-4">
            <thead class="table-info bold">
            <tr>
                <td>Nom</td>
                <td>Fr</td>
                <td>En</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <tr id="display_info"></tr>
            </tbody>
        </table>
        <div class="modal fade" id="translateModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <br />
                        <label for="name" class="bold">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control">
                        <br />

                        <label for="fr" class="bold">Traduction Française</label>
                        <input type="text" name="fr" id="fr" class="form-control">
                        <br />

                        <label for="en" class="bold">Traduction anglaise</label>
                        <input type="text" name="en" id="en" class="form-control">
                        <br />
                        <p id="response" class="green display">Modifications enregistrées</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" id="save">Sauvegarder</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $( document ).ready(function() {
        $( document ).on( "keyup",'#search', function() {
            let search = $(this).val();
            if(search) {
                $.ajax({
                    type: 'post',
                    data: {
                        search : search
                    },
                    success: function (response) {
                        $( '#display_info' ).html(response);
                    }
                });
            } else {
                $( '#display_info' ).html(" ");
            }
        });

        $( "#translateModal" ).on('show.bs.modal', function(){
            let id = $('#translationId').data('id');
            $('#nom').val($('#nom'+id).html());
            $('#fr').val($('#fr'+id).html());
            $('#en').val($('#en'+id).html());
        });

        $('#save').click(function () {
            let id = $('#translationId').data('id');
            let nom = $('#nom').val();
            let fr = $('#fr').val();
            let en = $('#en').val();
            $.ajax({
                type: 'post',
                data: {id : id, nom : nom, fr : fr, en : en},
                success: function () {
                    $('#response').show().fadeOut(5000);
                }
            });
        })
    });
</script>