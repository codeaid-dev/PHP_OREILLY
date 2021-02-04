/* penguinユーザーでログインして、customersテーブル作成 */
CREATE TABLE customers (
  customers_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  phone VARCHAR(255) NOT NULL,
  favorite_dish_id INT NOT NULL
) DEFAULT CHARACTER SET=utf8;

/* TIPS: テーブルに列を追加・削除、テーブルの確認 */
/* 列を追加 */
ALTER TABLE [テーブル名] ADD [列名] [型] [制約];

/* 列を削除 */
ALTER TABLE [テーブル名] DROP [列名];

/* テーブルの確認 */
DESC [テーブル名];