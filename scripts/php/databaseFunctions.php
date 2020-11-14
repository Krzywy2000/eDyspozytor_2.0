<?php
    function dbname()
    {
        return [
            'host' => 'localhost',
            'user' => 'root',
            'pass' => 'root',
            'name' => 'eDyspozytor'
        ];
    }

    function dbconnect()
    {
        $db = dbname();

        try
        {
            return $connect = new PDO("mysql:host={$db['host']};dbname={$db['name']};charset=UTF8;port={$db['port']}", $db['user'], $db['pass'],
            [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }
        catch (PDOException $error)
        {
            return $error->getMessage();
            exit('Database error');
        };
    }
?>