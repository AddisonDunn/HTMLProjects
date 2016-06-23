function next(win){
	console.log("Next node is: ");
	winner = win.target;
	var nextThing = null;
	if(winner.firstElementChild) {
		nextThing = winner.firstElementChild;
	}
	else if(winner.nextElementSibling) {
		nextThing = winner.nextElementSibling;
	}
	else
	{
		while(!winner.parentNode.nextElementSibling) {
			winner = winner.parentNode;
		}
		if(winner.parentNode.nextElementSibling.tagName == 'SCRIPT')
		{
			winner = winner.parentNode.nextElementSibling;
			while(winner.parentNode.tagName != 'BODY') {
				winner = winner.parentNode;
			}
			nextThing = winner.parentNode.firstElementChild;
		}
		else 
		{
			nextThing = winner.parentNode.nextElementSibling;
		}
	}
	console.log(nextThing);
}
//&& winner.parentNode.nextElementSibling.tagName != 'SCRIPT'
window.onclick = next;