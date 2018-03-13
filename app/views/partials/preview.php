<div class="container preview-div default-hide">
    <div class="alert alert-info">
        <h1>Preview</h1>
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="img" id="preview-img" style="display:none"><img class="img-preview"></div>
            </div>
            <div class="col-lg-7 col-md-6">
                <ul>
                    <li class="list-group-item"><i><b>Name: </b></i><i id="preview-username"></i></li>
                    <li class="list-group-item"><b>Email: </b><i id="preview-mail"></i>
                    <li class="list-group-item">
                        <b>Text:</b>
                        <p class="col" id="preview-text"></p>
                    </li>
                    <li class="list-group-item">
                        <b>Status:</b>
                        <button disabled type='button' class='taskId-{$task->id} btn btn-danger'>Not accepted!</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>