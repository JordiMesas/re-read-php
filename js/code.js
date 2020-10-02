const desc = document.getElementsByClassName('desc');
var i = 0;
while (i < desc.length) { 
    let newDesc = desc[i].innerHTML.substr(0, 70);   
    desc[i].innerHTML = `${newDesc}...`;
	i++;
}


