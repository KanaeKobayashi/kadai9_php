# 課題９ -オススメの本の登録アプリ-

## ①課題内容（どんな作品か）
- オススメの本を登録するアプリです。
- 本をサーチして、それに対しておすすめ度とコメントを入力できます。

## ②工夫した点・こだわった点
- 前回の課題８から、編集、削除が出来るようになりました。（課題）
- 前回のままだと、フォームを更新したら2回登録となるので、リロードによる多重投稿を防止するようにしました。
- 大好きな、csv出力（fputcsv関数を使用しました）だけでなく、csvでDBを編集、追加出来るようにしました。
- 最初の登録フォームで、おすすめ本を手入力するのが面倒だったので、サーチボタンを押すと検索ページに飛べるようにしました。
- 本を検索出来るシートに飛び、Google Books APIで検索、本の名前と著者名をローカルストレージに保存し、フォームに自動的に入力できるようにしました。
- そのため、名前とemailは後から入力するようにしました。
- 最初の登録フォームで、adminと打つとボタンが表示され、管理画面に行くようにし、CSVの出力、入力が出来る画面に遷移します。
- ユーザー側のおすすめ一覧は、emailなどの個人情報は表示しないようにしましたが、管理側はidも含めて見られるようにしています。（分けました）


## ③難しかった点・次回トライしたいこと(又は機能)
- csvの入力をさせたかったのですが、なかなかデータの読み込みをしてくれなかった（uploadフォルダを作ったことで大丈夫となった）
- idの重複があると書き換えてしまうので、新規のものはidの入力なしとしたかったのだが、うまく出来なかった。もう少し考えたい。
- APIで検索したものを入力欄に入れたかった。今回ローカルストレージを使って一時保存をするということでうまく出来たと思う。別の方法もあると思うので試してみたい。

## ④質問・疑問・感想、シェアしたいこと等なんでも
- [質問] 今回もcssがうまく当たらずPHPに直接書いたりして調整しました。もう少しうまくやりたい。
- [感想] DBで先に作った並びでも、後から使い勝手によって並びが変わったりします。でもDB側は変える必要がないので、そのあたりは、書きようだな、と思いました。
- いろいろ書きながら、こういう機能も欲しいなぁとか、これは面倒だな、と思うことが、実現出来たときはとてもうれしいと思いました。
- [参考記事] 
	- 1.
