<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> 選課 </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <style>

        </style>
    </head>
    <body>
        <div><form action="/new_class/submit" method="post">
            {{ csrf_field() }}
            <?php
                $isStudentsValid = count($students);
                if ($isStudentsValid) {
                    echo "<select name='select_student'>";
                    foreach ($students as $key => $student) {
                        $key = "'".strval($key+1)."'";
                        echo "<option value=$key> $student </option>";
                    }
                    echo "</select>";
                } else {
                    echo "<h3> 錯誤：學生為空 </h3>";
                }

                $isCoursesValid = count($courses);
                if ($isCoursesValid) {
                    echo "<select name='select_course'>";
                    foreach ($courses as $key => $course) {
                        $key = "'".strval($key+1)."'";
                        echo "<option value=$key> $course </option>";
                    }
                    echo "</select>";
                } else {
                    echo "<h3> 錯誤：課程為空 </h3>";
                }
            ?>
            <input type='submit' value='送出表單'>
        </form></div>

        <div>
            <a href="/"> 返回首頁 </a>
        </div>
    </body>
</html>