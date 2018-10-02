document.getElementById("practice").onmouseover = function() {
    document.getElementById("practice").innerHTML = '<h1>TOPページ</h1>';
    practice.style.backgroundColor = '#999999';
    practice.style.fontSize        = '10px';
    practice.style.color           = '#FFFFAF';
}

/*
* パスワード一致チェック
*/
function setConfirmMessage(confirm_password) {
 var password = document.getElementById("password").value;
 var message = "";
 if (password == confirm_password) {
   message = "";
 } else {
   message =  "パスワードが一致しません";
 }

 var div = document.getElementById("pass_confirm_message");
 if (!div.hasFistChild) {div.appendChild(document.createTextNode(""));}
 div.firstChild.data = message;
}