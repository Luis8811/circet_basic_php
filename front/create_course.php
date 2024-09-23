<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Crear un Curso</h1>

        <!-- Formulario para crear un curso -->
        <form id="courseForm">
            <!-- Campo de título -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Título del curso</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escribe el título del curso" required>
            </div>

            <!-- Campo de descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción del curso</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Describe el curso" required></textarea>
            </div>

            <!-- Campo de instructor -->
            <div class="mb-3">
                <label for="instructor" class="form-label">Instructor</label>
                <input type="text" class="form-control" id="instructor" name="instructor" placeholder="Nombre del instructor" required>
            </div>

            <!-- Campo de imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen del curso</label>
                <input type="text" class="form-control" id="imagen" name="imagen">
            </div>

            <!-- Campo de precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio del curso</label>
                <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio en EUR" min="0" step="0.01" required>
            </div>

            <!-- Botón de enviar -->
            <button type="button" class="btn btn-primary" onclick="submitForm()">Crear Curso</button>
        </form>
    </div>

    <script>
        function submitForm() {
            // Datos de autenticación
            const username = 'your_username'; // Reemplaza con tu nombre de usuario
            const password = 'your_password'; // Reemplaza con tu contraseña

            // Obtener valores del formulario
            const titulo = document.getElementById('titulo').value;
            const descripcion = document.getElementById('descripcion').value;
            const instructor = document.getElementById('instructor').value;
            const imagen = document.getElementById('imagen').value;
            const precio = document.getElementById('precio').value;

            // Crear objeto FormData
            const formData = new FormData();
            formData.append('titulo', titulo);
            formData.append('descripcion', descripcion);
            formData.append('instructor', instructor);
            formData.append('imagen', imagen);
            formData.append('precio', precio);

            // Codificar en base64 "username:password"
            //const credentials = btoa(`${username}:${password}`);
            const credentials = "YTJ5YTEwYTFEcjFXWS9HckI5OS56c3NyLjRuNmV4MGN5NU1TM2NCTmU2RzBNaEhFS3dnd1luenVnYjRLOm8yeW8xMm9QR0pxLkc3Mno5dUYzOUh3OGJFWXRlM1NHYTZXa0JzbEt3bWdOMkJEVHBqcTRyVG1KVVIyNg==";
            // Hacer la petición con Fetch API
            fetch('http://localhost/api-rest/api/cursos', {
                method: 'POST',
                headers: {
                    'Authorization': 'Basic ' + credentials
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Respuesta:', data);
                alert('Curso creado con éxito');
                window.location.replace('http://localhost/api-rest/front/index.php');
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al crear el curso');
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
