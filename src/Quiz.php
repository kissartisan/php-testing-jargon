<?php

namespace App;

class Quiz
{
    protected Questions $questions;

    protected $currentQuestion = 1;

    public function __construct()
    {
        $this->questions = new Questions();
    }

    public function addQuestion(Question $question)
    {
        $this->questions->add($question);
    }

    public function nextQuestion()
    {
        return $this->questions->next();
    }

    public function questions()
    {
        return $this->questions;
    }

    public function isComplete()
    {
        $answeredQuestions = count($this->questions->answered());
        $totalQuestions = $this->questions->count();

        return $answeredQuestions === $totalQuestions;
    }

    public function grade()
    {
        // If the quiz has not yet been completed
        // Throw an exception
        if (!$this->isComplete()) {
            throw new \Exception("This quiz has not yet been completed.");
        }

        $correct = count($this->questions->solved());

        return $correct / count($this->questions) * 100;
    }
}