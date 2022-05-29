<?php
namespace App;

class Quiz
{
    protected Questions $questions;

    protected $currentQuestion = 1;

    public function __construct()
    {
        $this->questions = new Questions;
    }
    
    public function addQuestion(Question $question)
    {
        $this->questions->add($question);
        // $this->questions[] = $question;
    }

    public function questions()
    {
        return $this->questions;
    }

    public function nextQuestion()
    {
        return $this->questions->next();
        // if (! isset($this->questions[$this->currentQuestion - 1])) {
        //     return false;
        // }

        // $question = $this->questions[$this->currentQuestion - 1];
        // $this->currentQuestion++;
        // return $question;
    }

    public function currentQuestion()
    {
        if (! isset($this->questions[$this->currentQuestion - 1])) {
            return false;
        }

        return $this->questions[$this->currentQuestion - 1];
    }

    public function previousQuestion()
    {
        if (! isset($this->questions[$this->currentQuestion - 1])) {
            return false;
        }

        $question = $this->questions[$this->currentQuestion - 1];
        $this->currentQuestion--;
        return $question;
    }

    public function grade()
    {
        // if the quiz is not yet completed, throw exception.

        if (! $this->isComplete()) {
            throw new \Exception("This quiz has not yet completed.");
        }

        // $correct = count($this->correctlyAnsweredQuestions());

        $correct = count($this->questions->solved());

        $total = count($this->questions);

        return ($correct / $total) * 100;
    }

    public function isComplete() 
    {
        $answeredQuestions = count($this->questions->answered());

        // $answeredQuestions = count(array_filter($this->questions, fn($question) => $question->answered()));
        // $totalQuestions = count($this->questions);

        // return count($this->questions->answered()) == $this->questions->count();
        return $answeredQuestions == $this->questions->count();
    }

    // protected function correctlyAnsweredQuestions()
    // {
        // return array_filter($this->questions, function ($question) {
        //     return $question->solved();
        // });

    //     return array_filter($this->questions, fn($question) => $question->solved());
    // }
}