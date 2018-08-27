<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>PrimeNumber</title>
  </head>
  <body>

    <form action="eprimo.php" method="post">

      <p class='title1'>PRIME NUMBER</p>

      <div class='solution'> Enter a Number and find out if it is PRIME NUMBER and which PRIME NUMBER's are between the initial number and it:
      <br /><br />

      <div class='form_search'>
      <table>
      <tr>
      <td>Initial number:</td>
      <td><input type="number" name="number_first" value='2' min='0' max='15000'></input></td>
      </tr>
      <tr>
      <td>Final number:</td>
      <td><input type="number" name="number_last" min='1' max='15000'></input> <input type="submit" name="send" value="FIND"></td>
      </tr>
    </table>


      </div>
    </form>
  </div>



    <?php

    function arrumarNumero($number)
    {
      $n = strlen($number);

      if ($n < 4 )
      {
        echo $number;
      }

      if ($n == 4 || $n > 4 )
      {
        $n1 = substr($number, 0,($n - 3));
        $nlast = substr($number, ($n - 3),($n - 1));

        echo "<span class='number'>".$n1.'.'.$nlast."</span>";
      }
    }


    $number_first = $_POST['number_first'];
    $number_last = $_POST['number_last'];



    function itsPrime($number)
    {
      $array = [];
      for($n=2; $n<$number; $n++)
      {
        $rest=($number%$n);
        array_push($array, $rest);
      }

      $count = count($array);
      $mult_array = 1;

      for($i=0;$i<$count;$i++)
      {
        $mult_array = $array[$i] * $mult_array;
      }


      if($number < 1 || $number == 1 )
      {
        return 'Invalid number, please enter an integer greater than 1';
      }
      elseif($mult_array!==0 || $number==2)
      {
        return arrumarNumero($number)." It's a PRIME Number";
      }
      else
      {
        return arrumarNumero($number)." It's <span class='not'> NOT </span> prime number" ;
      }

    }




    function itsPrime01($number)
    {
      $array = [];
      for($n=2; $n<$number; $n++)
      {
        $rest=($number%$n);
        array_push($array, $rest);
      }

      $count = count($array);
      $mult_array = 1;

      for($i=0;$i<$count;$i++)
      {
        $mult_array = $array[$i] * $mult_array;
      }


      if($number < 1 || $number == 1)
      {
        return 0;
      }
      elseif($mult_array!==0 || $number==2)
      {
        return 1;
      }
      else
      {
        return 0;
      }

    }


    function printarPrimoAte($numberMin, $numberMax)
    {
      $array = [];
      for ($n=$numberMin;$n<=$numberMax;$n++)
      {
        if(itsPrime01($n) === 1)
        {
          echo "<div class='printar'>".$n."</div>";
        }
        else
        {
          continue;
        }
      }
    }

echo '<hr />';
echo "<div class=container_result>";
echo "<div class='result'>";
echo "Min = <span class='number'>".$number_first."</span>"." Max = <span class='number'>".$number_last."</span>";
echo "</div>";

echo "<div class='result'>";
echo itsPrime($number_last);
echo "</div>";

echo "<div class='result'>";
echo countPrimosAte($number_first,$number_last);
echo '</div>';

echo "</div>";

echo '<hr />';

 echo "<div class='table_prime'>";
 echo printarPrimoAte($number_first,$number_last);
 echo '</div>';

 echo '<hr />';


 function countPrimosAte($numberMin, $numberMax)
 {
   $array = [];
   for ($n=$numberMin;$n<=$numberMax;$n++)
   {
     if(itsPrime01($n) === 1)
     {
       array_push($array, $n);
     }
     if ($n==$numberMax)
     {
       echo "Between <span class='number'>".$numberMin."</span> and <span class='number'>".$numberMax."</span> exist <span class='number'>".count($array)."</span> prime numbers";
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
