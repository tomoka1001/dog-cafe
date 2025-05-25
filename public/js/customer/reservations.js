  // 入力フィールドとエラーメッセージの対応関係を定義
  const fields = [
    { id: 'name', errorId: 'errorMessageName', message: 'お名前は必須です。' },
    { id: 'name_kana', errorId: 'errorMessageNameKana', message: 'お名前（カナ）は必須です。' },
    { id: 'email', errorId: 'errorMessageEmail', message: 'メールアドレスは必須です。' },
    { id: 'phone', errorId: 'errorMessagePhone', message: '電話番号は必須です。' },
    { id: 'people', errorId: 'errorMessagePeople', message: 'ご予約人数は必須です。' },
    { id: 'reserved_date', errorId: 'errorMessageDate', message: 'ご予約日は必須です。' },
    { id: 'reserved_time', errorId: 'errorMessageTime', message: 'ご予約時間は必須です。' },
  ];

  // 各フィールドにblurイベントを登録
  fields.forEach(field => {
    const input = document.getElementById(field.id);
    const error = document.getElementById(field.errorId);

    input.addEventListener('blur', () => {
      if (input.value.trim() === '') {
        error.textContent = field.message;
      } else {
        error.textContent = '';
      }
    });
  });


// fields.forEach(field => { ... })
// fields は配列です（あなたが定義した「ID・エラーID・メッセージ」のリスト）。

// forEach() は配列の要素を1つずつ取り出して、関数の中の処理を実行します。

// field は今処理中の要素（オブジェクト）を指します。



// const input = document.getElementById(field.id);
// field.id は、たとえば "name" や "email" など、input 要素の id 値です。

// document.getElementById(...) は、その id を持つHTML要素（この場合は input タグ）を取得します。

// input という変数に、その input 要素が格納されます。



// const error = document.getElementById(field.errorId);
// field.errorId は、たとえば "errorMessageName" や "errorMessageEmail" のような、エラーメッセージを表示する div や span の id。

// 同じく getElementById() を使って、そのHTML要素を取得し、error という変数に格納しています。
