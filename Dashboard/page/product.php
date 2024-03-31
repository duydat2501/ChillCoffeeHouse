<div class="table-data__tool">
    <div class="table-data__tool-left">
        <div class="rs-select2--light rs-select2--md">
            <select class="js-select2" name="property">
                <option selected="selected">All Properties</option>
                <option value="">Option 1</option>
                <option value="">Option 2</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <div class="rs-select2--light rs-select2--sm">
            <select class="js-select2" name="time">
                <option selected="selected">Today</option>
                <option value="">3 Days</option>
                <option value="">1 Week</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <button class="au-btn-filter">
            <i class="zmdi zmdi-filter-list"></i>filters</button>
    </div>
    <div class="table-data__tool-right">
        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#addNewProduct">
            Thêm sản phẩm
        </button>
        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
            <select class="js-select2" name="type">
                <option selected="selected">Export</option>
                <option value="">Option 1</option>
                <option value="">Option 2</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
    </div>
</div>
<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Ảnh</th>
                <th>Tựa đề</th>
                <th>Tác giả</th>
                <th>Mục</th>
                <th>Giá</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table_product">
            <?php 
            $result = getAllProduct(0);
            while ($row = $result->fetch_assoc()) {
                ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><img src="../PHP/public/<?php echo $row['img'] ?>" alt=""></td>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['author'] ?></td>
                <td><?php echo $row['casebook'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td>
                <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                            <i class="zmdi zmdi-more"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <?php 
        }
        ?>
        </tbody>
    </table>
    <div class="card">
        <div id="pagination">
            <nav aria-label="...">
                <ul class="pagination pagination-sm">
                    <?php 
                    $result = getAllProductNoNumpage();
                    $numpage = ceil($result->num_rows / 7);
                    for ($i = 1; $i <= $numpage; $i++) {
                        $pos = ($i - 1) * 7;
                        ?>
                    <li class="page-item <?php if ($i == 1) echo "active" ?>"><button class="page-link" type="button" onclick="getProduct(<?php echo $pos ?>,<?php echo $i ?>)"><?php echo $i ?></button></li>
                    <?php 
                } ?>
                </ul>
            </nav>
        </div>
    </div>
</div> 