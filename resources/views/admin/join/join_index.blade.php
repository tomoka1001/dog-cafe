<?php 
// session_start();
// // require('../admin/layouts/default.blade.php');
// function h($value) {
//     return htmlspecialchars($value, ENT_QUOTES);
// }

// if (isset($_GET['action']) && $_GET['action'] === 'rewite' && isset($_SESSION['form'])) {
//     $form = $_SESSION['form'];
// } else {
//     $form = [
//     'name' => '',
//     'email'=> '',
//     'password' => '',
//     ];
// }
// $error = [];

// if ($_SERVER['REQUEST_METHOD'] === 'post') {
//     // 名前のチェック
//     $form['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITAIZE_STRING);
//     if ($form['name'] == '') {
//         $error['name'] = 'blank';
//     }

//     // メールアドレスのチェック
//     $form['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITAIZE_EMAIL);
//     if ($form['email'] == '') {
//         $error['email'] = 'blank';
//     } else {
//         $db = dbconnect();
//         $stmt = $db->prepare('select count(*) from login where email=?');
//         if (!$stmt) {
//             die($db->error);
//         }
//         $stmt->bind_param('s', $form['email']);
//         $success = $stmt->execute();
//         if (!$success) {
//             die($db->error);
//         }

//         $stmt->bind_result($cnt);
//         $stmt->fetch();

//         if ($cnt > 0) {
//             $error['email'] = 'duplicate';
//         }
//     }

//     // パスワードのチェック
//     $form['password'] = filter_input(INPUT_POST, 'password', FILTER_SANITAIZE_STRING);
//     if ($form['password'] == '') {
//         $error['password'] = 'blank';
//     } else if (strlen($form['password']) < 4) {
//         $error['passeord'] = 'length';
//     }

//     if (empty($error)) {
//         $_SASSION['form'] = $form;
//         header('Location: join_check.blade.php');
//         exit();
//     }
// }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員登録</title>
    {{-- <link rel="stylesheet" href="../style.css"/> --}}
</head>
<body>
    <div id="wrap">
        <div id="head">
            <h1>会員登録</h1>
        </div>   
        <div id="content">
            <p>次のフォームに必要事項をご記入ください。</p>
            <form action="" method="post" enctype="multipart/form-data">
                <dl>
                    <dt>名前<span class="required">必須</span></dt>
                    <dd>
                        <input type="text" name="name" size="35" maxlength="255" value="<?php echo h($form['name']); ?>"/>
                         <?php if (isset($error['name']) && $error['name'] === 'blank'): ?>
                            <p class="error">* 名前を入力してください</p>
                        <?php endif; ?>
                    </dd>
                    <dt>メールアドレス<span class="required">必須</span></dt>
                    <dd>
                        <input type="text" name="email" size="35" maxlength="255" value="<?php echo h($form['email']); ?>"/>
                        <?php if (isset($error['email']) && $error['email'] === 'blank'): ?>
                            <p class="error">* メールアドレスを入力してください</p>
                        <?php endif; ?>
                        <?php if (isset($error['email']) && $error['email'] === 'duplicate'): ?>
                        <p class="error">* 指定されたメールアドレスはすでに登録されています</p>
                        <?php endif; ?>
                    <dt>パスワード<span class="required">必須</span></dt>
                    <dd>
                        <input type="password" name="password" size="10" maxlength="20" value="<?php echo h($form['password']); ?>"/>
                        <?php if (isset($error['password']) && $error['password'] === 'blank'): ?>
                            <p class="error">* パスワードを入力してください</p>
                        <?php endif; ?>
                        <?php if (isset($error['password']) && $error['password'] === 'length'): ?>
                            <p class="error">* パスワードは4文字以上で入力してください</p>
                        <?php endif; ?>
                    </dd>
                </dl>
                <div><input type="submit" value="入力内容を確認する"/></div>
            </form>
        </div>
    </body>
    
    </html>
