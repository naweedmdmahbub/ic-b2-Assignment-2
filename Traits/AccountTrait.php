<?php
trait AccountTrait {
  public function total(String $category = null, String $model) :int{
    $total = 0;
    $myfile = fopen($model."s.txt", "r") or die("Unable to open file!");
    while(!feof($myfile)) {
      $line = fgets($myfile);
      $data = explode(',', $line);
      if (count($data) >= 2) {
        if($category == $data[0]){
          $total += intval($data[1]);
          echo "Category: " . $data[0] . "\tAmount: " . $data[1];
        }
      }
    }
    fclose($myfile);
    return $total;
  }

  
  public function add(String $model): int {
    $category = readline("Enter the category: ");
    $amount = readline("Enter the income amount: ");
    $myfile = fopen($model."s.txt", "a") or die("Unable to open file!");
    $txt = $category.",".$amount."\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    echo $model." added successfully.\n";
    return $amount;
  }

  public function view(String $model){
    $category = readline("Enter the category: ");
    $total = $this->total($category, $model);
    if($total == 0) echo "Invalid category, Sorry! \n\n";
    else echo "Total ".$category." ".get_class($this)." is ".$total ."\n\n";
  }
}

?>