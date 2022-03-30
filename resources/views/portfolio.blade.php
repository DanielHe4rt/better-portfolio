@extends('layouts.app')

@section('content')
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
                            <small>{{__('portfolio.sections.places.data.duration')}}
                                : {{$place->joined_at->format('m/Y')}}
                                ~ {{$place->lefted_at ? $place->lefted_at->format('m/Y') : 'now'}}</small>
                            <h5 class="base-purple">
                                {!! $place->worked_time !!}
                            </h5>
                        </div>
                        <div class="separator"></div>
                        <div class="timeline-description">
                            <p>
                                <strong>{{__('portfolio.sections.places.data.rated_skills')}}:</strong>
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
                <div class="text-right">
                <button class="text-right" style="border-radius: .25rem"
                        type="submit">{{__('portfolio.sections.contact.data.send')}}</button>
                </div>
            </form>
        </section>

    </div>
@endsection
