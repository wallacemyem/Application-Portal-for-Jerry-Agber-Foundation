<div
    class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">


    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        Welcome to the Jerry Agber Foundation application portal!
    </h1>

    @php
        $check_data = \App\Models\BioData::where('user_id', auth()->user()->id)->first();
    @endphp

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        Making a Difference, One Act of Kindness at a Time.
        <br>
        At the Jerry Agber Foundation, we believe in the transformative power of compassion, collaboration, and
        community. Our mission is simple: to uplift lives, inspire hope, and create sustainable change. Whether through
        education, healthcare, or empowerment initiatives, we strive to make a lasting impact.

    </p>

    @if (!$check_data)
        <p class="mt-4 text-sm">
            <a href="{{ route('job') }}"
                class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Apply for Job Placement

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                    <path fill-rule="evenodd"
                        d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </p>

        <p class="mt-4 text-sm">
            <a href="{{ route('edu') }}"
                class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Apply for Education Scholarship

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                    <path fill-rule="evenodd"
                        d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    @else
    <p class="mt-6 text-black-500 dark:text-black-500 leading-relaxed">
    Check application status and print application
    </p>
    <p class="mt-4 text-sm">
        <a href="{{ route('show') }}"
            class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
            View Application

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                <path fill-rule="evenodd"
                    d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                    clip-rule="evenodd" />
            </svg>
        </a>
    </p>
    @endif

</div>
