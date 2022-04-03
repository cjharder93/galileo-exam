<!doctype html>
<html lang="en">
  <head><h2>Galileo PHP Dev exam (part 2)<h2></head>
  <body>

  <h4>2.) Create a file</h4>

    

    <?php
      //Function that creates a file base on given file directory and contents.
      //I havent really tested it need to search online
      function createFile($dir, $textContent){
        $parts = explode('/', $dir);
        $file = array_pop($parts);
        $dir = '';
        foreach($parts as $part)
            if(!is_dir($dir .= "/$part")) mkdir($dir);
        file_put_contents("$dir/$file", $textContent);
      }

      $textContent = "<php?<br>
      <br>
      //This is a comment<br>
      <br>
      echo 'This is a test page!';<br>
      echo 'Exam number two!';<br>
      <br>
      //This is the end of a comment";
      
      $dir = "hello_there.php";
      createFile($dir, $textContent);




    ?>

  </body>
</html>