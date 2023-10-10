<?php

namespace App\Models\Blog;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Tags\HasTags;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable; 
use App\Models\PostTranslation;


class Post extends Model implements TranslatableContract
{
    use HasFactory;
    use HasTags;
    use Translatable;

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['title','content'];

    protected $fillable = ['name'];
    /**
     * @var string
     */
    protected $table = 'blog_posts';

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'blog_author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'blog_category_id');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}





    //    // Scope para obtener los posts traducidos al español
    //    public function scopeTranslatedInSpanish($query)
    //    {
    //        return $query->whereTranslation('locale', 'es');
    //    }

