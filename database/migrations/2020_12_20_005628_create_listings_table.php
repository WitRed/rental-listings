<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class);
            $table->string("title");
            $table->float("price");
            $table->foreignIdFor(\App\Models\Category::class);
            $table->foreignIdFor(\Epigra\TrGeoZones\Models\Country::class, "country_id");
            $table->foreignIdFor(\Epigra\TrGeoZones\Models\City::class, "city_id");
            $table->foreignIdFor(\Epigra\TrGeoZones\Models\CityDistrict::class, "district_id")->nullable();
            $table->string("type")->nullable()->index();
            $table->integer("gross_area")->nullable();
            $table->integer("net_area")->nullable();
            $table->string("room_count")->nullable()->index();
            $table->string("building_age")->nullable()->index();
            $table->string("floor_count_of_building")->nullable()->index();
            $table->string("floor_of_apartment")->nullable()->index();
            $table->string("heating")->nullable()->index();
            $table->string("bathroom_count")->nullable()->index();
            $table->boolean("balcony")->default(false)->index();
            $table->boolean("is_furnished")->nullable()->index();
            $table->string("current_state")->nullable()->index();
            $table->boolean("is_in_site")->default(false)->index();
            $table->float("dues")->nullable();
            $table->float("deposit")->nullable();
            $table->string("from_who")->nullable()->index();
            $table->longText("description")->nullable();
            $table->boolean("is_approved")->nullable()->default(null);
            $table->date("approved_at")->nullable();
            $table->foreignIdFor(\App\Models\User::class, "approved_by")->nullable();
            $table->string("control_message")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
