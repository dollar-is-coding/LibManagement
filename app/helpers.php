<?php

use Carbon\Carbon;

function commentDate($date)
{
    $now = Carbon::now('Asia/Ho_Chi_Minh');
    if ($now->format('d-m-Y') == $date->format('d-m-Y')) {
        if ($now->diffInHours($date) == 0) {
            if ($now->diffInMinutes($date) == 0) {
                return '1 phút';
            }
            return $now->diffInMinutes($date) . ' phút';
        }
        return $now->diffInHours($date) . ' giờ';
    }
    if ($now->diffInMonths($date) != 0) {
        return $now->diffInMonths($date) . ' tháng';
    }
    if ($now->diffInWeeks($date) != 0) {
        return $now->diffInWeeks($date) . ' tuần';
    }
    return $now->diffInDays($date) . ' ngày';
}
