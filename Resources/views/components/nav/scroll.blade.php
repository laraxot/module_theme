<div class="cmp-navscroll sticky-top" aria-labelledby="accordion-title-{{$id}}">
  <nav class="navbar it-navscroll-wrapper navbar-expand-lg" data-bs-navscroll>
    <div class="navbar-custom" id="navbarNavProgress">
      <div class="menu-wrapper">
        <div class="link-list-wrapper">
          <div class="accordion">
            <div class="accordion-item">
              <span class="accordion-header" id="accordion-title-{{$id}}">
                <button class="accordion-button pb-10 px-3" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapse-{{$id}}" aria-expanded="true" aria-controls="collapse-{{$id}}">
                  {{$accordion_title}}
                  <svg class="icon icon-xs right">
                    <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-expand"></use>
                  </svg>
                </button>
              </span>
              <div class="progress">
                <div class="progress-bar it-navscroll-progressbar" role="progressbar" aria-valuenow="0"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div id="collapse-{{$id}}" class="accordion-collapse collapse show" role="region" aria-labelledby="accordion-title-{{$id}}">
                <div class="accordion-body">
                  <ul class="link-list" data-element="page-index">
                    @foreach($link_list as $link)
                        <li class="nav-item">
                        <a class="nav-link" href="{{$link['url']}}">
                            <span class="title-medium">{{$link['title']}}</span>
                        </a>
                        </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</div>