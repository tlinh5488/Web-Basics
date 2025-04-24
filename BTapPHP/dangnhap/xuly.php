<?php
$accounts = [
    'admin' => '123456',
    'hvlam' => '123456',
    'tlinh' => '020305'
];

$username = $_POST['username'];
$password = $_POST['password'];

if (array_key_exists($username, $accounts) && $accounts[$username] === $password) {
    echo '<p style="font-family: Arial; color: green;">Đăng nhập tài khoản ' . htmlspecialchars($username) .' thành công </p>';
} else {
    echo '<p style="font-family: Arial; color: red;">Username hoặc password không chính xác. Vui lòng đăng nhập lại.</p>';
}
