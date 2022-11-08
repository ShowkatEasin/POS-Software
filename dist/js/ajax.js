jQuery(document).ready(function(){


    jQuery(document).on("keyup", "#barcode", function(){

        var barcode = jQuery(this).val();
        var action = "findProduct";

        if(barcode == ""){
            jQuery("#cost_price").val("");
        }
        else{
            $.ajax({
                url: "././Classes/ajax.php",
                type : "POST",
                dataType: "JSON",
                data:{
                    
                     'barcode' : barcode,
                      'action' :action
                },
                success : function(response){

                    if(response == null){

                    }
                    else{

                        jQuery("#cost_price").val(response.costPrice);
                        jQuery("#product_id").val(response.id);
        

                    }
                   
                }
            });
           }
         })



         jQuery(document).on("keyup", "#quantity", function(){
            var qnt = jQuery(this).val();
            if(qnt == ""){
                //jQuery("#total").val("");
            }
            else{
                var price = jQuery("#cost_price").val();
                var total = qnt * price;
                jQuery("#total").val(total);
            }

         });

         jQuery(".addItem").click(function(){

           var pdate =  jQuery("#pdate").val();
           var cName =  jQuery("#cname").val();
           var invoice =  jQuery("#invoice").val();
           var product_id =  jQuery("#product_id").val();
           var barcode =  jQuery("#barcode").val();
           var price  =  jQuery("#cost_price").val();
           var qnt =  jQuery("#quantity").val();
           var total =  jQuery("#total").val();
           var action = "additem";

           $.ajax({
            url: "././Classes/ajax.php",
            type: "POST",
            data :{

                 'pdate' :pdate,
                 'cName' :cName,
                 'invoice' :invoice,
                 'br_id' :br_id,
                 'product_id' :product_id,
                 'barcode'  :barcode,
                 'price' :price,
                 'qnt' :qnt,
                 'total' :total,
                 'action' :action
            },
            success : function

                 

            }
           });

    
        });
        

});