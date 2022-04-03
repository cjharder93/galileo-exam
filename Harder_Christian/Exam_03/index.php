<!doctype html>
<html lang="en">
  <head><h2>Galileo PHP Dev exam (part 2)<h2></head>
  <body>

  <h4>3.) Check if a number is fibonacci</h4>
  <form action="index.php" method="post">
    <p>Enter Maximum Number (start from 1): <input type="number" name="maxNum" id=""maxNum/></p>
    <p><input type="submit" /></p>
  </form>

    

    <?php
      

      //Calculate the fibonacci formula. if the result of either or both fomula is a perfect square then return true.
      function isFibonacciNumber($num){
        return (  isPerfectSquare(5*($num*$num) + 4) || isPerfectSquare(5*($num*$num) - 4) );
      }

      //Check if the number is perfect square
      function isPerfectSquare($num){
        $tempNum = (int)sqrt($num);
        return ($num == $tempNum * $tempNum);
      }


      //Display the entered text and result
      if(isset($_POST['maxNum'])){
        $maxNum = $_POST['maxNum'];

        for($i=1; $i <= $maxNum; $i++){
          print $i . " ";
          print isFibonacciNumber($i)? 'is a Fibunacci number<br>': 'is NOT a Fibunacci number<br>';
        }
          

      }


      //print isPerfectSquare(9);
    ?>

  </body>
</html>