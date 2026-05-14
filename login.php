<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'includes/db.php';

if (isset($_POST['ingresar'])) {

    $email = $conn->real_escape_string($_POST['email']);
    $pass = $_POST['password'];

    $res = $conn->query("SELECT * FROM usuarios 
                         WHERE email='$email' 
                         AND password='$pass'");

    if ($res->num_rows > 0) {

        $u = $res->fetch_assoc();

        $_SESSION['usuario_id'] = $u['id'];
        $_SESSION['nombre'] = $u['nombre'];
        $_SESSION['rol'] = $u['rol'];

        session_write_close();

        if($u['rol']=="administrador"){
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }

        exit();

    } else {
        echo "<script>alert('Datos incorrectos, acceso denegado.');</script>";
    }
}

include 'header.php';
?>

<div class="container" style="display: flex; justify-content: center; align-items: center; min-height: 80vh;">
    <div class="producto-card" style="width: 100%; max-width: 400px; padding: 40px;">
        <h2 class="neon-text" style="text-align: center; margin-bottom: 30px;">ACCESO AL SISTEMA</h2>
        
        <form method="POST">
            <input type="email" name="email" placeholder="Correo Electrónico" required class="input-cyber" style="width:100%; padding:12px; margin-bottom:20px;">
            <input type="password" name="password" placeholder="Contraseña" required class="input-cyber" style="width:100%; padding:12px; margin-bottom:10px;">
            
            <div style="text-align: right; margin-bottom: 25px;">
                <a href="recuperar.php" style="color: #8b949e; text-decoration: none; font-size: 12px; transition: 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='#8b949e'">
                    ¿Olvidaste tu contraseña?
                </a>
            </div>

            <button type="submit" name="ingresar" class="btn-neon" style="width:100%;">ENTRAR AL SETUP</button>
        </form>

        <p style="text-align: center; margin-top: 30px; font-size: 13px; color: #8b949e;">
            ¿Eres nuevo en el equipo? <br>
            <a href="registro.php" style="color: var(--primary); text-decoration: none; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">
                Crea tu cuenta aquí
            </a>
        </p>
    </div>
</div>
</body>
</html>
