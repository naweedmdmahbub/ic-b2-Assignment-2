<?php

class Category {
  public function store() {
    $list = array(
      "Type,Category",
      "Income,Salary",
      "Income,Business",
      "Income,Rent",
      "Expense,Family",
      "Expense,Personal",
      "Expense,Recreation",
      "Expense,Sadakah",
      "Expense,Gift",
    );
    $file = fopen("categories.csv","w");
    foreach ($list as $line)
    {
      fputcsv($file,explode(',',$line));
    }
    fclose($file);
  }


  public function view() {
    $filename = "categories.csv";
    $categoryData = [];
    if (($handle = fopen($filename, "r")) !== false) {
      fgetcsv($handle);
      while (($data = fgetcsv($handle)) !== false) {
        $type = $data[0];
        $category = $data[1];
        $categoryData[] = ['type' => $type, 'category' => $category];
      }
      fclose($handle);
    }
    foreach ($categoryData as $item) {
      echo "Type: " . $item['type'] . ", Category: " . $item['category'] . "\n";
    }
    echo "\n";
  }
}

?>

