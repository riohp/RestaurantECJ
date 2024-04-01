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
    if(loginEmail.value.trim() === "") {
        loginEmail.classList.remove('border-gray-200', 'dark:border-gray-700')
        loginEmail.classList.add('border-red-500')
        document.getElementById('errorInputEmail').innerText = 'El email es obligatorio'
        status = false
    }else if (!validateEmail(loginEmail.value)) {
        loginEmail.classList.remove('border-gray-200', 'dark:border-gray-700')
        loginEmail.classList.add('border-red-500')
        document.getElementById('errorInputEmail').innerText = 'Ingresa un email válido. Ejemplo: fefi@email.com'
        status = false
    }

    //validacion de la contraseña si esta vacia
    if(loginPass.value.trim() === "") {
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

const validationModule = (function() {
    function validateOne(){
        console.log('Validando')
        let name = document.getElementById('registerName')
        let email = document.getElementById('registerEmail')
        let password = document.getElementById('registerPassword')
        let status = true

        //validacion del nombre si esta vacio o no cumple con el formato
        if (name.value.trim() === "") {
            name.classList.remove('border-gray-200', 'dark:border-gray-700')
            name.classList.add('border-red-500')
            document.getElementById('errorRegisterName').innerText = 'El nombre es obligatorio'
            status = false
        }

        if (email.value.trim() === "") {
            email.classList.remove('border-gray-200', 'dark:border-gray-700')
            email.classList.add('border-red-500')
            document.getElementById('errorRegisterEmail').innerText = 'El email es obligatorio'
            status = false
        } else if (!validateEmail(email.value)) {
            email.classList.remove('border-gray-200', 'dark:border-gray-700')
            email.classList.add('border-red-500')
            document.getElementById('errorRegisterEmail').innerText = 'Ingresa un email válido. Ejemplo: fefi@ejemplo.com'
            status = false
        }

        if (password.value.trim() === "") {
            password.classList.remove('border-gray-200', 'dark:border-gray-700')
            password.classList.add('border-red-500')
            document.getElementById('errorRegisterPassword').innerText = 'La contraseña es obligatoria'
            status = false
        }else if(password.value.length < 8){
            password.classList.remove('border-gray-200', 'dark:border-gray-700')
            password.classList.add('border-red-500')
            document.getElementById('errorRegisterPassword').innerText = 'La contraseña debe tener al menos 8 caracteres'
            status = false
        }

        if (!status) {
            name.addEventListener('input', function(){
                if(name.value.length > 0){
                    name.classList.remove('border-red-500')
                    name.classList.add('border-gray-200')
                    document.getElementById('errorRegisterName').innerText = ''
                    status = true
                }
            })

            email.addEventListener('input', function(){
                if(email.value.length > 0){
                    email.classList.remove('border-red-500')
                    email.classList.add('border-gray-200')
                    document.getElementById('errorRegisterEmail').innerText = ''
                    status = true
                }
            })

            password.addEventListener('input', function(){
                if(password.value.length >= 8){
                    password.classList.remove('border-red-500')
                    password.classList.add('border-gray-200')
                    document.getElementById('errorRegisterPassword').innerText = ''
                    status = true
                }
            })
        }
        return status
    }

    function validateTow() {
        let direccion = document.getElementById('registerDireccion');
        let telefono = document.getElementById('registerTelefono');
        let status = true

        if (direccion.value.trim() === ""){
            direccion.classList.remove('border-gray-200', 'dark:border-gray-700')
            direccion.classList.add('border-red-500')
            document.getElementById('errorRegisterDireccion').innerText = 'La dirección es obligatoria'
            status = false
        }

        if (telefono.value.trim() === ""){
            telefono.classList.remove('border-gray-200', 'dark:border-gray-700')
            telefono.classList.add('border-red-500')
            document.getElementById('errorRegisterTelefono').innerText = 'El teléfono es obligatorio'
            status = false
        }else if(telefono.value.length < 10 || telefono.value.length > 10){
            telefono.classList.remove('border-gray-200', 'dark:border-gray-700')
            telefono.classList.add('border-red-500')
            document.getElementById('errorRegisterTelefono').innerText = 'El teléfono debe tener 10 dígitos'
            status = false
        }

        if(!status){
            direccion.addEventListener('input', function(){
                if(direccion.value.length === 10){
                    direccion.classList.remove('border-red-500')
                    direccion.classList.add('border-gray-200')
                    document.getElementById('errorRegisterDireccion').innerText = ''
                    status = true
                }
            });

            telefono.addEventListener('input', function(){
                if(telefono.value.length >= 8){
                    telefono.classList.remove('border-red-500')
                    telefono.classList.add('border-gray-200')
                    document.getElementById('errorRegisterTelefono').innerText = ''
                    status = true
                }
            });
        }

        return status
    }
    return {
        validateOne: validateOne,
        validateTow1: validateTow
    };
})();

function validateEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}
