@extends('layouts.home') @section('homepage')
{{-- Section 1 --}}
<div class="container-fluid" id="section-1">
    <div class="row">
        <div
            id="carouselExampleAutoplaying"
            class="carousel slide p-0"
            data-bs-ride="carousel"
        >
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img
                        src="{{ 'source/img/carousel-1.png' }}"
                        class="d-block w-100"
                        alt="..."
                    />
                </div>
                <div class="carousel-item">
                    <img
                        src="{{ 'source/img/carousel-2.png' }}"
                        class="d-block w-100"
                        alt="..."
                    />
                </div>
                <div class="carousel-item">
                    <img
                        src="{{ 'source/img/carousel-3.png' }}"
                        class="d-block w-100"
                        alt="..."
                    />
                </div>
            </div>
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev"
            >
                <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next"
            >
                <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
{{-- Section 1 --}}

{{-- Section 2 --}}
<div class="container-fluid" id="section-2">
    <h1>Simetris Studios</h1>
    <p class="mx-auto">
        Welcome to our barbershop, where
        <b style="color: #ffa910">style meets substance</b>. Our skilled barbers
        are ready to help you look your best with the latest cuts and styles.
        Whether you're looking for a classic, clean-cut look or a trendy, edgy
        style, we've got you covered.
    </p>
    <a href="/booking"><Button class="btn">Book Now</Button></a>
</div>
{{-- Section 2 --}}

{{-- Section 3 --}}
<div class="container-fluid text-center" id="section-3">
    <div>
        <h6>What we serve</h6>
        <h1>Our Best Service</h1>
    </div>
    <div class="highlight"></div>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <img
                    src="{{ 'source/img/haircut.png' }}"
                    class="card-img-top"
                    alt="..."
                />
                <div class="card-body">
                    <h5 class="card-title">Haircut</h5>
                    <p class="card-text">
                        A skilled barber will use scissors or clippers to cut
                        and style your hair according to your desired look.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <img
                    src="{{ 'source/img/smoothing.png' }}"
                    class="card-img-top"
                    alt="..."
                />
                <div class="card-body">
                    <h5 class="card-title">Smoothing</h5>
                    <p class="card-text">
                        This service typically involves using a straightening
                        iron or chemical treatment to tame and smooth out frizzy
                        or unruly hair.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <img
                    src="{{ 'source/img/shave.png' }}"
                    class="card-img-top"
                    alt="..."
                />
                <div class="card-body">
                    <h5 class="card-title">Shave</h5>
                    <p class="card-text">
                        A traditional barber shave involves using a sharp blade
                        and hot towels to give you a close and smooth shave.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <img
                    src="{{ 'source/img/perm.png' }}"
                    class="card-img-top"
                    alt="..."
                />
                <div class="card-body">
                    <h5 class="card-title">Perm</h5>
                    <p class="card-text">
                        A perm involves using chemicals to create permanent
                        waves or curls in your hair.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <img
                    src="{{ 'source/img/coloring.png' }}"
                    class="card-img-top"
                    alt="..."
                />
                <div class="card-body">
                    <h5 class="card-title">Coloring</h5>
                    <p class="card-text">
                        hether you want to cover up gray hairs or try out a bold
                        new look, a professional colorist can help you achieve
                        the perfect hair color.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Section 3 --}}

{{-- Section 4 --}}
<div class="container-fluid p-5 text-center" id="section-4">
    <div>
        <h6>Hair Artist</h6>
        <h1>Let's See Our Best Hair Artists</h1>
    </div>
    <div class="highlight"></div>
    <div class="row justify-content-center">
        @foreach($artists as $artist)
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <img
                        src="{{ $artist->image }}"
                        class="card-img"
                        alt="..."
                    />
                    <div class="card-img-overlay">
                        <div class="card-body">
                            <h5 class="card-title">{{$artist->name}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach        
    </div>
</div>
{{-- Section 4 --}}

{{-- Section 5 --}}
<div class="container-fluid text-center" id="section-5">
    <h1>About Us</h1>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <img
                src="{{ 'source/img/about-us.png' }}"
                alt=""
                class="img-about-us"
            />
        </div>
        <div class="col-lg-8 col-md-12 align-self-center">
            <p>
                Welcome to Simetris Studio Barbershop, where style and artistry
                meet to
                <b style="color: #ffa910"
                    >give you the ultimate grooming experience</b
                >. Located in the heart of Karawang, Indonesia, our barbershop
                is dedicated to providing you with the best in class grooming
                services.
            </p>
            <p>
                Our experienced barbers are passionate about their craft and are
                always up-to-date with the latest trends and techniques. They
                specialize in everything from classic cuts to modern styles, so
                you can always count on getting
                <b style="color: #ffa910">the perfect look</b> that suits your
                style and personality.
            </p>
            <p>
                At Simteris Studio Barbershop, we believe that grooming is not
                just a necessity, it's an
                <b style="color: #ffa910">art form</b>. That's why our
                barbershop is designed to be an immersive experience, with a
                unique blend of contemporary and classic design elements. From
                the moment you step in, you'll feel like you've entered a world
                of luxury and sophistication.
            </p>
            <p>
                We use only the finest grooming products that are carefully
                selected for their
                <b style="color: #ffa910">quality and effectiveness</b>. From
                premium hair care products to superior shaving products, we have
                everything you need to look and feel your best.
            </p>
        </div>
    </div>
</div>
{{-- Section 5 --}}

{{-- Section 6 --}}
<div class="container-fluid text-center p-5" id="section-6">
    <h1>Contact Us</h1>
    <h6>
        Get connect with us and feel free if you have an idea or improvement for
        us
    </h6>
    <div class="row">
        <div class="col-lg-5 col-md-5">
            <img src="{{ 'source/img/contact-us.jpg' }}" alt="" />
            <p>
                Simetris Studio Barbershop, where style and artistry meet to
                give you the ultimate grooming experience. Located in the heart
                of Karawang, Indonesia, our barbershop is dedicated to providing
                you with the best in class grooming services.
            </p>
            <div class="btn-socmed">
                <a
                    href="https://www.instagram.com/simetris.studios/"
                    target="_blank"
                    ><button class="btn-ig">
                        <i class="bi bi-instagram"></i><b>Instagram</b>
                    </button></a
                >
                <a
                    href="https://www.tiktok.com/@simetris.studios"
                    target="_blank"
                    ><button class="btn-tiktok">
                        <i class="bi bi-tiktok"></i><b>TikTok</b>
                    </button></a
                >
            </div>
        </div>
        <div class="col-lg-2 col-md-2 d-none d-md-block">
            <div class="garis-vertikal"></div>
        </div>
        <div class="col-lg-5 col-md-5">
            <form action="#">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="Fill with your fullname"
                    />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email </label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder="Fill with your email"
                    />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="message">Message</label>
                    <textarea
                        class="form-control"
                        name="message"
                        id="message"
                        cols="30"
                        rows="10"
                        placeholder="Fill your message here"
                    ></textarea>
                </div>
                <button type="submit" class="btn btn-submit">Send</button>
            </form>
        </div>
    </div>
</div>
{{-- Section 6 --}}
@endsection
