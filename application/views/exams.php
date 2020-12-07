<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h3>EXAMS</h3>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <?php
                    foreach ($exams[0] as $key => $value) {
                        print_r("<th>".$key."</th>");
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
            <?php

            foreach ($exams as $exam) {
                print_r("<tr>");
                foreach ($exam as $each) {
                    print_r("<td><a href='./home/exam_info/".$exam['Sinav_ID']."'>".$each."</a></td>");
                }
                print_r("</tr>");
            }

            ?>
              </tbody>
        </table>
    </div>
</body>
</html>