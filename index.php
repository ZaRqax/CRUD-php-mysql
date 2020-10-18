<?php
include 'func.php';
header("Content-Type: text/html; charset=utf-8");
$sql = $pdo->prepare("SELECT * FROM  `department` ");
// $sql = $pdo->prepare("SELECT * FROM `employee`");
$sql->execute();
$result_dept = $sql->fetchAll();
// echo $result_dept
?>
<!DOCTYPE html>
<html lang="en">
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
				<?=$success ?>
				<a type="submit" name="main" class="btn btn-primary float-left mr-2" href="index.php">Полная информация по сотрудникам</a>
				<button class="btn btn-success mb-1 mr-2" data-toggle="modal" data-target="#Modal"><i class="fa fa-user-plus"> Добавить сотрудника	</i></button>
				<button class="btn  btn-outline-success mb-1" data-toggle="modal" data-target="#adddep"><i class="fa fa-user-plus"> Добавить отдел </i></button>
				<button class="btn  btn-outline-warning mb-1" data-toggle="modal" data-target="#deldep"><i class="fa fa-trash"> Удалить отдел </i></button>
				<!-- <a class="btn btn-primary mb-1 float-right" data-toggle="modal" data-target="#adddep"><i class="fa fa-user-plus"> Все сотрудники</i></button> -->
				<a class="btn btn-info float-right ml-1" href='all_dept.php'>Все отделы</a>
				<a class="btn btn-info float-right ml-1" href='all_empl.php'>Все Cотрудники</a>
				<div class="row">

					<div class="col mt-1">
						
					<a class="btn btn-primary m-1" data-toggle="modal" data-target="#Empl_salary" >Запрос сотрудников с определенной зарплатой</a>
					<a class="btn btn-primary m-1" data-toggle="modal" data-target="#Empl_salary1" >Запрос сотрудников с  зарплатой зарплатой больше</a>
					
					<a class="btn btn-primary m-1" data-toggle="modal" data-target="#Empl_word" >Запрос сотрудников фамилии которых начинаются с определенной буквы</a>

					</div>
					<div class="col mt-1">
						
					<a class="btn btn-primary m-1" data-toggle="modal" data-target="#Empl_dept" >Запрос сотрудников из определнного отдела</a>
					<a class="btn btn-primary m-2" data-toggle="modal" data-target="#Empl_pos" >Запрос сотрудников по определнной должности </a>
					</div>

				</div>
				<table class="table shadow ">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>Имя</th>
							<th>Фамилия</th>
							<th>Должность</th>
							<th>Отдел</th>
							<th>Зарплата</th>
							<th>Действие</th>
						</tr>
						<?php foreach ($result as $value) { ?>
						<tr>
							<td><?=$value['id'] ?></td>
							<td><?=$value['name'] ?></td>
							<td><?=$value['last_name'] ?></td>
							<td><?=$value['pos'] ?></td>
							<td><?=$value['department_name'] ?></td>
							<td><?=$value['salary'] ?></td>

						<td>
								<a href="?edit=<?=$value['id'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?=$value['id'] ?>"><i class="fa fa-edit"></i></a> 
								<a href="?delete=<?=$value['id'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?=$value['id'] ?>"><i class="fa fa-trash"></i></a>
								<?php require 'modal.php'; ?>
							</td>
						</tr> <?php } ?>
					</thead>
				</table>
			</div>


		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content shadow">
	      <div class="modal-header">
	        <h5 class="modal-title">Добавить пользователя</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="" method="POST">
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="name" value="" placeholder="Имя">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="last_name" value="" placeholder="Фамилия">
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="pos" value="" placeholder="Должность">
	        	</div>

	        	<div class="form-group">
	        		<!-- <input type="text" class="form-control" name="department_ID" value="" placeholder="Номер отдела"> -->
				<select name="departmentID">
					    <option value="0">Выберите отдел</option>
					<?php
					echo $result_dept;
					?>
					<?php foreach ($result_dept as $row) { ?>
					   
					    <option value="<?=$row['department_ID']?>"><?=$row['department_name']?></option>
					    <?php
					}
					?>
					</select>
	        	</div>
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="salary" value="" placeholder="Зарплата">
	        	</div>

        	<!--<div class="form-group">
	        		<input type="text" class="form-control" name="department_name" value="" placeholder="Название отдела">
	        	</div> -->

	        	
	        <!-- <button type="submit" name="submit" class="btn btn-primary">Добавить</button> -->
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
	        <button type="submit" name="submit" class="btn btn-primary">Добавить</button>
	      </div>
	  		</form>
	    </div>
	  </div>
	</div><div class="modal fade" tabindex="-1" role="dialog" id="adddep">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content shadow">
	      <div class="modal-header">
	        <h5 class="modal-title">Добавить отдел</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="" method="POST">
                <div class="form-group">
	        		<input type="text" class="form-control" name="department_ID" value="" placeholder="Номер отдела">
	        	</div>
	        	<div class="form-group ">
	        		<input type="text" class="form-control" name="department_name" value="" placeholder="Название отдела">
	        	</div>


	        <!-- <button type="submit" name="submit" class="btn btn-primary">Добавить</button> -->
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
	        <button type="submit" name="adddepartment" class="btn btn-primary">Добавить</button>
	      </div>
	  		</form>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="Empl_salary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Вывести сотрудников с зарплатой</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <form action="empl_salary.php" method="post">
        	Зарплата
        	<input type="text" name="salary">
        	<button type="submit" name="Вывести" class="btn btn-primary">Вывести</button>
    	</form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
      </div>
    </div>
  </div>
</div>



	<div class="modal fade" id="Empl_dept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Вывести сотрудников с одного отдела</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer float-left">
        <form action="empl_dept.php" method="post">
     
        	<!-- <input type="text" name="dept_id"> -->
        
        		
        	<select  name="dept_ID">
					    <option value="0">Выберите отдел</option>
					   
					<?php foreach ($result_dept as $row) { ?>
					   
					    <option value="<?=$row['department_ID']?>"><?=$row['department_name']?></option>
					    <?php
					}
					?>
			</select>
        	
        	<button type="submit" name="Вывести" class="btn btn-primary">Вывести</button>
    	</form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
      </div>
    </div>
  </div>
</div>

	<div class="modal fade" id="Empl_word" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Вывести сотрудников фамилии которых начинаются на букву</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <form action="empl_word.php" method="post">
        	Первая буква фамилии
        	<input type="text" name="word">
        	<button type="submit" name="word_empl" class="btn btn-primary">Вывести</button>
    	</form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
      </div>
    </div>
  </div>
</div>

	<div class="modal fade" id="Empl_pos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Вывести сотрудников с одиноковыми должностями</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <form action="empl_pos.php" method="post">
        	Должность
        	<input type="text" name="pos">
        	<button type="submit" name="word_empl" class="btn btn-primary">Вывести</button>
    	</form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
      </div>
    </div>
  </div>
</div>

	<div class="modal fade" id="Empl_salary1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Вывести сотрудников с зарплатой</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <form action="empl_salary1.php" method="post">
        	Зарплата
        	<input type="text" name="salary1">
        	<button type="submit" name="Вывести" class="btn btn-primary">Вывести</button>
    	</form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
      </div>
    </div>
  </div>
</div>

	<div class="modal fade" id="deldep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Удалить отдел</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer float-left">
        <form action="deldep.php" method="post">
     
        	<!-- <input type="text" name="dept_id"> -->
        
        		
        	<select  name="dept_id">
					    <option value="0">Выберите отдел</option>
					   
					<?php foreach ($result_dept as $row) { ?>
					   
					    <option value="<?=$row['department_ID']?>"><?=$row['department_name']?></option>
					    <?php
					}
					?>

			</select>
        	
        	<button type="submit" name="del_dep" class="btn btn-primary">Удалить</button>
    	</form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
</body>
</html>