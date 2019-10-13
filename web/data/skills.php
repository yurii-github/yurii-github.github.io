<?php
$skills = [
    'Storages' => [
        ['MySQL', 8],
        ['MSSQL', 0],
        ['mongoDB', 3],
        ['Sqlite', 8],
        ['Oracle', 0],
        ['PostgreSQL', 3],
        ['Redis', 2],
    ],
    'Languages &amp; Markups' => [
        ['ASP .NET', 2],
        ['C/C++/C#', 4],
        ['CSS', 5],
        ['Javascript', 8],
        ['PHP', 10],
        ['SOAP/XML', 5],
        ['RegExp', 5],
        ['RESTful', 8],
        ['Ruby Rails', 0],
        ['Go', 0],
    ],
    'PHP Frameworks' => [
        ['Yii 2', 8],
        ['Symfony 2', 2],
        ['Symfony 3', 3],
        ['Symfony 4', 1],
        ['Laravel 5', 10],
        ['Joomla 3', 1],
        ['PHPUnit', 5],
        ['Codeception', 5],
    ],
    'Collaboration' => [
        ['Mantis', 1],
        ['JIRA', 10],
        ['Redmine', 1],
        ['Bugzilla', 1],
        ['Git', 8],
        ['SVN', 8],
        ['Github', 8],
        ['Gitlab', 8],
        ['Bitbucket', 8],
        ['TravisCI', 6],
    ],
    'Technologies' => [
        ['RabbitMQ', 3],
        ['Bootstrap', 4],
        ['Docker', 5],
        ['Jenkins', 1],
        ['Gearman', 0],
    ]
];

$flatSkills = [];

foreach ($skills as $group => $items) {
    $flatSkills[] = ['title' => '<b>' . $group . '</b>'];
    foreach ($items as &$item) {
        $flatSkills[] = ['title' => $item[0], 'rating' => $item[1]];
    }
}

return json_encode($flatSkills, JSON_UNESCAPED_UNICODE);
