<?php
include 'config.php';

$name = $_POST['name'];
$last_name = $_POST['last_name'];
$pos = $_POST['pos'];
$get_id = $_GET['id'];
$department_id = $_POST['departmentID'];
$salary = $_POST['salary'];


// Create
if (isset($_POST['submit'])) {

	$sql = ("INSERT INTO `employee`(`name`, `last_name`, `pos`,`department_ID`) VALUES(?,?,?,?)");
	$query = $pdo->prepare($sql);
	$query->execute(array($name, $last_name, $pos,$department_id));

	$sql = ("INSERT INTO `salaries`(`ID`, `salary`) VALUES(?,?)");
	$query = $pdo->prepare($sql);
	$query->execute(array($get_id,$salary));
	
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение. <?php $get_id ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

}

$department_id = $_POST['department_ID'];
$department_name =$_POST['department_name'];


//Create department
if (isset($_POST['adddepartment'])){
	$sql = ("INSERT INTO `department`(`department_name`, `department_ID`) VALUES(?,?)");
	$query = $pdo->prepare($sql);
	$query->execute(array($department_name,$department_id));	
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

// Read


// $sql = $pdo->prepare("SELECT * FROM `employee` JOIN `department`");
$sql = $pdo->prepare("SELECT * FROM `employee` JOIN `department` ON `department`.department_id = `employee`.department_id JOIN salaries ON salaries.id = `employee`.ID  order by `employee`.id");
// $sql = $pdo->prepare("SELECT * FROM `employee`");
$sql->execute();
$result = $sql->fetchAll();




// Update
$edit_name = $_POST['edit_name'];
$edit_last_name = $_POST['edit_last_name'];
$edit_pos = $_POST['edit_pos'];
$edit_dep_id = $_POST['edit_dep_id'];
$edit_salary = $_POST['edit_salary'];
//echo $edit_dep_id;

if (isset($_POST['edit-submit'])) {
	$sqll = "UPDATE employee SET name=?, last_name=?, pos=?,department_ID=? WHERE id=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute(array($edit_name, $edit_last_name, $edit_pos,$edit_dep_id, $get_id));

	$sqll = "UPDATE salaries SET salary=? WHERE id=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute(array($edit_salary, $get_id));
	
	//$sqll_update_dep = "Update department set "
	header('Location: '. $_SERVER['HTTP_REFERER']);
}
if (isset($_POST['edit-submit_empl'])) {
	$sqll = "UPDATE employee SET name=?, last_name=?, pos=?,department_ID=? WHERE id=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute(array($edit_name, $edit_last_name, $edit_pos,$edit_dep_id, $get_id));

	
	
	//$sqll_update_dep = "Update department set "
	header('Location: '. $_SERVER['HTTP_REFERER']);
}
// DELETE
if (isset($_POST['delete_submit'])) {
	$sql = "DELETE FROM employee WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute(array($get_id));
	$sql = "DELETE FROM salaries WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute(array($get_id));
	header('Location: '. $_SERVER['HTTP_REFERER']);
}
if (isset($_POST['delete_submit_empl'])) {
	$sql = "DELETE FROM employee WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute(array($get_id));
	
	header('Location: '. $_SERVER['HTTP_REFERER']);
}