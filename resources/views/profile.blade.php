<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <meta name="robots" content="noarchive">
    <title>課程列表</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
    <body>
        <div class="container">
            <div class="card">
                <h5 class="card-header">課程列表</h5>
                <div class="card-body" id="courseDetail" style="display:none;">
                    <p class="course-title">名稱: </p>
                    <p class="result"></p>
                </div>
                <div class="card-footer" id="rtn-button" style="display:none;">
                    <button class="btn btn-primary profileBtn">返回</button>
                </div>

                @if (count($records))
                    <ul class="list-group" id="list-group" style="display:block;">
                    @foreach ($records as $record)
                        @component('record')
                            @slot('title')
                            {{ $record['id'] }}
                            @endslot
                            <a href="javascript:void(0);" onclick="course({{ $record['id'] }}, '{{ $record['name'] }}')"> {{ $record['name'] }}</a>
                        @endcomponent
                    @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </body>
<script>
    $(function() {
        let $result = $('.result');
        let $header = $('.card-header');
        $('.profileBtn').click(function(e) {
            // $.ajax({
            //     url: '/api/profile/info',
            //     dataType: 'json',
            //     success: function(data) {
            //         $result.html(JSON.stringify(data));
            //     },
            //     error: function(xhr) {
            //         alert(xhr.message);
            //     }
            // });

            $header.html("課程列表");
            document.getElementById('courseDetail').style.display = 'none';
            document.getElementById('rtn-button').style.display = 'none';
            document.getElementById('list-group').style.display = 'block';
        });
    });

    function course(id, name) {
        let $result = $('.result');
        let $title = $('.course-title');
        let $header = $('.card-header');

        $.ajax({
            url: '/api/courses/histories/' + id,
            dataType: 'json',
            success: function(data) {
                let hitories = JSON.parse(JSON.stringify(data));
                console.log(JSON.parse(JSON.stringify(data)));
                let records = hitories.map(item => '<div> 日期：' + item['course_date'].substr(0, 11) + ', 內容：' + item['description'] + '</div>')

                $result.html(records);
            },
            error: function(xhr) {
                alert(xhr.message);
            }
        });

        $header.html("學習歷程");
        $title.html("課名: "+ name);
        document.getElementById('courseDetail').style.display = 'block';
        document.getElementById('rtn-button').style.display = 'block';
        document.getElementById('list-group').style.display = 'none';
    }

</script>
</html>
