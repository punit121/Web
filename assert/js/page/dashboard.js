function getScrollTop(){
        if(typeof pageYOffset!= 'undefined'){
          return pageYOffset;
        }
        else{
          var b = document.body; //IE 'quirks'
          var d = document.documentElement; //IE with doctype
          d = (d.clientHeight)? d : b;
          return d.scrollTop;
        }
      }    
	  
	  
var b = 500;         
var d = document;
d.getElementById("focustags").onclick = function() {
    d.getElementById("upsname").focus();
};
              
			//alert('sdfsdf');
    //$(document).on('click','.show_more',function(){
		$( "#showmor" ).click(function() {
			 
        var ID = $('#nextpg').val();
        $('.show_more').hide();
        $('.loding').show();
		
        $.ajax({
            type:'POST',
            url:'users/dashboardloop',
            data:'id='+ID,
            success:function(html){
               var val1 = (isNaN(parseInt(ID))) ? 0 : parseInt(ID);
			   a= val1 + 8 ;
			   $('#nextpg').val(a);
			    $('#container').append( html);
                
				 
				setTimeout(function(){
				 $('#container').BlocksIt({
			numOfCol: 4,
			offsetX: 8,
			offsetY: 8
		});
		$('.show_more').show();
				 $('.loding').hide();
		}, 2000);
				
            }
	
        
  
		});
});	
}