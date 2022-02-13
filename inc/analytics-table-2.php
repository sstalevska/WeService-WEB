<h2 class="mt-5"><?= $quarterTitle ?> Quarter</h2>
<table class="table">
    <thead>
        <tr>
            <th>Reviewer Name</th>
            <th width="1">Number&nbsp;of&nbsp;reviews</th>
        </tr>
    </thead>
    <tbody>
        <?php
        /**
         * Fetch the number of reviews left by each reviewer for this quarter and display them in the table.
         */
        $i = 0;
        $sql = 'SELECT reviewer_name, ' . $quarterId . ' FROM num_of_reviews_by_reviewer_by_trimester ORDER BY ' . $quarterId . ' DESC, reviewer_name';
        foreach ($conn->query($sql) as $row) {
            $i++;
        ?>
            <tr>
                <td><?= $row['reviewer_name'] ?></td>
                <td class="text-end"><?= number_format($row[$quarterId], 2) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>