<?php include "session.php"; ?><!doctypehtml>
    <html lang="en"><?php include "header.php"; ?>

    <body id="page-top">
        <div id="wrapper"><?php include "menu.php"; ?><div class="d-flex flex-column" id="content-wrapper">
                <div id="content"><?php include "navbar.php"; ?><div class="container-fluid">
                        <h1 class="h3 mb-2 text-gray-800">User</h1><?php $kd=$_GET['user_id'];$sql=mysqli_query($conn,"SELECT * FROM users WHERE user_id='$kd'");if(mysqli_num_rows($sql)==0){header("Location: user.php");}else{$row=mysqli_fetch_assoc($sql);}if(isset($_POST['update'])){$user_id=$_POST['user_id'];$user_name=$_POST['user_name'];$user_password=sha1($_POST['user_password']);$user_fullname=$_POST['user_fullname'];$user_level=$_POST['user_level'];$update=mysqli_query($koneksi,"UPDATE users SET user_name='$user_name', user_fullname='$user_fullname', user_level='$user_level' WHERE user_id='$user_id'")or die(mysqli_error($koneksi));if($update){echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';}else{echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';}} ?><div class="card mb-4 shadow">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold m-0 text-primary">Edit Data User</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="input-user.php" class="form-horizontal style-form" enctype="multipart/form-data" id="form1" method="post" name="form1">
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Username</label>
                                            <div class="col-sm-6"><input class="form-control" name="user_name" value="<?php echo $row['user_name']; ?>" autocomplete="off" id="user_name" placeholder="Username" required></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Password</label>
                                            <div class="col-sm-6"><input class="form-control" name="user_password" value="<?php echo $row['user_password']; ?>" autocomplete="off" id="user_password" placeholder="Password" readonly type="password"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Fullname</label>
                                            <div class="col-sm-6"><input class="form-control" name="user_fullname" value="<?php echo $row['user_fullname']; ?>" autocomplete="off" id="user_fullname" placeholder="Fullname" required></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Level</label>
                                            <div class="col-sm-6"><select class="form-control" id="user_level" name="user_level" required>
                                                    <option value="">-- Select --</option>
                                                    <option value="user">User</option>
                                                    <option value="admin">Admin</option>
                                                </select></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"></label>
                                            <div class="col-sm-10"><input class="btn btn-sm btn-primary" name="simpan" value="Simpan" type="submit"> <a class="btn btn-sm btn-danger" href="input-user.php">Batal</a></div>
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
            </div>
        </div>
    </body>

    </html>