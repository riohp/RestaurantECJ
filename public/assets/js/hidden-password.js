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
