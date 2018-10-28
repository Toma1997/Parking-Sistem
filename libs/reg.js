
//NIJE JOS SKROZ ZAVSRENA !!!!
//U slucaju reload strane treba genersiati stranu. Pogledati kako???

	var parent = document.getElementById("registration");
	var count = parent.childElementCount;
function add() {
	var node = document.getElementById("reg").cloneNode(true);
	parent = document.getElementById("registration");
	var input = node.children[1];
	input.name = "registration"+(count+1);
	input.id = "registration"+(count+1);
	node.id = "reg"+count;
	node.removeChild(node.childNodes[1])
	parent.appendChild(node);
	count = parent.childElementCount;
	count = parent.childElementCount;
}
function remove(){
	var node = document.getElementById("reg").cloneNode(true);
	var parent = document.getElementById("registration");
    if (count>1)
	parent.removeChild(parent.childNodes[count+1])
	count = parent.childElementCount;
}

/*Proveriti da li moze for za labelu

	var label = node.children[0];
	label.for = "registration"+count;
	
*/