<?php

?>
<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên giảm giả</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Phần trăm</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table_order">
            <?php
            $result = getDiscounting();
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo date_format(date_create($row['time_start']), "d/m/Y"); ?></td>
                    <td><?php echo date_format(date_create($row['time_end']), "d/m/Y"); ?></td>
                    <td><?php echo $row['percent'] ?>%</td>
                
                </tr>
            <?php
        } ?>
        </tbody>
    </table>