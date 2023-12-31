# 課題９ -オススメの本の登録アプリ-

## ①課題内容（どんな作品か）
- オススメの本を登録するアプリです。
- 本をサーチして、それに対しておすすめ度とコメントを入力できます。

## ②工夫した点・こだわった点
- 前回の課題８から、編集、削除が出来るようになりました。（課題）
- 前回のままだと、フォームを更新したら2回登録となるので、リロードによる多重投稿を防止するようにリダイレクト処理を追加しました。
- 大好きな、csv出力（fputcsv関数を使用しました）だけでなく、csvでDBを編集、追加出来るようにしました。（fgetcsv関数利用）
- 最初の登録フォームで、おすすめ本を手入力するのが面倒だったので、サーチボタンを押すと検索ページに飛べるようにしました。
- 本を検索出来るシートに飛び、Google Books APIで検索、本の名前と著者名をローカルストレージに保存し、フォームに自動的に入力できるようにしました。
- そのため、名前とemailは後から入力するようにしました。
- 検索欄は一応バリデーション処理をしています。（文字数制限、禁止文字なし）
- 最初の登録フォームで、adminと打つとボタンが表示され、管理画面に行くようにし、CSVの出力、入力が出来る画面に遷移します。
- ユーザー側のおすすめ一覧は、emailなどの個人情報は表示しないようにしましたが、管理側はidも含めて見られるようにしています。（分けました）
- オススメリストでは、昇順、降順ボタンと検索ボタンをつけました。

## ③難しかった点・次回トライしたいこと(又は機能)
- csvの入力をさせたかったのですが、なかなかデータの読み込みをしてくれなかった（uploadフォルダを作ったことで大丈夫となった）
- idの重複があると書き換えてしまうので、新規のものはidの入力なしとしたかったのだが、うまく出来なかった。もう少し考えたい。
- APIで検索したものを入力欄に入れたかった。今回ローカルストレージを使って一時保存をするということでうまく出来たと思う。別の方法もあると思うので試してみたい。

## ④質問・疑問・感想、シェアしたいこと等なんでも
- [質問] 今回もcssがうまく当たらずPHPに直接書いたりして調整しました。もう少しうまくやりたい。（キャッシュの問題もあると思うけど・・・）
- [感想] DBで先に作った並びでも、後から使い勝手によって並びが変わったりします。でもDB側は変える必要がないので、そのあたりは、書きようだな、と思いました。
- いろいろ書きながら、こういう機能も欲しいなぁとか、これは面倒だな、と思うことが、実現出来たときはとてもうれしいと思いました。
- [参考記事] 
	- 1.https://www.php.net/manual/ja/function.fgetcsv.php(CSV入力）
 	- 2.https://qiita.com/asami___t/items/9ef2d97593b7d983971c

## 目次
	-1.index.php …　登録フォーム
	-2. funcs.php   バリデーション処理関数
	-3.thankyou.php  リダイレクト処理
	-4. write.php 　DBへ追加機能
	-5.result.php   ユーザーが見るおすすめ一覧表
	-6.resultAdmin.php 管理者画面から見えるおすすめ一覧
	-7.totalling.php   レーディングのグラフ
	-8.search.php   APIを使った本の検索画面と処理
	-9.import_csv.php  csvインポート用画面
	-10.process_import.php csvインポート処理
	-11.export_csv.php  csvエクスポート機能
	-12.edit.php  編集画面と処理
	-13.delete.php  削除機能
	-14.db_connect.php  DB接続に関する共通コード
	-15.administrator.php  管理者画面　index.phpからadminを打ってボタンを押すと遷移する
 	-16.update.php DB内のデータを編集する（コメントとレーディングのみ）
	-その他
		-upload フォルダ　　インポートするCSVを保管する
		-img フォルダ　　画像をストアしてあるフォルダ
		-css フォルダ　　cssファイルを格納
		-DBフォルダ　　課題確認用として、DBの中身が分かるもの
