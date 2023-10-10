<?php
namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Blog\Post;




class PostTranslation extends Model
{
    use HasFactory;

    protected $table = 'blog_post_translations';

    protected $fillable = ['title', 'content'];
    public $timestamps = false;
}
