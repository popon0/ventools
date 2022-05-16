<?php session_start();
include "../connection.php";
$requestData = $_REQUEST;
$columns = [
    0 => "item_id",
    1 => "item_name",
    2 => "item_type",
    3 => "item_category",
    4 => "item_quantity",
    5 => "item_price",
];
$sql =
    "SELECT item_id, item_name, item_type, item_category, item_quantity, item_price";
$sql .= " FROM items";
($query = mysqli_query($conn, $sql)) or
    die("data-inventori.php: get Part No");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;
if (!empty($requestData["search"]["value"])) {
    $sql =
        "SELECT item_id, item_name, item_type, item_category, item_quantity, item_price";
    $sql .= " FROM items";
    $sql .= " WHERE item_id LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .= " OR item_name LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .= " OR item_type LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .=
        " OR item_category LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .=
        " OR item_quantity LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .= " OR item_price LIKE '" . $requestData["search"]["value"] . "%' ";
    ($query = mysqli_query($conn, $sql)) or
        die("data-inventori.php: get Part No");
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
        die("data-inventori.php: get Part No");
} else {
    $sql =
        "SELECT item_id, item_name, item_type, item_category, item_quantity, item_price";
    $sql .= " FROM items";
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
        die("data-inventori.php: get Part No");
}
$data = [];
while ($row = mysqli_fetch_array($query)) {
    $nestedData = [];
    $nestedData[] = $row["item_id"];
    $nestedData[] = $row["item_name"];
    $nestedData[] = $row["item_type"];
    $nestedData[] = $row["item_category"];
    $nestedData[] = $row["item_quantity"];
    $nestedData[] = $row["item_price"];
    if ($_SESSION["user_level"] == "admin") {
        $nestedData[] =
            '<td><center>
                     <a href="edit-inventory.php?id=' .
            $row["item_id"] .
            '"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> </a>
				     <a href="inventory.php?aksi=delete&id=' .
            $row["item_id"] .
            '"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data ' .
            $row["item_id"] .
            '?\')" class="btn btn-sm btn-danger"> <i class="fa fa-trash"> </i> </a>
	                 </center></td>';
    } elseif ($_SESSION["user_level"] == "user") {
       $nestedData[] =
            '<td><center>
		<a href="#' .
            $row["item_id"] .
            '"  data-toggle="tooltip" title="feature-coming-soon" class="#"> <i class="#"></i> </a>
		</center></td>';
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
