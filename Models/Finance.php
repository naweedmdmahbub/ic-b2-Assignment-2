<?php
require_once './Traits/AccountTrait.php';

class Finance {
  public function total(){
    
    $totalIncome = 0;
    $myfile = fopen("incomes.txt", "r") or die("Unable to open file!");
    while(!feof($myfile)) {
      $line = fgets($myfile);
      $data = explode(',', $line);
      if (count($data) >= 2) {
          $totalIncome += intval($data[1]);
      }
    }
    fclose($myfile);
    
    $totalExpense = 0;
    $myfile = fopen("expenses.txt", "r") or die("Unable to open file!");
    while(!feof($myfile)) {
      $line = fgets($myfile);
      $data = explode(',', $line);
      if (count($data) >= 2) {
          $totalExpense += intval($data[1]);
      }
    }
    fclose($myfile);
    return $totalIncome - $totalExpense;
  }
}

?>