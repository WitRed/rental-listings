<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "price",
        "country_id",
        "city_id",
        "district_id",
        "type",
        "gross_area",
        "net_area",
        "room_count",
        "building_age",
        "floor_count_of_building",
        "floor_of_apartment",
        "heating",
        "bathroom_count",
        "balcony",
        "is_furnished",
        "current_state",
        "is_in_site",
        "dues",
        "deposit",
        "from_who",
        "description",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopeDenied($query)
    {
        return $query->where('is_approved', false)->whereNotNull("control_message");
    }

    public function scopeWaiting($query)
    {
        return $query->whereNull('is_approved')->whereNull("control_message");
    }

    public function getStatusAttribute()
    {
        if ($this->is_approved === true) return "Onaylandı";

        if ($this->is_approved === false && $this->control_message !== null) return "Reddedildi";

        return "İşlem Bekliyor";
    }

    public function getStatusClassAttribute()
    {
        if ($this->is_approved === true) return "success";

        if ($this->is_approved === false && $this->control_message !== null) return "danger";

        return "warning";
    }
}
