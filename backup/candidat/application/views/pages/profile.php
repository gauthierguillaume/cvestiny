
<div class="row">
    <div class="container">
        <?php if (isset($_SESSION['success'])) { ?> <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
        <?php } ?>
BONJOUR , <?php echo $_SESSION['cand_prenom'] ?>
    </div>

</div>