<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php print_r(base_url('input.css')); ?>">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="/exams.js"></script>
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
    <script >
    (function(){
    'use strict';
	var $ = jQuery;
	$.fn.extend({
		filterTable: function(){
			return this.each(function(){
				$(this).on('keyup', function(e){
					$('.filterTable_no_results').remove();
					var $this = $(this),
                        search = $this.val().toLowerCase(),
                        target = $this.attr('data-filters'),
                        $target = $(target),
                        $rows = $target.find('tbody tr');

					if(search == '') {
						$rows.show();
					} else {
						$rows.each(function(){
							var $this = $(this);
							$this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
						})
						if($target.find('tbody tr:visible').size() === 0) {
							var col_count = $target.find('tr').first().find('td').size();
							var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
							$target.find('tbody').append(no_results);
						}
					}
				});
			});
		}
	});
	$('[data-action="filter"]').filterTable();
})(jQuery);

$(function(){
    // attach table filter plugin to inputs
	$('[data-action="filter"]').filterTable();

	$('.container').on('click', '.panel-heading span.filter', function(e){
		var $this = $(this),
			$panel = $this.parents('.panel');

		$panel.find('.panel-body').slideToggle();
		if($this.css('display') != 'none') {
			$panel.find('.panel-body input').focus();
		}
	});
	$('[data-toggle="tooltip"]').tooltip();
})
</script>
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
<style>
body {
  color: #566787;
  background-color: rgb(29, 17, 17) !important;
background: #f5f5f5;
font-family: 'Varela Round', sans-serif;
font-size: 13px;
}
.table-responsive {
  margin: 30px 0;
}
.table-wrapper {
min-width: 1000px;
  background: #fff;
  padding: 20px 25px;
border-radius: 3px;
  box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
padding-bottom: 15px;
background: #435d7d;
color: #fff;
padding: 16px 30px;
margin: -20px -25px 10px;
border-radius: 3px 3px 0 0;
}
.table-title h2 {
margin: 5px 0 0;
font-size: 24px;
}
.table-title .btn-group {
float: right;
}
.table-title .btn {
color: #fff;
float: right;
font-size: 13px;
border: none;
min-width: 50px;
border-radius: 2px;
border: none;
outline: none !important;
margin-left: 10px;
}
.table-title .btn i {
float: left;
font-size: 21px;
margin-right: 5px;
}
.table-title .btn span {
float: left;
margin-top: 2px;
}
table.table tr th, table.table tr td {
  border-color: #e9e9e9;
padding: 12px 15px;
vertical-align: middle;
}
table.table tr th:first-child {
width: 60px;
}
table.table tr th:last-child {
width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
background: #f5f5f5;
}
table.table th i {
  font-size: 13px;
  margin: 0 5px;
  cursor: pointer;
}
table.table td:last-child i {
opacity: 0.9;
font-size: 22px;
  margin: 0 5px;
}
table.table td a {
font-weight: bold;
color: #566787;
display: inline-block;
text-decoration: none;
outline: none !important;
}
table.table td a:hover {
color: #2196F3;
}
table.table td a.edit {
  color: #FFC107;
}
table.table td a.delete {
  color: #F44336;
}
table.table td i {
  font-size: 19px;
}
table.table .avatar {
border-radius: 50%;
vertical-align: middle;
margin-right: 10px;
}
.pagination {
  float: right;
  margin: 0 0 5px;
}
.pagination li a {
  border: none;
  font-size: 13px;
  min-width: 30px;
  min-height: 30px;
  color: #999;
  margin: 0 2px;
  line-height: 30px;
  border-radius: 2px !important;
  text-align: center;
  padding: 0 6px;
}
.pagination li a:hover {
  color: #666;
}
.pagination li.active a, .pagination li.active a.page-link {
  background: #03A9F4;
}
.pagination li.active a:hover {
  background: #0397d6;
}
.pagination li.disabled i {
  color: #ccc;
}
.pagination li i {
  font-size: 16px;
  padding-top: 6px
}
.hint-text {
  float: left;
  margin-top: 10px;
  font-size: 13px;
}
/* Custom checkbox */
.custom-checkbox {
position: relative;
}
.custom-checkbox input[type="checkbox"] {
opacity: 0;
position: absolute;
margin: 5px 0 0 3px;
z-index: 9;
}
.custom-checkbox label:before{
width: 18px;
height: 18px;
}
.custom-checkbox label:before {
content: '';
margin-right: 10px;
display: inline-block;
vertical-align: text-top;
background: white;
border: 1px solid #bbb;
border-radius: 2px;
box-sizing: border-box;
z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
content: '';
position: absolute;
left: 6px;
top: 3px;
width: 6px;
height: 11px;
border: solid #000;
border-width: 0 3px 3px 0;
transform: inherit;
z-index: 3;
transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
border-color: #03A9F4;
background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
color: #b8b8b8;
cursor: auto;
box-shadow: none;
background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
padding: 20px 30px;
}
.modal .modal-content {
border-radius: 3px;
}
.modal .modal-footer {
background: #ecf0f1;
border-radius: 0 0 3px 3px;
}
.modal .modal-title {
  display: inline-block;
}
.modal .form-control {
border-radius: 2px;
box-shadow: none;
border-color: #dddddd;
}
.modal textarea.form-control {
resize: vertical;
}
.modal .btn {
border-radius: 2px;
min-width: 100px;
}
.modal form label {
font-weight: normal;
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
              <a class="nav-link" href="http://localhost/home/questions">Manage Questions</a>
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
							<td><a href=\"/home/exam_info/".$exam['Sinav_ID']."\">".$exam['Sinav_Adi']."<a></td>
							<td>".$exam['Baslangic']."</td>
							<td>".$exam['Sinav_Tarihi']."</td>
                            <td>%".$exam['Agirligi']."</td>
                            <td>".$exam['Toplam_Sure']." dk</td>
                            <td>".$exam['Soru_Sayisi']."</td>
							<td>
								<a href=\"/home/edit_exam/".$exam['Sinav_ID']."\" class=\"edit\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></a>
                                <a href=\"/home/delete_exam/".$exam['Sinav_ID']."\" class=\"delete\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a>
                                <a href=\"/home/add_question_exam/".$exam['Sinav_ID']."\"><i class=\"material-icons\">&#xE147;</i></a>
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
	<div id="editExamModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit Exam</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Exam Name</label>
							<input type="text" class="form-control" placeholder="Enter exam name" required>
						</div>
						<div class="form-group">
							<label>Start Time</label>
							<input type="text" class="form-control" placeholder="Enter exam start time" required>
						</div>
						<div class="form-group">
							<label>Exam Date</label>
							<textarea class="form-control" placeholder="Enter exam date" required></textarea>
						</div>
						<div class="form-group">
							<label>%</label>
							<input type="text" class="form-control" placeholder="Enter %" required>
                        </div>		
                        <div class="form-group">
							<label>Total Time (min)</label>
							<input type="text" class="form-control" placeholder="Enter total exam time (min)" required>
                        </div>		
                        <div class="form-group">
							<label>Total Question Number</label>
							<input type="text" class="form-control" placeholder="Enter total question number" required>
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