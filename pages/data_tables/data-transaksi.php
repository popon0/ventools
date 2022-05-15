<?php session_start();
include "../connection.php";
$requestData = $_REQUEST;
$columns = [
    0 => "tr_id",
    1 => "tr_date",
    2 => "item_location",
    3 => "item_id",
    4 => "item_name",
    5 => "item_quantity",
    6 => "item_status",
    7 => "item_note",
    8 => "tr_user",
];
$sql =
    "SELECT tr_id, tr_date, item_location, item_id, item_name, item_quantity, item_status, item_note, tr_user";
$sql .= " FROM transaction";
($query = mysqli_query($conn, $sql)) or die("ajax-data-transaksi.php: get id");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;
if (!empty($requestData["search"]["value"])) {
    $sql =
        "SELECT tr_id, tr_date, item_location, item_id, item_name, item_quantity, item_status, item_note, tr_user";
    $sql .= " FROM transaction";
    $sql .= " WHERE tr_id LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .= " OR tr_tanggal LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .=
        " OR item_location LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .= " OR item_id LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .= " OR item_name LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .=
        " OR item_quantity LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .= " OR item_status LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .= " OR item_note LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .= " OR tr_user LIKE '" . $requestData["search"]["value"] . "%' ";
    ($query = mysqli_query($conn, $sql)) or
        die("ajax-data-transaksi.php: get id");
    $totalFiltered = mysqli_num_rows($query);
    $sql .=
        " ORDER BY " .
        $columns[$requestData["order"][0]["column"]] .
        "   " .
        $requestData["order"][0]["dir"] .
        "   LIMIT " .
        $requestData["start"] .
        " ," .
        $requestData["length"] .
        "   ";
    ($query = mysqli_query($conn, $sql)) or
        die("ajax-data-transaksi.php: get id");
} else {
    $sql =
        "SELECT tr_id, tr_date, item_location, item_id, item_name, item_quantity, item_status, item_note, tr_user";
    $sql .= " FROM transaction";
    $sql .=
        " ORDER BY " .
        $columns[$requestData["order"][0]["column"]] .
        "   " .
        $requestData["order"][0]["dir"] .
        "   LIMIT " .
        $requestData["start"] .
        " ," .
        $requestData["length"] .
        "   ";
    ($query = mysqli_query($conn, $sql)) or
        die("ajax-data-transaksi.php: get id");
}
$data = [];
while ($row = mysqli_fetch_array($query)) {
    $nestedData = [];
    $nestedData[] = $row["tr_id"];
    $nestedData[] = $row["tr_date"];
    $nestedData[] = $row["item_location"];
    $nestedData[] = $row["item_id"];
    $nestedData[] = $row["item_name"];
    $nestedData[] = $row["item_quantity"];
    $nestedData[] = $row["item_status"];
    $nestedData[] = $row["item_note"];
    $nestedData[] = $row["tr_user"];
    if ($_SESSION["user_level"] == "admin") {
        $nestedData[] =
            '<td><center>
	                 <a href="transaksi.php?aksi=delete&tr_id=' .
            $row["tr_id"] .
            "&item_status=" .
            $row["item_status"] .
            "&item_id=" .
            $row["item_id"] .
            "&item_quantity=" .
            $row["item_quantity"] .
            '"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data ' .
            $row["tr_id"] .
            '?\')" class="btn btn-sm btn-danger"> <i class="fa fa-trash"> </i> </a>
	                 </center></td>';
    } elseif ($_SESSION["user_level"] == "user") {
        $nestedData[] = "<td><center></center></td>";
    }
    $data[] = $nestedData;
}
$json_data = [
    "draw" => intval($requestData["draw"]),
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data" => $data,
];
echo json_encode($json_data); ?>
