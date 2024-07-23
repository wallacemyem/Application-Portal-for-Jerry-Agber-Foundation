<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Information - Print Version</title>
    <style>
        @page {
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .letterhead {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #333;
        }

        .logo {
            max-width: 200px;
            max-height: 100px;
        }

        .company-info {
            margin-top: 10px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1,
        h2 {
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 20px;
            break-inside: avoid;
        }

        .photo {
            max-width: 150px;
            max-height: 150px;
            border-radius: 50%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #f0f0f0;
            border-top: 1px solid #333;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        @media print {
            body {
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            .footer {
                position: fixed;
                bottom: 0;
            }
        }
    </style>
</head>

<body>
    <div class="letterhead">
        <img src="{{ asset('logo.png') }}" alt="Company Logo" class="logo">
        <div class="company-info">
            <strong>Jerry Agber Foundation</strong><br>
            123 Company Street, City, State 12345<br>
            Phone: (123) 456-7890 | Email: info@jerryagberfoundation.org
        </div>
    </div>

    <div class="container">
        <h1>Applicant Information</h1>

        @php
            $app_data = \App\Models\BioData::where('user_id', auth()->user()->id)->first();

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
        <div class="section">
            <h2>Personal Information</h2>
            <img src="{{ asset($app_data->lgco_file_path) }}" alt="Applicant Photo" class="photo">
            <table>
                <tr>
                    <th>Name</th>
                    <td>{{ $app_data->surname }} {{ $app_data->first_name }} {{ $app_data->other_name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ \App\Models\User::where('id', $app_data->user_id)->first()->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $app_data->phone }}</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h2>Application Details</h2>
            <table>
                <tr>
                    <th>Course of Study</th>
                    <td>{{ $app_data->course_of_study }}</td>
                </tr>
                <tr>
                    <th>Council Ward</th>
                    <td>{{ $app_data->council_ward }}</td>
                </tr>
                <tr>
                    <th>Applied for</th>
                    <td>{{ $app_data->type == 1 ? 'Scholarship' : 'Job Placement' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ status($app_data->status) }}</td>
                </tr>
            </table>
        </div>

        @if ($app_data->facebook_profile || $app_data->linkedin_profile || $app_data->x_profile)
            <div class="section">
                <h2>Social Media Profiles</h2>
                <table>
                    @if ($app_data->facebook_profile)
                        <tr>
                            <th>Facebook</th>
                            <td>{{ $app_data->facebook_profile }}</td>
                        </tr>
                    @endif
                    @if ($app_data->linkedin_profile)
                        <tr>
                            <th>LinkedIn</th>
                            <td>{{ $app_data->linkedin_profile }}</td>
                        </tr>
                    @endif
                    @if ($app_data->x_profile)
                        <tr>
                            <th>Twitter</th>
                            <td>{{ $app_data->x_profile }}</td>
                        </tr>
                    @endif
                </table>
            </div>
        @endif

        <div class="section">
            <h2>Documents</h2>
            <table>
                @if ($app_data->cv_file_path)
                    <tr>
                        <th>Resume/CV</th>
                        <td>Available</td>
                    </tr>
                @endif
                @if ($app_data->id_file_path)
                    <tr>
                        <th>ID Document</th>
                        <td>Available</td>
                    </tr>
                @endif
                @if ($app_data->lgco_file_path)
                    <tr>
                        <th>Local Government Certificate of Origin</th>
                        <td>Available</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
    Date printed: <i>{{ now() }}</i>
    {{-- <div class="footer">
        <p>© {{ date('Y') }} Jerry Agber Foundation.</p>
        <p>This document is confidential and intended solely for the use of the individual or entity to whom it is
            addressed.</p>
    </div> --}}
</body>

</html>
