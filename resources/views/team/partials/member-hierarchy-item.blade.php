<li x-data="{ open: {{ $level < 1 ? 'true' : 'false' }} }" style="margin-left: {{ $level * 1.5 }}rem;">
    <div class="flex items-center p-2 rounded cursor-pointer" @click="open = !open">
        @if ($member->allReports->count() > 0)
            <span x-text="open ? '-' : '+'" class="font-bold text-lg w-6 text-center"></span>
        @else
            <span class="w-6"></span>
        @endif
        <div class="font-semibold">{{ $member->full_name }}</div>
        <div class="text-sm text-gray-500 ml-2">({{ $member->role_title }})</div>
    </div>
    @if ($member->allReports->count() > 0)
        <ul x-show="open" x-transition class="mt-2 space-y-2">
            @foreach ($member->allReports as $report)
                @include('team.partials.member-hierarchy-item', ['member' => $report, 'level' => $level + 1])
            @endforeach
        </ul>
    @endif
</li>