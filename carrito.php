<?php 
// Si no está logeado, lo mandamos al login
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

include 'header.php'; 
include 'includes/db.php'; 

$user_id = $_SESSION['usuario_id'];

// --- LÓGICA PARA ELIMINAR DEL CARRITO ---
if(isset($_POST['eliminar_item'])) {
    $id_carrito = $_POST['id_carrito'];
    $conn->query("DELETE FROM carrito WHERE id = $id_carrito AND usuario_id = $user_id");
}
?>

    <div class="container">
        <h2 style="border-left: 5px solid var(--primary); padding-left: 15px; text-transform: uppercase;">🛒 Tu Carrito de Compras</h2>
        
        <div style="background: var(--card); border-radius: 12px; padding: 30px; margin-top: 20px; overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; color: white; text-align: left;">
                <tr style="border-bottom: 2px solid #2d3142;">
                    <th style="padding: 15px;">Componente</th>
                    <th style="padding: 15px;">Precio Unitario</th>
                    <th style="padding: 15px; text-align: center;">Cantidad</th>
                    <th style="padding: 15px; text-align: right;">Subtotal</th>
                    <th style="padding: 15px; text-align: center;">Acción</th>
                </tr>
                
                <?php
                // Consultamos la tabla carrito cruzada (JOIN) con productos
                $sql = "SELECT c.id as carrito_id, p.nombre, p.precio, p.imagen, c.cantidad 
                        FROM carrito c 
                        JOIN productos p ON c.producto_id = p.id 
                        WHERE c.usuario_id = $user_id";
                
                $resultado = $conn->query($sql);
                $total_pagar = 0;

                if($resultado->num_rows > 0) {
                    while($item = $resultado->fetch_assoc()) {
                        $subtotal = $item['precio'] * $item['cantidad'];
                        $total_pagar += $subtotal;
                        
                        echo '<tr style="border-bottom: 1px solid #2d3142;">';
                        echo '<td style="padding: 20px 15px; font-weight: bold; display: flex; align-items: center; gap: 15px;">';
                        echo '<img src="'.$item['imagen'].'" width="40" height="40" style="object-fit: contain;"> '.$item['nombre'].'</td>';
                        echo '<td style="padding: 20px 15px;">S/ '.$item['precio'].'</td>';
                        echo '<td style="padding: 20px 15px; text-align: center;">'.$item['cantidad'].'</td>';
                        echo '<td style="padding: 20px 15px; text-align: right; color: var(--primary); font-weight: bold;">S/ '.$subtotal.'</td>';
                        
                        // Botón Eliminar
                        echo '<td style="padding: 20px 15px; text-align: center;">';
                        echo '<form method="POST">';
                        echo '<input type="hidden" name="id_carrito" value="'.$item['carrito_id'].'">';
                        echo '<button type="submit" name="eliminar_item" style="background: #ff4a4a; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">X</button>';
                        echo '</form></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5" style="padding: 30px; text-align: center; color: #8892b0;">Tu carrito está vacío. ¡Ve a comprar algo de Hardware!</td></tr>';
                }
                ?>
            </table>
            
            <?php if($total_pagar > 0): ?>
            <div style="margin-top: 40px; text-align: right; padding-top: 20px; border-top: 2px solid #2d3142;">
                <h3 style="display: inline-block; margin-right: 20px; color: #8892b0;">TOTAL A PAGAR: <span style="color: var(--primary); font-size: 30px; margin-left: 10px;">S/ <?php echo number_format($total_pagar, 2); ?></span></h3>
                <br><br>
                <button class="btn" style="padding: 15px 40px; font-size: 18px;">Proceder al Pago 🚀</button>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>