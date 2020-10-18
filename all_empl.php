<?php
include 'config.php';
include 'func.php';
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<title>CRUD приложение на PHP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
</head>
<body>
<div class="container">
		<div class="row">
			<div class="col mt-1">
				<a type="submit" name="main" class="btn btn-primary float-left ml-1" href="index.php">Главная</a>
				<a class="btn btn-info float-right ml-1" href='all_dept.php'>Все отделы</a>
				<a class="btn btn-info float-right ml-1" href='all_empl.php'>Все Cотрудники</a>

				<?php
				$sql = $pdo->prepare("SELECT * from employee;");
				// $sql = $pdo->prepare("SELECT * FROM `employee`");
				$sql->execute();
				$result = $sql->fetchAll();
				// echo $result[0];
				?>
				<table class="table shadow ">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>Имя</th>
							<th>Фамилия</th>
							<th>Должность</th>
							

						</tr>
						<?php foreach ($result as $value) { ?>
						<tr>

							<td><?=$value['id'] ?></td>
							<td><?=$value['name'] ?></td>
							<td><?=$value['last_name'] ?></td>
							<td><?=$value['pos'] ?></td>

						
					
						</tr>
						 <?php } ?>

					</thead>
				</table>
		
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
</body>
</html>