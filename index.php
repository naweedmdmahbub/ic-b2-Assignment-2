<?php
  require_once './Models/Finance.php';
  require_once './Models/Category.php';
  require_once './Models/Income.php';
  require_once './Models/Expense.php';

  $category = new Category();
  $category->store();

  
  $choice = 0;
  $income = 0;
  $expense = 0;

  do {
    echo "What do you want to do?\n1. Add income \n2. Add expense \n3. View income \n4. View expense \n5. View total \n6. View Categories\n7. Exit\n\n";
    echo "Enter a value: ";
    $choice = readline("Enter a value (1-7): ");

    switch ($choice) {
      case 1:
        $income = new Income();
        $income->add('income');
        break;
      case 2:
        $expense = new Expense();
        $expense->add('expense');
        break;
      case 3:
        echo "View Incomes:\n";
        (new Income())->view('income');
        break;
      case 4:
        echo "View Expenses:\n";
        (new Expense())->view('expense');
        break;
      case 5:
        $finance = new Finance();
        $total = $finance->total();
        echo "Total balance: $total\n";
        break;
      case 6:
        echo "View categories:\n";
        (new Category())->view();
        break;
      case 7:
        echo "Exiting the program.\n";
        exit;
      default:
        echo "Invalid choice. Please enter a valid option (1-7).\n";
    }
  }while($choice != 7);
?>