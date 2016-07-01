var notification  = 0;
var see = false;
function agregarProducto (data,cantidad,stock) {
	if(cantidad == 0)
	{
		alert('Ingresa por lo menos 1 articulo');
	}else if(cantidad > parseInt(stock))
	{
		alert('Existencias insuficientes');
	}else{
	var dom 	= data;
	var elements= document.getElementById('nav_elements');
	 var li		= document.createElement('li');
	var del 	= document.createElement('span'); 
	var input  = document.createElement('input');
	input.setAttribute('type','hidden');
	input.setAttribute('value',data+","+cantidad);
	input.setAttribute('name',data);
	del.setAttribute('onclick','borrar(this.parentNode)');
	var del_text= document.createTextNode("x");
	var a 		= document.createElement('a');
	dom = dom.substring(0,20)+"...";
	var codigo 	= document.createTextNode(dom);
	a.appendChild(codigo);
	del.appendChild(del_text);
	li.appendChild(a);
	li.appendChild(del);
	li.appendChild(input);
	elements.appendChild(li);
	if (notification == 0 && see == false) {
		var button	= document.getElementById('button');	
		var div 	= document.createElement('div');
		var text 	= document.createTextNode(notification+=1); 
		div.appendChild(text);
		div.setAttribute('id','notification');
		button.appendChild(div);
		see = true;
	}else {
		notification +=1;
		document.getElementById('notification').innerHTML = notification;
		}
	console.log(notification);
	}
}
function borrar (element) {


	element.parentNode.removeChild(element);
	notification -= 1;
	document.getElementById('notification').innerHTML = notification;
}
function passData (dataHead,dataContent,dataStock,dataValue) {
	var head 	=  document.getElementById('header').innerHTML 	= dataHead;
	var content = document.getElementById('content').innerHTML 	= dataContent;
	var stock 	= document.getElementById('stock').innerHTML 	= dataStock;
	var value 	= document.getElementById('precio').innerHTML 	= "$"+dataValue+".00 MXN";
	var add 	= document.getElementById('agregar').setAttribute('value',dataHead);
}
function sendCost (value) {
	document.getElementById('cost').innerHTML ="$"+ value + "  MXN";
	document.getElementById('total').innerHTML = parseInt(value)+parseInt(document.getElementById('order-hidden').value)+".00 MXN";

}

function check (value) {
	 if(notification <= 0)
	 {
	 	alert("Carrito vacio");
	 	window.location.replace('http://fastmarket.sytes.net/fast_market_v3/');
	 }
}
$(document).ready(function(){
    $(".btn1").click(function(){
        $("p").slideUp();
    });
    $(".btn2").click(function(){
        $("p").slideDown();
    });
});

$(document).ready(function (){
  $('.solo-numero').keyup(function (){
    this.value = (this.value + '').replace(/[^0-9]/g, '');
  });
  
});


