var password = document.getElementById('password');
var eye = document.getElementById('eye');

eye.onmousedown(function() {
    password.type = 'text';
});

eye.onmouseup(function() {
    password.type = 'password'
});