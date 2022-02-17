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
    <!--<link rel="stylesheet" href="Home.css">-->
    <title>Case Search</title>
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
    <div class="overlay" style = "padding-top: 60px">
    <?php
    
    
    if(isset($_POST['caseno'])){
            include_once 'dbconnect.php';
            $caseno = $_POST['caseno'];
            $sql = "SELECT cs.case_no, cs.case_type,cs.event_date,cs.place,cs.sentence,cs.station_area,cs.station_location , con.convicteds , po.assigned , hd.dates   FROM cases AS cs
            LEFT JOIN
            (SELECT case_no, GROUP_CONCAT(police_id SEPARATOR ' , ') AS assigned FROM solve GROUP by case_no) AS po 
            ON(po.case_no = cs.case_no)
            LEFT JOIN
            (SELECT case_no, GROUP_CONCAT(criminal_id SEPARATOR ' , ') AS convicteds FROM convicted GROUP by case_no) AS con  ON (po.case_no = con.case_no)
            LEFT JOIN
            (SELECT case_no, GROUP_CONCAT(hearing_date SEPARATOR ' , ') AS dates FROM hearing_date GROUP by case_no) AS hd  ON (po.case_no = hd.case_no)
            WHERE cs.case_no = '$caseno' ;";
            $rs = $conn-> query($sql);
            if(mysqli_num_rows($rs) == 0){
              echo "No cases found";
            }

            while($data = mysqli_fetch_array($rs)){
                
                ?>
                
            
                <div style="margin-top: 50px; margin: auto; width: 50%"> 
                            <h5 style="color: rgb(255, 255, 255);; text-align: center;">Case NO : <?php 
                            if ($data[0]==NULL){
                                echo "NULL";
                            }else{
                                echo $data[0]."\n";
                            } ?>
                            </h5>
                            <h5 style="color: rgb(255, 255, 255);; text-align: center;">Case Type : <?php 
                            if ($data[1]==NULL){
                                echo "NULL";
                            }else{
                                echo $data[1]."\n";
                            } ?>
                            </h5>
                            <h5 style="color: rgb(255, 255, 255);; text-align: center;">Event Date : <?php 
                            if ($data[2]==NULL){
                                echo "NULL";
                            }else{
                                echo $data[2]."\n";
                            } ?>
                            </h5>
                            <h5 style="color: rgb(255, 255, 255);; text-align: center;">Place : <?php 
                            if ($data[3]==NULL){
                                echo "NULL";
                            }else{
                                echo $data[3]."\n";
                            } ?>
                            </h5>
                            <h5 style="color: rgb(255, 255, 255);; text-align: center;">Sentence : <?php
                            if ($data[4]==NULL){
                                echo "NULL";
                            }else{
                                echo $data[4]."\n";
                            } ?>
                            </h5>
                            <h5 style="color: rgb(255, 255, 255);; text-align: center;">Station area : <?php
                            if ($data[5]==NULL){
                                echo "NULL";
                            }else{
                                echo $data[5]."\n";
                            } ?>
                            </h5>

                            <h5 style="color: rgb(255, 255, 255);; text-align: center;">Station location : <?php 
                            if ($data[6]==NULL){
                                echo "NULL";
                            }else{
                                echo $data[6]."\n";
                            } ?>
                            </h5>
                            <h5 style="color: rgb(255, 255, 255);; text-align: center;"> Convicted Criminals : <?php 
                            if ($data[7]==NULL){
                                echo "NULL";
                            }else{
                                echo $data[7]."\n";
                            } ?>
                            </h5>

                            </h5>
                            <h5 style="color: rgb(255, 255, 255);; text-align: center;"> Assigned Police IDS : <?php 
                            if ($data[8]==NULL){
                                echo "NULL";
                            }else{
                                echo $data[8]."\n";
                            } ?>
                            </h5>

                            <h5 style="color: rgb(255, 255, 255);; text-align: center;"> Hearing Dates : <?php 
                            if ($data[9]==NULL){
                                echo "NULL";
                            }else{
                                echo $data[9]."\n";
                            } ?>
                            </h5>
                        </div>
                            <?php

            }

    }

    
    ?>
    </div>

    

  </body>
</html>