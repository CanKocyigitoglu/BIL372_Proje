<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/input.css">
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
    <title>Exams</title>
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
                        <h2>Manage <b>Exams</b></h2>
                    </div>
                    <div class="col-xs-6">
                        <a href="#addExamModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Exam</span></a>
                        <a href="#deleteExamModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Exam Name</th>
                    <th>Start Time</th>
                    <th>Exam Date</th>
                    <th>%</th>
                    <th>Total Time (min)</th>
                    <th>Total Question Number</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($exams as $exam) {
                    print_r("<tr>
							<td>".$exam['Sinav_Adi']."</td>
							<td>".$exam['Baslangic']."</td>
							<td>".$exam['Sinav_Tarihi']."</td>
                            <td>%".$exam['Agirligi']."</td>
                            <td>".$exam['Toplam_Sure']." dk</td>
                            <td>".$exam['Soru_Sayisi']."</td>
							<td>
								<a href=\"#editExamModal\" class=\"edit\" data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></a>
                                <a href=\"#deleteExamModal\" class=\"delete\" data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a>
                                <a href=\"http://127.0.0.1:5500/application/views/questions.html\"><i class=\"material-icons\">&#xE147;</i></a>
							</td>
						</tr>");
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="addExamModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/home/add_exam" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Add Exam</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Exam Name</label>
                        <input name="Sinav_Adi" type="text" class="form-control" placeholder="Enter exam name" required>
                    </div>
                    <div class="form-group">
                        <label>Start Time</label>
                        <input name="Baslangic" type="text" class="form-control" placeholder="Enter exam start time" required>
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <input name="Bitis" type="text" class="form-control" placeholder="Enter exam start time" required>
                    </div>
                    <div class="form-group">
                        <label>Exam Date</label>
                        <input name="Sinav_Tarihi" type="date" class="form-control" placeholder="Enter exam date" required>
                    </div>
                    <div class="form-group">
                        <label>%</label>
                        <input name="Agirligi" type="number" class="form-control" placeholder="Enter %" required>
                    </div>
                    <div class="form-group">
                        <label>Total Time (min)</label>
                        <input name="Toplam_Sure" type="number" class="form-control" placeholder="Enter total exam time (min)" required>
                    </div>
                    <div class="form-group">
                        <label>Total Question Number</label>
                        <input name="Soru_Sayisi" type="text" class="form-control" placeholder="Enter total question number" required>
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
<div id="editExamModal" class="modal fade show in">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/home/edit_exam_edit/<?php print_r($examx['Sinav_ID']); ?>" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Exam</h4>
                    <a href="/home" ><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Exam Name</label>
                        <input name="Sinav_Adi" type="text" class="form-control" value="<?php print_r($examx['Sinav_Adi']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Start Time</label>
                        <input name="Baslangic" type="text" class="form-control" value="<?php print_r($examx['Baslangic']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <input name="Bitis" type="text" class="form-control" value="<?php print_r($examx['Bitis']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Exam Date</label>
                        <input name="Sinav_Tarihi" type="date" class="form-control" value="<?php print_r($examx['Sinav_Tarihi']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>%</label>
                        <input name="Agirligi" type="number" class="form-control" value="<?php print_r($examx['Agirligi']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Total Time (min)</label>
                        <input name="Toplam_Sure" type="number" class="form-control" value="<?php print_r($examx['Toplam_Sure']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Total Question Number</label>
                        <input name="Soru_Sayisi" type="text" class="form-control" value="<?php print_r($examx['Soru_Sayisi']); ?>" required>
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
<div id="deleteExamModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Delete Exam</h4>
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