 <li>
     <a href="{{ route('logout') }}"  {{ $attributes }} title="logout" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    {{ $slot->isEmpty() ? __('Log out') : $slot }}
     </a>
</li>
<form id="logout-form" action="{{ route('logout') }}" method="POST"
    style="display: none;">
    {{ csrf_field() }}
</form>