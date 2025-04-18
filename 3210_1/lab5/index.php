<?php require('header.php');?>
<?php 
  $mysqli = mysqli_connect('localhost', 'root', '', 'notebook');
  if(!mysqli_connect_errno()) echo mysqli_connect_error();

  //Блок добавления записи (INSERT)
  if(!empty($_POST) && empty($_GET['id'])){
    $sql = 'INSERT INTO `con`
          (`firstname`, `name`, `lastname`, `date`, `email`, `phone`, `comment`) 
          VALUES (
          \''.htmlspecialchars($_POST['firstname']).'\',
          \''.htmlspecialchars($_POST['name']).'\',
          \''.htmlspecialchars($_POST['lastname']).'\',
          \''.$_POST['date'].'\',
          \''.$_POST['email'].'\',
          \''.$_POST['phone'].'\',
          \''.htmlspecialchars($_POST['comment']).'\'
          )';
    mysqli_query($mysqli, $sql);
    if (!mysqli_errno($mysqli)) echo mysqli_error($mysqli);
  }

  //Блок обновления записи (UPDATE)
  if (!empty($_POST) && !empty($_GET['id'])){
    $sql = "UPDATE `con` SET 
          `firstname`='".htmlspecialchars($_POST['firstname'])."',
          `name`='".htmlspecialchars($_POST['name'])."',
          `lastname`='".htmlspecialchars($_POST['lastname'])."',
          `date`='".$_POST['date']."',
          `email`='".$_POST['email']."',
          `phone`='".$_POST['phone']."',
          `comment`='".htmlspecialchars($_POST['comment'])."' WHERE `id`=".$_GET['id'];
    mysqli_query($mysqli, $sql);
    if (!mysqli_errno($mysqli)) echo mysqli_error($mysqli);
  }

  //Блок удаления записи (DELETE)
  if(isset($_GET['id']) && empty($_POST)){
    $sql = "DELETE FROM `con` WHERE `id`=".$_GET['id'];
    mysqli_query($mysqli, $sql);
    if (!mysqli_errno($mysqli)) echo mysqli_error($mysqli);
  }
  //Подключение нужного файла, если elem не передан, по умолчанию открывается menu
  if(!isset($_GET['elem'])) $_GET['elem'] = 'menu';
  
  //подключаются только разрешённые файлы
  if ($_GET['elem'] == 'menu' || $_GET['elem'] == 'add' || $_GET['elem'] == 'delete') require( $_GET['elem'].'.php');

  mysqli_close($mysqli);
?>

<?php require('footer.php');?>