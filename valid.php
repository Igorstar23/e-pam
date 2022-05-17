<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Not your Space</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <?php
        $conn = mysqli_connect("127.0.0.1:3306", "root", "223478", "medicine");
        
        if ($conn == false) {
            echo "<p style='color:red'>"."Connection failed: ".mysqli_connect_error()."</p>";

        } else {
            $conn->set_charset("utf8");
            $query = "SELECT U.NAME, U.PHONE, M.DATE_T, M.TYPE FROM ("
                ."SELECT MT.*, T.TYPE FROM MEDREQUEST MT JOIN doc_types T ON(MT.id_type = T.id)"
                .")M JOIN users U ON(M.ID_USER = U.ID) WHERE U.NAME = '".$_GET['name']."' AND U.PHONE = '".$_GET['phone']."' AND M.TYPE = '"
                .$_GET['select']."'";
            
            $result = mysqli_query($conn, $query);
            $res = mysqli_fetch_array($result);
        }
        
        echo "<div style='alignment: center; text-align: center; padding-top : 5%'>";
        echo "<div>";

        if ($res == false) {
            $maxId = mysqli_query($conn, "SELECT MAX( IFNULL(ID, 0))id FROM USERS");
            $maxId = mysqli_fetch_array($maxId)[0];
            $query = "INSERT INTO USERS(ID, NAME, PHONE) VALUES (".++$maxId.", '".$_GET['name']."', '".$_GET['phone']."')";
            
            if ($conn->query($query) !== TRUE) echo "<p style='color: yellow'>Error write to User!".$conn->connect_error()."</p>";
            
            $id_type = 1;

            if ($_GET['select'] == 'mr_scd') {
                $id_type = 2;

            } else if ($_GET['select'] == 'dr_kill') {
                $id_type = 3;

            } else if ($_GET['select'] == 'dr_vader') {
                $id_type = 4;
            }
            
            $query = "INSERT INTO MEDREQUEST(ID_USER, ID_TYPE, DATE_T) VALUES (".$maxId.", ".$id_type.", NOW())";

            if ($conn->query($query) !== TRUE) echo "<p style='color: yellow'>Error write to MedRequest!".$conn->connect_error()."</p>";

            echo "<img class='registration-form-image' id='evil-img' src='./Assets/girl 1.png' alt='planet-img'>";
            echo "<p'><h1 class='form-title' style='text-align: center'>DONE!<br>REQUEST ADDED</h1></p>";

        } else {
            
            echo "<img class='registration-form-image' id='evil-img' src='./Assets/mrsuicide 1.png' alt='planet-img'>";
            echo "<p><h1 class='form-title' style='text-align: center'>REQUEST NOT PASS!</h1></p>";
        }
        echo "<button class='form-submit-button' type='submit' onclick='window.location.href=\"index.php\"'>GO HOME</button>";
        echo "</div></div>";
        $conn->close();
    ?>
    
    <footer class="footer secondary-text">
        <span class="footer-credentials">
            © 2142 Your Suicide. Всі права отжаті.
        </span>
    </footer>
</body>
</html>