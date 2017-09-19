<script>
    $(document).ready(function(){
            $( function() {
                $( "#searchProduct" ).autocomplete({            //name of search bar
                    source: "{!!URL::to('search-product')!!}"  //should be the function not route 
                });
            });

    });
</script>