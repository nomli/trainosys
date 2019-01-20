(function(d){
	var a = d.querySelectorAll("#courses ul>li"),
		  trainingInq = jQuery("#trainingInq");
	
	[].forEach.call(a,function(e){
			e.addEventListener("click",function(){
				trainingInq.modal();
			})
	});
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		trainingInq.modal("hide");
		
		setTimeout(function(){
			$('html, body').animate({
				scrollTop:  $(document).height()
			}, 800);
		},600)
	}, false );
	document.addEventListener( 'wpcf7invalid', function( event ) {
		//return false;
	}, false );
})(document);