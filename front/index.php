<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Listado de Cursos</h1>
        <a href="http://localhost/api-rest/front/create_course.php"><h3 class="mb-4">Agregar curso</h3></a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Instructor</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="coursesTable">
            </tbody>
        </table>
    </div>

    <!-- Modal para actualizar curso -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Actualizar Curso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateForm">
                        <input type="hidden" id="cursoIdUpd" name="id">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="instructor" class="form-label">Instructor</label>
                            <input type="text" class="form-control" id="instructor" name="instructor" required>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Curso</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loadCourses() {
            const username = 'your_username';
            const password = 'your_password';
            const credentials = "YTJ5YTEwYTFEcjFXWS9HckI5OS56c3NyLjRuNmV4MGN5NU1TM2NCTmU2RzBNaEhFS3dnd1luenVnYjRLOm8yeW8xMm9QR0pxLkc3Mno5dUYzOUh3OGJFWXRlM1NHYTZXa0JzbEt3bWdOMkJEVHBqcTRyVG1KVVIyNg==";
            fetch('http://localhost/api-rest/api/cursos', {
                method: 'GET',
                headers: {
                    'Authorization': 'Basic ' + credentials
                }
            })
            .then(response => response.json())
            .then(data => {
                let details = data.detalle;
                const tableBody = document.getElementById('coursesTable');
                tableBody.innerHTML = '';
                details.forEach(curso => {
                    const row = `
                        <tr>
                            <td>${curso.id}</td>
                            <td>${curso.titulo}</td>
                            <td>${curso.descripcion}</td>
                            <td>${curso.instructor}</td>
                            <td>${curso.precio}</td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm" onclick="deleteCourse(${curso.id})">Eliminar</a>
                                <a href="#" class="btn btn-success btn-sm" onclick="updateCourse(${curso.id})">Actualizar</a>
                            </td>
                        </tr>
                    `;
                    tableBody.innerHTML += row;
                });
            })
            .catch(error => {
                console.error('Error al cargar los cursos:', error);
                alert('Error al cargar los cursos.');
            });
        }

        function deleteCourse(id) {
            if (confirm('¿Estás seguro de que deseas eliminar este curso?')) {
                fetch(`http://localhost/api-rest/api/cursos/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Authorization': 'Basic ' + 'YTJ5YTEwYTFEcjFXWS9HckI5OS56c3NyLjRuNmV4MGN5NU1TM2NCTmU2RzBNaEhFS3dnd1luenVnYjRLOm8yeW8xMm9QR0pxLkc3Mno5dUYzOUh3OGJFWXRlM1NHYTZXa0JzbEt3bWdOMkJEVHBqcTRyVG1KVVIyNg=='
                    }
                })
                .then(response => {
                    if (response.ok) {
                        alert('Curso eliminado exitosamente');
                        loadCourses();
                    } else {
                        alert('Error al eliminar el curso');
                    }
                })
                .catch(error => {
                    console.error('Error al eliminar el curso:', error);
                    alert('Error al eliminar el curso');
                });
            }
        }

        function updateCourse(id) {
            // Obtener los datos del curso para llenar el modal
            fetch(`http://localhost/api-rest/api/cursos/${id}`, {
                method: 'GET',
                headers: {
                    'Authorization': 'Basic ' + 'YTJ5YTEwYTFEcjFXWS9HckI5OS56c3NyLjRuNmV4MGN5NU1TM2NCTmU2RzBNaEhFS3dnd1luenVnYjRLOm8yeW8xMm9QR0pxLkc3Mno5dUYzOUh3OGJFWXRlM1NHYTZXa0JzbEt3bWdOMkJEVHBqcTRyVG1KVVIyNg=='
                }
            })
            .then(response => response.json())
            .then(curso => {
                let details = curso.detalle;
                console.log(details);
                console.log(curso);
                // Llenar el formulario del modal
                document.getElementById('cursoIdUpd').value = details[0].id;
                document.getElementById('titulo').value = details[0].titulo;
                document.getElementById('descripcion').value = details[0].descripcion;
                document.getElementById('instructor').value = details[0].instructor;
                document.getElementById('precio').value = details[0].precio;

                // Mostrar el modal
                const modal = new bootstrap.Modal(document.getElementById('updateModal'));
                modal.show();
            })
            .catch(error => {
                console.error('Error al cargar el curso:', error);
                alert('Error al cargar el curso.');
            });
        }

        // Manejar el envío del formulario de actualización
        document.getElementById('updateForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const id = document.getElementById('cursoIdUpd').value;
            const titulo = document.getElementById('titulo').value;
            const descripcion = document.getElementById('descripcion').value;
            const instructor = document.getElementById('instructor').value;
            const precio = document.getElementById('precio').value;
            console.log("JSON enviado para actualizar: ");
            const imagen = "https://i.udemycdn.com/course/480x270/882422_0549_9.jpg";
            const myJson = JSON.stringify({id: parseInt(id, 10), titulo, descripcion, instructor, precio: parseInt(precio, 10), imagen});
            console.log(myJson);
            console.log("fin");
            fetch(`http://localhost/api-rest/api/cursos/${id}`, {
                method: 'PUT',
                headers: {
                    'Authorization': 'Basic ' + 'YTJ5YTEwYTFEcjFXWS9HckI5OS56c3NyLjRuNmV4MGN5NU1TM2NCTmU2RzBNaEhFS3dnd1luenVnYjRLOm8yeW8xMm9QR0pxLkc3Mno5dUYzOUh3OGJFWXRlM1NHYTZXa0JzbEt3bWdOMkJEVHBqcTRyVG1KVVIyNg==',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({id: parseInt(id, 10), titulo, descripcion, instructor, precio: parseInt(precio, 10), imagen})
            })
            .then(response => {
                if (response.ok) {
                    console.log(response);
                    alert('Curso actualizado exitosamente');
                    loadCourses(); // Recargar los cursos después de actualizar
                    const modal = bootstrap.Modal.getInstance(document.getElementById('updateModal'));
                    modal.hide(); // Cerrar el modal
                } else {
                    alert('Error al actualizar el curso');
                }
            })
            .catch(error => {
                console.error('Error al actualizar el curso:', error);
                alert('Error al actualizar el curso');
            });
        });

        // Cargar los cursos al cargar la página
        window.onload = loadCourses;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
