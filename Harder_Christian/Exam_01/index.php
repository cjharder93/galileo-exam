<!doctype html>
<html lang="en">
  <head><h2>Galileo PHP Dev exam (part 2)<h2></head>
  <body>

  <h4>1.) Check if a word or phrase is palindrome</h4>
  <form action="index.php" method="post">
    <p>Enter Phrase: <input type="text" name="name" id=""name/></p>
    <p><input type="submit" /></p>
  </form>

    

    <?php
      
      //Check if word is palindrome
      function isPalindrome($phrase){
        $phrase = str_replace(' ', '', $phrase); //Remove all the spaces from the entered text
        if($phrase == reverseString($phrase)) //Compare the original text from the text in reversed
          return "is a Palindrome";
        else return "is NOT a palindrome";
      }

      //Returns the given text in reverse. strrev() can also be used
      function reverseString($phrase){
        $length = strlen($phrase);
        $revWord = "";

        for($i = ($length - 1) ; $i >= 0 ; $i--)
            $revWord .= $phrase[$i];
        return $revWord;
      }

      //Display the entered text and result
      if(isset($_POST['name'])){
        $enteredText = htmlspecialchars($_POST['name']);
        print $enteredText . " " . isPalindrome($enteredText);
      }




    ?>

  </body>
</html>