@php
    use MrProperter\Library\FormBuilderStructure;
        /** @var \MrProperter\Models\MPModel $item */
        /** @var \App\Library\MrpProfile\PageBuilder $page */
@endphp
@extends('layouts.containerscreen')

@section('content')


    <div class="row   p-2 ">
        <div class="col-3 card">

            <div class="col-12 border-bottom p-2 py-4 small">

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
            <!-- Tab navs -->
        </div>

        <div class="col-9  p-4  py-0   " style="padding-right: 0px !important;">
            <div class=" card p-0">

                <div class="tab-content" id="v-rows-tabContent">

                    @foreach($page->rows as $K=>$row)
                        <div class="tab-pane fade
                        @if($K==0) show active @endif
                         "
                             id="v-rows-{{$K}}"
                             role="tabpanel"
                             aria-labelledby="v-rows-{{$K}}">


                            <ul class="nav nav-tabs nav-fill mb-3  border-bottom" id="ex1" role="tablist">

                                @foreach($row->tabs as $T=>$tab)

                                    <li class="nav-item" role="presentation">
                                        <a
                                            class="nav-link  pb-4 pt-4 text-black text-opacity-75
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

                            <div class="tab-content" id="ex2-content">
                                @foreach($row->tabs as $T=>$tab)
                                    <div
                                        class="tab-pane fade
                                        @if($T==0)  show  active @endif  "
                                        id="v-tabs-{{$K}}-{{$T}}"
                                        role="tabpanel"
                                        aria-labelledby="v-tab-{{$K}}-{{$T}}"
                                    >

                                        <div class="card-body pb-0">
                                            @if($tab->title)
                                                <h5>{{$tab->title}}</h5>
                                            @endif
                                        </div>

                                        @if($tab->view)
                                            @include($tab->view, ['item'=>$item])
                                        @endif

                                        @if($tab->formTag)
                                            <div class="card-body  ">


                                                <x-mrp-form route='{{$tab->route}}' btn="Сохранить">
                                                    {{$item->BuildInputAll($tab->formTag)}}
                                                </x-mrp-form>

                                            </div>

                                        @endif


                                    </div>
                                @endforeach
                            </div>


                            <div class="card-body opacity-40 small text-right">
                                {{$row->label}}
                            </div>

                        </div>

                    @endforeach


                </div>
            </div>

        </div>
    </div>
@endsection

