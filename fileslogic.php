<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', 'Bsdk@BKp007', 'projectworld');

$sql = "SELECT * FROM repository";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    $Project_ID = $_POST['Project_ID'];
    $Project_Name = $_POST['Project_Name'];
    $Contributors = $_POST['Contributors'];
    $Branch = $_POST['Branch'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO repository (Project_ID, Project_Name, Repository, Contributors, Branch, downloads)
             VALUES ('$Project_ID','$Project_Name','$filename','$Contributors','$Branch', 0)";
            if (mysqli_query($conn, $sql)) {
                echo '<script type="text/javascript">alert("File uploaded successfully")</script>';
                
            }
        } else {
            echo '<script type="text/javascript">alert("Failed to upload file.")</script>';
        }
    }
}
// Downloads files
if (isset($_GET['file_ID'])) {
    $id = $_GET['file_ID'];

    // fetch file to download from database
    $sql = "SELECT * FROM repository WHERE id=$id ";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['Repository'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['Repository']));
        readfile('uploads/' . $file['Repository']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE repository SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
?>