$(function(){
	$('.dropdown').each(function(){
		$(this).mouseenter(function(){
			$(this).find('.dropdown-menu').fadeIn(500);
		});
		$(this).mouseleave(function(){
			$(this).find('.dropdown-menu').fadeOut(500);
		});
	});
	$('.btn-change').click(function(){

		old = $('input[name="oldpword"]').val();
		newp = $('input[name="newpword"]').val();
		conf = $('input[name="confpword"]').val();
		


		if(old == ''){
			$('.old').text('This cant be null');
			$('.conf').text('');
			$('.new').text('');
			$('input[name="oldpword"]').focus();
		}
		else{
			if(newp == ''){
				$('.new').text('This cant be null');
				$('.old').text('');
				$('.conf').text('');
			$('input[name="newpword"]').focus();
			}
			else{
				if(conf == ''){
					$('.conf').text('This cant be null');
					$('.new').text('');
					$('.old').text('');
					$('input[name="confpword"]').focus();
				}
				else{
					if(newp != conf){
						$('.conf').text('Passwords did not match');
						$('.new').text('');
						$('.old').text('');
					}
					else{
						$('#changeForm').submit();

					}
				}
			}
		}
		
	});
	// $('#total').css('pointer-events','none');
	// $('#price').css('pointer-events','none');
	// $('#qty').prop('disabled',true);
	

	// $('#cust').change(function(){
		
	// 	$('h6.errormsg').text('');
	// 	id = $(this).val();

	// 	$.ajax({
	// 		url : '../functions/getCustomer.php' ,
	// 		data : { 'id' : id},
	// 		type : "POST" ,
	// 		dataType : "html" ,
	// 		success : function(obj){
	// 			ids = $.trim(obj);
	// 			if(ids == ''){
	// 				$('h6.errormsg').text('Customer does not exist');
	// 				$('#product_id').css("pointer-events","none");
	// 				$('#qty').css("pointer-events","none");
	// 				$('#cust').focus();
	// 			}
	// 			else{
	// 				$('#product_id').prop('disabled', false);
	// 				$('#product_id').css("pointer-events","");
	// 				$('#qty').css("pointer-events","");
	// 				$('#product_id').focus();
	// 			}
	// 		},
	// 		error: function(err){
	// 			alert("AJAX error in request: " + JSON.stringify(err, null, 2));
	// 		}
	// 	});
	// });
	$('#qty').keyup(function(){
		
		price = parseInt($('#price').val());
		qty = parseInt($('#qty').val());
		total = price * qty;
		$('#total').val(total);	
	});
	
	$('#product_id').change(function(){
		$('#price').val('');
		$('#prod-id').text('');
		id = $(this).val();
		// alert(id);
		
		$.ajax({
			url : '../functions/getPrice.php' ,
			data : { 'id' : id},
			type : "POST" ,
			dataType : "html" ,
			success : function(obj){
				price = $.trim(obj);
				// alert(price);
				if(price==''){
					$('#prod-id').text('Product id does not exist');
					$('#product_id').focus();
				}
				else{
					$.ajax({
						url : '../functions/checkStocks.php' ,
						data : { 'ids' : id},
						type : "POST" ,
						dataType : "html" ,
						success : function(obj){
							stock = $.trim(obj);
							// alert(stock);
							if(stock!='' || stock > 0){
								$('#price').val(price);
								// $('#qty').prop('disabled',false);
								$('#qty').css("pointer-events","");
								$('#qty').focus();
							}
							else{
								$('#prod-id').text('Product is out of stocks!');
								$('#price').css("pointer-events","none");
								$('#qty').css("pointer-events","none");
							}
							
						},
						error: function(err){
							alert("AJAX error in request: " + JSON.stringify(err, null, 2));
						}
					});

					
				}
			},
			error: function(err){
				alert("AJAX error in request: " + JSON.stringify(err, null, 2));
			}
		});
    });

	$('#finish_trans').click(function(){

		$.ajax({
			url : '../functions/finishTrans.php' ,
			type : "POST" ,
			dataType : "html" ,
			success : function(obj){
				res = $.trim(obj);
				// alert(res);
				if(res != ''){
					$.ajax({
						url : '../functions/deleteTemp.php',
						type : "POST" ,
						dataType : "html" ,
						success : function(objs){
							ress = $.trim(objs);
							
							if(ress != ''){
								alert('Transaction is done!');
								location.reload();

							}
							else{
								alert('Something went wrong!');
							}
						},
						error: function(err){
							alert("AJAX error in request: " + JSON.stringify(err, null, 2));
						}
					});
					// location.reload();

				}
			},
			error: function(err){
				alert("AJAX error in request: " + JSON.stringify(err, null, 2));
			}
		});
	});
	

});



   

    function search() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
  