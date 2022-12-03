<?php
namespace App\Days;

use App\Enums\RPSResultEnum;
use App\Interfaces\DayInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Day2 implements DayInterface
{
    public Collection $rounds;

    public function __construct($rounds = null)
    {
        if(is_a($rounds, Collection::class)) {
            $this->rounds = $rounds;
        }else{
            $this->rounds = collect(Str::of(Storage::disk('root')->get('/inputs/day2/input.txt'))->explode("\n"));
        }
    }

    public function part1(): int
    {
        $points = 0;

        foreach ($this->rounds as $round){
            $choosings = Str::of($round)->explode(' ');
            $opponent = $this->transformToRPS($choosings->get(0));
            $me = $this->transformToRPS($choosings->get(1));

            $result = $this->showMeTheResult($opponent, $me);
            $points += $result->value;
            $points += $this->getMyPoints($me);
        }
        return $points;
    }

    public function part2(): int
    {
        $points = 0;

        foreach ($this->rounds as $round){
            $choosings = Str::of($round)->explode(' ');
            $opponent = $this->transformToRPS($choosings->get(0));
            $me = $choosings->get(1);

            $result = RPSResultEnum::LOSE;
            if($me == 'Y'){
                $result = RPSResultEnum::TIE;
            }
            if($me == 'Z'){
                $result = RPSResultEnum::WIN;
            }
            $points += $this->getMyPoints($this->playTheGame($opponent, $result));
            $points += $result->value;
        }
        return $points;
    }

    public function transformToRPS($value): string
    {
        $pairings = [
            'A' => 'R',
            'B' => 'P',
            'C' => 'S',
            'X' => 'R',
            'Y' => 'P',
            'Z' => 'S',
        ];
        return $pairings[$value];
    }

    public function getMyPoints($value): int
    {
        $points = [
            'R' => 1,
            'P' => 2,
            'S' => 3,
        ];
        return $points[$value];
    }

    public function playTheGame($opponent, $wantedResult): ?string
    {
        $result = null;
        $myPlay = null;
        while ($result != $wantedResult){
            foreach (["R", "P", "S"] as $me){
                $res = $this->showMeTheResult($opponent, $me);
                if($res == $wantedResult){
                    $result = $res;
                    $myPlay = $me;
                }
            }
        }
        return $myPlay;
    }

    public function showMeTheResult($opponent, $me): RPSResultEnum
    {
        $game = $opponent.$me;
        $rules = $this->rules();
        if(in_array($game, $rules['ties'])){
            return RPSResultEnum::TIE;
        }
        if(in_array($game, $rules['wins'])){
            return RPSResultEnum::WIN;
        }
        return RPSResultEnum::LOSE;
    }

    public function rules(): array
    {
        return [
            'ties' => ["RR", "PP", "SS"],
            'wins' => ["RP", "PS", "SR"],
            'loses' => ["RS", "PR", "SP"],
        ];
    }

}
