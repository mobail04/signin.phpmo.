<?php
    session_start();
    require_once 'connect.php';
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $check_user = mysqli_query($connect, "SELECT * FROM `client` WHERE `email` = '$email' AND `pass` = '$pass'");
    if (mysqli_num_rows($check_user) > 0) {
        $client = mysqli_fetch_assoc($check_client);
        $_SESSION['client'] = [
            "fio" => $client['fio'],
            "email" => $client['email']
        ];
        header('Location: ../order.php');
    } else {
        $_SESSION['message'] = 'Не верный email или пароль';
        header('Location: ../vhod.php');
    }
    ?>
<pre>
    <?php
    print_r($check_client);
    print_r($client);
    ?>
</pre>
