<?php
session_start();
// require('../admin/layouts/default.blade.php');
function h($value) {
    return htmlspecialchars($value, ENT_QUOTES);
}

if (isset($_SESSION['form'])) {
	$form = $_SESSION['form'];
} else {
	header('Location: admin/join/join_index');
	exit();
}

// 登録ボタンが押されたら
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$db = dbconnect();
	$stmt = $db->prepare('insert into login (name, email, password) VALUES (?, ?, ?)');
	$password = password_hash($form['password'], PASSWORD_DEFAULT);
	$stmt->bind_param('sss', $form['name'], $form['email'], $password);
	$success = $stmt->execute();
	if (!$success) {
		die($db->error);
	}

	unset($_SESSION['form']);
	header('Location: admin/join/join_thanks');
}	

?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>会員登録</title>

	{{-- <link rel="stylesheet" href="../style.css" /> --}}
</head>

<body>
	<div id="wrap">
		<div id="head">
			<h1>会員登録</h1>
		</div>

		<div id="content">
			<p>記入した内容を確認して、「登録する」ボタンをクリックしてください</p>
			<form action="" method="post">
				<dl>
					<dt>ニックネーム</dt>
					<dd><?php echo h($form['name']); ?></dd>
					<dt>メールアドレス</dt>
					<dd><?php echo h($form['email']); ?></dd>
					<dt>パスワード</dt>
					<dd>
						【表示されません】
					</dd>
				</dl>
				<div><a href="admin/join/join_index?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="登録する" /></div>
			</form>
		</div>

	</div>
</body>

</html>