<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Applicants') }}
        </h2>
    </x-slot>

    @php
        $applicants = \App\Models\BioData::paginate(15);

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
                    <div class="mb-4 flex justify-between items-center">
                        <input type="text" id="searchInput" placeholder="Search applicants..."
                            class="border rounded-md p-2">
                        <a href="{{ route('admin.applicants.export') }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Export to Excel
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="max-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-2 px-4 border-b text-left">Name</th>
                                    <th class="py-2 px-4 border-b text-left">Email</th>
                                    <th class="py-2 px-4 border-b text-left">Phone</th>
                                    <th class="py-2 px-4 border-b text-left">Course of Study</th>
                                    <th class="py-2 px-4 border-b text-left">Applied for</th>
                                    <th class="py-2 px-4 border-b text-left">Status</th>
                                    <th class="py-2 px-4 border-b text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applicants as $applicant)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $applicant->surname }}
                                            {{ $applicant->first_name }}</td>
                                        <td class="py-2 px-4 border-b">{{ \App\Models\User::where('id', $applicant->user_id)->first()->email }}</td>
                                        <td class="py-2 px-4 border-b">{{ $applicant->phone }}</td>
                                        <td class="py-2 px-4 border-b">{{ $applicant->course_of_study }}</td>
                                        <td class="py-2 px-4 border-b">{{ $applicant->type == 1 ? 'Scholarship' : 'Job placement' }}</td>
                                        <td class="py-2 px-4 border-b">{{ $applicant->lga == 1 ? 'Makurdi' : 'Guma' }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if ($applicant->status == 1) bg-yellow-100 text-yellow-800
                                            @elseif($applicant->status == 2) bg-blue-100 text-blue-800
                                            @elseif($applicant->status == 3) bg-green-100 text-green-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                                {{ status($applicant->status) }}
                                            </span>
                                        </td>
                                        <td class="py-2 px-4 border-b">
                                            <a href="{{ route('show_user', $applicant->id) }}"
                                                onclick="return confirm('Are you sure you want to review this applicant?')"
                                                class="text-blue-600 hover:text-blue-900 mr-2">
                                                 Review
                                             </a>
                                            <a href="{{ route('admin.applicants.edit', $applicant->id) }}"
                                                class="text-green-600 hover:text-green-900 mr-2">Edit</a>
                                            {{-- <form action="{{ route('admin.applicants.destroy', $applicant->id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Are you sure you want to delete this applicant?')">Delete</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $applicants->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            table = document.querySelector('table');
            tr = table.getElementsByTagName('tr');

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName('td');
                for (var j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = '';
                            break;
                        } else {
                            tr[i].style.display = 'none';
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
