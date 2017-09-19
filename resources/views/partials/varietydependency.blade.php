<script type="text/javascript">
    $(document).ready(function(){      
        $(document).on('change','#productName',function(){
            //console.log('the select changed');
            
            var productid = $(this).val(); //getting id
            //console.log('eto ung value = '+ productid);
            var div=$(this).parent().parent(); //div outside of select(variety) and select(productName)
            var innerdiv=div.find('#divvariety');
            var option = " ";
            $.ajax({
                    type:'get',
                    url:"{!!URL::to('productVariety')!!}",//goes to {route(/productVariety)}
                    data:{'id':productid},
                    success:function(data){
                        //console.log(data);
                        option += '<option disabled="true" selected="true">--Select Variety--</option>';
                        for(var x = 0; x < data.length; x++){
                            option += '<option value='+data[x].variety+'>'+ data[x].variety +'</option>';
                        }

                        innerdiv.find('#variety').html(" ");//to empty the field
                        innerdiv.find('#variety').append(option);

                        //console.log(div);                             
                    },
                    error:function(){               
                    }
            });
        });

    });
</script>