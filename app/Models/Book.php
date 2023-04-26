<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function getStatusAttribute($value)
    {
        return $value ? config('constant.books.status.' . --$value . '.name') : 'Seçilmemiş';
    }

    public function getListTypeAttribute()
    {
        return config('constant.books.list_types.' . --$this->list_type_id . '.name');
    }

    public function getInLibraryAttribute($value)
    {
        return $value ? 'Evet' : 'Hayır';
    }

    public function setAuthorSlugAttribute()
    {
        $this->attributes['author_slug'] = Str::slug($this->author);
    }

    public function scopeFilter($query)
    {

        $query->when(request('byType'), function ($q) {
            $q->where('type_id', request('byType'));
        })
            ->when(request('byStatus'), function ($q) {

                $q->where('status', request('byStatus'));
            })
            ->when(request('byListType'), function ($q) {
                $q->where('list_type_id', request('byListType'));
            })
            ->when(request('byLibrary'), function ($q) {
                $q->where('in_library', request('byLibrary'));
            })
            ->when(request('search'), function ($q) {
                $q->where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('author', 'like', '%' . request('search') . '%');
            });
    }

    public function scopeDraw($query, $types)
    {
        $list_type = Arr::random(config('constant.books.list_types'))['id'];
        $status =  Arr::random(config('constant.books.status'))['id'];
        $ibrary =  Arr::random([1, 0]);
        $query->when(str_contains($types, 'check_type'), function ($q) {
            $q->where('type_id', Type::inRandomOrder()->pluck('id')->first());
        })
        ->when(str_contains($types, 'check_listtype'), function ($q) use ($list_type) {
            $q->where('list_type_id', $list_type);
        })
        ->when(str_contains($types, 'check_status'), function ($q) use ($status) {
            $q->where('status', $status);
        })
        ->when(str_contains($types, 'check_library'), function ($q) use ($ibrary){
            $q->where('in_library',$ibrary);
        });
    }
}
