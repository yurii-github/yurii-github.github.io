<?php
$title = 'Comparison of PHP Frameworks and CMS';

?>
<?php ob_start(); ?>
    <article>
        <h1><?php echo $title; ?></h1>
        <h3>Last update:
            <time>2017-06-02</time>
        </h3>

        <table id="main-table" summary="Contains comparison of PHP Frameworks and CMS">
            <thead>
            <tr>
                <th scope="col" rowspan="2"><strong>Projects</strong></th>
                <th scope="col" colspan="3"><strong>General</strong></th>
                <th scope="col" colspan="4"><strong>Finances</strong></th>
                <th scope="col" colspan="6"><strong>Development</strong></th>
                <th scope="col" colspan="1"><strong>Comment</strong></th>
            </tr>
            <tr id="positions-tr"></tr>
            </thead>
            <tbody></tbody>
            <tfoot></tfoot>
        </table>
    </article>
    <script>

        const positions = [
            {key: 'type', title: 'Type'},
            {key: 'popularity', title: 'popularity'},
            {key: 'license', title: 'License'},
            //
            {key: 'company', title: 'Company behind'},
            {key: 'market_share', title: 'Market Share'},
            {key: 'total_value', title: 'Total Value'},
            //
            {key: 'curve', title: 'Learning Curve'},
            {key: 'template', title: 'Template'},
            {key: 'speed', title: 'Speed'},
            {key: 'code_structure', title: 'Code Structure'},
            {key: 'architecture', title: 'Architecture'},
            {key: 'extensions', title: 'Extensions'},
            {key: 'extension_type', title: 'Extension Type'},
            //
            {key: 'conclusion', title: 'Conclusion'}
        ];

        const frameworks = [
            {
                "title": "Drupal 7",
                "link": "https://www.drupal.org/",
                "type": "CMS",
                "company": "Acquia<br>Drupal Association",
                "company_link": "https://www.acquia.com/",
                "popularity": "3",
                "curve": "2",
                "template": "PHP",
                "licence": "GPL-2",
                "speed": "1",
                "code_structure": "1",
                "architecture": "Procedures<br>Hooks",
                "extensions": "3",
                "extension_type": "Module",
                "market_share": "2",
                "total_value": "$150M<br>$1M",
                "conclusion": "almost dead"
            },
            {
                "title": "Drupal 8<br>(Symfony 2)",
                "link": "https://www.drupal.org/",
                "type": "CMS",
                "company": "Acquia<br>Drupal Association",
                "company_link": "https://www.acquia.com/",
                "popularity": "1",
                "curve": "1",
                "template": "Twig",
                "licence": "GPL-2",
                "speed": "3",
                "code_structure": "2",
                "architecture": "Procedures<br>Events<br>Hooks",
                "extensions": "3",
                "extension_type": "Module",
                "total_value": "$150M<br>$1M",
                "market_share": "1",
                "conclusion": "not finished<br>too much of legacy code<br>"
            },
            {
                "title": "Backdrop<br>(Drupal 7)",
                "type": "CMS",
                "popularity": "1",
                "curve": "2",
                "template": "PHP",
                "licence": "GPL-2",
                "speed": "2",
                "code_structure": "1",
                "architecture": "Procedures<br>Hooks",
                "extensions": "1",
                "extension_type": "Module",
                "market_share": "0%",
                "conclusion": "for old Drupal 7 users"
            },
            {
                "title": "Symfony 2",
                "type": "F",
                "company": "SensioLabs",
                "company_link": "https://sensiolabs.com/",
                "total_value": "$7M",
                "popularity": "4",
                "curve": "1",
                "template": "Twig",
                "licence": "MIT",
                "speed": "4",
                "code_structure": "3",
                "architecture": "packages",
                "extensions": "2",
                "extension_type": "Bundle",
                "market_share": "2",
                "conclusion": "almost dead<br>fuels other projects"
            },
            {
                "title": "Symfony 3",
                "type": "F/mF",
                "company": "SensioLabs",
                "company_link": "https://sensiolabs.com/",
                "total_value": "$7M",
                "popularity": "3",
                "curve": "1",
                "template": "Twig",
                "licence": "MIT",
                "speed": "4",
                "code_structure": "4",
                "architecture": "packages",
                "extensions": "1",
                "extension_type": "Bundle",
                "market_share": "1",
                "conclusion": "mid business<br>custom stuff<br>fuels other projects"
            },
            {
                "title": "ZF 2",
                "link": "https://framework.zend.com/",
                "type": "F",
                "company": "Rogue Wave Software",
                "company_link": "https://www.roguewave.com/",
                "popularity": "1",
                "curve": "0",
                "template": "PHP",
                "licence": "BSD-3",
                "speed": "3",
                "code_structure": "2",
                "architecture": "packages",
                "extensions": "1",
                "extension_type": "Module",
                "market_share": "1",
                "conclusion": "almost dead<br>never born"
            },
            {
                "title": "ZF 3",
                "link": "https://framework.zend.com/",
                "type": "F",
                "company": "Rogue Wave Software",
                "company_link": "https://www.roguewave.com/",
                "popularity": "2",
                "curve": "0",
                "template": "PHP",
                "licence": "BSD-3",
                "speed": "3",
                "code_structure": "4",
                "architecture": "packages",
                "extensions": "1",
                "extension_type": "Module",
                "market_share": "1",
                "conclusion": "enterprise only"
            },
            {
                "title": "Wordpress 4",
                "link": "https://wordpress.org/",
                "type": "CMS",
                "company": "Automattic",
                "company_link": "https://automattic.com/",
                "popularity": "5",
                "curve": "5",
                "total_value": "$1.6B",
                "template": "PHP",
                "licence": "GPL-2",
                "speed": "3",
                "code_structure": "1",
                "architecture": "monolith",
                "extensions": "5",
                "extension_type": "Plugin",
                "market_share": "4",
                "conclusion": "top in blog <br> small shops world"
            },
            {
                "title": "Phalcon",
                "link": "https://phalconphp.com",
                "type": "F",
                "popularity": "0",
                "curve": "1",
                "template": "Volt",
                "licence": "BSD-3",
                "speed": "4",
                "code_structure": "1",
                "architecture": "pre-compiled<br>monolith",
                "extensions": "-",
                "extension_type": "-",
                "market_share": "0",
                "conclusion": "fast, but not enough"
            },
            {
                "title": "Joomla 3",
                "link": "https://www.joomla.org",
                "type": "F",
                "popularity": "2",
                "curve": "3",
                "template": "PHP",
                "licence": "BSD-3",
                "speed": "3",
                "code_structure": "1",
                "architecture": "monolith",
                "extensions": "3",
                "extension_type": "Module",
                "market_share": "1",
                "conclusion": "still alive"
            },
            {
                "title": "CodeIgniter 3",
                "link": "https://www.codeigniter.com/",
                "company": "BCIT",
                "company_link": "http://bcit.ca/",
                "type": "F",
                "popularity": "1",
                "curve": "3",
                "template": "PHP",
                "licence": "MIT",
                "speed": "4",
                "code_structure": "2",
                "architecture": "monolith",
                "extensions": "-",
                "extension_type": "-",
                "market_share": "2",
                "conclusion": "still need to try"
            },
            {
                "title": "Yii 2",
                "link": "http://www.yiiframework.com/",
                "company": "Yii Software",
                "company_link": "http://www.yiisoft.com/",
                "type": "F",
                "popularity": "2",
                "curve": "3",
                "template": "PHP",
                "licence": "BSD",
                "speed": "2",
                "code_structure": "2",
                "architecture": "monolith",
                "extensions": "2",
                "extension_type": "Component",
                "market_share": "2",
                "conclusion": "popular in Russia"
            },
            {
                "title": "Kohana<br>(CodeIgniter)",
                "link": "http://kohanaframework.org/",
                "company": "",
                "type": "F",
                "popularity": "0",
                "curve": "2",
                "template": "PHP",
                "licence": "BSD",
                "speed": "2",
                "code_structure": "1",
                "architecture": "monolith",
                "extensions": "-",
                "extension_type": "-",
                "market_share": "0",
                "total_value": "",
                "financial": "",
                "conclusion": "going to die 2017-07-01"
            },
            {
                "title": "FuelPHP",
                "link": "https://www.fuelphp.com/",
                "type": "F",
                "popularity": "1",
                "curve": "3",
                "template": "PHP",
                "licence": "GPL-like",
                "speed": "2",
                "code_structure": "3",
                "architecture": "monolith",
                "extensions": "2",
                "extension_type": "Module",
                "market_share": "0",
                "conclusion": "popular in Japan<br>feels dead"
            },
            {
                "title": "CakePHP 3<br>(Symfony 3)",
                "link": "https://cakephp.org/",
                "type": "F",
                "popularity": "2",
                "curve": "2",
                "template": "PHP",
                "licence": "MIT",
                "speed": "2",
                "code_structure": "3",
                "architecture": "packages",
                "extensions": "-",
                "extension_type": "-",
                "market_share": "0",
                "conclusion": "got new breath recently"
            },
            {
                "title": "Laravel 5<br>(Symfony 3)",
                "link": "https://laravel.com/",
                "type": "F",
                "popularity": "5",
                "curve": "2",
                "template": "Blade",
                "licence": "MIT",
                "speed": "3",
                "code_structure": "2",
                "architecture": "packages",
                "extensions": "1",
                "extension_type": "Package",
                "market_share": "3",
                "conclusion": "professionally hyped <br>artisan's nonsense"
            },
            {
                "title": "Slim 3",
                "link": "https://www.slimframework.com/",
                "type": "mF",
                "company": "",
                "popularity": "3",
                "curve": "3",
                "template": "PHP",
                "licence": "MIT",
                "speed": "4",
                "code_structure": "4",
                "architecture": "packages",
                "extensions": "-",
                "extension_type": "-",
                "market_share": "1",
                "total_value": "",
                "financial": "",
                "conclusion": "REST API mostly"
            },
            {
                "title": "AuraPHP 2<br>(SolarPHP)",
                "link": "http://auraphp.com/",
                "type": "F",
                "company": "",
                "popularity": "0",
                "curve": "3",
                "template": "PHP",
                "licence": "MIT-like",
                "speed": "4",
                "code_structure": "2",
                "architecture": "packages",
                "extensions": "-",
                "extension_type": "-",
                "market_share": "0",
                "conclusion": "good for reading<br>components alive"
            },
            {
                "title": "Grav<br>(Symfony 2)",
                "link": "https://getgrav.org",
                "type": "F",
                "company": "",
                "total_value": "$2k",
                "popularity": "0",
                "curve": "3",
                "template": "Markdown",
                "licence": "MIT",
                "speed": "4",
                "code_structure": "2",
                "architecture": "monolith",
                "extensions": "2",
                "extension_type": "Plugin",
                "market_share": "0",
                "conclusion": "flat is flat"
            }
        ];

        function sorting(data, dir, key) {
            return data.sort(function (a, b) {
                var _dir = dir == 'ASC' ? 1 : -1; // eslint-disable-line
                if (typeof a[key] == 'string') { // eslint-disable-line
                    return _dir * a[key].localeCompare(b[key]);
                }
                return _dir * (a[key] - b[key]);
            });
        }

        function bindSorting(position_tr, positions) {
            var order = {key: null, dir: null};
            var headers = position_tr.getElementsByTagName('th');

            [].forEach.call(headers, (el, i) => {
                el.addEventListener('click', (e) => {
                    //console.log(positions[i]);
                    var _key = positions[i]['key'];
                    //console.log(_key);
                    if (order.key == _key) { // eslint-disable-line
                        order.dir = order.dir == 'ASC' ? 'DESC' : 'ASC'; // eslint-disable-line
                    } else {
                        order.key = _key;
                        order.dir = 'DESC';
                    }
                    var _data = sorting(data, order.dir, order.key);
                    renderData(mainTable, _data);
                });
            });
        }

        function renderPositions(position_tr, positions) {
            positions.forEach(function (pos) {
                var th = document.createElement('th');
                th.innerHTML = pos.title;
                th.setAttribute('scope', 'col');
                position_tr.appendChild(th);
            });
        }


        function renderData(mainTable, data) {
            var mainTableBody = document.createElement('tbody');
            mainTable.removeChild(mainTable.getElementsByTagName('tbody')[0]);
            mainTable.appendChild(mainTableBody);
            var fields = mainTable.getElementsByTagName('td');

            var maxStarts = 5;

            data.forEach(function (item, i) {
                var tr = document.createElement('tr');
                var th = document.createElement('th');
                th.innerHTML = item.title;
                if (item['link'] !== undefined) {
                    th.innerHTML = '<a target="_blank" rel="nofollow" href="' + item['link'] + '">' + th.innerHTML + '</a>';
                }
                tr.appendChild(th);

                [
                    'type', 'popularity', 'licence',
                    'company', 'market_share', 'total_value',
                    'curve', 'template', 'speed', 'code_structure', 'architecture', 'extensions',
                    'extension_type', 'conclusion'
                ].forEach(function (key) {
                    var td = document.createElement('td');
                    td.innerHTML = item[key] === undefined ? '?' : item[key];

                    if (key == 'company' && item['company_link'] !== undefined && item['company_link'].length > 0) { // eslint-disable-line
                        td.innerHTML = '<a target="_blank" rel="nofollow" href="' + item['company_link'] + '">' + td.innerHTML + '</a>';
                    }
                    tr.appendChild(td);
                });

                mainTableBody.appendChild(tr);
            });

            var _star = star;

            // replace rating with stars
            [].forEach.call(fields, function (el, i) {
                var val = parseInt(el.innerHTML, 10);
                if (!isNaN(val)) {
                    var rating = '';
                    for (let i = 1; i <= val; i++) {
                        rating += _star.full;
                    }
                    for (let i = 0; i < maxStarts - val; i++) {
                        rating += _star.empty;
                    }
                    el.innerHTML = rating;
                }

            });
        }

        //
        // INIT
        //
        var star = {full: '<span class="mt">star</span>', empty: '<span class="mt">star_border</span>'};
        var mainTable = document.getElementById('main-table');
        var position_tr = document.getElementById('positions-tr');

        // console.log(mainTable);
        let data = frameworks;
        data = sorting(data, 'ASC', 'type');
        renderPositions(position_tr, positions);
        renderData(mainTable, data);
        bindSorting(position_tr, positions);
    </script>
<?php $content = ob_get_clean(); ?>

<?php require_once '_layout.php';