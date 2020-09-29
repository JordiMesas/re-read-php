const desc = document.getElementsByClassName('desc');
var i = 0;
while (i < desc.length) { 
    let newDesc = desc[i].innerHTML.substr(0, 80);   
    desc[i].innerHTML = `${newDesc}...`;
	i++;
}


