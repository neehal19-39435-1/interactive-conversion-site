<?php
define("filepath", "data2.txt");
$convrate = "";
$convrateErr ="";  
$flag = false;


    if (empty($_GET["rate"])) 
    {  
       $convrateErr = " Catagory is required";
       $flag = True;  
    } 
       if(!$flag) 
    {
      $convrate = input_data($_GET["rate"]);
 $fileData = read();
echo "<br><br>";
$temps=json_decode($fileData);

 echo "<ol>";
    foreach($temps as $temp)
   {
      if($temp->rate === $convrate )
      {
      echo "<li>" .$temp->rate."&nbsp;&nbsp;&nbsp;&nbsp;" . $temp->value . "&nbsp;&nbsp;&nbsp;&nbsp;" . $temp->result . "</li>";
      }
   }
   echo "</ol>";
   }
  function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
  }
function read() {
$file = fopen(filepath, "r");
$fz = filesize(filepath);
$fr = "";
if($fz > 0) {
$fr = fread($file, $fz);
}
fclose($file);
return $fr;
}
?>