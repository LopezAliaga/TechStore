<?php
include 'includes/db.php';
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$user_id = $_SESSION['usuario_id'];

// 1. Buscamos qué tiene en el carrito
$items = $conn->query("SELECT producto_id, cantidad FROM carrito WHERE usuario_id = $user_id");

if($items->num_rows > 0) {
    while($row = $items->fetch_assoc()) {
        $p_id = $row['producto_id'];
        $cant = $row['cantidad'];
        
        // 2. RESTAMOS EL STOCK (Lógica de inventario real)
        $conn->query("UPDATE productos SET stock = stock - $cant WHERE id = $p_id");
    }
    
    // 3. Vaciamos el carrito
    $conn->query("DELETE FROM carrito WHERE usuario_id = $user_id");
    
    echo "<script>alert('🚀 ¡Compra Exitosa! El stock ha sido actualizado en el servidor Debian.'); window.location.href='index.php';</script>";
} else {
    header("Location: index.php");
}
?>