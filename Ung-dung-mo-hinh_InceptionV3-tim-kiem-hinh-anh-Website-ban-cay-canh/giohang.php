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
    $sql = "SELECT * FROM san_pham WHERE ma_san_pham = {$id}";
    $query = mysqli_query($connect,$sql);

    if($query){
      $sanpham = mysqli_fetch_assoc($query);
    }
    
    $item = [
    'ma_san_pham' => $sanpham['ma_san_pham'],
    'ten_san_pham' => $sanpham['ten_san_pham'],
    'gia_tien' => $sanpham['gia_tien'],
    'Soluonghang' => $soluonghang
    ];

    if($action == 'add'){
        if(isset($_SESSION['cart'][$id])){
          $_SESSION['cart'][$id]['Soluonghang']++;
          
        }else{
          $_SESSION['cart'][$id] = $item;
        }
        sleep(1);
        header("Location: ./", true, 303);
        exit;
    }

    if($action == 'update'){
      if(isset($_SESSION['cart'][$id])){
        if($_SESSION['cart'][$id]['Soluonghang'] == $soluonghang)
        {
          $_SESSION['cart'][$id]['Soluonghang']++;
        }else{
          $_SESSION['cart'][$id]['Soluonghang'] = $soluonghang;
        }
        header('location: view-giohang.php');
      }
    }

    if($action == 'delete'){
      unset($_SESSION['cart'][$id]);
      header('location: view-giohang.php');
    }

?>
