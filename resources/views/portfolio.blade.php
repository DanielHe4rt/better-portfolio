<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{$profile['fullname']['value']}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('css/index.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/circle.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}"/>
    <meta content="💻 Desenvolvedor Back, 20 anos e que curte programar em PHP" name="description">
    <!-- Android search bar color -->
    <meta content="#34495E" name="theme-color"><!-- Mobile icon -->
    <meta content="DanielHeart - Portfólio" property="og:title">
    <meta content="{{$profile['picture_url']['value']}}" property="og:image">
    <meta content="website" property="og:type">
    <meta content="💻💻Desenvolvedor Back-end que curte criar Megazords com PHP" property="og:description">
    <meta content="DanielHeart - Portfólio" property="og:site_name"><!-- Twitter Card data -->
    <meta content="summary_large_image" name="twitter:card">
    <meta content="@danielhe4rt" name="twitter:site">
    <meta content="DanielHeart - Portfólio" name="twitter:title">
    <meta content="💻Desenvolvedor Back-end que curte criar Megazords com PHP" name="twitter:description">
    <meta content="@danielhe4rt" name="twitter:creator">
    <meta content="DanielHeart - Portfólio" itemprop="name">
    <meta content="💻💻Desenvolvedor Back-end que curte criar Megazords com PH" itemprop="description">
</head>

<body>
<div id="root" class="container">
    <nav class="navbar navbar-expand-md navbar-dark mb-3">
        <a class="navbar-brand" href="#">{{env('APP_NAME')}}</a>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav  ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <i class="fa fa-home"></i> Portfólio </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <div class="sticky-top pt-5 sidebar">
                @if($profile['picture_url']['enabled'])
                    <div class="avatar">
                        <img id="avatar" src="{{$profile['picture_url']['value']}}" alt="Foto de Daniel Reis"/>
                    </div>
                @endif
                @if($profile['fullname']['enabled'])
                    <h2 id="name" class="text-center">{{$profile['fullname']['value']}}</h2>
                @endif
                @if($profile['base_description']['enabled'])
                    <p class="text-center">{{$profile['base_description']['value']}}</p>
                @endif
                <div class="social-networks">
                    @if($profile['twitter_url']['enabled'])
                        <a href="{{$profile['twitter_url']['value']}}" class="social-links" target="_blank">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                            <label>{{__('portfolio.sidebar.twitter')}}</label>
                        </a>
                    @endif
                    @if($profile['github_url']['enabled'])
                        <a href="{{$profile['github_url']['value']}}" class="social-links" target="_blank">
                            <i class="fa fa-github" aria-hidden="true"></i>
                            <label>{{__('portfolio.sidebar.github')}}</label>
                        </a>
                    @endif
                    @if($profile['instagram_url']['enabled'])
                        <a href="{{$profile['instagram_url']['value']}}" class="social-links" target="_blank">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                            <label>{{__('portfolio.sidebar.instagram')}}</label>
                        </a>
                    @endif
                    @if($profile['linkedin_url']['enabled'])
                        <a href="{{$profile['linkedin_url']['value']}}" class="social-links" target="_blank">
                            <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                            <label>{{__('portfolio.sidebar.linkedin')}}</label>
                        </a>
                    @endif
                    @if($profile['email']['enabled'])
                        <a href="mailto:{{$profile['email']['value']}}" class="social-links" target="_blank">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <label>{{$profile['email']['value']}}</label>
                        </a>
                    @endif
                    @if($profile['phone_number']['enabled'])
                    <a href="tel:{{$profile['phone_number']['value']}}" class="social-links" target="_blank">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <label>{{$profile['phone_number']['value']}}</label>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-9" style="border-left: 1px solid rgba(194,194,194,0.1);">
            @if($profile['about']['enabled'])
            <section id="intro">
                <h3 class="text-center title">{{__('portfolio.sections.about.title')}}</h3>
                <p id="bio" class="text-center">
                    {!! $profile['about']['value'] !!}
                </p>
            </section>
            @endif
            <section id="skills">
                <h3 class="text-center title">{{__('portfolio.sections.skills.title')}}</h3>
                <p class="text-center">{{__('portfolio.sections.skills.description')}}</p>
                <div class="row d-flex justify-content-center">
                    @foreach(\App\Entities\Skill\Skill::all() as $skill)
                        <span class="badge badge-pill badge-{{$skill->type->slug}} badge-custom"
                              data-toggle="tooltip" data-placement="bottom" title=""
                              data-original-title="{{$skill->time->name}}"
                        >{{$skill->name}}</span>
                    @endforeach
                </div>
            </section>

            <section id="whereiwork">
                <h3 class="text-center title">{{__('portfolio.sections.places.title')}}</h3>
                <div class="row">
                    @foreach(\App\Entities\Place\Place::orderByDesc('joined_at')->get() as $place)
                        <div class="col-sm-12 timeline-info">
                            <div class="timeline-time">
                                <small>{{__('portfolio.sections.places.data.company')}}:</small>
                                <h4>{{$place->company_name}}</h4>
                                <small>{{__('portfolio.sections.places.data.duration')}}:</small>
                                <h5 class="base-purple">
                                    {!! $place->worked_time !!}
                                </h5>
                            </div>
                            <div class="separator"></div>
                            <div class="timeline-description">
                                <p>{{__('portfolio.sections.places.data.rated_skills')}}:
                                    @foreach($place->skills as $skill)
                                        <span class="badge badge-pill badge-{{$skill->type->slug}} "
                                              data-toggle="tooltip" data-placement="bottom" title=""
                                              data-original-title="{{$skill->time->name}}"
                                        >{{$skill->name}}</span>
                                    @endforeach
                                </p>
                                <p>
                                    <strong>{{__('portfolio.sections.places.data.description')}}:</strong>
                                    {{$place->description}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <section id="contact">
                <h3 class="text-center title" id="contato">{{__('portfolio.sections.contact.title')}}</h3>
                <form class="form-contact">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputName">{{__('portfolio.sections.contact.data.name')}}</label>
                                <input type="text" class="form-control" id="inputName" name="name"
                                       placeholder="Seu nome">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputEmail">{{__('portfolio.sections.contact.data.email')}}</label>
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                       placeholder="seu@email.com">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSubject">{{__('portfolio.sections.contact.data.subject')}}</label>
                        <input type="text" class="form-control" id="inputSubject" name="subject"
                               placeholder="Quero cotar um freelance | Só queria dar um oi">
                    </div>

                    <div class="form-group">
                        <label for="inputMessage">{{__('portfolio.sections.contact.data.message')}}</label>
                        <textarea class="form-control" id="inputMessage" name="content" rows="3"></textarea>
                    </div>
                    <button class="float-right" style="border-radius: .25rem" type="submit">{{__('portfolio.sections.contact.data.send')}}</button>
                </form>
            </section>
        </div>
    </div>

</div>
<footer class="footer">
    <p class="text-center mb-0 p-3">
       {!! __('portfolio.sections.footer.description') !!}
    </p>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/toastr.js')}}"></script>
<script src="{{asset('js/index.js')}}"></script>
</body>

</html>
