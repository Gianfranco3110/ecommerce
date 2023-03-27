<div class="container">

    <h2 class=" text-center h2 mt-5 mb-3">Top Productos</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-2 mb-5">

        @foreach ($productosTop as $producto)
            
        <div class="col">
            <div class="card h-100 border border-5">
                @foreach ($producto->media as $image)
                    <img src="{{ $image->getUrl() }}" alt="imagen no encontrada" class="card-img-top sh-22">
                    @break
                @endforeach
                <div class="card-body pb-3">
                    <h5 class="heading mb-0 d-flex">
                        <a href="{{route('producto.show', [$producto->id])}}" class="body-link d-block lh-1-5 stretched-link">
                            <span class="clamp-line sh-4" data-line="2">{{$producto->name}}</span>
                        </a>
                    </h5>
                </div>
                <div class="card-footer border-0 pt-0">
                    <div class="mb-2">
                        <div class="br-wrapper br-theme-cs-icon d-inline-block">
                            <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="text-muted d-inline-block text-small align-text-top">({{$producto->stock}})</div>
                    </div>
                    <div class="card-text mb-0">
                        <div class="text-muted text-overline text-small sh-2"></div>
                        <div>$ {{$producto->price}}</div>
                    </div>
                    <div class="col mt-2">
                        <a class="btn btn-icon btn-icon-end bg-primary w-40 w-sm-auto"
                            href="{{route('producto.show', [$producto->id])}}">
                            {{-- <span>Detalles</span> --}}
                            Ver mas
                            <i data-acorn-icon="eye"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


        {{-- <div class="col">
            <div class="card h-100 border border-5">
                <img src="{{ asset('img/pc2/music-ga7aab4f52_640.jpg') }}" class="card-img-top sh-22" alt="card image" />
                <div class="card-body pb-3">
                    <h5 class="heading mb-0 d-flex">
                        <a href="{{route('producto')}}" class="body-link d-block lh-1-5 stretched-link">
                            <span class="clamp-line sh-4" data-line="2">Modern Dark Pot</span>
                        </a>
                    </h5>
                </div>
                <div class="card-footer border-0 pt-0">
                    <div class="mb-2">
                        <div class="br-wrapper br-theme-cs-icon d-inline-block">
                            <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="text-muted d-inline-block text-small align-text-top">(412)</div>
                    </div>
                    <div class="card-text mb-0">
                        <div class="text-muted text-overline text-small sh-2"></div>
                        <div>$ 9.50</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border border-5">
                <img src="{{ asset('img/pc2/office-gf220f3bf2_640.jpg') }}" class="card-img-top sh-22" alt="card image" />
                <div class="card-body pb-3">
                    <h5 class="heading mb-0 d-flex">
                        <a href="{{route('producto')}}" class="body-link d-block lh-1-5 stretched-link">
                            <span class="clamp-line sh-4" data-line="2">Modern Dark Pot</span>
                        </a>
                    </h5>
                </div>
                <div class="card-footer border-0 pt-0">
                    <div class="mb-2">
                        <div class="br-wrapper br-theme-cs-icon d-inline-block">
                            <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="text-muted d-inline-block text-small align-text-top">(412)</div>
                    </div>
                    <div class="card-text mb-0">
                        <div class="text-muted text-overline text-small sh-2"></div>
                        <div>$ 9.50</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border border-5">
                <img src="{{ asset('img/pc2/music-ga7aab4f52_640.jpg') }}" class="card-img-top sh-22" alt="card image" />
                <div class="card-body pb-3">
                    <h5 class="heading mb-0 d-flex">
                        <a href="{{route('producto')}}" class="body-link d-block lh-1-5 stretched-link">
                            <span class="clamp-line sh-4" data-line="2">Modern Dark Pot</span>
                        </a>
                    </h5>
                </div>
                <div class="card-footer border-0 pt-0">
                    <div class="mb-2">
                        <div class="br-wrapper br-theme-cs-icon d-inline-block">
                            <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="text-muted d-inline-block text-small align-text-top">(412)</div>
                    </div>
                    <div class="card-text mb-0">
                        <div class="text-muted text-overline text-small sh-2"></div>
                        <div>$ 9.50</div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
</div>
