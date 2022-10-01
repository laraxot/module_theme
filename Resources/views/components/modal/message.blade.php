{{-- {{#>cmp-modal/cmp-modal-structure-3 id="modal-message" date="15/03/2022" card-title="Iscrizione alla scuola
dell’infanzia" subtitle="Graduatoria 2022/23" description="La graduatoria per l’iscrizione alla Scuola dell’Infanzia,
a.a. 2022/2023 è stata pubblicata. Consulta la graduatoria online e perfeziona la pratica." link="Graduatoria Scuola
dell'infanzia per l'anno scolastico 2022/23"
sub-class="h-100"}} --}}

<x-modal.structure type="3">
<x-slot name="id">modal-message</x-slot>
<x-slot name="date">15/03/2022</x-slot>

<div class="mb-60 mb-lg-80">

  @if(isset($subtitle))
    <h5 class="subtitle-large">{{$subtitle}}</h5>
  @endif

  @if(isset($txt))
    <p class="text-paragraph mb-4 fw-normal">{{$txt}}</p>
  @endif

  @if(isset($link))
    <a href="#" class="text-paragraph t-primary text-decoration-underline">{{$link}}</a>
  @endif
</div>
</x-modal.structure>
{{-- {{/cmp-modal/cmp-modal-structure-3}} --}}