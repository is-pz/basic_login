<?php 
    session_start();
    
    require_once "./database.php";
    // Verifica si ya existe una sesión iniciada
    if(isset($_SESSION['user_id'])){
        header("Location: index.php");
    }
        
    // Verifica que los campos no esten vacios
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        // Consukta para obtener los datos del usuario
        $query = "SELECT id, email, password FROM users WHERE email = '$email'";
        //Ejecucion de la consulta
        $result = mysqli_query($conn, $query);
        //Asignacion de los datos a un array
        $row = mysqli_fetch_assoc($result);
        
        $message = '';

        // Verifica que el usuario exista
        if(count($row) > 0 && password_verify($password , $row['password'])){
            // Almacena el id del usuario en una variable de sesión
            $_SESSION['user_id'] = $row['id'];
            // Redirecciona al usuario a la página principal
            header('Location: /');

        }else{
            // Mensaje de error
            $message = 'Sorry your credentials do no match';
        }

    }
    // Parciales
    require_once "./partials/header.php";
?>
    <h1>Login</h1>
    <span><strong>Or</strong>  <a href="signup.php">SingUp</a></span>
    <!-- Mesnaje si existe algun problema -->
    <?php if(!empty($message)){ ?>
        <p><strong><?= $message ?></strong></p>
    <?php } ?>
    <!-- Fomrularion de incio de sesion -->
    <form action="login.php" method="POST">
        <input type="text" name="email" placeholder="Enter your mail"/>
        <input type="password" name="password" placeholder="Enter your password">
        <input type="submit" value="Send">
    </form>

    <!-- Parciales -->
<?php  require_once "./partials/footer.php"; ?>