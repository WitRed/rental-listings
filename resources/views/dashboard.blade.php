@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Üye Alanı</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-info" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>Toplam {{ Auth::user()->listings()->count() }} ilanınız var.</p>

                    @if(Auth::user()->listings()->approved()->count()>0)
                    <div class="alert alert-success" role="alert">
                        İlanlarınızın {{ Auth::user()->listings()->approved()->count() }} tanesi onaylanmış ve yayında.
                    </div>
                    @endif

                    @if(Auth::user()->listings()->denied()->count()>0)
                    <div class="alert alert-danger" role="alert">
                        İlanlarınızın {{ Auth::user()->listings()->denied()->count() }} tanesi reddedilmiş.
                    </div>
                    @endif

                    @if(Auth::user()->listings()->waiting()->count()>0)
                    <div class="alert alert-warning" role="alert">
                        İlanlarınızın {{ Auth::user()->listings()->waiting()->count() }} tanesi işlem bekliyor.
                    </div>
                    @endif

                    <a href="{{route('listings.create')}}" class="btn btn-primary">Yeni İlan Ekle</a>
                    <hr>
                    <h2>İlanlarınız</h2>
                    <div class="list-group">
                        @foreach(Auth::user()->listings as $listing)
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" aria-current="true">
                            {{$listing->title}}
                            <span class="badge badge-{{$listing->statusClass}} badge-pill">{{$listing->status}}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection