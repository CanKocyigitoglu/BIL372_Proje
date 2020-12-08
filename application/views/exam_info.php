<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="exam-info.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .mb-0 > a {
            display: block;
            position: relative;
        }
        .mb-0 > a:after {
            content: "\f078"; /* fa-chevron-down */
            font-family: 'FontAwesome';
            position: absolute;
            right: 0;
        }
        .mb-0 > a[aria-expanded="true"]:after {
            content: "\f077"; /* fa-chevron-up */
        }
        body{
            background-color: 22223b;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }
        .jumbotron{
            background-color: f2e9e4 !important;
        }
        .header{
            color: 006466;
        }
        .card{
            background-color: f2e9e4;
        }
        .white{
            color: green !important;
        }
    </style>
  
</head>
<body>
    <nav class="navbar navbar-expand-sm   navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/home">Exams <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/home/questions">Create Question</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/login/logout">Logout</a>
            </li>
        </ul>
      </div>
    </nav>
    <div id="accordion" class="container mt-5">
        <div class="jumbotron">
            <h3 class="header">Exam: <?php echo $exam_name; ?></h3>
        </div>
        <?php

        $counter = 1;
        foreach ($list as $question) {

            print_r("<div class=\"card\">
          <div class=\"card-header\" id=\"heading-1\">
            <h5 class=\"mb-0\">
              <a href=\""."/home/question_info/".$question['Soru_ID']."\">
                Question: ".$counter++.") ".$question['Sorusu']."
              </a>
            </h5>
          </div>");
        }

        ?>
</body>
</html>