
var count = 1;

function start (){
	document.getElementById("answerButton").addEventListener("click",answerfunc,false);
}

function answerfunc () {
	var tbody = document.getElementById("tableBody");
	var trow = document.createElement("tr");
	var answerCell = document.createElement("td");
	
	
	
	var answers = [
  'It is certain.', 'It is decidedly so.', 'Without a doubt.', 'Yes definitely',
  'You may rely on it.', 'As I see it, yes.', 'Most likely.', 'Outlook good',
  'Yes.', 'Signs point to yes.', 'Reply hazy try again.', 'Ask again later', 'Better not tell you now.',
  'Cannot predict now.', 'Concentrate and ask again.', 'Do not count on it.', 'My reply is no.',
  'My sources say no.', 'Outlook not so good.', 'Very doubtful.'];


	var answer = answers[Math.floor(Math.random() * answers.length)];
    document.getElementById('answerBody').innerHTML = answer;
		
	
	
}
window.addEventListener("load", start, false);