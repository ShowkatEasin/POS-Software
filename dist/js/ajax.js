jQuery(document).ready(function(){


	jQuery(document).on("keyup", "#barcode", function(){
		var barcode = jQuery(this).val();
		var action = "findProduct";
		if (barcode == "") {
			jQuery("#cost_price").val("");
		}
		else{
			$.ajax({
			url:"././Classes/ajax.php",
			type:"POST",
			dataType:"JSON",
			data:{
				"action":action,
				"barcode":barcode
			},
            success:function(response){
				jQuery("#cost_price").val(response.costPrice);
				jQuery("#product_id").val(response.id);
				findStock(response.id);
			}
		});
		}
	});

	function showItem(){
		var invoice = jQuery("#invoice").val();
		var action = "showItem";
		$.ajax({
			url:"././Classes/ajax.php",
			type:"POST",
			data:{
				"action" :action,
				"invoice" :invoice
			},
			success:function(response){
				jQuery(".tdata").html(response);
			}
		});
	}
	jQuery(document).on("click",".test", function(){
		cal();
	})
	function calQnt(){
		var invoice = jQuery("#invoice").val();
		var action = "calQnt";
		$.ajax({
			url:"././Classes/ajax.php",
			type:"POST",
			data:{
				"action" :action,
				"invoice" :invoice
			},
			success:function(response){
				jQuery("#totalQnt").val(response);
			}
		});
	}
	function calPrice(){
		var invoice = jQuery("#invoice").val();
		var action = "calPrice";
		$.ajax({
			url:"././Classes/ajax.php",
			type:"POST",
			data:{
				"action" :action,
				"invoice" :invoice
			},
			success:function(response){
				jQuery("#totalAmount").val(response);
			}
		});
	}

	function findStock(product_id){
		$.ajax({
			url:"././Classes/ajax.php",
			type:"POST",
			dataType:"JSON",
			data:{
				"action":"findStock",
				"product_id":product_id
			},
			success:function(response){
				 jQuery("#stock").val(response.qnt);
			}
		});
	}
	jQuery(document).on("keyup", "#quantity", function(){
		var qnt = jQuery(this).val();
		if (qnt == "") {
			
		}
		else{
			var price =jQuery("#cost_price").val();
			var total = qnt * price;
			jQuery("#total").val(total);
		}
	});

	jQuery(".addItem").click(function(){

		var pdate = jQuery("#pdate").val();
		var cName = jQuery("#cname").val();
		var invoice = jQuery("#invoice").val();
		var product_id = jQuery("#product_id").val();
		var barcode = jQuery("#barcode").val();
		var price = jQuery("#cost_price").val();
		var qnt = jQuery("#quantity").val();
		var total = jQuery("#total").val();

		$.ajax({
			url:"././Classes/ajax.php",
			type:"POST",
			data:{
				'pdate':pdate,
				'cName':cName,
				'invoice':invoice,
				'product_id':product_id,
				'barcode':barcode,
				'price':price,
				'qnt':qnt,
				'total':total,
				'action':"addItem"
			},
			success:function(response){
				if(response=="200"){
					showItem();
					calQnt();
					calPrice();
					alert("Item Added");
				}
				else{
					alert("Something Went Wrong");
				}
			}
		});
	})

	jQuery(document).on("change","#dis",function(){
		var dis = jQuery(this).val();
		var amount = jQuery("#totalAmount").val();
		var disAmount = ((amount*dis)/100);
		jQuery("#disamount").val(disAmount);
		var gtotal = amount - disAmount;
		jQuery("#grandTotal").val(gtotal);
	})

	jQuery(document).on("keyup","#pay",function(){
		var pay = jQuery(this).val();
		var gtotal = jQuery("#grandTotal").val();
		var dueback = pay - gtotal;
		jQuery("#due").val(dueback);
	})

	jQuery(document).on("click","#save",function(){
		
		var pdate = jQuery("#pdate").val();
		var cName = jQuery("#cname").val();
		var invoice = jQuery("#invoice").val();
		var total_quantity = jQuery("#totalQnt").val();
		var total_price =jQuery("#totalAmount").val();
		var dis = jQuery("#dis").val();
		var dis_amount =jQuery("#disamount").val();
		var grand_total =jQuery("#grandTotal").val();
		var pay =jQuery("#pay").val();
		var due =jQuery("#due").val();
		var action ="purchaseSummery";

		$.ajax({
			url:"././Classes/ajax.php",
			type:"POST",
			data:{
				'pdate' :pdate,
				'cName' :cName,
				'invoice' :invoice,
				'total_quantity' :total_quantity,
				'total_price' :total_price,
				'dis' :dis,
				'dis_amount' :dis_amount,
				'grand_total' :grand_total,
				'pay' :pay,
				'due' :due,
				'action' :action
			},
			success:function(response){
				alert("Successfully Saved");
			}
		})	
	});

	jQuery(document).on("click",".removeItem",function(){
		var id = jQuery(this).val();
		var action ="removeItem";

		$.ajax({
			url:"././Classes/ajax.php",
			type:"POST",
			data:{
				'id':id,
				'action':action
			},
			success:function(response){
				showItem();
					alert("Item Removed");
				
			}
		})
	})







});