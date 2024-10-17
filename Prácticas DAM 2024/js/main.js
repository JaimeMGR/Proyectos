document.addEventListener("click", (e) => {
    
    // Si se hace clic en un elemento con la clase "generate"
    if (e.target.classList[1] === "generate") {
        // Asignar el valor del atributo 'dni' del elemento clicado al campo 'generateDni'
        document.getElementById("generateDni").value = e.target.dataset.dni;
        
        // Enviar el formulario 'formGenerate'
        document.getElementById("formGenerate").submit();
        
        // Mostrar el loader mientras se procesa la solicitud
        loader = document.getElementById("loader");
        loader.classList.remove("none");
        loader.classList.add("loaderSvg");
        
        // Escuchar cambios en el select de números
        document.querySelector('.number-select').addEventListener('change', function() {
            document.querySelector('#page').value = 1; // Restablecer el número de página a 1
            document.querySelector('#form_page').submit(); // Enviar el formulario
        });
    }

    // Si se hace clic en el checkbox de seleccionar todos
    if (e.target.id === "checkboxAll") {
        const arrayDNI = [];
        const $checkboxs = document.querySelectorAll(".checkbox");
        for (let index = 0; index < $checkboxs.length; index++) {
            $checkboxs[index].checked = e.target.checked;
            arrayDNI.push($checkboxs[index].id.split("_")[1]);
        }
        if (e.target.checked) {
            document.getElementById("generateDni").value = arrayDNI.toString();
        } else {
            document.getElementById("generateDni").value = "";
        }
    }

    // Si se hace clic en un checkbox individual
    if (e.target.classList[0] === "checkbox") {
        const dni = e.target.id.split("_")[1];
        let arrayDNI;
        if (document.getElementById("generateDni").value == "") {
            arrayDNI = []
        } else {
            arrayDNI = document.getElementById("generateDni").value.split(",")
        }

        if (!e.target.checked) {
            const arrayNewDni = arrayDNI.filter((elem) => { return dni !== elem })
            document.getElementById("generateDni").value = arrayNewDni.toString()
            document.getElementById("generateDni").value = arrayNewDni.toString()
        } else {
            arrayDNI.push(dni);
            document.getElementById("generateDni").value = arrayDNI.toString();
            document.getElementById("generateDni").value = arrayDNI.toString();
        }
    }

    // Si se hace clic en el botón de generar selección
    if (e.target.id == "generateSelect") {
        const arrayDNI = []
        const $checkboxs = document.querySelectorAll(".checkbox");
        for (let index = 0; index < $checkboxs.length; index++) {
            if ($checkboxs[index].checked) {
                arrayDNI.push($checkboxs[index].id.split("_")[1])
            }

        }
        if (arrayDNI.length > 0) {
            document.getElementById("generateDni").value = arrayDNI.toString();
            document.getElementById("formGenerate").submit();
            loader = document.getElementById("loader");
            loader.classList.remove("none");
            loader.classList.add("loaderSvg");
        }
    }

    // Si se hace clic en los botones de filtro
    if (e.target.id == "btnFilter" || e.target.id == "btnfilter2") {
        document.getElementById("formFilter").submit()
    }

    // Si se hace clic en el botón de descargar selección
    if (e.target.id == "dowloadSelect") {
        if (document.querySelectorAll(".icon_pdf").length > 0) {
            document.getElementById("formDowload").submit();
        }
    }

    // Si se hace clic en el botón de actualizar
    if (e.target.id == "Update") {
        document.getElementById("updateFilter").value = "1";
        document.getElementById("formFilter").submit();
        loader.classList.remove("none");
        loader.classList.add("loaderSvg");
    }

    if (e.target.id == "btnenviar") {
        e.preventDefault();
        const fileInputs = document.querySelectorAll('input[type="file"]');
        const errorMessages = [];
    
        for (let index = 0; index < fileInputs.length; index++) {
            const input = fileInputs[index];
            if (input.files.length > 0) {
                const fileName = input.files[0].name;

                if (!fileName.endsWith('.xlsx')) {
                    errorMessages.push('El archivo ' + fileName + ' no es un archivo xlsx.');
                } else {
                    const formData = new FormData();
                    formData.append('file', input.files[0]);
                }      
            }
        }

        if(errorMessages.length>0){
                //muestra los errores
        }else {
           document.getElementById("formularioarchivos").submit(currentYear, currentMonth, socidInput, dniInput);
        }
            
    }

    if (e.target.id== "btncerrar") {
        modal.close();
        console.log("modal cerrado");
    }

    if (e.target.id== "btnCancelar") {
        modal.close();
        console.log("modal cerrado");
    }
     
     if(e.target.classList.contains("butAction")){
    // Abre la ventana modal
    modal.showModal();
    // Obtiene el valor del atributo data-dni para pasarlo a la ventana modal si es necesario
    const dniInput = document.getElementById('dniInput');
    const socidInput = e.target.getAttribute('data-rowid');
    
    dniInput.value = e.target.dataset.dni;
    socidInput.value = e.target.dataset.socid;
    
     // Obtiene la fecha actual
     var currentDate = new Date();
    
     // Obtiene el año actual
     var currentYear = currentDate.getFullYear();
     
     // Obtiene el mes actual (se agrega +1 porque los meses van de 0 a 11)
     var currentMonth = currentDate.getMonth() + 1;
     
     // Establece los valores en los campos de entrada ocultos
     document.getElementById("yearInput").value = currentYear;
     document.getElementById("monthInput").value = currentMonth;
     document.getElementById('socidInput').value = socidInput;

    // Puedes hacer algo con el valor de dni aquí si es necesario
    } 

})


document.addEventListener("change", (e) => {

    // Si se cambia la fecha de fin
    if (e.target.id == "inputDateEnd") {
        document.getElementById("dateEnd").value = e.target.value;
    }
    // Si se cambia la fecha de inicio
    if (e.target.id == "inputDateStart") {
        document.getElementById("dateStart").value = e.target.value;
    }
    // Si se cambia el select de número de página
    if (e.target.id == "select_page") {
        document.getElementById("NumberPage").value = e.target.value;
        document.getElementById("formFilter");
    }
    // Si se cambia la opción de validación
    if (e.target.id == "validate") {
        document.getElementById("generateType").value = e.target.value;
    }
    // Si se cambia la opción de borrador
    if (e.target.id == "borrador") {
        document.getElementById("generateType").value = e.target.value;
    }
    // Si se cambia la opción de no guardar
    if (e.target.id == "NoGuardar") {
        document.getElementById("generateType").value = e.target.value;
    }
    // Si se cambia la fecha de inicio (segunda instancia)
    if (e.target.id == "inputDateStart") {
        const dateCell = document.getElementById("dateCell");
        dateCell.textContent = this.value;
    }
})

document.addEventListener("DOMContentLoaded", () => {
    // Selector para filtrar por nombre de cliente
    new SlimSelect({
        select: '#selectCliente',
        events: {
            afterChange: (e) => {
                if (e.length === 0) {
                    document.getElementById("filterCliente").value = "";
                } else {
                    const arrayNames = [];
                    for (let index = 0; index < e.length; index++) {
                        arrayNames.push(e[index].value)
                    }
                    document.getElementById("filterCliente").value = arrayNames.toString();
                }
            },
            searchFilter: (option, search) => {
                // Filtrar sin distinguir acentos ni mayúsculas
                return option.text.toLowerCase()
                    .replace(new RegExp(/[àáâãäå]/g), "a")
                    .replace(new RegExp(/[èéêë]/g), "e")
                    .replace(new RegExp(/[ìíîï]/g), "i")
                    .replace(new RegExp(/[òóôõö]/g), "o")
                    .replace(new RegExp(/[ùúûü]/g), "u")
                    .indexOf(
                        search.toLowerCase()
                        .replace(new RegExp(/[àáâãäå]/g), "a")
                        .replace(new RegExp(/[èéêë]/g), "e")
                        .replace(new RegExp(/[ìíîï]/g), "i")
                        .replace(new RegExp(/[òóôõö]/g), "o")
                        .replace(new RegExp(/[ùúûü]/g), "u")
                    ) !== -1
            }
        },
        settings: {
            searchText: 'No existen coincidencias',
            searchPlaceholder: 'Buscar',
            placeholderText: 'Seleccione usuario(s)',
        }
    })



    // Selector para filtrar por DNI
    new SlimSelect({
        select: '#selectDNI',
        events: {
            afterChange: (e) => {
                if (e.length === 0) {
                    document.getElementById("filterDni").value = "";
                } else {
                    const arrayNames = [];
                    for (let index = 0; index < e.length; index++) {
                        arrayNames.push(e[index].value)
                    }
                    document.getElementById("filterDni").value = arrayNames.toString();
                }
            },
            searchFilter: (option, search) => {
                // Filtrar sin distinguir acentos ni mayúsculas
                return option.text.toLowerCase()
                    .replace(new RegExp(/[àáâãäå]/g), "a")
                    .replace(new RegExp(/[èéêë]/g), "e")
                    .replace(new RegExp(/[ìíîï]/g), "i")
                    .replace(new RegExp(/[òóôõö]/g), "o")
                    .replace(new RegExp(/[ùúûü]/g), "u")
                    .indexOf(
                        search.toLowerCase()
                        .replace(new RegExp(/[àáâãäå]/g), "a")
                        .replace(new RegExp(/[èéêë]/g), "e")
                        .replace(new RegExp(/[ìíîï]/g), "i")
                        .replace(new RegExp(/[òóôõö]/g), "o")
                        .replace(new RegExp(/[ùúûü]/g), "u")
                    ) !== -1
            }
        },
        settings: {
            searchText: 'No existen coincidencias',
            searchPlaceholder: 'Buscar',
            placeholderText: 'Seleccione DNI(s)',
        }
    })
    document.getElementById("filterCliente").value = "";
    document.getElementById("filterDni").value = "";


    //Asignar un dni al formulario que se va a enviar
    const generarButtons = document.querySelectorAll('.botongenerar .butAction');
  }); 