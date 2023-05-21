<?php
$root = $_SERVER["DOCUMENT_ROOT"];
require_once  "$root/piumenophp/models/TrattaModel.php";

if (!$_SERVER['REQUEST_METHOD'] === 'GET') on_ajax_error("Only accepting GET requests here", 400);

$cap_number = $_GET["name"];

if (isset($cap_number))
{
$cap_number=str_replace ( "%20" , " " , $cap_number);

$caps = TrattaModel::search_by_name($cap_number);

if ($caps->num_rows === 0) on_ajax_error("Nothing found", 404);

$caps = $caps->fetch_all(MYSQLI_ASSOC);

echo json_encode($caps);
}