<?php

namespace Story\Core\Models\Translatable;

use App;
use Story\Core\Model;
use Story\Cms\Models\Post;
use Story\Cms\Models\Observers\PostTranslationObserver;
use Illuminate\Support\Str;

class PostTranslation extends Model
{
    public $timestamps = false;

    protected $table    = 'trans_posts';
    protected $fillable = ['slug', 'title', 'excerpt','body', 'meta_title', 'meta_description', 'meta_keyword'];
    protected $appends = ['image_thumbnail', 'summary', 'link'];

    /**
     * Bootstraping eloquent models to use custome observer
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        static::observe(new PostTranslationObserver);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get summary article atribute
     *
     * @return string
     */
    public function getSummaryAttribute()
    {
        $body = Removal::html($this->body);

        return Str::limit($body, 200);
    }

    /**
     * Get post link attribute
     *
     * @return string
     */
    public function getLinkAttribute()
    {
        if ($this->post->type == 'PAGE') {
            return '/'. $this->locale . '/' . $this->slug;
        } elseif ($this->post->type == 'POST') {
            return '/'. $this->locale . '/blogs/' . $this->slug;
        }
    }
}
