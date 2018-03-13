<div class="container default-hide" id="sort-form">
    <?php
    $checked = isset($_GET['desc']) && $_GET['desc'] == 1 ? 'checked' : '';
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">Sorting</div>
        <div class="panel-body">
            <form action="/tasks/sort" class="form-group row">
                <ul class="list-group">
                    <li class="list-group-item">
                        <select name="sort" class="sort" id="sort">
                            <option value="1" <?= isset($_GET['sort']) && $_GET['sort'] == 1 ? 'selected' : '' ?>>NAME
                            </option>
                            <option value="2" <?= isset($_GET['sort']) && $_GET['sort'] == 2 ? 'selected' : '' ?>>
                                EMAIL
                            </option>
                            <option value="3" <?= isset($_GET['sort']) && $_GET['sort'] == 3 ? 'selected' : '' ?>>STATUS
                            </option>
                        </select>
                        <label for="desc">Decrease</label>
                        <input id="desc" type="checkbox" class="desc" name="desc" value="1" <?= $checked ?>>
                    </li>
                </ul>
                <div class="btn-group">
                    <button class="btn" type="submit">OK</button>
                </div>
            </form>
        </div>
    </div>
</div> 

