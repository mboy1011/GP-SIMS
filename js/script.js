$(document).ready(function() {
    

    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });





    
/*Sales Invoice Add/Remove Rows*/

 //      var i=1;
 //    $("#add_row").click(function(){

 //      $('#addr'+i).html("<td>"+(i+1)+"</td><td><input name='name"+i+"'  type='text' id='name"+i+"' placeholder='Product Name' class='form-control'  /> </td><td><input  name='qty"+i+"' id='quan"+i+"' type='number' placeholder='Quantity'  class='form-control input-md'></td><td><input  name='up"+i+"' id='unit"+i+"' type='text' step='any' placeholder='Unit Price'  class='element form-control input-md'></td><td><input  name='am"+i+"' id='amt"+i+"' readonly='' type='text' step='any' placeholder='AMOUNT' class='element form-control'></td>");
 //    	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
 //    i++; 
 //  	});
 //    $("#delete_row").click(function(){

 //    	 if(i>1){
	// 	 $("#addr"+(i-1)).html('');
	// 	 i--;
	// 	 }
	// });
/**/
    
   // $(this).keyup(function(event) {
   //      for (var i = 0; i < 100; i++) {
   //          $("#amt"+i).number(
   //  true, 2).val($("#quan"+i).val()*$("#unit"+i).val());
   //      }
   //      var sum = 0;
   //      for (var i = 0; i < 100; i++) {
   //          sum += parseFloat($("#amt"+i).val())||0;
   //      }      
   //      $("#totalamount").number(
   //  true, 2).val(sum);
   //      var total = parseFloat($("#totalamount").val());
   //      var net = parseFloat($("#net").val())||0;
   //      var vat = parseFloat($("#vat").val());
   //      var per = vat
   //      $("#net").number(
   //  true, 2).val(total*(vat/100));
   //      $("#tsales").val(total-net);
   // });

});