<?php include "session.php"; ?><!doctypehtml>
    <html lang="en"><?php include "header.php"; ?>

    <body id="page-top">
        <div id="wrapper"><?php include "menu.php"; ?><div class="d-flex flex-column" id="content-wrapper">
                <div id="content"><?php include "navbar.php"; ?><div class="container-fluid">
                        <h1 class="h3 mb-2 text-gray-800">User</h1><?php if(isset($_POST['simpan'])){$user_name=$_POST['user_name'];$user_password=sha1($_POST['user_password']);$user_fullname=$_POST['user_fullname'];$user_level=$_POST['user_level'];$query=mysqli_query($conn,"INSERT INTO users (user_id, user_name, user_password, user_fullname, user_level) VALUES (0, '$user_name', '$user_password', '$user_fullname', '$user_level')");if($query){echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';}else{echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';}} ?><div class="card mb-4 shadow">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold m-0 text-primary">Registrasi User</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="input-user.php" class="form-horizontal style-form" enctype="multipart/form-data" id="form1" method="post" name="form1">
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Username</label>
                                            <div class="col-sm-6"><input class="form-control" name="user_name" id="user_name" placeholder="Username" autocomplete="off" required></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Password</label>
                                            <div class="col-sm-6"><input class="form-control" name="user_password" id="user_password" placeholder="Password" autocomplete="off" required></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Full Name</label>
                                            <div class="col-sm-6"><input class="form-control" name="user_fullname" id="user_fullname" placeholder="Full Name" autocomplete="off" required></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Level User</label>
                                            <div class="col-sm-6"><select class="form-control" id="user_level" name="user_level" required>
                                                    <option value="">-- Select --</option>
                                                    <option value="user">User</option>
                                                    <option value="admin">Admin</option>
                                                </select></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"></label>
                                            <div class="col-sm-10"><input class="btn btn-sm btn-primary" name="simpan" type="submit" value="Simpan"> <a class="btn btn-sm btn-danger" href="input-user.php">Batal</a></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><?php include "footer.php"; ?><script>
                    $(document).ready(function() {
                        $("#lookup").DataTable({
                            processing: !0,
                            serverSide: !0,
                            ajax: {
                                url: "../data_tables/data-user.php",
                                type: "post",
                                error: function() {
                                    $(".lookup-error").html(""), $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>'), $("#lookup_processing").css("display", "none")
                                }
                            }
                        })
                    })
                </script>
    </body>

    </html>