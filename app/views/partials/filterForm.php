<div class="container default-hide" id = "filter-form">
    <div class="panel panel-default">
        <div class="panel-heading">Filter</div>
        <div class="panel-body">
            <form action="/tasks/filter" class="form-group row">
                <ul class="list-group">
                    <li class="list-group-item">
                        <label for="name">Name:</label>
                        <input type="text" name="username" class="name">
                    </li>
                    <li class="list-group-item">
                        <label for="email">Email:</label>
                        <input type="text" name="useremail" class="email">
                    </li>
                    <li class="list-group-item">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="status">
                            <option value="1">Accepted</option>
                            <option value="0">Introduced</option>
                        </select>
                    </li>
                </ul>

                <div class="btn-group">
                    <button class="btn" type="submit">OK</button>
                </div>
                <a type="button" class="btn" href="/">Reset</a>
            </form>
        </div>
    </div>
</div>

