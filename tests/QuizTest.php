<?php

namespace Tests;
use App\Question;
use App\Quiz;
use PHPUnit\Framework\TestCase;

class QuizTest extends TestCase
{
    /** @test */
    public function it_consists_of_questions()
    {
        $quiz = new Quiz();

        $quiz->addQuestion(new Question('What is 2 + 2?', 4));

        $this->assertCount(1, $quiz->questions());
    }

    /** @test */
    public function it_grades_a_perfect_quiz()
    {
        $quiz = new Quiz();

        $quiz->addQuestion(new Question('What is 2 + 2?', 4));

        // Take the quiz
        $question = $quiz->nextQuestion();

        $question->answer(4);

        // Grade the quiz
        $this->assertEquals(100, $quiz->grade());
    }

    /** @test */
    public function it_grades_a_failed_quiz()
    {
        $quiz = new Quiz();

        $quiz->addQuestion(new Question('What is 2 + 2?', 4));

        // Take the quiz
        $question = $quiz->nextQuestion();

        $question->answer('incorrect answer');

        // Grade the quiz
        $this->assertEquals(0, $quiz->grade());
    }

    // /** @test */
    // public function it_correctly_tracks_the_next_questions_in_the_queue()
    // {

    // }

    // /** @test */
    // public function it_cannot_be_graded_until_all_questions_have_been_answered()
    // {

    // }
}