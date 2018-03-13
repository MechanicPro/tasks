<?php
if (isset($_GET['status'])) {
    $pUri = ($_SERVER["REQUEST_URI"]) . '&';;
} else {
    $pUri = '?';
}

$elemOnPage = 3;

$page = isset($_GET['page']) ? $_GET['page'] : '1';

if (!empty($_GET['sort'])) {
    if (!empty($_GET['desc']))
        $template = "sort=" . $_GET['sort'] . "&desc=" . $_GET['desc'] . "&page=";
    else
        $template = "sort=" . $_GET['sort'] . "&page=";
} else {
    $template = "&page=";
}

$pagesArray = array_chunk($tasks, $elemOnPage);
$tasks = $pagesArray[$page - 1];

?>
<nav>
    <ul class="pagination">
        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= $pUri ?><?= $template ?><?= $page - 1 ?>">Previous</a>
        </li>
        <?php for ($i = 1; $i <= count($pagesArray); $i++): ?>
            <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                <a class="page-link" href="<?= $pUri ?><?= $template ?><?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
        <li class="page-item <?= ($page > count($pagesArray) - 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= $pUri ?><?= $template ?><?= $page + 1 ?>">Next</a>
        </li>

    </ul>
</nav>


