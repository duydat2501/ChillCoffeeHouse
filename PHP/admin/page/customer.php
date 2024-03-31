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
        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addNewUser">
            Thêm tài khoản
        </button>
    </div>

</div>
<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
            <tr style="cursor:pointer">
                <th onclick="sortUser('id')">Mã</th>
                <th onclick="sortUser('username')">Tên tài khoản</th>
                <th onclick="sortUser('password')">Password</th>
                <th onclick="sortUser('admin')">Vai trò</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table_customer">
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
                        <div class="table-data-feature">
                            <button onclick="moreUser(<?php echo $row['id'] ?>)" type="button" class="btn btn-secondary m-1" data-toggle="modal" data-target="#moreUser"><i class="zmdi zmdi-more"></i></button>
                        </div>

                        <button style="margin-left:4px;" class="btn btn-secondary m-1" data-toggle="tooltip" data-placement="top" onclick="deleteUser(<?php echo $row['id'] ?>)" title="Delete">
                            <i class="zmdi zmdi-delete"></i>
                        </button><br>
                    </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="card">
        <div id="pagination_user">
            <nav aria-label="...">
                <ul class="pagination pagination-sm">
                    <?php
                    $result = getAllUserNoNumpage();
                    $numpage = ceil($result->num_rows / 7);
                    if ($numpage != 1) // nếu mà numpage = 1 thì không cồn hiển thị lên
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