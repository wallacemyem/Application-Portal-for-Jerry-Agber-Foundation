<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Application Details for ') }} {{ $app_data->surname }}
            {{ $app_data->first_name }}
            {{ $app_data->other_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @php
                    // $app_data = \App\Models\BioData::where('user_id', auth()->user()->id)->first();

                    function status($tt)
                    {
                        if ($tt == 1) {
                            $st = 'Pending';
                            return $st;
                        } elseif ($tt == 2) {
                            $st = 'In Review';
                            return $st;
                        } elseif ($tt == 3) {
                            $st = 'Approved';
                            return $st;
                        }
                    }
                @endphp
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <div class="flex justify-between items-center mb-8">
                                    <h1 class="text-3xl font-bold"></h1>

                                    <div class="mb-6">
                                        <button id="approveBtn"
                                            class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded mr-2">
                                            Approve
                                        </button>
                                        <button id="rejectBtn"
                                            class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">
                                            Reject
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <div class="mb-6">
                                    <span
                                        class="px-3 py-1 text-sm font-semibold rounded-full
                                        @if ($app_data->status == 1) bg-yellow-500 text-white
                                        @elseif($app_data->status == 2) bg-blue-500 text-white
                                        @elseif($app_data->status == 3) bg-green-500 text-white
                                        @else bg-gray-500 text-white @endif">
                                        Status: {{ status($app_data->status) }}
                                    </span>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <!-- Personal Information -->
                                    <div class="bg-white overflow-hidden shadow rounded-lg">
                                        <div class="px-4 py-5 sm:p-6">
                                            <h2 class="text-xl font-semibold mb-4">Personal Information</h2>
                                            <img src="{{ asset($app_data->photo) }}" alt="Applicant Photo"
                                                class="w-20 h-20 rounded-full mb-4">
                                            <p><strong>Name:</strong> {{ $app_data->surname }}
                                                {{ $app_data->first_name }}
                                                {{ $app_data->other_name }}</p>
                                            <p><strong>Email:</strong>
                                                {{ \App\Models\User::where('id', $app_data->user_id)->first()->email }}
                                            </p>
                                            <p><strong>Phone:</strong> {{ $app_data->phone }}</p>
                                        </div>
                                    </div>

                                    <!-- Application Details -->
                                    <div class="bg-white overflow-hidden shadow rounded-lg">
                                        <div class="px-4 py-5 sm:p-6">
                                            <h2 class="text-xl font-semibold mb-4">Application Details</h2>
                                            <p><strong>Course of Study:</strong> {{ $app_data->course_of_study }}</p>
                                            <p><strong>Local Government:</strong>
                                                {{ $app_data->lga == 1 ? 'Makurdi' : 'Guma' }}</p>
                                            <p><strong>Council Ward:</strong> {{ $app_data->council_ward }}</p>
                                            <p><strong>Applied for:</strong>
                                                {{ $app_data->type == 1 ? 'Scholarship' : 'Job Placement' }}</p>
                                        </div>
                                    </div>

                                    <!-- Social Media Profiles -->
                                    <div class="bg-white overflow-hidden shadow rounded-lg">
                                        <div class="px-4 py-5 sm:p-6">
                                            <h2 class="text-xl font-semibold mb-4">Social Media Profiles</h2>
                                            @if ($app_data->facebook_profile)
                                                <p><a href="{{ $app_data->facebook_profile }}" target="_blank"
                                                        class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">Facebook
                                                        Profile <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20"
                                                            class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                                                            <path fill-rule="evenodd"
                                                                d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                                                clip-rule="evenodd" />
                                                        </svg></a></p>
                                            @endif
                                            @if ($app_data->linkedin_profile)
                                                <p><a href="{{ $app_data->linkedin_profile }}" target="_blank"
                                                        class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">LinkedIn
                                                        Profile <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20"
                                                            class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                                                            <path fill-rule="evenodd"
                                                                d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                                                clip-rule="evenodd" />
                                                        </svg></a></p>
                                            @endif
                                            @if ($app_data->x_profile)
                                                <p><a href="{{ $app_data->x_profile }}" target="_blank"
                                                        class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">Twitter
                                                        Profile
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                                                            <path fill-rule="evenodd"
                                                                d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                                                clip-rule="evenodd" />
                                                        </svg></a></p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Documents -->
                                    @if ($app_data->cv_file_path)
                                        <div class="bg-white overflow-hidden shadow rounded-lg">
                                            <div class="px-4 py-5 sm:p-6">
                                                <h2 class="text-xl font-semibold mb-4">Resume/CV</h2>
                                                <a href="{{ asset($app_data->cv_file_path) }}"
                                                    class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">Download
                                                    Resume/CV <svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                                                        <path fill-rule="evenodd"
                                                            d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($app_data->id_file_path)
                                        <div class="bg-white overflow-hidden shadow rounded-lg">
                                            <div class="px-4 py-5 sm:p-6">
                                                <h2 class="text-xl font-semibold mb-4">ID Document</h2>
                                                <a href="{{ asset($app_data->id_file_path) }}"
                                                    class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">Download
                                                    ID Document <svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                                                        <path fill-rule="evenodd"
                                                            d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($app_data->lgco_file_path)
                                        <div class="bg-white overflow-hidden shadow rounded-lg">
                                            <div class="px-4 py-5 sm:p-6">
                                                <h2 class="text-xl font-semibold mb-4">Local Government Certificate of
                                                    Origin</h2>
                                                <a href="{{ asset($app_data->lgco_file_path) }}"
                                                    class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">Download
                                                    Certificate

                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                                                        <path fill-rule="evenodd"
                                                            d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const approveBtn = document.getElementById('approveBtn');
                const rejectBtn = document.getElementById('rejectBtn');
                const statusBadge = document.getElementById('statusBadge');
                const statusText = document.getElementById('statusText');

                function updateStatus(status) {
                    fetch('{{ route('update.application.status', $app_data->id) }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                status: status
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                statusText.textContent = data.status;
                                statusBadge.className =
                                `px-3 py-1 text-sm font-semibold rounded-full ${data.class}`;
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }

                approveBtn.addEventListener('click', () => updateStatus(3));
                rejectBtn.addEventListener('click', () => updateStatus(4));
            });
        </script>
    @endpush
</x-app-layout>
