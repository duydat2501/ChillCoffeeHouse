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
        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
            <i class="zmdi zmdi-plus"></i>add item</button>
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
                <th>Tên tài khoản</th>
                <th>Password</th>
                <th>Vai trò</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table_product">
            <?php 
            $result = getAllUser(0);
            while ($row = $result->fetch_assoc()) {
                ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo md5($row['password']) ?></td>
                <td>
                    <?php 
                    if ($row['admin'] == 1) echo '<span class="role admin">admin</span>';
                    else
                        echo '<span class="role member">member</span>';
                    ?>
                </td>
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
                    $result = getAllUserNoNumpage();
                    $numpage = ceil($result->num_rows / 7);
                    if ($numpage != 1)
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