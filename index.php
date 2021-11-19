<?php
    session_start();
    require_once "./database.php";

    
    // Verifica que exista una sesión iniciada
    if(isset($_SESSION['user_id'])){
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        if(count($row) > 0){
           $user = $row;
        }

    }
    // Parciales
    require_once "./partials/header.php"
?>
    <!-- Si hay una sesion iniciada se muestra este mensaje -->
    <?php if(!empty($user)){ ?>
        <br>Welcome <?php echo $user['email'] ?>
        <br>You are succesfully logged in
        <a href="logout.php">Logout</a>

    <?php }else{ ?>
        <!-- Si no exixte sesion se muestran estos enlaces -->
        <h1>Please Login or SignUp</h1>
        <a href="login.php">Login</a> <span><strong>Or</strong></span>  
        <a href="signup.php">SignUp</a>
    <?php } ?>

<!-- Parciales -->
<?php require_once "./partials/footer.php"; ?>