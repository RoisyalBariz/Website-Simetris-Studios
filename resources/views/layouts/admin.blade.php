<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Simetris Studio</title>
        {{-- Bootstrap  Icon --}}
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
        />

        {{-- Bootstrap CSS --}}
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
            crossorigin="anonymous"
        />

        {{-- Font --}}
        <link
            rel="stylesheet"
            href="https://fonts.google.com/specimen/Plus+Jakarta+Sans?query=plus+jakarta"
        />
        <link
            rel="stylesheet"
            href="https://fonts.google.com/specimen/Unbounded?query=unboun"
        />

        {{-- Style CSS --}}
        <link rel="stylesheet" href="{{ asset('source/css/dashboard.css') }}" />
        <link rel="stylesheet" href="{{ asset('source/css/reservation.css') }}" />
        <link rel="stylesheet" href="{{ asset('source/css/income.css') }}" />
    </head>

    <body>
        <div class="container-fluid p-0" id="dashboard">
            <div class="row">
                <div class="col-2">
                    <div id="sidebar">
                        <ul>
                            <li>
                                <a href="/dashboard">
                                    <img
                                        src="{{ asset('source/img/home.svg') }}"
                                        alt=""
                                        class="home"
                                    />
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="/reservation">
                                    <img
                                        src="{{
                                            asset('source/img/receipt_long.svg')
                                        }}"
                                        alt=""
                                        class="reservation"
                                    />
                                    Reservation
                                </a>
                            </li>
                            <li>
                                <a href="/income">
                                    <img
                                        src="{{ asset('source/img/income.svg') }}"
                                        alt=""
                                        class="income"
                                    />
                                    Income
                                </a>
                            </li>
                            <li>
                                <a href="/hair-artist">
                                    <img
                                        src="{{ asset('source/img/user.svg') }}"
                                        alt=""
                                        class="income"
                                    />
                                    Hair Artist
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-10">
                    <div class="navbar navbar-expand-lg" id="navbar">
                        <div class="container-fluid">
                            <div
                                class="collapse navbar-collapse"
                                id="navbarNav"
                            >
                                <h3 class="me-auto">Welcome, Admin</h3>
                                <h6 class="page">Main Page</h6>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-login">
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @yield('dashboard')
                </div>
            </div>
        </div>
        {{-- Bootstrap JS --}}
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
