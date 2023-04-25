<thead>
    <tr>
        <th>Code</th>
        <th>Campus Name</th>
        <th>Location</th>
        <th>Create At</th>
        <th>Actions</th>
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
            <td><button class="btn btn-primary me-2 editCampus" uid="<?php echo $value->id ?>"><i class="bi bi-pencil"></i> Edit</button><button class="btn btn-danger deleteCampus" uid="<?php echo $value->id ?>"><i class="bi bi-trash"></i> Delete</button></td>
        </tr>

    <?php } ?>
</tbody>