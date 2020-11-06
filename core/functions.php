<?php 

function runQuery($sql){
    $con = conn();
    if(mysqli_query($con,$sql)){
    return true;
    }
}
function showTime($timestamp,$format="d/M/Y"){
    return date($format,strtotime($timestamp));
}
function showTimeH($timestamp,$format="h:i:s"){
    return date($format,strtotime($timestamp));
}

function fetch($sql){
    $query = mysqli_query(conn(),$sql);
    $row= mysqli_fetch_assoc($query);
    return $row;
}

function fetchAll($sql){
    $query = mysqli_query(conn(),$sql);
    $rows = [];
    while($row = mysqli_fetch_assoc($query)){
        array_push($rows,$row);
    }
    return $rows;
}
function linkTo($l){
    echo "<script>location.href='$l'</script>";
}
function countTotal($table,$condition = 1){
    $sql = "SELECT COUNT(id) FROM $table WHERE $condition";
    $table = fetch($sql);
    return $table['COUNT(id)'];
}
function alert($str,$color="danger"){
    echo "<P class='alert alert-$color'>$str</P>";
}
function short($str,$length="100"){
    return substr($str,0,$length)."...";
}

function textFilter($str){
    $str = trim($str);
    $str = htmlentities($str, ENT_QUOTES);
    $str = stripslashes($str);
    return $str;
}

$name = "";
$address = "";
$email = "";
$phone = "";
$gender = "";

function register(){

    global $gendersArr;
    global $skillsArr;

    $errorStatus = 0;
    if(empty($_POST['name'])){
        setError('name', "Name is Required!");
        $errorStatus = 1;
    }else{
        if(strlen($_POST['name']) < 5){
            setError('name', "Name is too short!");
            $errorStatus = 1;
        }else{
            if(strlen($_POST['name']) > 25){
                setError('name', "Name is too Long!");
                $errorStatus = 1;
            }else{
                if(!preg_match("/^[a-zA-Z- ]*$/", $_POST["name"])){
                    setError('name', "Only Letters and White Spaces are allowed");
                    $errorStatus = 1;
                }else{
                    $name = textFilter($_POST["name"]);
                }
            }
        }
    }

    if(empty($_POST["email"])){
        setError('email', "Email is Required!");
        $errorStatus = 1;
    }else{
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            setError("email", "You must use a vaild email format.");
            $errorStatus = 1;
        }else{
            $email = textFilter($_POST["email"]);
        }
    }

    if(empty($_POST["phone"])){
        setError('phone', "Phone Number is Required!");
        $errorStatus = 1;
    }else{
        if(!preg_match("/^[0-9- ]*$/", $_POST['phone'])){
            setError("phone", "You must use a vaild phone number.");
            $errorStatus = 1;
        }else{
            $phone = textFilter($_POST["phone"]);
        }
    }    
    
    if(empty($_POST['address'])){
        setError('address', "Address is Required!");
        $errorStatus = 1;
    }else{
        if(strlen($_POST['address']) < 10){
            setError('address', "Address is too short!");
            $errorStatus = 1;
        }else{
            if(strlen($_POST['address']) > 50){
                setError('address', "Address is too Long!");
                $errorStatus = 1;
            }else{
                $address = textFilter($_POST["address"]);
            }
        }
    }

    if(empty($_POST["gender"])){
        setError("gender", "Please Select One");
        $errorStatus = 1;
    }else{
        if(!in_array($_POST["gender"], $gendersArr)){
            setError("gender", "Please :>");
            $errorStatus = 1;
        }else{
            $gender = textFilter($_POST["gender"]);
        }
    }

    if(empty($_POST["skill"])){
        setError("skill", "Please Select One or More");
        $errorStatus = 1;
    }else{
        $skills = $_POST["skill"];
        $skillError = 0;
        foreach($skills as $s){
            if(!in_array($s, $skillsArr)){
                setError("skill", "Please :>");
                $errorStatus = 1;
                $skillError = 1;
            }else{

            }
        }
        if(!$skillError){
            $skill = $_POST["skill"];
        }
    }

    $supportFile = ["image/jpeg", "image/png"];
    print_r($_FILES);
    if(isset($_FILES['upload']['name'])){
        $tempFile = $_FILES["upload"]["tmp_name"];
        $fileName = $_FILES["upload"]["name"];
        $saveFolder = "store/";
        if (in_array($_FILES["upload"]["type"], $supportFile)){
            $newName = $saveFolder.uniqid()."_".$fileName;
            if(move_uploaded_file($tempFile,$newName)){
            }
        }else{
            setError("profile", "Please input an image.");
        }
    }else{
        setError("profile", "Profile picture is required!");
    }

    if(!$errorStatus){
        $sql = "INSERT INTO contacts (name,email,phone,photo) VALUES ('$name','$email','$phone','$newName')";
        if(runQuery($sql)){
    }}

    if($errorStatus == 0){
        print_r($_POST);
    }else{

    }
}

function setError($name, $message){
    $_SESSION["error"][$name] = $message;
}

function getError($name){
    if(isset($_SESSION["error"][$name])){
        echo ($_SESSION["error"][$name]);
    }else{
        echo "";
    }
}

function clearError(){
    $_SESSION["error"] = [];
}

function old($name){
    if(isset($_POST[$name])){
        echo $_POST[$name];
    }else{
        echo "";
    }
}

function old_get($name){
    if(isset($_POST[$name])){
        return $_POST[$name];
    }else{
        return "";
    }
}

function contact(){
    $sql = "SELECT * FROM contacts";
    return fetchAll($sql);
}

?>