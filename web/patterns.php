<?php
ob_start();
$title = 'Patterns';
?>
    <article>
        <h1><?php echo $title; ?></h1>

        <table id="main-table-patterns" summary="Contains comparison of Patterns">
            <thead>
            <tr>
                <th scope="col" rowspan="2"><strong>Patterns</strong></th>
                <th scope="col" colspan="2"><strong>General</strong></th>
                <th scope="col" colspan="2"><strong>Mission</strong></th>
            </tr>
            <tr id="positions-tr"></tr>
            </thead>
            <tbody></tbody>
            <tfoot></tfoot>
        </table>
    </article>

    <script>
        let patterns = <?php echo require 'data/patterns.php'; ?>

        const positions = [
            {key: 'type', title: 'Type'},
            {key: 'aliases', title: 'Aliases'},
            //
            {key: 'problem', title: 'Problem'},
            {key: 'solution', title: 'Solution'},
        ];

        function sorting(data, dir, key)
        {
            return data.sort(function (a, b) {
                var _dir = dir == 'ASC' ? 1 : -1;
                if (typeof a[key] == 'string') {
                    return _dir * a[key].localeCompare(b[key]);
                }
                return _dir * (a[key] - b[key]);
            });
        }

        function bindSorting(position_tr, positions)
        {
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
                    var _data = this.sorting(this.data, order.dir, order.key);
                    renderData(mainTable, _data);
                });
            });
        }

        function renderPositions(position_tr, positions)
        {
            positions.forEach(function (pos) {
                var th = document.createElement('th');
                th.innerHTML = pos.title;
                th.setAttribute('scope', 'col');
                position_tr.appendChild(th);
            });
        }

        function renderData(_mainTable, _data)
        {
            var mainTableBody = document.createElement('tbody');
            _mainTable.removeChild(_mainTable.getElementsByTagName('tbody')[0]);
            _mainTable.appendChild(mainTableBody);
            var fields = _mainTable.getElementsByTagName('td');

            var maxStarts = 5;

            _data.forEach(function (item, i) {
                var tr = document.createElement('tr');
                var th = document.createElement('th');
                th.innerHTML = item.name;
                if (item['link'] !== undefined) {
                    th.innerHTML = '<a target="_blank" rel="nofollow" href="' + item['link'] + '">' + th.innerHTML + '</a>';
                }
                tr.appendChild(th);

                [
                    'type', 'aliases',
                    'problem', 'solution',
                ].forEach(function (key) {
                    var td = document.createElement('td');
                    if (Array.isArray(item[key])) {
                        td.innerHTML = item[key].join("<br>");
                    } else {
                        td.innerHTML = item[key] === undefined ? '' : item[key];

                    }

                    if (['problem', 'solution'].includes(key)) {
                        td.style = 'text-align: left';
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
        var mainTable = document.getElementById('main-table-patterns');
        var position_tr = document.getElementById('positions-tr');
        var data = patterns;
        data = sorting(data, 'ASC', 'name');
        renderPositions(position_tr, positions);
        renderData(mainTable, data);
        bindSorting(position_tr, positions);
    </script>
<?php
$content = ob_get_clean();
require '_layout.php';
