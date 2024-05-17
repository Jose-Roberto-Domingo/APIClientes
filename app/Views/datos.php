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
        <button onclick="window.location.href='clientes/getClientes'">Ver todos los clientes</button>
        <ul>
            <li v-for="(cliente, index) in clientes" :key="index" >
                {{cliente.nombre}}
            </li>
        </ul>
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
