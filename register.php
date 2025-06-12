<? php
requere_once('db.php");
$login = $_POST['login'];
$pass = $_POST['pass'];
$repeatpass = $_POST['repeatss'];
$email = $_POST['email'];
   if (empty($login)||empty($repeatpass)||empty($email)){
   echo "Заполните все поля";
   } else
   {
   if($pass !=$repeatpass){
   echo "Пароли не совпадают";
   } else {
   $sql = "INCERT INTO" 'users' (login, pass, email) VALUES ('$login','$pass',
   if ($conn -> query($ql)===TRUE){
   echo "Успешная регистрация";
   }
   else
   }
   }
   
