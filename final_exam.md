* 2016年 後期 期末試験

** 「特定のゲーム」のPC一人を入れられるテーブルを作成

「１ゲーム内の１プレイキャラクタ」の情報を格納できるCREATE TABLE文を作成しなさい。
数値については、いずれも「負の値を持たない、65535以下」程度の値を想定しなさい。


***(問1-1) 

FF1のプレイキャラクタ一人を格納できるテーブルを作成しなさい。
なお、パラメタは以下の通りとする。

- 名前
- HP
- 最大HP
- MP
- 最大MP
- 力
- 素早さ
- 知性
- 体力
- 幸運
- 所持金
- 経験値
- レベル

***(問1-2) 

GURPS BASICのプレイキャラクタ一人を格納できるテーブルを作成しなさい。
なお、パラメタは以下の通りとする。

- 名前
- ST(体力)
- DX(敏捷力)
- IQ(知力)
- HT(生命力)
- 所持金
- 残CP

** 基本的なSQL構文

以下のテーブルに対して、適切なデータを取得できるSQL文を書きなさい。

```
CREATE TABLE exam (
  id int unsigned NOT NULL AUTO_INCREMENT,
  num int,
  name varchar(128),
  created datetime,
  PRIMARY KEY(id)
);
```

***(問2-1)select文：テーブル全部

examテーブルの「全てのレコード」を取得するSQLを書きなさい。

***(問2-2)select文：WHERE句

examテーブルのうち「idが10のレコード」を取得するSQLを書きなさい。

***(問2-3)select文：BETWEEN

examテーブルのうち「numが10以上100以下のレコード」を取得するSQLを書きなさい。

***(問2-4)select文：LIKE句

examテーブルのうち「nameに、文字列'abc'が含まれるレコード」を取得するSQLを書きなさい。

***(問2-5)select文：ORDER BY

examテーブルの「全てのレコード」を取得するSQLを書きなさい。
ただし、データはcreatedカラムの情報で降順にソートされるようにしなさい。

***(問2-6)select文：LIMIT

examテーブルの「0番目から5レコード」を取得するSQLを書きなさい。
ただし、データはcreatedカラムの情報で降順にソートされるようにしなさい。

** PHPでのDB接続

***(問3-1)PDOによる接続

PHPで、PDOクラスを使ってdatabaseに接続するプログラムを書きなさい。
接続情報は以下の通りとする。

- 接続ID: test
- 接続パスワード: pass
- 接続database: database
- 接続サーバ: 192.168.0.1
- 文字コード: utf8mb4

***(問3-2)PDOによるSQL発行(INSERT)

問2に出てきたテーブルに１レコード追加するPHPプログラムを書きなさい。
データは任意とする。

** パスワードを含むユーザ情報の登録

***(問4-1)認証情報の登録

$idに「ユーザID」、$passに「ユーザから入力されたパスワードが入っている」前提で、DBに「適切な形で」データをinsertするPHPプログラムを書きなさい。
なお、PHPのバージョンは5.5以降である、とします。
また、insertするテーブルフォーマットは以下の通りとする。

```
CREATE TABLE user_auth (
  id varbinary(64) NOT NULL,
  password varbinary(64) NOT NULL,
  PRIMARY KEY(id)
);
```

***(問4-2)パスワードの比較

$passに「ユーザから入力されたパスワード」、$db_passに「password_hash()でハッシュされた、DBに格納されているパスワード情報」が入っている前提で、両者を比較するコードを書きなさい。
比較後、OKなら「認証OK」、NGなら「認証NG」と出力しなさい。

** 簡単な乱数の作成

***(問5-1)

PHPで「１から６までの間の乱数」を作成し、出力するコードを書きなさい。

***(問5-2)

PHPで「１から６までの間の乱数」を作成し、戻り値として返す関数を書きなさい。
関数名は「dice_6」とします。

***(問5-3)

以下の文字列が解釈可能なコードを書きなさい。
なお、表記は「振るダイスの数」D「ダイスのタイプ」とします。
例えば1D6の場合は「１回」「６面ダイス」を振る、となります。
例えば3D8の場合は「３回」「８面ダイス」を振る、となります。

- 1D6
- 2D6
- 3D8

***(問5-4)

以下の文字列が解釈可能なコードを書きなさい。

- 2D6+2
- 3D8+5

** トランザクション

***(問6-1)トランザクションを使うSQL文の作成：有料がちゃ

有料課金がちゃを引くために必要なSQLを、トランザクションを使って適切に書きなさい。
また、カードを引く前に「有料課金の残高が足りているかどうか」をSQLで確認しなさい。

- user_idは2016とする
- userテーブルの残高(money)を取得：PHPプログラムであればif文等でチェック。今回はSQLのみなのでチェック処理はオミット
- userテーブルのmoneyの値を100、減算
- user_cardテーブルにinsert。引いたカードID(card_id)は114とする

```
CREATE TABLE user (
  user_id int unsigned NOT NULL,
  money int unsigned ,
  PRIMARY KEY(user_id)
);
```

```
CREATE TABLE user_card (
  user_card_id int unsigned NOT NULL AUTO_INCREMENT,
  user_id int unsigned NOT NULL,
  card_id int unsigned NOT NULL,
  created datetime,
  PRIMARY KEY(user_card_id)
);
```

***(問6-2)トランザクションを使うSQL文の作成：有料アイテムの使用

有料アイテムを使うために必要なSQLを、トランザクションを使って適切に書きなさい。
また、アイテムを使う前に「アイテムの個数が足りているかどうか」をSQLで確認しなさい。

- user_idは2016とする
- 使うアイテムのitem_idは14とする
- card_idテーブルのアイテム個数(item_num)を取得：PHPプログラムであればif文等でチェック。今回はSQLのみなのでチェック処理はオミット
- item_numテーブルのitem_numの値をデクリメント(マイナス１する)

```
CREATE TABLE user_item (
  user_id int unsigned NOT NULL,
  item_id int unsigned NOT NULL,
  item_num int unsigned NOT NULL,
  PRIMARY KEY(user_id, item_id)
);
```

** アイテム使用

***(問7-1)プログラム型のアイテム使用

***(問7-2)マクロ型のアイテム使用


** 難問
