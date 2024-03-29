function nextForm() {
    if (validationModule.validateOne()){
        let fisrtRegister = document.getElementById('fisrtRegister');
        let secondRegister = document.getElementById('secondRegister');
        let switchButton = document.getElementById('switchButton');
        fisrtRegister.classList.add('hidden');
        secondRegister.classList.remove('hidden');
        switchButton.innerHTML = `
                    <button type="button" onclick="prevForm()" class="relative gap-2 inline-flex items-center text-purple-700 justify-center px-6 py-3 rounded-full text-base bg-transparent border hover:text-gray-100 border-purple-700 dark:text-purple-700 capitalize transition-all hover:bg-purple-700 w-full">
                        <i class="fa-solid fa-arrow-left"></i>
                        Regresar
                    </button>
                    <button type="button" onclick="sutmitForm()" class="relative inline-flex items-center justify-center px-6 py-3 rounded-full text-base bg-purple-600 text-white capitalize transition-all hover:bg-purple-700 w-full">
                        Registrarse
                    </button>
                `;
    }
}
function prevForm() {
    let fisrtRegister = document.getElementById('fisrtRegister');
    let secondRegister = document.getElementById('secondRegister');
    let switchButton = document.getElementById('switchButton');
    fisrtRegister.classList.remove('hidden');
    secondRegister.classList.add('hidden');
    switchButton.innerHTML = `
                <button type="button" onclick="nextForm()" class="relative inline-flex items-center justify-center px-6 py-3 rounded-full text-base bg-purple-600 text-white capitalize transition-all hover:bg-purple-700 w-full">
                    Continuar
                </button>
            `;
}

function sutmitForm() {
    if (validationModule.validateTow1()){
        document.getElementById('formRegister').submit();
    }
}
