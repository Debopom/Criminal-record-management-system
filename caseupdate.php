<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
	  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Black+Ops+One&display=swap" rel="stylesheet">
    <title>Case Update</title>
    <link rel = "icon" href = "Icon.ico" type = "image/x-icon">
    <style type="text/css">
      body {
        background-image: url('case.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        top: 300px;
        z-index: -1;
      }
      .overlay {
        background-color: rgba(0, 0, 0, 0.7);
        left: 0;
        width: 100%;
        height: 1000px;
        position: relative;
        z-index: 1;
      }
      .nav li:hover, .active {
        background-color:  #4d4d4d;
      }
      .menu--1 {
        display: none;
      }
      .nav li:hover .menu--1 {
        display: block;
        position: absolute;
        background-color: #4d4d4d;
        padding: 10px 0px 10px 0px;
        text-align: left;
        border-radius: 0 0 5px 5px;
        z-index: 3;
      }
      .menu--1 li {
        display: block;
        border-radius: 0;
        background-color: transparent;
      }
      .menu--1 li:hover {
        background-color: #777676;
      }
      .menu--1 li:hover > a {
        text-decoration: none;
        color: rgb(124, 184, 230);
        transition: all 0.5s linear;
      }
      .menu--1 li:last-child {
        border-bottom: none;
      }
    </style>
  </head>
  <body>
    <ul class="nav justify-content-center" style="background-color: rgb(29, 28, 28);">
      <li class="nav-item" >
        <a class="nav-link" style="color: rgb(255, 255, 255); margin: 10px 15px;" aria-current="page" href="Home.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: rgb(255, 255, 255); margin: 10px 15px;" aria-current="page" href="Police.php">Police</a>
        <div class="menu--1">
          <ul style="padding-left: 0; width: 104px;">
            <li><a href="Police-Insert.html" style="color: aliceblue; background-color: transparent; text-decoration: none; padding-left: 32px;">Insert</a></li>
            <li><a href="Police-Update.html" style="color: aliceblue; background-color: transparent; text-decoration: none; padding-left: 28px;">Update</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: rgb(255, 255, 255); margin: 10px 15px;" aria-current="page" href="stations.php">Stations</a>
        <div class="menu--1">
          <ul style="padding-left: 0; width: 118px;">
            <ul style="padding-left: 0; ">
            <li><a href="stations-insert.html" style="color: aliceblue; background-color: transparent; text-decoration: none; padding-left: 40px;">Insert</a></li>           
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: rgb(255, 255, 255); margin: 10px 15px;" aria-current="page" href="prisonhome.php">Prison</a>
        <div class="menu--1">
          <ul style="padding-left: 0; width: 106px;">
            <ul style="padding-left: 0; ">
            <li><a href="prison-insert.html" style="color: aliceblue; background-color: transparent; text-decoration: none; padding-left: 35px;">Insert</a></li>           
          </ul>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" style="color: rgb(255, 255, 255); margin: 10px 15px;" aria-current="page" href="Case Files.html">Case Files</a>
        <div class="menu--1">
          <ul style="padding-left: 0; width: 130px;">
            <ul style="padding-left: 0; ">
            <li><a href="casefiles-insert.html" style="color: aliceblue; background-color: transparent; text-decoration: none; padding-left: 45px;">Insert</a></li>
            <li><a href="casefiles-update.html" style="color: aliceblue; background-color: transparent; text-decoration: none; padding-left: 40px;">Update</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: rgb(255, 255, 255); margin: 10px 15px;" aria-current="page" href="Criminal.html">Criminal Records</a>
        <div class="menu--1">
          <ul style="padding-left: 0; width: 181px;">
            <ul style="padding-left: 0; ">
            <li><a href="criminal-update.html" style="color: aliceblue; background-color: transparent; text-decoration: none; padding-left: 60px;">Update</a></li>           
          </ul>
        </div>
      </li>
    </ul>
    <div class="overlay">

  <h5 style = "color: aliceblue; text-align: center ;padding : 50px;">
    <?php

        if(isset($_POST['caseno'])){
            include_once 'dbconnect.php';
            $var = $_POST['fields'];
            $caseno = $_POST['caseno'];
            $updated = $_POST['updated'];
            $var2 = $_POST['options'];
            
            


             if($var == "1"){
                
                if($var2=="1"){
                    $sql = "INSERT INTO solve VALUES('$updated' , '$caseno');";
                    $rs = $conn-> query($sql);
                    if($rs){
                        echo "ADDED police officer to this case successfully \n";
                    }
                    else{
                      echo 'Error: '. $conn->error;
                  
                  }
    
                }
                if($var2=="2"){
                    $sql = "DELETE FROM solve WHERE police_id = '$updated' AND case_no = '$caseno';";
                    $rs = $conn-> query($sql);
                    if($rs){
                        echo " Removed police officer from this case successfully \n";
                    }
                    else{
                      echo 'Error: '. $conn->error;
                  
                  }
    
                }
            }



            if($var == "2"){
                
                if($var2=="1"){
                    $hearings = explode(",", $updated);
                    $sql = "INSERT INTO convicted VALUES('$updated' , '$caseno');";
                    $rs = $conn-> query($sql);
                    if($rs){
                        echo "ADDED criminal to this case successfully \n";
                    }
                    else{
                      echo 'Error: '. $conn->error;
                  
                  }
                    
    
                }
                if($var2=="2"){
                    $sql = "DELETE FROM convicted WHERE criminal_id = '$updated' AND case_no = '$caseno';";
                    $rs = $conn-> query($sql);
                    if($rs){
                        echo " Removed criminal from this case successfully \n";
                    }
                    else{
                      echo 'Error: '. $conn->error;
                  
                  }
                    
    
                }
            }


            if($var == "3"){
                

                $hearings = explode(",", $updated);


                if($var2=="1"){
                    $sql = "INSERT INTO hearing_date VALUES('$hearings[0]' , '$caseno' ,'$hearings[1]');";
                    $rs = $conn-> query($sql);
                    if($rs){
                        echo "ADDED hearing date to this case successfully \n";
                    }else{
                      echo "Case no doesn't match or hearing date already inserted \n";
                    }
                    
    
                }
                if($var2=="2"){
                    $sql = "DELETE FROM hearing_date WHERE hearing_no = '$hearings[0]' AND case_no = '$caseno';";
                    $rs = $conn-> query($sql);
                    if($rs){
                        echo " Removed hearing date from this case successfully \n";
                    }  
                    else{
                      echo 'Error: '. $conn->error;
                  
                  } 
                }
            }
           
        }

        
    
    ?>
    </h5>
      </div>
  </body>
</html>