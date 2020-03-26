<?php
// オブジェクト指向　解答
/*
// ********** Q1 **********
class Message {
  protected $message;

  public function __construct(string $msg) {
    $this->message = $msg;
  }
  public function setMsg(string $msg) {
    $this->message = $msg;
  }
  public function showMsg() {
    print($this->message);
  }
}

$obj = new Message("こんにちは！！\n");
$obj->showMsg();
$obj->setMsg("こんばんは\n");
$obj->showMsg();
*/

// ********** Q2 **********
class Message {
  protected $message;
  protected $recipient;

  public function __construct(string $msg) {
    $this->message = $msg;
  }
  public function setMsg(string $msg) {
    $this->message = $msg;
  }
  public function setRecipient(string $recipient) {
    $this->recipient = $recipient;
  }
  public function showMsg() {
    print("受信者：" . $this->recipient . "\n");
    print("メッセージ：" . $this->message);
  }
}

$obj = new Message("おはよう\n");
$obj->setRecipient("山田太郎");
$obj->showMsg();


// ********** Q3 **********
class SNS extends Message {
  public $tool = "Twitter";
  public function showMsg()
  {
    parent::showMsg();
    print($this->tool . "を使用しています\n");
  }
}

$sns = new SNS("SNSからのメッセージです\n");
$sns->tool = "LINE";
$sns->setRecipient("田中二郎");
$sns->showMsg();
