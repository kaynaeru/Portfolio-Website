<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Portfolio - Kristania Yohana Tumilaar</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset ('front')}}/css/styles.css" rel="stylesheet" />

    <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />
      
    <style>
        #sideNav {
            background: linear-gradient(to bottom, #333333, #111111); 
        }

        #sideNav .navbar-brand,
        #sideNav .nav-link {
            color: #ffffff;
            transition: 0.3s;
            text-transform: none;
        }

        #sideNav .navbar-brand:hover,
        #sideNav .nav-link:hover {
            color: #cccccc;
        }

        #sideNav .img-profile {
            border: .5px solid #ffffff;
        }

        #sideNav .navbar-toggler {
            border-color: #ffffff;
        }

        #sideNav .navbar-toggler-icon {
            background-color: #ffffff; 
        }
        #footer {
            background-color: #333333;
            color: #ffffff; 
            padding: 20px 0; 
            text-align: center; 
        }
        #footer h4 {
            margin-bottom: 20px;
        }

        #whatsappButton {
            background-color: #777777; 
            color: #ffffff; 
            padding: 10px 20px; 
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        #whatsappButton:hover {
            background-color: #444444;
        }
    </style>
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">{{ $about -> title }}</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ asset ('picture')."/".get_metavalue('picture')}}" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    {{ $about -> title }}
                </h1>
                <div class="lead mb-5">{!! $about->content !!}</div>
                <div class="social-icons">
                    <a class="social-icon" href="{{get_metavalue ('linkedin')}}"><i class="fab fa-linkedin-in"></i></a>
                    <a class="social-icon" href="{{get_metavalue ('github')}}"><i class="fab fa-github"></i></a>
                    <a class="social-icon" href="{{get_metavalue ('instagram')}}"><i class="fab fa-instagram"></i></a>
                    
                </div>
            </div>
        </section>
            <hr class="m-0" />
            
            <!-- Education-->
            <section class="resume-section" id="education">
                <div class="resume-section-content">
                    <h2 class="mb-5">Education</h2>
                    @foreach ($education as $item)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{ $item->title}}</h3>
                            <div class="subheading mb-3">{{$item->info1}}</div>
                            {!! $item->content !!}   
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">{{ $item->start_date_eng }} -
                            {{ $item->end_date_eng}}</span></div>
                    </div>
                    
                    @endforeach
                </div>
            </section>
            <hr class="m-0" />

            <!-- Experience-->
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Experience</h2>
                    @foreach ($experience as $item)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{ $item->title}}</h3>
                            <div class="subheading mb-3">{{$item->info1}}</div>
                            {!! $item->content !!}   
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">{{ $item->start_date_eng }} -
                            {{ $item->end_date_eng}}</span></div>
                    </div>
                    
                    @endforeach
                </div>
            </section>
            <!-- Skills-->
            <section class="resume-section" id="skills">
                <div class="resume-section-content">
                    <h2 class="mb-5">Skills</h2>
                    <ul class="list-inline dev-icons">
                    @foreach (explode(', ',get_metavalue('tools')) as $item)
                        <li class="list-inline-item"><i class="devicon-{{ $item }}-plain"></i></li>
                    @endforeach
                    </ul>
                </div>
            </section>
            
            <hr class="m-0" />
            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Contact Me</h4>
                            <p>Email: kristaniaytumilaar@gmail.com</p>
                            <p>Phone: +62895625411123</p>
                            <a id="whatsappButton" href="https://wa.me/62895625411123" target="_blank">Chat via WhatsApp</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset ('front')}}/"></script>
    </body>
</html>
