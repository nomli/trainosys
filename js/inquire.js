(function(d){
	var a = d.querySelectorAll("#courses ul>li"),
			  triggerEle = d.querySelector('.triggerTi');
	
	[].forEach.call(a,function(e){
			e.addEventListener("click",function(){
				triggerEle.click();
			})
	});
})(document);