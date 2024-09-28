<header class="header">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-2">
                <div class="header__logo">
                    <a href="<?= site_url("") ?>">
                        <img src="img/logo.png" alt="">
                    </a>
                </div>
            </div> -->
            <div class="col-lg-10">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <?php $menu = $this->uri->segment(1);?>
                            <?php $menu2 = $this->uri->segment(2);?>
                            <li class="<?php if($menu==''){ echo "active"; } ?>"><a href="<?= site_url("") ?>">Homepage</a></li>
                            <li class="<?php if($menu=='mylist'){ echo "active"; } ?>"><a href="<?= site_url('mylist') ?>">Mylist</a></li>
                            <li class="<?php if($menu=='myfav'){ echo "active"; } ?>"><a href="<?= site_url('myfav') ?>">MyFav</a></li>
                            <li class="<?php if($menu=='home'){ echo "active"; } ?>"><a href="">Type <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    <?php foreach ($type as $ty) { ?>
                                        <li><a href="<?= site_url('home/get_type/'. $ty['id_type']) ?>"><?= $ty['type_name']?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="<?php if($menu=='home'){ echo "active"; } ?>"><a href="">Genre <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    <?php foreach ($genre as $gen) { ?>
                                        <li><a href="<?= site_url('home/get_genre/'. $gen['id_genre']) ?>"><?= $gen['genre']?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <!-- jika userdata role = null redirect auth -->
                            <li><a href="<?= site_url('_user/addlist') ?>">Add List</a></li>
                            <li class="<?php if($menu=='contact'){ echo "active"; } ?>"><a href="<?= site_url('contact') ?>">Contacts Us</a></li>
                            
                            <!-- jika userdata role = null akan muncul, jika ada maka di ganti logout-->
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__right">
                    <a href="<?= site_url('#')?>" class="search-switch"><span class="icon_search"></span></a>
                    <a href="<?= site_url("auth") ?>"><span class="icon_profile"></span></a>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>