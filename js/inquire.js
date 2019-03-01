(function(d){
	var a = d.querySelectorAll("#courses ul>li"),
		  trainingInq = jQuery("#trainingInq"),
			wpcf7 = jQuery("#wpcf7-form"),
			cf7res = jQuery("#cf7res"),
			wpcf7responseoutput = jQuery('.wpcf7-response-output');
	
	wpcf7responseoutput.appendTo(wpcf7);
	
	[].forEach.call(a,function(e){
			e.addEventListener("click",function(){
				trainingInq.modal();
			})
	});
	document.addEventListener( 'wpcf7submit', function( event ) {
		jQuery('.wpcf7-response-output').appendTo("#cf7res");
		if(event.detail.status == "validation_failed"){
			event.preventDefault();
		}else{
			setTimeout(function(){
				trainingInq.modal("hide");
			},2000);
		}
		return false;
	}, false );	
})(document);