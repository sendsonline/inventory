$(function(){
	
	$.ajax({
			url : '../functions/checkPending.php',
			type : "POST" ,
			dataType : "html" ,
			success : function(obj){
				res = $.trim(obj);
				// alert(res);
				if(res != ''){
					$('#receipt').show();
					$('#finish_trans').show();
					// $('.btn-delete').hide();
					$('#clear_trans').show();
					$('#receipt').hide();
					$('th.text-center').hide();

				}
				else{

				}
			},
			error: function(err){
				alert("AJAX error in request: " + JSON.stringify(err, null, 2));
			}
		});

	// $('#receipt').click(function(){
	// 	receipt = $('#receipt_result').html();
	// 	$(window).print(receipt);
	// 	// receipt.print();
	// });

	$('#clear_trans').click(function(){
		$.ajax({
			url : '../functions/deleteTemp.php',
			type : "POST" ,
			dataType : "html" ,
			success : function(obj){
				res = $.trim(obj);
				// alert(res);
				if(res != ''){
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
	});

	// $('#finish_trans').click(function(){
		
	// });
});
function print(){
	receipt = document.getElementById("receipt_result").outerHTML();
	window.print(receipt);
}