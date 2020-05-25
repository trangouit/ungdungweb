// JavaScript Document
$(document).ready(function() {
	var speed = 200;
	$('ul.panels li:last-child').addClass('last');
	//Khi con trỏ chuột nằm trên các <li>
	$('ul.panels li').hover(function() {
		$(this).stop().animate({//<li> được nhận con trỏ chuột --> zoom to
			width: '360px',
			fontSize: '150px'
		}, speed)
		.siblings('li').stop().animate({//các <li> khác --> zoom nhỏ
			width: '135px',
			fontSize: '50px'
		}, speed);
	},
	function() {// con trỏ chuột rời khỏi <li> --> trở lại kích thước ban đầu
		$(this).stop().animate({
			width: '180px',
			fontSize: '100px'
		}, speed)
		.siblings('li').stop().animate({//các <li> khác trở lại kích thước ban đầu
			width: '180px',
			fontSize: '100px'
		}, speed);
	});
});