<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/modal.css">

  <title>Voe em segurança</title>
</head>

<body>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
            <h1><span>C</span>A<span>E</span>N</h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="index.html" >Home</a></li>
            <li><a href="#" >Serviços</a></li>
            <li><a href="#" >Projectos</a></li>
            <li><a href="#" >Sobre</a></li>
            <li><a href="contacto.html" >Contactos</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- FIM DE Header -->


  <!-- Hero Section  -->
  <section id="hero">
    <div class="hero container">
      <div>
        <h1>Voe CAEN, <span></span></h1>
        <h1>É um <span></span></h1>
        <h1>Vôo seguro <span></span></h1>
        <a href="#projects" type="button" class="cta">Login</a>
      </div>
  </section>
  <!-- FIM Hero Section  -->

  <div class="modal-bg">
  <div class="modal">
  <form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
        <span class="modal-close">X</span>
			</div>
			<p class="login-register-text">Ainda não tem uma conta?? <a href="register.php">Registre-se aqui</a>.</p>
		</form>
	</div>
    </div>
  </div>
  </div>

  <!-- Service Section -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Para onde deseja <span> voar</span>?</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum deleniti maiores pariatur assumenda quas
          magni et, doloribus quod voluptate quasi molestiae magnam officiis dolorum, dolor provident atque molestias
          voluptatum explicabo!</p>
      </div>

    </div>
  </section>
  
<!--Preçarios-->   

<!--

<div class="silver-plan">
 <div class="plan-details">

  <h1>Silver</h1>
  <p>Starters</p>

  <ul>
    <li>Free domain registration</li>
    <li>%5GB space</li>
    <li>10gb space bandwidth </li>
    <li>1 website</li>
  </ul>
 </div>

 <div class="price">
   <p>
     $ <span>10</span> / month
   </p>
   <button>buy</button>
   <p>30 day money back guarentee</p>
 </div>
</div>
   -->

   <div class="fase">

    <div class="fasetext">
     <h1>Voe CAEN para um verão inesquecível!</h1> 
     <p>É hora de repor a sua vitamina D</p>
    </div>

    <div class="fasefoto">
      <img src="./img/teo6.jpg" alt="Benguela">
    </div>
    
   </div>

   <footer id="rodape">
     <p> Copyright&copy; Companhia aérea económica nacional. Todos os direitos reservados.
    </p>
   </footer>
   
   <script src="arc.js"> </script>
  <script src="./app.js"></script>
</body>

</html>