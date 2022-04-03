<!doctype html>
<html lang="en">
  <head><h2>Galileo PHP Dev exam (part 2)<h2></head>
  <body>

  <h4>4.) Show the difference between two dates</h4>
  <form action="index.php" method="post">
    <p>Start Date: <input type="text" name="startDate" id=""startDate/></p>
    <p>End Date: <input type="text" name="endDate" id=""endDate/></p>
    <p><input type="submit" /></p>
  </form>

    

    <?php
      
      function getDateDifference($startDate, $endDate){

        $dateDifference = date_diff (date_create($startDate), date_create($endDate) );
        // $dateDifference = ($startDate - $endDate);
        //print $dateDifference;

        return ($dateDifference -> format('%y Year, %m Month, %d Days'));
        
      }



      //Display the entered text and result
      if(isset($_POST['startDate']) && isset($_POST['endDate'])){
        $startDate = date($_POST['startDate']);
        $endDate = date($_POST['endDate']);

        print getDateDifference($startDate, $endDate);
          

      }


    ?>

  </body>
</html>