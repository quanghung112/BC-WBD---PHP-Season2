<?php
function loadRegistration($files)
{
    $datajson = file_get_contents($files);
    $arr_data = json_decode($datajson, true);
    return $arr_data;
}

function saveDataJSON($files, $name, $email, $phone)
{
    try {
        $contact = ['name' => $name, 'email' => $email, 'phone' => $phone];
        $arr_data = loadRegistration($files);
        array_push($arr_data, $contact);
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
        file_put_contents($files, $jsondata);
        echo "Luu du lieu thanh cong";
    } catch (Exception $e) {
        echo 'Loi: ', $e->getMessage(), "\n";
    }
}

$nameErr = null;
$emailErr = null;
$phoneErr = null;
$email = null;
$name = null;
$phone = null;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $has_eror = false;
    if (empty($name)) {
        $nameErr = "Ten dang nhap khong duoc de trong!";
        $has_eror = true;
    }
    if (empty($phone)) {
        $phoneErr = "So dien thoai khong duoc de trong!";
        $has_eror = true;
    }
    if (empty($email)) {
        $emailErr = "Email khong duoc de trong";
        $has_eror = true;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Dinh dang email sai (xxx@xxx.xxx.xxx)!";
        $has_eror = true;
    }
    if (!$has_eror) {
        saveDataJSON('users.json', $name, $email, $phone);
        $name = null;
        $phone = null;
        $email = null;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
        }
        .error {
            color: red;
        }

        h2 {
            text-align: center;
        }

        div {
            width: 700px;
            height: 300px;
            border: 3px solid black;

        }

        input {
            width: 300px;
            height: 30px;
            border-radius: 3px;
            margin-top: 10px;
        }

        button {
            width: 100px;
            height: 30px;
            font-size: 18px;
            border-radius: 3px;
            margin-top: 10px;
        }

        span {
            width: 150px;
            display: inline-block;
        }

        th, tr {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<form method="post">
    <div>
        <h2>Information</h2>
        <span>Ten nguoi dung:</span>
        <input type="text" name="name" placeholder="Nhap ten" value="<?php echo $name ?>">
        <span class="error">* <?php echo $nameErr ?></span>
        <br>
        <span>Email:</span>
        <input type="text" name="email" placeholder="Nhap email" value="<?php echo $email ?>">
        <span class="error">* <?php echo $emailErr ?></span>
        <br>
        <span>So dien thoai:</span>
        <input type="number" name="phone" placeholder="Nhap so dien thoai" value="<?php echo $phone ?>">
        <span class="error">* <?php echo $phoneErr ?></span>
        <br>
        <p><span class="error"> *required field</span></p>
        <button type="submit">Sign in</button>
    </div>
</form>
<?php
$registrations = loadRegistration('users.json');
?>
<h2>Registration list</h2>
<table border="0">
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    <?php foreach ($registrations as $key => $value): ?>
        <tr>
            <td><?php echo $key+1?></td>
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['email']; ?></td>
            <td><?php echo $value['phone']; ?></td>
        </tr>
    <?php endforeach ?>
</table>
</body>
</html>
