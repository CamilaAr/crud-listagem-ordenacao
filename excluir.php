<?php
include("header.php");

?>

<body>
<div class="uk-container"> 

<?php

$nome = $_GET["atributo"];


?>
<div style="text-align: center">
<h2 >
	Excluir o Usuário <?php echo $nome; ?> ?
</h2>



<div style="text-align: center";
<a class="uk-button uk-button-danger" onclick="excluir()"    href='excluir.php?atributo=<?php echo $atributo ?>'>Excluir</a> 
</div>	

</div>		 




</div>
</body>
	<script>
function excluir()
{
var x;
var r=confirm("Deseja realmente exclur?");
if (r==true)
  {
  x="você pressionou OK!";
  window.location.href = "ecluirconfirmar.php?atributo=<?php echo $nome ?>";
  }
else
  {
  x="Você pressionou Cancelar!";
  window.location.href = "index.php";
  }
document.getElementById("demo").innerHTML=x;
}
</script>
</html>

