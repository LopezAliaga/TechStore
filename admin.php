<?php 
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'administrador') { header("Location: index.php"); exit(); }
include 'header.php'; include 'includes/db.php'; 

// --- LÓGICA DE SISTEMAS OPERATIVOS ---
$cpu_load = sys_getloadavg();
$uptime = shell_exec("uptime -p");

// --- LÓGICA DE ACCIONES ---
if(isset($_GET['eliminar'])) {
    $id_e = (int)$_GET['eliminar'];
    $conn->query("DELETE FROM productos WHERE id = $id_e");
    header("Location: admin.php");
}
if(isset($_POST['update_stock'])) {
    $id_p = $_POST['id_producto'];
    $n_stock = (int)$_POST['nuevo_stock'];
    $conn->query("UPDATE productos SET stock = $n_stock WHERE id = $id_p");
}
if(isset($_POST['guardar_imagen'])) {
    $id_p = $_POST['id_producto'];
    $ruta = $_POST['nueva_ruta'];
    $conn->query("UPDATE productos SET imagen = '$ruta' WHERE id = $id_p");
}
?>

<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2 class="neon-text"><i class="fa-solid fa-terminal"></i> PANEL DE CONTROL SUPERIOR</h2>
        <div style="display: flex; gap: 15px;">
            <a href="gestionar_categorias.php" class="btn-neon" style="font-size: 12px; border-color: #58a6ff; color: #58a6ff; box-shadow: none;"><i class="fa-solid fa-tags"></i> CATEGORÍAS</a>
            <a href="nuevo_producto.php" class="btn-neon" style="font-size: 12px;"><i class="fa-solid fa-plus"></i> NUEVO PRODUCTO</a>
        </div>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; margin-bottom: 30px;">
        <div class="producto-card" style="padding: 15px; border-left: 4px solid var(--primary);">
            <small style="color: #8b949e;">CPU LOAD</small>
            <h3 style="margin: 5px 0;"><?php echo $cpu_load[0]; ?>%</h3>
        </div>
        <div class="producto-card" style="padding: 15px; border-left: 4px solid #ff4a4a;">
            <small style="color: #8b949e;">UPTIME</small>
            <h3 style="margin: 5px 0; font-size: 14px;"><?php echo $uptime; ?></h3>
        </div>
    </div>

    <div class="producto-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin:0;"><i class="fa-solid fa-boxes-stacked"></i> Gestión de Inventario</h3>
            <form method="GET">
                <select name="f_cat" onchange="this.form.submit()" class="input-cyber">
                    <option value="">Filtrar Categoría...</option>
                    <?php $c_l = $conn->query("SELECT * FROM categorias WHERE padre_id IS NOT NULL");
                    while($cl = $c_l->fetch_assoc()){ 
                        $sel = (isset($_GET['f_cat']) && $_GET['f_cat'] == $cl['id']) ? "selected" : "";
                        echo "<option value='".$cl['id']."' $sel>".$cl['nombre']."</option>"; 
                    } ?>
                </select>
            </form>
        </div>
        <table style="width: 100%; border-collapse: collapse;">
            <tr style="text-align: left; border-bottom: 2px solid #333; color: var(--primary);">
                <th style="padding: 12px;">Producto</th>
                <th style="padding: 12px;">Stock</th>
                <th style="padding: 12px;">Imagen</th>
                <th style="padding: 12px; text-align: center;">Acción</th>
            </tr>
            <?php 
            $w = (isset($_GET['f_cat']) && $_GET['f_cat']!="") ? "WHERE categoria_id=".$_GET['f_cat'] : "";
            $res = $conn->query("SELECT * FROM productos $w ORDER BY id DESC");
            while($p = $res->fetch_assoc()){
                echo "<tr style='border-bottom: 1px solid #222;'>";
                echo "<td style='padding: 12px;'>".$p['nombre']."</td>";
                echo "<td style='padding: 12px;'>
                        <form method='POST' style='display:flex; gap:5px; align-items:center;'>
                            <input type='hidden' name='id_producto' value='".$p['id']."'>
                            <input type='number' name='nuevo_stock' value='".$p['stock']."' class='input-cyber' style='width:60px;'>
                            <button type='submit' name='update_stock' class='btn-update'><i class='fa-solid fa-floppy-disk'></i></button>
                        </form></td>";
                echo "<td style='padding: 12px;'>
                        <form method='POST' style='display:flex; gap:5px;'>
                            <input type='hidden' name='id_producto' value='".$p['id']."'>
                            <input type='text' name='nueva_ruta' value='".$p['imagen']."' class='input-cyber' style='width:150px;'>
                            <button type='submit' name='guardar_imagen' class='btn-update' style='padding: 5px 15px;'>OK</button>
                        </form></td>";
                echo "<td style='padding: 12px; text-align: center;'>
                        <a href='admin.php?eliminar=".$p['id']."' onclick='return confirm(\"¿Eliminar?\")' style='color:#ff4a4a;'><i class='fa-solid fa-trash'></i></a>
                      </td>";
                echo "</tr>";
            } ?>
        </table>
    </div>
</div>
</body></html>