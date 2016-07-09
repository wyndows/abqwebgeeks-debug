function rollDice(outputId) {
	var roll = Math.floor(Math.random() * 6 + 1);
	var output = document.getElementById(outputId);
	
	output.innerHTML = "You rolled a " + roll;
}
