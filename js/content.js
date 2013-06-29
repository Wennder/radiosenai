$(document).ready(function(){
var vHash = window.location.hash;
var intInterval = 0;
var vDuration = 2000;

//Check if there is hash data on first load
if (vHash)
{
	fnLoad(vHash);
}

//FUNCTION: LOAD CONTENT
function fnLoad(p_ID){
		
	p_ID = p_ID.substr(1,p_ID.length);
	
	$("#content").animate({ height: 'hide' }, 500, function() { 
		$("#content").empty().load("content/"+p_ID+".html", fnDone);
	});
}

//LINK CLICK
$("#nav a").click(function(e){
	clearInterval(intInterval);
	vHash = "#" + this.id;
	fnLoad(vHash);
	document.location.hash = vHash;
	e.preventDefault();
});

//FUNCTION: CHECK HASH CHANGE
function fnLoop()
{
    var tmpHash = window.location.hash;
	if(tmpHash)
	{
		if(tmpHash != vHash)
		{
			vHash = tmpHash;
			fnLoad(vHash);
		}
		
	}
}

//FUNCTION: DONE LOADING
function fnDone()
{
	$("#content").animate({ height: 'show' }, 500);
	intInterval = setInterval(fnLoop, vDuration);
};

});