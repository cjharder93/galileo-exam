<!doctype html>
<html lang="en">
  <head><h2>PHP (part 1)<h2></head>
  <body>

    <h4>Loops</h4>
    <?php

      //Add all even numbers from zero to a given(max) number
      function sumOfEvenNumbers($max){
        $i= 0;
        $total = 0;
        while($i <= $max){
          if($i % 2 == 0)
            $total += $i;
          $i++;
        }
        return $total;
      }

      //Prints all odd number from zero to a given number(max)
      function printOddNumbers($max){
        $i = 0;

        do{
          if($i % 2 == 1)
            print "$i" . " ";
          $i++;
        }while($i < $max);
      }

      //Function (recursive) to get the fibonacci
      function fibonacci($num){

        if($num > 1)
          return (fibonacci($num -1) + fibonacci($num -2));
        else if($num == 1)
          return  1;
        else return 0;
        
      }

      //Prints the fibonacci sequence, length is based on the given number
      function runFibonacci($max){

        for($i=0; $i < $max; $i++){
          if($i > 0) print ", ";
          print fibonacci($i);
        }
      }

      //Call the above written functions
      print sumOfEvenNumbers(10) . "<br>";
      printOddNumbers(10);
      print "<br>";
      runFibonacci(10);
      
    ?>

  
    <h4>Arrays</h4>

    <?php
      //Prints the most popular person(number of occurence) in an array
      function popular($names){

        $highestOccurence = 0;
        $occurenceCountArray = array_count_values($names); //Count the occurance of a value then store in an array (occurenceCountArray)
        //Check the highest occurance from the newly stored array (occurenceCountArray)
        foreach ($occurenceCountArray as $occurence) { 
          if($occurence >= $highestOccurence)
            $highestOccurence = $occurence;
        }

        //Prints the value from the array with the highest occurance
        foreach ($occurenceCountArray as $key => $val){
          if($val == $highestOccurence)
            print $key . " ";
        }
      }


      $names = array('Marvin', 'Marco', 'Marvin', 'Marco', 'Marvin', 'Christian');
      print "Most popular: ";
      popular($names);
      print "<br> ";


      function sortAndRoundExercise($numbers){
        
        //Check each number in the array, if pdd then round it to the nearest tens using round method
        foreach($numbers as $key => $val){
          if($val % 2 == 1)
            $numbers[$key] = round($val, -1);
        }

        //Sort the numbers in the array in accending order. You can use sort() method as per doc
        $length = count($numbers);
        for($i = 0; $i < $length; $i++)
          for($j = $i; $j < $length; $j++)
            if($numbers[$i] > $numbers[$j]){
              $tempNum = $numbers[$i];
              $numbers[$i] = $numbers[$j];
              $numbers[$j] = $tempNum;
            } 
        //Prints the sorted array individually
        foreach($numbers as $num)
          print $num . " ";        
      }

      $numbers = array(9863, 7127, 2020, 80, 131, 55, 100);
      sortAndRoundExercise($numbers);
      print "<br>";



      function checkUniqueItem($colors){
        //Count the occurence of each item using array_count_values
        //then check what values occured only once
        foreach(array_count_values($colors) as $key => $val)
          if($val == 1)
            print $key . "<br>";


        // $newColors = $colors;
        // foreach (array_unique($colors) as $color) {
        //   for($i=0; $i< count($newColors) ; $i++ ){
        //     if(strcmp($color, $newColors[$i]) == 0){
        //       print $color;
        //     }
        //   }
        //   print_r ($newColors); print "<br>";
        // }

      }

      $colors = array('red', 'blue', 'black', 'red', 'blue', 'blue', 'red', 'gold');
      print "These colors are not repetitive: ";
      checkUniqueItem($colors);

    ?>

    <h4>SQL</h4>
    <!-- SQL queries -->
    <list>
    <ul>a.) select * from employees a inner join salary b on a.salary_id = b.id where salary in (select max(salary) from salary) </ul>
    <ul>b.) select * from employees where date_hired between '2017-1-1' and '2018-12-31';</ul>
    <ul>c.) select * from employees, departments where date_hired >= '2018-1-1' and deparment = 'It';</ul>
    
    </list>

    <h4>Javascript</h5>

    <p id="answerA"></p>


    <h6></h6>

    <!-- Contact Form -->
    <form id="contactUs" action="#">

      <p>Full Name: <input type="text" size="30" maxlength="155" name="name" id="fullName" /></p>
      <p>Gender: 
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
      <p>Known Language: 
        <input type="checkbox" id="English" name="english" value="english">
        <label for="english"> English</label><br>
        <input type="checkbox" id="Japanese" name="japanese" value="japanese">
        <label for="japanese"> Japanese</label><br>
        <input type="checkbox" id="Chinese" name="chinese" value="chinese">
        <label for="chinese"> Chinese</label><br>
      </p>

    </form>

    <!-- Item number 1 for the javascript section -->
    <script type="text/javascript">
      'ThisIsTheStringToSplit'.match(/[A-Z][a-z]+/g);

      function fixSentence(sentence) {
        //separate the sentence by uppercase and store it as an array
        let separated = sentence.split(/(?=[A-Z])/); 
        let fixedSentence = "";

        //Iterate over the array and add the spaces in between.
        for (let i = 0; i < separated.length; i++){
          if(i > 0)
            fixedSentence += ' ' + separated[i].toLowerCase();
          else
            fixedSentence += separated[i];
        }
        return fixedSentence;
      }

      let sentence = "TheQuickBrownFoxJumpsOverTheLazyDog";
      //Call the fixSentence function then display it to the HTML page
      document.getElementById("answerA").innerHTML = fixSentence(sentence);



    </script>



    <!-- Item number 2 for the javascript section -->
    <script type="text/javascript">
      
      let employees;
      


      //Get data from local file then call the function to set the values in form
      fetch("employees.json")
        .then(response => response.json())
        .then(json => setValues(json));

      //Accepts data then set it in the form
      function setValues(json){
        employees = json.employees;

        //Sort the list base on lastName
        let sortedEmp = employees.sort((a,b) => a.lastName.localeCompare(b.lastName));
        let selectedEmp = sortedEmp[0];
        let inputFullName = document.getElementById("fullName");
        let gender;

        //Set the values of the form such as, name, gender and Languages
        inputFullName.setAttribute('value', selectedEmp.firstName + ' ' + selectedEmp.lastName);

        if(selectedEmp.gender.male)
          document.getElementById("male").checked = true;
        else
          document.getElementById("female").checked = true;

        selectedEmp.knownLanguage.forEach(setLanguages);
        function setLanguages(item){
          document.getElementById(item).checked = true;
        }



      }

    </script>


  </body>
</html>