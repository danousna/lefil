<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function buildCommentsTree(array $elements, $parentId = 0)
    {
        $branch = array();

        foreach ($elements as $element) {
            if ($element['reply_comment_id'] == $parentId) {
                $children = $this->buildCommentsTree($elements, $element['id']);
                $element['username'] =  User::find($element['user_id'])->username;
                if ($children) {
                    $element['children'] = $children;
                } else {
                    $element['children'] = array();
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }
}
