<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\User;

class Article extends Model
{
    use Searchable;

    public function isPublished()
    {
        return $this->status == "published";
    }

    public function shouldBeSearchable()
    {
        return $this->isPublished();
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $record = $this->toArray();

        if ($record['anonymous']) {
            $record['user'] = "Anonyme";
        } else {
            $record['user'] = User::find($record['user_id'])->username;
        }

        $date = explode('-', substr($record['created_at'], 0, 10));
        $url = url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $record['slug'];

        $record['url'] = $url;
        $record['date'] = $date[2].'/'.$date[1].'/'.$date[0];

        unset($record['id'], $record['user_id'], $record['category_id'], $record['issue_id'], $record['image'], $record['status'], $record['anonymous'], $record['created_at'], $record['updated_at']);

        return $record;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'slug',
    ];

    public function user() 
    {
        return $this->belongsTo('App\User');
    }

    public function category() 
    {
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function issue()
    {
        return $this->belongsTo('App\Issue');
    }
}
