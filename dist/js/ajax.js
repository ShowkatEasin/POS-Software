jQuery(document).ready(function(){


    jQuery(document).on("keyup", "#barcode", function(){

        var barcode = jQuery(this).val();
        var action = "findProduct";

        console.log(barcode);

        $.ajax({
            url: "././Classes/ajax.php",
            type : "POST",
            dataType: "JSON",
            data:{
                "action":action,
                "barcode": barcode
            },
            success : function(response){
                jQuery("#cost_price").val(response.costPrice);

            }

        })
    })

});