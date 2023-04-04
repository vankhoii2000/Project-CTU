<?php
$sql = "SELECT * FROM LOAI_SAN_PHAM";
$loaisanpham = mysqli_query($connect,$sql);
?>



<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="container my-5">
    <!-- Footer -->
    <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-between p-4 text-white" style="background-color: #21D192">

        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <a href="./index.php"> <h3 class="text-uppercase fw-bold">BÁN CÂY CẢNH</h3></a>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">sản phẩm</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <?php while($row = mysqli_fetch_assoc($loaisanpham)): ?>

                        <p>
                            <a href="phanloaisp.php?id=<?= $row['ma_loai'] ?>"
                                class="text-dark"><?php echo $row['ten_loai'] ?></a>
                        </p>
                        <?php endwhile; ?>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Chính sách</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>Bảo hành 14 ngày</p>
                        <p>Hỗ trợ chăm sóc</p>
                        <p>Giao hàng tận nơi</p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">LIÊN HỆ</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p><i class="fas fa-home mr-3"></i>Địa chỉ: Xuân Khánh, Ninh Kiều, Cần Thơ</p>
                        <p><i class="fas fa-envelope mr-3"></i> shopcaycanh@example.com</p>
                        <p><i class="fas fa-phone mr-3"></i> + 0987.654.321</p>
                        <p><i class="fas fa-print mr-3"></i> + 0123.456.789</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2022 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">shopcaycanh.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</div>
<!-- End of .container -->