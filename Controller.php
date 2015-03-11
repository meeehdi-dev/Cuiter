<?php

class Controller
{
    static function processTweet(&$tweet)
    {
        $text = $tweet['text'];
        $text = str_replace('RT', '<span class="rt">RT</span>', $text);
        foreach($tweet['entities'] as $entity) {
            foreach($entity['urls'] as $url) {
                var_dump($url);
                $text = substr($text, $url['url'], '<a href="' . $url['url'] . '">' . $url['display_url'] . '</a>', $url['indices'][1] - $url['indices'][1]);
            }
            /*foreach($entity['hashtags'] as $hashtag)
                $tweet = substr($tweet, '#'.$hashtag['url'], $hashtag['indices'][0], $hashtag['indices'][1]-$hashtag['indices'][1]);*/
            /*foreach($entity['user_mentions'] as $user)
                $tweet = substr($tweet, '@'.$user['screen_name'], '<a href="'.$user['screen_name'].'">@'.$user['screen_name'].'</a>', $user['indices'][1]-$user['indices'][1]);*/
        }
        return $text;
    }
}