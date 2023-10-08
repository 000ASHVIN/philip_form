<div class="title">
    <!-- <h4>NATRAHEA</h4> -->
    <img src="logo/natrahea.jpg" alt="" style="max-width: 180px;">
    <?php if(isset($_SESSION['email'])){ ?>
        <a href="logout.php" class="btn btn-primary logout">Logout</a>
    <?php } else { ?>
        <a href="login.php" class="btn btn-primary logout">Login</a>
    <?php } ?>
    
</div>