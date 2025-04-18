<?php
    $sql = "SELECT `id`, `firstname`, LEFT(`name`, 1) N, LEFT(`lastname`,1) L FROM `con` ORDER BY `firstname`";
    $result = mysqli_query($mysqli, $sql);
    if(!mysqli_errno($mysqli)) echo mysqli_error($mysqli);
    // Создает ссылки в формате: "Иван И.П." Каждая ссылка ведет на index.php с параметром ID
    while($row = mysqli_fetch_assoc($result)):?>
        <a href="index.php?id=<?=$row['id'];?>"><?=$row['firstname'].' '.$row['N'].'.'.$row['L'].'.<BR>';?></a>
    <?php endwhile;?>   