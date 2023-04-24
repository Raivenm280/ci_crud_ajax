<thead>
    <tr>
        <th>Code</th>
        <th>Campus Name</th>
        <th>Location</th>
        <th>Create At</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($record as $key => $value) {
    ?>
        <tr>
            <td><?php echo $value->code ?></td>
            <td><?php echo $value->campus_name ?></td>
            <td><?php echo $value->location ?></td>
            <td><?php echo $value->create_at ?></td>
        </tr>

    <?php } ?>
</tbody>