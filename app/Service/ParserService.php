<?php

namespace App\Service;

use App\Models\Parser;
use Carbon\Carbon;
use DiDom\Document;

class ParserService
{
    private const ESPORT = 'https://esport.in.ua/ru/ua/sport';
    private const RUNNING = 'https://vseprobegi.org/race/';

    public function __construct(int $fromId, int $toId)
    {
        $this->runAllParsing($fromId, $toId);
    }

    private function runAllParsing(int $fromId, int $toId):void
    {
        $this->parseEsport();
        for (; $fromId < $toId; $fromId++){
            try {
                $this->parseRunning($fromId);
            }catch (\Exception $exception){

            }
        }
    }

    private function parseEsport(): void
    {
        $document = $this->runParser(self::ESPORT);
        $posts = $document->find('.events-item');
        $parsedData = [];
        foreach ($posts as $post) {
            $parser = new Parser();
            $parser->parsed_start_date = $post->first('meta')->attr('content');
            $parser->parsed_event_name = $post->first('a')->attr('title');
            $parser->parsed_city = $post->first('.group-top > a')->attr('title');
            $parsedData[] = $parser;
        }
        foreach ($parsedData as $parsed) {
            $parsed->save();
        }
    }

    private function parseRunning(string $id): void
    {
        $document = $this->runParser(self::RUNNING . $id);
        $parser = new Parser();
        try {
            $parser->parsed_event_name = $document->first('h1')->text();
            preg_match('/[0-9]+ [а-я]+ [0-9]+/u', $document->first('.race-view-date')->text(), $matches);
            $parsedDate = Carbon::createFromLocaleFormat('d M Y', 'uk', $matches[0])->locale('uk');
            $parser->parsed_start_date = $parsedDate;
            $parser->parsed_event_link = $document->first('.race-view')->find('p')[2]->first('a')->attr('href');
            $parser->save();
        }catch (\Error $error){

        }
    }

    private function runParser($url): Document
    {
        return new Document($url, true);
    }

}
