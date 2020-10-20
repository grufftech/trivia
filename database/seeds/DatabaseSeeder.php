<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Jeopardy;
use App\Game;
use App\Team;
use App\Answer;
use App\Round;
use App\Question;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call('JeopardyTableSeeder');
      $this->command->info('Jeopardy table seeded!');

      $this->call('GamesTableSeeder');
      $this->command->info('Games table seeded!');

      $this->call('RoundsTableSeeder');
      $this->command->info('Rounds table seeded!');

      $this->call('QuestionsTableSeeder');
      $this->command->info('Question table seeded!');

      $this->call('TeamsTableSeeder');
      $this->command->info('Teams table seeded!');

      $this->call('AnswersTableSeeder');
      $this->command->info('Answers table seeded!');
    }
}

class GamesTableSeeder extends Seeder {
  public function run(){
    DB::table('games')->delete();
    Game::create(array('name' => 'Adams Test Trivia', 'streamurl' => 'https://www.twitch.tv/grufftech'));
  }
}

class TeamsTableSeeder extends Seeder {
  public function run(){
    $teams = array("The Arrows of Cabury","The Silver Dragoons","Doani's Legion","Ampbell's Dragons","Wison's Covenant");
    DB::table('teams')->delete();
    $games = Game::all();
    foreach ($games as $game){
      foreach ($teams as $team){
        $newTeam = new Team;
        $newTeam->game_id = $game->id;
        $newTeam->name = $team;
        $newTeam->save();
      }
    }
  }
}
class AnswersTableSeeder extends Seeder {
  public function run(){
    $answers = array();
    DB::table('answers')->delete();
    $questions = Question::all();
    $teams = Team::all();
    foreach ($questions as $question){
      foreach ($teams as $team){
        $newAnswer = new Answer;
        $newAnswer->team_id = $team->id;
        $newAnswer->question_id = $question->id;
        if (rand(0,100)<20){ // simulating 20% wrong answer  rate
          $newAnswer->answer = Str::random(10);
          $newAnswer->credit = 0;
        }else{
          $newAnswer->answer = $question->answer;
          $newAnswer->credit = 1;
        }
        $newAnswer->save();
      }
    }
  }
}
class RoundsTableSeeder extends Seeder {
  public function run(){
    DB::table('rounds')->delete();
    $generate_rounds = 10;
    for($i=0;$i<$generate_rounds;$i++){
      $game = Game::firstOrFail();
      $round_count = Round::where('game_id',$game->id)->count()+1;
      $round = Round::create(array('name' => 'Round '.$round_count, 'game_id' => $game->id));
    }
  }
}
class QuestionsTableSeeder extends Seeder {
  public function run(){
    $generate_questions = 8;
    DB::table('questions')->delete();
    $rounds = Round::all();
    foreach ($rounds as $round){

      for($i=0;$i<$generate_questions;$i++){
        $jeopardy = Jeopardy::inRandomOrder()->firstOrFail();
        $question = new Question;
        $question->round_id = $round->id;
        $question->question = $jeopardy->question;
        $question->answer = $jeopardy->answer;
        $question->save();
      }
    }
  }
}
class JeopardyTableSeeder extends Seeder {
  public function run(){
      DB::table('jeopardy')->delete();
      Jeopardy::create(array('question' => 'It\'s reported the Rolling Stones took their name from the following blues song by this singer:', 'answer' => 'Muddy Waters'));
      Jeopardy::create(array('question' => 'From the Latin for "to correct", it\'s an adjective for someone who can\'t be corrected or reformed', 'answer' => 'incorrigible'));
      Jeopardy::create(array('question' => 'These insects also known as plant lice are captured & "milked" by many ants for the honeydew liquid they produce', 'answer' => 'aphids'));
      Jeopardy::create(array('question' => 'Called "Buffoons of \'60s British Rock Invasion", they were led by an ex-milkman named Garrity:', 'answer' => 'Freddie And The Dreamers'));
      Jeopardy::create(array('question' => 'In 1964 Elvis bought a yacht owned by this ex-president for $55,000, then donated it to the March of Dimes', 'answer' => 'FDR'));
      Jeopardy::create(array('question' => '(Jimmy of the Clue Crew at Carnegie Mellon University in Pittsburgh)  From the Greek for "self-acting", it\'s another word for a robot that mimics human actions', 'answer' => 'automaton'));
      Jeopardy::create(array('question' => 'A master craftsman, he invented the axe & built the labyrinth', 'answer' => 'Daedalus'));
      Jeopardy::create(array('question' => 'The Peer Gynt ski area has been called this country\'s best place for cross-country skiing', 'answer' => 'Norway'));
      Jeopardy::create(array('question' => 'John Howard Griffin chemically darkened his skin to research this 1961 bestseller', 'answer' => '"Black Like Me"'));
      Jeopardy::create(array('question' => 'The Pre Classic, an Oregon track & field meet, is named for this legendary runner & subject of 2 major movies', 'answer' => 'Steve Prefontaine'));
      Jeopardy::create(array('question' => 'London\'s HTD, Hospital for these Diseases, has a consultant parasitologist & leprologist', 'answer' => 'tropical diseases'));
      Jeopardy::create(array('question' => 'Opera & field glasses are classified as these, a pair of telescopes mounted on a single frame', 'answer' => 'Binoculars'));
      Jeopardy::create(array('question' => 'Seraphim have 6 of them: 2 to cover their faces, 2 to cover their feet & 2 to fly with', 'answer' => 'wings'));
      Jeopardy::create(array('question' => 'The 13 people at his final dinner included James, Andrew, John & Judas', 'answer' => 'Jesus'));
      Jeopardy::create(array('question' => 'This bishop who died in 460 A.D. is celebrated on March 17', 'answer' => 'Saint Patrick'));
      Jeopardy::create(array('question' => 'Jacob Neufer was the first on record to perform this operation where the mother & baby both survived', 'answer' => 'Caesarean Section'));
      Jeopardy::create(array('question' => 'In 1802, after he\'d been in office for a year, the first article on his involvement with Sally Hemings was published', 'answer' => 'Thomas Jefferson'));
      Jeopardy::create(array('question' => 'Part of a major purchase, this state entered the Union April 30, 1812', 'answer' => 'Louisiana'));
      Jeopardy::create(array('question' => 'The first of these buildings for publicly displaying fish was opened at Regent\'s Park in England', 'answer' => 'aquarium'));
      Jeopardy::create(array('question' => 'One of his patents that year was for a motion-picture projector, the kinetoscope', 'answer' => 'Thomas Edison'));
    }
}
