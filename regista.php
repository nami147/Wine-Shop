<?php
session_start();

require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "SELECT id, nome FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['id_usuario'] = $row['id'];
        $_SESSION['nome_usuario'] = $row['nome'];
        header("Location: pagina_protegida.php");
    } else {
        $erro = "Credenciais inválidas. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login Form</title>
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./your-footer-styles.css">
  <link rel="stylesheet" href="/reset/index.html">
</head>
<body>
  <div class="main">    
    <input type="checkbox" id="chk" aria-hidden="true">

    <div class="signup">
      <form>
        <label for="chk" aria-hidden="true">Sign up</label>
        <input type="text" name="txt" placeholder="User name" required="">
        <input type="email" name="email" placeholder="Email" required="">
        <input type="password" name="pswd" placeholder="Password" required="">
        <button>Sign up</button>
      </form>
    </div>

    <div class="login">
      <form>
        <label for="chk" aria-hidden="true">Login</label>
        <input type="email" name="email" placeholder="Email" required="">
        <input type="password" name="pswd" placeholder="Password" required="">
        <button>Login</button>
      </form>
    </div>

	<div class="reset">
		<div class="reset"><a href="/reset/reset.html" >reset</a></div>
	  </div>

</body>
</html>
<div class="footer">© <a href="./contactos/contactos.html" >Tiago Amaral</a>. Todos os direitos reservados.</div>
<style>
  body{
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	font-family: 'Jost', sans-serif;
	background-image: linear-gradient(to bottom, #0f0c29, #16153b, #211c4e, #2d2261, #3b2874, #3f2a79, #432d7e, #472f83, #402e7b, #3a2e73, #352c6b, #302b63);
}
.main{
	width: 350px;
	height: 500px;
	background: red;
	overflow: hidden;
	background: url("https://static.vecteezy.com/system/resources/previews/004/257/968/non_2x/abstract-purple-fluid-wave-background-free-vector.jpg") no-repeat center/ cover;
	border-radius: 10px;
	box-shadow: 5px 20px 50px #000;
}
#chk{
	display: none;
}
.signup{
	position: relative;
	width:100%;
	height: 100%;
}
label{
	color: #fff;
	font-size: 2.3em;
	justify-content: center;
	display: flex;
	margin: 60px;
	font-weight: bold;
	cursor: pointer;
	transition: .7s ease-in-out;
}
input{
	width: 80%;
	height: 20px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 10px;
	border: none;
	outline: none;
	border-radius: 5px;
}
button{
	width: 60%;
	height: 40px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: #fff;
	background: #502f8d;
	font-size: 1em;
	font-weight: bold;
	margin-top: 20px;
	outline: none;
	border: none;
	border-radius: 5px;
	transition: .2s ease-in;
	cursor: pointer;
}
button:hover{
	background: #420da5;
}
.login{
	height: 600px;
	background: #eee;
	border-radius: 60% / 10%;
	transform: translateY(-180px);
	transition: .8s ease-in-out;
}
.login label{
	color: #39147c;
	transform: scale(.7);
	margin-top: 70px;
}

#chk:checked ~ .login{
	transform: translateY(-400px);
}
#chk:checked ~ .login label{
	transform: scale(1);
	margin-top: -95px;
}
#chk:checked ~ .signup label{
	transform: translateY(-35px);
	font-size:x-large ;
}
.footer { 
    position: absolute; 
    bottom: 0; 
    left: 0; 
    z-index: 1000;
}
#chk:checked ~ .reset{
	position: absolute;
	margin-bottom: 5px;
}

</style>