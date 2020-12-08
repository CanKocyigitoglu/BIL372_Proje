<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script>
        function checkAll(bx) {
            var cbs = document.getElementsByTagName('input');
            for(var i=0; i < cbs.length; i++) {
                if(cbs[i].type == 'checkbox') {
                    cbs[i].checked = bx.checked;
                }
            }
        }
    </script>
</head>
<body style="background-color: rgb(196, 202, 207);">
<form action="/home/add_question_exam_add/<?php print_r($exam_id); ?>" method="post">
    <div class="container">
        <div class="row">
        <table id="example" class="table table-striped table-bordered" style="width:100%; margin-top: 2rem;">
            <thead>
                <tr>
                    <th>Choose</th>
                    <th>Question</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($questions as $question) {
                print_r("<tr>
                      <td><input type=\"checkbox\" name=\"".$question['Soru_ID']."\" value=\"".$question['Soru_ID']."\"></td>
                    <td>".$question['Konusu'].": ".$question['Sorusu']."</td>
                </tr>");
            }
            ?>
            </tbody>
            <tfoot>
                <tr></tr>
            </tfoot>
        </table>
        </div>
    </div>
    <div>
        <button style="margin-left: 76.9%;" class="btn btn-success" type="submit">add</button>
    </div>
</form>
</body>
</html>