function crearCategoria() {
    document.getElementById('btnCrearCategoria').disabled = true;
    // Mostrar el indicador de carga y ocultar el svg
    document.getElementById('InitIcon').classList.add('hidden');
    document.getElementById('loadingIcon').classList.remove('hidden');
    document.getElementById('btnText').textContent = 'Creando Categoría...';

    let status = true
    let nameid = document.getElementById('name');
    let descriptionid = document.getElementById('description');

    if(nameid.value.length < 3){
        nameid.classList.remove('border-gray-300');
        nameid.classList.add('border-red-500');
        document.getElementById('errortxtname').classList.remove('hidden');
        status = false;
    }
    if(descriptionid.value.length < 3){
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
        if(descriptionid.value.length >= 3){
            descriptionid.classList.remove('border-red-500');
            descriptionid.classList.add('border-gray-300');
            document.getElementById('errortxtdesp').classList.add('hidden');
        }
    });
}

    if(status) {
        document.getElementById('formNuevaCategoria').submit();
    } else {
        document.getElementById('btnCrearCategoria').disabled = false;
        document.getElementById('InitIcon').classList.remove('hidden');
        document.getElementById('loadingIcon').classList.add('hidden');
        document.getElementById('btnText').textContent = 'Agregar Categoria';
    }
}
