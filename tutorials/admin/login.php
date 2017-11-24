<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/tutorials/core/init.php';
include 'includes/head.php';

$email = ((isset($_POST['email']))?sanitize($_POST['email']):'');
$email = trim($email);
$password = ((isset($_POST['password']))?sanitize($_POST['password']):'');
$password = trim($password);
//$hashed = password_hash($password,PASSWORD_DEFAULT);
$errors = array();
?>
<style>
    body{
        background-image: url("/tutorials/images/headerlogo/background.png");
        background-size: 100vw 100vh ;
        background-attachment: fixed;
    }
</style>
<div id="login-form">
    <div>
        <?php 
         if($_POST){
             //form validation
             if(empty($_POST['email']) || empty($_POST['password'])){
                 $errors[] = 'You must provide email and password.';
             }
             
             //validate email address
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $errors[] = "$email is not a valid email address";
              } 
             
             //password is more than 6 characters
             if(strlen($password) < 6){
                 $errors[] = 'password must be atleast 6 letters.';
             }
             
             // check if email exist in database
             $query = $db->query("SELECT * FROM users WHERE email = '$email'");
             $user = mysqli_fetch_assoc($query);
             $user_count = mysqli_num_rows($query);
             if($user_count < 1){
                 $errors[] = 'that email doesnot exist in our database';
             }
             
             if(!password_verify($password, $user['password'])){
                 $errors[] = 'the password doesnot match our records. Please try again.';
             }
             
             
             //check for errors
             if(!empty($errors)){
                 echo display_errors($errors);
             }else{
                 //log user in
                 echo 'log user in ';
             }
         }
        
        ?>
        
    </div>
    <h2 class="text-center">Login</h2>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?=$email;?>">
        </div>
        <div class="form-group">
        <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="<?=$password;?>">
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="btn btn-primary">
        </div>
    </form>
    <p class="text-right"><a href="/tutorials/index" alt="home">Visit Site</a></p>
</div>


<?php include 'includes/footer.php'; ?>