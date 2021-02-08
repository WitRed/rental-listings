@extends('layouts.app')

@section('head')
@parent
<link rel="stylesheet" type="text/css" href="{{asset('trix/trix.css')}}">
<script type="text/javascript" src="{{asset('trix/trix.js')}}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Yeni Kiralık İlanı Ekle</div>

                <div class="card-body">
                    <form method="post" action="{{ route('listings.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="inpTitle">İlan Başlığı</label>
                            <input required name="title" type="text" class="form-control" id="inpTitle" placeholder="Merkezi Konumda Kelepir">
                        </div>
                        <div class="form-group">
                            <label for="inpPrice">Aylık Kira Tutarı (TL)</label>
                            <input required name="price" type="text" class="form-control" id="inpPrice" placeholder="750">
                        </div>
                        <div class="form-group">
                            <label for="inpdues">Aidat (TL)</label>
                            <input name="dues" type="text" class="form-control" id="inpdues" placeholder="50">
                        </div>
                        <div class="form-group">
                            <label for="inpdeposit">Depozito (TL)</label>
                            <input name="deposit" type="text" class="form-control" id="inpdeposit" placeholder="1500">
                        </div>
                        <div class="form-group">
                            <label for="slcCategory">Kategori</label>
                            <select required name="category" class="form-control" id="slcCategory">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slcCity">Şehir</label>
                            <select required name="city_id" class="form-control" id="slcCity">
                                @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inpGrossArea">m² (Brüt)</label>
                            <input name="gross_area" type="number" class="form-control" id="inpGrossArea" placeholder="200" required>
                        </div>
                        <div class="form-group">
                            <label for="inpNetArea">m² (Net)</label>
                            <input name="net_area" type="number" class="form-control" id="inpNetArea" placeholder="170" required>
                        </div>
                        <div class="form-group">
                            <label for="slcType">Tipi</label>
                            <select name="type" class="form-control" id="slcType">
                                @foreach(config('listings.types') as $type)
                                <option>{{$type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slcRoomCount">Oda Sayısı</label>
                            <select name="room_count" class="form-control" id="slcRoomCount">
                                @foreach(config('listings.room_counts') as $roomCount)
                                <option>{{$roomCount}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slcfloor_of_apartment">Bulunduğu Kat</label>
                            <select name="floor_of_apartment" class="form-control" id="slcfloor_of_apartment">
                                @foreach(config('listings.floor_of_apartment') as $floor_of_apartment)
                                <option>{{$floor_of_apartment}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slcfloor_count_of_building">Bina Kat Sayısı</label>
                            <select name="floor_count_of_building" class="form-control" id="slcfloor_count_of_building">
                                @foreach(config('listings.floor_count_of_building') as $floor_count_of_building)
                                <option>{{$floor_count_of_building}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slcbuilding_age">Bina Yaşı</label>
                            <select name="building_age" class="form-control" id="slcbuilding_age">
                                @foreach(config('listings.building_age') as $building_age)
                                <option>{{$building_age}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slcheating">Isıtma Tipi</label>
                            <select name="heating" class="form-control" id="slcheating">
                                @foreach(config('listings.heating') as $heating)
                                <option>{{$heating}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slcbathroom_count">Banyo Sayısı</label>
                            <select name="bathroom_count" class="form-control" id="slcbathroom_count">
                                @foreach(config('listings.bathroom_count') as $bathroom_count)
                                <option>{{$bathroom_count}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slccurrent_state">Kullanım Durumu</label>
                            <select name="current_state" class="form-control" id="slccurrent_state">
                                @foreach(config('listings.current_state') as $current_state)
                                <option>{{$current_state}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slcfrom_who">Kimden</label>
                            <select name="from_who" class="form-control" id="slcfrom_who">
                                @foreach(config('listings.from_who') as $from_who)
                                <option>{{$from_who}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slcbalcony">Balkon</label>
                            <select name="balcony" class="form-control" id="slcbalcony">
                                <option value="1">Var</option>
                                <option value="0">Yok</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slcis_furnished">Eşyalı mı?</label>
                            <select name="is_furnished" class="form-control" id="slcis_furnished">
                                <option value="1">Evet</option>
                                <option value="0">Hayır</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slcis_in_site">Site içinde mi?</label>
                            <select name="is_in_site" class="form-control" id="slcis_in_site">
                                <option value="1">Evet</option>
                                <option value="0">Hayır</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <input id="description" type="hidden" name="description">
                            <trix-editor input="description"></trix-editor>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">İlan Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection