import React from 'react';
import Axios from 'axios';

// Phpixie  Fat-Free

import HyperComments from './../Components/HyperComments';
import GoogleAds from "../Components/GoogleAds";

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

class Frameworks extends React.Component {


    sorting(data, dir, key) {
        return data.sort(function (a, b) {
            var _dir = dir == 'ASC' ? 1 : -1;
            if (typeof a[key] == 'string') {
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
                if (order.key == _key) {
                    order.dir = order.dir == 'ASC' ? 'DESC' : 'ASC';
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

                if (key == 'company' && item['company_link'] !== undefined && item['company_link'].length > 0) {
                    td.innerHTML = '<a target="_blank" rel="nofollow" href="' + item['company_link'] + '">' + td.innerHTML + '</a>';
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

        console.log('componentDidMount: Frameworks')

        if (this.state.loaded) {
            return;
        }

        //
        // INIT
        //
        var star = {full: '<span class="mt">star</span>', empty: '<span class="mt">star_border</span>'};
        var mainTable = document.getElementById('main-table');
        var position_tr = document.getElementById('positions-tr');

        this.mainTable = mainTable;
        this.star = star;

        // console.log(mainTable);

        Axios.get('/data/frameworks.json').then( (response) => {
            this.data = response.data;
            this.data = this.sorting(this.data, 'ASC', 'type');
            this.renderPositions(position_tr, positions);
            this.renderData(mainTable, this.data);
            this.bindSorting(position_tr, positions);
        }).catch(function (error) {
            console.error(error);
        });

    }


    render() {
        document.title = 'PHP Frameworks and CMS';

        return (
            <article>
                <h1>Comparison of PHP Frameworks and CMS</h1>
                <h3>Last update:
                    <time>2017-06-02</time>
                </h3>

                <aside>
                    <p id="disclamer">
                        <span id="disclaimer-title">Disclaimer</span>
                        These are my subjective views on the field.
                        <br/>I have added to companies ones I consider make significant influence on project's life.
                        <br/>Company values are not really valid, because I took numbers from internet at untrusted
                        sources or I did wrong totals or roundings.
                        <br/>Any comments are welcome. If you agree or not, maybe you have some intel that can change
                        this pivot table etc.
                    </p>
                </aside>

                <GoogleAds
                    id="top"
                    client="ca-pub-1647951743023830"
                    slot="1838502239"
                    style={{ display:'block', width:'728px', height:'90px',  marginLeft: 'auto', marginRight: 'auto', }}
                />

                <table id="main-table" summary="Contains comparison of PHP Frameworks and CMS">
                    <thead>
                    <tr>
                        <th scope="col" rowSpan={2}><strong>Projects</strong></th>
                        <th scope="col" colSpan={3}><strong>General</strong></th>
                        <th scope="col" colSpan={4}><strong>Finances</strong></th>
                        <th scope="col" colSpan={6}><strong>Development</strong></th>
                        <th scope="col" colSpan={1}><strong>Comment</strong></th>
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

export default Frameworks;