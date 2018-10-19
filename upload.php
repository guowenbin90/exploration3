<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

</head>
<body>

<br>
<?php
require_once('connectvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)or die('Error connecting to MySQL server.');
$statusMsg = '';
//file upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    //allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowTypes)){
        //upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $statusMsg = "The file ".$fileName. " has been uploaded.";
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
echo $statusMsg;
// insert record to database
$time = date("Y-m-d : h:i:s");
$size = filesize($targetFilePath);
$query = "INSERT INTO image6(path,size,type,time) VALUES ('$targetFilePath', '$size','$fileType','$time')";
$data = mysqli_query($dbc, $query)or die('Error querying database1');


//redirect to view.php
//sleep(100);
$url="view.php"; 
echo "<script language=\"javascript\">"; 
echo "location.href=\"$url\""; 
echo "</script>"; 
?>
</body>
</html>