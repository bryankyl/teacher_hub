<?php
  include_once "db_connect.php";
  header("Content-Type:text/html; charset=utf-8");
?>
<html>
<head>
  <meta http-equiv="text/html; charset="utf-8">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
<div id="page_head">
<h1>Hello World!</h1>
</div>
<div id="page_toolbar">
	<div class="btn-group">
		<a href="#" class="btn btn-outline-primary" aria-current="page">2020-21</a>
		<a href="#" class="btn btn-outline-primary">2019-20</a>
		<a href="#" class="btn btn-outline-primary">2018-19</a>
		<a href="#" class="btn btn-outline-primary">2017-18</a>
		<a href="#" class="btn btn-outline-primary">2016-17</a>
	</div>

	<div class="btn-group">
		<a href="#" class="btn btn-outline-primary" aria-current="page">1A</a>
		<a href="#" class="btn btn-outline-primary">1B</a>
		<a href="#" class="btn btn-outline-primary">1C</a>
		<a href="#" class="btn btn-outline-primary">1D</a>
		<a href="#" class="btn btn-outline-primary">1E</a>
	</div>
</div>

<div id="main_content">

	<?php
		$sql = "SELECT * FROM students_in_classes WHERE school_year=2018 ORDER BY `class` ASC,`class_no` ASC";
		$mysqlidata = mysqli_query($db_connect, $sql);
		$num_records = mysqli_num_rows($mysqlidata);
  
	?>
	<div class="table">
	<div class="tr">
		<div class="th">#</div>
		<div class="th">Student ID</div>
		<div class="th">Class</div>
		<div class="th">No.</div>
		<div class="th">English Name</div>
		<div class="th">Chinese Name</div>
	</div>
	<?php
		$count = 1;
		while ($row = mysqli_fetch_assoc($mysqlidata)) {
			$sql2 = "SELECT * FROM students WHERE `student_id`=\"$row[student_id]\"";
			$studentmysqlidata = mysqli_query($db_connect, $sql2);
			$student_record = mysqli_fetch_assoc($studentmysqlidata);
			echo "<div class=\"tr\">";
				echo "<div class=\"th\">$count</div>";
				echo "<div class=\"td\">$row[student_id]</div>";
				echo "<div class=\"td\">$row[class]</div>";
				echo "<div class=\"td\">$row[class_no]</div>";
				echo "<div class=\"td\">$student_record[student_ename]</div>";
				echo "<div class=\"td\">$student_record[student_cname]</div>";
			echo "</div>";
		$count++;
		}
	?>
	</div>
</div>

<?php
  include_once "db_disconnect.php";
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

</body>
</html>
