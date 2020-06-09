<?php

session_start();

if ($_SESSION['user_rights'] !== "OK") {
  // redirection login
  header("Location:../pages/login.php");

}else {
  // redirection dans le site
  if(isset($_GET['p'])) {
   $page = $_GET['p'];
  } else {
    header('Location: index.php?p=home');
  }

  ob_start();

   switch ($page) {

     //********** SIMPLE *************

     case 'home':
      require '../pages/home.php';
      break;

     case 'plane':
      require '../pages/plane.php';
      break;

     case 'items':
      require '../pages/items.php';
      break;

     case 'ot':
      require '../pages/ot.php';
      break;

     case 'supplier':
       require '../pages/supplier.php';
       break;

     case 'customers':
      require '../pages/customers.php';
      break;

     case 'users':
      require '../pages/users.php';
      break;


    //************* FOCUS *************

     case 'focus_plane':
      require '../pages/focus_plane.php';
      break;

     case 'focus_items':
      require '../pages/focus_items.php';
      break;

     case 'focus_ot':
      require '../pages/focus_ot.php';
      break;

     case 'focus_supplier':
      require '../pages/focus_supplier.php';
      break;

     case 'focus_customer':
      require '../pages/focus_customer.php';
      break;

     case 'focus_users':
      require '../pages/focus_users.php';
      break;


    //*************** ADD ******************

    case 'add_plane':
     require '../pages/add_plane.php';
     break;

    case 'add_items':
     require '../pages/add_items.php';
     break;

    case 'add_ot':
     require '../pages/add_ot.php';
     break;

    case 'add_supplier':
     require '../pages/add_supplier.php';
     break;

    case 'add_customers':
     require '../pages/add_customers.php';
     break;

    case 'add_users':
     require '../pages/add_users.php';
     break;


     //************ FOCUS *******************

     case 'modify_plane':
      require '../pages/modify_plane.php';
      break;

     case 'modify_items':
      require '../pages/modify_items.php';
      break;

     case 'modify_ot':
      require '../pages/modify_ot.php';
      break;

     case 'modify_supplier':
      require '../pages/modify_supplier.php';
      break;

     case 'modify_customers':
      require '../pages/modify_customers.php';
      break;

     case 'modify_users':
      require '../pages/modify_users.php';
      break;


    // ****** DEFAULT ************************

    default:
      header('Location: index.php?p=home');
      break;
  }

  $content = ob_get_clean();
  require '../pages/html/templates/default.phtml';

  // end else
}




 ?>
