<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="../">
            <img src="images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar mystyle_aside">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="?page=product">
                        <i class="fas fa-table"></i>Sản phẩm <span>(<?php echo getAllProductNoNumpage()->num_rows ?>)</span></a>
                </li>
                <li>
                    <a href="?page=category">
                        <i class="fas fa-chart-bar"></i>Danh mục (<?php echo getCasebook()->num_rows ?>)</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="?page=customer">
                        <i class="fas fa-tachometer-alt"></i>Khách hàng (<?php echo getAllUserNoNumpage()->num_rows ?>)</a>
                </li>
                <li>
                    <a href="?page=order">
                        <i class="fas fa-chart-bar"></i>Đơn hàng (<?php echo getOrderNoNumpage()->num_rows ?>)</a>
                </li>
              
            </ul>
        </nav>
    </div>
</aside>