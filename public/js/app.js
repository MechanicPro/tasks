function openModal() {
    document.getElementById('myModal').style.display = "block";

    var text = document.getElementById('text').value;
    document.getElementById('modal-text').innerHTML = text;

}

function closeModal() {
    document.getElementById('myModal').style.display = "none";
}

function editModal(taskId) {
    $('#editModal').modal();
    var modalText = $("p.taskId-" + taskId).text();
    $('.modal-body #task-text').val(modalText);
    $('.btn-edit-modal').attr("onclick", "modalEditButton(" + taskId + ")");
}

function modalEditButton(taskId) {
    console.log(taskId);
    var editText = $('.modal-body #task-text').val();
    $("p.taskId-" + taskId).text(editText);
    $.post("/tasks/update", {id: taskId, text: editText});
    $('#editModal').modal('hide');
}

function showTaskCreateForm() {
    $('#filter-form').hide();
    $('#sort-form').hide();

    if (!$('#task-create').is(':visible'))
        $('#task-create').show();
    else {
        $('.preview-div').hide();
        $('#task-create').hide();
    }

}

function hideForm() {
    $('#task-create').hide();
    $('.preview-div').hide();
    $('#filter-form').hide();
    $('#sort-form').hide();
}

function showFilter() {
    $('#task-create').hide();
    $('.preview-div').hide();
    $('#sort-form').hide();

    if (!$('#filter-form').is(':visible'))
        $('#filter-form').show();
    else
        $('#filter-form').hide();
}

function showSort() {
    $('#task-create').hide();
    $('.preview-div').hide();
    $('#filter-form').hide();

    if (!$('#sort-form').is(':visible'))
        $('#sort-form').show();
    else
        $('#sort-form').hide();
}

function showPreview() {
    if (document.getElementById("userName").value == ''
        || document.getElementById("email").value == ''
        || document.getElementById("text").value == ''
        || document.getElementById("userName").value == '') {
        alert('Not filled in all fields!')
        return;
    }

    $('#preview-username').text($('#userName').val());
    $('#preview-mail').text($('#email').val());
    $('#preview-text').text($('#text').val());
    $('#preview-img').show();

    if (!$('.preview-div').is(':visible'))
        $('.preview-div').show();
    else
        $('.preview-div').hide();
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.img-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function markAsDone(taskId) {
    $.post("tasks/status", {id: taskId})
        .done(function (data) {
            $('button.taskId-' + taskId).replaceWith("<button disabled type='button' class='btn btn-success'>Accepted</button>");
            $('button.taskIdS-' + taskId).replaceWith("<button disabled type='button' class='btn'>Task accepted</button>");
            $('#td_done.td-taskId-' + taskId + ' danger').replaceWith("<td class='success'><strong>Accepted!</strong></td>");
        });
}

function DeleteTask(taskId) {
    if (confirm('Do you really want to delete the task?')) {
        $.post("/tasks/delete", {id: taskId})
            .done(function () {
                location.reload();
            });
    }
}