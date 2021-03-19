<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>課程資訊</title>

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
                font-weight: 600;
            }

            .subtitle {
                font-size: 20px;
                font-weight: 400;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .link-area-limit {
                width: 900px;
            }

            .small-limit {
                width: 100px;
            }

            .classic-font {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                line-height: 30px;
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

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 10px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    <?php echo $name; ?>
                </div>

                <div>
                    <div class="subtitle">
                        <?php echo "課程描述"; ?>
                    </div>

                    <div class="classic-font m-b-md link-area-limit">
                        <?php echo $description; ?>
                    </div>

                    <div class="subtitle">
                        <?php echo "課程大綱"; ?>
                    </div>

                    <div class="classic-font m-b-md link-area-limit">
                        <?php 
                            echo $outline; 
                        ?>
                    </div>          
                <div>  

                <div>
                    <div class="subtitle">
                        <?php echo "修課資訊" ?>
                    </div> 
                    <div class="m-b-md link-area-limit flex-center small-limit'">
                        <?php
                            if( $searchResult != false ) {
                                echo "<table>";
                                echo "<tr>
                                    <th> First Name </th>
                                    <th> Last Name </th>
                                </tr>";
                                foreach ($searchResult as $student) {
                                    echo "<tr class='classic-font'>";
                                    foreach ($student as $key => $value) {
                                        $isOutout = ($key == "first_name") || ($key == "last_name");
                                        if ($isOutout) {
                                            echo "<td> $value </td>";
                                        }
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "尚未有學生修習此課";
                            }
                        ?>
                    </div>
                </div>

                <div>
                    <a class="classic-font" href="/"> 返回首頁 </a>
                </div>
            </div>
        </div>
    </body>

    <script>
        
    </script>
</html>
