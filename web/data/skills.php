<?php
$skills = [
    // title | rating | interest
    'Bureaucracy' => [
        ['GDPR', 4],
        ['SRS', 5],
        ['ITIL 4', 0],
        ['Agile', 7, false],
        ['RUP', 7],
        ['FMEA/FMECA', 1],
        ['UML 2.4', 7],
    ],
    'Storages' => [
        ['MySQL 8', 8],
        ['MSSQL', 1, false],
        ['mongoDB', 3, false],
        ['Sqlite 3', 8],
        ['Oracle', 0, false],
        ['PostgreSQL', 3, false],
        ['Redis', 2, false],
    ],
    'Languages &amp; Markups' => [
        ['ASP.NET/C#', 2, false],
        ['bash', 4],
        ['C/C++', 4, false],
        ['Qt/C++', 1],
        ['CSS 3', 5, false],
        ['Javascript', 8, false],
        ['Javascript ES6', 8, true],
        ['PHP 5', 10],
        ['PHP 7', 10],
        ['SOAP/XML', 5],
        ['RegExp', 5],
        ['RESTful', 8],
        ['Solidity/Eth', 4, false],
        ['Ruby', 0, false],
        ['Go', 0, false],
        ['Python', 0, false],
        ['Lua', 2, false],
        ['Clojure/Lisp', 0, false],
    ],
    'Technologies' => [
        ['RabbitMQ', 3],
        ['Docker', 5, false],
        ['Gearman', 2, false],
    ],
    'Frontend Frameworks' => [
        ['Bootstrap', 4, false],
        ['Jquery', 7, false],
        ['React', 3, false],
        ['Vue 2', 9],
        ['Prototype', 1, false],
        ['Angular', 1, false],
        ['DevExtreme', 0, true],
        ['ZFramework 2', 2, false],
        ['ZFramework 3', 0, false],
    ],
    'PHP Frameworks' => [
        ['Yii 2', 8, false],
        ['Symfony 2', 2, false],
        ['Symfony 3', 5, false],
        ['Symfony 4', 3, false],
        ['Laravel 5', 10],
        ['Laravel 6', 8],
        ['Laravel Nova', 8],
        ['Slim 4', 8, true],
    ],
    'PHP Testing' => [
        ['PHPUnit', 5],
        ['Codeception', 5, false],
    ],
    'PHP CMS' => [
        ['Joomla 3', 1, false],
        ['Wordpress', 1, false],
        ['Drupal 7', 6, false],
        ['Drupal 8', 3, false],
        ['Magento 2', 0, false],
        ['Grav', 2, false],
        ['Oro', 1, false],
    ],
    'Collaboration' => [
        ['Mantis', 2, false],
        ['JIRA', 10],
        ['Redmine', 5, false],
        ['Bugzilla', 5, false],
        ['Git', 8],
        ['SVN', 8, false],
        ['Github', 8, false],
        ['Gitlab', 8],
        ['Bitbucket', 8, false],
        ['TravisCI', 6],
        ['Jenkins', 4, false],
        ['Slack', 8],
        ['Skype', 6, false],
        ['Telegram', 6, false],
    ],
];

$flatSkills = [];

foreach ($skills as $group => $items) {
    $flatSkills[] = ['title' => '<b>' . $group . '</b>'];
    foreach ($items as &$item) {
        $flatSkills[] = [
            'title' => $item[0],
            'rating' => $item[1],
            'interest' => isset($item[2]) ? (bool)$item[2] : true
        ];
    }
}

return $flatSkills;
