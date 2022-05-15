<?php include "session.php"; ?><!doctypehtml>
    <html lang="en"><?php include "header.php"; ?>

    <body id="page-top">
        <div id="wrapper"><?php include "menu.php"; ?><div class="d-flex flex-column" id="content-wrapper">
                <div id="content"><?php include "navbar.php"; ?><div class="container-fluid">
                        <h1 class="h3 mb-2 text-gray-800">Transaksi</h1><?php if(isset($_GET['aksi'])=='delete'){$id=$_GET['tr_id'];$id_prod=$_GET['item_id'];$quan=$_GET['item_quantity'];$stat=$_GET['item_status'];$cek=mysqli_query($conn,"SELECT * FROM transaction WHERE tr_id='$id'");if(mysqli_num_rows($cek)==0){echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';}else{if($stat=='OUT'){$delete=mysqli_query($conn,"DELETE FROM transaction WHERE tr_id='$id'");$qu=mysqli_query($conn,"UPDATE items SET item_quantity=(item_quantity+'$quan') WHERE item_id='$id_prod'");if($delete){echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';}else{echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';}}else if($stat=='IN'){$delete=mysqli_query($conn,"DELETE FROM transaction WHERE tr_id='$id'");$qu=mysqli_query($conn,"UPDATE items SET item_quantity=(item_quantity-'$quan') WHERE item_id='$id_prod'");if($delete){echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';}else{echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';}}}} ?><div class="card mb-4 shadow">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold m-0 text-primary">Data Transaksi</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="lookup">
                                        <thead align="center" bgcolor="eeeeee">
                                            <tr>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>Lokasi</th>
                                                <th>Nama Produk</th>
                                                <th>Qty</th>
                                                <th>Status</th>
                                                <th>Note</th>
                                                <th>Entry</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
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
                                url: "data_tables/data-transaksi.php",
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