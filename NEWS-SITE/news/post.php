<?php
// ----------------------------конфигурация-------------------------- //


$adminemail = "admin@euronews.zzz.com.ua";  // e-mail админа


$date = date("d.m.y"); // число.месяц.год

$time = date("H:i"); // часы:минуты:секунды

$backurl = "index.php";  // На какую страничку переходит после отправки письма

//---------------------------------------------------------------------- // 


// Принимаем данные с формы 

$name = $_POST['name'];

$email = $_POST['email'];


$msg = " 

<p>Имя: $name</p> 
 
<p>E-mail: $email</p> 
 
";


// Отправляем письмо админу

mail("$adminemail", "$date $time Сообщение 
от $name", "$msg");


// Сохраняем в базу данных 

$f = fopen("message.txt", "a+");

fwrite($f, " \n $date $time Сообщение от $name");

fwrite($f, "\n $msg ");

fwrite($f, "\n ---------------");

fclose($f);



$req3 = "Location: $backurl";
header($req3);


?>