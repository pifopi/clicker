var id = 1;
var compteur = 1;

function AddQuestion()
{
	var item = document.createElement('div');
	item.id = 'question' + id;

	item.innerHTML = '<h2>Question ' + id + '</h2>';

	var question = document.createElement('textarea');
	question.rows = '3';
	question.cols = '60';
	question.form = 'myForm';
	question.name = 'question' + id;
	question.placeholder ='Ecrire la question';
	item.appendChild(question);

	var linebreak = document.createElement("br");
	item.appendChild(linebreak);

	for (var i = 1; i <= 4; i ++)
	{
		var checkbox = document.createElement('input');
		checkbox.type = 'radio';
		checkbox.name = 'bonnereponse' + id;
		checkbox.value = i;
		checkbox.id = compteur;
		if (i == 1)
		{
			checkbox.checked = true;
		}
		item.appendChild(checkbox);

		var label = document.createElement('label');
		label.htmlFor = compteur;
		compteur++;
		item.appendChild(label);
		
		var textarea = document.createElement('textarea')
		textarea.rows = '1';
		textarea.cols = '100';
		textarea.form = 'myForm';
		textarea.name = 'reponse';
		textarea.placeholder = 'Ecrire la réponse ' + i;
		label.appendChild(textarea);
		
		var linebreak = document.createElement("br");
		item.appendChild(linebreak);
	}
	
	document.getElementById("formFields").appendChild(item);
	id ++;
}

function RemoveQuestion()
{
	id --;
	document.getElementById("formFields").removeChild(document.getElementById('question' + id));
}
