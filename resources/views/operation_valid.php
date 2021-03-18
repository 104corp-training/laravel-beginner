<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .subtitle {
                font-size: 30px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .area-of-links {
                width: 900px;
            }

            .class-link {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                line-height: 50px;
            }

            .bigger-font {
                color: #636b6f;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                line-height: 50px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    <?php echo $title; ?>
                </div>

                <div class="subtitle m-b-md">
                    <?php echo $description; ?>
                </div>

                <?php
                    if ($note === "(none)") {
                        echo "<a class='bigger-font' href='/'> 無學習筆記資料，點此返回 </a>";
                    } else {
                        echo "<a class='bigger-font' href='$note'> 學習筆記連結 </a>";
                    }

                    if ($resource === "(none)") {
                        echo "<a class='bigger-font' href='/'> 無學習資源資料，點此返回 </a>";
                    } else {
                        echo "<a class='bigger-font' href='$resource'> 學習資源連結 </a>";
                    }
                ?>                

                <div>
                    <a class="class-link" href="/"> 返回首頁 </a>
                </div>
            </div>
        </div>
    </body>

    <script>
        
    </script>
</html>
