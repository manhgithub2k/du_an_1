<?php

function getImgSlideByRoomId($id)
{
    $sql = "SELECT * FROM img_slide WHERE id_lp = ?";
    return pdo_query($sql, $id);
}