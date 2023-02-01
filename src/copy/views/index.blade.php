@php
    use MrProperter\Library\FormBuilderStructure;
        /** @var \MrProperter\Models\MPModel $item */
        /** @var \App\Library\MrpProfile\PageBuilder $page */
@endphp
@extends('layouts.containerscreen')

@section('content')


    <div class="row    ">
        <div class="col-12 col-sm-3   mb-2">
            <div class=" card ">

                <div class="col-12 border-bottom px-3 py-4 small">

                    <img src=" {{$page->icon}}" class="rounded-2 mr-3  " height="35" loading="lazy"
                         style="margin-top: -4px; margin-right: 8px;"> {{$page->name}}
                </div>


                <div
                    class="nav flex-column nav-tabs text-center"
                    id="v-tabs-tab"
                    role="tablist"
                    aria-orientation="vertical">

                    @foreach($page->rows as $K=>$row)

                        <a
                            class="nav-link text-black
                            @if($K==0)   active @endif
                         "
                            id="#v-rows-{{$K}}"
                            data-mdb-toggle="tab"
                            href="#v-rows-{{$K}}"
                            role="tab"
                            aria-controls="#v-rows-{{$K}}"
                            aria-selected="true">
                            {{$row->label}}</a>

                    @endforeach


                </div>
            </div>
        </div>

        <div class="col-12 col-sm-9  py-0 py-0  "  >
            <div class=" card ">

                <div class="tab-content" id="v-rows-tabContent">

                    @foreach($page->rows as $K=>$row)
                        <div class="tab-pane fade
                        @if($K==0) show active @endif
                         "
                             id="v-rows-{{$K}}"
                             role="tabpanel"
                             aria-labelledby="v-rows-{{$K}}">

                            @if(count($row->tabs)>1)
                                <ul class="nav nav-tabs nav-fill mb-3  border-bottom" id="ex1" role="tablist">

                                    @foreach($row->tabs as $T=>$tab)

                                        <li class="nav-item" role="presentation">
                                            <a
                                                class="nav-link  pb-3 pt-3 text-black text-opacity-75
                                              @if($T==0)   active @endif
                                            "
                                                id="v-tab-{{$K}}-{{$T}}"
                                                data-mdb-toggle="tab"
                                                href="#v-tabs-{{$K}}-{{$T}}"
                                                role="tab"
                                                aria-controls="v-tabs-{{$K}}-{{$T}}"
                                                aria-selected="true"
                                            >{{$tab->label}}</a>
                                        </li>

                                    @endforeach

                                </ul>
                            @endif
                            <div class="tab-content" id="ex2-content">
                                @foreach($row->tabs as $T=>$tab)
                                    <div
                                        class="tab-pane fade
                                        @if($T==0)  show  active @endif  "
                                        id="v-tabs-{{$K}}-{{$T}}"
                                        role="tabpanel"
                                        aria-labelledby="v-tab-{{$K}}-{{$T}}"
                                    >
                                        @if($tab->title)
                                            <div class="card-body pb-0">
                                                @if($tab->title)
                                                    <h5>{{$tab->title}}</h5>
                                                @endif
                                            </div>
                                        @endif

                                        @if($tab->view)
                                            @include($tab->view, ['item'=>$item])
                                        @endif

                                        @if($tab->formTag)
                                            <div class="card-body  ">


                                                <x-easy-form route='{{$tab->route}}' btn="Сохранить">
                                                    {{$item->BuildInputAll($tab->formTag)}}
                                                </x-easy-form>

                                            </div>

                                        @endif


                                    </div>
                                @endforeach
                            </div>


                            <div class="card-body   small text-right border-top">
                                {{$row->label}}
                            </div>

                        </div>

                    @endforeach


                </div>
            </div>

        </div>
    </div>
@endsection

