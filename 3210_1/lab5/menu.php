<?php
// Настройки пагинации
$per_page = 10; // Количество записей на странице
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Текущая страница
$start = ($page - 1) * $per_page; // Рассчитываем, с какой записи начинать выборку из БД

// Запрос данных с пагинацией
// Делаем SQL-запрос, выбирая нужный диапазон записей с помощью LIMIT.
$sql = "SELECT * FROM `con` LIMIT $start, $per_page";
$res = mysqli_query($mysqli, $sql);
if(!mysqli_errno($mysqli)) echo mysqli_error($mysqli);

// Получаем общее количество записей
$total_res = mysqli_query($mysqli, "SELECT COUNT(*) FROM `con`");
$total_rows = mysqli_fetch_row($total_res)[0];
$total_pages = ceil($total_rows / $per_page);
?>

<!-- Таблица контактов -->
<table class="table">
<thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Firstname</th>
        <th scope="col">Name</th>
        <th scope="col">Lastname</th>
        <th scope="col">Date</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Comment</th>
    </tr>
</thead>
<tbody>
<?php while($row = mysqli_fetch_assoc($res)): ?>
    <tr>
        <th scope="row"><?= $row['id']; ?></th>
        <td><a href="edit.php?id=<?= $row['id']; ?>"><?= $row['firstname']; ?></a></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['lastname']; ?></td>
        <td><?= $row['date']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['phone']; ?></td>
        <td><?= $row['comment']; ?></td>
    </tr>
<?php endwhile; ?>  
</tbody>
</table>

<!-- пагинация -->
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <!-- перебираем все страницы от 1 до $total_pages. -->
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
            <a class="page-link" href="?elem=menu&page=<?= $i ?>"><?= $i ?></a>
        </li>
        <?php endfor; ?>
    </ul>
</nav>