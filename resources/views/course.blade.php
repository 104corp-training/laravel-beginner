<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <meta name="robots" content="noarchive">
    <title>Course</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
    <body>
        <div class="container">
            <div class="card">
                <h5 class="card-header">課程資訊</h5>
                <ul class="list-group">
                    @if (count($records[0]))
                        @foreach ($records[0] as $course)
                            <li class="list-group-item">Id:{{ $course->id }}</li>
                            <li class="list-group-item">Name:{{ $course->name }}</li>
                            <li class="list-group-item">Description:<br>{{ $course->description }}</li>
                            <li class="list-group-item">Outline:<br>{{ $course->outline }}</li>
                            <li class="list-group-item">Created_at:<br>{{ $course->created_at }}</li>
                            <li class="list-group-item">Updated_at:<br>{{ $course->updated_at }}</li>
                        @endforeach
                    @else
                        <li class="list-group-item">查無此課程</li>
                    @endif
                </ul>
            </div>
        </div>
    </body>
</html>
