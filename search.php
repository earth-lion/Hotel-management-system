<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search.css">
    <title>كشف حساب العميل</title>
</head>

<body>
    <H1><em class="h">P</em><em class="e">A</em><em class="r">L</em><em class="t">M</em><em class="z">A</em></H1>
    <form action="" method="post">
        <center><input id="uu" class="search" type="search" name="cuostamer_id"
                placeholder="ادخل رقم هوية العميل " title="ادخل اسم العميل هنا "></center><br><br><br>
        <center><input id="uu" class="submit" type="submit" value="بحث عن العميل">
            <button><a href="cuostamer data.php">صفحة العميل</a></button>
            <button style="background-color: brown;"><a href="login.php">تسجيل الخروج</a></button>
        </center><br><br><br><br><br><br>
    </form>
    <div>
        <center>
            <?php
include "db_conn.php";
$gander = "";
$phone_number = "";
$name_cuostamer = "";
$date = "";
$email = "";
$err = "";
$room_number = "";
$cuostamer_id = "";
$address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cuostamer_id = $_POST["cuostamer_id"];

    if (empty($cuostamer_id)) {
        echo "<h2 class='error'>من فضلك أدخل كود العميل</h2>";
    } elseif (!preg_match("/^[0-9]{14}$/", $cuostamer_id)) {
        echo "<h2 class='error'>يرجى إدخال كود العميل ارقام فقط</h2>";
    } else {
        $sql = "SELECT * FROM cuostamer WHERE cuostamer_id = '$cuostamer_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row) {
                $gander = isset($row["gander"]) ? $row["gander"] : "";
                $room_number = isset($row["room_number"]) ? $row["room_number"] : "";
                $name_cuostamer = isset($row["name_cuostamer"]) ? $row["name_cuostamer"] : "";
                $cuostamer_id = isset($row["cuostamer_id"]) ? $row["cuostamer_id"] : "";
                $phone_number = isset($row["phone_number"]) ? $row["phone_number"] : "";
                $date = isset($row["date"]) ? $row["date"] : "";
                $address = isset($row["address"]) ? $row["address"] : "";
                $email = isset($row["email"]) ? $row["email"] : "";
            }
            echo "<table>";
            echo "<tr><th>Data</th><th>Result</th></tr>";            
            if ($gander) {
                echo "<tr><td>gander</td><td>$gander</td></tr>";
            }
            if ($room_number) {
                echo "<tr><td>Room_Number</td><td>$room_number</td></tr>";
            }
            if ($name_cuostamer) {
                echo "<tr><td>Customer_Name</td><td>$name_cuostamer</td></tr>";
            }
            if ($cuostamer_id) {
                echo "<tr><td>Customer_Id</td><td>$cuostamer_id</td></tr>";
            }
            if ($phone_number) {
                echo "<tr><td>Phone_Number</td><td>$phone_number</td></tr>";
            }
            if ($date) {
                echo "<tr><td>Date</td><td>$date</td></tr>";
            }
            if ($address) {
                echo "<tr><td>Adress</td><td>$address</td></tr>";
            }
            if ($email) {
                echo "<tr><td>Email</td><td>$email</td></tr>";
            }

            echo "</table>";
        } else {
            echo "<h2 class='error'>لا توجد بيانات لعرضها</h2>";
        }
    
        $conn->close();

    }


        } else {
            $err = "<h2 class='error'>لا توجد نتائج لهذه البيانات</h2>";
        }
    
    
?>
        </center>
    </div>
</body>

</html>