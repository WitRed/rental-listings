@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Üye Alanı</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>Toplam {{ Auth::user()->listings()->count() }} ilanınız var.</p>
                    <a href="{{route('listings.create')}}" class="btn btn-primary">Yeni İlan Ekle</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection