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
        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addNewCategory">
            Thêm danh mục
        </button>
    </div>



</div>
<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
            <tr style="cursor:pointer">
                <th onclick="sortCase('casebook')">Mã danh mục</th>
                <th onclick="sortCase('name')">Tên danh mục</th>
                <th>SL</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table_case">
            <?php
            $result = getCasebook();
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr id="tr<?php echo $i ?>">
                    <td><?php echo $row['casebook'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo getAmountByCasebook($row['casebook'])->num_rows;
                        ?> Sản Phẩm</td>
                    <td>
                        <div class="table-data-feature">
                           
                            <button onclick="getUpdateCasebook('<?php echo $row['casebook'] ?>',<?php echo $i++ ?>)" style="margin-left:4px;" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#updateCasebook">
                                <i class="zmdi zmdi-edit"></i>
                            </button>

                            <button style="margin-left:4px;" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" onclick="deleteCasebook('<?php echo $row['casebook'] ?>')" title="Delete">
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
</div>


<!-- cái này không làm cái phân trang  -->