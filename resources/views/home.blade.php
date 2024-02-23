@extends('layouts.public.public')

@section('content')
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                   
                    

                    <div class="row">
                        @foreach ($articlesPaginated as $article)
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <a href="{{ $article['url'] }}"><img class="card-img-top" src="{{ $article['urlToImage'] }}" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{{ $article['publishedAt'] }}</div>
                                    <h2 class="card-title h4">{{ $article['title'] }}</h2>
                                    <p class="card-text">{{ $article['description'] }}</p>
                                    <div class="d-flex align-items-center my-3">
                                        <img class="author-image rounded-circle me-3" src="{{ $article['author']['picture'] }}" alt="Author Image">
                                        <p class="text-muted m-0">Author: {{ $article['author']['name'] }}</p>
                                    </div>
                                    <a class="btn btn-primary" href="{{ $article['url'] }}">Read more →</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      </div>

                
                   <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            @if ($articlesPaginated->onFirstPage())
                                <li class="page-item disabled" aria-disabled="true">
                                    <span class="page-link" aria-hidden="true">Más nuevo</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $articlesPaginated->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Más nuevo</a>
                                </li>
                            @endif
                    
                            {!! $articlesPaginated->render() !!} 
                    
                            @if ($articlesPaginated->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $articlesPaginated->nextPageUrl() }}">Más viejo
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled" aria-disabled="true">
                                    <span class="page-link">Más viejo
                                    </span>
                                </li>
                            @endif
                        </ul>
                    </nav> 


                    
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
@endsection

       