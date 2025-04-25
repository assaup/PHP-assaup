<?php
// Настройки пагинации
$per_page = 10; // Количество записей на странице
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Текущая страница
$start = ($page - 1) * $per_page; // Рассчитываем, с какой записи начинать выборку из БД

// Параметры сортировки
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
$order = isset($_GET['order']) ? $_GET['order'] : 'asc';

// Проверка допустимости параметров сортировки
$allowed_sorts = ['id', 'firstname', 'date'];
if (!in_array($sort, $allowed_sorts)) {
    $sort = 'id';
}
$order = strtolower($order) === 'desc' ? 'DESC' : 'ASC';

// Запрос данных с пагинацией и сортировкой
$sql = "SELECT * FROM `con` ORDER BY $sort $order LIMIT $start, $per_page";
$res = mysqli_query($mysqli, $sql);
if(!$res) echo mysqli_error($mysqli);

// Получаем общее количество записей
$total_res = mysqli_query($mysqli, "SELECT COUNT(*) FROM `con`");
$total_rows = mysqli_fetch_row($total_res)[0];
$total_pages = ceil($total_rows / $per_page);
?>

<!-- Таблица контактов -->
<table class="table">
<thead>
    <tr>
        <th scope="col">
            <a href="?elem=menu&page=<?= $page ?>&sort=id&order=<?= $sort === 'id' && $order === 'ASC' ? 'desc' : 'asc' ?>">
                Id <?= $sort === 'id' ? ($order === 'ASC' ? '↑' : '↓') : '' ?>
            </a>
        </th>
        <th scope="col">
            <a href="?elem=menu&page=<?= $page ?>&sort=firstname&order=<?= $sort === 'firstname' && $order === 'ASC' ? 'desc' : 'asc' ?>">
                Firstname <?= $sort === 'firstname' ? ($order === 'ASC' ? '↑' : '↓') : '' ?>
            </a>
        </th>
        <th scope="col">Name</th>
        <th scope="col">Lastname</th>
        <th scope="col">
            <a href="?elem=menu&page=<?= $page ?>&sort=date&order=<?= $sort === 'date' && $order === 'ASC' ? 'desc' : 'asc' ?>">
                Date <?= $sort === 'date' ? ($order === 'ASC' ? '↑' : '↓') : '' ?>
            </a>
        </th>
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
            <a class="page-link" href="?elem=menu&page=<?= $i ?>&sort=<?= $sort ?>&order=<?= $order ?>"><?= $i ?></a>
        </li>
        <?php endfor; ?>
    </ul>
</nav>