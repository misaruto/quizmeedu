//pega a largura da resolução da tela
var width = screen.width;
//pega a altura da resolução da tela
var height = screen.height;
//verifica se a resolução dará uma boa visão do site
var wWidth = window.innerWidth;
var wHeight = window.innerHeight;

if(document.getElementById('body-background')){
	var body = document.getElementById('body-background');
	if (width <= 1440 && height <= 900){
		body.style = "background-image: url('https://misaruto.000webhostapp.com/imagens/tela_1280.png'); background-repeat: no-repeat; background-size: cover; height:"+wHeight+";";
	}
	if (width >= 1440 && height >= 1080){
		body.style = "background-image: url('https://misaruto.000webhostapp.com/imagens/tela_1920.png'); background-size:cover; background-repeat: no-repeat;";
	}
}
if (document.getElementById('title')) {
	var title = document.getElementById('title');
	if (width <= 1440 || height <= 900){
		title.src = "https://misaruto.000webhostapp.com/imagens/titulo_1280.png";
		title.height = "250";
		title.width = "1280";
		title.style = "width:100%;";
	}
	else{
		if (width <= 1920 || height <= 1080){
			title.src = "https://misaruto.000webhostapp.com/imagens/titulo_1920.png";
			title.height = "250";
			title.width = "1920";
			title.style = "width:100%;";
		}
	}
}
/*if (wWidth <1200) {
	document.getElementById('nav2').hidden = true;
	document.getElementById('nav').hidden = false;
}
else{
	document.getElementById('nav2').hidden = false;
	document.getElementById('nav').hidden = true;
}
*/
var title = document.getElementsByTagName('title');
title[0].text = "Quiz-Me EDU";