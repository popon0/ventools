<?php include "session.php"; ?>
<!DOCTYPE html>
<html lang="en"> <?php include "header.php"; ?>

<body id="page-top">
    <div id="wrapper"> <?php include "menu.php"; ?> <div id="content-wrapper" class="d-flex flex-column">
            <div id="content"> <?php include "navbar.php"; ?> <div class="container-fluid">
                    <h1 class="h2 mb-2 text-gray-800">Home</h1> <?php
             if(isset($_GET['aksi']) == 'delete'){
				$id = $_GET['user_id'];
				$cek = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$id'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($conn, "DELETE FROM users WHERE user_id='$id'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?> <br><br>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Riwayat Transaksi</h6>
                        </div>
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist"><a class="nav-item nav-link active" id="custom-nav-a-tab" data-toggle="tab" href="#custom-nav-a" role="tab" aria-controls="custom-nav-a" aria-selected="true">History Barang Masuk Hari Ini</a><a class="nav-item nav-link" id="custom-nav-b-tab" data-toggle="tab" href="#custom-nav-b" role="tab" aria-controls="custom-nav-b" aria-selected="false">History Barang Keluar Hari Ini</a></div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="custom-nav-a" role="tabpanel" aria-labelledby="custom-nav-a-tab">
                                        <div class="card-body"> <?php
                   
                 $tgl=date("Y-m-d");
	               $query2="SELECT * FROM transaction
	               where item_status='IN' AND tr_date='$tgl'";
                   
                    $tampil1=mysqli_query($conn, $query2) or die(mysqli_error($conn));
                    ?> <table style="margin-top:20px" id="example" class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Lokasi</th>
                                                        <th>ID Produk</th>
                                                        <th>Nama Produk</th>
                                                        <th>Kuantitas</th>
                                                        <th>Status</th>
                                                        <th>Note</th>
                                                    </tr>
                                                </thead> <?php 
                     $no=0;
                     while($data1=mysqli_fetch_array($tampil1))
                    { $no++;
                     ?> <tbody>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $data1['tr_date']; ?></td>
                                                        <td><?php echo $data1['item_location']; ?></td>
                                                        <td><?php echo $data1['item_id']; ?></td>
                                                        <td><?php echo $data1['item_name']; ?></td>
                                                        <td><?php echo $data1['item_quantity']; ?></td>
                                                        <td><?php echo $data1['item_status']; ?></td>
                                                        <td><?php echo $data1['item_note']; ?></td>
                                                    </tr> <?php   
              }
             
              ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-b" role="tabpanel" aria-labelledby="custom-nav-b-tab"> <?php
                   
                   $tgl=date("Y-m-d");
                   $query2="SELECT * FROM transaction
                   where item_status='OUT' AND tr_date='$tgl'";
                     
                      $tampil1=mysqli_query($conn, $query2) or die(mysqli_error($conn));
                      ?> <table style="margin-top:20px" id="example" class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Lokasi</th>
                                                    <th>ID Produk</th>
                                                    <th>Nama Produk</th>
                                                    <th>Kuantitas</th>
                                                    <th>Status</th>
                                                    <th>Note</th>
                                                </tr>
                                            </thead> <?php 
                       $no=0;
                       while($data1=mysqli_fetch_array($tampil1))
                      { $no++;
                       ?> <tbody>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $data1['tr_date']; ?></td>
                                                    <td><?php echo $data1['item_location']; ?></td>
                                                    <td><?php echo $data1['item_id']; ?></td>
                                                    <td><?php echo $data1['item_name']; ?></td>
                                                    <td><?php echo $data1['item_quantity']; ?></td>
                                                    <td><?php echo $data1['item_status']; ?></td>
                                                    <td><?php echo $data1['item_note']; ?></td>
                                                </tr> <?php   
                }
               
                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><a href="input-transaksi-masuk.php" class="btn btn-lg btn-success" style="height:100px;margin-right:20px;margin-top:10px"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transaksi Masuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><a href="input-transaksi-keluar.php" class="btn btn-lg btn-danger" style="height:100px;margin-right:20px;margin-top:10px"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transaksi Keluar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                </div> <?php include "footer.php"; ?> <script>
                    $(document).ready(function() {
                        $("#lookup").DataTable({
                            processing: !0,
                            serverSide: !0,
                            ajax: {
                                url: "data_tables/data-user.php",
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
    </div>
</body>

</html>