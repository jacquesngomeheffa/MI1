function addDemoStyleSheet(){
		var theHead = document.getElementsByTagName('head');
		var styleSheet = theHead[0].appendChild(document.createElement('style'));
		styleSheet.type='text/css';
		
		var theCSS='#normal-animation {background: red; position: relative; width: 20%; animation-name: fred; animation-duration: 5s; animation-iteration-count: infinite; animation-timing-function: ease; animation-direction: normal; -webkit-animation-name: fred; -webkit-animation-duration: 5s; -webkit-animation-iteration-count: infinite; -webkit-animation-timing-function: ease; -webkit-animation-direction: normal; -moz-animation-name: fred; -moz-animation-duration: 5s; -moz-animation-iteration-count: infinite; -moz-animation-timing-function: ease; -moz-animation-direction: normal; } #alternate-animation {background: red; position: relative; width: 20%; animation-name: fred; animation-duration: 5s; animation-iteration-count: infinite; animation-timing-function: ease; animation-direction: alternate; -webkit-animation-name: fred; -webkit-animation-duration: 5s; -webkit-animation-iteration-count: infinite; -webkit-animation-timing-function: ease; -webkit-animation-direction: alternate; -moz-animation-name: fred; -moz-animation-duration: 5s; -moz-animation-iteration-count: infinite; -moz-animation-timing-function: ease; -moz-animation-direction: alternate; } @keyframes fred {0% { left: -40% } 100% { left: 40% } } @-webkit-keyframes fred {0% { left: 0% }100% { left: 80% } }@-moz-keyframes fred {0% { left: -40% } 100% { left: 40% } }'
		
		styleSheet.textContent=theCSS;

}

addDemoStyleSheet();


function animateTimingDemo() {
	var allDemos=document.querySelectorAll('.timingdemo');
	
	if (allDemos[0].style.left=="80%") {
		for (var i=0; i < allDemos.length; i++) {
			allDemos[i].style.left='0'
		}
	}
	
	else {
		for (var i=0; i < allDemos.length; i++) {
			allDemos[i].style.left='80%'
		}
	}
}

function animateOneDemo(demo) {
	
	if (demo.style.left=="80%") {
			demo.style.left='0'
		}
	
	else {
		demo.style.left='80%'

	}
}

function simpleDemo1(demo){
	if(demo.style.backgroundColor!='blue') {
		demo.style.backgroundColor='blue';
		demo.style.color='green'
	}
	else {
		demo.style.backgroundColor='red'; 
		demo.style.color='black'
	}
}

function animateDelay(demo) {
	
	if (demo.style.left=="300px") {
			demo.style.left='0';
			demo.style.top='0'

		}
	
	else {
		demo.style.left='300px';
		demo.style.top='-30px'

	}
}