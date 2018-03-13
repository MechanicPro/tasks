<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\Task;

class TasksController
{
    protected $qb;
    protected $tableName;

    public function __construct()
    {
        $this->qb = getQB();
        $this->tableName = 'tasks';
    }

    public function index()
    {
        $tasks = $this->qb->selectAll($this->tableName);

        return view('tasks/tasks', compact('tasks'));
    }

    public function store()
    {
        session_start();
        $task = new Task(
            $_POST['text'],
            $_POST['userName'],
            $_POST['email']
        );

        $this->qb->insertIntoDatabase($this->tableName,
            ['text' => $this->verificationData($task->getText()),
                'image' => $this->verificationData($task->getImage()),
                'username' => $this->verificationData($task->getUsername()),
                'useremail' => $this->verificationData($task->getUseremail()),
                'status' => $this->verificationData($task->getStatus())]);

        return redirect('tasks');
    }

    protected function verificationData($text)
    {
        $input_text = strip_tags($text);
        $input_text = htmlspecialchars($input_text);
        return $input_text;
    }


    public function updateStatus()
    {
        $this->qb->updateStatusInDB($this->tableName, $_POST['id']);
    }

    public function deleteTask()
    {
        $this->qb->deleteTaskInDB($this->tableName, $_POST['id']);
    }

    public function filter()
    {
        $tasks = $this->qb->selectFiltered($_GET);
        return view('tasks/tasks', compact('tasks'));
    }

    public function sort()
    {
        $tasks = $this->qb->selectSort($this->tableName, $_GET);
        return view('tasks/tasks', compact('tasks'));
    }
}