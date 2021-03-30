<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> 新增評論 </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <style>

        </style>
    </head>
    <body>
        <div><form action="/new_comment" method="post">
            {{ csrf_field() }}
            <?php
                $isStudentsValid = count($students);
                if ($isStudentsValid) {
                    echo "<label for='select_student'> 學生 </label>";
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
                    echo "<label for='select_course'> 課程 </label>";
                    echo "<select name='select_course'>";
                    foreach ($courses as $key => $course) {
                        $key = "'".strval($key+1)."'";
                        echo "<option value=$key> $course </option>";
                    }
                    echo "</select>";
                } else {
                    echo "<h3> 錯誤：課程為空 </h3>";
                }

                echo "<label for='select_score'> 評分 </label>";
                echo "<select name='select_score'>";
                $MAX_SCORE = 10;
                for ($i=0; $i<=$MAX_SCORE; $i++) {
                    $key = "'".strval($i)."'";
                    $key_num = strval($i)." / 10";
                    echo "<option value=$key> $key_num </option>";
                }
                echo "</select>";
                echo "</p>";
                echo "<label for'comment_content'> 評論 </label>";
                echo "<input name='comment_content' type='text' size='70' maxlength='35'>";
                echo "</p>";
            ?>
            <input type='submit' value='送出表單'>
        </form></div>

        <div>
            <a href="/"> 返回首頁 </a>
        </div>
    </body>
</html>