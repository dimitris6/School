
var count = 1;

function start (){
	document.getElementById("dicerollButton").addEventListener("click",trials,false);
	document.getElementById("resetButton").addEventListener ("click", function (){location.reload();},false);	
}

function trials () {
	var tbody = document.getElementById("tableBody");
	var trow = document.createElement("tr");
	var rollCell = document.createElement("td");
	var youCell = document.createElement("td");
	var myCell = document.createElement("td");
	var resultCell = document.createElement("td");
		
	var youResult = 0;
	var myResult = 0;
	
	if (count>=8) {
		document.getElementById("dicerollButton").disabled = true;
	} else {
		document.getElementById("dicerollButton").disabled = false;
	}// end if
	
	rollCell.innerHTML = count++;
	trow.appendChild(rollCell);
	
	//Keep rolling dice until we have a number between 0 and 5 (1-6 for dice sides)
	/*do 
	{
		youResult = Math.round(Math.random()*10);		
	} while (youResult > 5);
	
	
	do 
	{
		myResult = Math.round(Math.random()*10); 
	} while (myResult > 5);*/
	
	
	youResult = Math.round(Math.random()*5);
	myResult = Math.round(Math.random()*5);
	
	switch (youResult) {
		case 0: //Rolled a 1
			youCell.innerHTML = "1";
			trow.appendChild(youCell);			
		break;
		case 1: //Rolled a 2
			youCell.innerHTML = "2";
			trow.appendChild(youCell);
		break;
		case 2: //Rolled a 3
			youCell.innerHTML = "3";
			trow.appendChild(youCell);			
		break;			
		case 3: //Rolled a 4
			youCell.innerHTML = "4";
			trow.appendChild(youCell);			
		break;	
		case 4: //Rolled a 5
			youCell.innerHTML = "5";
			trow.appendChild(youCell);			
		break;	
		case 5: //Rolled a 6
			youCell.innerHTML = "6";
			trow.appendChild(youCell);			
		break;	
	}// end switch
	
	switch (myResult) {
		case 0: //Rolled a 1
			myCell.innerHTML = "1";
			trow.appendChild(myCell);			
		break;
		case 1: //Rolled a 2
			myCell.innerHTML = "2";
			trow.appendChild(myCell);
		break;
		case 2: //Rolled a 3
			myCell.innerHTML = "3";
			trow.appendChild(myCell);			
		break;			
		case 3: //Rolled a 4
			myCell.innerHTML = "4";
			trow.appendChild(myCell);			
		break;	
		case 4: //Rolled a 5
			myCell.innerHTML = "5";
			trow.appendChild(myCell);			
		break;	
		case 5: //Rolled a 6
			myCell.innerHTML = "6";
			trow.appendChild(myCell);			
		break;	
	}// end switch
	
	if (youResult > myResult)
	{
			resultCell.innerHTML = "You win";	
	}else if (myResult > youResult)
	{
			resultCell.innerHTML = "Computer wins";
	}else
	{
			resultCell.innerHTML = "It's a tie!";
	}

		trow.appendChild(resultCell);
		
		tbody.appendChild(trow);	
}
window.addEventListener("load", start, false);