<h2 class="mt-5"><?= $quarterTitle ?> Quarter</h2>
<table class="table">
    <thead>
        <tr>
            <th>Category Name</th>
            <th width="1">Star&nbsp;rating</th>
        </tr>
    </thead>
    <tbody>
        <?php
        /**
         * Fetch all ratings by category for this quarter and display them in the table.
         */
        $i = 0;
        $sql = 'SELECT category_name, ' . $quarterId . ' FROM avg_rating_by_category_by_trimesters ORDER BY ' . $quarterId . ' DESC';
        foreach ($conn->query($sql) as $row) {
            $i++;
        ?>
            <tr>
                <td><?= $row['category_name'] ?></td>
                <td class="text-end"><?= number_format($row[$quarterId], 2) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>