<section class="related-podcast-section section-padding pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Đã xem gần đây</h4>
                </div>
            </div>
            @foreach ($ds_da_xem as $key => $item)
                <div class="col-lg-4 col-12 mb-4 mb-lg-0 {{ $key > 2 ? 'mt-4' : '' }} ">
                    <div class="custom-block custom-block-full">
                        <div class="custom-block-image-wrap">
                            <a href="{{ route('thong-tin-sach', ['id' => $item->fkSach->id]) }}">
                                @if ($item->fkSach->hinh_anh != '')
                                    <img src="../img/books/{{ $item->fkSach->hinh_anh }}"
                                        class="custom-block-image img-fluid" />
                                @else
                                    <img src="../img/default/no_book.jpg" class="custom-block-image img-fluid border" />
                                @endif
                            </a>
                        </div>
                        <div class="custom-block-info">
                            <h5 class="mb-2">
                                <a href="{{ route('thong-tin-sach', ['id' => $item->fkSach->id]) }}">
                                    {{ $item->fkSach->ten }}</a>
                            </h5>
                            <div class="profile-block d-flex">
                                <img src="../img/default/author.png" class="profile-block-image img-fluid" />
                                <p>
                                    Tác giả
                                    <strong><a
                                            href="{{ route('sach-theo-chu-de', ['dieu_kien' => 2, 'tac_gia' => $item->fkSach->tac_gia_id]) }}">
                                            {{ $item->fkSach->fkTacGia->ten }}</a></strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
