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

function expiredCharge($return_date)
{
    $now = Carbon::now('Asia/Ho_Chi_Minh');
    if ($now->diffInDays($return_date) <= 7) {
        return $now->diffInDays($return_date) * 4000;
    }
    return $now->diffInWeeks($return_date) * 30000 + $now->diffInDays($return_date) % 7 * 5000;
}

function soNgayHetHan($return_date)
{
    $now = Carbon::now('Asia/Ho_Chi_Minh');
    return $now->diffInWeeks($return_date) . ' tuần + ' . $now->diffInDays($return_date) % 7 . ' ngày';
}
