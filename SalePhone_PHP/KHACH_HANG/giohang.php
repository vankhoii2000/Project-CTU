<?php
    include 'connect.php';
    session_start();
    
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
    }

    $action = (isset($_GET['action']))  ? $_GET['action'] : 'add';
    $soluonghang = (isset($_GET['Soluonghang']))  ? $_GET['Soluonghang'] : 1 ;
  
    if($soluonghang <= 0){
        $soluonghang = 1;
    }

    $sql = "SELECT * FROM HANGHOA WHERE MSHH = {$id}";
    $query = mysqli_query($connect,$sql);

    if($query){
      $sanpham = mysqli_fetch_assoc($query);
    }

    $item = [
    'MSHH' => $sanpham['MSHH'],
    'TenHH' => $sanpham['TenHH'],
    'Gia' => $sanpham['Gia'],
    'Soluonghang' => $soluonghang
    ];

    
    if($action == 'add'){
      if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['Soluonghang']++;
        
      }else{
        $_SESSION['cart'][$id] = $item;

      }
    }

    if($action == 'update'){
      if(isset($_SESSION['cart'][$id])){
        if($_SESSION['cart'][$id]['Soluonghang'] == $soluonghang)
        {
          $_SESSION['cart'][$id]['Soluonghang']++;
        }else{
          $_SESSION['cart'][$id]['Soluonghang'] = $soluonghang;
        }
        
      }
    }

    if($action == 'delete'){
      unset($_SESSION['cart'][$id]);
    }


header('location: view_giohang.php');

?>
