<?php
include 'config.php';
header("Content-Type: text/html; charset=utf-8");

$dep_id = $_POST['dept_id'];
echo $dep_id ?>

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
$sql = $pdo->prepare("DELETE FROM department WHERE department_ID = $dep_id");
// $sql = $pdo->prepare("SELECT * FROM `employee`");
$sql->execute();
$result = $sql->fetchAll();

 ?>
 <div class="content">
 	
 <a type="submit" name="main" class="btn btn-primary float-left mr-2" href="index.php">Главная</a>
 </div>
 <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Отдел удален!</strong> Вы можете закрыть это сообщение. <?php $dep_id?>
  <a type="button" class="btb" data-dismiss="alert" aria-label="Close" href="index.php">
    <span aria-hidden="true">&times;</a>
  </button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
