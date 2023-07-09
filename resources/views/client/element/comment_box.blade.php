<form action="{{ route('binh-luan', ['sach' => $sach->id]) }}" method="POST" class="d-flex flex-column"
    style="font-size: .9em">
    @csrf
    <div class="d-flex">
        @if (Auth::check() && Auth::user()->hinh_anh != '')
            <img src="../img/avt/{{ Auth::user()->hinh_anh }}" class="profile-block-image img-fluid"
                style="width:44px;height:44px">
        @else
            <img src="../img/default/author.png" class="profile-block-image img-fluid" style="width:44px;height:44px">
        @endif
        <div class="comment-container">
            <textarea id="comment-input" name="binh_luan" rows="1"
                placeholder="{{ $da_muon == 1 ? 'Suy nghĩ về cuốn sách này...' : 'Chỉ những ai đã mượn sách này mới có thể bình luận...' }}"
                oninput="showButton()" style="pointer-events:{{ $da_muon == 1 ? 'fill' : 'none' }}"></textarea>
        </div>
    </div>

    <button class="btn comment-btn smoothscroll align-self-end" id="binh_luan" style="font-size: .9em; display: none;"
        type="submit">
        Bình luận</button>
</form>


@foreach ($binh_luan as $key => $item)
    <div class="d-flex pt-3" style="font-size: .9em" id="binh_luan_{{ $item->id }}">
        @if ($item->fkNguoiDung->hinh_anh == '')
            <img src="../img/default/author.png" class="profile-block-image img-fluid" style="width:44px;height:44px">
        @else
            <img src="../img/avt/{{ $item->fkNguoiDung->hinh_anh }}" class="profile-block-image img-fluid"
                style="width:44px;height:44px">
        @endif
        <div style="width:100%">
            <div class="d-flex align-items-center" onmouseenter="showMore({{ $item->id }})"
                onmouseleave="hideMore({{ $item->id }})">
                <div class="comment-block" style="min-width: 30%; width: fit-content">
                    <div class="d-flex">
                        <div>
                            <strong>{{ $item->fkNguoiDung->ho }}&nbsp;{{ $item->fkNguoiDung->ten }}</strong>
                        </div>
                    </div>
                    <div>{{ $item->noi_dung }}</div>
                </div>
                @if (Auth::id() == $item->fkNguoiDung->id)
                    <div class="btn-group dropend" id="more_{{ $item->id }}" style="visibility: hidden">
                        <a href="#" class="bi-three-dots chat-reply" data-bs-toggle="dropdown"
                            aria-expanded="false" style="margin-left: 10px" onclick="return false"></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href=""
                                    onclick="readyToDelete({{ $item->id }},0,true); return false;">Xóa</a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="d-flex align-items-center mt-1" style="margin-left:10px;">
                @if ($da_muon == 1)
                    <a href="#" class="bi-chat custom-icon chat-reply"
                        onclick="reply({{ $key }}); return false;" id="has_reply_{{ $item->id }}">
                        {{ $item->hasReply->count() }}</a>
                @else
                    <a href="#" class="bi-chat custom-icon chat-reply" onclick="return false;"
                        id="has_reply_{{ $item->id }}">
                        {{ $item->hasReply->count() }}</a>
                @endif
                <div class="bi-dot" style="margin-left: 4px; margin-right: 4px; color:#717275">
                </div>
                <a style="color:#717275">
                    {{ commentDate($item->updated_at) }}
                </a>
            </div>
            @if ($item->hasReply->count() > 2 && request()->query('binh_luan') != $item->id)
                <a href="#" style="margin-left:10px;" class="fw-bolder mt-2 sono-label"
                    onclick="showReplies({{ $key }}); return false;" id="show_{{ $key }}">
                    <i class="bi-arrow-return-right" style="margin-right:4px;"></i>
                    Xem tất cả {{ $item->hasReply->count() }} phản hồi
                </a>
            @endif
            @foreach ($item->hasReply as $key_reply => $reply)
                <div style="display: {{ $item->hasReply->count() > 2 && request()->query('binh_luan') != $item->id ? 'none' : 'block' }}"
                    id="binh_luan_{{ $reply->id }}" class="reply_{{ $key }}">
                    <div class="d-flex mt-3">
                        @if ($reply->fkNguoiDung->hinh_anh == '')
                            <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                style="width:44px;height:44px">
                        @else
                            <img src="../img/avt/{{ $reply->fkNguoiDung->hinh_anh }}"
                                class="profile-block-image img-fluid" style="width:44px;height:44px">
                        @endif
                        <div class="d-flex align-items-center"
                            onmouseenter="showMore({{ $key }}.{{ $key_reply + 1 }})"
                            onmouseleave="hideMore({{ $key }}.{{ $key_reply + 1 }})">
                            <div style="min-width: 30%; width: fit-content">
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
                                            {{ commentDate($reply->updated_at) }}
                                        </a>
                                    </div>
                                    <div>{{ $reply->noi_dung }}</div>
                                </div>
                            </div>
                            <div class="btn-group dropend" style="visibility: hidden"
                                id="more_{{ $key }}.{{ $key_reply + 1 }}">
                                <a href="#" class="bi-three-dots chat-reply" data-bs-toggle="dropdown"
                                    aria-expanded="false" style="margin-left: 10px" onclick="return false;"></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href=""
                                            onclick="readyToDelete({{ $reply->id }},{{ $item->id }},false); return false;">Xóa</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (Auth::id() != null)
                <form action="{{ route('binh-luan', ['tra_loi' => $item->id, 'sach' => $sach->id]) }}" method="POST"
                    id="{{ $key }}" style="visibility:hidden;max-height:0;" class="d-flex flex-column">
                    @csrf
                    <div class="d-flex">
                        @if (Auth::user()->hinh_anh == '')
                            <img src="../img/default/author.png" class="profile-block-image img-fluid"
                                style="width:44px;height:44px">
                        @else
                            <img src="../img/avt/{{ Auth::user()->hinh_anh }}" class="profile-block-image img-fluid"
                                style="width:44px;height:44px">
                        @endif
                        <div class="comment-container">
                            <textarea class="reply-input" id="reply_{{ $key }}" name="binh_luan" rows="1"
                                placeholder="Phản hồi..." oninput="showReply({{ $key }})"></textarea>
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

<script>
    function showMore(id) {
        var comment = document.getElementById('more_' + id);
        comment.style.visibility = 'visible';
    }

    function hideMore(id) {
        var comment = document.getElementById('more_' + id);
        comment.style.visibility = 'hidden';
    }

    function showReplies(key) {
        var replies = document.getElementsByClassName('reply_' + key);
        var show = document.getElementById('show_' + key);
        Array.from(replies).forEach(function(element) {
            element.style.display = 'block'
        });
        show.style.display = 'none';
    }
</script>
