<?php include 'session.php'; ?><!doctypehtml>
    <html lang="en"><?php include 'header.php'; ?>

    <body id="page-top">
        <div id="wrapper"><?php include 'menu.php'; ?><div class="d-flex flex-column" id="content-wrapper">
                <div id="content"><?php include 'navbar.php'; ?><div class="container-fluid">
                        <h1 class="h3 mb-2 text-gray-800">Tambah Produk</h1><?php if(isset($_POST['simpan'])){$item_id=$_POST['item_id'];$item_name=$_POST['item_name'];$item_type=$_POST['item_type'];$item_category=$_POST['item_category'];$item_quantity=$_POST['item_quantity'];$item_price=$_POST['item_price'];$query=mysqli_query($conn,"INSERT INTO items (item_id, item_name, item_type, item_category, item_quantity, item_price) VALUES ('$item_id', '$item_name', '$item_type', '$item_category', '$item_quantity', '$item_price' )");if($query){echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';}else{echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silakan coba lagi.</div>';}} ?><div class="card mb-4 shadow">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold m-0 text-primary">Input Produk</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="input-inventory.php" class="form-horizontal style-form" enctype="multipart/form-data" id="form1" method="post" name="form1">
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">ID Produk</label>
                                            <div class="col-sm-6"><input class="form-control" name="item_id" id="item_id" placeholder="ID Produk" required autofocus></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                                            <div class="col-sm-6"><input class="form-control" name="item_name" id="item_name" placeholder="Nama Produk" autocomplete="off" required></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Jenis Produk</label>
                                            <div class="col-sm-6"><input class="form-control" name="item_type" id="item_type" placeholder="Jenis Produk" autocomplete="off"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Kategori Produk</label>
                                            <div class="col-sm-6"><input class="form-control" name="item_category" id="item_category" placeholder="Kategori Produk" autocomplete="off"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Kuantitas</label>
                                            <div class="col-sm-6"><input class="form-control" name="item_quantity" id="item_quantity" placeholder="Kuantitas Produk" autocomplete="off" type="number"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Harga Satuan</label>
                                            <div class="col-sm-6"><input class="form-control" name="item_price" id="item_price" placeholder="Harga Satuan" autocomplete="off" type="number"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"></label>
                                            <div class="col-sm-10"><input class="btn btn-sm btn-primary" name="simpan" type="submit" value="Simpan"> <a class="btn btn-sm btn-danger" href="input-inventory.php">Batal</a></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><?php include 'footer.php'; ?>
            </div>
        </div>
    </body>

    </html>