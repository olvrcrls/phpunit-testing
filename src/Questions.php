<?php
namespace App;

class Questions
{
    protected array $questions;

    public function __construct(array $questions = [])
    {
        $this->questions = $questions;
    }

    public function add(Question $question)
    {
        $this->questions[] = $question;
    }
}