<?php include_once __DIR__ . '/header-dashboard.php' ?>
<div>
    <a href="/admin">Mi cancha</a>
    <a href="/crear-cancha">/ Crear Cancha</a>
</div>


<?php include_once __DIR__ . '/form-cancha.php' ?>
<?php include_once __DIR__ . '/footer-dashboard.php' ?>

<?php $script .=
    ' <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="build/js/cancha.js"></script> '
?>