let passwordSwitch = document.getElementById('password-switch');
let passwordInput = document.querySelector('.passTypeSwitch');
let eyeOn = document.querySelector('.password-eye-on');
let eyeOff = document.querySelector('.password-eye-off');

passwordSwitch.addEventListener('click', function() {
    console.log("cambio ")
    if (passwordInput.type === 'password') {
        eyeOn.classList.add('hidden');
        eyeOff.classList.remove('hidden');
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
        eyeOn.classList.remove('hidden');
        eyeOff.classList.add('hidden');
    }
});

let passwordSwitch2 = document.getElementById('password-switch2');
let passwordInput2 = document.querySelector('.passTypeSwitch2');
let eyeOn2 = document.querySelector('.password-eye-on2');
let eyeOff2 = document.querySelector('.password-eye-off2');

passwordSwitch2.addEventListener('click', function() {
    console.log("cambio 2")
    if (passwordInput2.type === 'password') {
        eyeOn2.classList.add('hidden');
        eyeOff2.classList.remove('hidden');
        passwordInput2.type = 'text';
    } else {
        passwordInput2.type = 'password';
        eyeOn2.classList.remove('hidden');
        eyeOff2.classList.add('hidden');
    }
});
