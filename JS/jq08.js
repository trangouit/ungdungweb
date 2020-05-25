// JavaScript Document
function init(event){
	arr = ["images/1.jpg","images/2.jpg","images/3.jpg","images/4.jpg"];
	event.preventDefault();
	$("#hinh").attr("src",arr[0]);
	timer = setInterval(doihinh,2000);
	//alert(index);
}

//$().ready(function(){
	$("#prev").click(function(event){
	//	clearInterval(timer);
		event.preventDefault();
		current_img = $("#hinh").attr("src");
		var index = arr.indexOf(current_img);
		index --;
		if(index < 0 ) index = 3;
		
		$("#hinh").attr("src", arr[index]);
		
		//timer = setInterval(doihinh,1000)
	});
	
	$("#next").click(function(){
	//	clearInterval(timer);
		current_img = $("#hinh").attr("src");
		var index = (arr.indexOf(current_img)+1)%4;
		//index = (index +1)%4;
		$("#hinh").attr("src",arr[index]);
		//timer = setInterval(doihinh,1000);
	});
	
//})
function doihinh()
{
	//index = (index +1)%4;
	current_img = $("#hinh").attr("src");
	var index = (arr.indexOf(current_img)+1)%4;

	$("#hinh").fadeToggle(2000,function(){
		$("#hinh").attr("src",arr[index]);
	})
	
}