<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="<?= site_url("assets/anime/") ?>index.html"><img src="<?= site_url("assets/anime/") ?>img/logo.png" alt="">LIST</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <?php $menu = $this->uri->segment(1);?>
                            <li class="<?php if($menu==''){ echo "active"; } ?>"><a href="<?= site_url("") ?>">Homepage</a></li>
                            <li class="<?php if($menu=='mylist'){ echo "active"; } ?>"><a href="<?= site_url('mylist') ?>">Mylist</a></li>
                            <li class="<?php if($menu=='myfav'){ echo "active"; } ?>"><a href="<?= site_url('myfav') ?>">MyFav</a></li>
                        <!-- jika role = null redirect auth -->
                        <li><a href="<?= site_url('auth') ?>">Login</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This web is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="" target="_blank">Ais</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

