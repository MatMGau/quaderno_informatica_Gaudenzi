<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triangoli di Asterischi in PHP</title>
    <style>body {font-family: monospace;}</style>
</head>
<body>
    <h1>Programma per stampare triangoli di asterischi in PHP</h1>
    <a href="php.html" class="button"> <--- go back</a>

<?php


for ($i=0; $i<=10; $i++)
{
  $j=0;

  while ($j<$i)
  {
    echo "*";
    $j++;
  }

  echo "<br>";
        }
        
        echo "<br>";
      

        for ($i=10; $i>0; $i=$i-1)
        {
          $j=0;
        
          while ($j<$i)
          {
            echo "*";
            $j++;
          }
        
          echo "<br>";
        
          
                }

          echo "<br>";   
                


        for ($i=10; $i>0; $i=$i-1)
        {
          $j=0;
          $l=10;
          $l=$l-$i;
          while ($l>0){
            echo "&nbsp;";
            $l--;
          }

          while ($j<$i)
          {
            
            echo "*";
            $j++;
          }
        
          echo "<br>";
        
          
                }
    

                echo "<br>";

                for ($i = 1; $i <= 10; $i++) {
                    $k = 10 - $i;
                    $j = 0;
                
                    
                    while ($k > 0) {
                        echo "&nbsp;";
                        $k--;
                    }
        
                    
                    while ($j < $i) {
                        echo "*";
                        $j++;
                    }
                
                    echo "<br>";
                }



?>

</body>
</html>