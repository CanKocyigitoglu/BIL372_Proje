<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/input.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="./js/exams.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Questions</title>
    <script>
        $(document).ready(function(){
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function(){
                if(this.checked){
                    checkbox.each(function(){
                        this.checked = true;
                    });
                } else{
                    checkbox.each(function(){
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function(){
                if(!this.checked){
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>
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
                <a class="nav-link" href="http://127.0.0.1:5500/application/views/input.html">Manage Questions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login/logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-6">
                        <h2>Manage <b>Questions</b></h2>
                    </div>
                    <div class="col-xs-6">
                        <a href="#addQuestionModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Question</span></a>
                        <a href="#deleteQuestionModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Question ID</th>
                    <th>Question Subject</th>
                    <th>Question</th>
                    <th>Question Order</th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($questions as $question) {
                    print_r("<tr>
							<td>".$question['Soru_ID']."</td>
							<td>".$question['Konusu']."</td>
							<td>".$question['Sorusu']."</td>
							<td>".$question['Sirasi']."</td>
							<td>
								<a href=\"/home/edit_question/".$question['Soru_ID']."\" class=\"edit\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></a>
								<a href=\"/home/delete_question/".$question['Soru_ID']."\" class=\"delete\" ><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a>
							</td>
						</tr>");
                }

                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="addQuestionModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/home/add_question" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Add Question</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Konusu</label>
                        <input type="text" name="Konusu" class="form-control" placeholder="Enter question type" required>
                    </div>
                    <div class="form-group">
                        <label>Sorusu</label>
                        <input type="text" name="Sorusu" class="form-control" placeholder="Enter question subject" required>
                    </div>
                    <div class="form-group">
                        <label>Sirasi</label>
                        <input class="form-control" name="Sirasi" placeholder="Enter question" required></input>
                    </div>
                    <div class="form-group">
                        <label>Seçenek A:</label>
                        <input type="text" name="secenek_a" class="form-control" placeholder="Enter only answer" required>
                    </div>
                    <div class="form-group">
                        <label>Seçenek B:</label>
                        <input type="text" name="secenek_b" class="form-control" placeholder="Enter only answer" required>
                    </div>
                    <div class="form-group">
                        <label>Seçenek C:</label>
                        <input type="text" name="secenek_c" class="form-control" placeholder="Enter only answer">
                    </div>
                    <div class="form-group">
                        <label>Seçenek D:</label>
                        <input type="text" name="secenek_d" class="form-control" placeholder="Enter only answer">
                    </div>
                    <div class="form-group">
                        <label>Seçenek E:</label>
                        <input type="text" name="secenek_e" class="form-control" placeholder="Enter only answer">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<div id="editQuestionModal" class="modal show in">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php print_r(base_url('home/edit_question_edit/'));print_r($question['Soru_ID']); ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Question</h4>
                    <a href="http://localhost/home/questions"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Konusu</label>
                        <input type="text" name="Konusu" class="form-control" value="<?php print_r($questionx['Konusu']); ?>">
                    </div>
                    <div class="form-group">
                        <label>Sorusu</label>
                        <input type="text" name="Sorusu" class="form-control" value="<?php print_r($questionx['Sorusu']); ?>">
                    </div>
                    <div class="form-group">
                        <label>Sirasi</label>
                        <input class="form-control" name="Sirasi" value="<?php print_r($questionx['Sirasi']); ?>">
                    </div>
                    <div class="form-group">
                        <label>Seçenek A:</label>
                        <input type="text" name="secenek_a" class="form-control" value="<?php print_r($choices[0]['Icerik']); ?>">
                    </div>
                    <div class="form-group">
                        <label>Seçenek B:</label>
                        <input type="text" name="secenek_b" class="form-control" value="<?php print_r($choices[1]['Icerik']); ?>">
                    </div>
                    <div class="form-group">
                        <label>Seçenek C:</label>
                        <input type="text" name="secenek_c" class="form-control" value="<?php if (isset($choices[2]['Icerik'])) print_r($choices[2]['Icerik']); ?>">
                    </div>
                    <div class="form-group">
                        <label>Seçenek D:</label>
                        <input type="text" name="secenek_d" class="form-control" value="<?php if (isset($choices[3]['Icerik']))print_r($choices[3]['Icerik']); ?>">
                    </div>
                    <div class="form-group">
                        <label>Seçenek E:</label>
                        <input type="text" name="secenek_e" class="form-control" value="<?php if (isset($choices[4]['Icerik'])) print_r($choices[4]['Icerik']); ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<div id="deleteQuestionModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Delete Question</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>