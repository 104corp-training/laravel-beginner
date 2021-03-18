<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-
scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <meta name="robots" content="noarchive">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/
bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-
JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" rel=“stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/
jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card">
            <h5 class="card-header">{{$name}} </h5>
            <div class="card-body">
                <p>Description: {{$courseContent}}</p>
            </div>
            <ul class="list-group">
                <?php
                $output = "";
                foreach ($courseNameDict as $otherCourseName => $otherCourseContent) {
                    if ($otherCourseName != $name) {
                        $output .= '<li class="list-group-item"><a href="/profile/' . $otherCourseName . '">' . $otherCourseName . '</a></li>';
                    }
                }
                echo $output;
                ?>
            </ul>

        </div>
    </div>
</body>
</head>

</html>