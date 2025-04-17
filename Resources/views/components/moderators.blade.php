{{-- @props(['moderators']) --}}

<div class="bg-white shadow rounded-md p-5 pb-3">
    <h3 class="text-xl font-semibold">Moderators</h3>

    <ul>
        @foreach ($moderators as $moderator)
            @php
                $profile_url = Panel::make()->get($moderator)->url();
                //$profile_url = '';
            @endphp
            <li class="{{ !$loop->last ? 'border-b ' : '' }}flex items-center gap-x-5 pb-3 pt-5">
                <a href="{{ $profile_url }}" class="hover:underline">
                    <x-theme::avatar :user="$moderator" class="w-10 h-10" />
                </a>

                <span class="flex flex-col">
                    <a href="{{ $profile_url }}" class="hover:underline">
                        <span class="text-gray-900 font-medium">
                            {{ $moderator->username() }}
                        </span>
                    </a>

                    <span class="text-gray-700">
                        Joined {{-- $moderator->createdAt()->format('jMY') --}}
                    </span>
                </span>
            </li>
        @endforeach
    </ul>
</div>
