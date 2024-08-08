<!--Start search form-->
<div class="main-search-form bg-brand-4">
    <div class="container">
        <div class=" pt-50 pb-50 ">
            <div class="row mb-20">
                <div class="col-12 align-self-center main-search-form-cover m-auto">
                    <p class="text-center"><span class="display-1">Search</span></p>
                    <form action="{{ route('search') }}" method="GET" class="search-header">
                        @csrf
                        <div class="input-group w-100">
                            <input type="text" class="form-control" name="title" placeholder="Cari artikel disini...">
                            <div class="input-group-append">
                                <button class="btn btn-search bg-white" type="submit">
                                    <img class="svg-icon-24" src="{{ asset('assets/') }}/imgs/theme/svg/search.svg" alt="">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-80 text-center">
                <div class="col-12 font-small suggested-area">
                    <h5 class="suggested font-heading mb-20 text-white"> <strong>Suggested keywords:</strong></h5>
                    <ul class="list-inline d-inline-block">
                        @foreach ($tagItem as $item )
                        <li class="list-inline-item"><a href="{{ route('search.tag', $item->tag) }}">{{ $item->tag }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Main content -->
