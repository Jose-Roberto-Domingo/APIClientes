<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de los clientes</title>
    <!-- Cargar Vue.js desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
</head>
<body>
    <div id="app" class="container">
        <h1>Clientes</h1>

        <form action="<?=base_url('clientes/insertCliente'); ?>" method="POST">
            <label for="nombre">Nombre del cliente:</label>
            <input type="text" id="nombre" name="nombre" required><br>
            <label for="telefono">Teléfono:</label>
            <input type="number" minlength="8" maxlength="12" id="telefono" name="telefono" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="preferencias">Preferencias:</label>
            <input type="text" id="preferencias" name="preferencias"><br>
            <label for="historialReservas">Historial de Reservas:</label>
            <input type="text" id="historialReservas" name="historialReservas"><br>
            <button type="submit">Añadir cliente</button>
        </form>

        <button onclick="window.location.href='clientes/getClientes'">Ver todos los clientes</button>
    </div>
    
    <script>
        new Vue({
            el: '#app',
            data: {
                clientes: []
            },
            mounted(){
                this.fetchData();
            },
            methods: {
                async fetchData(){
                    try{
                        const response = await fetch('https://localhost:8001/clientes/getClientes');
                        const data = await response.json();
                        this.clientes = data.datos;
                    } catch (error){
                        console.error('Error al recuperar los datos:',error);
                    }
                }
            }
        });
    </script>
</body>
</html>
