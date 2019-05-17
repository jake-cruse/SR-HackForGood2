<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Classroom;

class Topic extends Model
{
    public function voters()
    {
        return $this->hasMany("App\User");   
    }

    public function getVotes(Classroom $classroom)
    {
    	return $this->voters()->where('class_id', $classroom->id)->count();
    }

    public function getPercentageVotes(Classroom $classroom)
    {
    	$votesFor = $this->getVotes($classroom);

    	$other_topics = Topic::where('id', '!=', $this->id)->get();
    	$votesAgainst = 0;
    	foreach ($other_topics as $topic) {
    		$votesAgainst = $votesAgainst + $topic->getVotes($classroom);
    	}

    	$percentage = round(($votesFor / ($votesFor + $votesAgainst)) * 100);

    	return $percentage;
    }
}
