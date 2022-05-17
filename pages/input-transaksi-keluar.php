<?php include "session.php"; ?><!doctypehtml>
    <html lang="en"><?php include "header.php"; ?>

    <body id="page-top">
        <div id="wrapper"><?php include "menu.php"; ?><div class="d-flex flex-column" id="content-wrapper">
                <div id="content"><?php include "navbar.php"; ?><div class="container-fluid">
                        <h1 class="h3 mb-2 text-gray-800">Transaksi Keluar</h1><?php if(isset($_POST['simpan'])){$tr_date=$_POST['date'];$item_location=$_POST['item_location'];$item_id=$_POST['item_id'];$item_name=$_POST['item_name'];$item_quantity=$_POST['item_quantity'];$item_status="OUT";$item_note=$_POST['item_note'];$tr_user=$_SESSION['user_fullname'];$insert=mysqli_query($conn,"INSERT INTO transaction (tr_date, item_location, item_id, item_name, item_quantity, item_status, item_note, tr_user)
                     VALUES('$tr_date', '$item_location', '$item_id', '$item_name', '$item_quantity', '$item_status', '$item_note', '$tr_user' )")or die(mysqli_error($conn));$qu=mysqli_query($conn,"UPDATE items SET item_quantity=(item_quantity -'$item_quantity') WHERE item_id='$item_id'");if($insert&&$qu){echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';}else{echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';}} ?><div class="card mb-4 shadow">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold m-0 text-primary">Input Transaksi Barang Keluar</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="input-transaksi-keluar.php" class="form-horizontal style-form" enctype="multipart/form-data" id="form1" method="post" name="form1">
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                                            <div class="col-sm-3"><input class="form-control" name="date" autocomplete="off" id="date" placeholder="Date" required type="date" value="<?php $d=date("Y-m-d");echo $d; ?>"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Lokasi</label>
                                            <div class="col-sm-3"><input class="form-control" name="item_location" autocomplete="off" id="item_location" placeholder="Lokasi Barang"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">ID Produk <button class="btn btn-info" type="button" data-target="#myModal" data-toggle="modal"><b>Cari</b> <span class="glyphicon glyphicon-search"></span></button></label>
                                            <div class="col-sm-3"><input class="form-control" name="item_id" autocomplete="off" id="item_id" placeholder="ID Produk"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                                            <div class="col-sm-6"><input class="form-control" name="item_name" autocomplete="off" id="item_name" placeholder="Nama Produk" required></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Kuantitas</label>
                                            <div class="col-sm-2"><input class="form-control" name="item_quantity" autocomplete="off" id="item_quantity" placeholder="Kuantitas" required type="number"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label">Notes</label>
                                            <div class="col-sm-6"><input class="form-control" name="item_note" autocomplete="off" id="item_note" placeholder="Notes" required></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"></label>
                                            <div class="col-sm-10"><input class="btn btn-sm btn-primary" name="simpan" type="submit" value="Simpan"> <a class="btn btn-sm btn-danger" href="transaksi.php">Batal</a></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><?php include "footer.php"; ?><div class="fade modal" id="myModal" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document" style="width:600px">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Inventori</h5><button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered table-hover table-striped" id="lookup">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php $query=mysqli_query($conn,'SELECT * FROM items');while($data=mysqli_fetch_array($query)){ ?><tr class="pilih" data-name="<?php echo $data['item_name']; ?>" data-part="<?php echo $data['item_id']; ?>">
                                            <td><?php echo $data['item_id']; ?></td>
                                            <td><?php echo $data['item_name']; ?></td>
                                            <td><?php echo $data['item_quantity']; ?></td>
                                        </tr><?php } ?></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    </body>

    </html>
