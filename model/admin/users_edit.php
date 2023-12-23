<?php
include_once('connectDb.php');
function editUser($id, $name, $password, $email, $role){
    $conn = connectDb();
    $sql = "UPDATE users SET name = :name, password = :password, email = :email, role = :role WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['name' => $name, 'password' => $password, 'email' => $email, 'role' => $role , 'id' => $id]);
    
}
function getUser($id){
    $conn = connectDb();
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetch();
    return $result;
}

function deleteUser($id){
    $conn = connectDb();
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
}

?>
