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
        const DEF_COUNT_ROWS = 10;
        $conn = mysqli_connect("127.0.0.1:3306", "root", "223478", "medicine");

        if ($conn == false) {
            echo "<p style='color:red'>"."Connection failed: ".mysqli_connect_error()."</p>";

        } else {
            echo "<div style='alignment: center; text-align: center; padding-top : 8%'>";

            $conn->set_charset("utf8");
            $page = (empty($_GET['page']))? 1 : $_GET['page']; 
            
            $sql = "SELECT COUNT(*)count FROM MEDREQUEST M "
                    ."WHERE M.STATUS NOT IN ('HANDLE', 'DONE')";
            $count_rows = mysqli_query($conn, $sql);
            $count_rows = mysqli_fetch_array($count_rows)[0];
            
            echo "<h1 class='form-title' style='text-align: center'>Кількість заявок на оброку: ".$count_rows."</h1>";

            echo "<div class='nav-bar-wrapper' style='color: red; top: 17%; left: 23%'>";
            echo "<table class='nav-menu-item' style='display: flex; justify-content: space-between'>";
            echo "<tr>";
            echo "<td>ID-Заявки</td>"."<td>Ім'я</td>"."<td>Телефон</td>".
                 "<td>Тип лікаря</td>"."<td>В черзі з</td>"."<td>Статус заявки</td>";
            echo "</tr>";
            echo "<tr></tr>";

            $sql = "WITH MT AS ("
                ."SELECT M.*, T.TYPE_DESC FROM MEDREQUEST M JOIN DOC_TYPES T "
                    ."ON(M.ID_TYPE = T.ID)"
            .") SELECT MT.ID, U.NAME,U.PHONE, MT.TYPE_DESC, MT.DATE_T, MT.STATUS FROM MT JOIN USERS U " 
            ."ON(MT.ID_USER = U.ID) WHERE MT.STATUS NOT IN ('HANDLE', 'DONE') ORDER BY MT.ID DESC";
            
            $queue = mysqli_query($conn, $sql);
            
            $row = mysqli_fetch_array($queue);
            $arr = array(0 => array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]));

            for ($i = 1; $i < $count_rows; $i++) {
                 $row = mysqli_fetch_array($queue);
                 $arr[$i][0] = $row[0];
                 $arr[$i][1] = $row[1];
                 $arr[$i][2] = $row[2];
                 $arr[$i][3] = $row[3];
                 $arr[$i][4] = $row[4];
                 $arr[$i][5] = $row[5];
            }

            for ($i = ($page - 1) * DEF_COUNT_ROWS; $i < $count_rows; $i++) {

                 if ($i >= DEF_COUNT_ROWS * $page) break;
                 
                 echo "<td>".$arr[$i][0]."</td>";
                 echo "<td>".$arr[$i][1]."</td>";
                 echo "<td>".$arr[$i][2]."</td>";
                 echo "<td>".$arr[$i][3]."</td>";
                 echo "<td>".$arr[$i][4]."</td>";
                 echo "<td>".$arr[$i][5]."</td>";
                 echo "</tr>";
            }

            echo "</table>";
            echo "</div>";

            $pages = floor($count_rows / DEF_COUNT_ROWS);
            
            if ($pages < 1) {
                $pages = 1;

            } else if ($count_rows % DEF_COUNT_ROWS != 0) {
                $pages++;
            }

            $prev = ($page - 1 == 0)? 1 : $page - 1;
            echo "<p class='form-title' style='text-align: center; font-size: 17px'>"."current page =".$page."</p>";
            echo "<a class='form-title' href='http://localhost/Space/queue.php?page=".$prev."'>&laquo; </a>";
            for ($i = 1; $i <= $pages; $i++) {
                 echo "<a class='form-title' href='http://localhost/Space/queue.php?page=".$i."'>".$i."; </a>";
            }
            $next = ($page + 1 > $pages)? $pages : $page + 1;
            echo "<a class='form-title' href='http://localhost/Space/queue.php?page=".$next."'> &raquo;</a></div>";
            echo "</div>";
        }
    ?>

    <footer class="footer secondary-text">
        <span class="footer-credentials">
            © 2142 Your Suicide. Всі права отжаті.
    </span>
</footer>
</body>
</html>