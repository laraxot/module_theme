<div class="cmp-contacts">
  <div class="card w-100">
    <div class="card-body">
      <h2 class="title-medium-2-semi-bold ">Contatta il comune</h2>
      <ul class="contact-list p-0">
        <li><a class="list-item" href="#">
            <svg class="icon icon-primary icon-sm" aria-hidden="true">
              <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-help-circle"></use>
            </svg><span>Leggi le domande frequenti</span></a></li>

        <li><a class="list-item" href="#" data-element="contacts">
            <svg class="icon icon-primary icon-sm" aria-hidden="true">
              <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-mail"></use>
            </svg><span>Richiedi assistenza</span></a></li>

        <li><a class="list-item" href="#">
            <svg class="icon icon-primary icon-sm" aria-hidden="true">
              <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-hearing"></use>
            </svg><span>Chiama il numero verde 05 0505</span></a></li>

        <li><a class="list-item" href="#" data-element="appointment-booking">
            <svg class="icon icon-primary icon-sm" aria-hidden="true">
              <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-calendar"></use>
            </svg><span>Prenota appuntamento</span></a></li>
      </ul>

      
      @if(isset($city_problems))
        <h2 class="title-medium-2-semi-bold mt-4">Problemi in città</h2>
        <ul class="contact-list p-0">
          <li><a class="list-item" href="#">
              <svg class="icon icon-primary icon-sm" aria-hidden="true">
                <use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-map-marker-circle"></use>
              </svg><span>Segnala disservizio </span></a></li>
        </ul>
      @endif

    </div>
  </div>
</div>