
<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<h2>Agenda Pessoal</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Insira o nome: <input type="text" name="nome">
  <br><br>
  <input type="submit" name="submit" value="Pesquisar">  
</form>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = $_POST['nome'];
$var = 'nome='.$name;
$channel = curl_init('http://localhost:8080');

curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);
curl_setopt($channel, CURLOPT_POST, true);
curl_setopt($channel, CURLOPT_POSTFIELDS, $var);

$result = curl_exec($channel);
curl_close($channel);

echo "<br><br>";
echo "Nome: $name";
echo "<br>";
echo "Telefone: $result";
}

?>
    
</body>
</html>