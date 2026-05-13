<?php 
include 'header.php'; 
include 'includes/db.php'; 
include 'includes/auth.php'; 

// Solo dejamos entrar a los que están logueados
soloLogueados();

$u_id = $_SESSION['usuario_id'];
$user_query = $conn->query("SELECT * FROM usuarios WHERE id = $u_id");
$u = $user_query->fetch_assoc();

// Consultar cuántos items tiene en su carrito
$carrito_count = $conn->query("SELECT SUM(cantidad) as total FROM carrito WHERE usuario_id = $u_id")->fetch_assoc();
?>

<div class="container">
    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 30px; margin-top: 50px;">
        
        <div class="producto-card" style="text-align: center; padding: 40px;">
            <div style="width: 120px; height: 120px; background: #111; border-radius: 50%; margin: 0 auto 20px; border: 2px solid var(--primary); display: flex; align-items: center; justify-content: center; box-shadow: var(--neon-glow);">
                <i class="fa-solid fa-user-astronaut" style="font-size: 60px; color: var(--primary);"></i>
            </div>
            <h2 class="neon-text" style="margin-bottom: 5px;"><?php echo strtoupper($u['nombre']); ?></h2>
            <p style="color: #8b949e; font-size: 14px; margin-bottom: 20px;"><?php echo $u['email']; ?></p>
            <span style="background: rgba(0, 255, 136, 0.1); color: var(--primary); padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: bold; border: 1px solid var(--primary);">
                RANGO: <?php echo strtoupper($u['rol']); ?>
            </span>
        </div>

        <div class="producto-card" style="padding: 40px;">
            <h3 style="margin-top: 0; border-bottom: 1px solid #333; padding-bottom: 15px;">
                <i class="fa-solid fa-gears" style="color: var(--primary);"></i> RESUMEN DE ACTIVIDAD
            </h3>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 30px;">
                <div style="background: rgba(0,0,0,0.3); padding: 20px; border-radius: 10px; border: 1px solid #222;">
                    <small style="color: #8b949e;">PRODUCTOS EN CARRITO</small>
                    <h2 style="margin: 10px 0;"><?php echo $carrito_count['total'] ?? 0; ?></h2>
                    <a href="carrito.php" style="color: var(--primary); font-size: 12px; text-decoration: none;">Ir a pagar →</a>
                </div>
                
                <div style="background: rgba(0,0,0,0.3); padding: 20px; border-radius: 10px; border: 1px solid #222;">
                    <small style="color: #8b949e;">SEGURIDAD</small>
                    <h2 style="margin: 10px 0; font-size: 18px;">ACTIVA</h2>
                    <a href="recuperar.php" style="color: #ff4a4a; font-size: 12px; text-decoration: none;">Cambiar contraseña →</a>
                </div>
            </div>

            <div style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #333;">
                <a href="logout.php" class="btn-neon" style="background: #ff4a4a; border-color: #ff4a4a; color: white; box-shadow: 0 0 10px rgba(255, 74, 74, 0.4);">
                    <i class="fa-solid fa-right-from-bracket"></i> CERRAR SESIÓN
                </a>
            </div>
        </div>

    </div>
</div>

</body>
</html>