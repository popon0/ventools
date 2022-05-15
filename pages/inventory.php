<?php include "session.php"; ?>
<!DOCTYPE html>
<html lang="en"> <?php include "header.php"; ?>

<body id="page-top">
    <div id="wrapper"> <?php include "menu.php"; ?> <div id="content-wrapper" class="d-flex flex-column">
            <div id="content"> <?php include "navbar.php"; ?> <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Manage Inventory</h1> <?php
             if(isset($_GET['aksi']) == 'delete'){
				$id = $_GET['id'];
				$cek = mysqli_query($conn, "SELECT * FROM items WHERE item_id='$id'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($conn, "DELETE FROM items WHERE item_id='$id'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?> <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Inventory Overview</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive"><br>
                                <table id="lookup" class="table table-bordered table-hover">
                                    <thead bgcolor="eeeeee" align="center">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Tipe</th>
                                            <th>Category</th>
                                            <th>Unit</th>
                                            <th>Price per Item</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <?php include "footer.php"; ?> <script>
                $(document).ready(function() {
                    $("#lookup").DataTable({
                        processing: !0,
                        serverSide: !0,
                        ajax: {
                            url: "data_tables/data-inventori.php",
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