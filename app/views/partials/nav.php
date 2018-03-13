<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Task</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#" onclick="showTaskCreateForm()">New task</a></li>
            <li><a href="#" onclick="showFilter()">Filter</a></li>
            <li><a href="#" onclick="showSort()">Sorting</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if (isset($_SESSION['userData']) && $_SESSION['userData']['success']) : ?>
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?= $_SESSION['userData'][0]->name ?></a>
                </li>
                <li><a href="/logout"><span class="glyphicon glyphicon-log-out"> logout</a></li>
            <?php else: ?>
                <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>