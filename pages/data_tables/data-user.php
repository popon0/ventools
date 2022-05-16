<?php include "../connection.php";
$requestData = $_REQUEST;
$columns = [
    0 => "user_name",
    1 => "user_password",
    2 => "user_fullname",
    3 => "user_level",
];
$sql = "SELECT user_id, user_name, user_password, user_fullname, user_level";
$sql .= " FROM users";
($query = mysqli_query($conn, $sql)) or die("data-user.php: get User");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;
if (!empty($requestData["search"]["value"])) {
    $sql =
        "SELECT user_id, user_name, user_password, user_fullname, user_level";
    $sql .= " FROM users";
    $sql .= " WHERE user_id LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .= " OR user_name LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .=
        " OR user_password LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .=
        " OR user_fullname LIKE '" . $requestData["search"]["value"] . "%' ";
    $sql .= " OR user_level LIKE '" . $requestData["search"]["value"] . "%' ";
    ($query = mysqli_query($conn, $sql)) or die("data-user.php: get User");
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
    ($query = mysqli_query($conn, $sql)) or die("data-user.php: get User");
} else {
    $sql =
        "SELECT user_id, user_name, user_password, user_fullname, user_level";
    $sql .= " FROM users";
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
    ($query = mysqli_query($conn, $sql)) or die("data-user.php: get User");
}
$data = [];
while ($row = mysqli_fetch_array($query)) {
    $nestedData = [];
    $nestedData[] = $row["user_name"];
    $nestedData[] = $row["user_password"];
    $nestedData[] = $row["user_fullname"];
    $nestedData[] = $row["user_level"];
    $nestedData[] =
        '<td><center>
                     <a href="edit-user.php?user_id=' .
        $row["user_id"] .
        '"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> </a>
				     <a href="user.php?aksi=delete&user_id=' .
        $row["user_id"] .
        '"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data ' .
        $row["user_fullname"] .
        '?\')" class="btn btn-sm btn-danger"> <i class="fa fa-trash"> </i> </a>
	                 </center></td>';
    $data[] = $nestedData;
}
$json_data = [
    "draw" => intval($requestData["draw"]),
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data" => $data,
];
echo json_encode($json_data); ?>
