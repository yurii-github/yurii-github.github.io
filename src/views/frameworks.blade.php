<?php
$title = 'Comparison of PHP Frameworks and CMS';
?>
@extends('_layout')
@section('title', 'DUMMY')
@section('style')
    @parent
@endsection

@section('content')
    <article>
        <h1><?php echo $title; ?></h1>
        <h3>
            <p>When I have time and will I do track some PHP frameworks and CMS.</p>
            <p><b>Please note, these are my subjective views!</b></p>
        </h3>
        <table id="main-table" summary="Contains comparison of PHP Frameworks and CMS">
            <thead>
            <tr>
                <th scope="col" rowspan="2"><strong>Projects</strong></th>
                <th scope="col" colspan="4"><strong>General</strong></th>
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
        {key: 'check', title: 'Checked'},
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

      let frameworks = <?php echo require 'data/frameworks.php'; ?>;

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
            'check', 'type', 'popularity', 'licence',
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
          if (Number.isInteger(val) && val == el.innerHTML) {
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
@endsection
