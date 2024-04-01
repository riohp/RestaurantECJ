
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('[data-modal-toggle="crud-modal"]');
    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const tableId = button.getAttribute('data-table-id');
            localStorage.setItem('selectedTableId', tableId);
            let id_table = document.getElementById('id_table');
            id_table.value = tableId;
        });
    });
});


let btnCreateReservation = document.getElementById('btnCreateReservation');

btnCreateReservation.addEventListener('click', crearReservation);

function crearReservation() {


    let status = true
    let full_name = document.getElementById('full_name');
    let cellphone = document.getElementById('cellphone');
    let location = document.getElementById('location');
    let date_reservation = document.getElementById('date_reservation');
    let time_reservation = document.getElementById('time_reservation');

    if (full_name.value.length < 3) {
        full_name.classList.remove('border-gray-300');
        full_name.classList.add('border-red-500');
        document.getElementById('errortxtname').classList.remove('hidden');
        status = false;
    } else {
        full_name.classList.add('border-gray-300');
        full_name.classList.remove('border-red-500');
        document.getElementById('errortxtname').classList.add('hidden');
    }


    if (location.value.length < 3) {
        location.classList.remove('border-gray-300');
        location.classList.add('border-red-500');
        document.getElementById('errortxtLocation').classList.remove('hidden');
        status = false;
    }else {
        location.classList.add('border-gray-300');
        location.classList.remove('border-red-500');
        document.getElementById('errortxtLocation').classList.add('hidden');
    }



    if (date_reservation.value.length < 3) {
        date_reservation.classList.remove('border-gray-300');
        date_reservation.classList.add('border-red-500');
        document.getElementById('errortxtDate').classList.remove('hidden');
        status = false;
    }else {
        date_reservation.classList.add('border-gray-300');
        date_reservation.classList.remove('border-red-500');
        document.getElementById('errortxtDate').classList.add('hidden');
    }

    if (time_reservation.value.length < 3) {
        time_reservation.classList.remove('border-gray-300');
        time_reservation.classList.add('border-red-500');
        document.getElementById('errortxtTime').classList.remove('hidden');
        status = false;
    }else {
        time_reservation.classList.add('border-gray-300');
        time_reservation.classList.remove('border-red-500');
        document.getElementById('errortxtTime').classList.add('hidden');
    }	



    if (!status) {
        full_name.addEventListener('input', function () {
            if (nameid.value.length >= 3) {
                nameid.classList.remove('border-red-500');
                nameid.classList.add('border-gray-300');
                document.getElementById('errortxtname').classList.add('hidden');
            }
        });
    }





    if (cellphone.value.trim() === "") {
        cellphone.classList.remove('border-gray-300');
        cellphone.classList.add('border-red-500');
        document.getElementById('errorRegistercellphone').innerText = 'El teléfono es obligatorio'
        status = false
    } else if (cellphone.value.length < 10 || cellphone.value.length > 10) {
        cellphone.classList.remove('border-gray-200', 'dark:border-gray-700')
        cellphone.classList.add('border-red-500')
        document.getElementById('errorRegistercellphone').innerText = 'El teléfono debe tener 10 dígitos'
        status = false
    }else {
        cellphone.classList.add('border-gray-300');
        cellphone.classList.remove('border-red-500');
        document.getElementById('errorRegistercellphone').innerText = ''
    }


    if (status) {
        document.getElementById('formNuevareserva').submit();
    }
}