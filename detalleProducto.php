<?php
include 'header.php';
include 'includes/db.php';

if(!isset($_GET['id'])){
    die("Producto no encontrado");
}

$id = (int)$_GET['id'];

$sql = "
SELECT p.*, c.nombre as categoria
FROM productos p
LEFT JOIN categorias c
ON p.categoria_id = c.id
WHERE p.id = $id
";

$resultado = $conn->query($sql);

if($resultado->num_rows == 0){
    die("Producto no encontrado");
}

$producto = $resultado->fetch_assoc();
?>

<div class="container">

<div style="
display:grid;
grid-template-columns:1fr 1fr;
gap:40px;
align-items:start;">

<div>

<?php
$imagen = trim($producto['imagen']);

if(filter_var($imagen,FILTER_VALIDATE_URL)){
    $ruta = $imagen;
}else{
    $imagen = str_replace("img/","",$imagen);
    $ruta = "img/productos/".$imagen;
}
?>

<img src="<?php echo $ruta; ?>"
     style="
     width:100%;
     max-height:500px;
     object-fit:contain;
     background:#fff;
     border-radius:10px;
     padding:20px;">

</div>

<div>

<h1><?php echo $producto['nombre']; ?></h1>

<p style="color:var(--primary); font-size:18px;">
Categoría:
<?php echo $producto['categoria']; ?>
</p>

<h2 style="color:var(--primary);">
S/ <?php echo $producto['precio']; ?>
</h2>

<p>
Stock disponible:
<strong><?php echo $producto['stock']; ?></strong>
</p>

<hr>

<h3>Descripción</h3>

<p style="line-height:1.8;">
<?php echo $producto['descripcion']; ?>
</p>

<hr>

<h3>Calificación</h3>

<p style="font-size:25px;">
⭐⭐⭐⭐⭐
</p>

<form method="POST" action="productos.php">
<input type="hidden"
       name="producto_id"
       value="<?php echo $producto['id']; ?>">

<button
type="submit"
name="agregar_carrito"
class="btn-neon">

<i class="fa-solid fa-cart-plus"></i>
Añadir al carrito

</button>
</form>

</div>

</div>

<br><br>

<h2>Opiniones de clientes</h2>

<?php

$resenas = $conn->query("
SELECT r.*, u.nombre
FROM resenas r
INNER JOIN usuarios u
ON r.usuario_id=u.id
WHERE producto_id=$id
ORDER BY fecha DESC
");

if($resenas->num_rows>0){

while($r=$resenas->fetch_assoc()){

echo '
<div class="producto-card"
style="margin-bottom:15px;">

<strong>'.$r['nombre'].'</strong>

<br>

'.str_repeat("⭐",$r['estrellas']).'

<p>'.$r['comentario'].'</p>

<small>'.$r['fecha'].'</small>

</div>';
}

}else{

echo '
<div class="producto-card">
Aún no existen opiniones para este producto.
</div>';

}
?>

<?php if(isset($_SESSION['usuario_id'])): ?>

<br>

<h3>Deja tu reseña</h3>

<form method="POST" action="guardar_resena.php">

<input type="hidden"
       name="producto_id"
       value="<?php echo $id; ?>">

<label>Calificación</label>

<select name="estrellas"
        class="input-cyber">

<option value="5">⭐⭐⭐⭐⭐</option>
<option value="4">⭐⭐⭐⭐</option>
<option value="3">⭐⭐⭐</option>
<option value="2">⭐⭐</option>
<option value="1">⭐</option>

</select>

<br><br>

<textarea
name="comentario"
rows="5"
class="input-cyber"
style="width:100%;"
required></textarea>

<br><br>

<button
type="submit"
class="btn-neon">

Enviar reseña

</button>

</form>

<?php endif; ?>

</div>

</body>
</html>
