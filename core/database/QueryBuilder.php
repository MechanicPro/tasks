<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = 'SELECT * FROM %s ORDER BY id DESC';
        $sql = sprintf($sql, $table);
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectUserFromDB($login, $password)
    {
        $sql = 'SELECT * FROM users WHERE login = ? and password = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$login, $password]);
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insertIntoDatabase($table, $parameters)
    {
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        $statement = $this->pdo->prepare($sql);
        $statement->execute($parameters);
    }

    public function updateStatusInDB($table, $taskId)
    {
        $sql = sprintf('UPDATE %s SET status = 1 WHERE id = %d',
            $table,
            intval($taskId)
        );
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }

    public function deleteTaskInDB($table, $taskId)
    {
        $sql = sprintf('DELETE FROM %s WHERE id = %d',
            $table,
            intval($taskId)
        );
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }

    public function selectFiltered($parameters)
    {
        if (!empty($parameters['username']) && !empty($parameters['useremail'])) {
            $sql = 'SELECT * FROM tasks WHERE status=? 
                AND username LIKE CONCAT(\'%\', ?, \'%\') 
                AND useremail LIKE CONCAT(\'%\', ?, \'%\')';
            $statement = $this->pdo->prepare($sql);
            $statement->execute([intval($parameters['status']), strval($parameters['username']), strval($parameters['useremail'])]);
            return $statement->fetchAll(PDO::FETCH_CLASS);
        } elseif (!empty($parameters['username']) && empty($parameters['useremail'])) {
            $sql = 'SELECT * FROM tasks WHERE status=? 
                AND username  LIKE CONCAT(\'%\', ?, \'%\')';
            $statement = $this->pdo->prepare($sql);
            $statement->execute([intval($parameters['status']), strval($parameters['username'])]);
            return $statement->fetchAll(PDO::FETCH_CLASS);
        } elseif (!empty($parameters['useremail']) && empty($parameters['username'])) {
            $sql = 'SELECT * FROM tasks WHERE status=? 
                AND useremail LIKE CONCAT(\'%\', ?, \'%\')';
            $statement = $this->pdo->prepare($sql);
            $statement->execute([intval($parameters['status']), strval($parameters['useremail'])]);
            return $statement->fetchAll(PDO::FETCH_CLASS);
        } else {
            $sql = 'SELECT * FROM tasks';
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function selectSort($table, $parameters)
    {
        if (!empty($parameters['sort'])) {
            if ($parameters['sort'] == '1') {
                if (!empty($parameters['desc']) && $parameters['desc'] == 1) {
                    $sql = sprintf('SELECT * FROM %s ORDER BY username DESC',
                        $table);
                } else {
                    $sql = sprintf('SELECT * FROM %s ORDER BY username ASC',
                        $table);
                }
            } elseif ($parameters['sort'] == '2') {
                if (!empty($parameters['desc']) && $parameters['desc'] == 1) {
                    $sql = sprintf('SELECT * FROM %s ORDER BY useremail DESC',
                        $table);
                } else {
                    $sql = sprintf('SELECT * FROM %s ORDER BY useremail ASC',
                        $table);
                }
            } elseif ($parameters['sort'] == '3') {
                if (!empty($parameters['desc']) && $parameters['desc'] == 1) {
                    $sql = sprintf('SELECT * FROM %s ORDER BY status DESC',
                        $table);
                } else {
                    $sql = sprintf('SELECT * FROM %s ORDER BY status ASC',
                        $table);
                }
            } else {
                $sql = sprintf('SELECT * FROM %s ORDER BY id DESC',
                    $table);
            }
        } else {
            $sql = sprintf('SELECT * FROM %s ORDER BY id DESC',
                $table);
        }
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
}