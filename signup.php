<?php
    require_once './database.php';
    $message = '';
    // Comprobamos si el usuario ha enviado el formulario con datos
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        // Se encripta la contraseña
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        // Consulta para insertar los datos
        $query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        // Ejecuta la consulta
        $result = mysqli_query($conn, $query);
        // Comprueba si se ha insertado 
        if($result){
            // Si se ha insertado, muestra el mensaje 
            $message =  "Successfully created new user";
        }else{
            // Si no se ha insertado, muestra el mensaje de error
            $message = "Sorry there must have been an issue creating your password";
        }
    }
    // Parciales
    require_once "./partials/header.php";
?>
    
    <h1>SignUp</h1>
    <span><strong>Or</strong>  <a href="login.php">Login</a></span>
    <!-- Muesta el mensaje -->
    <?php if(!empty($message)){ ?>
        <p><strong><?= $message ?></strong></p>
    <?php } ?>
    <!-- Formulario de creacion de usuario -->
    <form action="signup.php" method="POST">
        <input type="text" name="email" placeholder="Enter your mail"/>
        <input type="password" name="password" placeholder="Enter your password">
        <input type="password" name="confirm_password" placeholder="Confirm your password">
        <input type="submit" value="Send">
    </form>
    <!-- Parciales -->
<?php require_once "./partials/footer.php"; ?>