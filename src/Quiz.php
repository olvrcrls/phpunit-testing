<?php
namespace App;

class Quiz
{
    protected array $questions;

    protected $currentQuestion = 1;
    
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
        if (! isset($this->questions[$this->currentQuestion - 1])) {
            return false;
        }

        $question = $this->questions[$this->currentQuestion - 1];
        $this->currentQuestion++;
        return $question;
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

        $correct = count($this->correctlyAnsweredQuestions());

        $total = count($this->questions);

        return ($correct / $total) * 100;
    }

    public function isComplete() 
    {
        $answeredQuestions = count(array_filter($this->questions, fn($question) => $question->answered()));
        $totalQuestions = count($this->questions);

        return $answeredQuestions == $totalQuestions;
    }

    public function isAllQuestionsAnswered()
    {
        $total_questions = count($this->questions);
        $answered_questions = array_filter($this->questions, fn ($question) => !is_null($question->answer()));

        return $total_questions == count($answered_questions);
    }

    protected function correctlyAnsweredQuestions()
    {
        // return array_filter($this->questions, function ($question) {
        //     return $question->solved();
        // });

        return array_filter($this->questions, fn($question) => $question->solved());
    }
}