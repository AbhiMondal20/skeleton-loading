<?php

//fetch.php;

$connect = new PDO("mysql:host=localhost; dbname=tbl_post", "root", "");

if(isset($_POST['limit']))
{
 $limit  = $_POST['limit'];
 $sql = 'SELECT * FROM tbl_post ORDER BY id DESC LIMIT '.$limit.'';
 
 $statement = $connect->prepare($sql);
 $statement->execute();
 $result = $statement->fetchAll();

 $output = '';

 foreach($result as $row)
 {
  $output .= '
        <div class="row">
            <div class="col-md-4">
                <img src="'.$row["post_image"].'" class="img-thumbnail" />
            </div>
            <div class="col-md-8">
                <h2><a href="'.$row["post_url"].'">'.$row["post_title"].'</a></h2>
                <br />
                <p>'.$row["post_description"].'</p>
            </div>
        </div>
        <hr />
  ';
 }

 echo $output;
}

?>
