<?php require 'header.php' ?>

<body onload="appoitments()">
<?php require 'menu.php' ?>

<div class="container">
<div class="p-5"></div>
    <h2><span id="greeting">Hello</span>, <?php echo $tname?></h2>
    <div class="row">
    <?php require 'model/userrecords.php'; ?>

    </div>
</div>
    
</body>

<?php require 'footer.php' ?>
