<div class="table-data__tool">
    <div class="table-data__tool-left">
        <div class="rs-select2--light rs-select2--md" style="width: 200px;">
            <select id="casebook" class="js-select2" name="property" onchange="toolProduct()">
                <option value="-1" selected="selected">Danh mục</option>
                <?php
                $danhmuc = getCasebook();
                while ($row = $danhmuc->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row['casebook'] ?>"><?php echo $row['name'] ?></option>
                <?php
                } ?>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <div class="rs-select2--light rs-select2--sm" style="width: 200px;">
            <select id="sort" class="js-select2" name="time" onchange="toolProduct()">
                <option value="-1" selected="selected">Chức năng</option>
                <option value="0">Giảm dần theo giá</option>
                <option value="1">Tăng dần theo giá</option>
                <option value="2">Giảm dần theo số lượng</option>
                <option value="3">Tăng dần theo số lượng</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <button class="au-btn-filter">
            <i class="zmdi zmdi-filter-list"></i>filters</button>
    </div>
    <div class="table-data__tool-right">
        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addNewProduct">
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
                <th>SL</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table_product">
            <?php
            $result = getAllProduct(0);
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr id="tr<?php echo $row['id'] ?>">
                    <td><?php echo $row['id'] ?></td>
                    <td><img src="../public/<?php echo $row['img'] ?>" alt=""></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['summary'] ?></td>
                    <td><?php echo $row['casebook'] ?></td>
                    <td><?php echo number_format($row['price']) ?>VND</td>
                    <td><?php echo $row['amount'] ?></td>
                    <td>
                        <div class="table-data-feature">
                            <button onclick="updateProduct(<?php echo $row['id'] ?>)" style="margin:2px;" type="button" class="btn btn-secondary  mb-1" data-toggle="modal" data-target="#updateProduct">
                                <i class="zmdi zmdi-edit"></i>
                            </button>

                            <button style="margin:2px;" class="btn btn-secondary  mb-1" data-toggle="tooltip" data-placement="top" onclick="deleteProduct(<?php echo $row['id'] ?>)" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>

                            <button style="margin:2px;" type="button" class="btn btn-secondary  mb-1" data-toggle="modal" data-target="#moreProduct" onclick="moreProduct(<?php echo $row['id'] ?>)">
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
                        <li class="page-item <?php if ($i == 1) echo "active" ?>">
                            <button class="page-link" type="button" onclick="getProduct(<?php echo $pos ?>,<?php echo $i ?>)"><?php echo $i ?></button>
                        </li>
                    <?php
                    } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>