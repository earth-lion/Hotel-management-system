<?php 

session_start();        //يبداء في تخزين البيانات

session_unset();           //يتم حذف المعلومات من الجلسه

session_destroy();                  //يتم حذف المعلومات من الجلسه لاكن يتم الوصول اليها مره اخري

header("Location: index.php");         //اعاده توجيه المستخدم الي صفحة ال index