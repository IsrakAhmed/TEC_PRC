@extends('layout')

@section('page-content')
    <br>
    <br>
    <h1 class="text-center text-primary">TEC Programming & Robotics Club</h1>

    <h2 class="text-center pt-4">Members Information</h2>

    <form action="/home" method="GET" class="search-form" id="member-search-form">
        <input placeholder="Search" type="text" name="search_term" id="search_term" value="{{ request('search_term') }}">
    </form>

    <div class="table-responsive" style="padding-top:2em;">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Session</th>
                <th>Joining Date</th>
                <th>Mobile</th>
                <th>E-Mail</th>
                <th>Blood Group</th>
                <th>Address</th>
            </tr>
            </thead>
            <tbody id="member-table-body">
            @if ($members->isEmpty())
                <tr>
                    <td style="color:red; padding-top:25px; padding-left:22em; font-weight: bold;" colspan="6">No Members Found</td>
                </tr>
            @else
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->department }}</td>
                        <td>{{ $member->session }}</td>
                        <td>{{ $member->joining_date }}</td>
                        <td>{{ $member->mobile_no }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->blood_group }}</td>
                        <td>{{ $member->address }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <div class="row pt-4">
        <div class="col-12 d-flex justify-content-center">
            {{ $members->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <footer class="footer mt-auto pt-2 pb-3">
        <div class="container text-center">
            <p class="mt-2" style="margin-bottom: 0.5px">© 2023 Israk Ahmed. All rights reserved.</p>
            <a href="https://israkahmed.github.io/Portfolio/">Developed by: Israk Ahmed</a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            function performSearch() {
                $.ajax({
                    url: $('#member-search-form').attr('action'),
                    method: 'GET',
                    data: $('#member-search-form').serialize(),
                    success: function(data) {
                        $('#member-table-body').html(data);
                    }
                });
            }

            $('#search_term').on('input', function() {
                performSearch();
            });

            performSearch();
        });
    </script>


    <style>
        /* Basic table styling */
        table {
            width: 130%;
            border-collapse: collapse;
            margin: 20px 0;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Styling for no members found message */
        #member-table-body td[colspan="9"] {
            color: red;
            padding-top: 25px;
            padding-left: 22em;
            font-weight: bold;
        }

        /* Alternating row colors for better readability */
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }


    </style>



@endsection
