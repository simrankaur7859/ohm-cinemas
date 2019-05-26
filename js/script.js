$(document).ready(function(){

  var code;
  
	 $("#mob, #mob1").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });



     $('#mob').keyup(function(){
        if($('#mob').val().length==10)
        {
            $('#error').load('verify.php?m='+$('#mob').val());
        }
     });

        $(".days .day").click(function(){
             $(".days .day").removeClass("active");

             $(this).addClass("active");


             $("#dt").val(this.id);
        });

      /*------------------------------------*/

        $(".days p span:first").addClass("active");

        $(".seats label").click(function(){
            $(this).toggleClass("sel");
        });
     
});  