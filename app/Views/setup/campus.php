<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <style>
        .sweet_loader {
            width: 140px;
            height: 140px;
            margin: 0 auto;
            animation-duration: 0.5s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
            animation-name: ro;
            transform-origin: 50% 50%;
            transform: rotate(0) translate(0, 0);
        }

        @keyframes ro {
            100% {
                transform: rotate(-360deg) translate(0, 0);
            }
        }
    </style>

    <script type="text/javascript" async>
        var sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';
    </script>
</head>

<body>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-content">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closemodal">Close</button>
                    <button type="button" class="btn btn-primary" id="savemodal">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="table">
            <div class="row my-4">
                <div class="col-lg-12">
                    <div class="table shadow">
                        <div class=" d-flex justify-content-between align-items-center mb-2">
                            <div class="text-secondary fw-bold fs-3">All Campus</div>
                            <h1 class="text-bold text-center text-uppercase">Campus</h1>
                            <button class="btn btn-dark addbtn">Add New Campus</button>
                        </div>

                        <div class="table-responsive">
                            <table id="show_campus_table" class="table table-hover table-responsive">

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var tableObj = null;

        $(document).ready(function() {
            CampusTable();
        });

        function CampusTable() {

            $.ajax({
                type: "POST",
                url: '<?= base_url('campus/table') ?>',
                data: {},
                async: false,
                success: function(response) {
                    $("#show_campus_table").html(response);
                }
            });
        }

        $(".addbtn").click(function() {
            var uid = "add";
            $.ajax({
                type: "POST",
                url: '<?= base_url('campus/getModal') ?>',
                data: {
                    uid: uid
                },
                success: function(response) {
                    $("#myModal").modal('toggle');
                    $("#modal_title").text("Add Campus");
                    $("#modal-content").html(response);
                }
            });
        });
    </script>

</body>

</html>