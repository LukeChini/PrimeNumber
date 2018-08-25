<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Primo</title>
  </head>
  <body>

    <form action="eprimo.php" method="post">

      <p> Insira um Numero e descubra se ele é PRIMO e quais PRIMOS estão entre o numero inicial e ele: </p>
      numero inicial: <input type="number" name="numeroi" value='2'></input>
      numero final/quero saber se é primo<input type="number" name="numero"></input>
      <input type="submit" name="enviar" value="Descobrir">

    </form>


    <?php

    $descobrir = $_POST['numero'];
    $minimo = $_POST['numeroi'];



    function ePrimo($numero)
    {
      $array = [];
      for($n=2; $n<$numero; $n++)
      {
        $rest=($numero%$n);
        array_push($array, $rest);
      }

      $count = count($array);
      $produto = 1;

      for($i=0;$i<$count;$i++)
      {
        $produto = $array[$i] * $produto;
      }


      if($numero < 1 || $numero == 1 )
      {
        return 'Numero não valido, favor insira um numero inteiro maior que 1';
      }
      elseif($produto!==0 || $numero==2)
      {
        return $numero.' é PRIMO';
      }
      else
      {
        return $numero.' NÃO é primo';
      }

    }

echo '<hr />';
echo 'Minimo = '.$minimo.' Maximo = '.$descobrir;
echo '<hr />';

    echo ePrimo($descobrir);



    function ePrimo01($numero)
    {
      $array = [];
      for($n=2; $n<$numero; $n++)
      {
        $rest=($numero%$n);
        array_push($array, $rest);
      }

      $count = count($array);
      $produto = 1;

      for($i=0;$i<$count;$i++)
      {
        $produto = $array[$i] * $produto;
      }


      if($numero < 1 || $numero == 1)
      {
        return 0;
      }
      elseif($produto!==0 || $numero==2)
      {
        return 1;
      }
      else
      {
        return 0;
      }

    }

    $descobrir = $_POST['numero'];

    function printarPrimoAte($numeroMax, $numeroMin)
    {
      $array = [];
      for ($n=$numeroMin;$n<=$numeroMax;$n++)
      {
        if(ePrimo01($n) === 1)
        {
          echo $n.' - ';
        }
        else
        {
          continue;
        }
      }
    }



    echo '<hr />';

echo countPrimosAte($descobrir, $minimo);
    echo '<hr />';

 echo printarPrimoAte($descobrir, $minimo);


 $descobrir = $_POST['numero'];

 function countPrimosAte($numeroMax, $numeroMin)
 {
   $array = [];
   for ($n=$numeroMin;$n<=$numeroMax;$n++)
   {
     if(ePrimo01($n) === 1)
     {
       array_push($array, $n);
     }
     if ($n==$numeroMax)
     {
       echo 'Entre '.$numeroMin.' e '.$numeroMax.' existem '.count($array).' numeros primos';
     }
     else
     {
       continue;
     }



   }
 }











 ?>





  </body>
</html>
