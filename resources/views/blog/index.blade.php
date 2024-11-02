<x-layout :mensagem-sucesso="$mensagemSucesso">

    	<!-- Page Wrapper -->
        <div class="page-wrapper">

                @if(session('mensagemSucesso'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        {{ session('mensagemSucesso') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="content container-fluid">
    

                    <!-- Blog List -->
                    <div class="row">
                        <div class="col-md-9">
                            <ul class="list-links mb-4">
                        
                            </ul>
                        </div>
                        <div class="col-md-3 text-md-end">
                            <a href="/blog/novo" class="btn btn-primary btn-blog mb-3" ><i class="feather-plus-circle me-1"></i> Add New</a>
                        </div>
                    </div>
                    
                    <div class="row">
                        
                        @foreach ($blogs as $blog )
                        
                        <!-- Blog Post -->
                        <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                            <div class="blog grid-blog flex-fill">
                                
                                <div class="blog-image">
                                    <a href="/blog/detalhes/{{ $blog->id }}"><img class="img-fluid" src="{{  $blog->imagem ? asset('storage/' . $blog->imagem) : asset('assets/img/category/blog-6.jpg') }}" alt="Post Image"></a>  
                                </div>

                                <div class="blog-content">
                                    <ul class="entry-meta meta-item">
                                        <li>
                                            <div class="post-author">
                                                <a href="#">
                                                    <img src="{{ $blog->user->imagem ? asset('storage/' . $blog->user->imagem) : asset('assets/img/profiles/avatar-01.jpg') }}" alt="Post Author"> 
                                                    <span>
                                                        <span class="post-title">{{ $blog->user->name }}</span>
                                                        <span class="post-date"><i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d \d\e F, Y') }}</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                    <h3 class="blog-title"><a href="blog-details.html">{{ $blog->titulo }}</a></h3>
                                    <p>{{ $blog->descricao }}</p>
                                </div>
                               
                                <div class="row">
                                    <div class="edit-options">
                                        <div class= "edit-delete-btn d-flex">
                                            <a href="/blog/editar" class="text-success text-center"  ><i class="feather-edit-3 me-1"></i>Editar</a>
                                            
                                            <!-- <a href="/" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="feather-trash-2 me-1"></i>Deletar</a> -->

                                            <form class="p-0 m-0" action="/blog/deletar/{{ $blog->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-danger btn btn-sm " data-bs-target="#deleteModal" id="type-error"><i class="feather-trash-2 me-1"></i>Excluir</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>										
                        </div>
                        <!-- /Blog Post -->

                        @endforeach
                         

                        
                    </div>

</x-layout>