function save (id) {
    $('#save'+id).click(function () {
        let nom = $('#nom'+id).val();
        let fr = $('#fr'+id).val();
        let en = $('#en'+id).val();
        $.ajax({
            type: 'post',
            data: {id : id, nom : nom, fr : fr, en : en},
            success: function () {
                $('#response'+id).show().fadeOut(5000);
            }
        });
    });
    $('#translateModal'+id).on('hidden.bs.modal', function () {
        $('#search').keyup();
    });
    $('#delete'+id).click(function(){
        if (confirm('Supprimer cette traduction ?')) {
            $.ajax({
                type: 'post',
                data: {id_delete : id},
                success: function () {
                    $('#search').keyup();
                },
            });
        }
    });
}

function search() {
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
    $('#add_save').click(function () {
        let nom = $('#add_nom');
        let fr = $('#add_fr');
        let en = $('#add_en');

        $.ajax({
            type: 'post',
            data: {
                nom : nom.val(), fr : fr.val(), en : en.val(), add : true
            },
            success: function () {
                $('#response').show().fadeOut(5000);
                nom.val('');
                fr.val('');
                en.val('');
            }
        });
    });
}
