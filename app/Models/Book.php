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

    public function getStatusNameAttribute()
    {
        return $this->status ? config('constant.books.status.' . $this->status) : 'Seçilmemiş';
    }

    public function getListTypeNameAttribute()
    {
        return $this->list_type_id ? config('constant.books.list_types.' . $this->list_type_id) : 'Seçilmemiş';
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
        ->when(request()->has('byLibrary'), function ($q) {
            $q->where('in_library', request('byLibrary'));
        })
        ->when(request('search'), function ($q) {
            $q->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('author', 'like', '%' . request('search') . '%');
        });
    }
}
