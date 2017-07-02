import React from 'react';
import Axios from 'axios';

import GoogleAds from "../Components/GoogleAds";

const positions = [
    {key: 'type', title: 'Type'},
    {key: 'aliases', title: 'Aliases'},
    //
    {key: 'problem', title: 'Problem'},
    {key: 'solution', title: 'Solution'},
];

export default class Patterns extends React.Component {

    sorting(data, dir, key) {
        return data.sort(function (a, b) {
            var _dir = dir == 'ASC' ? 1 : -1; // eslint-disable-line
            if (typeof a[key] == 'string') { // eslint-disable-line
                return _dir * a[key].localeCompare(b[key]);
            }
            return _dir * (a[key] - b[key]);
        });
    }

    bindSorting(position_tr, positions) {
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
                this.renderData(this.mainTable, _data);
            });
        });
    }

    renderPositions(position_tr, positions) {
        positions.forEach(function (pos) {
            var th = document.createElement('th');
            th.innerHTML = pos.title;
            th.setAttribute('scope', 'col');
            position_tr.appendChild(th);
        });
    }


    renderData(mainTable, data) {
        var mainTableBody = document.createElement('tbody');
        mainTable.removeChild(mainTable.getElementsByTagName('tbody')[0]);
        mainTable.appendChild(mainTableBody);
        var fields = mainTable.getElementsByTagName('td');

        var maxStarts = 5;

        data.forEach(function (item, i) {
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

                console.log(item[key])
                if (Array.isArray(item[key])) {
                    td.innerHTML = item[key].join("<br>");
                } else {
                    td.innerHTML = item[key] === undefined ? '' : item[key];

                }

                if(['problem','solution'].includes(key)) {
                    td.style = 'text-align: left';
                }

                tr.appendChild(td);
            });

            mainTableBody.appendChild(tr);
        });

        var star = this.star;

        // replace rating with stars
        [].forEach.call(fields, function (el, i) {
            var val = parseInt(el.innerHTML, 10);
            if (!isNaN(val)) {
                var rating = '';
                for (let i = 1; i <= val; i++) {
                    rating += star.full;
                }
                for (let i = 0; i < maxStarts - val; i++) {
                    rating += star.empty;
                }
                el.innerHTML = rating;
            }

        });
    }

    mainTable = document.getElementById('main-table');

    constructor(props) {
        super(props);
        this.state =  {loaded: false};
    }

    componentDidMount() {
        console.log('Patterns: componentDidMount')

        if (this.state.loaded) {
            return;
        }

        //
        // INIT
        //
        var star = {full: '<span class="mt">star</span>', empty: '<span class="mt">star_border</span>'};
        var mainTable = document.getElementById('main-table-patterns');
        var position_tr = document.getElementById('positions-tr');

        this.mainTable = mainTable;
        this.star = star;

        Axios.get('/data/patterns.json').then( (response) => {
            this.data = response.data;
            this.data = this.sorting(this.data, 'ASC', 'name');
            this.renderPositions(position_tr, positions);
            this.renderData(mainTable, this.data);
            this.bindSorting(position_tr, positions);
        }).catch(function (error) {
            console.error(error);
        });

    }


    render() {
        document.title = 'Patterns';

        return (
            <article>
                <h1>Patterns</h1>

                <GoogleAds
                    id="top"
                    client="ca-pub-1647951743023830"
                    slot="1838502239"
                    style={{ display:'block', width:'728px', height:'90px',  marginLeft: 'auto', marginRight: 'auto', }}
                />

                <h3>Last update:
                    <time>2017-07-02</time>
                </h3>

                <table id="main-table-patterns" summary="Contains comparison of Patterns">
                    <thead>
                    <tr>
                        <th scope="col" rowSpan={2}><strong>Patterns</strong></th>
                        <th scope="col" colSpan={2}><strong>General</strong></th>
                        <th scope="col" colSpan={2}><strong>Mission</strong></th>
                    </tr>
                    <tr id="positions-tr"></tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot></tfoot>
                </table>


            </article>


        );
    }
}