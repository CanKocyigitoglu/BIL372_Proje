<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/exam-info.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</head>
<body>
    <nav class="navbar navbar-expand-sm   navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="http://127.0.0.1:5500/application/views/exams.html">Exams <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://127.0.0.1:5500/application/views/input.html">Create Question</a>
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
              <a role=\"button\" data-toggle=\"collapse\" href=\"#collapse-1\" aria-expanded=\"true\" aria-controls=\"collapse-1\">
                Question: ".$counter++.") ".$question['Sorusu']."
              </a>
            </h5>
          </div>");
        }

        ?>
        <div class="card">
          <div class="card-header" id="heading-1">
            <h5 class="mb-0">
              <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                Question 1
              </a>
            </h5>
          </div>
          <div id="collapse-1" class="collapse show" data-parent="#accordion" aria-labelledby="heading-1">
            <div class="card-body">
              <div id="accordion-1">
                <div class="card">
                  <div class="card-header" id="heading-1-2">
                    <h5 class="mb-0">
                      <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-2">
                        A
                      </a>
                    </h5>
                  </div>
                  <div id="collapse-1-1" class="collapse" data-parent="#accordion-1" aria-labelledby="heading-1-2">
                    <div class="card-body">
                      <table class="table table-bordered">
                        <tbody class="white">
                            <tr>
                                <td>Öğrenci 1 ve cevap ile ilgili bilgileri</td>
                            </tr>
                            <tr>
                                <td>Öğrenci 2 ve cevap ile ilgili bilgileri</td>
                            </tr>
                            <tr>
                                <td>Öğrenci 3 ve cevap ile ilgili bilgileri</td>
                            </tr>
                            <tr>
                                <td>Öğrenci 4 ve cevap ile ilgili bilgileri</td>
                            </tr>
                            <tr>
                                <td>Öğrenci 5 ve cevap ile ilgili bilgileri</td>
                            </tr>
                            <tr>
                                <td>Öğrenci 6 ve cevap ile ilgili bilgileri</td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
                 
            </div>
          </div>
          <div id="collapse-1" class="collapse show" data-parent="#accordion" aria-labelledby="heading-1">
            <div class="card-body">
              <div id="accordion-1">
                <div class="card">
                  <div class="card-header" id="heading-1-2">
                    <h5 class="mb-0">
                      <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
                        B
                      </a>
                    </h5>
                  </div>
                  <div id="collapse-1-2" class="collapse" data-parent="#accordion-1" aria-labelledby="heading-1-2">
                    <div class="card-body">
                      <table class="table table-bordered">
                        <tbody class="white">
                            <tr>
                                <td>Öğrenci 1 ve cevap ile ilgili bilgileri</td>
                            </tr>
                            <tr>
                                <td>Öğrenci 2 ve cevap ile ilgili bilgileri</td>
                            </tr>
                            <tr>
                                <td>Öğrenci 3 ve cevap ile ilgili bilgileri</td>
                            </tr>
                            <tr>
                                <td>Öğrenci 4 ve cevap ile ilgili bilgileri</td>
                            </tr>
                            <tr>
                                <td>Öğrenci 5 ve cevap ile ilgili bilgileri</td>
                            </tr>
                            <tr>
                                <td>Öğrenci 6 ve cevap ile ilgili bilgileri</td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
                 
            </div>
          </div>
        </div>
        <div class="card">
            <div class="card-header" id="heading-2">
              <h5 class="mb-0">
                <a role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="true" aria-controls="collapse-2">
                  Question 2
                </a>
              </h5>
            </div>
            <div id="collapse-2" class="collapse show" data-parent="#accordion" aria-labelledby="heading-2">
              <div class="card-body">
                <div id="accordion-2">
                  <div class="card">
                    <div class="card-header" id="heading-1-2">
                      <h5 class="mb-0">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-2">
                          A
                        </a>
                      </h5>
                    </div>
                    <div id="collapse-1-1" class="collapse" data-parent="#accordion-1" aria-labelledby="heading-1-2">
                      <div class="card-body">
                        <table class="table table-bordered">
                          <tbody class="white">
                              <tr>
                                  <td>Öğrenci 1 ve cevap ile ilgili bilgileri</td>
                              </tr>
                              <tr>
                                  <td>Öğrenci 2 ve cevap ile ilgili bilgileri</td>
                              </tr>
                              <tr>
                                  <td>Öğrenci 3 ve cevap ile ilgili bilgileri</td>
                              </tr>
                              <tr>
                                  <td>Öğrenci 4 ve cevap ile ilgili bilgileri</td>
                              </tr>
                              <tr>
                                  <td>Öğrenci 5 ve cevap ile ilgili bilgileri</td>
                              </tr>
                              <tr>
                                  <td>Öğrenci 6 ve cevap ile ilgili bilgileri</td>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                   
              </div>
            </div>
            <div id="collapse-2" class="collapse show" data-parent="#accordion" aria-labelledby="heading-2">
              <div class="card-body">
                <div id="accordion-2">
                  <div class="card">
                    <div class="card-header" id="heading-2-2">
                      <h5 class="mb-0">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2-2" aria-expanded="false" aria-controls="collapse-2-2">
                          B
                        </a>
                      </h5>
                    </div>
                    <div id="collapse-2-2" class="collapse" data-parent="#accordion-2" aria-labelledby="heading-2-2">
                      <div class="card-body">
                        <table class="table table-bordered">
                          <tbody class="white">
                              <tr>
                                  <td>Öğrenci 1 ve cevap ile ilgili bilgileri</td>
                              </tr>
                              <tr>
                                  <td>Öğrenci 2 ve cevap ile ilgili bilgileri</td>
                              </tr>
                              <tr>
                                  <td>Öğrenci 3 ve cevap ile ilgili bilgileri</td>
                              </tr>
                              <tr>
                                  <td>Öğrenci 4 ve cevap ile ilgili bilgileri</td>
                              </tr>
                              <tr>
                                  <td>Öğrenci 5 ve cevap ile ilgili bilgileri</td>
                              </tr>
                              <tr>
                                  <td>Öğrenci 6 ve cevap ile ilgili bilgileri</td>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                   
              </div>
            </div>
          </div>
      </div>
</body>
</html>