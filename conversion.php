<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Conversion</title>
<script type="conversion.js"></script>
</head>
<body>
<?php 
define("filepath", "data2.txt");
$crateErr = $valErr = $resultErr = "";
$crate = $val = $result = "";
$flag = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 

if (empty($_POST["crate"])) 
    {  
       $crateErr = " Please insert value ";
       $flag = True;  
    } 

if (empty($_POST["val"])) 
    {  
       $valErr = " Please insert value ";
       $flag = True;  
    } 
if (empty($_POST["result"])) 
    {  
       $resultErr = "Please insert value";
       $flag = True;  
    } 
 
if(!$flag) 
    {
   
    $crate = input_data($_POST["crate"]);
    if(is_numeric($_POST["val"]))
    {
        $val = input_data($_POST["val"]);
    }
    else
    {
          $valErr = "Value must be in numeric form";
    }
    if(is_numeric($_POST["result"]))
    {
        $result = input_data($_POST["result"]);
        
    }
    else
    {
          $resultErr = "Value must be in numeric form";
    }

    $fileData = read();
    if(empty($fileData)) 
    {
    $data[] =array("rate" => $crate,"value" => $val, "result" => $result);
    }
    else {
    $data = json_decode($fileData);
    array_push($data, array("rate" => $crate,"value" => $val, "result" => $result));
    }

        $data_encode = json_encode($data);
        write("");
        $res = write($data_encode);
    if($res) {
    echo "Sucessfully saved.";
    }
    else {
    echo "Error while saving.";
    }
  
      }  
  }

  function input_data($data) 
  {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
  }
 function write($content) {
$file = fopen(filepath, "w");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" name ="conversion" onsubmit="return isValid();">
<fieldset>
<span style="color: red"><p>Page 2 [Conversion Rate]</p></span>
<span style="color: red"><p>Conversion site</p></span>
<span style="color: blue">1.</span><a href="home.php">Home</a>
<span style="color: blue">2.</span><a href="conversion.php">Conversion Rate</a>
<span style="color: blue">3.</span><a href="history.php">History</a><br><br>
<span style="color: red"><p>Conversion Rate:</p></span><br>
<input type="text" id="crate" name="crate" >
<span id="crateErr" ></span>
<span style="color: red"><?php echo $crateErr; ?> </span>
<input type="text" id="val" name="val" >
<span id="valErr" ></span>
<span style="color: red"><?php echo $valErr; ?> </span>
<input type="text" id="result" name="result" >
<span id="resultErr" ></span>
<span style="color: red"><?php echo $resultErr; ?> </span>
<input type="submit" name="Submit" value="submit">
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

</form>
</body>
</html>