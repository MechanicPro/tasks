<div class="container default-hide" id="task-create">

    <div class="panel panel-default">
        <div class="panel-heading">Create task</div>
        <div class="panel-body">

            <form action="/tasks" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="userName" type="text" class="form-control" name="userName" placeholder="Name" required>
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="email" type="email" class="form-control" name="email" placeholder="email" required>
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                    <textarea type="text" class="form-control" id="text" name="text" placeholder="text"
                              required></textarea>
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-apple"></i></span>
                    <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);" required>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn" onclick="hideForm()">Close</button>
                    <button type="button" class="btn btn-default" onclick="showPreview()">Preview</button>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>