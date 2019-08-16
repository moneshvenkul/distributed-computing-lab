<?php
// Define recursive function to extract nested values
function printValues($arr) {
    global $count;
    global $values;
        // Check input is an array
    if(!is_array($arr)){
        die("ERROR: Input is not an array");
    }
    /*    Loop through array, if value is itself an array recursively call the     function else add the value found to the output items array,     and increment counter by 1 for each value found     */
    foreach($arr as $key=>$value){
        if(is_array($value)){
            printValues($value);
        } else{
            $values[] = $value;
            $count++;
        }
    }
        // Return total count and values found in array
    return array('total' => $count, 'values' => $values);
}
 // Assign JSON encoded string to a PHP variable
$json = '{
    "Student": {
        "name": "Sathyabama",
        "Mobile": "1234567809",
        "E-Mail": "xyz@gmail.com",
        "City": "Chennai",
        "Details": {
            "Dept": "CSE", "Section": "A", "Gender": "Female"
        }
    }
}';
// Decode JSON data into PHP associative array format
echo "JSON and PHP";
echo"<br> <br>";
$arr = json_decode($json, true);
 // Call the function and print all the values
echo "Contents of JSON Object";
echo"<br> <br>";
$result = printValues($arr);

echo implode("<br>", $result["values"]);
echo "<h3>" . $result["total"] . " value(s) found: </h3>";
 
echo "<hr>";

// Print a single value
echo "Name  : ".$arr["Student"]["name"] . "<br>"; 
echo "Mobile : ".$arr["Student"]["Mobile"]. "<br>";  
echo "Email  : ".$arr["Student"]["E-Mail"]. "<br>";
echo "Dept  : ".$arr["Student"]["Details"]["Dept"] . "<br>";
echo "Section : ".$arr["Student"]["Details"]["Section"] . "<br>";  
echo "Gender :   ".$arr["Student"]["Details"]["Gender"] . "<br>";  
?>      	
