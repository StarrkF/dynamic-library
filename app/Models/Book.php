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

    protected $with = ['type:id,name', 'user:id,name,email'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getListTypeAttribute()
    {
        return  collect(config('constant.books.list_types'))->where('id', $this->list_type_id)->first();
    }

    public function getStatusModelAttribute()
    {
        return  collect(config('constant.books.status'))->where('id', $this->status)->first();
    }

    public function getInLibraryModelAttribute()
    {
        return  collect(config('constant.books.in_libray'))->where('id', $this->in_library)->first();
    }

    public function setAuthorSlugAttribute()
    {
        $this->attributes['author_slug'] = Str::slug($this->author);
    }

    // public function type()
    // {
    //     return $this->belongsTo(Type::class);
    // }

    // public function getStatusNameAttribute()
    // {
    //     return $this->status ? config('constant.books.status.' . $this->status) : 'Seçilmemiş';
    // }

    // public function getListTypeNameAttribute()
    // {
    //     return $this->list_type_id ? config('constant.books.list_types.' . $this->list_type_id) : 'Seçilmemiş';
    // }

    // public function getInLibraryNameAttribute()
    // {
    //     return in_array($this->in_library, [0, 1]) ? config('constant.books.in_libray.' . $this->in_library) : 'Seçilmemiş';
    // }

    // public function setAuthorSlugAttribute()
    // {
    //     $this->attributes['author_slug'] = Str::slug($this->author);
    // }

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
