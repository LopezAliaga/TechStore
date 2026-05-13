<?php 
// 1. Iniciamos sesión si no existe (para que el carrito sepa quién eres)
if (session_status() == PHP_SESSION_NONE) { session_start(); }

include 'header.php'; 
include 'includes/db.php'; 

// --- LÓGICA PARA AGREGAR AL CARRITO (Mantenemos la funcionalidad) ---
if(isset($_POST['agregar_carrito'])) {
    if(!isset($_SESSION['usuario_id'])) {
        echo "<script>alert('¡Alto ahí! Debes iniciar sesión para poder comprar.'); window.location.href='login.php';</script>";
    } else {
        $user_id = $_SESSION['usuario_id'];
        $prod_id = $_POST['producto_id'];
        $check = $conn->query("SELECT * FROM carrito WHERE usuario_id = $user_id AND producto_id = $prod_id");
        if($check->num_rows > 0) {
            $conn->query("UPDATE carrito SET cantidad = cantidad + 1 WHERE usuario_id = $user_id AND producto_id = $prod_id");
        } else {
            $conn->query("INSERT INTO carrito (usuario_id, producto_id, cantidad) VALUES ($user_id, $prod_id, 1)");
        }
        echo "<script>alert('✅ ¡Componente añadido a tu carrito!');</script>";
    }
}
?>

    <style>
        /* Estilos específicos para la estructura del catálogo dividido */
        .layout-catalogo { 
            display: grid; 
            grid-template-columns: 250px 1fr; /* Columna izquierda de 250px, el resto para productos */
            gap: 30px; 
            align-items: start; 
        }
        .sidebar { 
            background: var(--card-bg); 
            padding: 20px; 
            border-radius: 12px; 
            border: 1px solid rgba(255,255,255,0.05); 
            position: sticky; 
            top: 100px; /* Para que el menú baje contigo al hacer scroll */
        }
        .sidebar h3 { margin-top: 0; color: var(--primary); border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px; }
        .cat-link { 
            display: block; padding: 10px; color: var(--text-muted); 
            text-decoration: none; border-radius: 5px; transition: 0.3s; margin-bottom: 5px; 
        }
        .cat-link:hover, .cat-link.active { 
            background: rgba(0,255,136,0.1); 
            color: var(--primary); 
            padding-left: 15px; 
            font-weight: bold;
        }
        
        /* Responsive: Si la pantalla es pequeña, se pone uno debajo de otro */
        @media (max-width: 768px) { 
            .layout-catalogo { grid-template-columns: 1fr; } 
            .sidebar { position: static; }
        }
    </style>

    <div class="container layout-catalogo">
        
        <aside class="sidebar">
    <h3><i class="fa-solid fa-layer-group"></i> Filtros</h3>
    <a href="productos.php" class="cat-link <?php echo !isset($_GET['categoria']) ? 'active' : ''; ?>" style="margin-bottom: 15px;">
        <i class="fa-solid fa-house"></i> Todas las categorías
    </a>

    <?php
    // 1. Jalamos todos los "Papás" (los que no tienen padre_id)
    $padres = $conn->query("SELECT * FROM categorias WHERE padre_id IS NULL");
    
    while($p = $padres->fetch_assoc()) {
        $id_p = $p['id'];
        
        // Verificamos si este papá tiene hijos
        $hijos = $conn->query("SELECT * FROM categorias WHERE padre_id = $id_p");
        
        if($hijos->num_rows > 0) {
            // Si tiene hijos, creamos el desplegable
            // El atributo 'open' lo ponemos si el usuario está viendo algo de esta categoría
            $esta_abierto = "";
            if(isset($_GET['categoria'])) {
                $actual = $_GET['categoria'];
                $check_hijo = $conn->query("SELECT id FROM categorias WHERE id = $actual AND padre_id = $id_p");
                if($check_hijo->num_rows > 0 || $_GET['categoria'] == $id_p) { $esta_abierto = "open"; }
            }

            echo "<details $esta_abierto style='margin-bottom: 10px; cursor: pointer;'>";
            echo "<summary style='color: var(--primary); font-weight: 600; padding: 10px; list-style: none; display: flex; justify-content: space-between; align-items: center;'>
                    <span><i class='fa-solid fa-chevron-right' style='font-size: 10px; margin-right: 8px;'></i> " . $p['nombre'] . "</span>
                  </summary>";
            
            echo "<div style='padding-left: 20px; margin-top: 5px; border-left: 1px solid rgba(0,255,136,0.2);'>";
            
            // Enlace para ver TODO lo del papá (opcional pero recomendado)
            echo "<a href='productos.php?categoria=$id_p' class='cat-link' style='font-size: 13px; opacity: 0.8;'>Ver Todo " . $p['nombre'] . "</a>";

            // Listamos los hijos
            while($h = $hijos->fetch_assoc()) {
                $active = (isset($_GET['categoria']) && $_GET['categoria'] == $h['id']) ? 'active' : '';
                echo "<a href='productos.php?categoria=".$h['id']."' class='cat-link $active' style='font-size: 13px;'>
                        <i class='fa-solid fa-caret-right'></i> ".$h['nombre']."
                      </a>";
            }
            echo "</div>";
            echo "</details>";
        } else {
            // Si es una categoría sola (sin hijos), la ponemos normal
            $active = (isset($_GET['categoria']) && $_GET['categoria'] == $id_p) ? 'active' : '';
            echo "<a href='productos.php?categoria=$id_p' class='cat-link $active'>".$p['nombre']."</a>";
        }
    }
    ?>
</aside>

<style>
    /* Ajuste para que el summary no tenga la flecha fea por defecto */
    summary::-webkit-details-marker { display: none; }
    details[open] summary i { transform: rotate(90deg); transition: 0.3s; }
    summary i { transition: 0.3s; }
</style>

        <main>
            <?php
            // LÓGICA DEL CEREBRO: ¿Qué quiere ver el usuario?
            $titulo = "Catálogo Completo";
            $sql = "SELECT * FROM productos"; // Por defecto muestra todo

            if(isset($_GET['buscar']) && !empty($_GET['buscar'])) {
                // Si usó el buscador de la cabecera
                $busqueda = $conn->real_escape_string($_GET['buscar']);
                $titulo = "Búsqueda: '$busqueda'";
                $sql = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%'";
                
            } elseif(isset($_GET['categoria'])) {
                // Si hizo clic en el menú lateral
                $cat_id = (int)$conn->real_escape_string($_GET['categoria']);
                // Esta lógica busca si es una categoría papá, y si lo es, trae también lo de sus hijos
                $sql = "SELECT * FROM productos WHERE categoria_id = $cat_id 
                        OR categoria_id IN (SELECT id FROM categorias WHERE padre_id = $cat_id)";
                
                // Buscamos el nombre de la categoría para ponerlo de título
                $nom_cat = $conn->query("SELECT nombre FROM categorias WHERE id = $cat_id");
                if($row_cat = $nom_cat->fetch_assoc()) {
                    $titulo = "Filtrando: " . $row_cat['nombre'];
                }
            }
            
            echo "<h2 style='margin-top: 0; display: flex; align-items: center; gap: 10px;'><i class='fa-solid fa-bolt' style='color: var(--primary);'></i> $titulo</h2>";
            ?>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); gap: 20px; margin-top: 20px;">
                <?php
                $resultado = $conn->query($sql);

                if ($resultado->num_rows > 0) {
                    while($fila = $resultado->fetch_assoc()) {
                        echo '<div class="producto-card" style="padding: 20px;">';
                        echo '<img src="'.$fila['imagen'].'" style="height: 120px; object-fit: contain; margin-bottom: 15px;">';
                        echo '<h3 style="margin: 0 0 10px 0; font-size: 15px; color: #fff;">'.$fila['nombre'].'</h3>';
                        echo '<h2 style="color: var(--primary); margin: 10px 0;">S/ '.$fila['precio'].'</h2>';
                        
                        if($fila['stock'] <= $fila['stock_minimo']) {
                            echo '<p style="color: #ff4a4a; font-size: 12px; margin-bottom: 15px;"><i class="fa-solid fa-fire"></i> ¡ALERTA! Quedan '.$fila['stock'].'</p>';
                        } else {
                            echo '<p style="color: #8892b0; font-size: 12px; margin-bottom: 15px;"><i class="fa-solid fa-check"></i> Stock: '.$fila['stock'].'</p>';
                        }
                        
                        // Botón de compra
                        echo '<form method="POST">';
                        echo '<input type="hidden" name="producto_id" value="'.$fila['id'].'">';
                        echo '<button type="submit" name="agregar_carrito" class="btn" style="width: 100%; font-size: 13px;"><i class="fa-solid fa-cart-plus"></i> Añadir</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo "<div style='grid-column: 1 / -1; padding: 50px; text-align: center; background: var(--card-bg); border-radius: 12px;'>";
                    echo "<h3 style='color: #ff4a4a;'><i class='fa-solid fa-ghost fa-2x'></i><br><br>Uy, no tenemos productos en esta categoría por ahora.</h3>";
                    echo "</div>";
                }
                ?>
            </div>
        </main>
        
    </div>
</body>
</html>