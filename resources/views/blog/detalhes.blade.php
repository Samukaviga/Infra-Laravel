<x-layout>


<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">			
                    <div class="row justify-content-center">			
                        <div class="col-lg-10 col-xl-9">			
                    
                            <!-- Blog Details-->
                            <div class="blog-view">
                                <div class="blog-single-post">
                                    <a href="/blog" class="back-btn"><i class="feather-chevron-left"></i> Back</a>
                                    <div class="blog-image">
                                        <a href="javascript:void(0);"><img alt="img" src="{{ $blog->imagem ? asset('storage/' . $blog->imagem) : asset("assets/img/category/blog-detail.jpg") }}" class="img-fluid"></a>
                                    </div>
                                    <h3 class="blog-title">{{ $blog->titulo }}</h3>
                                    <div class="blog-info">
                                        <div class="post-list">
                                            <ul>
                                                <li>
                                                    <div class="post-author">
                                                        <a href="profile.html"><img src="{{ $blog->user->imagem ? asset('storage/' . $blog->user->imagem) : asset("assets/img/profiles/avatar-14.jpg") }}" alt="Post Author"> <span>{{ $blog->user->name }}</span></a>
                                                    </div>
                                                </li>
                                                <li><i class="feather-clock"></i> {{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d \d\e F, Y') }}</li>
                                                <!-- <li><i class="feather-message-square"></i> 40 Comments</li> -->
                                                <!-- <li><i class="feather-grid"></i> Set Theory, Mathematician</li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <p>{{ $blog->descricao }}</p>
                                    </div>
                                </div>
                                
                        
                            </div>
                        </div>
                    </div>
                    <!-- /Blog Details-->


</x-layout>