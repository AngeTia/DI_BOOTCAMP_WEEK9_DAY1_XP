<?php

namespace App\Service;

class GreetingService
{

    public function getGreeting($name)
    {
        $date = new \DateTime();

        $hour = $date->format('H');

        if ($hour < 12) {
            $greeting = 'Good morning';
        } elseif ($hour < 18) {
            $greeting = 'Good afternoon';
        } else {
            $greeting = 'Good evening';
        }

        return sprintf('%s, %s!', $greeting, $name);
    }
}
