<div class="btn-group" role="group" aria-label="radio status group">
    <div wire:loading wire:target="updateStatus">
        <x-spinner></x-spinner>
    </div>
    @foreach($statuses as $k=>$status)
        <input wire:click="updateStatus('{{ $status['name'] }}')" type="radio" class="btn-check" name="status" value="{{ $status['name'] }}" id="option{{ $k }}" autocomplete="off" wire:model="form_data.status">
        <label class="btn" style="background-color:{{ $status['color'] }};" for="option{{ $k }}" data-toggle="tooltip" title="{{ $status['label'] }}" >
            {!! $status['active']?'X':'&nbsp;' !!}
        </label>
    @endforeach
</div>