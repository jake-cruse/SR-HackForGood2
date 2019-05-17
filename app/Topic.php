<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function voters()
    {
        return $this->hasMany("App\User");   
    }

    public function getVotes()
    {
    	return $this->voters->count();
    }

    public function getPercentageVotes()
    {
    	$votesFor = $this->getVotes();

    	$other_topics = Topic::where('id', '!=', $this->id)->get();
    	$votesAgainst = 0;
    	foreach ($other_topics as $topic) {
    		$votesAgainst = $votesAgainst + $topic->getVotes();
    	}

    	$percentage = round(($votesFor / ($votesFor + $votesAgainst)) * 100);

    	return $percentage;
    }
}
