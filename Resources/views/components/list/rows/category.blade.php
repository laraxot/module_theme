@props(['isMobile'=>false,])
@if($isMobile)
@foreach($rows as $filter)
  <fieldset>
    <div class="categoy-list pb-4">
      <legend class="h6 text-uppercase category-list__title">{{filter.title}}</legend>
      <ul>
        @foreach($filter->list as $checkbox)
          <li>
            <div class="form-check">
              <div class="checkbox-body border-light py-2">
                <input type="checkbox" id="mob-{{ $checkbox->id}}" name="{{ $checkbox->name}}" value="{{ $checkbox->value}}">
                <label for="mob-{{ $checkbox->id}}" class="subtitle-small_semi-bold mb-0 category-list__list">{{ $checkbox->label}}</label>
              </div>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </fieldset>
  @endforeach
@else


  <fieldset>
    <div class="categoy-list pb-4">
      <legend class="h6 text-uppercase category-list__title">{{$title ?? 'Categoria'}}</legend>
      <ul>

        @foreach($rows as $checkbox)
          <li>
            <div class="form-check">
              <div class="checkbox-body border-light py-3">
                <input type="checkbox" id="{{$checkbox->id}}" name="{{$checkbox->name}}" value="{{$checkbox->value}}">
                <label for="{{$checkbox->id}}" class="subtitle-small_semi-bold mb-0 category-list__list">{{$checkbox->name}}</label>
              </div>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </fieldset>

@endif
