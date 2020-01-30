<?php

return [
    // group
    // title | rating | interest (true) | url (none)
    'Bureaucracy' => [
        ['GDPR', 4, true, 'https://ec.europa.eu/info/law/law-topic/data-protection_en'],
        ['SRS', 5, true, ''],
        ['ITIL 4', 0, true, 'https://www.itil-docs.com'],
        ['Agile', 7, false, ''],
        ['RUP', 7, true, ''],
        ['FMEA/FMECA', 1, true, 'https://www.en-standard.eu/new-aiag-vda-fmea-handbook-failure-mode-and-effects-analysis'],
        ['UML 2.4', 7, true, 'https://www.omg.org/spec/UML/2.4'],
    ],
    'Storages' => [
        ['MySQL 8', 8, true, 'https://dev.mysql.com/doc/refman/8.0/en'],
        ['MicrosoftSQL', 1, false, 'https://docs.microsoft.com/en-us/sql'],
        ['MongoDB', 3, false, 'https://docs.mongodb.com'],
        ['SQLite 3', 8, true, 'https://www.sqlite.org'],
        ['Oracle', 0, false, 'https://docs.oracle.com/en/database'],
        ['PostgreSQL', 3, false, 'https://www.postgresql.org/docs'],
        ['Redis', 2, false, 'https://redis.io/documentation'],
    ],
    'Markups' => [
        ['XHTML 5', 8, true, ''],
        ['CSS 2/3', 5, false, ''],
        ['XML', 5, true, ''],
        ['SOAP', 5, true, ''],
        ['RegExp', 5, true, ''],
        ['RESTful', 8, true, 'https://standards.rest'],
    ],
    'Languages' => [
        ['ASP.NET/C#', 2, false, 'https://docs.microsoft.com/en-us/aspnet'],
        ['bash', 4, true, 'https://devdocs.io/bash'],
        ['C/C++', 4, false, 'https://cppreference.com'],
        ['Qt/C++', 1, true, 'https://doc.qt.io'],
        ['Javascript', 8, false, ''],
        ['Javascript ES6', 8, true, ''],
        ['PHP 5/7', 10, true, 'https://www.php.net/manual'],
        ['Solidity/Eth', 4, false, 'https://solidity.readthedocs.io'],
        ['Ruby', 0, false, 'https://ruby-doc.org'],
        ['Go', 0, false, 'https://golang.org/doc'],
        ['Python', 0, false, 'https://docs.python.org/3'],
        ['Lua', 2, false, 'https://www.lua.org/docs.html'],
        ['Clojure/Lisp', 0, false, 'https://clojure.org/guides/getting_started'],
    ],
    'Technologies' => [
        ['RabbitMQ', 3, true, 'https://www.rabbitmq.com/documentation.html'],
        ['Docker', 5, false, 'https://docs.docker.com'],
        ['Gearman', 2, false, 'http://gearman.org/documentation'],
    ],
    'Frontend Frameworks' => [
        ['Bootstrap 4', 4, false, 'https://getbootstrap.com/docs/4.4'],
        ['Jquery', 7, false, 'https://api.jquery.com'],
        ['React', 3, false, 'https://reactjs.org/docs'],
        ['Vue 2', 9, true, 'https://vuejs.org/v2/guide'],
        ['Prototype.js', 0, false, 'http://api.prototypejs.org'],
        ['Angular', 1, false, 'https://angular.io/docs'],
        ['DevExtreme', 0, true, 'https://js.devexpress.com/documentation'],
    ],
    'PHP Frameworks' => [
        ['Yii 2', 8, false, 'https://www.yiiframework.com/doc/guide/2.0'],
        ['Symfony 2', 2, false, 'https://symfony.com/doc/2.8'],
        ['Symfony 3', 5, false, 'https://symfony.com/doc/3.3'],
        ['Symfony 4', 3, false, 'https://symfony.com/doc/4.3'],
        ['Symfony 5', 3, false, 'https://symfony.com/doc/5.0'],
        ['Laravel 5', 10, true, 'https://laravel.com/docs/5.8'],
        ['Laravel 6', 8, true, 'https://laravel.com/docs/6.x'],
        ['Laravel Nova 1', 8, true, 'https://nova.laravel.com/docs/1.0'],
        ['Laravel Nova 2', 0, true, 'https://nova.laravel.com/docs/2.0'],
        ['Slim 4', 8, true, 'http://www.slimframework.com/docs/v4'],
        ['ZFramework 2', 2, false, 'https://framework.zend.com/manual/2.4'],
        ['ZFramework 3', 0, false, 'https://framework.zend.com/learn'],
        ['Laminas', 0, true, 'https://docs.laminas.dev'],
    ],
    'PHP Testing' => [
        ['PHPUnit', 5, true, 'https://phpunit.readthedocs.io/en/8.5'],
        ['Codeception', 5, false, 'https://codeception.com/docs'],
    ],
    'PHP CRM' => [
        ['Oro', 1, false, 'https://doc.oroinc.com'],
        ['SugarCRM', 1, false, 'https://support.sugarcrm.com/Documentation'],
    ],
    'PHP CMS' => [
        ['Joomla 3', 4, false, 'https://docs.joomla.org'],
        ['Wordpress', 1, false, 'https://developer.wordpress.org'],
        ['Drupal 7', 6, false, 'https://www.drupal.org/docs/7'],
        ['Drupal 8', 3, false, 'https://www.drupal.org/docs/8'],
        ['Magento 2', 0, false, 'https://devdocs.magento.com'],
        ['Grav', 2, false, 'https://learn.getgrav.org'],
    ],
    'Collaboration' => [
        ['Mantis', 2, false, 'https://www.mantishub.com'],
        ['JIRA', 10, true, 'https://confluence.atlassian.com/jira'],
        ['Trello', 2, false, ''],
        ['Redmine', 5, false, 'https://www.redmine.org/guide'],
        ['Bugzilla', 5, false, 'https://www.bugzilla.org/docs'],
        ['Git', 8, true, 'https://git-scm.com/doc'],
        ['SVN', 8, false, 'https://subversion.apache.org/docs'],
        ['Github', 8, false, 'https://github.com/yurii-github'],
        ['Gitlab', 8, true, 'https://docs.gitlab.com'],
        ['Bitbucket', 8, false, 'https://confluence.atlassian.com/bitbucket'],
        ['TravisCI', 6, true, 'https://docs.travis-ci.com'],
        ['Jenkins', 4, false, 'https://jenkins.io/doc'],
        ['Slack', 8, true, 'https://slack.com'],
        ['Skype', 6, true, 'https://www.skype.com'],
        ['Telegram', 6, false, 'https://telegram.org'],
    ],
    'Cloudware' => [
        ['Amazon AWS', 0, false],
        ['DigitalOcean', 0, false],
        ['IBM Kubernetes', 0, false],
        ['Google KE', 0, false, 'https://cloud.google.com/kubernetes-engine'],
    ],
];
