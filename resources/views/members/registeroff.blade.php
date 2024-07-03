@extends('layouts.admin')

@section('page-content')
    <legend class="pt-4 pl-4">Register Member</legend>

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif


    <div class="alert alert-danger" style="text-align: center">
        <strong>Registration Closed</strong>
    </div>



    <style>
        .overlay {
            display: flex;

            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            position: relative;
        }

        @media (max-width: 767px) {
            .modal-content img {
                width: 100%;
                height: auto; /* Maintain aspect ratio */
            }
        }

    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const agreeCheckbox = document.getElementById('agreeCheckbox');
            const submitButton = document.getElementById('submitButton');
            const overlay = document.getElementById('overlay');
            const closeBtn = document.querySelector('.close-btn');

            // Enable submit button when checkbox is checked
            agreeCheckbox.addEventListener('change', function() {
                submitButton.disabled = !agreeCheckbox.checked;
            });

            // Close overlay when close button is clicked
            closeBtn.addEventListener('click', function() {
                overlay.style.display = 'none';
            });

            // Show overlay instantly when the page loads
            overlay.style.display = 'flex';
        });
    </script>

@endsection



