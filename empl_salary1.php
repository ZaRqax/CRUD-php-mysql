<?php
include 'config.php';
header("Content-Type: text/html; charset=utf-8");

$salary = $_POST['salary1']; ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
</head>
<body>

<?php

// $sql = $pdo->prepare("SELECT * FROM `employee` JOIN `department`");
$sql = $pdo->prepare("SELECT * FROM `employee` JOIN salaries ON salaries.salary >= $salary  AND  employee.ID =salaries.ID order by `employee`.id;");
// $sql = $pdo->prepare("SELECT * FROM `employee`");
$sql->execute();
$result = $sql->fetchAll();
 ?>
 <div class="container">
		<div class="row">
			<div class="col mt-1">
				<a type="submit" name="main" class="btn btn-primary float-left ml-1" href="index.php">Главная</a>
		<table class="table shadow ">
							<thead class="thead-dark">
								<tr>
									<th>ID</th>
									<th>Имя</th>
									<th>Фамилия</th>
									<th>Должность</th>
									<th>Зарплата</th>

								</tr>
								<?php foreach ($result as $value) { ?>
								<tr>

									<td><?=$value['id'] ?></td>
									<td><?=$value['name'] ?></td>
									<td><?=$value['last_name'] ?></td>
									<td><?=$value['pos'] ?></td>
									<td><?=$value['salary'] ?></td>

								
								
								</tr>
								 <?php } ?>

					</thead>
		</table>
		</div>
		</div>
	</div>
			</div>









<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
