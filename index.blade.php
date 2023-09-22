<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->
    <title>{{ Auth::user()->name }} - ESTIVA </title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="theme-color" content="#FE4487">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">
    <meta name="keywords"
        content="android, ios, mobile, application template, progressive web app, ui kit, multiple color, dark layout">
    <meta name="description"
        content="Revolutionize your online store with our Ecommerce App Template. Seamless shopping, secure payments, and personalized recommendations for an exceptional user experience">
    <meta property="og:title" content="Wedo - Ecommerce Mobile App Template ( Bootstrap + PWA )">
    <meta property="og:description"
        content="Revolutionize your online store with our Ecommerce App Template. Seamless shopping, secure payments, and personalized recommendations for an exceptional user experience.">
    <meta property="og:image" content="https://wedo.dexignzone.com/xhtml/page-error-404.html">
    <meta name="format-detection" content="telephone=no">

    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="mobile/images/favicon.png">


    <!-- Global CSS -->
    <link href="mobile/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="mobile/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="mobile/vendor/swiper/swiper-bundle.min.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" class="main-css" type="text/css" href="mobile/css/style.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&amp;family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <style>
        .alinha {
            justify-content: center;
            align-items: center;
            flex-direction: row;
            flex: 1%;
            /* text-align: center; */
        }

        label.cameraButton {
            display: inline-block;
            margin: 1em 0;

            /* Styles to make it look like a button */
            padding: 0.5em;
            border: 2px solid #666;
            border-color: #EEE #CCC #CCC #EEE;
            background-color: #DDD;
        }

        /* Look like a clicked/depressed button */
        label.cameraButton:active {
            border-color: #CCC #EEE #EEE #CCC;
        }

        /* This is the part that actually hides the 'Choose file' text box for camera inputs */
        label.cameraButton input[accept*="camera"] {
            display: none;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div id="preloader">
            <div class="loader">
                <div class="load-circle">
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <!-- Preloader end-->

        <!-- Header -->
        <header class="header header-fixed">
            <div class="container">
                <div class="header-content">
                    <img src="web/logoo.png" style="width: 100px" >
                    <div class="left-content">
                        {{-- <a href="javascript:void(0);" class="back-btn">
                            <i class="icon feather icon-truck"></i>
                        </a>
                        <h6 class="title">ESTIVA</h6> --}}
                    </div>
                    <div class="mid-content">
                    </div>
                    <div class="right-content">
                        <a href="#CODELABS" data-bs-toggle="modal"
                            data-bs-target=".bd-example-modal-lg"class="search-icon">
                            <button type="button" class="btn btn-primary btn-sm">Reportar Danos</button>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header -->

        {{-- Modal --}}
        <!-- Large modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">PREENCHA OS CAMPOS ABAIXOS COM O DANO</h6>
                        <button class="btn-close" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="POST" action="{{ route('cadastrar_danos') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <h6 class="">Dados do contentor</h6>
                                        {{-- <div class="mb-2">
                                            <input type="text" name="nome" class="form-control" placeholder="Nome">
                                        </div> --}}
                                        <div class="mb-2">
                                            <input type="number" name="numero_contentor" class="form-control"
                                                placeholder="Digite o numero do container">
                                        </div>
                                        <div class="mb-2">
                                            <select name="tipo_contentor" class="form-control">
                                                <option disabled selected> -Selecione o tipo container- </option>
                                                @foreach ($tipo_contentor as $contentor)
                                                    <option value="{{ $contentor->id }}">{{ $contentor->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <input type="number" name="tamanho" class="form-control"
                                                placeholder="Medida em mm">
                                        </div>
                                        <div class="mb-2">
                                            <select class="form-control" name="linha_id" id="">
                                                <option value="">==Selecione a Linha==</option>
                                                @foreach ($linhas as $linha)
                                                    <option value="{{ $linha->id }}">{{ $linha->nome }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <h6 class="">informações de danos</h6>
                                        <div class="mb-2">
                                            <input type="text" name="local" class="form-control"
                                                placeholder="local de dano">
                                        </div>
                                        <div class="mb-2">
                                            <select class="form-control" name="tipo_dano">
                                                <option disabled selected> -Selecione o tipo de dano- </option>
                                                @foreach ($tipo_dano as $dano)
                                                    <option value="{{ $dano->id }}">{{ $dano->nome }}</option>
                                                @endforeach

                                            </select>
                                        </div>


                                        <div class="checkbox mb-2">
                                            <div class="mt-2 form-check form-switch">
                                                <input class="form-check-input form-check-info"
                                                    onclick=" toggle('frontal')" id="infoSwitch" name="chfrontl" type="checkbox"
                                                    check="">
                                                <label class="form-check-label" for="infoSwitch">Parte frontal / Front
                                                    End</label>
                                            </div>
                                        </div>

                                        <div style="display: none;" id="frontal">

                                            <div class="mb-2">
                                                <textarea class="form-control" name="descricao_frontal" placeholder="Descricao" id="exampleFormControlTextarea1"
                                                    rows="3"></textarea>
                                            </div>

                                            <input type="file" accept="image/*;capture=camera" name="foto_frontal" class="form-control">
                                        </div>

                                        <div class="checkbox mb-2">
                                            <label class="checkbox">
                                                <div class="mt-2 form-check form-switch">
                                                    <input class="form-check-input form-check-info"
                                                        onclick=" toggle('porta')" id="infoSwitch" name="porta" type="checkbox"
                                                        check="">
                                                    <label class="form-check-label" for="infoSwitch">Portas / Doors</label>
                                                </div>
                                            </label>

                                            <div style="display: none;" id="porta">

                                                <div class="mb-2">
                                                    <textarea class="form-control" name="descricao_porta" placeholder="Descricao" id="exampleFormControlTextarea1"
                                                        rows="3"></textarea>
                                                </div>
                                                <input type="file" accept="image/*;capture=camera" name="foto_porta" class="form-control">
                                            </div>
                                        </div>
                                        <div class="checkbox mb-2">
                                            <div class="mb-2 form-check form-switch">
                                                <input class="form-check-input form-check-info"
                                                    onclick=" toggle('base')" id="infoSwitch" name="base" type="checkbox"
                                                    check="">
                                                <label class="form-check-label" for="infoSwitch">Base Anterior / Bottom</label>
                                            </div>

                                            <div style="display: none;" id="base">
                                                <div class="mb-2">
                                                    <textarea class="form-control" name="descricao_base" placeholder="Descricao" id="exampleFormControlTextarea1"
                                                        rows="3"></textarea>
                                                </div>
                                                <input type="file" accept="image/*;capture=camera" name="foto_base" class="form-control">
                                            </div>

                                        </div>
                                        {{-- secctiom --}}
                                        <div class="mt-2 form-check form-switch">
                                            <input class="form-check-input form-check-info" name="top" onclick=" toggle('top')"
                                                id="infoSwitch" type="checkbox" check="">
                                            <label class="form-check-label" for="infoSwitch">Topo / Top</label>
                                        </div>


                                        <div style="display: none" class="mb-2" id="top">

                                            <div class="mb-2">
                                                <textarea class="form-control" name="descricao_topo" placeholder="Descricao" id="exampleFormControlTextarea1"
                                                    rows="3"></textarea>
                                            </div>
                                            <input type="file" accept="image/*;capture=camera" name="foto_topo" class="form-control">
                                        </div>
                                        {{-- secctiom --}}
                                        {{-- secctiom --}}
                                        <div class="mt-2 form-check form-switch">
                                            <input class="form-check-input form-check-info"
                                                onclick=" toggle('esquerdo')" id="infoSwitch" name="esquerdo" type="checkbox"
                                                check="">
                                            <label class="form-check-label" for="infoSwitch">Lado esquerdo / Left Side</label>
                                        </div>

                                        <div style="display: none" class="mb-2" id="esquerdo">

                                            <div class="mb-2">
                                                <textarea class="form-control" name="descricao_esquerdo" placeholder="Descricao" id="exampleFormControlTextarea1"
                                                    rows="3"></textarea>
                                            </div>
                                            <input type="file" accept="image/*;capture=camera" name="foto_esquerdo" class="form-control">
                                        </div>
                                        {{-- secctiom --}}
                                        {{-- secctiom --}}
                                        <div class="mt-2 form-check form-switch">
                                            <input class="form-check-input form-check-info"
                                                onclick=" toggle('direito')" id="infoSwitch" name="direito" type="checkbox"
                                                check="">
                                            <label class="form-check-label" for="infoSwitch">Lado Direito / Right Side</label>
                                        </div>

                                        <div style="display: none" class="mb-2" id="direito">
                                            <div class="mb-2">
                                                <textarea class="form-control" name="descricao_direito" placeholder="Descricao" id="exampleFormControlTextarea1"
                                                    rows="3"></textarea>
                                            </div>
                                            <input type="file" accept="image/*;capture=camera" name="foto_direito" class="form-control">
                                        </div>
                                        {{-- secctiom --}}
                                        <div class="mt-2">
                                            <textarea class="form-control" name="motivo_dano" placeholder="Motivos do dano" id="exampleFormControlTextarea1"
                                                rows="2"></textarea>
                                        </div>

                                        <div class="mt-2">
                                            <select class="form-control" name="ambiente" id="">
                                                <option disabled selected>==Selecione o Ambiente==</option>
                                                <option value="Dia Normal">Dia Normal</option>
                                                <option value="Dia Chuvoso">Dia Chuvoso</option>
                                            </select>
                                        </div>

                                        <h6 class=" mb-2 mt-2">Momentos da danificação</h6>


                                        <div class="radio square-radio mt-2">
                                            <label class="radio-label">Embarque / Loading
                                                <input type="radio" check="check" value="1" name="momento">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-label">Descarga / Discharge
                                                <input type="radio" name="momento" value="1">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-label">Antes do Embarque / Before Loading
                                                <input type="radio" name="momento" value="1">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-label">Depois da Descarga / After Discharge
                                                <input type="radio" name="momento" value="1">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <h6 class=" mb-2 mt-2">Ouve Lesões</h6>
                                        <div class="alinha">
                                            <label class="radio-label">Nao
                                                <input type="radio" checked name="lesao"
                                                    onclick=" toggle('lesao')">
                                                <span class="checkmark"></span>
                                            </label>

                                            <label class="radio-label">Sim
                                                <input type="radio" check="check" onclick=" toggle('lesao')"
                                                    name="lesao">
                                                <span class="checkmark"></span>
                                            </label>

                                        </div>

                                        <div style="display: none" class="mb-2" id="lesao">
                                            <div class="mt-2">
                                                <textarea class="form-control" name="descricao_lesao" placeholder="Descreve as Leções "
                                                    id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                            <input type="file" accept="image/*;capture=camera" name="foto_lesao" class="form-control mt-2"
                                                placeholder="Fotos das lesoes">
                                        </div>

                                        <hr>
                                        <h6 class=" mb-2 mt-2">Proprietario da carga</h6>
                                        <div class="mb-2">
                                            <select class="form-control" name="empresas">
                                                <option disabled selected> -Selecione a empresa - </option>
                                                @foreach ($empresas as $empresa)
                                                    <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="mt-2">
                                            <textarea class="form-control" name="descricao" placeholder="Observacoes" id="exampleFormControlTextarea1"
                                                rows="3"></textarea>
                                        </div>


                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Fechar
                            Modal</button>
                        <button type="submit" class="btn btn-sm btn-primary">Reportar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Modal --}}

        <!-- Page Content Start -->
        <div class="page-content space-top">
            <div class="container p-0">
                <div class="dz-tab style-1 tab-fixed">
                    <div class="tab-slide-effect">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="tab-active-indicator" style="width: 90.7188px; transform: translateX(0px);">
                            </li>
                            <li class="nav-item active" role="presentation">
                                <button class="nav-link active" id="home-tab2" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane2" type="button" role="tab"
                                    aria-controls="home-tab-pane2" aria-selected="true">Todos Danos</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab2" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane2" type="button" role="tab"
                                    aria-controls="profile-tab-pane2" aria-selected="false">Danos Com lesões</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab2" data-bs-toggle="tab"
                                    data-bs-target="#contact-tab-pane2" type="button" role="tab"
                                    aria-controls="contact-tab-pane2" aria-selected="false">Danos Sem lesões</button>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
							<button class="nav-link" id="order-tab2" data-bs-toggle="tab" data-bs-target="#order-tab-pane2" type="button" role="tab" aria-controls="order-tab-pane2" aria-selected="false">Completed</button>
						</li> --}}
                        </ul>
                    </div>

                    @if (session('status'))
                   <div class="aler alert-success">
                       {{session('status')}}
                   </div>
                @endif
             
                    <div class="pt-0 tab-content" id="myTabContent2">
                        <div class="tab-pane fade active show" id="home-tab-pane2" role="tabpanel"
                        aria-labelledby="home-tab2" tabindex="0">
                        <div class="row">
                        @foreach ($danos as $dano)
                            <div class="col-12">
                                
                                <div class="dz-order">
                                    <div class="order-info">

                                       
                                        <div class="pe-3">
                                            <span class="productId"></span>Data: {{$dano->data}}</span> <br>
                                            <span class="productId"></span>Numero de Contentor: {{$dano->contentor->nr_contentor}}</span>
                                            <h6 class="title"><a href="product-detail.html">Tipo de Dano: {{$dano->tipo->nome}}</a></h6>

                                        </div>
                                        <div class="media media-70">
                                            <img src="/fotos/MEDU5813768.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="order-detail">
                                        <span>Transportadora: {{$dano->empresa->nome}}</span>
                                        
                                    </div>
                                    <div class="status">
                                        <a href="javascript:void(0);"
                                            class="badge badge-lg badge-outline-success me-4">
                                            <i class="fa-solid fa-circle"></i>
                                            <span>Verificado</span>
                                        </a>
                                        <p class="mb-0 description">Estado de Embarque:</p>
                                    </div>
                                </div>
                                
                            </div>

                      
                        @endforeach
                    </div>
                </div>
                        <div class="tab-pane fade" id="profile-tab-pane2" role="tabpanel"
                            aria-labelledby="profile-tab2" tabindex="0">
                            <div class="row">
                                @foreach ($danos_lesoes as $dano)
                               <div class="col-12">
                                
                                <div class="dz-order">
                                    <div class="order-info">

                                       
                                        <div class="pe-3">
                                            <span class="productId"></span>Data: {{$dano->data}}</span> <br>
                                            <span class="productId"></span>Numero de Contentor: {{$dano->dano->contentor->nr_contentor}}</span>
                                            <h6 class="title"><a href="product-detail.html">Tipo de Dano: {{$dano->dano->tipo->nome}}</a></h6>

                                        </div>
                                        <div class="media media-70">
                                            <img src="/fotos/MEDU5813768.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="order-detail">
                                        <span>Transportadora: {{$dano->dano->empresa->nome}}</span>
                                        
                                    </div>
                                    <div class="status">
                                        <a href="javascript:void(0);"
                                            class="badge badge-lg badge-outline-success me-4">
                                            <i class="fa-solid fa-circle"></i>
                                            <span>Verificado</span>
                                        </a >
                                        <p class="mb-0 description">Estado de Embarque:</p>
                                    </div>
                                        <a href="javascript:void(0);"
                                            class="badge badge-lg badge-outline-danger me-4">
                                            <span>Ver Lesoes</span>
                                        </a >
                                        
                                </div>
                                
                            </div>
                            
                            @endforeach
                                </div>
                            </div>


                        <div class="tab-pane fade" id="contact-tab-pane2" role="tabpanel"
                            aria-labelledby="contact-tab2" tabindex="0">
                            

                            <div class="row">
                               @foreach ($danos_sem_lesoes as $dano)
                               <div class="col-12">
                                
                                <div class="dz-order">
                                    <div class="order-info">

                                       
                                        <div class="pe-3">
                                            <span class="productId"></span>Data: {{$dano->data}}</span> <br>
                                            <span class="productId"></span>Numero de Contentor: {{$dano->contentor->nr_contentor}}</span>
                                            <h6 class="title"><a href="product-detail.html">Tipo de Dano: {{$dano->tipo->nome}}</a></h6>

                                        </div>
                                        <div class="media media-70">
                                            <img src="/fotos/MEDU5813768.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="order-detail">
                                        <span>Transportadora: {{$dano->empresa->nome}}</span>
                                        
                                    </div>
                                    <div class="status">
                                        <a href="javascript:void(0);"
                                            class="badge badge-lg badge-outline-success me-4">
                                            <i class="fa-solid fa-circle"></i>
                                            <span>Verificado</span>
                                        </a >
                                        <p class="mb-0 description">Estado de Embarque:</p>
                                    </div>
                                        
                                        
                                </div>
                                
                            </div>
                            
                            @endforeach
                                </div>

                            </div>



                    </div>
                </div>
            </div>
        </div>
        <!-- Page Content End -->

        <!-- Menubar -->
	<div class="menubar-area footer-fixed rounded-0 border-top">
		<div class="toolbar-inner menubar-nav">
			<a href="estiva" class="nav-link active">
				<i class="icon feather icon-home"></i>
				<span>Home</span>
			</a>
			<a href="cl" class="nav-link">
				<i class="icon  i"></i>
				{{-- <span>Categories</span> --}}
			</a>
			<a href="w" class="nav-link ">
				<i class="icon feather icon-heajjrt"></i>
				{{-- <span>Wishlist</span> --}}
			</a>
			<a href="/logout" class="nav-link">
				<i class="icon feather icon-user"></i>
				<span>Profile</span>
			</a>
		</div>
	</div>
	<!-- Menubar -->
    </div>
    <script>
        function toggle(disable) {

            var x = document.getElementById(disable);
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>

@if (session('status'))
           
<script>
    Swal(
    'Good job!',
    'Tados Salvos',
    'success'
)
</script>

@endif
    <script src="mobile/js/jquery.js"></script>
    <script src="mobile/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="mobile/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
    <script src="mobile/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script><!-- Swiper -->
    <script src="mobile/js/dz.carousel.js"></script><!-- Swiper -->
    <script src="mobile/js/settings.js"></script>
    <script src="mobile/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

<!-- Mirrored from wedo.w3itexpert.com/xhtml/order.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2023 10:42:25 GMT -->

</html>
