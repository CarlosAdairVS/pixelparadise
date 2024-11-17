<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php
session_start();
include_once 'conection.php';
$limit =10;
$count=0;
$buscar = $_POST["buscar"];
$stmt = $mdb->prepare("SELECT * FROM users WHERE email LIKE :buscar");
$stmt->execute(['buscar' => '%' . strtolower($buscar) . '%']);
$resultados = $stmt->fetchAll(); // Corregir aquí, cambiar $resultado a $resultados
$numero = $stmt->rowCount();
?>
<h5>Resultados encontrados (<?php echo $numero; ?>):</h5>
<?php
if (count($resultados) > 0) {
    echo "<ul>";
    foreach ($resultados as $usuario) {
    	if($count < $limit) {
    	?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($usuario['email']); ?></h5>
                <!-- Agrega más detalles si lo deseas -->
                <!-- Ejemplo: <p class="card-text"><?php echo htmlspecialchars($usuario['nombre']); ?></p> -->
                <button class="btn btn-danger" onclick="inhabilitarUsuario(<?php echo $usuario['user_id']; ?>)">Inhabilitar</button>
            </div>
        </div>
        <?php
            $count++;
        } else {
            break; // Sale del bucle una vez alcanzado el límite
        }
    }

} else {
    echo "No se encontraron resultados.";
}
?>