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
        <link rel="stylesheet" href="{{ 'source/css/navbar.css' }}" />
        <link rel="stylesheet" href="{{ 'source/css/footer.css' }}" />
        <link rel="stylesheet" href="{{ 'source/css/homepage.css' }}" />
        <link rel="stylesheet" href="{{ 'source/css/booking.css' }}" />

        <!-- Date picker -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css"
        />
    </head>

    <body>
        @include('partials.navbar')
        {{-- memanggil navbar dari folder partial --}}

        <div>@yield('homepage') @yield('booking')</div>

        @include('partials.footer')
        {{-- memanggil footer dari folder partial --}}

        {{-- Bootstrap JS --}}
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"
        ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
        <script>
            flatpickr(".calendar", {
                minDate: "today",
            });
            flatpickr(".time", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                minTime: "10:00",
                maxTime: "21:00",
            });
        </script>
    </body>
</html>
