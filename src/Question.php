<?php
namespace App;

class Question
{
    protected $body;
    protected $solution;
    protected $answer;
    protected $correct;

    public function __construct($body, $solution)
    {
        $this->body = $body;
        $this->solution = $solution;
    }

    public function answer($answer)
    {
        $this->answer = $answer;
        $this->correct = $answer == $this->solution;

        return $this->answer;
    }

    public function solved() // $question->solved()
    {
        return $this->correct;
    }

    public function answered() 
    {
        return isset($this->answer);
    }
}