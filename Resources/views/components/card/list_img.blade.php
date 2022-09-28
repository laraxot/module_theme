<div class="row g-4">
    {{#each cards as |card|}}
      <div class="col-lg-6 col-xl-4">
        <!--start card-->
        <div class="card-wrapper shadow-sm rounded cmp-list-card-img">
          <div class="card card-img no-after rounded">
            <div class="img-responsive-wrapper {{#if img-path}}cmp-list-card-img__wrapper{{/if}}">
              <div class="img-responsive img-responsive-panoramic h-100 {{imgClass}}">
                {{#if img-path}}
                <figure class="img-wrapper">
                  <img class="rounded-top img-fluid" src="{{card.img-path}}"
                    title="titolo immagine" alt="descrizione immagine">
                </figure>
                {{/if}}
                {{#if card.tag}}
                <div class="card-calendar d-flex flex-column justify-content-center">
                  <span class="card-date">{{card.date}}</span>
                  <span class="card-day">{{card.month}}</span>
                </div>
                {{/if}}
              </div>
            </div>
            <div class="card-body ">
              <div class="category-top cmp-list-card-img__body">
                <a class="text-decoration-none fw-bold cmp-list-card-img__body-heading-title" href="#">{{card.category}}</a>
                {{#if card.category-date}}
                <span class="data">{{card.category-date}}</span>
                {{/if}}
              </div>
              <h3 class="cmp-list-card-img__body-title "><a href="#" class="text-decoration-none">{{card.title}}</a></h3>
              <p class="cmp-list-card-img__body-description">{{card.description}}</p>
    
              <a class="read-more t-primary text-uppercase cmp-list-card-img__body-link " href="#" aria-label="Leggi di più sulla pagina di {{card.title}}">
                <span class="text">{{card.link}}</span>
                <span class="visually-hidden">su Lorem ipsum dolor sit amet, consectetur adipiscing elit…</span>
                <svg class="icon icon-primary icon-xs ml-10">
                  <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#{{card.icon}}"></use>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    {{/each}}
      <!--end card-->
    
      {{#if buttonNext}}
      <div class="d-flex justify-content-end">
        {{>partials/button/button  primary="true" class="px-5 py-3 full-mb" aria-label=aria-label }}
      </div>
      {{/if}}
    
    </div>
    