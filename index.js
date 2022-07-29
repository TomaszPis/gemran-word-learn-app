
function checkWord(){

	var word1 = document.getElementById('translate').value;
	var word2 = document.getElementById('word2').value;

	if(word1.toLowerCase() == word2.toLowerCase()){
		
		var elHide1 = document.getElementById('exc-box-write');
		var elHide2 = document.getElementById('check');
		var elShow = document.getElementsByClassName('hidden')[0];
		
		elHide1.className = 'hide';
		elHide2.className = 'hide';
		elShow.className = 'good';

	}
	else{
		var elShow = document.getElementsByClassName('hidden-error')[0];
		elShow.className = 'error';


		window.setTimeout(function(){

			var hideError = document.getElementsByClassName('error')[0];
			hideError.className = 'hidden-error';

		}
		, 3000, true);
	}
}


var check = document.getElementById('check');
check.addEventListener('click', checkWord, true);



