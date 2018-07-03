
function getFromApiReserves(){
 
var request = new XMLHttpRequest();
/*
request.open('POST', 'http://api.algarvefaroairporttransfers.com/info/chave/?chave=7ad65f59d2a46a0a5644fc2c2c6ac31b97a45b5b',true);
*/

request.open('POST', 'http://api.algarvefaroairporttransfers.com/info/7ad65f59d2a46a0a5644fc2c2c6ac31b97a45b5b/',false);

    request.setRequestHeader("Content-Type", "application/json");
    request.setRequestHeader("Access-Control-Allow-Origin", "*");
    request.setRequestHeader("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
    request.setRequestHeader("Access-Control-Allow-Methods","POST, GET, OPTIONS, DELETE, PUT, HEAD");
    request.setRequestHeader("Access-Control-Max-Age","1728000");   



request.onreadystatechange = function () {
  if (this.readyState === 4) {
    console.log('Status:', this.status);
    console.log('Headers:', this.getAllResponseHeaders());
    console.log('Body:', this.responseText);
  }
};

var body = {
  'id': '100'
};

request.send(JSON.stringify(body));
alert(JSON.stringify(body));
}




