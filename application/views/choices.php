<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Choices</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function(){
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');
});
    </script>
    <style>
        .container{
            margin-top: 2rem;
        }
        body{
            background-color: antiquewhite;
        }
    </style>
</head>
<body>
    <div class="container" style="display: none;"><!-- Uğraşmamak için display none yaptım bununla işlem yapmayın aşağıdaki divden devam edin -->
        <div class="row">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Student Surname</th>
                        <th>Student Id</th>
                        <th>Approval Time</th>
                        <th>First Interaction Time</th>
                        <th>Answering Time</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Student Name</th>
                        <th>Student Surname</th>
                        <th>Student Id</th>
                        <th>Approval Time</th>
                        <th>First Interaction Time</th>
                        <th>Answering Time</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Tiger</td>
                        <td>Nixon</td>
                        <td>11010111</td>
                        <td>102</td>
                        <td>24</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>Garrett</td>
                        <td>Winters</td>
                        <td>11022022</td>
                        <td>63</td>
                        <td>223</td>
                        <td>23</td>
                    </tr>
                    <tr>
                        <td>Ashton</td>
                        <td>Cox</td>
                        <td>2132113</td>
                        <td>66</td>
                        <td>422</td>
                        <td>12</td>
                    </tr>
                </tbody>
            </table>
		</div>
    </div>

    <?php

    foreach ($list as $secenek) {
        print_r("<div class=\"container\">   <!-- Bu divden devam edin -->
        <div class=\"row\">
            <header style=\"font-size: 2.8rem;\">Choice <b>".$secenek['Secenek']."</b></header>
            <table id=\"example\" class=\"table table-striped table-bordered\" cellspacing=\"0\" width=\"100%\">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Student Surname</th>
                        <th>Student Id</th>
                        <th>Approval Time</th>
                        <th>First Interaction Time</th>
                        <th>Answering Time</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Student Name</th>
                        <th>Student Surname</th>
                        <th>Student Id</th>
                        <th>Approval Time</th>
                        <th>First Interaction Time</th>
                        <th>Answering Time</th>
                        <tbody>");
        foreach ($secenek["ogrenciler"] as $ogrenci) {
            print_r("<tr>
                        <td>".$ogrenci['Ad']."</td>
                        <td>".$ogrenci['Soyad']."</td>
                        <td>".$ogrenci['Ogrenci_ID']."</td>
                        <td>".$ogrenci['Onaylama_Suresi']."</td>
                        <td>".$ogrenci['Ilk_Etkilisim_Suresi']."</td>
                        <td>".$ogrenci['Cevaplama_Suresi']."</td>
                    </tr>");
        }

        print_r("</tbody>
            </table>
		</div>
    </div>");
    }

    ?>

</body>
</html>