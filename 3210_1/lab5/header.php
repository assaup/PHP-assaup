<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .menu-btn {
            color: white;
            background-color: #0d6efd;
            border: none;
            margin: 0 5px;
            padding: 8px 16px;
        }
        .menu-btn.active {
            background-color: #dc3545;
        }
    </style>
    <title>Notebook</title>
</head>
<body>
    <header>
        <div class="text-center mt-5">
            <a href="/student-241/3210_1/Lab5/index.php?elem=menu" class="btn menu-btn <?= (!isset($_GET['elem']) || $_GET['elem'] == 'menu') ? 'active' : '' ?>" >Главное меню</a>
            <a href="/student-241/3210_1/Lab5/index.php?elem=add" class="btn menu-btn <?= (isset($_GET['elem']) && $_GET['elem'] == 'add') ? 'active' : '' ?>" >Добавить запись</a>
            <a href="/student-241/3210_1/Lab5/?elem=delete" class="btn menu-btn <?= (isset($_GET['elem']) && $_GET['elem'] == 'delete') ? 'active' : '' ?>" >Удалить запись</a>
        </div>
    </header>
    <main>
        <div class="container mt-3">