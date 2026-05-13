<?php 
if (session_status() == PHP_SESSION_NONE) { session_start(); } 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore | Premium Hardware</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root { 
            --primary: #00ff88; 
            --neon-glow: 0 0 10px rgba(0, 255, 136, 0.8), 0 0 20px rgba(0, 255, 136, 0.4);
            --bg-dark: #05070a; 
            --card-bg: rgba(22, 27, 34, 0.9);
            --text-muted: #8b949e;
        }

        body { 
            margin: 0; 
            font-family: 'Poppins', sans-serif; 
            background: var(--bg-dark); 
            color: #fff;
            background-image: radial-gradient(circle at top, #111827 0%, #05070a 100%);
            background-attachment: fixed;
        }

        /* HEADER GLASSMORPHISM */
        header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            padding: 15px 5%; 
            background: rgba(0, 0, 0, 0.85); 
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(0, 255, 136, 0.2); 
            position: sticky; 
            top: 0; 
            z-index: 1000;
        }

        .logo { font-size: 26px; font-weight: 800; color: #fff; text-decoration: none; letter-spacing: 1px; }
        .logo span { color: var(--primary); text-shadow: var(--neon-glow); }

        /* BUSCADOR NEÓN */
        .buscador { 
            display: flex; 
            background: rgba(255,255,255,0.05); 
            border-radius: 50px; 
            border: 1px solid #333; 
            padding: 5px 15px;
            transition: 0.3s;
        }
        .buscador:focus-within { border-color: var(--primary); box-shadow: var(--neon-glow); }
        .buscador input { background: transparent; border: none; color: white; padding: 8px; outline: none; width: 200px; }
        .buscador button { background: transparent; border: none; color: var(--primary); cursor: pointer; }

        /* NAVEGACIÓN */
        nav { display: flex; align-items: center; gap: 20px; }
        nav a { color: var(--text-muted); text-decoration: none; font-size: 14px; font-weight: 600; transition: 0.3s; }
        nav a:hover { color: var(--primary); text-shadow: var(--neon-glow); }

        /* ESTILOS DE TEXTO Y BOTONES NEÓN */
        .neon-text { color: var(--primary); text-shadow: var(--neon-glow); font-weight: 800; }
        
        .btn-neon { 
            background: transparent; 
            color: var(--primary); 
            border: 2px solid var(--primary);
            padding: 10px 25px; 
            border-radius: 50px; 
            font-weight: bold; 
            cursor: pointer;
            text-decoration: none; 
            box-shadow: var(--neon-glow); 
            transition: 0.3s;
            display: inline-block;
            text-transform: uppercase;
            font-size: 12px;
        }
        .btn-neon:hover { 
            background: var(--primary); 
            color: #000; 
            box-shadow: 0 0 30px var(--primary); 
            transform: translateY(-2px); 
        }

        .btn-update {
            background: rgba(0, 255, 136, 0.1); color: var(--primary); border: 1px solid var(--primary);
            padding: 5px 10px; border-radius: 5px; cursor: pointer; transition: 0.3s;
        }

        .input-cyber {
            background: #000 !important; border: 1px solid #333 !important; color: var(--primary) !important;
            padding: 8px; border-radius: 5px; outline: none; transition: 0.3s;
        }

        .container { max-width: 1200px; margin: 40px auto; padding: 0 20px; }
        
        .producto-card { 
            background: var(--card-bg); 
            padding: 25px; 
            border-radius: 15px; 
            border: 1px solid rgba(255,255,255,0.05); 
            backdrop-filter: blur(10px);
            transition: 0.4s;
        }
    </style>
</head>
<body>
    <header>
        <a href="index.php" class="logo">TECH<span>STORE</span></a>

        <form class="buscador" action="productos.php" method="GET">
            <input type="text" name="buscar" placeholder="Buscar hardware...">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <nav>
            <a href="productos.php">TIENDA</a>
            <a href="carrito.php"><i class="fa-solid fa-cart-shopping"></i></a>
            
            <?php if(isset($_SESSION['usuario_id'])): ?>
                <?php if($_SESSION['rol'] === 'administrador'): ?>
                    <a href="admin.php" title="Panel Admin" style="color: #58a6ff;">
                        <i class="fa-solid fa-user-shield"></i>
                    </a>
                <?php endif; ?>

                <a href="perfil.php" class="neon-text">
                    <i class="fa-solid fa-circle-user"></i> <?php echo strtoupper($_SESSION['nombre']); ?>
                </a>
                
                <a href="logout.php" style="color: #ff4a4a;" title="Cerrar Sesión">
                    <i class="fa-solid fa-power-off"></i>
                </a>
            <?php else: ?>
                <a href="login.php" class="btn-neon">INGRESAR</a>
            <?php endif; ?>
        </nav>
    </header>