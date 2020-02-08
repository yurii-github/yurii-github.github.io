<?php

return [
    // group
    // title | rating | interest (true) | url (none)
    'Bureaucracy' => [
        ['GDPR', 4, true, 'https://ec.europa.eu/info/law/law-topic/data-protection_en', ''],
        ['SRS', 5, true, 'https://www.perforce.com/blog/alm/how-write-software-requirements-specification-srs-document', ''],
        ['ITIL 4', 0, true, 'https://www.itil-docs.com', ''],
        ['Agile', 7, false, '', ''],
        ['RUP', 7, true, 'https://sceweb.uhcl.edu/helm/RationalUnifiedProcess', ''],
        ['PHP-FIG', 10, true, 'https://www.php-fig.org/psr', ''],
        ['FMEA/FMECA', 1, true, 'https://www.en-standard.eu/new-aiag-vda-fmea-handbook-failure-mode-and-effects-analysis', ''],
        ['UML 2.4', 7, true, 'https://www.omg.org/spec/UML/2.4', ''],
    ],
    'Storages' => [
        ['MySQL 8', 8, true, 'https://dev.mysql.com/doc/refman/8.0/en', ''],
        ['MariaDB', 8, false, 'https://mariadb.com/kb/en/documentation', '2020 (I have no trust in this)'],
        ['MicrosoftSQL', 1, false, 'https://docs.microsoft.com/en-us/sql', ''],
        ['Oracle', 0, true, 'https://docs.oracle.com/en/database', ''],
        ['PostgreSQL', 2, false, 'https://www.postgresql.org/docs', ''],
        ['SQLite 3', 8, true, 'https://www.sqlite.org', ''],
        ['MongoDB', 2, false, 'https://docs.mongodb.com', ''],
        ['Redis', 2, false, 'https://redis.io/documentation', ''],
        ['CouchDB 2', 0, false, 'https://docs.couchdb.org/en/stable/', ''],
        ['LevelDB', 1, false, 'https://github.com/google/leveldb', ''],
        ['ClickHouse', 0, false, 'https://clickhouse.yandex/docs/en', '2017 (Yandex ban, and that\'s good!)']
    ],
    'Markups' => [
        ['(X)HTML 4', 8, false, '', '2017'],
        ['(X)HTML 5', 8, true, 'https://html.spec.whatwg.org/multipage', ''],
        ['CSS 2/3', 5, false, '', ''],
        ['XML 1.0', 5, true, '', ''],
        ['XML 1.1', 1, false, '', ''],
        ['XSLT', 1, true, '', ''],
        ['SVG', 1, false, 'https://www.w3.org/TR/SVG11', ''],
        ['XSD', 1, true, '', ''],
        ['SOAP/WSDL', 3, true, '', ''],
        ['RegExp', 5, true, 'https://regexr.com', ''], // https://github.com/gskinner/regexr/
        ['RESTful', 8, true, 'https://standards.rest', ''],
    ],
    'Languages' => [
        ['ASP.NET/C#', 2, false, 'https://docs.microsoft.com/en-us/aspnet', ''],
        ['bash', 4, true, 'https://devdocs.io/bash', ''],
        ['C/C++', 4, false, 'https://cppreference.com', ''],
        ['Qt/C++', 1, true, 'https://doc.qt.io', ''],
        ['Javascript', 8, false, '', ''],
        ['Javascript ES6', 8, true, '', ''],
        ['PHP 5/7', 10, true, 'https://www.php.net/manual', ''],
        ['Solidity/Eth', 4, false, 'https://solidity.readthedocs.io', ''],
        ['Ruby', 0, false, 'https://ruby-doc.org', ''],
        ['Go', 0, false, 'https://golang.org/doc', ''],
        ['Assembly', 1, true, 'http://asm.sourceforge.net', ''],
        ['Python', 0, false, 'https://docs.python.org/3', ''],
        ['Java', 0, true, 'https://docs.oracle.com/javase/8/docs', ''],
        ['Lua', 2, false, 'https://www.lua.org/docs.html', ''],
        ['Clojure/Lisp', 0, false, 'https://clojure.org/guides/getting_started', ''],
    ],
    'CSS Frameworks' => [
        ['Bootstrap 4', 4, false, 'https://getbootstrap.com/docs/4.4', ''],
        ['Flexbox Grid', 0, false, 'http://flexboxgrid.com/', ''],
        ['PureCSS', 0, false, 'https://purecss.io/', ''],
        ['Zimit', 0, false, 'https://firezenk.github.io/zimit/started.html', ''],
        ['HTML Kickstart', 0, false, 'https://github.com/joshuagatcke/HTML-KickStart', ''],
        ['Materialize', 2, true, 'https://materializecss.com', ''],
    ],
    'JS Frameworks' => [
        ['jQuery', 5, false, 'https://api.jquery.com', ''],
        ['React', 3, false, 'https://reactjs.org/docs', ''],
        ['Vue 2', 7, true, 'https://vuejs.org/v2/guide', ''],
        ['Prototype.js', 0, false, 'https://github.com/prototypejs/prototype', '2015'],
        ['Angular', 1, false, 'https://angular.io/docs', ''],
    ],
    'JS Kits' => [
        ['DevExtreme', 1, true, 'https://js.devexpress.com/documentation', ''],
        ['Admin LTE', 4, true, 'https://adminlte.io/docs', ''],
        ['Webpack 4', 6, true, 'https://webpack.js.org/guides', ''],
        ['Node.js 12', 4, false, 'https://nodejs.org/en/docs', ''],
    ],
    'PHP Frameworks' => [
        ['Yii 1.1', 0, false, 'https://www.yiiframework.com/doc/guide/1.0', '2020'],
        ['Yii 2', 8, false, 'https://www.yiiframework.com/doc/guide/2.0', ''], // https://www.yiiframework.com/release-cycle
        ['Yii 3', 0, false, 'https://github.com/yiisoft/docs', '2020 (I have no trust in this)'],
        // https://symfony.com/doc/4.0/_images/release-process.jpg
        ['Symfony 2', 2, false, 'https://symfony.com/doc/2.8', '2019'],
        ['Symfony 3', 5, false, 'https://symfony.com/doc/3.4', '2020 (officially dead in 2021)'],
        ['Symfony 4', 3, false, 'https://symfony.com/doc/4.3', ''],
        ['Symfony 5', 3, false, 'https://symfony.com/doc/5.0', ''],
        // https://laravel-news.com/laravel-release-process
        ['Laravel 4', 0, false, '', '2015', ''],
        ['Laravel 5', 10, true, 'https://laravel.com/docs/5.8', ''],
        ['Laravel 6', 8, true, 'https://laravel.com/docs/6.x', ''],
        ['Slim 4', 8, true, 'http://www.slimframework.com/docs/v4', ''],
        //https://framework.zend.com/long-term-support
        ['ZFramework 1', 1, false, 'https://framework.zend.com/learn', '2016'],
        ['ZFramework 2', 2, false, 'https://framework.zend.com/learn', '2018'],
        ['ZFramework 3', 1, false, 'https://framework.zend.com/learn', '2020'],
        ['Laminas', 0, true, 'https://docs.laminas.dev', ''],
        ['CakePHP 3', 0, false, 'https://book.cakephp.org/3', '2020 (officially die in 2022)'],
        ['CakePHP 4', 1, false, 'https://book.cakephp.org/4', ''],
        ['Kohana 3', 3, false, 'https://kohanaframework.org', '2017'],
        ['CodeIgniter 3', 0, false, 'https://codeigniter.com/docs', ''],
        ['CodeIgniter 4', 0, false, 'https://codeigniter.com/docs', ''],
        ['Mako 6', 1, false, 'https://makoframework.com/docs/6.3', ''],
        ['PEAR', 3, false, 'https://pear.php.net/manual/en/', '2019 (no maintainers left)'],
    ],
    'PHP Kits' => [
        ['Laravel Nova 1', 8, false, 'https://nova.laravel.com/docs/1.0', '2020'],
        ['Laravel Nova 2', 6, true, 'https://nova.laravel.com/docs/2.0', ''],
        ['ReactPHP', 5, true, 'https://reactphp.org', ''],
        ['PHPUnit', 5, true, 'https://phpunit.readthedocs.io/en/8.5', ''],
        ['Codeception', 6, true, 'https://codeception.com/docs', ''],
        ['Composer', 5, true, 'https://getcomposer.org/doc/', ''],
    ],
    'PHP CRM' => [
        ['Oro', 1, false, 'https://doc.oroinc.com', ''],
        ['SugarCRM', 1, false, 'https://support.sugarcrm.com/Documentation', '2018 (non-free)'],
    ],
    'PHP CMS' => [
        ['Joomla 3', 4, false, 'https://docs.joomla.org', ''],
        ['Wordpress', 1, false, 'https://developer.wordpress.org', ''],
        ['Drupal 7', 6, false, 'https://www.drupal.org/docs/7', '2019 (officially November 2021)'],
        ['Drupal 8', 3, false, 'https://www.drupal.org/docs/8', ''],
        ['Magento 2', 0, false, 'https://devdocs.magento.com', ''],
        ['Grav', 2, false, 'https://learn.getgrav.org', ''],
        ['DokuWiki', 7, true, 'https://www.dokuwiki.org/manual', ''],
    ],
    'Collaboration' => [
        ['Mantis 2', 2, false, 'https://www.mantisbt.org/documentation.php', ''],
        ['JIRA', 10, true, 'https://confluence.atlassian.com/jira', ''],
        ['Trello', 2, false, '', ''],
        ['Redmine', 5, false, 'https://www.redmine.org/guide', ''],
        ['Bugzilla', 5, false, 'https://www.bugzilla.org/docs', ''],
        ['Git', 8, true, 'https://git-scm.com/doc', ''],
        ['SVN', 6, false, 'https://subversion.apache.org/docs', ''],
        ['Github', 7, false, 'https://github.com/yurii-github', ''],
        ['Gitlab', 8, true, 'https://docs.gitlab.com', ''],
        ['Bitbucket', 8, false, 'https://confluence.atlassian.com/bitbucket', ''],
        ['Slack', 8, true, 'https://slack.com', ''],
        ['Skype', 9, true, 'https://www.skype.com', ''],
        ['Telegram', 6, false, 'https://telegram.org', ''],
        ['Google Docs', 6, true, 'https://www.google.com/docs/about', ''],
    ],
    'Technologies' => [
        ['RabbitMQ', 3, true, 'https://www.rabbitmq.com/documentation.html', ''],
        ['Docker', 5, false, 'https://docs.docker.com', ''],
        ['Gearman', 2, false, 'http://gearman.org/documentation', ''],
        ['Jenkins', 2, false, 'https://jenkins.io/doc', ''],
        ['TravisCI', 5, true, 'https://docs.travis-ci.com', ''],
    ],
    'Operating Systems' => [
        ['Windows', 9, false, '', ''],
        ['Windows Server', 3, false, 'https://docs.microsoft.com/en-us/windows-server/', ''],
        ['Ubuntu', 7, false, '', ''],
        ['Debian', 8, true, '', ''],
        ['ArchLinux', 0, false, '', ''],
        ['Fedora', 5, false, '', ''],
        ['RHEL', 5, false, 'https://www.redhat.com/','2019 after company purchase by IBM for $34 bln (officially still alive)'],
        ['CentOS', 5, true, '', ''],
    ],
    'Cloudware' => [
        ['Amazon AWS', 0, false, '', ''],
        ['Digital Ocean', 0, false, '', ''],
        ['IBM Kubernetes', 0, false, '', ''],
        ['Google KE', 0, false, 'https://cloud.google.com/kubernetes-engine', ''],
    ],
];
