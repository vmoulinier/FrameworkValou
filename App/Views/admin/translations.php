<h2 class="center mb-4">Page translate</h2>

<div class="row">
    <div class="col-12">
        <input type="text" name="search" id="search" class="form-control" placeholder="Find translation">
    </div>

    <div class="col-12" id="display_info"></div>
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
    });
</script>