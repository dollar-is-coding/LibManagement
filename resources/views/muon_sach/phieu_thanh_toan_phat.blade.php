<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <div>
        <h3 style="text-align: center;">PHIẾU THANH TOÁN</h3>
        @foreach ($phieu_phat as $key => $item)
        @if ($key == 0 || $item->ma_phieu != $phieu_phat[$key - 1]->ma_phieu)
        <table>
            <thead>
                <tr>
                    <th style="border-bottom: 2px solid black;">Mã số: <b>#{{ $item->ma_phieu }}</b></th>
                    <th style="border-bottom: 2px solid black;">Tổng tiền phạt: <b>{{ number_format($item->tong_tien_phat, 0, ',', '.') }}đ</b></th>
                </tr>
            </thead>
            @endif
            <tbody>
                <tr>
                    <td style="border-bottom: 1px solid black;">
                        <p>Tên sách: <b>{{ $item->fkSach->ten }}</b></p>
                        <p>Tác giả: <b>{{ $item->fkSach->fkTacGia->ten }}</b></p>
                        <p>Năm xuất bản: <b>{{ $item->fkSach->nam_xuat_ban }}</b></p>
                        <p>Lý do: <b>{{ $item->ly_do }}</b></p>
                    </td>
                    <td style="border-bottom: 1px solid black;">
                        <p>1 x {{ number_format($item->tien_phat, 0, ',', '.') }}đ</p>
                    </td>
                </tr>
            </tbody>
            @if (
            $key == $phieu_phat->count() - 1 ||
            ($key != $phieu_phat->count() - 1 && $item->ma_phieu != $phieu_phat[$key + 1]->ma_phieu))
            <p>Ngày phạt: <b>{{ date('d-m-Y', strtotime($item->created_at)) }}</b></p>
            @endif
            @endforeach
        </table>
    </div>
</body>

</html>