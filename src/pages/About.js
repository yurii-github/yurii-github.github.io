import React from 'react';
import HyperComments from "../Components/HyperComments";
//import Axios from 'axios';

import GoogleAds from "../Components/GoogleAds";

const skills = [
    {title: '<b>Storages</b>'},
    {title: 'MySQL', rating: 6},
    {title: 'mongoDB', rating: 0},
    {title: 'Sqlite', rating: 5},
    {title: 'Oracle ', rating: 0},
    {title: 'postreSQL', rating: 1},
    {title: 'Redis', rating: 1},
    {title: 'MSSQL', rating: 1},
    {title: '<b>Languages &amp; Markups</b>'},
    {title: 'ASP .NET', rating: 4},
    {title: 'PHP', rating: 10},
    {title: 'Ruby Rails', rating: 0},
    {title: 'Python', rating: 0},
    {title: 'Bash', rating: 5},
    {title: 'CSS', rating: 8},
    {title: 'Javascript', rating: 9},
    {title: 'SOAP/XML', rating: 5},
    {title: 'RESTful', rating: 8},
    {title: 'RegExp', rating: 8},
    {title: '<b>Collaboration</b>'},
    {title: 'Mantis', rating: 0},
    {title: 'JIRA', rating: 10},
    {title: 'Redmine', rating: 4},
    {title: 'Bugzilla', rating: 0},
    {title: 'Git', rating: 10},
    {title: 'SVN', rating: 7},
    {title: '<b>Technologies</b>'},
    {title: 'RabbitMQ', rating: 1},
    {title: 'PHPUnit', rating: 7},
    {title: 'Bootstrap', rating: 7},
    {title: 'Docker', rating: 7},
    {title: 'TravisCI', rating: 7},
    {title: 'Jenkins', rating: 3},
    {title: 'SVN', rating: 7},
];


export default class About extends React.Component {

    componentDidMount() {
        console.log('componentDidMount');

        var star = {full: '<span class="mt">star</span>', empty: '<span class="mt">star_border</span>'};
        var maxStarts = 10;
        var dl = document.getElementById('skills');

        skills.forEach((skill) => {
            var _dt = document.createElement('dt');
            _dt.innerHTML = skill.title;
            var _dd = document.createElement('dd');
            _dd.innerHTML = this.rating(star, skill.rating, maxStarts);
            dl.appendChild(_dt);
            dl.appendChild(_dd);
        });



        // RESIZE
        window.addEventListener('resize', function(e){
            //TODO: cont width 80%
            var articleEl = document.getElementsByTagName('article')[0];
            var effectiveW = Math.round(window.innerWidth*0.8) - 40;
            var skillsW = 270;

            if(effectiveW >= 770) {
                var articleW = effectiveW - skillsW;
                articleEl.style['width'] = articleW+'px';
            } else {
                var articleW = effectiveW;
                articleEl.style['width'] = articleW+'px';
            }
        });

        window.dispatchEvent(new Event('resize'));

        // CSS
        (function(){
            var styles = document.createElement('link');
            styles.rel = 'stylesheet';
            styles.type = 'text/css';
            styles.media = 'screen';
            styles.href = '/about.css';
            document.getElementsByTagName('head')[0].appendChild(styles);
        })();



    }


    componentWillUnmount() {
        console.log('componentWillUnmount');
        // CSS
        var links = document.querySelectorAll('head > link');
        links[links.length-1].remove();
        //a[a.length-1].remove();
    }

    rating(star, rate, maxStarts) {
        var val = parseInt(rate, 10);
        var rating = '';
        if (!isNaN(val)) {
            for (let i = 1; i <= val; i++) {
                rating += star.full;
            }
            for (let i = 0; i < maxStarts - val; i++) {
                rating += star.empty;
            }
        }
        return rating;
    }


    render() {
        document.title = 'About Me';
        return (
            <div className="container">
                <h1>About Me</h1>

                <GoogleAds
                    id="top"
                    client="ca-pub-1647951743023830"
                    slot="1838502239"
                    style={{ display:'block', width:'728px', height:'90px',  marginLeft: 'auto', marginRight: 'auto', }}
                />


                <article>
                    <p> Hello.</p>
                    <p>I'm Yurii. That's all you should really know about me.</p>
                </article>

                <aside>
                    <dl id="skills"></dl>
                    <div className="clear-both"></div>
                </aside>
                <div className="clear-both"></div>

            </div>
        );
    }


}
