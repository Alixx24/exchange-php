<?php

namespace Controller\Customer;

use Models\Database;

require_once '../Models/Database.php';


class PermissionConroller extends Database
{
    public $connect;
    public function show()
    {
        var_dump('ss');
        $pdo = $this->connect();
        $sql = "SELECT * FROM permission_codes";
        $statement = $pdo->query($sql);

        $permissions = $statement->fetchAll();
         var_dump($permissions);die;
    }
}
