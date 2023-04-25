<form id="campusForm" class="row g-2 needs-validation" novalidate>
    <input type="hidden" name="uid" value="<?php echo $uid ?>">
    <div class="col-lg-6 col-md-4 col-sm-12">
        <label>Code<span class="text-danger">*</span></label>
        <div class="input-group">
            <div class="input-group-text"><i class="bi bi-pencil-fill"></i></div>
            <input type="text" id="code" name="code" class="form-control validate" placeholder="Enter Code" required value="">
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please input a Code.
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-4 col-sm-12">
        <label>Campus Name<span class="text-danger">*</span></label>
        <div class="input-group">
            <div class="input-group-text"><i class="bi bi-pencil-fill"></i></div>
            <input type="text" id="campus_name" name="campus_name" class="form-control validate" placeholder="Enter Name" required value="">
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please input a Name.
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-4 col-sm-12">
        <label>Location<span class="text-danger">*</span></label>
        <div class="input-group">
            <div class="input-group-text"><i class="bi bi-pencil-fill"></i></div>
            <input type="text" id="location" name="location" class="form-control validate" placeholder="Enter Location" required value="">
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please input a Location.
            </div>
        </div>
    </div>

</form>

<script>
    
    $("#savemodal").unbind("click").click(function() {
        console.log("wew");
        var formdata = $("#campusForm").serialize();

        swal.fire({
            html: '<h4>Loading...</h4>',
            didRender: function() {
                $('#swal2-html-container').prepend(sweet_loader);
            }
        });

        $.ajax({
            url: '<?= base_url('campus/saveData') ?>',
            type: "POST",
            data: formdata,
            dataType: 'json',
            success: function(response) {
                if (response.status == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: response.title,
                        text: response.msg,
                        timer: 2000
                    })
                    $("#modal-view").modal("hide");
                    BranchList();
                } else if (response.status == 2) {
                    Swal.fire({
                        icon: 'info',
                        title: response.title,
                        text: response.msg
                    })
                } else if (response.status == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: response.title,
                        text: response.msg
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: "System Error",
                        text: "Please contact developer."
                    })
                }
            }
        });


    });
</script>