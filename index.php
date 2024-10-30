<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" id="form">
        <label for="">Digite un nombre y evalue si inicia con M, O, P ó S</label> <br>
        <input id="input1" type="text" pattern="^[MOPS].*" title="Debe inciar con M, O, P o S"> <br>
        <hr>
        <label for="">Digite una direccion e identifique si existe la palabra casa o apartamento al incio de la cadena</label> <br>
        <input id="input2" type="text" pattern="^(casa|apartamento).*" title="Debe iniciar con 'casa' o 'apartamento'"> <br>
        <hr>
        <label for="">identifique al final de la cadena si el correo escrito es gmail.com</label> <br>
        <input id="input3" type="email" pattern="^[a-zA-z0-9.@]+gmail\.com$" title="Debe ser un correo de Gmail (terminar en @gmail.com)"> <br>
        <hr>
        <label for="">Escriba un texto cualquiera e identifique cuantas paabras finalizan con "as"</label> <br>
        <input id="input4" type="text"> <br>
        <span id="input4Span"></span>
        <hr>
        <label for="">Identificar si el numero de telefono es de casa iniciando con 2 o celular inciando con 7</label> <br>
        <input id="input5" type="text" pattern="^[27][0-9]{3}-[0-9]{4}" inputmode="numeric" maxlength="9" title="Debe iniciar con 2 o 7 y tener el formato 0000-0000"> <br>
        <span id="input5Span"></span>
        <hr>
        <label for="">Identificar la compañia de celular suponiendo que 79 ó 72 es tigo , 77 ó 75 es movistar y 71 ó 73 es digicel</label> <br>
        <input id="input6" type="text" pattern="^(79|72|77|75|71|73)[0-9]{2}-[0-9]{4}" inputmode="numeric" maxlength="9" title="Debe iniciar con 79, 72 (Tigo), 77, 75 (Movistar), o 71, 73 (Digicel), seguido de 6 dígitos"> <br>
        <span id="input6Span"></span>
        <hr>
        <label for="">Identificar el patron de genero digitado en mayusculas o minusculas, masculino =1 , femenino=2</label> <br>
        <input id="input7" type="text" pattern="^(masculino|femenino|1|2)$" title="Escriba 'masculino', 'femenino', '1' o '2'"> <br>
        <hr>
        <input type="submit" value="Evaluar">
    </form>

    <script>
        document.getElementById("input1").addEventListener("invalid", validacion, true)
        document.getElementById("input1").addEventListener("input", controlar, true)

        document.getElementById("input2").addEventListener("invalid", validacion, true)
        document.getElementById("input2").addEventListener("input", controlar, true)

        document.getElementById("input3").addEventListener("invalid", validacion, true)
        document.getElementById("input3").addEventListener("input", controlar, true)

        document.getElementById("input4").addEventListener("invalid", validacion, true)
        document.getElementById("input4").addEventListener("input", contarPalabras, true)

        document.getElementById("input5").addEventListener("input", controlar, true)

        document.getElementById("input6").addEventListener("input", controlar, true)

        document.getElementById("input7").addEventListener("input", controlar, true)
        document.getElementById("input7").addEventListener("invalid", validacion, true)


        function validacion(e) {
            let element = e.target
            element.classList.add("error")

        }

        function controlar(e) {
            let element = e.target
            if (element.validity.valid) {
                element.classList.remove("error")
                return
            } else {
                element.classList.add("error")
            }
        }

        // funcion para contar las palabras que terminan con 'as'
        function contarPalabras(e) {
            const texto = e.target.value;
            const palabras = texto.match(/\b\w*as\b/gi);

            const count = palabras ? palabras.length : 0;

            document.getElementById('input4Span').textContent = `Palabras que terminan en "as": ${count}`;
        }

        // Forma para validar los numeros de telefono
        document.getElementById("input5").addEventListener("invalid", validacion, true)
        document.getElementById("input5").addEventListener("input", validarTelefono, true)

        function validarTelefono(e) {
            let telefono = e.target.value;

            if (telefono.startsWith('2')) {
                document.getElementById('input5Span').innerText = "El número de teléfono es de casa";
            } else if (telefono.startsWith('7')) {
                document.getElementById('input5Span').innerText = "El número de teléfono es de celular";
            }
        }


        document.getElementById("input6").addEventListener("invalid", validacion, true)
        document.getElementById("input6").addEventListener("input", validarCompania, true)

        function validarCompania(e) {
            let element = e.target.value;
            if (element.startsWith(79) || element.startsWith(72)) {
                document.getElementById('input6Span').innerText = "La compañia de celular es Tigo";
            } else if (element.startsWith(77) || element.startsWith(75)) {
                document.getElementById('input6Span').innerText = "La compañia de celular es Movistar";
            } else if (element.startsWith(71) || element.startsWith(73)) {
                document.getElementById('input6Span').innerText = "La compañia de celular es Digicel";
            }

        }
    </script>
</body>

</html>