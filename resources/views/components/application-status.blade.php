<div>
    <div class="mb-6">
        <span class="px-3 py-1 text-sm font-semibold rounded-full
            @if ($status == 1) bg-yellow-500 text-white
            @elseif($status == 2) bg-blue-500 text-white
            @elseif($status == 3) bg-green-500 text-white
            @elseif($status == 4) bg-red-500 text-white
            @else bg-gray-500 text-white @endif">
            Status: {{ status($status) }}
        </span>
    </div>

    <div class="mb-6">
        <button wire:click="updateStatus(3)" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
            Approve
        </button>
        <button wire:click="updateStatus(4)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Reject
        </button>
    </div>
</div>
