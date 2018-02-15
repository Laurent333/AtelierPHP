
function hideDatasMessage(){
    document.getElementById("datasMessage").classList.add('hide');
}

document.getElementById("datasMessage").onclick = function(){
    hideDatasMessage();
};
setInterval(function(){ hideDatasMessage(); }, 10000);
