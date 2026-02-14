<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Artikel
 *
 * @property int $id_artikel
 * @property string $judul
 * @property string $isi
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereIdArtikel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereIsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Artikel extends Model
{
    use HasFactory;
    public $table = "artikel",
        $fillable = ["judul", "isi", "image"];
}
