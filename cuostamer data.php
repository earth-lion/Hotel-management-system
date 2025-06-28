<!DOCTYPE html>
<html lang="en" dir="auto">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cuostamer.css">
    <title>صفحة العميل</title>
</head>

<body>
    <?php

            include "db_conn.php";

            // دالة تنظيف البيانات
            function test_input($data) //
            {
                $data = trim($data);          // remove empty lines spacs
                $data = stripslashes($data);   
                $data = htmlspecialchars($data);      //تحويل علامات اش تي ام ال الي كود غير مفهوم علشان الكود مايتقراش
                return $data;
            }

         if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
               # $gander =  $_POST["gander"];
                $room_number =  ($_POST["room_number"]);
                $name_cuostamer =  ($_POST["name_cuostamer"]);
                $cuostamer_id =  ($_POST["cuostamer_id"]);
                $phone_number =  ($_POST["phone_number"]);
                $date =  ($_POST["date"]);
                $address =  ($_POST["address"]);
                $email =  ($_POST["email"]);
            
                
                $sql = "INSERT INTO cuostamer (room_number, name_cuostamer, cuostamer_id,phone,date,address,email)
                VALUES ('$room_number', '$name_cuostamer', '$cuostamer_id','$phone_number','$date','$address','$email')";
                    
                if (empty($name_cuostamer) || empty($phone_number) || empty($cuostamer_id) ) {
                } else {
                    if (!preg_match("/^[a-zA-Z ]*$/", $name_cuostamer)) {
                    } elseif (!preg_match("/^[0-9]{11}$/", $phone_number)) {
                    } elseif (!preg_match("/^[0-9]{14}$/", $cuostamer_id)) {
                        
                    } else {
                        echo "<br>";
                        echo "<br>";
            if ($conn->query($sql)) {
                $successMessage = "تم الحجز بنجاح";
            } else {
                $errorMessage = "Error: " . $conn->error;                        }
                    }
                
                }
            }
        ?>

    <div class="form-container">
        <form action="" method="post" class="form">
            <h1>بيانات النزيل</h1>
            <div class="form-group">
                <label for="room_number">رقم غرفة النزيل</label>
                <input type="number" id="room_number" name="room_number" placeholder="ادخل رقم الغرفة" required
                    autofocus>
            </div>
            <div>
                <center>
                    <?php
                                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                                {
                            
                                    if (empty($room_number))
                                    {
                                        echo "<span style='color: red;'>يرجى إدخال رقم غرفة النزيل</span>";
                                    } else {
                                        if(!preg_match("/^(?=.*3)(?:[1-9][0-9]?|100)$/",$room_number)){
                                            echo "<span style='color: red;'>الرجاء إدخال رقم الغرفة من 1 الي 100 </span>";
                                        }
                                        else{
                                        
                                            $room_number=test_input($room_number);
                                        }
                                    }
                                }
                                
                            ?>
                </center>
            </div>
            <div class="form-group">
                <label for="name_cuostamer">اسم النزيل</label>
                <input type="text" id="name_cuostamer" name="name_cuostamer" placeholder="ادخل اسم النزيل" required>
            </div>
            <div>
                <center>
                    <?php
                            
                                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                                        {
                            
                                    if (empty($name_cuostamer))
                                    {
                                        echo "<span style='color: red;'>يرجى إدخال اسم العميل</span>";
                                    } else {
                                        if (!preg_match("/^[a-zA-Z ]*$/", $name_cuostamer)) {
                                            echo "<span style='color: red;'>الرجاء إدخال أحرف فقط</span>";
                                        }else
                                        {
                                            $name_cuostamer=test_input($name_cuostamer);
                                        }
                                    }
                                }
                            ?>
                </center>
            </div>
            <div class="form-group">
                <label for="cuostamer_id">رقم تأكيد الهوية</label>
                <input type="number" id="cuostamer_id" name="cuostamer_id" placeholder="ادخل رقم الهوية" required>
            </div>
            <div>
                <center>
                    <?php
                            
                                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                                        {
                            
                                    if (empty($cuostamer_id))
                                    {
                                        echo "<span style='color: red;'>يرجى إدخال رقم الهويه</span>";
                                    } else {
                                        if (!preg_match("/^[0-9]{14}$/", $cuostamer_id)) {
                                            echo "<span style='color: red;'>الرقم التعريفي يجب أن يتكون من 14 رقم</span>";
                                        }else
                                        {
                                            $cuostamer_id=test_input($cuostamer_id);
                                        }
                                    }
                                }
                            ?>
                </center>
            </div>
            <div class="form-group">
                <label for="address">عنوان النزيل</label>
                <input type="text" id="address" name="address" placeholder="ادخل العنوان" required>
            </div>
            <div>
                <center>
                    <?php
                            
                                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                                        {
                            
                                    if (empty($address))
                                    {
                                        echo "<span style='color: red;'>يرجى إدخال العنوان</span>";
                                    } else
                                        {
                                            $address=test_input($address);
                                        }
                                    }
                                
                            ?>
                </center>
            </div>
            <div class="form-group">
                <label for="date">تاريخ اليوم</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div>
                <center>
                    <?php
                            
                                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                                        {
                            
                                    if (empty($date))
                                    {
                                        echo "<span style='color: red;'>يرجى إدخال  تاريخ النزيل</span>";
                                    } else
                                        {
                                            $date=test_input($date);
                                        }
                                    }
                                
                            ?>
                </center>
            </div>
            <div class="form-group">
                <label for="phone_number">رقم الهاتف</label>
                <input type="tel" id="phone_number" name="phone_number" placeholder="ادخل رقم الهاتف" required>
            </div>
            <div>
                <center>
                    <?php
                            
                                    
                                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                                {    
                                    if (empty($phone_number)) {
                                        echo "<span style='color: red;'>يرجى إدخال رقم الهاتف </span>";
                                    } else {
                                        if (!preg_match("/^[0-9]{11}$/", $phone_number))  {
                                            echo "<span style='color: red;'> رقم التلفون ايجب أن يتكون من 11 رقم</span>";
                                        }else
                                        {
                                            $phone_number=test_input($phone_number);
                                        }
                                    }     
                                }                   
                            ?>
                </center>
            </div>
            <div class="form-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" placeholder="ادخل البريد الإلكتروني" required>
            </div>
            <div>
                <center>
                    <?php
                            
                                    
                                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                                {    
                                    if (empty($email)) {
                                        echo "<span style='color: red;'>يرجى إدخال  البريد </span>";
                                    } else
                                        {
                                            $email=test_input($email);
                                        }
                                    }     
                                                   
                            ?>
                </center>
            </div>

            <center>
                <div class="form-group">
                    <input class="btn" type="submit" value="حفظ البيانات">
                    <button class="btn"><a href="search.php">البحث عن نزيل</a></button>
                    <input class="btn" type="reset" value="مسح الكل">

            </center>
            <center>

            </center>

    </div>
    </form>
    <?php if (isset($successMessage)) : ?>           <!-- اختبار اذا كان هذا المتغير مزجود ام لا فا يقوم بعرض رسالة النجاح-->
    <div style="font-size: 26px; color: green; text-align: center; ">
        <?php echo $successMessage; ?>
    </div>
    <?php endif; ?>

    <?php if (isset($errorMessage)) : ?>                 <!-- اختبار اذا كان هذا المتغير مزجود ام لا فا يقوم بعرض رسالة الخطاء-->
    <div style="font-size: 18px; color: red; text-align: center;">
        <?php echo $errorMessage; ?> 
    </div>
    <?php endif; ?>
    </div>
    </div>

</body>

</html>