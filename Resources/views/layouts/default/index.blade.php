@extends('pub_theme::layouts.app')
@section('content')
    @php
    if ($rows_err != null) {
        exit('<h3><pre>' . $rows_err->getMessage() . '</pre></h3>');
        return;
    }
    @endphp
    <br /><br />
    <div class="container-fluid py-5 px-lg-5 ">
        {{-- <div class="row border-bottom mb-4">
            <div class="col-12">
                <h1 class="display-4 fw-bold text-serif mb-4">Eat in Manhattan, NY</h1>
            </div>
        </div> --}}
        <div class="row">

            {!! $_panel->indexNav() !!}
            {{-- <div class="col-lg-3 pt-3">
                <form class="pe-xl-3" action="#">
                    <div class="mb-4">
                        <label class="form-label" for="form_search">Keyword</label>
                        <div class="input-label-absolute input-label-absolute-right">
                            <div class="label-absolute"><i class="fa fa-search"></i></div>
                            <input class="form-control pe-4" type="search" name="search" placeholder="Keywords"
                                id="form_search">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="form_neighbourhood">Neighbourhood</label>
                        <select class="selectpicker form-control" name="neighbourhood" id="form_neighbourhood" multiple
                            data-style="btn-selectpicker" data-live-search="true" data-selected-text-format="count &gt; 1"
                            data-none-selected-text="">
                            <option value="neighbourhood_0">Battery Park City </option>
                            <option value="neighbourhood_1">Bowery </option>
                            <option value="neighbourhood_2">Carnegie Hill </option>
                            <option value="neighbourhood_3">Central Park </option>
                            <option value="neighbourhood_4">Chelsea </option>
                            <option value="neighbourhood_5">Chinatown </option>
                            <option value="neighbourhood_6">Civic Center </option>
                            <option value="neighbourhood_7">East Harlem </option>
                            <option value="neighbourhood_8">Financial District </option>
                            <option value="neighbourhood_9">Flatiron </option>
                            <option value="neighbourhood_10">Garment District </option>
                            <option value="neighbourhood_11">Gramercy Park </option>
                            <option value="neighbourhood_12">Greenwich Village </option>
                            <option value="neighbourhood_13">East Village </option>
                            <option value="neighbourhood_14">West Village </option>
                            <option value="neighbourhood_15">Hamilton Heights </option>
                            <option value="neighbourhood_16">Harlem </option>
                            <option value="neighbourhood_17">Hell's Kitchen / Clinton </option>
                            <option value="neighbourhood_18">Inwood </option>
                            <option value="neighbourhood_19">Kips Bay </option>
                            <option value="neighbourhood_20">Lenox Hill </option>
                            <option value="neighbourhood_21">Little Italy </option>
                            <option value="neighbourhood_22">Lower Eastside </option>
                            <option value="neighbourhood_23">Madison Square </option>
                            <option value="neighbourhood_24">Manhattan Valley </option>
                            <option value="neighbourhood_25">Meatpacking District </option>
                            <option value="neighbourhood_26">Midtown </option>
                            <option value="neighbourhood_27">Morningside Heights </option>
                            <option value="neighbourhood_28">Murray Hill </option>
                            <option value="neighbourhood_29">NoHo </option>
                            <option value="neighbourhood_30">NoLita </option>
                            <option value="neighbourhood_31">Roosevelt Island </option>
                            <option value="neighbourhood_32">SoHo </option>
                            <option value="neighbourhood_33">Stuyvesant Town (Stuyvesant Square) </option>
                            <option value="neighbourhood_34">Sutton Place </option>
                            <option value="neighbourhood_35">Times Square </option>
                            <option value="neighbourhood_36">Tribeca </option>
                            <option value="neighbourhood_37">Turtle Bay </option>
                            <option value="neighbourhood_38">Upper Eastside </option>
                            <option value="neighbourhood_39">Upper Westside </option>
                            <option value="neighbourhood_40">Washington Heights </option>
                            <option value="neighbourhood_41">Yorkville </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="form_category">Category</label>
                        <select class="selectpicker form-control" name="category" id="form_category" multiple
                            data-style="btn-selectpicker" data-selected-text-format="count &gt; 1"
                            data-none-selected-text="">
                            <option value="category_0">Hipster </option>
                            <option value="category_1">Music club </option>
                            <option value="category_2">Bar </option>
                            <option value="category_3">Pub </option>
                            <option value="category_4">Deli </option>
                            <option value="category_5">Bistro </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Tag</label>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="type_0" name="type[]">
                                    <label class="form-check-label" for="type_0">Hipster</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="type_1" name="type[]">
                                    <label class="form-check-label" for="type_1">Music club</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="type_2" name="type[]">
                                    <label class="form-check-label" for="type_2">Bar</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="type_3" name="type[]">
                                    <label class="form-check-label" for="type_3">Pub</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="type_4" name="type[]">
                                    <label class="form-check-label" for="type_4">Deli</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="type_5" name="type[]">
                                    <label class="form-check-label" for="type_5">Bistro</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="pb-4">
                        <div class="collapse" id="moreFilters">
                            <div class="mb-4">
                                <label class="form-label">Cuisine</label>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="cuisine_0" name="cuisine[]">
                                            <label class="form-check-label" for="cuisine_0">Fusion</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="cuisine_1" name="cuisine[]">
                                            <label class="form-check-label" for="cuisine_1">Indian</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="cuisine_2" name="cuisine[]">
                                            <label class="form-check-label" for="cuisine_2">French</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="cuisine_3" name="cuisine[]">
                                            <label class="form-check-label" for="cuisine_3">American</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="cuisine_4" name="cuisine[]">
                                            <label class="form-check-label" for="cuisine_4">Mexican</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="cuisine_5" name="cuisine[]">
                                            <label class="form-check-label" for="cuisine_5">Other</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Price</label>
                                <div class="text-primary" id="slider-snap"></div>
                                <div class="nouislider-values">
                                    <div class="min">From $<span id="slider-snap-value-from"></span></div>
                                    <div class="max">To $<span id="slider-snap-value-to"></span></div>
                                </div>
                                <input type="hidden" name="pricefrom" id="slider-snap-input-from" value="40">
                                <input type="hidden" name="priceto" id="slider-snap-input-to" value="110">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Vegetarians</label>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="vegetarians_0"
                                                name="vegetarians">
                                            <label class="form-check-label" for="vegetarians_0">All</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="vegetarians_1"
                                                name="vegetarians">
                                            <label class="form-check-label" for="vegetarians_1">Vegetarian only</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button class="btn btn-link btn-collapse ps-0 text-secondary" type="button"
                                data-bs-toggle="collapse" data-bs-target="#moreFilters" aria-expanded="false"
                                aria-controls="moreFilters" data-expanded-text="Less filters"
                                data-collapsed-text="More filters">More filters</button>
                        </div>
                        <div class="mb-4">
                            <button class="btn btn-primary" type="submit"> <i class="fas fa-filter me-1"></i>Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div> --}}
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center flex-column flex-md-row mb-4">
                    <div class="me-3">
                        <p class="mb-3 mb-md-0"><strong>{{ $rows->total() }}</strong> records</p>
                    </div>
                    {{-- <div>
                        <label class="form-label me-2" for="form_sort">Sort by</label>
                        <select class="selectpicker" name="sort" id="form_sort" data-style="btn-selectpicker" title="">
                            <option value="sortBy_0">Most popular </option>
                            <option value="sortBy_1">Recommended </option>
                            <option value="sortBy_2">Newest </option>
                            <option value="sortBy_3">Oldest </option>
                            <option value="sortBy_4">Closest </option>
                        </select>
                    </div> --}}
                </div>
                <div class="row">
                    @foreach ($rows as $row)
                        <x-card.panel :panel="$_panel->newPanel($row)" />
                    @endforeach
                    <!-- venue item-->
                </div>
<<<<<<< HEAD
                {{--
=======
                {{-- 
>>>>>>> ede0df7 (first)
                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-template d-flex justify-content-center">
                        <li class="page-item"><a class="page-link" href="#"> <i class="fa fa-angle-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"> <i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>
                </nav>
                --}}
                <x-pagination :rows="$rows" />
            </div>
        </div>
    </div>
@endsection
