<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $value ? config('constant.books.status.' . $value . '.name') : 'Seçilmemiş';
    }

    public function getListTypeAttribute()
    {
        return config('constant.books.list_types.' . --$this->list_type_id . '.name');
    }

    public function getInLibraryAttribute($value)
    {
        return $value ? 'Evet' : 'Hayır';
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
}
