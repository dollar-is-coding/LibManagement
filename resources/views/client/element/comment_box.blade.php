@if (Auth::check())
    <form action="{{ route('binh-luan', ['sach' => $sach->id]) }}" method="POST" class="d-flex flex-column"
        style="font-size: .9em">
        @csrf
        <div class="d-flex">
            @if (Auth::user()->hinh_anh == '')
                <img src="../img/default/author.png" class="profile-block-image img-fluid" style="width:44px;height:44px">
            @else
                <img src="../img/avt/{{ Auth::user()->hinh_anh }}" class="profile-block-image img-fluid"
                    style="width:44px;height:44px">
            @endif
            <div class="comment-container">
                <textarea id="comment-input" name="binh_luan" rows="1" placeholder="Suy nghĩ về cuốn sách này..."
                    oninput="showButton()"></textarea>
            </div>
        </div>
        <button class="btn comment-btn smoothscroll align-self-end" id="binh_luan"
            style="font-size: .9em; display: none;" type="submit">
            Bình luận</button>
    </form>
@endif
@foreach ($binh_luan as $key => $item)
    <div class="d-flex mt-3" style="font-size: .9em">
        @if (Auth::check())
            @if (Auth::user()->hinh_anh == '' && $item->nguoi_dung_id == Auth::id())
                <img src="../img/default/author.png" class="profile-block-image img-fluid"
                    style="width:44px;height:44px">
            @elseif(Auth::user()->hinh_anh != '' && $item->nguoi_dung_id == Auth::id())
                <img src="../img/avt/{{ Auth::user()->hinh_anh }}" class="profile-block-image img-fluid"
                    style="width:44px;height:44px">
            @elseif($item->fkNguoiDung->hinh_anh == '')
                <img src="../img/default/author.png" class="profile-block-image img-fluid"
                    style="width:44px;height:44px">
            @else
                <img src="../img/avt/{{ Auth::user()->hinh_anh }}" class="profile-block-image img-fluid"
                    style="width:44px;height:44px">
            @endif
        @else
            @if ($item->fkNguoiDung->hinh_anh == '')
                <img src="../img/default/author.png" class="profile-block-image img-fluid"
                    style="width:44px;height:44px">
            @else
                <img src="../img/avt/{{ $item->fkNguoiDung->hinh_anh }}" class="profile-block-image img-fluid"
                    style="width:44px;height:44px">
            @endif
        @endif
        <div style="width:100%">
            <div class="comment-block">
                <div class="d-flex">
                    <div>
                        <strong>
                            {{ $item->fkNguoiDung->ho }}&nbsp;{{ $item->fkNguoiDung->ten }}
                        </strong>
                    </div>
                </div>
                <div>{{ $item->noi_dung }}</div>
            </div>
            <div class="d-flex align-items-center mt-1" style="margin-left:10px;">
                <a class="bi-chat custom-icon" style="color: #717275" onclick="reply({{ $key }})">
                    <span>&nbsp;{{ $item->hasReply->count() }}</span>
                </a>
                <div class="bi-dot" style="margin-left: 4px; margin-right: 4px; color:#717275">
                </div>
                <a style="color:#717275">
                    @if (Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y') == $item->updated_at->format('d/m/Y'))
                        Hôm nay
                    @else
                        {{ Carbon\Carbon::now('Asia/Ho_Chi_Minh')->startOfDay()->diffIndays($item->updated_at->startOfDay()) }}
                        ngày trước
                    @endif
                </a>
            </div>
            @foreach ($item->hasReply as $reply)
                <div class="d-flex mt-3">
                    @if (Auth::check())
                        @if (Auth::user()->hinh_anh == '' && $reply->nguoi_dung_id == Auth::id())
                            <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                style="width:44px;height:44px">
                        @elseif(Auth::user()->hinh_anh != '' && $reply->nguoi_dung_id == Auth::id())
                            <img src="../img/avt/{{ Auth::user()->hinh_anh }}" class="profile-block-image img-fluid"
                                style="width:44px;height:44px">
                        @elseif($reply->fkNguoiDung->hinh_anh == '')
                            <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                style="width:44px;height:44px">
                        @else
                            <img src="../img/avt/{{ Auth::user()->hinh_anh }}" class="profile-block-image img-fluid"
                                style="width:44px;height:44px">
                        @endif
                    @else
                        @if ($reply->fkNguoiDung->hinh_anh == '')
                            <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                style="width:44px;height:44px">
                        @else
                            <img src="../img/avt/{{ $reply->fkNguoiDung->hinh_anh }}"
                                class="profile-block-image img-fluid" style="width:44px;height:44px">
                        @endif
                    @endif
                    <div style="width:100%">
                        <div class="comment-block">
                            <div class="d-flex">
                                <div>
                                    <strong>
                                        {{ $reply->fkNguoiDung->ho }}&nbsp;{{ $reply->fkNguoiDung->ten }}
                                    </strong>
                                </div>
                                <div class="bi-dot" style="margin-left: 4px; margin-right: 4px; color:#717275">
                                </div>
                                <a style="color:#717275">
                                    @if (Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d') == $reply->updated_at->format('Y/m/d'))
                                        Hôm nay
                                    @else
                                        {{ Carbon\Carbon::now('Asia/Ho_Chi_Minh')->startOfDay()->diffIndays($reply->updated_at->startOfDay()) }}
                                        ngày trước
                                    @endif
                                </a>
                            </div>
                            <div>{{ $reply->noi_dung }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (Auth::id() != null)
                <form action="{{ route('binh-luan', ['tra_loi' => $item->id, 'sach' => $sach->id]) }}" method="POST"
                    id="{{ $key }}" style="visibility:hidden;max-height:0;" class="d-flex flex-column">
                    @csrf
                    <div class="d-flex">
                        <img src="../img/default/author.png" class="profile-block-image img-fluid"
                            style="width:44px;height:44px">
                        <div class="comment-container">
                            <textarea class="reply-input" id="reply_{{ $key }}" name="binh_luan" rows="1" placeholder="Phản hồi..."
                                oninput="showReply({{ $key }})"></textarea>
                        </div>
                    </div>
                    <button style="font-size: .9em; display:none" id="btn_{{ $key }}" type="submit"
                        class="btn comment-btn smoothscroll align-self-end">
                        Phản hồi</button>
                </form>
            @endif
        </div>
    </div>
@endforeach
