<?php
  class ItemsClass{
      public $purchaseId="";
      public $paymentId="";
      public $items=array();
      public $username = "";

       function __construct($pid,$payid,$it,$user){
        $this->purchaseId = $pid;
        $this->paymentId = $payid;
        $this->items = $it;
        $this->user = $user;
      }

  }  
?>