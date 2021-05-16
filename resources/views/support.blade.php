@extends('layouts.app')

@section('content')
    <div class="col-xs-12 col-md-9" style="border-left: 1px solid rgba(194,194,194,0.1);">
        <section class="why-support">
            <h3 class="title">Por quê você deveria me apoiar?</h3>
            <p>
                Crio conteúdo na <a href="https://twitch.tv/danielhe4rt" target="_blank">Twitch.tv</a> há quase 3 anos
                e mantenho a comunidade <a href="https://heartdevs.com">He4rt Developers</a>, uma comunidade focada
                totalmente em programação para iniciantes. <br>

                Estou focado em estar criando conteúdo em vídeo na <a href="https://udemy.com/user/danielhe4rt">Udemy.com</a>,
                de forma totalmente gratuita, para formar cada vez mais devs dentro do mercado PHP.<br><br>

                Minhas lives contam com aulas sobre as tecnologias: PHP, Laravel, Lumen, AWS, Azure, Scrapping, Bots e mais um
                monte de coisas. E eu ensino isso tudo <strong>gratuitamente</strong> para a comunidade!
                Basta você estar na live acompanhando e me perguntar no chat e eu paro tudo para tentar te ajudar
                (claro, se souber sanar sua dúvida).
            </p>
        </section>

        <section class="my-projects">
            <h3 class="title">Quais projetos eu fiz/faço</h3>
            <p>Se você quiser entender mais sobre minhas contribuições mais recentes à comunidade dev, se liga nos links abaixo:</p>
            <div class="projects">
                <a href="#" class="project">
                    <img src="https://placehold.it/300x200" alt="">
                    <div class="project-title">PHP4Noobs - Github</div>
                    <p> Tutorial De PHP para iniciantes na linguagem.</p>
                </a>
                <a href="#" class="project">
                    <img src="https://placehold.it/300x200" alt="">
                    <div class="project-title">Git4Noobs - Github</div>
                    <p> Tutorial De Git para iniciantes com a ferramenta.</p>
                </a>
                <a href="#" class="project">
                    <img src="https://placehold.it/300x200" alt="">
                    <div class="project-title">PHP4Noobs - Udemy</div>
                    <p> Curso gratuito para iniciar novos programadores na linguagem PHP.</p>
                </a>
                <a href="#" class="project">
                    <img src="https://placehold.it/300x200" alt="">
                    <div class="project-title">Laravel4Noobs - Udemy</div>
                    <p> Curso gratuito para iniciar novos programadores na Framework Laravel.</p>
                </a>
            </div>
        </section>

        <section class="how-support">
            <h3 class="title">Como você consegue me apoiar?</h3>
            <!-- Collapse -->


            <div class="accordion" id="accordionExample">
                <div class="method">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Amazon Prime (Twitch Prime)
                        </button>
                    </h2>
                    <div id="collapseOne" class="collapse active show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="method-body">

                            <p>Esse modelo de apoio custa ZERO para você que tenha Amazon Prime e não utiliza-o na Twitch.</p>

                            <h4>1. Crie uma conta na Twitch</h4>
                            <img src="https://i.imgur.com/PH8a85z.png" alt="">
                            <p>Crie uma conta na Twitch TV para que você possa seguir meu canal.</p>

                            <h4>2. Procure o botão de vinculação do Amazon Prime</h4>
                            <img src="https://i.imgur.com/boW0JXs.png" alt="">
                            <p>
                                Clique na coroa ao lado do seu usuário, localizado ao lado direito da barra de navegação
                                e clique para Iniciar o Prime Gaming.
                            </p>

                            <h4>3. Vincule seu Amazon Prime</h4>
                            <img src="https://i.imgur.com/c8u2MQy.png" alt="">
                            <p>
                                Clique no botão "Try Prime" ou algo semelhante nessa tela caso seu sistema seja em português.<br>
                                Siga todos os passos para que o Prime Gaming seja vinculado à sua conta da Twitch.
                            </p>

                            <h4>4. Entre no meu canal da Twitch e clique no Inscrever</h4>
                            <img src="https://i.imgur.com/yL4kl2B.png" alt="">
                            <p>ou</p>
                            <img src="https://i.imgur.com/1modPgt.png" alt="">
                            <p>
                                Ao entrar no meu canal, se eu estiver offline, clique na aba Chat ou procure pelo botão
                                Subscribe ou Inscrever-se.
                            </p>
                            <h4>5. Inscreva-se com Prime</h4>
                            <img src="https://i.imgur.com/fBtOqWZ.png" alt="">
                            <p>
                                Procure pelo botão de inscrição com o Prime e clique no botão. Após finalizar você terá me ajudado IMENSAMENTE no meu projeto!
                            </p>

                            <div class="alert alert-warning"> Lembre-se que essa inscrição é valida apenas por 1 mês, então por favor volte todo mês pra me dar essa força <3</div>
                        </div>
                    </div>
                </div>
                <div class="method">
                    <h2>
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Collapsible Group Item #2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="method-body">
                            Some placeholder content for the second accordion panel. This panel is hidden by default.
                        </div>
                    </div>
                </div>

            </div>


        </section>
    </div>
@endsection
