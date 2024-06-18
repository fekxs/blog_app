<?php
    function time_calculation($datetime) {
        $now = new DateTime();
        $date = new DateTime($datetime);
        $interval = $now->diff($date);

        if ($interval->y > 0) {
            return $interval->y . " year" . ($interval->y > 1 ? "s" : "") . " ago";
        } elseif ($interval->m > 0) {
            return $interval->m . " month" . ($interval->m > 1 ? "s" : "") . " ago";
        } elseif ($interval->d > 0) {
            return $interval->d . " day" . ($interval->d > 1 ? "s" : "") . " ago";
        } elseif ($interval->h > 0) {
            return $interval->h . " hour" . ($interval->h > 1 ? "s" : "") . " ago";
        } elseif ($interval->i > 0) {
            return $interval->i . " minute" . ($interval->i > 1 ? "s" : "") . " ago";
        } else {
            return $interval->s . " second" . ($interval->s > 1 ? "s" : "") . " ago";
        }
    }
    function page_find($object){
        $page=['Dashboard','User','Posts','Reports'];
        return array_search($object, $page);
    }
    ?>