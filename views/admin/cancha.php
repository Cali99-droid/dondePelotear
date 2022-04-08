<?php include_once __DIR__ . '/header-dashboard.php' ?>
<div class="contenedor-sm">
    <div class="contenedor-nueva-tarea">
        <button type="button" class="btn" id="agregar-cancha">&#43; Agregar Cancha</button>
    </div>
</div>
<?php include_once __DIR__ . '/form-cancha.php' ?>
<?php include_once __DIR__ . '/footer-dashboard.php' ?>

<?php $script .=
    ' <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="build/js/cancha.js"></script> '
?>