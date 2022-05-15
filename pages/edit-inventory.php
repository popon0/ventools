<?php include "session.php"; ?><!doctypehtml>
    <html lang="en"><?php include "header.php"; ?>

    <body id="page-top">
        <div id="wrapper"><?php include "menu.php"; ?><div class="d-flex flex-column" id="content-wrapper">
                <div id="content"><?php include "navbar.php"; ?><div class="container-fluid">
                        <h1 class="h3 mb-2 text-gray-800">Produk</h1><?php
$kd = $_GET["id"];
$sql = mysqli_query($conn, "SELECT * FROM items WHERE item_id='$kd'");
if (mysqli_num_rows($sql) == 0) {
    header("Location: inventory.php");
} else {
    $row = mysqli_fetch_assoc($sql);
}
if (isset($_POST["update"])) {
    $item_id = $_POST["item_id"];
    $item_name = $_POST["item_name"];
    $item_type = $_POST["item_type"];
    $item_category = $_POST["item_category"];
    $item_quantity = $_POST["item_quantity"];
    $item_price = $_POST["item_price"];
    ($update = mysqli_query(
        $conn,
        "UPDATE items SET item_name='$item_name', item_type='$item_type', item_category='$item_category', item_quantity='$item_quantity', item_price='$item_price' WHERE item_id='$item_id'"
    )) or die(mysqli_error($conn));
    if ($update) {
        echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
    }
}
?><div class="card mb-4 shadow">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold m-0 text-primary">Edit Data Master Produk</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="" class="form-horizontal style-form" enctype="multipart/form-data" id="form1" method="post" name="form1">
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">ID Produk</label>
                                            <div class="col-sm-6"><input class="form-control" name="item_id" value="<?php echo $row[
    "item_id"
]; ?>" id="item_id" placeholder="Tidak perlu di isi" required autofocus></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                                            <div class="col-sm-6"><input class="form-control" name="item_name" value="<?php echo $row[
    "item_name"
]; ?>" id="item_name" placeholder="Partname" autocomplete="off" required></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Jenis Barang</label>
                                            <div class="col-sm-6"><input class="form-control" name="item_type" value="<?php echo $row[
    "item_type"
]; ?>" id="item_type" placeholder="jenis Barang" autocomplete="off"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">item_category</label>
                                            <div class="col-sm-6"><input class="form-control" name="item_category" value="<?php echo $row[
    "item_category"
]; ?>" id="item_category" placeholder="item_category" autocomplete="off"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">item_quantity</label>
                                            <div class="col-sm-6"><input class="form-control" name="item_quantity" value="<?php echo $row[
    "item_quantity"
]; ?>" id="item_quantity" placeholder="item_quantity" autocomplete="off" type="number"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">item_price</label>
                                            <div class="col-sm-6"><input class="form-control" name="item_price" value="<?php echo $row[
    "item_price"
]; ?>" id="item_price" placeholder="Remark" autocomplete="off"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"></label>
                                            <div class="col-sm-10"><input class="btn btn-sm btn-primary" name="update" value="Update" type="submit"> <a class="btn btn-sm btn-danger" href="inventory.php">Batal</a></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><?php include "footer.php"; ?>
    </body>

    </html>