<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PS Budget Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <!-- DataTables JavaScript & CSS -->
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <style>
        body {
            background-color: #f4f6f8;
            font-family: Arial, sans-serif;
        }

        .logo-spacing {
            margin-right: 20px;
        }

        .navbar {
            padding-left: 30px;
            padding-right: 15px;
        }

        .nav-link {
            padding: 0.5rem 1rem;
        }

        @media (min-width: 992px) {
            .navbar .container-fluid {
                justify-content: center;
            }
        }

        .calculator-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .heading h1 {
            font-size: 2.5rem;
            color: #333;
        }

        .heading p {
            font-size: 1.2rem;
            color: #777;
        }

        .flex-container {
            display: flex;
            flex-wrap: nowrap;
            gap: 20px;
        }

        .form-section {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1;
            /* Allow the form to grow */
            position: relative;
        }

        .results-section {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: sticky;
            top: 20px;
            /* Space from the top when scrolling */
            height: calc(100vh - 40px);
            /* Full height minus margins */
            overflow-y: auto;
            /* Allow scrolling */
        }

        .form-section h4 {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .btn-primary {
            background-color: #007BFF;
            border: none;
            width: 100%;
        }

        .error-message {
            color: red;
            font-size: 0.9rem;
            margin-top: 5px;
            display: none;
        }

        #your-results {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        #your-results h4 {
            color: #007BFF;
            margin-bottom: 20px;
        }

        #your-results h3 {
            color: #28a745;
            font-size: 2.5rem;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
        }

        .show {
            display: inherit;
        }

        /* Hide Sidebar on Small Screens */
        @media only screen and (max-width: 600px) {
            .results-section {
                display: none;
            }
        }
    </style>
</head>

<body>
  
    <!-- Nav Start -->
    <nav class="navbar navbar-expand bg-body-tertiary">
        <div class="container-fluid d-flex justify-content-between">
            <a href="{{ route('index') }}">
                <img src="{{ asset('assets/logos/patrick_logo.png') }}" alt="Logo" class="logo-spacing"
                    style="width: 50px; height: auto;">
            </a>
            <div id="navbarScroll" class="d-flex flex-grow-1 justify-content-center justify-content-lg-between">
                <div class="d-flex flex-row align-items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="nav-link me-3">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('investment_calculator.index')"
                        :active="request()->routeIs('investment_calculator.index')" class="nav-link me-3">
                        {{ __('Free Tools') }}
                    </x-nav-link>
                    @auth
                        @if (Auth::user()->role == 'admin')
                            <x-nav-link :href="route('blogs.index')" :active="request()->routeIs('blogs.index')"
                                class="nav-link me-3">
                                {{ __('Blogs') }}
                            </x-nav-link>
                            <x-nav-link :href="route('youtube.index')" :active="request()->routeIs('youtube.index')"
                                class="nav-link me-3">
                                {{ __('Youtube') }}
                            </x-nav-link>
                            <x-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')"
                                class="nav-link me-3">
                                {{ __('Contact us') }}
                            </x-nav-link>
                        @endif
                    @endauth
                    <x-nav-link :href="route('course.index')" :active="request()->routeIs('course.index')"
                        class="nav-link me-3">
                        {{ __('Courses') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </nav>
    <!-- End of Nav -->

    <div class="calculator-container">
        <div class="heading">
            <h3>PS Budget Calculator</h3>
        </div>
    </div>
       
    <div class="py-12 col-md-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
               
                <div class="table-responsive" style="">
                    <div class="data-table-area">
                        <div class="data-table-list">
                            <table id="data-table-basic" class="table table-striped">                
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Year</th>
                            <th>Month</th>

                            <th>Action</th>
                        </tr>    
                        </thead>
                        <tbody>
                            @foreach($budgets as $budget)
                        <tr>
                            <td>
                                {{$loop->iteration }}
                            </td>
                            <td>
                            {{$budget->year }}
                            </td>
                            <td>
                                {{$budget->month}}
                            </td>
                           
                            <td>
                                <a href="{{route('budget_calculator.show', [$budget->month, $budget->year])}}">view/edit</a>
                                <a href="{{route('budget_calculator.destroy',$budget->id )}}">delete</a>
                                <!-- <div class="dropdown">
                                    <button class="btn btn-danger dropdown-toggle" type="button" id="actionsDropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="actionsDropdownMenuButton">
                                        
                                    </div>
                                </div> -->
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>