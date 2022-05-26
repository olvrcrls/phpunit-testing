<?php
namespace App;

class Quiz
{
    protected array $questions;
    
    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;
    }

    public function questions()
    {
        return $this->questions;
    }

    public function nextQuestion()
    {
        return $this->questions[0]; // TODO: Fix this
    }

    public function grade()
    {
        $correct = count($this->correctlyAnsweredQuestions());

        $total = count($this->questions);

        return ($correct / $total) * 100;
    }

    protected function correctlyAnsweredQuestions()
    {
        // return array_filter($this->questions, function ($question) {
        //     return $question->solved();
        // });

        return array_filter($this->questions, fn($question) => $question->solved());
    }
}