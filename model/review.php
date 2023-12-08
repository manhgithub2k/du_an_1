<?php
function addOneReview($data)
{
    $id_lp = $data['id_lp'];
    $name = $data['name'];
    $email = $data['email'];
    $comment = $data['comment'];
    $star = $data['star'];
    $create_at = date('Y-m-d H:i:s');
    $sql = "INSERT INTO review (`id_lp`,`name`, `email`, `comment`, `star`, `create_at`) values (?,?,?,?,?,?)";

    pdo_execute($sql, $id_lp, $name, $email, $comment, $star, $create_at);
}

function getAllReviewsByIdLoaiPhong($id_lp)
{
    $sql = "SELECT * FROM review WHERE id_lp = ? order by create_at DESC";
    return pdo_query($sql, $id_lp);
}

?>