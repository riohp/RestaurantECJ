function crearCategoria() {
    document.getElementById('btnCrearCategoria').disabled = true;
    // Mostrar el indicador de carga y ocultar el svg
    document.getElementById('InitIcon').classList.add('hidden');
    document.getElementById('loadingIcon').classList.remove('hidden');
    document.getElementById('btnText').classList.add('hidden');

    let status = true
    let nameid = document.getElementById('name');
    let descriptionid = document.getElementById('description');

    if(nameid.value.length < 3){
        nameid.classList.remove('border-gray-300');
        nameid.classList.add('border-red-500');
        document.getElementById('errortxtname').classList.remove('hidden');
        status = false;
    }
    if(descriptionid.value.length > 3){
        if (descriptionid.value.length > 255){
            descriptionid.classList.remove('border-gray-300');
            descriptionid.classList.add('border-red-500');
            document.getElementById('errortxtdesp').classList.remove('hidden');
            document.getElementById('errortxtdesp').innerText = 'La descripción no puede tener más de 255 caracteres';
            status = false;
        }
    }else{
        descriptionid.classList.remove('border-gray-300');
        descriptionid.classList.add('border-red-500');
        document.getElementById('errortxtdesp').classList.remove('hidden');
        status = false;
    }

    if(!status){
        nameid.addEventListener('input', function(){
            if(nameid.value.length >= 3){
            nameid.classList.remove('border-red-500');
            nameid.classList.add('border-gray-300');
            document.getElementById('errortxtname').classList.add('hidden');
        }
    });

    descriptionid.addEventListener('input', function () {
        if(descriptionid.value.length >= 3 && descriptionid.value.length <= 255){
            descriptionid.classList.remove('border-red-500');
            descriptionid.classList.add('border-gray-300');
            descriptionid.value.length <= 3 ? document.getElementById('errortxtdesp').innerText = 'Introduce un nombre con al menos 3 caracteres' : document.getElementById('errortxtdesp').classList.add('hidden');
            descriptionid.value.length >= 255 ? document.getElementById('errortxtdesp').classList.remove('hidden')  : document.getElementById('errortxtdesp').classList.add('hidden');
            descriptionid.value.length >= 255 ? document.getElementById('errortxtdesp').innerText = 'La descripción no puede tener más de 255 caracteres'  : document.getElementById('errortxtdesp').classList.add('hidden');

        }
    });
}

    if(status) {
        document.getElementById('formNuevaCategoria').submit();
    } else {
        document.getElementById('btnCrearCategoria').disabled = false;
        document.getElementById('InitIcon').classList.remove('hidden');
        document.getElementById('loadingIcon').classList.add('hidden');
        document.getElementById('btnText').classList.remove('hidden');
    }
}

function validateLogin() {
    console.log('Validando')
    let loginPass = document.getElementById('loginPassword')
    let loginEmail = document.getElementById('loginEmail')
    let status = true

    //validacion del email si esta vacio o no cumple con el formato
    if(loginEmail.value.length === 0) {
        loginEmail.classList.remove('border-gray-200', 'dark:border-gray-700')
        loginEmail.classList.add('border-red-500')
        document.getElementById('errorInputEmail').innerText = 'El email es obligatorio'
        status = false
    }else if (!loginEmail.value.includes('@') || !loginEmail.value.includes('.')) {
        loginEmail.classList.remove('border-gray-200', 'dark:border-gray-700')
        loginEmail.classList.add('border-red-500')
        document.getElementById('errorInputEmail').innerText = 'Ingresa un email válido. Ejemplo: fefi@email.com'
        status = false
    }

    //validacion de la contraseña si esta vacia
    if(loginPass.value.length === 0) {
        loginPass.classList.remove('border-gray-200', 'dark:border-gray-700')
        loginPass.classList.add('border-red-500')
        document.getElementById('errorInputPassword').innerText = 'La contraseña es obligatorio'
        status = false
    }

    //si empieza a escribir en los inputs se quita el mensaje de error, y se valida nuevamente para poder el envio del formulario
    if (!status) {
        loginEmail.addEventListener('input', function(){
            if(loginEmail.value.length > 0){
                loginEmail.classList.remove('border-red-500')
                loginEmail.classList.add('border-gray-200')
                document.getElementById('errorInputEmail').innerText = ''
                status = true
            }
        })

        loginPass.addEventListener('input', function(){
            if(loginPass.value.length > 0){
                loginPass.classList.remove('border-red-500')
                loginPass.classList.add('border-gray-200')
                document.getElementById('errorInputPassword').innerText = ''
                status = true
            }
        })
    }else if(status){
        document.getElementById('formLogin').submit()
    }
}

