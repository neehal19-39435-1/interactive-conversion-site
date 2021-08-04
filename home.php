<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CONVERSION SITE</title>
   <script type="home.js"></script>
</head>
<body>
     
<?php
  
define("filepath", "data2.txt");         
$converter = $result = $value = "";
$converterErr = $resultErr = $valueErr = "";
$flag = false;
$successfulMessage = $errorMessage = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") { 

if (empty($_POST["converter"])) 
{           
   $converterErr = "Do not keep field empty";
   $flag = true;
}

if (empty($_POST["value"])) 
{           
   $valueErr = "Do not keep field empty";
   $flag = true;
}

if(!$flag)
{
   $converter = test_input($_POST["converter"]);
   if(is_numeric($_POST["value"]))
   {
      $value = test_input($_POST["value"]);
   }
   else
   {
      $valueErr = "Enter a numeric form of value.";
   }

}
}

function write($content) {
$file = fopen(filepath, "a");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}

function test_input($data) 
  {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
  }
?>

     <fieldset>
     	
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" name ="home" onsubmit="return isValid();">
        <span style="color: red"><p>Page 1 [Home]</p></span>
        <span style="color: red"><p>Conversion site</p></span>
        <span style="color: blue">1.</span><a href="home.php">Home</a>
        <span style="color: blue">2.</span><a href="conversion.php">Conversion Rate</a>
        <span style="color: blue">3.</span><a href="history.php">History</a>
        <br></br>
        
        
        <span style="color:red"><p>Converter:</p></span>
        <select id= "converter" name="converter">
      <?php
    
      $convoErr = $multErr = $valueErr = "";
      $fileData = read();

      $types=json_decode($fileData);
    foreach($types as $type)
    {
    echo "<option value='$type->rate'>$type->rate</option>";
    }
    ?>
        </select><br><br><br>
        <span id = "converterErr"></span>
        <span style="color:red"><?php echo $converterErr?></span>
        <label for="val">Value:</label>
        <input type="text" id="val" name="val" pattern="[0-9]+">
        <span id = "valueErr"></span>
        <span style="color:red"><?php echo $valueErr?></span>
        <input type="submit" name="Submit">
        <br></br>
   <?php 
   $multiply = "";
   $fileData = read();
    $conversion=json_decode($fileData);
    foreach($conversion as $convert)
    {
    if($convert->rate === $converter)
    {
       $multiply = $value * $rate->result;
    }
    }

   echo "Result:<input type='text' value='$multiply'/>"; 
   ?>


     </fieldset>


<?php
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

</body>
</html>